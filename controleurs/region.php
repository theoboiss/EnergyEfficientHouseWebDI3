<?php

/**
 * Contrôleur des régions
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.region.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "liste";
    $alerte = "";
} else {
    $function = $_GET['fonction'];
    $alerte = "";
}

switch ($function) {
    
    case 'liste':
        //liste des régions enregistrés
        
        $vue = "regions";
        $title = "Les régions";
        
        $entete = "Voici la liste des régions déjà enregistrées :";
        
        $liste = recupereTous($bdd, $table);
        
        if(mysqli_num_rows($liste) <= 0) {
            $alerte = "Aucune région enregistrée pour le moment";
        }
        
        break;
        
    case 'ajout':
        //Ajouter une nouvelle région
        
        $title = "Ajouter une région";
        $vue = "ajout_region";
        $alerte = false;
        
        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['libelle'])) {
            
            if( !estUneChaine($_POST['libelle'])) {
                $alerte = "Le libellé de la région doit être une chaîne de caractère.";
                
            } else {
                
                $values =  [
                    'LibRegion' => $_POST['libelle']
                ];
                
                // Appel à la BDD à travers une fonction du modèle.
                $retour = insertion($bdd, $values, $table);
                
                if ($retour) {
                    $alerte = "Ajout réussie";
                } else {
                    $alerte = "L'ajout dans la BDD n'a pas fonctionné";
                }
            }
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
