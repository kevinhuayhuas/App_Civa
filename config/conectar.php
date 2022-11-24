<?php

$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'cotizacion';
try {
    //PARA CONSULTAR EN EL LOGIN
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    //PARA CONSULTAR EN LAS CONSULTAS DE LA COTIZACION
    $mysqli = new mysqli($server, $username, $password, $database);
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}
?>
