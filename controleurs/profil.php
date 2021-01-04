<?php

/**
 * Contrôleur du profil Utilisateur
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.connexion_inscription.php');


$vue = "profil";
$title = "Mon profil";
$alerte = "";

$infos = getUtilisateur($bdd);

$nomUser = $infos[1];
$prenomUtilisateur = $infos[5];
$emailUtilisateur = $infos[2];
$telUtilisateur = $infos[4];
$ageUtilisateur = $infos[6];

include ('vues/header.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');