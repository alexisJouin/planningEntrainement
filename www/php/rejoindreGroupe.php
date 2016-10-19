<?php

require_once '../include/connexionBDD.php'; // connexion avec la base de données

try {
 
    session_start();
    $req = $dbh->prepare("SELECT g.id id_groupe, p.id id_player, p.statut_in_groupe statut , g.id_admin id_admin , g.nom nom_groupe, g.email mail_groupe, adresse, descriptif, g.photo photo_groupe"
            . " FROM groupe g"
            . " INNER JOIN player p ON g.id = p.id_groupe"
            . " WHERE g.id = ".$_POST['idGroupe']);
    $req->execute();
    $groupe = $req->fetch(PDO::FETCH_ASSOC);
    
    $upd = $dbh->prepare("UPDATE player SET statut_in_groupe = 1, id_groupe = ".$_POST['idGroupe']." WHERE id=".$_SESSION['id']);
    $upd->execute();
    
    echo "1";

    $req = null;
    $upd = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}