<?php

/**
 * Contrôleur des départements
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.departement.php');

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
        //liste des départements enregistrés
        
        $vue = "departements";
        $title = "Les départements";
        
        $entete = "Voici la liste des départements déjà enregistrées :";
        
        $liste = afficheDept($bdd);
        
        if($liste){
            if(mysqli_num_rows($liste) <= 0) {
                $alerte = "Aucun département enregistrée pour le moment";
            }
        }
        
        break;
        
    case 'ajout':
        //Ajouter une nouvelle région
        
        $title = "Ajouter un départements";
        $vue = "ajout_departement";
        $alerte = false;
        
        $liste = recupereTous($bdd, "region");
        
        if(mysqli_num_rows($liste) <= 0) {
            $alerte = "Aucune région enregistrée pour le moment";
        }
        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['libelle']) && isset($_POST['idRegion'])) {
            
            if( !estUneChaine($_POST['libelle'])) {
                $alerte = "Le libellé du département doit être une chaîne de caractère.";
                
            } elseif( !estUnEntier($_POST['idRegion'])) {
                $alerte = "Le numéro de la région doit être un entier.";
                
            } else {
                
                $values =  [
                    'nomDepartement' => $_POST['libelle'],
                    'Id_Region' => $_POST['idRegion']
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
        //modifier un département enregistré
        $vue = "modif_departement";
        $title = "Modifier un département";
        $alerte = false;
        $liste = getDepartement($bdd, $_GET['id']);
        $selectRegion = recupereTous($bdd, "region");

        if(isset($_POST['libelle']) && isset($_POST['Id_Region'])){
            if(!estUneChaine(($_POST['libelle']))){
                $alerte = "Le nom du département doit être une chaine";
            }else if(!estUnEntier($_POST['Id_Region'])){
                $alerte = "l'Id de la région doit être un entier";
            }else{
                $modifDept = metAJour($bdd, "departement", ['nomDepartement' => $_POST['libelle'], 'Id_Region' => $_POST['Id_Region']], ['Id_Departement' => $_GET['id']]);
                if($modifDept){
                    $alerte = "Modification réussite";
                }else{
                    $alerte = "Échec de la modification dans la BDD";
                }
            }
        }

        break;
    
    case 'supprimer':
       //supprimer un département enregistré
            
        $vue = "departements";
        $title = "Les départements";
        if (supprDept($bdd, $_GET['id'])){
            $alerte = "Suppression réussi";
        }else{
            $alerte = "Échec de la suppression dans la BDD";
        }    
        $entete = "Voici la liste des départements déjà enregistrées :";
            
            $liste = afficheDept($bdd);
            
            if($liste){
                if(mysqli_num_rows($liste) <= 0) {
                    $alerte = "Aucun département enregistrée pour le moment";
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
