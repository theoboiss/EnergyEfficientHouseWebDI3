<?php

/**
 * Contrôleur de gestion des appareils
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.maisons.php');


// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
    $alerte = "";
} else {
    $function = $_GET['fonction'];
    $alerte = "";
}

switch ($function) {
    
    case 'afficherMaisons':
        
        $vue = "maison";
        $title = "Mes Maisons";
        
        $entete = "Voici la liste de vos maisons :";
        
        $afficherMaisons = afficherMaisons($bdd);
        
        if(mysqli_num_rows($afficherMaisons) <= 0) {
            $alerte = "Aucune maison répertoriée pour le moment";
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

?>