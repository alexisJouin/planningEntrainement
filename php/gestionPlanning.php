<?php

require_once '../include/connexionBDD.php';

try {
    $option = $_POST['option'];

    session_start(); // On get les variables sessions
    // Set timezone
    date_default_timezone_set('UTC');
    setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

    $year = date("y");
    $mois = date("m");
    $current_date = date('y-m-d');
    $date = $current_date;



    //Create planning
    if ($option == 1) {

        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
        $lieu = $_POST['lieu'];
        $tabDaySelected = json_decode(stripslashes($_POST['tabDaySelected']));

        if (strtotime($current_date) >= strtotime($date_debut)) {
            $date = $current_date;
        }

        $day = $tabDaySelected->day;
        $horraire_debut = $tabDaySelected->horraire_debut;
        $horraire_fin = $tabDaySelected->horraire_fin;

        $insPlanning = $dbh->prepare("INSERT INTO planning (`id_groupe`, `date_debut`, `date_fin`) VALUES (?, ?, ?)"
                . " ON DUPLICATE KEY UPDATE  `date_debut` = ?, `date_fin` = ?");
        $insPlanning->bindParam(1, $_SESSION["id_groupe"]);
        $insPlanning->bindParam(2, $date_debut);
        $insPlanning->bindParam(3, $date_fin);


        $insPlanning->bindParam(4, $date_debut);
        $insPlanning->bindParam(5, $date_fin);

        $insPlanning->execute();

//        $idPlanning = $dbh->prepare("SELECT id FROM planning WHERE id_groupe=".$_SESSION['id_groupe'] );
//        $idPlanning->execute();
//        $id_planning->fetch(PDO::FETCH_ASSOC);

        while (strtotime($date) <= strtotime($date_fin)) {

            //Si le jour correspond au jour selectionner pour l'entrainement
            if (ltrim(strftime('%A', strtotime($date)), '0') == $day) {
//                echo "$date\n";

                $ins = $dbh->prepare("INSERT INTO entrainement (`id_groupe`, `date`, `horraire_debut`,`horraire_fin`, `lieu`)"
                        . " VALUES (?, ?, ?, ?, ?)"
                        . " ON DUPLICATE KEY UPDATE `date` = ?, `horraire_debut` = ? , `horraire_fin` = ?, `lieu` = ? ");

                $ins->bindParam(1, $_SESSION["id_groupe"]);
                $ins->bindParam(2, $date);
                $ins->bindParam(3, $horraire_debut);
                $ins->bindParam(4, $horraire_fin);
                $ins->bindParam(5, $lieu);

                $ins->bindParam(6, $date);
                $ins->bindParam(7, $horraire_debut);
                $ins->bindParam(8, $horraire_fin);
                $ins->bindParam(9, $lieu);

                $ins->execute();

//                echo json_encode($ins);
                $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
            } else {
//                $del = $dbh->prepare("DELETE FROM entrainement WHERE date= '".$date."'");
//                $del->execute();
////                echo json_encode($del);
                $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
            }
        }
    }

    //Get list day
    else if ($option == 2) {
        $prp = $dbh->prepare("SET lc_time_names = 'fr_FR'");
        $prp->execute();

        $req = $dbh->prepare("SELECT DISTINCT(DAYNAME(`date`)) day, horraire_debut, lieu, horraire_fin, date_debut, date_fin"
                . " FROM `entrainement` e"
                . " INNER JOIN planning p ON p.id_groupe = e.id_groupe "
                . " WHERE e.id_groupe = " . $_SESSION['id_groupe']);
        $req->execute();
        $listDay = $req->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($listDay);
    }

    //Suppression des dates déselected
    else if ($option == 3) {

        $unSelectedDay = json_decode(stripslashes($_POST['tabDayUnSelected']));
        $prp = $dbh->prepare("SET lc_time_names = 'fr_FR'");
        $prp->execute();
        foreach ($unSelectedDay as $row) {
            $del = $dbh->prepare("DELETE FROM entrainement WHERE DAYNAME(date)= '" . $row . "'");
            $del->execute();
        }
    }





//    echo ltrim(strftime('%A', strtotime($date)), '0');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}