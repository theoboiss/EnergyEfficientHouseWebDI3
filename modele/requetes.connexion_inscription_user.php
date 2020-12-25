<?php

/**
 * Liste des fonctions spécifiques à la table des utilisateurs
 */

// on récupère les requêtes génériques
include('requetes.generiques.php');

//on définit le nom de la table
$table = "utilisateur";



function utilisateurExiste($bdd, $nomUser) int {
    $nbUtilisateurs = count($bdd, $table, $nomUser);

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
    $nbUtilisateurs = count($bdd, $table, array($nomUser, $mdpUtilisateur);
    
    if ($nbUtilisateurs <= 0) {
        return 0;
    }
    else if ($nbUtilisateurs = 1 {
        return 1;
    }
    else {
        return -1;
    }
}

function insererUtilisateurDDB($bdd, $nomUser, $mdpUtilisateur) {
    insertion();
}


?>