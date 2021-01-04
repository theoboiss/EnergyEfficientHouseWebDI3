<?php

/**
 * Contrôleur de gestion des appareils
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.appartements.php');


// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
    $alerte = "";
} else {
    $function = $_GET['fonction'];
    $alerte = "";
}

switch ($function) {
    
    case 'afficherAppartements':
        
        $vue = "appartement";
        $title = "Mes Appartements";
        
        $entete = "Voici la liste de vos appartements :";
        
        $afficherAppartements = afficherAppartements($bdd);
        
        if(mysqli_num_rows($afficherAppartements) <= 0) {
            $alerte = "Aucun appartement répertorié pour le moment";
        }
        
        break;

    case 'ajoutAppartement':
    //Ajouter une nouvel appartement
        
        $title = "Ajouter un appartement";
        $vue = "ajout_appartement";
        $alerte = false;
        $selectTypeAppartement = selectTypeAppartement($bdd);
        $selectMaison = selectMaison($bdd);


        // Cette partie du code est appelée si le formulaire a été posté
        
        if (isset($_POST['libelle'])) {
            
            if( !estUneChaine($_POST['libelle'])) {
                $alerte = "Le libellé de l'appartement doit être une chaîne de caractère.";
                
            } else if (!estUnEntier($_POST['degreSecuriteAppartement'])) {
                $alerte = "Le degré de sécurité doit être un entier. ";

            } else if ($_POST['typeAppartement']=="default") {
                $alerte = "Veuillez sélectionner le type de l'appartement. ";

            } else if ($_POST['maison']=="default") {
                $alerte = "Veuillez sélectionner une maison. ";

            } else {
                
                $values =  [
                    'libelleAppartement' => $_POST['libelle'],
                    'degreSecuriteAppartement' => $_POST['degreSecuriteAppartement'],
                    'Id_Type_Appartement' => $_POST['typeAppartement'],
                    'Id_Maison' => $_POST['maison']

                ];
                
                // Appel à la BDD à travers une fonction du modèle.
                $ajoutAppartement = ajoutAppartement($bdd, $values);
                
                if ($ajoutAppartement) {
                    $alerte = "Ajout réussi";
                } else {
                    $alerte = "L'ajout dans la BDD n'a pas fonctionné";
                }
            }
        }
        
        break;

        case 'modifier':

        //Modifier un appartement existant
        
        $title = "Modifier un appartement";
        $vue = "modifier_appartement";
        $alerte = false;
        $selectTypeAppartement = selectTypeAppartement($bdd);
        $selectMaison = selectMaison($bdd);
        $getAppartement = getAppartement($bdd, $_GET['id']);


        // Cette partie du code est appelée si le formulaire a été posté
        
        if (isset($_POST['libelle'])) {
            
            if( !estUneChaine($_POST['libelle'])) {
                $alerte = "Le libellé de l'appartement doit être une chaîne de caractère.";
                
            } else if (!estUnEntier($_POST['degreSecuriteAppartement'])) {
                $alerte = "Le degré de sécurité doit être un entier. ";

            } else if ($_POST['typeAppartement']=="default") {
                $alerte = "Veuillez sélectionner le type de l'appartement. ";

            } else if ($_POST['maison']=="default") {
                $alerte = "Veuillez sélectionner une maison. ";

            } else {
                
                $values =  [
                    'libelleAppartement' => $_POST['libelle'],
                    'degreSecuriteAppartement' => $_POST['degreSecuriteAppartement'],
                    'Id_Type_Appartement' => $_POST['typeAppartement'],

                ];
                
                // Appel à la BDD à travers une fonction du modèle.
                $modifierAppartement = modifierAppartement($bdd, $values, ['Id_Appartement' => $_GET['id']]);
                
                if ($modifierAppartement) {
                    $alerte = "Modification réussie";
                } else {
                    $alerte = "La modification dans la BDD n'a pas fonctionné";
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

?>
