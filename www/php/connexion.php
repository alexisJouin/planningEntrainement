<?php

require_once '../include/connexionBDD.php';
// connexion avec la base de données

$derby_name_session;

try {

    //Préparation de la requête
    $res = $dbh->prepare("SELECT derby_name, mdp, id, id_groupe, statut_in_groupe, privilege FROM player WHERE derby_name = '$_POST[derby_name]' AND mdp = '$_POST[mdp]'");
    $res->execute();
    $membre = $res->fetch(PDO::FETCH_ASSOC);


    if (($_POST['derby_name'] == $membre['derby_name']) && ($_POST['mdp'] == $membre['mdp'] )) {
        //Démarage de la session
        session_start();

        setcookie("id", $membre['id']); // genere un cookie contenant l'id du membre
        setcookie("derby_name", $membre['derby_name']);
        setcookie("id_groupe", $membre['id_groupe']); 
        setcookie("privilege", $membre['privilege']); 
        //TO DO géstion de l'id de session
        //session_id($membre['id']);

        $derby_name_session = utf8_decode($membre['derby_name']);
        $id_session = $membre['id'];

        $_SESSION['id'] = $membre['id'];
        $_SESSION['derby_name'] = $derby_name_session;
        $_SESSION['id_groupe'] = $membre['id_groupe'];
        $_SESSION['privilege'] = $membre['privilege'];
        $_SESSION['statut_in_groupe'] = $membre['statut_in_groupe'];
        $_SESSION['statut_in_groupe'] = $membre['statut_in_groupe'];
        
        $resGroupe = $dbh->prepare("SELECT id, nom FROM groupe WHERE id = '$membre[id_groupe]'");
        $resGroupe->execute();
        $groupe = $resGroupe->fetch(PDO::FETCH_ASSOC);
        
        $_SESSION['nom_groupe'] = $groupe['nom'];
        
        echo "1";  // on 'retourne' la valeur 1 au javascript si la connexion est bonne
        
    } else {
        echo "0"; // on 'retourne' la valeur 0 au javascript si la connexion n'est pas bonne
    }

    $res = null;
    $groupe = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
