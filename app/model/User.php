<?php

class User
{
    private $table_users = "users";

    //Get the Database connection
    public function __construct()
    {
        new Database();
    }

    // Select users from the database
    public function select()
    {
        $query =
            "SELECT * from $this->table_users";
        $result = Database::$pdo->prepare($query);
        $result->execute();
        return $result;
    }
}