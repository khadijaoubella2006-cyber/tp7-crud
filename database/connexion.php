<?php

$host = "localhost";
$dbname = "tp7_crud";
$username = "root";
$password = "";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
     echo "Connexion à la base de données réussie ";

} catch (PDOException $e) {

    die("Erreur de connexion : " . $e->getMessage());

}