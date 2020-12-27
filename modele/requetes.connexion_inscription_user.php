<?php

/**
 * Liste des fonctions spécifiques à la table des utilisateurs
 */

// on récupère les requêtes génériques
include('requetes.generiques.php');

//on définit le nom de la table



function utilisateurExiste($bdd, $nomUser): int {
    $nbUtilisateurs = mycount($bdd, 'utilisateur', ['nomUser' => $nomUser]);

    if ($nbUtilisateurs <= 0) {
        return 0;
    }
    else if ($nbUtilisateurs = 1) {
        return 1;
    }
    else {
        return -1;
    }
}

function connexionUtilisateur($bdd, $nomUser, $mdpUtilisateur): int {
    $nbUtilisateurs = mycount($bdd, 'utilisateur', ['nomUser' => $nomUser, 'mdpUtilisateur' => $mdpUtilisateur]);
    
    if ($nbUtilisateurs <= 0) {
        return 0;
    }
    else if ($nbUtilisateurs = 1) {
        return 1;
    }
    else {
        return -1;
    }
}

function insererUtilisateurDDB($bdd, $nomUser, $mdpUtilisateur) {
    insertion($bdd, 'utilisateur', ['nomUser' => $nomUser, 'mdpUtilisateur' => $mdpUtilisateur]);
}


?>