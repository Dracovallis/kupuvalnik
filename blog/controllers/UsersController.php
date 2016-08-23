<?php

class UsersController extends BaseController
{
    public function register()
    {
		// TODO: your user registration functionality will come here ...
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
                $this->addInfoMessage("Login successful");

                return $this->redirect("posts");
            }
            else {
                $this->addErrorMessage("Error: login failed!");
            }
        }
    }

    public function logout()
    {
		// TODO: your user logout functionality will come here ...
    }
}
