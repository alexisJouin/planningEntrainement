<?php

require_once '../include/connexionBDD.php';

try {
    $option = $_POST['option'];

    session_start(); // On get les variables sessions
    //Create planning
    if ($option == 1) {

        $id_entrainement = $_POST['idEntrainement'];
        $reponse = $_POST['reponse'];
        $id_player = $_SESSION['id'];
        $id_groupe = $_SESSION['id_groupe'];
        $statut = 0;
        if ($reponse == "no") {
            $statut = 0;
        } elseif ($reponse == "yn") {
            $statut = 1;
        } elseif ($reponse == "yes") {
            $statut = 2;
        }


        $insPresence = $dbh->prepare("INSERT INTO presence (`id_player`, `id_groupe`, `id_entrainement`, `statut`)"
                . " VALUES ( $id_player , $id_groupe , $id_entrainement,  $statut  )"
                . " ON DUPLICATE KEY UPDATE  `statut` =  $statut");

        $insPresence->execute();

        echo json_encode($insPresence);
    }
    
    elseif($option == 2){
        $id_entrainement = $_POST['idEntrainement'];
        $id_groupe = $_SESSION['id_groupe'];
        
        $selPresence = $dbh->prepare("SELECT p.`id_player` id_player, p.`id_groupe` id_groupe, p.`id_entrainement` id_entrainement, p.`statut` statut, pl.derby_name derby_name, pl.prenom prenom "
                . " FROM `presence` p"
                . " INNER JOIN player pl ON pl.id = p.id_player"
                . " WHERE p.id_entrainement = $id_entrainement AND p.id_groupe= $id_groupe ");

        $selPresence->execute();
        $listPresence = $selPresence->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($listPresence);
    }
    
    elseif($option == 3){
        $id_entrainement = $_POST['idEntrainement'];
        $id_groupe = $_SESSION['id_groupe'];
        $id_player = $_SESSION['id'];
        
        $selPresence = $dbh->prepare("SELECT p.`statut` statut"
                . " FROM `presence` p"
                . " INNER JOIN player pl ON pl.id = p.id_player"
                . " WHERE p.id_entrainement = $id_entrainement AND p.id_groupe= $id_groupe AND pl.id = $id_player ");

        $selPresence->execute();
        $listPresence = $selPresence->fetch(PDO::FETCH_ASSOC);

        echo json_encode($listPresence);
    }


//    echo ltrim(strftime('%A', strtotime($date)), '0');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}