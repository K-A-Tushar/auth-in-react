<?php
namespace API;

class dbmysql
{
    // database connection
    public static function connect()
    {
        //configure database
        $DB_HOST = "localhost";
        $DB_USER = "root";
        $DB_PASSWORD = "";
        $DB_NAME = "web_ecomm";

        // Create database connection
        $conn = new \mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

        // Error handling for database connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}
