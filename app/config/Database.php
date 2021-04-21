<?php

/**
 * Get the database connection
 * return a PDO object
 */

class Database
{
    // Database credentials
    private  $host = "localhost";
    private  $dbname = "myproject";
    private  $username = "root";
    private  $password = "";

    // Use static, then models can reach the $pdo object
    public static $pdo;

    // When a Database object created, call the connect() function
    public function __construct()
    {
        $this->connect();
    }

    // Set database connection
    public function connect()
    {
        //Check if $pdo is already exists to avoid multiple connections
        if (self::$pdo instanceof \PDO)
            return self::$pdo;

        try {
            self::$pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}