<?php

class HomeController extends BaseController
{
    function index()
    {
        $lastItems = $this->model->getLastItems(8);
        $this->items = array_slice($lastItems, 0, 8);
        $categories = $this->model->getAllCategories();
        $this->sidebarItems = $categories;
    }

    function view($id)
    {
        $this->item = $this->model->getItemById($id);
    }

    public function getCategoryImage(string $categoryIdFromItem)
    {
        $categoryId = (int)$categoryIdFromItem;
        $category = $this->model->getCategoryById($categoryId);
        return $category['image_link'];
    }
}
