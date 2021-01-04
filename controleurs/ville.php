<?php

/**
 * Contrôleur des départements
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.villes.php');

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
        //liste des villes enregistrés
        
        $vue = "ville";
        $title = "Les villes";
        
        $entete = "Voici la liste des ville déjà enregistrées :";
        
        $liste = afficheVille($bdd);
        
        if($liste){
            if(mysqli_num_rows($liste) <= 0) {
                $alerte = "Aucune ville enregistrée pour le moment";
            }
        }
        
        break;
        
    case 'ajout':
        //Ajouter une nouvelle ville
        
        $title = "Ajouter une ville";
        $vue = "ajout_ville";
        $alerte = false;
        
        $liste = recupereTous($bdd, "departement");
        
        if(mysqli_num_rows($liste) <= 0) {
            $alerte = "Aucun département enregistrée pour le moment";
        }
        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['libelle']) && isset($_POST['id_departement']) && isset($_POST['code_postal'])) {
            
            if( !estUneChaine($_POST['libelle'])) {
                $alerte = "Le libellé de la ville doit être une chaîne de caractère.";
                
            } elseif( !estUnEntier($_POST['id_departement'])) {
                $alerte = "Le numéro du département doit être un entier.";
            
            } elseif( !estUnEntier($_POST['code_postal'])) {
                $alerte = "Le code postal doit être un entier.";
                
            } else {
                
                $values =  [
                    'nom_ville' => $_POST['libelle'],
                    'code_postal' => $_POST['code_postal'],
                    'Id_Departement' => $_POST['id_departement']
                ];
                
                // Appel à la BDD à travers une fonction du modèle.
                $retour = insertion($bdd, $table, $values);
                
                if ($retour) {
                    $alerte = "Ajout réussie";
                } else {
                    $alerte = "L'ajout dans la BDD n'a pas fonctionné";
                }
            }
        }
        
        break;
        
    case 'supprimer':
        $title = "Ville";
        $vue = "ville";
        $alerte = false;
        if (supprVille($bdd, $_GET['id'])){
            $alerte = "Suppression réussi";
        }else{
            $alerte = "Échec de la suppression dans la BDD";
        }
        $entete = "Voici la liste des ville déjà enregistrées :";
        
        $liste = afficheVille($bdd);
        
        if($liste){
            if(mysqli_num_rows($liste) <= 0) {
                $alerte = "Aucune ville enregistrée pour le moment";
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
