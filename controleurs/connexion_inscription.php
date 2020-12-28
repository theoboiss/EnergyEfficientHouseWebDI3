<?php

/**
 * Contrôleur des connexions Utilisateur
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.connexion_inscription.php');

if (!isset($_POST['fonction']) || empty($_POST['fonction'])) {
    $function = "";
    $vue = "connexion_inscription";
    $title = "Connexion/Inscription";
    $alerte = "";
} else if (!isset($_POST['nomUser']) || empty($_POST['nomUser'])
        || !isset($_POST['emailUtilisateur']) || empty($_POST['emailUtilisateur'])
        || !isset($_POST['mdpUtilisateur']) || empty($_POST['mdpUtilisateur'])
        || !isset($_POST['prenomUtilisateur']) || empty($_POST['prenomUtilisateur'])
        || !isset($_POST['ageUtilisateur']) || empty($_POST['ageUtilisateur']) ) {
    $function = "";
    $vue = "connexion_inscription";
    $title = "Connexion/Inscription";
    $alerte = "Formulaire incomplet";
} else {
    $function = $_POST['fonction'];
    $alerte = "";
    $nomUser = $_POST['nomUser'];
    $mdpUtilisateur = $_POST['mdpUtilisateur'];

    switch (utilisateurExiste($bdd, $nomUser)) {
        case 1:
            //Si l'utilisateur existe deja
            switch ($function) {
                case 'connexion':
                    //Verifie le mdp
                    $vue = "connexion_inscription";
                    $title = "Connexion/Inscription";

                    $result = connexionUtilisateur($bdd, $nomUser, $mdpUtilisateur);
                    if ($result) {
                        if (!mysqli_num_rows($result)) {
                            $alerte = "Mot de passe incorrect";
                        } else {
                            $alerte = "Connecte en tant que " . $nomUser;
                        }
                    } else {
                        echo "Echec lors de la connexion, veuillez reessayer plus tard ou nous contacter";
                    }
                    break;

                case 'inscription':
                    //Alerte que le compte existe deja
                    $vue = "connexion_inscription";
                    $title = "Connexion/Inscription";

                    $alerte = "Ce nom d'utilisateur est deja pris";
                    break;
            }
            break;
        
        case 0:
            switch ($function) {
                case 'connexion':
                    //Alerte que le compte n'existe pas
                    $vue = "connexion_inscription";
                    $title = "Connexion/Inscription";

                    $result = connexionUtilisateur($bdd, $nomUser, $mdpUtilisateur);
                    if ($result) {
                        if (!mysqli_num_rows($result)) {
                            $alerte = "Ce compte n'existe pas";
                        } else {
                            $vue = "accueil";
                        }
                    }
                    else {
                        echo "Echec lors de la connexion, veuillez reessayer plus tard ou nous contacter";
                    }
                    break;

                case 'inscription':
                    //Insere le compte dans la BDD
                    $vue = "connexion_inscription";
                    $title = "Connexion/Inscription";

                    if ($mdpUtilisateur == $_POST['mdpUtilisateurVerification']) {
                        $emailUtilisateur = $_POST['emailUtilisateur'];
                        $prenomUtilisateur = $_POST['prenomUtilisateur'];
                        $telUtilisateur = $_POST['telUtilisateur'];
                        $ageUtilisateur = $_POST['ageUtilisateur'];
                        if (!insererUtilisateurDDB($bdd,$nomUser,$emailUtilisateur,$mdpUtilisateur,$prenomUtilisateur,$ageUtilisateur,$telUtilisateur)) {
                            $alerte = "Echec lors de l'inscription, veuillez reessayer plus tard ou nous contacter";
                        } else {
                            $vue = "accueil";
                        }
                    }
                    else {
                        $alerte = "Votre mot de passe ne correspond pas avec votre mot de passe de confirmation";
                    }
                    break;
            }
            break;
            
        default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
    }
}

include ('vues/header.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');