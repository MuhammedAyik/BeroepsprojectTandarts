<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // Terug naar inlogpagina
exit();
?>
