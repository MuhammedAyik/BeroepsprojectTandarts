<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect naar inlogpagina als niet ingelogd
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #F6E80E; /* Sari kleur */
        }
        .sidebar {
            height: 100vh; /* Volledige hoogte */
            position: fixed; /* Blijft aan de linkerkant */
            top: 0;
            left: 0;
            z-index: 100; /* Zorgt ervoor dat het boven andere elementen komt */
            background-color: #002A5C; /* Lacivert kleur */
        }
        .sidebar .nav-link {
            color: #F6E80E; /* Sari tekstkleur voor links */
        }
        .sidebar .nav-link.active {
            background-color: #F6E80E; /* Actieve link kleur */
            color: #002A5C; /* Actieve link tekstkleur (laci) */
        }
        .sidebar .nav-link:hover {
            background-color: #F6E80E; /* Hover kleur voor links */
            color: #002A5C; /* Hover tekstkleur */
        }
        main {
            margin-left: 15%; /* Zorg ervoor dat de hoofdinhoud naast de sidebar staat */
            padding: 20px; /* Padding voor de hoofdinhoud */
            background-color: #F6E80E; /* Sari achtergrondkleur voor de hoofdinhoud */
            color: #002A5C; /* Lacivert tekstkleur in de hoofdinhoud */
            height: 100vh; /* Volledige hoogte van het hoofdgedeelte */
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 sidebar">
                <div class="sidebar-sticky">
                    <h4 class="sidebar-heading text-white">Menu</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profielbeheer.php">Profielbeheer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Afspraak maken</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="uitlog.php">Uitloggen</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10">
                <h2>Welkom op het dashboard Medewerker</h2>
                <p>Dit is de hoofdpagina van je dashboard. Hier kun je verschillende acties ondernemen.</p>
            </main>
        </div>
    </div>
</body>
</html>
