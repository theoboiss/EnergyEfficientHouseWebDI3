<?php

/**
 * Contrôleur de gestion des appareils
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.afficher_ajouter_appareils.php');


// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
    $alerte = "";
} else {
    $function = $_GET['fonction'];
    $alerte = "";
}

switch ($function) {
    
    case 'afficherAppareils':
        
        $vue = "appareil";
        $title = "Mes Appareils";
        
        $entete = "Voici la liste de vos appareils :";
        
        $afficherAppareils = afficherAppareils($bdd);
        
        if(mysqli_num_rows($afficherAppareils) <= 0) {
            $alerte = "Aucun appareil répertorié pour le moment";
        }
        
        break;
        
    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('vues/header.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');

