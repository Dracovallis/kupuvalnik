<?php

class ItemsModel extends BaseModel
{
    public function getAll() : array
    {
        $statement = self::$db->query(
            "SELECT * " .
            "FROM items LEFT JOIN users ON items.user_id = users.id ORDER BY items.date DESC");

        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM items WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function create(string $title, string $description, int $user_id, string $imageLink, float $price, string $category) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO items(title, description, user_id, image_link, price, category) VALUES(?, ?, ?, ?, ?, ?)");
        $statement->bind_param("ssisss", $title, $description, $user_id, $imageLink, $price, $category);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function edit(string $id, string $title, string $description, string $imageLink, string $category, float $price) : bool
    {
        $statement = self::$db->prepare("UPDATE items SET title = ?, " .
            "description = ?, image_link = ?, price = ?, category = ? WHERE id = ?");
        $statement->bind_param("sssssi", $title, $description, $imageLink, $price, $category, $id);
        $statement->execute();
        return $statement->affected_rows >= 0;
    }

    public function delete(int $id) : bool
    {
        $statement = self::$db->prepare("DELETE FROM items WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function getAllCategories() : array
    {
        $statement = self::$db->query(
            "SELECT * " .
            "FROM categories ");
        return $statement->fetch_all(MYSQLI_ASSOC);
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