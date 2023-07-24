<?php

include_once 'includes/session.class.php';
include_once 'includes/database.class.php';
include_once 'includes/user.class.php';

global $__site_config;
$__site_config = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/../photogramconfig.json');

session::start();

function get_config($key, $default=null)
{
    global $__site_config;
    $array = json_decode($__site_config, true);
    if (isset($array[$key])) {
        return $array[$key];
    } else {
        return $default;
    }
}


function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT']."/photogram/_templates/$name.php";
}

function validate($id, $pass)
{
    if($id == "raj@gmail.com" and $pass == "123") {
        return true;
    } else {
        return false;
    }
}

// function signup($user, $phone, $email, $pass)
// {

//     $conn = database::getconnection();
//     $sql = "INSERT INTO `auth` (`username`, `phone`, `email`, `password`, `blocked`, `active`)
//     VALUES ('$user', '$phone', '$email', '$pass', '0', '1')";
//     $error=false;

//     if ($conn->query($sql) === true) {
//         $error=false;
//     } else {
//         $error=$conn->error;
//     }

//     // $conn->close();
//     return $error;
// }
