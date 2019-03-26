<?php

require_once(SITE_ROOT."/app/models/db.php");
require_once(SITE_ROOT."/app/models/user.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $db_user = new User($username);
    $db_user->check_credentials($username, $password);
}

require_once(SITE_ROOT."/app/views/login/login.php");
