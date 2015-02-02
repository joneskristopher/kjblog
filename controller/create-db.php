<?php
    require_once(__DIR__ . "/../model/database.php");
    $connection = new mysqli($host, $username, $password);
    if($connection->connect_error) {
        die("error: " . $connection->connect_error);
    }
    $exists = $connection->select_db($database);
    if(!$exists) {
        $query = $connection->query("CREATE DATABASE $database");
        if($query) {
            echo "successfully created database: " . $database;
        }
    }
    else {
        echo "database already exists";
    }
    $query = $connection->query("CREATE TABLE posts ("
            . "id int(11) NOT NULL AUTO_INCREMENT,"
            . "title vachar(255) NOT NULL,"
            . "post text NOT NULL,"
            . "PRIMARY KEY (id))");
    if($query) {
        echo "successfully created table: posts";
    }
    else {
        echo "<p>$connection->error</p>";
    }
    $connection->close();