<?php

require_once '../include/connexionBDD.php'; // connexion avec la base de données

try {
    $option = $_POST['option'];
    session_start();

    //Demande du Player
    if ($option == 1) {

        $upd = $dbh->prepare("UPDATE player SET statut_in_groupe = 2, id_groupe = " . $_POST['idGroupe'] . " WHERE id=" . $_POST['id_player']);
        $upd->execute();

        echo json_encode($upd);

        $upd = null;
    }

    //Liste des demandes
    else if ($option == 2) {
        $req = $dbh->prepare("SELECT g.id id_groupe, p.id id_player, p.nom nom_player, p.prenom prenom_player, p.derby_name derby_name, p.statut_in_groupe statut , g.id_admin id_admin , g.nom nom_groupe, g.email mail_groupe, adresse, descriptif, g.photo photo_groupe"
                . " FROM groupe g"
                . " INNER JOIN player p ON g.id = p.id_groupe"
                . " WHERE g.id = " . $_POST['idGroupe'] . " AND statut_in_groupe = 1");
        $req->execute();
        $groupe = $req->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($groupe);

        $req = null;
    }

    //Gestion des demandes
    else if ($option == 3) {

        $id_playerDemande = $_POST['id_playerDemande'];
        $value_playerDemande = $_POST['value_playerDemande'];
        
        if ($value_playerDemande == "yes") {
            $upd = $dbh->prepare("UPDATE player SET statut_in_groupe = 2 WHERE id=" . $id_playerDemande);
            $upd->execute();
            echo json_encode($upd);
            $upd = null;
        } else if ($value_playerDemande == "no") {
            $upd1 = $dbh->prepare("UPDATE player SET statut_in_groupe = 0 WHERE id=" . $id_playerDemande);
            $upd1->execute();
            $upd2 = $dbh->prepare("UPDATE player SET id_groupe = 0 WHERE id=" . $id_playerDemande);
            $upd2->execute();
            
            echo json_encode($upd1);

            $upd1 = null;
            $upd2 = null;
        }
    }
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}