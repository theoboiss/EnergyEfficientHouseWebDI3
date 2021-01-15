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
include('./modele/requetes.propriete.php');


// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
    $alerte = "";
} else {
    $function = $_GET['fonction'];
    $alerte = "";
}

switch ($function) {

    case 'ajouterDatePropriete':
    //Ajouter une nouvel appartement
        
        $title = "Ajouter une date de propriété";
        $vue = "ajout_datePropriete";
        $alerte = false;
        $selectMaison = selectMaison($bdd);



        // Cette partie du code est appelée si le formulaire a été posté
        
        if (isset($_POST['dateDebut'])) {

            if ($_POST['Id_Maison']=="default") {
                    $alerte = "Veuillez sélectionner la maison. ";

            } elseif (empty($_POST['dateDebut'])) {
                $alerte = "Veuillez indiquer une date de début de propriété. ";

            } else {

                if (!empty($_POST['dateFin'])) {
                
                     $values =  [
                        'Id_Maison' => $_POST['Id_Maison'],
                        'dateDebutPropriete' => $_POST['dateDebut'],
                        'dateFinPropriete' => $_POST['dateFin'],
                        'Id_Utilisateur' => $_SESSION['id']
                    ];

                } else {

                    $values =  [
                        'Id_Maison' => $_POST['Id_Maison'],
                        'dateDebutPropriete' => $_POST['dateDebut'],
                        'Id_Utilisateur' => $_SESSION['id']
                    ];

                }
                    
                // Appel à la BDD à travers une fonction du modèle.
                $ajoutPropriete = ajoutPropriete($bdd, $values);
                    
                if ($ajoutPropriete) {
                    $alerte = "Ajout réussi";
                } else {
                    $alerte = "L'ajout dans la BDD n'a pas fonctionné";
                }
            }
        }
        
        break;

        case 'modifier':
    //Ajouter une nouvel appartement
        
        $title = "Modifier une date de propriété";
        $vue = "modif_datePropriete";
        $alerte = false;



        // Cette partie du code est appelée si le formulaire a été posté
        if(isset($_POST['dateFin'])) {

            $values = [
                'dateFinPropriete' => $_POST['dateFin']
            ];
                    
            // Appel à la BDD à travers une fonction du modèle.
            $modifPropriete = modifPropriete($bdd, $values, ['Id_Maison' => $_GET['id'], 'dateDebutPropriete' => $_GET['datedebut'], 'Id_Utilisateur' => $_SESSION['id']]);
                    
            if ($modifPropriete) {
                $alerte = "Modification réussie";
                header('Location: index.php?cible=maisons&fonction=afficherMaisons');
                exit();
            } else {
                $alerte = "La modification dans la BDD n'a pas fonctionné";
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
