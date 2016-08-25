<?php

class HomeController extends BaseController
{
    function index()
    {
        $lastItems = $this->model->getLastItems(5);
        $categories = $this->model->getAllCategories();
        $this->items = array_slice($lastItems, 0, 5);
        $this->sidebarItems = $categories;
    }

    function view($id)
    {
        $this->item = $this->model->getItemById($id);
    }
}
