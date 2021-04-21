<?php

class Advertisement
{
    private $table_advertisements = "advertisements";
    private $table_users = "users";

    //Get the Database connection
    public function __construct()
    {
        new Database();
    }

    //Select the advertisement(s) to the related user
    public function selectAdvertisements($userId)
    {
        if (!empty($userId)) {

            $query =
                "SELECT title, users.name, advertisements.userid, advertisements.id AS advertisementid from $this->table_advertisements 
                     INNER JOIN $this->table_users ON advertisements.userid = users.id
                     WHERE advertisements.userid = :userid";

            $result = Database::$pdo->prepare($query);
            $result->bindParam(":userid", $userId, PDO::PARAM_INT);
            $result->execute();
            $advertisementArray = [];

            //fetch the result and put them into an array, because we want to use it later
            while ($row = $result->fetch()) {
                array_push($advertisementArray, $row);
            }

            //This array will contain the actual user
            return $advertisementArray;
        }
    }
}