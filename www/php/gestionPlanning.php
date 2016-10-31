<?php

require_once '../include/connexionBDD.php';

try {
    $option = $_POST['option'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $lieu = $_POST['lieu'];

    $tabDaySelected = json_decode(stripslashes($_POST['tabDaySelected']));
    session_start(); // On get les variables sessions
    // Set timezone
    date_default_timezone_set('UTC');
    setlocale(LC_TIME, 'fr_FR.utf8','fra');
    
    $year = date("y");
    $mois = date("m");
    $current_date = date('y-m-d');


    if (strtotime($current_date) >= strtotime($date_debut)) {
        $date = $current_date;
    }



//    if ($mois <= 12 && $mois >= 7) {
//        // End date
//        $end_date = ($year+1). '-07-01' ;
//    } else {
//        // End date
//        $end_date = $year . '-07-01' ;
//    }


    $day =  $tabDaySelected->day;
    $horraire_debut = $tabDaySelected->horraire_debut;
    $horraire_fin = $tabDaySelected->horraire_fin;
    
    
//    echo ltrim(strftime('%A', strtotime($date)), '0');
    while (strtotime($date) <= strtotime($date_fin)) {
        
        //Si le jour correspond au jour selectionner pour l'entrainement
        if(ltrim(strftime('%A', strtotime($date)), '0') == $day){
            echo "$date\n";
            
            $query;
            $ins = $dbh->prepare("INSERT INTO entrainement (`id_groupe`, `date`, `horraire_debut`,`horraire_fin`, `lieu`) VALUES (?, ?, ?, ?, ?)");
            
            $ins->bindParam(1, $_SESSION["id_groupe"]);
            $ins->bindParam(2, $date);
            $ins->bindParam(3, $horraire_debut);
            $ins->bindParam(4, $horraire_fin);
            $ins->bindParam(5, $lieu);
            
            $ins->execute();
            
            echo json_encode($ins);
            $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
            
        }
        else{
            $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
        }
        
    }


        


} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}