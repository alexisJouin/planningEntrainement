<?php

require_once '../include/connexionBDD.php'; // connexion avec la base de données

try {

    session_start();
    $option = $_POST['option'];
    $output = "";

    if ($option == 1) {
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];



        $allEntrainement = $dbh->prepare("SELECT  e.id, DATE_FORMAT( `date` , '%d/%m/%Y') date, horraire_debut, lieu, horraire_fin, date_debut, date_fin"
                . " FROM `entrainement` e"
                . " INNER JOIN planning p ON p.id_groupe = e.id_groupe"
                . " WHERE e.id_groupe = " . $_SESSION['id_groupe'] . " AND e.date BETWEEN '" . $date_debut . "' AND '" . $date_fin . "'");
        $allEntrainement->execute();
        $listEntrainement = $allEntrainement->fetchAll(PDO::FETCH_ASSOC);


//        $fp = fopen('export_presence.csv', 'w');
//
//        foreach ($listEntrainement as $fields) {
//            fputcsv($fp, $fields);
//        }
//
//        fclose($fp);
//        
//        
        //<div class='dt-buttons'><a class='dt-button buttons-copy buttons-html5' tabindex='0' aria-controls='$row[id]' href='#'><span>Copy</span></a><a class='dt-button buttons-csv buttons-html5' tabindex='0' aria-controls='$row[id]' href='#'><span>CSV</span></a><a class='dt-button buttons-excel buttons-html5' tabindex='0' aria-controls='$row[id]' href='#'><span>Excel</span></a><a class='dt-button buttons-pdf buttons-html5' tabindex='0' aria-controls='$row[id]' href='#'><span>PDF</span></a><a class='dt-button buttons-print' tabindex='0' aria-controls='$row[id]' href='#'><span>Print</span></a></div>
                


        foreach ($listEntrainement as $row) {
            $output .= "
            <div id='div$row[id]' class='row' style='height:300px;overflow:scroll;'>
                <li class='liTable' style='cursor:pointer;'>
                    <p>$row[date]</p>
                
                    <table id='$row[id]' class='table table-striped' cellspacing='0' width='100%' style='display:none;'>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Derby Name</th>
                            </tr>
                        </thread>
                        <tbody>";

            $allPlayer = $dbh->prepare("SELECT  pl.id player_id,pr.id presence_id, e.id id_entrainement, pl.nom nom, pl.prenom prenom, pl.derby_name derby_name, pr.statut
                                        FROM `entrainement` e
                                        INNER JOIN presence pr ON pr.id_entrainement = e.id
                                        INNER JOIN player pl ON pl.id = pr.id_player
                                        WHERE e.id_groupe = " . $_SESSION['id_groupe'] . " AND e.id=$row[id]");
            $allPlayer->execute();
            $listPlayer = $allPlayer->fetchAll(PDO::FETCH_ASSOC);

            foreach ($listPlayer as $rowPlayer) {
                $output .= "
                        <tr>
                            <td> $rowPlayer[nom] </td>                                   
                            <td> $rowPlayer[prenom] </td>                                   
                            <td> $rowPlayer[derby_name] </td>
                        </tr>
                    ";
            }

            $output .= "
                        </tbody>
                    </table>

                    </li>
                    <li class='buttonLi'><a href='#'><img src='js/dataTableExport/images/json.jpg' width='24px'> JSON</a></li>
                </div>
            ";
        }

        //<button id='buttonExportExcelExcel$row[id]' style='display:none;'>Exporter Excel</button>
//                <button id='buttonExportExcelPDF$row[id]' style='display:none;'>Exporter PDF</button>

        echo $output;



        $allPlayer = null;
    } elseif ($option == 2) {
        
    }
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}