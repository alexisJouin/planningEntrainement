<?php

require_once '../include/connexionBDD.php';
// connexion avec la base de données

try {

    //Préparation de la requête
    $res = $dbh->prepare("SELECT derby_name, id FROM player WHERE derby_name = '$_POST[derby_name]'");
    $res->execute();
    $membre = $res->fetch(PDO::FETCH_ASSOC);

    //echo json_encode($membre);

    
    if (($_POST['derby_name'] == $membre['derby_name'])) {
        echo "0"; // on 'retourne' la valeur 0 au javascript si LE USER Existe déjà
    } 
    else if($_POST['derby_name'] != $membre['derby_name']) {
        echo "1"; // on 'retourne' la valeur 1 au javascript si c'est bon
        $res = null;
        $res = $dbh->prepare("INSERT INTO player (`nom`, `prenom`, `derby_name`, `mdp`) VALUES (' $_POST[nom]',' $_POST[prenom]' , '$_POST[derby_name]', ' $_POST[password]')");
        $res->execute();
    }
    else{
        echo ($res);
    }

    $res = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
