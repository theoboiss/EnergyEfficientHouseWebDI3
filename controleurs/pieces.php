<?php

/**
 * Contrôleur de gestion des appareils
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.pieces.php');


// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
    $alerte = "";
} else {
    $function = $_GET['fonction'];
    $alerte = "";
}

switch ($function) {

    case 'ajouterPiece':
    //Ajouter une nouvel appartement
        
        $title = "Ajouter une pièce";
        $vue = "ajout_piece";
        $alerte = false;
        $selectTypePiece = selectTypePiece($bdd);
        $selectAppartement = selectAppartement($bdd);



        // Cette partie du code est appelée si le formulaire a été posté
        
        if (isset($_POST['libellePiece'])) {
            
            if( !estUneChaine($_POST['libellePiece'])) {
                $alerte = "Le libellé de la pièce doit être une chaîne de caractère.";
                
            } else {
                
                $values =  [
                    'libellePiece' => $_POST['libellePiece'],
                    'Id_Type_Piece' => $_POST['typePiece'],
                    'Id_Appartement' => $_POST['Id_Appartement']

                ];
                
                // Appel à la BDD à travers une fonction du modèle.
                $ajoutPiece = ajoutPiece($bdd, $values);
                
                if ($ajoutPiece) {
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
