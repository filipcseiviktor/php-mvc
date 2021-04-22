<?php

class CrudUser
{
    private $table_users = "users";
    private $users_table_name = "name";
    private $table_advertisements = "advertisements";

    //Get the Database connection
    public function __construct()
    {
        new Database();
    }

    // Select all users from the database
    public function index()
    {
        $query =
            "SELECT * from $this->table_users";
        $result = Database::$pdo->prepare($query);
        $result->execute();
        return $result;
    }

    // Check the $_POST global variable then create the new user
    public function create()
    {
        $create_user_name = $_POST['create_user_name'];
        $create_user_name = trim(str_replace("  ", " ", $_POST['create_user_name'])); //trim whitespaces or duplicate whitespaces from start and from end
        $create_user_name = filter_var($create_user_name, FILTER_SANITIZE_STRING); //remove html tags from the string
        $create_user_name = htmlentities($create_user_name, ENT_QUOTES);

        if (!empty($create_user_name) && strlen($create_user_name) > 0 && strlen($create_user_name) < 11) {

            $query =
                "INSERT INTO $this->table_users($this->users_table_name) VALUES (:username)";
            $result = Database::$pdo->prepare($query);
            $result->bindParam(":username", $create_user_name, PDO::PARAM_STR);
            $result->execute();
            return $result;
        }
    }

    // Select the actual user from the database
    public function edit($userKey)
    {
        $query =
            "SELECT * from $this->table_users WHERE id = :userKey";
        $result = Database::$pdo->prepare($query);
        $result->bindParam(":userKey", $userKey);
        $result->execute();
        $advertisementArray = [];

        //fetch the result and put them into an array, because we want to use it later
        while ($row = $result->fetch()) {
            array_push($advertisementArray, $row);
        }

        //This array will contain the actual user
        return $advertisementArray;
    }

    // Update the actual user into the database
    public function update($userKey)
    {
        $update_user_name = $_POST['update_user_name'];
        $update_user_name = trim(str_replace("  ", " ", $_POST['update_user_name']));  //trim whitespaces or duplicate whitespaces from start and from end
        $update_user_name = filter_var($update_user_name, FILTER_SANITIZE_STRING); //remove html tags from the string
        $update_user_name = htmlentities($update_user_name, ENT_QUOTES);

        if (!empty($update_user_name) && strlen($update_user_name) > 0 && strlen($update_user_name) < 11) {
            $query =
                "UPDATE $this->table_users SET $this->users_table_name = :username WHERE id = :userKey";
            $result = Database::$pdo->prepare($query);
            $result->bindParam(":username", $update_user_name);
            $result->bindParam(":userKey", $userKey);
            $result->execute();
        }
    }

    /**
     * To delete users we have to check the constraints at first
     */
    public function delete($userKey)
    {
        //Select the advertisements which are related to the actual user
        $advertisement_table_select =
            "SELECT * FROM $this->table_advertisements WHERE userid = :userKey";
        $result_select_advertisements = Database::$pdo->prepare($advertisement_table_select);
        $result_select_advertisements->bindParam(":userKey", $userKey);
        $result_select_advertisements->execute();

        //Check users advertisements
        switch ($result_select_advertisements) {

            case false:

                //Case false users haven't got advertisements, we can delete them immediately
                $user_table_delete =
                    "DELETE FROM $this->table_users WHERE id = :userKey";
                $result_delete_users = Database::$pdo->prepare($user_table_delete);
                $result_delete_users->bindParam(":userKey", $userKey);
                $result_delete_users->execute();

            case true:

                //if they have, firstly, we have to delete the advertisements to the related users (because of the constraints)
                $advertisement_table_delete =
                    "DELETE FROM $this->table_advertisements WHERE userid = :userKey";
                $result_delete_advertisements = Database::$pdo->prepare($advertisement_table_delete);
                $result_delete_advertisements->bindParam(":userKey", $userKey);
                $result_delete_advertisements->execute();

                //We can delete the users then.
                $user_table_delete =
                    "DELETE FROM $this->table_users WHERE id = :userKey";
                $result_delete_users = Database::$pdo->prepare($user_table_delete);
                $result_delete_users->bindParam(":userKey", $userKey);
                $result_delete_users->execute();
        }
    }
}