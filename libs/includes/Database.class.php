<?php

class Database
{
    public static $conn = null;

    /**
     * This function will return the Database Connection
     *
     * @return mysqli
     */


    public static function getConnection()
    {
        if (Database::$conn == null) {
            $servername = "localhost";
            $user_name = "root";
            $pass_word = "";
            $dbname = "test";

     
            $connection = mysqli_connect($servername, $user_name, $pass_word, $dbname);
    
            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            } else {

                Database::$conn = $connection;
                return Database::$conn;
            }
        } else {

            // echo "Reusing Database Connection";
                return Database::$conn;
        }

}

}