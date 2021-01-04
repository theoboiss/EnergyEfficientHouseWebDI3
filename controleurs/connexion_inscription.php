<?php

/**
 * Contrôleur des connexions Utilisateur
 * 
 * Après s'être connecté, l'utilisateur se voit attribué les variables de session 'id', 'name' et 'etat'. Il les perd s'il se déconnecte.
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.connexion_inscription.php');

if (isset($_SESSION['etat']) && $_SESSION['etat'] == 'actif') {
    $_SESSION['etat'] = etatUtilisateurDDB($bdd, 'inactif', $_SESSION['id']);
    if (session_unset()) {
        $alerte = "Deconnecte";
    }

    $function = "";
    $vue = "accueil";
    $title = "Acceuil";
} else if (!isset($_POST['fonction']) || empty($_POST['fonction'])) {
    $function = "";
    $vue = "connexion_inscription";
    $title = "Connexion/Inscription";
    $alerte = "";
} else if (!isset($_POST['nomUser'])        || empty($_POST['nomUser'])
        || !isset($_POST['mdpUtilisateur']) || empty($_POST['mdpUtilisateur']) ) {
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
                case 'Connexion':
                    //Verifie le mdp
                    $vue = "connexion_inscription";
                    $title = "Connexion/Inscription";

                    $result = connexionUtilisateur($bdd, $nomUser, $mdpUtilisateur);
                    if ($result) {
                        $nbComptes = mysqli_num_rows($result);
                        if (!$nbComptes) {
                            $alerte = "Mot de passe incorrect";
                            break;
                        } else if ($nbComptes == 1) {
                            $_SESSION['id'] = $result->fetch_row()[0];
                            $_SESSION['name'] = $nomUser;

                            $_SESSION['etat'] = etatUtilisateurDDB($bdd, 'actif', $_SESSION['id']);
                            $alerte = "Connecte en tant que " . $_SESSION['name'];

                            $vue = "accueil";
                            $title = "Acceuil";
                            break;
                        }
                    }
                    $alerte = "Echec lors de la connexion, veuillez reessayer plus tard ou nous contacter";
                    break;

                case 'Inscription':
                    //Alerte que le compte existe deja
                    $vue = "connexion_inscription";
                    $title = "Connexion/Inscription";

                    $alerte = "Ce nom d'utilisateur est deja pris";
                    break;
            }
            break;
        
        case 0:
            switch ($function) {
                case 'Connexion':
                    //Alerte que le compte n'existe pas
                    $vue = "connexion_inscription";
                    $title = "Connexion/Inscription";

                    $result = connexionUtilisateur($bdd, $nomUser, $mdpUtilisateur);
                    if ($result) {
                        if (!mysqli_num_rows($result)) {
                            $alerte = "Ce compte n'existe pas";
                        }
                    }
                    else {
                        $alerte = "Echec lors de la connexion, veuillez reessayer plus tard ou nous contacter";
                    }
                    break;

                case 'Inscription':
                    //Insere le compte dans la BDD
                    $vue = "connexion_inscription";
                    $title = "Connexion/Inscription";

                    if ($mdpUtilisateur == $_POST['mdpUtilisateurVerification']) {

                        $emailUtilisateur = $_POST['emailUtilisateur'];
                        $prenomUtilisateur = $_POST['prenomUtilisateur'];
                        $telUtilisateur = $_POST['telUtilisateur'];
                        $ageUtilisateur = $_POST['ageUtilisateur'];

                        if (!isset($emailUtilisateur) || empty($emailUtilisateur)
                        || !isset($prenomUtilisateur) || empty($prenomUtilisateur)
                        || !isset($ageUtilisateur)    || empty($ageUtilisateur) ) {
                            $alerte = "Formulaire incomplet";
                        } else {
                            if (!insererUtilisateurDDB($bdd,$nomUser,$emailUtilisateur,$mdpUtilisateur,$prenomUtilisateur,$ageUtilisateur,$telUtilisateur)) {
                                $alerte = "Echec lors de l'inscription, veuillez reessayer plus tard ou nous contacter";
                            } else {
                                $result = connexionUtilisateur($bdd, $nomUser, $mdpUtilisateur);
                                if ($result && mysqli_num_rows($result) == 1) {
                                    $_SESSION['id'] = $result->fetch_row()[0];
                                    $_SESSION['name'] = $nomUser;

                                    $_SESSION['etat'] = etatUtilisateurDDB($bdd, 'actif', $_SESSION['id']);
                                    $alerte = "Connecte en tant que " . $_SESSION['name'];

                                    $vue = "accueil";
                                    $title = "Acceuil";
                                    break;
                                }
                                $alerte = "Echec lors de la connexion, veuillez reessayer plus tard ou nous contacter";
                                break;
                            }
                        }
                    }
                    else {
                        $alerte = "Votre mot de passe ne correspond pas avec votre mot de passe de confirmation";
                    }
                    break;
            }
            break;
            
        default:
            //présence anormale de plusieurs comptes avec le même nom d'utilisateur dans la BDD
            $vue = "connexion_inscription";
            $title = "Connexion/Inscription";
            
            $alerte = "Echec lors de la connexion, veuillez reessayer plus tard ou nous contacter";
    }
}

include ('vues/header.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');