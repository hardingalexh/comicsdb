<?php

$host = 'localhost';
$user = '';
$pass = '';
$dbname = 'comicsdb';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    trigger_error('Database connection has failed: ' . $conn->connect_error, E_USER_ERROR);
}

?>
