<?php

require_once 'infoBDD.php';


// connexion avec la base de données
try {
   
    $dbh = new PDO('mysql:host=localhost;dbname=planningEntrainement', $user, $pass);
     
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}