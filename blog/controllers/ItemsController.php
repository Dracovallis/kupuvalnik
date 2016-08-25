<?php

class ItemsController extends BaseController
{
    function onInit()
    {
        $this->authorize();
    }

    public function index()
    {
        $this->items = $this->model->getAll();
    }

    public function create()
    {
        if ($this->isPost) {
            $title = $_POST['item_title'];
            if (strlen($title) < 1) {
                $this->setValidationError("item_title", "Title cannot be empty!");
            }
            $description = $_POST['item_description'];
            if (strlen($description) < 1) {
                $this->setValidationError("item_description", "Description cannot be empty");
            }
            $imageLink = $_POST['item_image_link'];
            if (strlen($imageLink) < 5) {
                $imageLink = "http://goo.gl/rtM5r7";
            }
            $price = floatval($_POST['item_price']);
            if ($price < 0) {
                $this->setValidationError("item_price", "Price cannot be a negative number");
            }
            
            
            if ($this->formValid()) {
                $userId = $_SESSION['user_id'];
                if ($this->model->create($title, $description, $userId, $imageLink, $price)) {
                    $this->addInfoMessage("Item created.");
                    $this->redirect("items");
                } else {
                    $this->addInfoMessage("Error: cannot create item.");
                }
            }
        }
    }

    public function edit(int $id)
    {
        if ($this->isPost) {
            $title = $_POST['item_title'];
            if (strlen($title) < 1) {
                $this->setValidationError("item_title", "Title cannot be empty");
            }
            $description = $_POST['item_description'];
            if (strlen($description) < 1) {
                $this->setValidationError("item_description", "Description cannot be empty");
            }
            $imageLink = $_POST['item_image_link'];
            if (strlen($imageLink) < 5) {
                $imageLink = "http://goo.gl/rtM5r7";
            }
            $price = floatval($_POST['item_price']);
            if ($price < 0) {
                $this->setValidationError("item_price", "Price cannot be a negative number");
            }

            if ($this->formValid()) {
                if ($this->model->edit($id, $title, $description, $imageLink, $price)) {
                    $this->addInfoMessage("Item edited.");
                } else {
                    $this->addErrorMessage("Error: cannot edit item.");
                }
                $this->redirect('items');
            }
        }

        $item = $this->model->getById($id);
        if (!$item) {
            $this->addErrorMessage("Error: item does not exist.");
            $this->redirect("items");
        }
        $this->item = $item;
    }

    public function delete(int $id)
    {
        if ($this->isPost) {
            if ($this->model->delete($id)) {
                $this->addInfoMessage("Item deleted.");
            } else {
                $this->addInfoMessage("Error: cannot delete item.");
            }
            $this->redirect('items');
        } else {
            $item = $this->model->getById($id);
            if (!$item) {
                $this->addErrorMessage("Error: item does not exist.");
                $this->redirect("items");
            }
            $this->item = $item;
        }
    }

}