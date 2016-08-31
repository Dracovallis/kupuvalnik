<?php

class HomeModel extends BaseModel
{
    public function getLastItems(int $maxCount = 8) : array
    {
        $statement = self::$db->query(
            "SELECT * " .
            "FROM items LEFT JOIN users ON items.user_id = users.id " .
            "ORDER BY date DESC LIMIT $maxCount");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getItemById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT * " .
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

    public function getItemId(string $itemTitle)
    {

        $statement = self::$db->prepare(
            "SELECT * " .
            "FROM items " .
            "WHERE title = ?");
        $statement->bind_param("s", $itemTitle);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        //$result = $statement->fetch_all(MYSQLI_ASSOC);
        return $result['id'];

    }

    public function getCategoryById(int $id) : array
    {
        $statement = self::$db->prepare(
            "SELECT * " .
            "FROM categories " .
            "WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        //$result = $statement->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}
