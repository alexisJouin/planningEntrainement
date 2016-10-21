<?php

require_once '../include/connexionBDD.php'; // connexion avec la base de données

try {
    $option = $_POST['option'];
    session_start();
    $req = $dbh->prepare("SELECT g.id id_groupe, p.id id_player, p.nom nom_player, p.statut_in_groupe statut , g.id_admin id_admin , g.nom nom_groupe, g.email mail_groupe, adresse, descriptif, g.photo photo_groupe"
            . " FROM groupe g"
            . " INNER JOIN player p ON g.id = p.id_groupe"
            . " WHERE g.id = " . $_POST['idGroupe']." AND statut_in_groupe = 1");
    $req->execute();

    //Demande du Player
    if ($option == 1) {
        
        $upd = $dbh->prepare("UPDATE player SET statut_in_groupe = 1, id_groupe = " . $_POST['idGroupe'] . " WHERE id=" . $_SESSION['id']);
        $upd->execute();

        echo "1";

        $req = null;
        $upd = null;
    }
    
    //Liste des demandes
    else if($option == 2){
        $groupe = $req->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($groupe);
    }
    
    
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}