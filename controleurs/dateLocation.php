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
include('./modele/requetes.location.php');


// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
    $alerte = "";
} else {
    $function = $_GET['fonction'];
    $alerte = "";
}

switch ($function) {

    case 'ajouterDateLocation':
    //Ajouter une nouvel appartement
        
        $title = "Ajouter une date de location";
        $vue = "ajout_dateLocation";
        $alerte = false;
        $selectAppartement = selectAppartement($bdd);



        // Cette partie du code est appelée si le formulaire a été posté
        if(isset($_POST['dateDebut'])) {

            if ($_POST['Id_Appartement']=="default") {
                    $alerte = "Veuillez sélectionner l'appartement. ";

            } else {

                if(!empty($_POST['dateFin'])) {
                
                    $values =  [
                        'Id_Appartement' => $_POST['Id_Appartement'],
                        'dateDebutLocation' => $_POST['dateDebut'],
                        'dateFinLocation' => $_POST['dateFin'],
                        'Id_Utilisateur' => $_SESSION['id']
                    ]; 
                } else {

                    $values =  [
                        'Id_Appartement' => $_POST['Id_Appartement'],
                        'dateDebutLocation' => $_POST['dateDebut'],
                        'Id_Utilisateur' => $_SESSION['id']
                    ];
                }
                    
                // Appel à la BDD à travers une fonction du modèle.
                $ajoutLocation = ajoutLocation($bdd, $values);
                    
                if ($ajoutLocation) {
                    $alerte = "Ajout réussi";
                } else {
                    $alerte = "L'ajout dans la BDD n'a pas fonctionné";
                }
            }
        }
        
        break;

    case 'modifier':
    //Ajouter une nouvel appartement
        
        $title = "Modifier une date de location";
        $vue = "modif_dateLocation";
        $alerte = false;



        // Cette partie du code est appelée si le formulaire a été posté
        if(isset($_POST['dateFin'])) {

            $values = [
                'dateFinLocation' => $_POST['dateFin']
            ];
                    
            // Appel à la BDD à travers une fonction du modèle.
            $modifLocation = modifLocation($bdd, $values, ['Id_Appartement' => $_GET['id'], 'dateDebutLocation' => $_GET['datedebut'], 'Id_Utilisateur' => $_SESSION['id']]);
                    
            if ($modifLocation) {
                $alerte = "Modification réussie";
                header('Location: index.php?cible=appartements&fonction=afficherAppartements');
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
