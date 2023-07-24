<?php

$pass = isset($_GET['pass']) ? $_GET['pass'] : "Random";
echo(md5($pass));
