<?php

class HomeModel extends BaseModel
{
    public function getLastItems(int $maxCount = 8) : array
    {
        $statement = self::$db->query(
            "SELECT items.id, title, description, date, full_name, image_link, price " .
            "FROM items LEFT JOIN users ON items.user_id = users.id " .
            "ORDER BY date DESC LIMIT $maxCount");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getItemById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT items.id, title, description, date, full_name, image_link, price " .
            "FROM items LEFT JOIN users ON items.user_id = users.id " .
            "WHERE items.id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function getAllCategories() : array
    {
        $statement = self::$db->query(
            "SELECT * " .
            "FROM categories ");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
}
