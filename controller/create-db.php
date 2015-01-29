<?php
    require_once(__DIR__ . "/../model/database.php");
    $connection = new mysqli($host, $username, $password);
    if($connection->connect-error) {
        die("error: " . $connection->connect-error);
    }
    else {
        echo "success: " . $connection->host_info;
    }
    $connection->close();