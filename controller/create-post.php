<?php
    requre_once(__DIR__ . "/../model/database.php");
    $connection = new mysqli($host, $username, $password ,$database);
    $query = $connection->query("INSERT INTO posts SET title = '$title', post = '$post'");
    if($query) {
        echo "<p>successfully inserteed post: $title</p>"
    }
    else {
        echo "<p>$connection->error</p>"
    }
    $title = filer_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);
    $connection->close();