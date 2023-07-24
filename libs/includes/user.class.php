<?php

require_once "database.class.php";

class user
{
    private $conn;
    private $username;
    private $id;

    public function __call($name, $arguments)
    {

        $property = preg_replace("/[^0-9a-zA-Z]/", "", substr($name, 3));
        $property = strtolower(preg_replace('/\B([A-Z])/', '_$1', $property));

        if(substr($name, 0, 3) == "get") {
            return $this->_get_data($property);
        } elseif(substr($name, 0, 3) == "set") {
            return $this->_set_data($property, $arguments[0]);
        }
    }

    public static function signup($user, $phone, $email, $pass)
    {
        $options = [
            'cost' => 9,
        ];

        $pass= password_hash($pass, PASSWORD_BCRYPT, $options);
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
    public static function login($user, $pass)
    {
        $query= "SELECT * FROM `auth` WHERE `username` = '$user'";
        $conn= database::getconnection();
        $result= $conn->query($query);
        if($result->num_rows == 1) {
            $row= $result->fetch_assoc();
            // if($row['password'] == $pass) {
            if(password_verify($pass, $row['password'])) {
                return $row['username'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function __construct($username)
    {
        $this->conn = database::getconnection();
        $this->username = $username;
        $this->id = null;
        $sql = "SELECT `id` FROM `auth` WHERE `username` = '$username' LIMIT 1";
        $result = $this->conn->query($sql);
        if($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
        } else {
            throw new Exception("Username Doesn't Exist");
        }

    }

    private function _get_data($var)
    {
        if(!$this->conn) {
            $this->conn = database::getconnection();
        }
        $sql = "SELECT `$var` FROM `users` WHERE `id` = $this->id";
        $result = $this->conn->query($sql);
        if($result and $result->num_rows == 1) {
            return $result->fetch_assoc()["$var"];
        } else {
            return null;
        }
    }

    private function _set_data($var, $data)
    {
        if(!$this->conn) {
            $this->conn = database::getconnection();
        }
        $sql="UPDATE `users` SET `$var` = '$data' WHERE 'id'=$this->id";
        if($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function setDob($year, $month, $day)
    {
        if(checkdate($month, $day, $year)) {
            return $this->_set_data('dob', "$year.$month.$day");
        } else {
            return false;
        }
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function authentication()
    {

    }


}
