<?php

class user
{
    private $conn;
    public static function signup($user, $phone, $email, $pass)
    {
        $conn = database::getconnection();
        $sql = "INSERT INTO `auth` (`username`, `phone`, `email`, `password`, `blocked`, `active`)
        VALUES ('$user', '$phone', '$email', '$pass', '0', '1')";
        $error=false;

        if ($conn->query($sql) === true) {
            $error=false;
        } else {
            $error=$conn->error;
        }

        // $conn->close();
        return $error;
    }
    public function __construct()
    {

    }
}
