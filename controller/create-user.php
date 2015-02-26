<?php
    require_once(__DIR__ . "/../model/cofig.php");
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $salt = "$5$" . "rounds=5000$" . uniqid(mt_rand(), true) . "$";
    $hashedpassword = crypt($password, $salt);
    $query = $_SESSION["connection"]->query("INSERT INTO users SET"
            ."email = '$email',"
            ."username = '$usename',"
            ."password = '$hashedpassword',"
            ."salt = '$salt'");
    if($query) {
        echo "successfully created user: $username";
    }
    else {
        "<p>" . $_SESSION["connection"]->error . "</p>";
    }