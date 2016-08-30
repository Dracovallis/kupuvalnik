<?php

class CategoriesController extends BaseController
{
    function index()
    {

        $categories = $this->model->getAllCategories();

        $this->sidebarItems = $categories;

    }

    function view($id)
    {
        $this->category = $this->model->getCategoryById($id);
        $category = $this->category;
        //$this->items = $this->model->getItemsByCategory($category['id']);

        $allItems = $this->model->getItemsByCategory($id);

        $itemsToDisplay = array();


        $this->items = $itemsToDisplay;
        $this->allItems = $allItems;

        $categories = $this->model->getAllCategories();

        $this->sidebarItems = $categories;
    }
    
    public function getCategoryImage(string $categoryIdFromItem)
    {
        $categoryId = (int)$categoryIdFromItem;
        $category = $this->model->getCategoryById($categoryId);
        return $category['image_link'];
    }
    
}