<?php

class ItemsController extends BaseController
{


    function onInit()
    {
        $this->authorize();
        $categories = $this->model->getAllCategories();
        $this->dropDownOptions = $categories;
    }

    public function index()
    {
        $this->items = $this->model->getAll();

        $categories = $this->model->getAllCategories();

        $this->sidebarItems = $categories;


    }

    public function getCategoryImage(string $categoryIdFromItem)
    {
        $categoryId = (int)$categoryIdFromItem;
        $category = $this->model->getCategoryById($categoryId);
        return $category['image_link'];
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
                $imageLink = "http://vignette3.wikia.nocookie.net/shokugekinosoma/images/6/60/No_Image_Available.png";
            }
            $file_headers = @get_headers($imageLink);
            $linkIsReal = true;
            if (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                $linkIsReal = false;
                $this->setValidationError("item_image_link", "Your link is shit!");

            }

            if ($linkIsReal) {

                $url_headers = get_headers($imageLink, 1);

                if (isset($url_headers['Content-Type'])) {

                    if (is_array($url_headers['Content-Type'])) {
                        $this->setValidationError("item_image_link", "Your link is not a proper image file, dumbass!");

                    } else {
                        $type = strtolower($url_headers['Content-Type']);

                        $valid_image_type = array();
                        $valid_image_type['image/png'] = '';
                        $valid_image_type['image/jpg'] = '';
                        $valid_image_type['image/jpeg'] = '';
                        $valid_image_type['image/jpe'] = '';
                        $valid_image_type['image/gif'] = '';
                        $valid_image_type['image/tif'] = '';
                        $valid_image_type['image/tiff'] = '';
                        $valid_image_type['image/svg'] = '';
                        $valid_image_type['image/ico'] = '';
                        $valid_image_type['image/icon'] = '';
                        $valid_image_type['image/x-icon'] = '';

                        if (!isset($valid_image_type[$type])) {

                            $this->setValidationError("item_image_link", "Your link is not a proper image file, dumbass!");

                        }
                    }
                }
            }

            $category = $_POST['item_category'];
            $testString = "none";
            if ($category == $testString) {
                $this->setValidationError("item_price", "Избери категория бе!");
            }
            $price = floatval($_POST['item_price']);
            if ($price < 0) {
                $this->setValidationError("item_price", "Price cannot be a negative number");
            }


            if ($this->formValid()) {
                $userId = $_SESSION['user_id'];
                if ($this->model->create($title, $description, $userId, $imageLink, $price, $category)) {
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
        $currentUser = $this->model->getCurrentUser();

        $this->user = $currentUser;

        $item = $this->model->getById($id);
        
        if ($currentUser['id'] != $item['user_id']) {
            $this->addErrorMessage("Nice try. You cannot edit other users' items.");
            $this->redirect('users', 'info');
        } else {

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
                if (strlen($imageLink) < 2 || $imageLink == null) {
                    $imageLink = "http://vignette3.wikia.nocookie.net/shokugekinosoma/images/6/60/No_Image_Available.png";
                } else {


                    $file_headers = @get_headers($imageLink);
                    $linkIsReal = true;
                    if (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                        $linkIsReal = false;
                        $this->setValidationError("item_image_link", "Your link is shit!");

                    }

                    if ($linkIsReal) {

                        $url_headers = get_headers($imageLink, 1);

                        if (isset($url_headers['Content-Type'])) {

                            if (is_array($url_headers['Content-Type'])) {
                                $this->setValidationError("item_image_link", "Your link is not a proper image file, dumbass!");

                            } else {
                                $type = strtolower($url_headers['Content-Type']);

                                $valid_image_type = array();
                                $valid_image_type['image/png'] = '';
                                $valid_image_type['image/jpg'] = '';
                                $valid_image_type['image/jpeg'] = '';
                                $valid_image_type['image/jpe'] = '';
                                $valid_image_type['image/gif'] = '';
                                $valid_image_type['image/tif'] = '';
                                $valid_image_type['image/tiff'] = '';
                                $valid_image_type['image/svg'] = '';
                                $valid_image_type['image/ico'] = '';
                                $valid_image_type['image/icon'] = '';
                                $valid_image_type['image/x-icon'] = '';

                                if (!isset($valid_image_type[$type])) {

                                    $this->setValidationError("item_image_link", "Your link is not a proper image file, dumbass!");

                                }
                            }
                        }
                    }
                }


                $category = $_POST['item_category'];
                if ($category == "none") {
                    $this->setValidationError("item_price", "Избери категория бе!");
                }
                $price = floatval($_POST['item_price']);
                if ($price < 0) {
                    $this->setValidationError("item_price", "Price cannot be a negative number");
                }

                if ($this->formValid()) {
                    if ($this->model->edit($id, $title, $description, $imageLink, $category, $price)) {
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
    }

    public function delete(int $id)
    {
        if ($this->isPost) {
            if ($this->model->delete($id)) {
                $this->addInfoMessage("Item deleted.");
            } else {
                $this->addInfoMessage("Error: cannot delete item.");
            }
            $this->redirect('users', 'info');
        } else {
            $item = $this->model->getById($id);
            if (!$item) {
                $this->addErrorMessage("Error: item does not exist.");
                $this->redirect('users', 'info');
            }
            $this->item = $item;
        }
    }

}