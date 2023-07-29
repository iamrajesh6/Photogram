<?php

include 'libs/load.php';

$user="ramya";
$pass = isset($_GET['pass']) ? $_GET['pass'] : '';
$result = null;

if (isset($_GET['logout'])) {
    Session::destroy();
    die("Session destroyed, <a href='logintest.php'>Login Again</a>");
}





if(session::get('is_loggedin')) {
    $username = session::get('session_username');
    $userobj = new user($username);
    print("Welcome Back ". $userobj->getfirstname());
    print("\n".$userobj->getBio());
} else {
    printf("No Session Found, trying to login now.");
    $result= user::login($user, $pass);

    if($result) {
        $userobj = new user($user);
        echo "Login Success", $userobj->getUsername();
        session::set('is_loggedin', true);
        session::set('session_username', $result);
    } else {
        echo"Login failed, $user <br>";
    }
}

echo <<<EOL
<br><br><a href="logintest.php?logout">Logout</a>
EOL;
