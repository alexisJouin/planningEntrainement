<?php

require_once '../include/connexionBDD.php';
// connexion avec la base de données

try {
    $email = $_POST['adressMail'];
    //Préparation de la requête
    $res = $dbh->prepare("SELECT id, prenom, nom, derby_name, mdp, email FROM player WHERE email = '$email' ");
    $res->execute();
    $membre = $res->fetch(PDO::FETCH_ASSOC);


    if ($email == $membre['email']) {

        $nom = $membre['nom'];
        $prenom = $membre['prenom'];
        $derby_name = $membre['derby_name'];
        $password = $membre['mdp'];

        // *** Envoie du Mail *** //

        $headers = 'From: rollerdepj@cluster020.hosting.ovh.net' . "\r\n" .
                'Reply-To: alexis.jouin@live.fr' . "\r\n" .
                'Content-Type: text/plain; charset="iso-8859-1"' . "\n" .
                'Content-Transfer-Encoding: 8bit' .
                'X-Mailer: PHP/' . phpversion();

        $message = 'Votre mot de passe est : ' . $password . ' . Rendez-vous sur http://rollerderbydunkerquois.fr/planningEntrainement/ pour vous connecter ! ';

        mail($email, 'Mot de passe, Roller Derby', $message, $headers);

        echo "1";
    } else {
        echo "0";
    }
    $res = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
