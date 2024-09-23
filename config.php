<?php
// Databaseconfiguratie
$host = 'localhost'; // Verander dit als je een andere host gebruikt
$dbname = 'BPTandarts'; // De naam van je database
$username = 'root'; // Je databasegebruikersnaam
$password = ''; // Je databasewachtwoord

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Stel de PDO-foutmodus in op uitzondering
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kan geen verbinding maken met de database: " . $e->getMessage());
}
?>
