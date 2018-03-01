<?php

require_once '../include/connexionBDD.php';
// connexion avec la base de données

mb_internal_encoding('UTF-8');
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
header('Content-type: text/html; charset=UTF-8');

try {
    session_start();
    //Préparation de la requête
    $res = $dbh->prepare("SELECT derby_name, mdp, p.id id_player, id_groupe, g.nom nom_groupe, statut_in_groupe, privilege"
            . " FROM player p LEFT JOIN groupe g ON g.id = p.id_groupe"
            . " WHERE p.id = '$_SESSION[id]'");
    $res->execute();
    $membre = $res->fetch(PDO::FETCH_ASSOC);



    $_SESSION['id'] = $membre['id_player'];
    $_SESSION['derby_name'] = utf8_decode($membre['derby_name']);
    $_SESSION['id_groupe'] = $membre['id_groupe'];
    $_SESSION['privilege'] = $membre['privilege'];
    $_SESSION['statut_in_groupe'] = $membre['statut_in_groupe'];
    $_SESSION['nom_groupe'] = utf8_decode($membre['nom_groupe']);

    $id_player = $_SESSION['id'];
    $id_groupe = $_SESSION['id_groupe'];
    $derby_name = $_SESSION['derby_name'];
    $privilege = $_SESSION['privilege'];
    $statut_in_groupe = $_SESSION['statut_in_groupe'];
    $nom_groupe = $_SESSION['nom_groupe'];

//    $tabSession = array(
//        "id_player" => $id_player,
//        "id_groupe" => $id_groupe,
//        "derby_name" => $derby_name,
//        "privilege" => $privilege,
//        "statut_in_groupe" => $statut_in_groupe,
//        "nom_groupe" => $nom_groupe
//    );

    echo json_encode($membre);

    $res = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
