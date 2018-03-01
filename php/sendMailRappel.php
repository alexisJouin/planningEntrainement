<?php

require_once '../include/connexionBDD.php';
// connexion avec la base de données

try {
    $id_entrainement = $_POST['id_entrainement'];
    $id_groupe = $_POST['id_groupe'];
    //Préparation de la requête
    $selNoReponse = $dbh->prepare("
        SELECT DISTINCT pl.id id_playerNo,  pl.derby_name derby_nameNo,  pl.prenom  prenomNo, pl.email email 
        FROM `player` pl 
        WHERE NOT EXISTS (
            SELECT p.id FROM presence p WHERE p.id_player = pl.id AND p.id_entrainement IN (
                SELECT e.id FROM entrainement e WHERE e.id = $id_entrainement
            )
        ) 
        AND pl.id_groupe = $id_groupe 
        ORDER BY prenomNo
    ");

    $selEntrainement = $dbh->prepare("
        SELECT date, horraire_debut, lieu 
        FROM entrainement 
        WHERE id = $id_entrainement
    ");

    $selGroupe = $dbh->prepare("SELECT nom FROM groupe WHERE id = $id_groupe");

    $selNoReponse->execute();
    $listNoPresence = $selNoReponse->fetchAll(PDO::FETCH_ASSOC);

    $selEntrainement->execute();
    $entrainement = $selEntrainement->fetch(PDO::FETCH_ASSOC);

    $selGroupe->execute();
    $groupe = $selGroupe->fetch(PDO::FETCH_ASSOC);

    $date = $entrainement['date'];
    $horaire = $entrainement['horraire_debut'];
    $lieu = $entrainement['lieu'];
    $nom_goupe = $groupe['nom'];

    foreach ($listNoPresence as $row) {
        $email = $row['email'];
        $prenom = $row['prenomNo'];
        $derby_name = $row['derby_nameNo'];


        // *** Envoie du Mail *** //    

        $headers = 'From: rollerdepj@cluster020.hosting.ovh.net' . "\r\n" .
                'Reply-To: alexis.jouin@live.fr' . "\r\n" .
                'Content-Type: text/html; charset="utf-8"' . "\n" .
                'Content-Transfer-Encoding: 8bit' .
                'X-Mailer: PHP/' . phpversion();

        $message = '
                <html>
                    <head>
                     <title>Rappel Présence Roller Derby !</title>
                    </head>
                    <body>
                        <p>Bonjour ' . $prenom . ', ' . $derby_name . '.<br/>Vous n\'avez toujours pas répondu pour
                le prochain entrainement de Roller Derby du . ' . $date . ' à ' . $horaire . ' au ' . $lieu . ' </p>
        <p>Rendez-vous sur <a href = "http://rollerderbydunkerquois.fr/planningEntrainement/">http://rollerderbydunkerquois.fr/planningEntrainement/</a> pour donner votre réponse ! </p> 

        <br><br>
        
        <p>Bonne journée,</p>
        <br>
        <p>' . $nom_goupe . '</p>
        

        </body>
        </html>';

        mail($email, 'Rappel Présence ' . $nom_groupe . '!', $message, $headers);
    }

    echo "1";
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
