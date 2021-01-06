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
        
        if($liste){
            if(mysqli_num_rows($liste) <= 0) {
                $alerte = "Aucune région enregistrée pour le moment";
            }else{

            }
        }
        
        break;
        
    case 'ajout':
        //Ajouter une nouvelle région
        
        $title = "Ajouter une région";
        $vue = "ajout_region";
        $liste = [
            ["nomRegion" => " "]
        ];
        $alerte = false;
        
        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['libelle'])) {
            
            if( !estUneChaine($_POST['libelle'])) {
                $alerte = "Le libellé de la région doit être une chaîne de caractère.";
                
            } else {
                
                $values =  [
                    'nomRegion' => $_POST['libelle']
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

    case 'modifier':

        $vue = "ajout_region";
        $title = "Modifier une région";
        $alerte = false;
        $liste = getRegion($bdd, $_GET['id']);

        if(isset($_POST['libelle'])){
            if(!estUneChaine($_POST['libelle'])){
                $alerte = "Le nom de Région doit être une chaine de caractère";
            }else{
                $modifRegion = metAJour($bdd, "region", ['nomRegion' => $_POST['libelle']], ['Id_Region' => $_GET['id']]);
                if($modifRegion){
                    $alerte = "Modification réussite";
                }else{
                    $alerte = "Échec de la modification dans la BDD";
                }

            }
        }
        
        break;

    case 'supprimer':

        $vue = "regions";
        $title = "Les régions";
        if (supprRegion($bdd, $_GET['id'])){
            $alerte = "Suppression réussi";
        }else{
            $alerte = "Échec de la suppression dans la BDD";
        }
        $entete = "Voici la liste des régions déjà enregistrées :";
        
        $liste = recupereTous($bdd, $table);
        
        if($liste){
            if(mysqli_num_rows($liste) <= 0) {
                $alerte = "Aucune région enregistrée pour le moment";
            }else{

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
