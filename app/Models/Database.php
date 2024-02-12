<?php

//____________ .ENV ____________
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ .'/../..');
$dotenv->load();

//____________ PARAMETERS ____________
// Get the server's IP address or hostname
$serverAddress = $_SERVER['SERVER_ADDR']; // IP address
$serverName = $_SERVER['SERVER_NAME']; // Hostname
// Define a list of common localhost IP addresses and hostnames
$localhostAddresses = ['127.0.0.1', '::1', 'localhost'];
// Check if the server address or hostname is in the list of localhost values
$isLocalhost = in_array($serverAddress, $localhostAddresses) || in_array($serverName, $localhostAddresses);

if ($isLocalhost) {
    //This is a localhost environment
    $dbHost = $_ENV['DB_HOST_L'];
    $dbName = $_ENV['DB_NAME_L'];
    $dbUser = $_ENV['DB_USER_L'];
    $dbPassword = $_ENV['DB_PASSWORD_L'];
} else {
    //This is a live web server
    $dbHost = $_ENV['DB_HOST'];
    $dbName = $_ENV['DB_NAME'];
    $dbUser = $_ENV['DB_USER'];
    $dbPassword = $_ENV['DB_PASSWORD'];
}

//____________ DATABASE ____________
try {
    $database = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    new AlertModel('error', 'Erreur de connexion à la base de données : ' . $e->getMessage());
}

?>
