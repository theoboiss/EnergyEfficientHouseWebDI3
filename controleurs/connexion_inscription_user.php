<?php

/**
 * Contrôleur des connexions Utilisateur
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.connexion_inscription_user.php');


if (!isset($_GET['submit']) || empty($_GET['submit'])) {
    $function = "";
    $alerte = "Veuillez vous connecter ou vous créer un compte";
} else if () (!isset($_POST['nomUser']) || empty($_POST['nomUser'])) || (!isset($_POST['mdpUtilisateur']) || empty($_POST['mdpUtilisateur'])) ) {
    $function = "";
    $alerte = "Nom d'utilisateur ou mot de passe incorrect";
} else {
    $function = $_GET['fonction'];
    $alerte = "";

    switch (utilisateurExiste($bdd, $nomUser)) {
        case 1:
            //Si l'utilisateur existe deja
            switch ($function) {
                case 'connexion':
                    //Verifie le mdp

                    $valide = connexionUtilisateur($bdd, $nomUser, $mdpUtilisateur);
                    if (!$valide) {
                        $alerte = "Mot de passe incorrect";
                    }

                case 'inscription':
                    //Alerte que le compte existe deja
                    $alerte = "Ce nom d'utilisateur est deja pris";
            }
        
        case 0:
            switch ($function) {
                case 'connexion':
                    //Alerte que le compte n'existe pas

                    $valide = connexionUtilisateur($bdd, $nomUser, $mdpUtilisateur);
                    if (!$valide) {
                        $alerte = "Ce compte n'existe pas";
                    }

                case 'inscription':
                    //Insere le compte dans la BDD

                    if ($mdpUtilisateur = $mdpUtilisateurVerification) {
                        insererUtilisateurDDB($bdd, $nomUser, $mdpUtilisateur);
                    }
                    else {
                        $alerte = "Votre mot de passe ne correspond pas avec votre mot de passe de confirmation";
                    }
            }
    }
}