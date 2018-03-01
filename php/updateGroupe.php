<?php

require_once '../include/connexionBDD.php';

try {
    session_start();

    //Si l'ancien mot de passe correspond on update bien le mdp
    if ($_SESSION['privilege'] != 0) {

        $updt = $dbh->prepare("UPDATE groupe set "
                . " nom = '$_POST[nom]',"
                . " email = '$_POST[email]',"
                . " adresse = '$_POST[adresse]',"
                . " descriptif = '$_POST[descriptif]',"
                . " photo = '$_POST[photo]' WHERE id = '$_SESSION[id_groupe]'");

        $updt->execute();
//        echo json_encode($updt);
        echo "1";
    } else {
        echo json_encode($updt); //Cas ou mot de passe ne coresspondent pas
    }

    $req = null;
    $updt = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
