<?php

/**
 * Contrôleur du profil Utilisateur
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.connexion_inscription.php');
include('./modele/requetes.afficher_ajouter_appareils.php');


$vue = "profil";
$title = "Mon profil";
$alerte = "";

$infos = getUtilisateur($bdd);

$nomUser = $infos[1];
$prenomUtilisateur = $infos[5];
$emailUtilisateur = $infos[2];
$telUtilisateur = $infos[4];
$ageUtilisateur = $infos[6];


$entete = "Voici la liste de vos appareils :";

if (isset($_GET['modif'])) {$message = "<p><strong><i>Changements effectués</i></strong></p>";}
else {$message = "";}

$afficherAppareils = afficherAppareils($bdd);
if (mysqli_num_rows($afficherAppareils) <= 0) {
    $alerte = "Aucun appareil répertorié pour le moment";
}

include ('vues/header.php');
include ('vues/' . $vue . '.php');
include ('vues/appareil.php');
include ('vues/footer.php');