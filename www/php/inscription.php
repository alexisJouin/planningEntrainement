<?php

require_once '../include/connexionBDD.php';
// connexion avec la base de données
$derby_name =$_POST['derby_name'];
$email =$_POST['email'];
$sexe =$_POST['sexe'];
$photo =$_POST['photo'];
$mdp =$_POST['password'];
//utf8_encode($derby_name);
//utf8_encode($mdp);


try {

    //Préparation de la requête
    $res = $dbh->prepare("SELECT derby_name, id FROM player WHERE derby_name = '$_POST[derby_name]'");
    $res->execute();
    $membre = $res->fetch(PDO::FETCH_ASSOC);

    //echo json_encode($membre);

    
    if (($_POST['derby_name'] == $membre['derby_name'])) {
        echo "0"; // on 'retourne' la valeur 0 au javascript si LE USER Existe déjà
    } 
    else if($_POST['derby_name'] != $membre['derby_name']) {
       
        $res = null;
        $res = $dbh->prepare("INSERT INTO player (`derby_name`, `nom`, `prenom`,`sexe`, `email`, `photo`,  `mdp`) VALUES ('$derby_name', '$_POST[nom]','$_POST[prenom]' ,'$sexe', '$email', '$photo',  '$mdp')");
        $res->execute();
        echo "1"; // on 'retourne' la valeur 1 au javascript si c'est bon
    }
    else{
        echo ($res);
    }   

    $res = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
