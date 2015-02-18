<?php
class database {
    private $connection;
    private $host;
    private $username;
    private $password;
    private $database;
    public $error;
    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $connection = new mysqli($host, $username, $password);
    if($connection->connect_error) {
        die("<p>error: " . $this->connection->connect_error . "</p>");
    }
    $exists = $this->connection->select_db($database);
    if(!$exists) {
        $query = $this->connection->query("CREATE DATABASE $database");
        if($query) {
            echo "<p>successfully created database: " . $database . "</p>";
        }
    }
    else {
        echo "<p>database already exists</p>";
    }
    }
    public function openconnection() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->datababse);
        if($this->connection->connect_error) {
            die("<p>error: " . $this->connection->connect_error . "</p>");
        }
    }
    public function closeconnection() {
        if(isset($this->connection)) {
            $this->connection->close();
        }
    }
    public function query($string) {
        $this->openconnection();
        $query = $this->connection->queery($string);
        if(!$query) {
            $error = $this->connection->error;
        }
        $this->closeconnection();
        return $query;
    }
}