<?php
    $host = 'localhost'; 
    $database = 'test';
    $user = 'root';
    $passworddb = ''; 
    $mysqli = new mysqli($host, $user, $passworddb, $database);
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>