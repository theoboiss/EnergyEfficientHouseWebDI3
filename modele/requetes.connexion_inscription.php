<?php

/**
 * Liste des fonctions spécifiques à la table des utilisateurs
 */

// on récupère les requêtes génériques
include('requetes.generiques.php');

//on définit le nom de la table



function utilisateurExiste($bdd, $nomUser): int {
    $result = recherche($bdd, 'utilisateur', ['nomUser' => $nomUser]);
    if (!$result) {
        return -1;
    }
    return mysqli_num_rows($result);
}

function connexionUtilisateur($bdd, $nomUser, $mdpUtilisateur) {
    return recherche($bdd, 'utilisateur', ['nomUser' => $nomUser, 'mdpUtilisateur' => $mdpUtilisateur]);
}

function insererUtilisateurDDB($bdd, $nomUser, $emailUtilisateur, $mdpUtilisateur, $prenomUtilisateur, $ageUtilisateur, $telUtilisateur = NULL) {
    return insertion($bdd, 'utilisateur', ['nomUser' => $nomUser, 'emailUtilisateur' => $emailUtilisateur, 'mdpUtilisateur' => $mdpUtilisateur, 'prenomUtilisateur' => $prenomUtilisateur, 'telUtilisateur' => $telUtilisateur, 'ageUtilisateur' => $ageUtilisateur, 'dateCreationCompte' => date('Y-m-d')]);
}

function etatUtilisateurDDB($bdd, $etat, $id) {
    metAJour($bdd, 'utilisateur', ['etatCompte' => $etat], ['Id_Utilisateur' => $id]);
    return recherche($bdd, 'utilisateur', ['etatCompte' => $etat])->fetch_row()[8];
}

?>