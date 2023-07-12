<?php

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
