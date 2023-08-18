<?php

include_once 'includes/session.class.php';
include_once 'includes/database.class.php';
include_once 'includes/user.class.php';
include_once 'includes/usersession.class.php';
include_once 'includes/webapi.class.php';
global $__site_config;
// $__site_config_path = dirname(is_link($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'].'/photogramconfig.json' : readlink($_SERVER['DOCUMENT_ROOT'])) ;
// $__site_config = file_get_contents($_SERVER[$__site_config_path].'/../photogramconfig.json');
// $__site_config = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/../photogramconfig.json');

// $__site_config_path = dirname(is_link($_SERVER['DOCUMENT_ROOT']) ? readlink($_SERVER['DOCUMENT_ROOT']) : $_SERVER['DOCUMENT_ROOT']).'/photogramconfig.json';
// session::start();
// $__site_config = file_get_contents($__site_config_path);
$wapi = new webapi();
$wapi->initiatesession();


function get_config($key, $default = null)
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
    include $_SERVER['DOCUMENT_ROOT'] . get_config('base_path'). "_templates/$name.php";
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
