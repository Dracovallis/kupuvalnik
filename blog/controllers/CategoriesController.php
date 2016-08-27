<?php

class CategoriesController extends BaseController
{
    function index()
    {
       // $lastItems = $this->model->getLastItems(5);
        $categories = $this->model->getAllCategories();
        //$this->items = array_slice($lastItems, 0, 5);
        $this->sidebarItems = $categories;
    }

    function view($id)
    {
        $this->category = $this->model->getCategoryById($id);
        $category = $this->category;
        //$this->items = $this->model->getItemsByCategory($category['id']);

        $allItems = $this->model->getAll($id);

        $itemsToDisplay = array();




        //for ($i=0; $i<count($allItems); $i++){
        //    if ($allItems[$i]['category'] != $id){
        //        //unset($allItems[$i]);
        //        $allItems[$i] = null;
        //    }
        //}
        
        

        $this->items = $itemsToDisplay;
        $this->allItems = $allItems;
    }
}