<?php

class database
{
    public static $conn = null;

    public static function getconnection()
    {
        if(database::$conn == null) {
            $servername = "mysql.selfmade.ninja";
            $username = "iamrajesh";
            $password = "@Luxhamam666";
            $dbname = "iamrajesh_new";


            // Create connection
            $connection = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            } else {
                database::$conn = $connection;  //replacing null with actual connection
                return database::$conn;
            }
        } else {
            return database::$conn;
        }
    }
}
