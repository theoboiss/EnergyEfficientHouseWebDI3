<?php

/**
 * Contrôleur de gestion des appareils
 */

// on inclut le fichier modèle contenant les appels à la BDD
if(!isset($_SESSION['etat'])) {
    $function = "";
    $vue = "accueil";
    $title = "Accueil";
    $alerte = "Vous devez vous connecter";
    include('vues/header.php');
    include('vues/' . $vue . '.php');
    include('vues/footer.php');
    exit();
}
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

    case 'ajoutMaison':
    //Ajouter une nouvel appartement
        
        $title = "Ajouter une maison";
        $vue = "ajout_maison";
        $alerte = false;
        $selectAdresse = selectAdresse($bdd);


        // Cette partie du code est appelée si le formulaire a été posté
        
        if (isset($_POST['nomMaison'])) {
            
            if( !estUneChaine($_POST['nomMaison'])) {
                $alerte = "Le nom de la maison doit être une chaîne de caractère.";

            } else if (!estUnEntier($_POST['degreIsolation'])) {
                $alerte = "Le degré d'isolation doit être un entier. ";

            } else if (!estUnEntier($_POST['evaluationBase'])) {
                $alerte = "L'évaluation de base doit être un entier. ";

            } else if ($_POST['Id_Adresse']=="default") {
                $alerte = "Veuillez sélectionner l'adresse. ";
                
            } else {

                $valuesMaison =  [
                    'nomMaison' => $_POST['nomMaison'],
                    'degreIsolation' => $_POST['degreIsolation'],
                    'evaluationBase' => $_POST['evaluationBase'],
                    'Id_Adresse' => $_POST['Id_Adresse']

                ];
                
                // Appel à la BDD à travers une fonction du modèle.
                $ajoutMaison = ajoutMaison($bdd, $valuesMaison);
                
                if ($ajoutMaison) {
                    $alerte = "Ajout réussi";
                } else {
                    $alerte = "L'ajout dans la BDD n'a pas fonctionné";
                }
            }
        }
        
        break;

    case 'modifier':

        //Modifier une maison existante
        
        $title = "Modifier une maison";
        $vue = "modifier_maison";
        $alerte = false;
        $getMaison = getMaison($bdd, $_GET['id']);


        // Cette partie du code est appelée si le formulaire a été posté
        
        if (isset($_POST['nomMaison'])) {
            
            if( !estUneChaine($_POST['nomMaison'])) {
                $alerte = "Le nom de la maison doit être une chaîne de caractère.";

            } else if (!estUnEntier($_POST['degreIsolation'])) {
                $alerte = "Le degré d'isolation doit être un entier. ";

            } else if (!estUnEntier($_POST['evaluationBase'])) {
                $alerte = "L'évaluation de base doit être un entier. ";

            } else {

                $valuesMaison =  [
                    'nomMaison' => $_POST['nomMaison'],
                    'degreIsolation' => $_POST['degreIsolation'],
                    'evaluationBase' => $_POST['evaluationBase'],

                ];
                
                // Appel à la BDD à travers une fonction du modèle.
                $modifierMaison = modifierMaison($bdd, $valuesMaison, ['Id_Maison' => $_GET['id']]);
                
                if ($modifierMaison) {
                    $alerte = "Modification réussie";
                    header('Location: index.php?cible=maisons&fonction=afficherMaisons');
                    exit();
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