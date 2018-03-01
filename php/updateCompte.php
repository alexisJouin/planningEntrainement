<?php

require_once '../include/connexionBDD.php';

try {
    session_start();
    $req = $dbh->prepare("SELECT derby_name, mdp, id FROM player WHERE id = '$_SESSION[id]'");
    $req->execute();
    $membre = $req->fetch(PDO::FETCH_ASSOC);

    if ($_POST['option'] == 0) {
        $updt = $dbh->prepare("UPDATE player set "
                . " derby_name = '$_POST[derby_name]',"
                . " nom = '$_POST[nom]',"
                . " prenom = '$_POST[prenom]',"
                . " email = '$_POST[mail]' WHERE id = '$_SESSION[id]'");

        $updt->execute();

        $_SESSION['derby_name'] = $_POST['derby_name'];
        echo 1;
    } else {
        if ($_POST['password1'] == $membre['mdp']) {
            if ($_POST['password2'] !== "" || $_POST['password2'] !== null) {
                if ($_POST['password2'] == $_POST['password3']) {
                    $updt = $dbh->prepare("UPDATE player set "
                            . " mdp = '$_POST[password2]' "
                            . " WHERE id = '$_SESSION[id]'");

                    $updt->execute();
                    echo 1;
                }
            }
        }else{
            echo 0;
        }
    }
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}