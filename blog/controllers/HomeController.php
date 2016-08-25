<?php

class HomeController extends BaseController
{
    function index() {
       $lastItems = $this->model->getLastItems(5);
        $this->items = array_slice($lastItems, 0, 3);
        $this->sidebarItems = $lastItems;
    }
	
	function view($id)
    {
        $this->item = $this->model->getItemById($id);
    }
}
