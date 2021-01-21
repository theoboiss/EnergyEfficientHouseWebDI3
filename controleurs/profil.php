<?php

/**
 * Contrôleur du profil Utilisateur
 */

// on inclut le fichier modèle contenant les appels à la BDD
if(!isset($_SESSION['etat'])) {
    $function = "";
    $vue = "accueil";
    $title = "Accueil";
    $alerte = "Vous devez vous connecter";
    include ('vues/header.php');
    include ('vues/' . $vue . '.php');
    include ('vues/footer.php');
    exit();
}
include('./modele/requetes.profil.php');


$vue = "profil";
$title = "Mon profil";
$alerte = "";

include('vues/header.php');


$infos = getUtilisateur($bdd);

$nomUser = $infos[1];
$prenomUtilisateur = $infos[5];
$emailUtilisateur = $infos[2];
$telUtilisateur = $infos[4];
$ageUtilisateur = $infos[6];

if (isset($_GET['modif'])) {$message = "<p><strong><i>Changements effectués</i></strong></p>";}
if (isset($_GET['nomodif'])) {$message = "<p><strong><i>Aucun changements</i></strong></p>";}
else {$message = "";}

include('vues/' . $vue . '.php');


if ($vue == "profil") {
    include('./modele/requetes.afficher_ajouter_appareils.php');
    $afficherAppareils = afficherAppareils($bdd);
    if (mysqli_num_rows($afficherAppareils) > 0) {
        $entete = "Voici la liste de vos appareils :";
        include('vues/appareil.php');
    }
    
    include('./modele/requetes.appartements.php');
    $afficherAppartements = afficherAppartements($bdd);
    if (mysqli_num_rows($afficherAppartements) > 0) {
        $entete = "Voici la liste de vos appartements :";
        include('vues/appartement.php');
    }
    
    include('./modele/requetes.maisons.php');
    $afficherMaisons = afficherMaisons($bdd);
    if(mysqli_num_rows($afficherMaisons) > 0) {
        $entete = "Voici la liste de vos maisons :";
        include('vues/maison.php');
    }
}

include('vues/footer.php');