<?php

//private means we can only connect it in this file
class Database {

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

        $this->connection = new mysqli($host, $username, $password);

//showing why the program shut off
        if ($this->connection->connect_error) {
            die("<p>Error: " . $this->connection->connect_error . "</p>");
        }
//"!" means it doesnt exists
        $exists = $this->connection->select_db($database);
        if (!$exists) {
            $query = $this->connection->query("CREATE DATABASE $database");

            if ($query) {
                echo "<p>Successfully created database: " . $database . "</p>";
            }
        } else {
            echo "<p>Database already exists.</p>";
        }
    }

    public function openConnection() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        //this code is if the connecction fails and 
        //indecate why are we quitting the program 
        //showing why the program shut off
        if ($this->connection->connect_error) {
            die("<p>Error: " . $this->connection->connect_error . "</p>");
        }
    }

//make sure to open if yes then were able to close
    public function closeConnection() {
//        to check if the information is present
//        in the connection varible , if it isn't set 
        if (isset($this->connection)) {
            $this->connection->close();
        }
    }

    public function query($string) {
        $this->openConnection();

        $query = $this->connection->query($string);
//        if query id false it will turn it to true
        if(!$query) {
            $this->error = $this->connection->error; 
        }

        $this->closeConnection();

        return $query;
    }

//public any file can access it
}
