<?php

class UsersModel extends BaseModel
{
    public function login(string $username, string $password)
    {
        $statement = self::$db->prepare(
            "SELECT id, password_hash FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        if (password_verify($password, $result['password_hash']))
            return $result['id'];
        return false;

    }
    
    public function register (string $username, string $password, string $full_name, string $phone_number, string $address, string $email)
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $statement = self::$db->prepare(
            "INSERT INTO users (username, password_hash, full_name, phone_number, address, email) VALUES (?, ?, ?, ?, ?, ?)");
        $statement->bind_param("ssssss", $username, $password_hash, $full_name, $phone_number, $address,$email);
        $statement->execute();
        if ($statement->affected_rows != 1)
            return false;
        $user_id = self::$db->query("SELECT LAST_INSERT_ID()")->fetch_row()[0];
        return $user_id;
    }

    public function getCurrentUser(){

        $username = htmlspecialchars($_SESSION['username']);

        $statement = self::$db->prepare(
            "SELECT * FROM users WHERE username = ?");
        $statement->bind_param("s",$username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;

    }

    public function getAll() : array
    {
        $statement = self::$db->query(
            "SELECT * FROM users ORDER BY username");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }


    public function getItemsByUserId(int $userId) : array
    {
        $statement = self::$db->query(
            "SELECT * " .
            "FROM items " .
            "WHERE user_id = " . $userId);
        //$statement->bind_param("i", $userId);
        //$statement->execute();
        //$result = $statement->get_result()->fetch_assoc();
        $result = $statement->fetch_all(MYSQLI_ASSOC);

        return $result;
    }



    public function edit (string $id, string $fullName, string $email, string $address, string $phoneNumber) : bool
    {
        $statement = self::$db->prepare("UPDATE users SET full_name = ?, " .
            "email = ?, address = ?, phone_number = ? WHERE id = ?");
        $statement->bind_param("ssssi", $fullName, $email, $address, $phoneNumber, $id);
        $statement->execute();
        return $statement->affected_rows >= 0;
    }

}
