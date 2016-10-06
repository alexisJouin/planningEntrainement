<?php

require_once '../include/connexionBDD.php';
// connexion avec la base de données

$email =$_POST['email'];
$nom =$_POST['nom'];
$photo =$_POST['photo'];
$adress =$_POST['adress'];
$descriptionGroupe =$_POST['descriptionGroupe'];


try {
    session_start();
    //Préparation de la requête
    $res = $dbh->prepare("SELECT nom, id FROM groupe WHERE nom = '$nom'");
    $res->execute();
    $membre = $res->fetch(PDO::FETCH_ASSOC);

    //echo json_encode($membre);

    
    if (($nom == $membre['nom'])) {
        echo "0"; // on 'retourne' la valeur 0 au javascript si LE Groupe Existe déjà
    } 
    else if($nom != $membre['nom']) {
        $ins = $dbh->prepare("INSERT INTO Groupe (`nom`, `email`,`adresse`, `descriptif` ,`photo`, `date_creation`, `id_admin`) VALUES ('$nom','$email ' , '$adress', '$descriptionGroupe', '$photo', CURRENT_TIMESTAMP, '$_SESSION[id]')");
        $ins->execute();
        echo json_encode($ins); // on 'retourne' la valeur 1 au javascript si c'est bon
    }

    $res = null;
    $ins = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
