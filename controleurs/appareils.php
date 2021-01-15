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

    case 'ajoutAppareil':
        //Ajouter une nouvel appareil
        
        $title = "Ajouter un appareil";
        $vue = "ajout_appareil";
        $alerte = false;
        $selectPiece = selectPiece($bdd);
        $selectTypeAppareil = selectTypeAppareil($bdd);


        if(mysqli_num_rows($selectTypeAppareil) <= 0) {
            $alerte = "Aucun type d'appareil répertorié pour le moment";
        }

        if(mysqli_num_rows($selectPiece) <= 0) {
            $alerte = "Aucune pièce répertoriée pour le moment";
        }


        // Cette partie du code est appelée si le formulaire a été posté
        
        if (isset($_POST['libelle'])) {
            
            if( !estUneChaine($_POST['libelle'])) {
                $alerte = "Le libellé de l'appareil doit être une chaîne de caractère.";
                
            } else if (!estUneChaine($_POST['lieu'])) {
                $alerte = "Le lieu doit être une chaîne de caractère. ";

            } else if (!($_POST['Id_Piece'])) {
                $alerte = "Veuillez sélectionner une pièce. ";

            } else if ($_POST['Id_TypeAppareil']=="default") {
                $alerte = "Veuillez sélectionner le type de l'appareil. ";

            } else if ($_POST['Id_Piece']=="default") {
                $alerte = "Veuillez sélectionner la pièce. ";

            } else {
                
                $values =  [
                    'libelleAppareil' => $_POST['libelle'],
                    'lieuAppareil' => $_POST['lieu'],
                    'videoAppareil' => $_POST['video'],
                    'descriptionAppareil' => $_POST['description'],
                    'Id_Piece' => $_POST['Id_Piece'],
                    'Id_Type_Appareil' => $_POST['Id_TypeAppareil']

                ];
                
                // Appel à la BDD à travers une fonction du modèle.
                $ajoutAppareil = ajoutAppareil($bdd, $values);
                
                if ($ajoutAppareil) {
                    $alerte = "Ajout réussi";
                } else {
                    $alerte = "L'ajout dans la BDD n'a pas fonctionné";
                }
            }
        }
        
        break;

        case 'modifier':

        //Modifier un appareil existant
        
        $title = "Modifier un appareil";
        $vue = "modifier_appareil";
        $alerte = false;
        $selectPiece = selectPiece($bdd);
        $selectTypeAppareil = selectTypeAppareil($bdd);
        $getAppareil = getAppareil($bdd, $_GET['id']);

        if(mysqli_num_rows($selectTypeAppareil) <= 0) {
            $alerte = "Aucun type d'appareil répertorié pour le moment";
        }

        if(mysqli_num_rows($selectPiece) <= 0) {
            $alerte = "Aucune pièce répertoriée pour le moment";
        }


        // Cette partie du code est appelée si le formulaire a été posté
        
        if (isset($_POST['libelle'])) {
            
            if( !estUneChaine($_POST['libelle'])) {
                $alerte = "Le libellé de l'appareil doit être une chaîne de caractère.";
                
            } else if (!estUneChaine($_POST['lieu'])) {
                $alerte = "Le lieu doit être une chaîne de caractère. ";

            } else if (!($_POST['Id_Piece'])) {
                $alerte = "Veuillez sélectionner une pièce. ";

            } else if ($_POST['Id_TypeAppareil']=="default") {
                $alerte = "Veuillez sélectionner le type de l'appareil. ";

            } else if ($_POST['Id_Piece']=="default") {
                $alerte = "Veuillez sélectionner la pièce. ";

            } else {
                
                $values =  [
                    'libelleAppareil' => $_POST['libelle'],
                    'lieuAppareil' => $_POST['lieu'],
                    'videoAppareil' => $_POST['video'],
                    'descriptionAppareil' => $_POST['description'],
                    'Id_Piece' => $_POST['Id_Piece'],
                    'Id_Type_Appareil' => $_POST['Id_TypeAppareil']

                ];
                
                // Appel à la BDD à travers une fonction du modèle.
                $modifierAppareil = modifierAppareil($bdd, $values, ['Id_Appareil' => $_GET['id']]);
                
                if ($modifierAppareil) {
                    $alerte = "Modification réussie";
                    header('Location: index.php?cible=appareils&fonction=afficherAppareils');
                    exit();
                } else {
                    $alerte = "La modifiaction dans la BDD n'a pas fonctionné";
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

