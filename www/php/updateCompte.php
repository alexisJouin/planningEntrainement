<?php

require_once '../include/connexionBDD.php';

try {
    session_start();
    $req = $dbh->prepare("SELECT derby_name, mdp, id FROM player WHERE id = '$_SESSION[id]'");
    $req->execute();
    $membre = $req->fetch(PDO::FETCH_ASSOC);

    //Si l'ancien mot de passe correspond on update bien le mdp
    if ($_POST['pswOld'] == $membre['mdp']) {
        if ($_POST['mdp'] == "" || $_POST['mdp'] == null) {

            $updt = $dbh->prepare("UPDATE player set "
                    . " derby_name = '$_POST[derby_name]',"
                    . " nom = '$_POST[nom]',"
                    . " prenom = '$_POST[prenom]',"
                    . " email = '$_POST[mail]',"
                    . " photo = '$_POST[photo]' WHERE id = '$_SESSION[id]'");
        } else {
            $updt = $dbh->prepare("UPDATE player set "
                    . " derby_name = '$_POST[derby_name]',"
                    . " mdp = '$_POST[mdp]',"
                    . " nom = '$_POST[nom]',"
                    . " prenom = '$_POST[prenom]',"
                    . " email = '$_POST[mail]',"
                    . " photo = '$_POST[photo]' WHERE id = '$_SESSION[id]'");
        }
        $updt->execute();
//        echo json_encode($updt);
        echo 1;
    } else {
        echo json_encode($membre); //Cas ou mot de passe ne coresspondent pas
    }

    $req = null;
    $updt = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
