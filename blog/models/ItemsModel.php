<?php

class ItemsModel extends BaseModel
{
    public function getAll() : array 
    {
        $statement = self::$db->query(
            "SELECT * FROM items ORDER BY date DESC");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM items WHERE id = ?");
        $statement->bind_param("i",$id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function create(string $title, string $description, int $user_id, string $imageLink, float $price) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO items(title, description, user_id, image_link, price) VALUES(?, ?, ?, ?, ?)");
        $statement->bind_param("ssiss", $title, $description, $user_id, $imageLink, $price);
        $statement->execute();
        return $statement->affected_rows == 1;
    }
    
    public function edit (string $id, string $title, string $description, string $imageLink, float $price) : bool
    {
        $statement = self::$db->prepare("UPDATE items SET title = ?, " .
        "description = ?, image_link = ?, price = ? WHERE id = ?");
        $statement->bind_param("ssssi", $title, $description, $imageLink, $price, $id);
        $statement->execute();
        return $statement->affected_rows >= 0;
    }
    
    public function delete (int $id) : bool
    {
        $statement = self::$db->prepare("DELETE FROM items WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }
}