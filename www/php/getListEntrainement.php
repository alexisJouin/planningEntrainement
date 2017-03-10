<?php

require_once '../include/connexionBDD.php'; // connexion avec la base de données

try {

    session_start();
    $option = $_POST['option'];
    
    if($option == 1){
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];

        $req = $dbh->prepare("SELECT  e.id, DATE_FORMAT( `date` , '%d/%m/%Y') date, horraire_debut, lieu, horraire_fin, date_debut, date_fin"
                . " FROM `entrainement` e"
                . " INNER JOIN planning p ON p.id_groupe = e.id_groupe "
                . " WHERE e.id_groupe = " . $_SESSION['id_groupe'] . " AND e.date BETWEEN '" . $date_debut . "' AND '" . $date_fin . "'");
        $req->execute();
        $listEntrainement = $req->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($listEntrainement);



        $req = null;
    }
    
    else if($option == 2){
        $id = $_POST['id'];
        $horraire_debut = $_POST['horraire_debut'];
        $horraire_fin = $_POST['horraire_fin'];
        $lieu = $_POST['lieu'];
        
        $upd = $dbh->prepare("UPDATE entrainement SET horraire_debut='".$horraire_debut."', horraire_fin = '".$horraire_fin."', lieu = ? WHERE id=".$id);
        $upd->bindParam(1, $lieu);
        $upd->execute();
        echo json_encode($upd);
    }
    
    else if($option == 3){
        $id = $_POST['id'];
        $del = $dbh->prepare("DELETE FROM entrainement WHERE id=".$id);
        $del->execute();
        echo json_encode($del);   
    }
    
    else if($option == 4){
        $date = $_POST['date'];
        $horraire_debut = $_POST['horraire_debut'];
        $horraire_fin = $_POST['horraire_fin'];
        $lieu = $_POST['lieu'];
        $ins = $dbh->prepare("INSERT INTO entrainement (`date`, horraire_debut, horraire_fin, id_groupe, lieu )"
                . " VALUES ('".$date."', '".$horraire_debut."', '".$horraire_fin."', ".$_SESSION['id_groupe'].", ? )");
        $ins->bindParam(1, $lieu);
        
        $ins->execute();
        echo json_encode($ins);   
    }
    
    //Get list entrainement pour la page main
    else if($option == 5){
        date_default_timezone_set('UTC');
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

        $current_date = date('y-m-d');
        $datePeriode_fin = date('Y-m-d', strtotime("+3 week"));
        
        $req = $dbh->prepare("SELECT  id, `date`, DATE_FORMAT(`horraire_debut`,'%H:%i') horraire_debut, lieu, DATE_FORMAT(`horraire_fin`,'%H:%i') horraire_fin, etat"
                . " FROM `entrainement` "
                . " WHERE id_groupe = " . $_SESSION['id_groupe'] . " AND date BETWEEN '" . $current_date . "' AND '" . $datePeriode_fin . "' ORDER BY date");
        $req->execute();
        $listEntrainement = $req->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($listEntrainement);
    }
    
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}