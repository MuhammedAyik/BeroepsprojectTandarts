<?php
require 'config.php'; // Verbinding maken met de database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Versleutelen van wachtwoord
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role = $_POST['role']; // 'patient' of 'dentist'

    // Check of de gebruiker al bestaat
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() > 0) {
        echo "<p class='error-msg'>E-mailadres is al in gebruik!</p>";
    } else {
        // Invoegen van de gebruiker in de database
        $sql = "INSERT INTO users (name, email, password, phone, address, role) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute([$name, $email, $password, $phone, $address, $role])) {
            echo "<p class='success-msg'>Registratie succesvol!</p>";
        } else {
            echo "<p class='error-msg'>Er is iets misgegaan, probeer het opnieuw.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie</title>
    <link rel="stylesheet" href="style.css"> <!-- Koppelen van het CSS-bestand -->
</head>
<body>
    <div class="container">
        <h2>Registratie</h2>
        <form method="POST" action="">
            <label for="name">Naam</label>
            <input type="text" name="name" placeholder="Naam" required><br>
            
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="E-mail" required><br>
            
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" placeholder="Wachtwoord" required><br>
            
            <label for="phone">Telefoonnummer</label>
            <input type="text" name="phone" placeholder="Telefoonnummer"><br>
            
            <label for="address">Adres</label>
            <textarea name="address" placeholder="Adres"></textarea><br>
            
            <label for="role">Gebruikersrol</label>
            <select name="role" required>
                <option value="patient">Patiënt</option>
                <option value="dentist">Tandarts</option>
            </select><br>
            
            <input type="submit" value="Registreren" class="btn">
        </form>
    </div>
</body>
</html>
