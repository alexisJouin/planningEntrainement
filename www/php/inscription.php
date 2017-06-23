<?php

require_once '../include/connexionBDD.php';
// connexion avec la base de données
$derby_name = $_POST['derby_name'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$sexe = $_POST['sexe'];
$photo = $_POST['photo'];
$mdp = $_POST['password'];
$liste_caractere_interdit = array('<', '>', '/', ',', '"', '\'');


try {

    //Préparation de la requête
    $res = $dbh->prepare("SELECT derby_name, id FROM player WHERE derby_name = '$_POST[derby_name]'");
    $res->execute();
    $membre = $res->fetch(PDO::FETCH_ASSOC);

    //echo json_encode($membre);


    if (($_POST['derby_name'] == $membre['derby_name'])) {
        echo "0"; // on 'retourne' la valeur 0 au javascript si LE USER Existe déjà
    } else if ($derby_name != $membre['derby_name']) {
        $ins = $dbh->prepare("INSERT INTO player (`derby_name`, `nom`, `prenom`,`sexe`, `email`, `photo`,  `mdp`) VALUES (:derby_name, :nom, :prenom, :sexe, :email, :photo, :mdp)");
        $ins->bindParam(':derby_name', $derby_name);
        $ins->bindParam(':nom', $nom);
        $ins->bindParam(':prenom', $prenom);
        $ins->bindParam(':email', $email);
        $ins->bindParam(':sexe', $sexe);
        $ins->bindParam(':photo', $photo);
        $ins->bindParam(':mdp', $mdp);
        $ins->execute();
        echo "1"; // on 'retourne' la valeur 1 au javascript si c'est bon
    } else {
        echo $res;
    }

    $res = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
