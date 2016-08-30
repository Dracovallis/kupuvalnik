<?php

class UsersController extends BaseController
{
    public function index()
    {
        $this->authorize();
        $this->users = $this->model->getAll();


    }

    public function info()
    {


        $currentUser = $this->model->getCurrentUser();

        $this->user = $currentUser;

        $this->items = $this->model->getItemsByUserId($currentUser['id']);
    }

    public function register()
    {
        if ($this->isPost) {
            $username = $_POST['username'];
            if (strlen($username) < 2 || strlen($username) > 50) {
                $this->setValidationError("username", "Invalid username");
            }
            $password = $_POST['password'];
            if (strlen($password) < 2 || strlen($password) > 50) {
                $this->setValidationError("password", "Invalid password");
            }
            $full_name = $_POST['full_name'];
            if (strlen($full_name) > 200) {
                $this->setValidationError("full_name", "Invalid full name");
            }

            if ($this->formValid()) {
                $userId = $this->model->register($username, $password, $full_name);
                if ($userId) {
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $userId;
                    $this->addInfoMessage("Registration successfull.");
                    $this->redirect("items");
                } else {
                    $this->addInfoMessage("Error: user registration failed");
                }
            }
        }


    }

    public function login()
    {
        if ($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $loggedUserId = $this->model->login($username, $password);
            if ($loggedUserId) {
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $loggedUserId;
                $this->addInfoMessage("Login successful.");
                return $this->redirect("items");
            } else {
                $this->addInfoMessage("Error: login failed!");
            }
        }
    }

    public function logout()
    {
        session_destroy();
        $this->addInfoMessage("Logout successful");
        $this->redirect("");
    }


    public function edit(int $id)
    {

        $currentUser = $this->model->getCurrentUser();

        $this->user = $currentUser;

        if ($this->user['id'] != $id) {
            $this->addErrorMessage("Nice try. You cannot edit other users.");
            $this->redirect('users', 'info');
        } else {
            
            if ($this->isPost) {
                $fullName = $_POST['user_full_name'];
                if (strlen($fullName) < 1) {
                    $this->setValidationError("user_full_name", "You must enter a name!");
                }
                $email = $_POST['user_email'];
                if (strlen($email) < 1) {
                    $this->setValidationError("user_email", "E-mail cannot be empty");
                }

                $address = $_POST['user_address'];
                if (strlen($address) < 5) {
                    $this->setValidationError("user_address", "Incorrect Address!");
                }


                $phoneNumber = $_POST['user_phone_number'];
                if (strlen($phoneNumber) < 6) {
                    $this->setValidationError("user_phone_number", "Phone number error!");
                }


                if ($this->formValid()) {
                    if ($this->model->edit($id, $fullName, $email, $address, $phoneNumber)) {
                        $this->addInfoMessage("User details edited.");
                    } else {
                        $this->addErrorMessage("Error: cannot edit user description.");
                    }
                    $this->redirect('users', 'info');
                }

            }
        }
    }
}
