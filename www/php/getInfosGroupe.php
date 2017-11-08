<?php

require_once '../include/connexionBDD.php';

try {

    session_start(); // On get les variables sessions
    if ($_SESSION['id_groupe'] == 0 || $_SESSION['id_groupe'] == "" || $_SESSION['id_groupe'] == NULL || $_SESSION['privilege'] == 0) {
        echo "0";
    } else {
        if ($_POST['option'] == 1) {
            $id = $_POST['idPlayer'];
            if ($id != $_SESSION['id']) {
                //Préparation de la requête
                $res = $dbh->prepare(""
                        . "UPDATE player SET statut_in_groupe = 0, id_groupe = 0
                           WHERE id = '$id' ");
                $res->execute();
                echo 1;
            } else {
                echo 0;
            }
        } else {
            //Préparation de la requête
            $res = $dbh->prepare(""
                    . "SELECT g.id idGroupe, g.nom, g.email, g.adresse, g.descriptif, p.id, p.derby_name, p.prenom, p.nom nomPlayer, p.email emailPlayer, p.sexe, p.privilege
                   FROM groupe g
                   INNER JOIN player p ON p.id_groupe = g.id
                   WHERE g.id = '$_SESSION[id_groupe]'");
            $res->execute();
            $membre = $res->fetchAll(PDO::FETCH_ASSOC);

//        $tabInfoGroupe = array(
//            "nomPlayer" => $membre["nom"],
//            "email" => $membre["email"],
//            "adresse" => $membre["adresse"],
//            "descriptif" => $membre["descriptif"],
//            "derby_name" => $membre["derby_name"],
//            "nomPlayer" => $membre["nomPlayer"]
//        );


            echo json_encode($membre);

            $res = null;
        }
    }
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
