<?php

/**
 * Contrôleur du profil Utilisateur
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.connexion_inscription.php');
include('./modele/requetes.afficher_ajouter_appareils.php');
include('./modele/requetes.appartements.php');
include('./modele/requetes.maisons.php');


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
else {$message = "";}

include('vues/' . $vue . '.php');


if ($vue == "profil") {
    $entete = "Voici la liste de vos appareils :";


    $afficherAppareils = afficherAppareils($bdd);
    if (mysqli_num_rows($afficherAppareils) <= 0) {
        $alerte = "Aucun appareil répertorié pour le moment";
    }
    include('vues/appareil.php');


    $entete = "Voici la liste de vos appartements :";
            
    $afficherAppartements = afficherAppartements($bdd);
    if (mysqli_num_rows($afficherAppartements) <= 0) {
        $alerte = "Aucun appartement répertorié pour le moment";
    }
    include('vues/appartement.php');


    $entete = "Voici la liste de vos maisons :";
        
    $afficherMaisons = afficherMaisons($bdd);
    if(mysqli_num_rows($afficherMaisons) <= 0) {
        $alerte = "Aucune maison répertoriée pour le moment";
    }
    include('vues/maison.php');
}

include('vues/footer.php');