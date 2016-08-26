<?php

class CategoriesModel extends BaseModel
{
    public function getCategoryById(int $id) : array
    {
        $statement = self::$db->prepare(
            "SELECT id, name " .
            "FROM categories " .
            "WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        //$result = $statement->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function getAllCategories() : array
    {
        $statement = self::$db->query(
            "SELECT name " .
            "FROM categories ");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getItemsByCategory(string $category) : array
    {
        $statement = self::$db->prepare(
            "SELECT items.id, title, description, date, full_name, image_link, price " .
            "FROM items LEFT JOIN users ON items.user_id = users.id " .
            "WHERE items.category = ?");
        $categoryId = intval($category);
        $statement->bind_param("i", $categoryId);
        $statement->execute();
        //$result =
        $result = $statement->get_result()->fetch_assoc();
        //return $statement->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}