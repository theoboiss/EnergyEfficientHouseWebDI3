<?php

/**
 * Contrôleur de gestion des appareils
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.adresses.php');


// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
    $alerte = "";
} else {
    $function = $_GET['fonction'];
    $alerte = "";
}

switch ($function) {

    case 'ajoutAdresse':
    //Ajouter une nouvel appartement
        
        $title = "Ajouter une adresse";
        $vue = "ajout_adresse";
        $alerte = false;
        $selectVille = selectVille($bdd);


        // Cette partie du code est appelée si le formulaire a été posté
        
        if (isset($_POST['rue'])) {
            
            if( !estUneChaine($_POST['rue'])) {
                $alerte = "La rue doit être une chaîne de caractère.";


            } else if (!estUnEntier($_POST['numMaison'])) {
                $alerte = "Le numéro de la maison doit être un entier. ";


            } else if ($_POST['Id_Ville']=="default") {
                $alerte = "Veuillez sélectionner la ville. ";
                
            } else {

                $values =  [
                    'numMaison' => $_POST['numMaison'],
                    'rue' => $_POST['rue'],
                    'Id_Ville' => $_POST['Id_Ville']

                ];
                
                // Appel à la BDD à travers une fonction du modèle.
                $ajoutAdresse = ajoutAdresse($bdd, $values);
                
                if ($ajoutAdresse) {
                    $alerte = "Ajout réussi";
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

?>