<?php

require_once '../include/connexionBDD.php';
// connexion avec la base de données

try {
    
    //Préparation de la requête
    $res = $dbh->prepare("SELECT derby_name, mdp, id FROM player WHERE derby_name = '$_POST[derby_name]' AND mdp = '$_POST[mdp]'");
    $res->execute();
    $membre = $res->fetch(PDO::FETCH_ASSOC); 
    
    //echo json_encode($membre);

    if (($_POST['derby_name'] == $membre['derby_name']) && ($_POST['mdp'] == $membre['mdp'])) {
        setcookie("id", $membre['id']); // genere un cookie contenant l'id du membre
        setcookie("derby_name", $membre['derby_name']); // genere un cookie contenant le login du membre		
        echo "1"; // on 'retourne' la valeur 1 au javascript si la connexion est bonne
    } else {
        echo "0"; // on 'retourne' la valeur 0 au javascript si la connexion n'est pas bonne
    }

    $res = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
