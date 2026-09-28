<?php

$host = 'localhost';
$dbname = 'quiz_local';
$username = 'quiz_user';
$password = 'quiz123';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion à MariaDB réussie !";

} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
