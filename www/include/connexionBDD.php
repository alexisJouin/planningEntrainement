<?php

require_once 'infoBDD.php';


// connexion avec la base de données
try {
   
    $dbh = new PDO('mysql:host=localhost;dbname=planningEntrainement', $user, $pass);
    $dbh->exec("set names utf8");
     
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}