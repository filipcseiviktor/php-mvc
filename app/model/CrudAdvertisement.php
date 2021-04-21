<?php

class CrudAdvertisement
{
    private $table_advertisements = "advertisements";
    private $table_advertisements_userid = "userid";
    private $table_advertisements_title = "title";

    //Get the Database connection
    public function __construct()
    {
        new Database();
    }

    // Check the $_POST global variable then create the new advertisement
    public function create()
    {
        $create_advertisements_userid = $_POST['create_advertisements_userid'];
        $create_advertisements_title = $_POST['create_advertisements_title'];


        if (!empty($create_advertisements_title) && !empty($create_advertisements_userid) && strlen($create_advertisements_title) > 1 && strlen($create_advertisements_title) < 40) {
            $create_advertisements_title = trim(str_replace("  ", " ", $create_advertisements_title)); //trim whitespaces or duplicate whitespaces from start and from end
            $create_advertisements_title = filter_var($create_advertisements_title, FILTER_SANITIZE_STRING); //remove html tags from the string

            $query_insert =
                "INSERT INTO $this->table_advertisements($this->table_advertisements_userid, $this->table_advertisements_title) VALUES (:userid, :title)";
            $result_insert = Database::$pdo->prepare($query_insert);
            $result_insert->bindParam(":userid", $create_advertisements_userid, PDO::PARAM_INT);
            $result_insert->bindParam(":title", $create_advertisements_title, PDO::PARAM_STR);

            $result_insert->execute();

            return $result_insert;
        }
    }

    // Select the actual advertisement from the database
    public function edit($AdvertisementId)
    {
        $query =
            "SELECT title from $this->table_advertisements WHERE id = :AdvertisementId";
        $result = Database::$pdo->prepare($query);
        $result->bindParam(":AdvertisementId", $AdvertisementId);
        $result->execute();
        $advertisementArray = [];

        //fetch the result and put them into an array, because we want to use it later
        while ($row = $result->fetch()) {
            array_push($advertisementArray, $row);
        }

        //This array will contain the actual user
        return $advertisementArray;
    }

    // Update the actual advertisement into the database
    public function update($AdvertisementId)
    {
        $update_advertisement_title = $_POST['update_advertisement_title'];
        $update_advertisement_title = trim(str_replace("  ", " ", $update_advertisement_title));  //trim whitespaces or duplicate whitespaces from start and from end
        $update_advertisement_title = filter_var($update_advertisement_title, FILTER_SANITIZE_STRING); //remove html tags from the string

        if (!empty($update_advertisement_title) && strlen($update_advertisement_title) > 0 && strlen($update_advertisement_title) < 41) {

            $query =
                "UPDATE $this->table_advertisements SET $this->table_advertisements_title = :title WHERE id = :AdvertisementId";
            $result = Database::$pdo->prepare($query);
            $result->bindParam(":title", $update_advertisement_title);
            $result->bindParam(":AdvertisementId", $AdvertisementId);
            $result->execute();
        }
    }

    // Delete the actual advertisement from the database
    public function delete($title)
    {
        $advertisement_table_delete =
            "DELETE FROM $this->table_advertisements WHERE title = :title";
        $result_delete_advertisements = Database::$pdo->prepare($advertisement_table_delete);
        $result_delete_advertisements->bindParam(":title", $title);
        $result_delete_advertisements->execute();
    }
}