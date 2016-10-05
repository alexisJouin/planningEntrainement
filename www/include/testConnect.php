<?php

session_start();
if (!isset($_SESSION['id'])) { // Si l'utilisateur n'a pas encore d'ID de session
    header('Location: index.php'); // Redirection powa !
    die(); // Et argh, on tue le script
}
