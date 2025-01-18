<?php
$host = 'mysql';
$port = 3306;
$dbname = 'mydatabase'; 
$user = 'myuser'; 
$password = 'mypassword'; 


$conn = new mysqli($host, $user, $password, $dbname, $port);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

