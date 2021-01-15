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

    case 'afficherPieces':
        
        $vue = "piece";
        $title = "Pièces";
        
        $entete = "Voici la liste des pièces de l'appartement :";
        
        $afficherPieces = afficherPieces($bdd, $_GET['id']);
        
        if(mysqli_num_rows($afficherPieces) <= 0) {
            $alerte = "Aucune pièce répertoriée pour le moment";
        }
        
        break;

    case 'ajouterPiece':
    //Ajouter une nouvelle piece
        
        $title = "Ajouter une pièce";
        $vue = "ajout_piece";
        $alerte = false;
        $selectTypePiece = selectTypePiece($bdd);



        // Cette partie du code est appelée si le formulaire a été posté
        
        if (isset($_POST['libellePiece'])) {
            
            if( !estUneChaine($_POST['libellePiece'])) {
                $alerte = "Le libellé de la pièce doit être une chaîne de caractère.";
                
            } else {
                
                $values =  [
                    'libellePiece' => $_POST['libellePiece'],
                    'Id_Type_Piece' => $_POST['typePiece'],
                    'Id_Appartement' => $_GET['id']

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

    case 'modifier':

        //Modifier une pièce existante
        
        $title = "Modifier une pièce";
        $vue = "modifier_piece";
        $alerte = false;
        $getPiece = getPiece($bdd, $_GET['id']);
        $selectTypePiece = selectTypePiece($bdd);


        // Cette partie du code est appelée si le formulaire a été posté
        
        if (isset($_POST['libellePiece'])) {
            
            if( !estUneChaine($_POST['libellePiece'])) {
                $alerte = "Le libellé de la pièce doit être une chaîne de caractère.";
                
            } else {
                
                $values =  [
                    'libellePiece' => $_POST['libellePiece'],
                    'Id_Type_Piece' => $_POST['typePiece'],

                ];
                
                // Appel à la BDD à travers une fonction du modèle.
                $modifierPiece = modifierPiece($bdd, $values, ['Id_Piece' => $_GET['id']]);
                
                if ($modifierPiece) {
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
