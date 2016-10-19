<?php
mb_internal_encoding('UTF-8');
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
header('Content-type: text/html; charset=UTF-8');
session_start();

$id_player = $_SESSION['id'];
$id_groupe = $_SESSION['id_groupe'];
$derby_name = utf8_decode($_SESSION['derby_name']);
$privilege = $_SESSION['privilege'];
$statut_in_groupe = $_SESSION['statut_in_groupe'];
$nom_groupe = $_SESSION['nom_groupe'];

$tabSession = array( 
  "id_player" => $id_player,
  "id_groupe" => $id_groupe,
  "derby_name" => $derby_name,
  "privilege" => $privilege,
  "statut_in_groupe" => $statut_in_groupe,
  "nom_groupe" => $nom_groupe,
);
        
echo json_encode($tabSession);