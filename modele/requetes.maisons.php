<?php

// Appel du fichier déclarant mysqli_
include("modele/connexion.php"); 


/**
 * Affiche les appareils d'un utilisateur
 * @param mysqli_ $bdd
 * @return array
 */
function afficherMaisons(mysqli $bdd) {
    
    $query = 'SELECT * FROM maison NATURAL JOIN proprietaire NATURAL JOIN adresse NATURAL JOIN ville NATURAL JOIN departement NATURAL JOIN region WHERE Id_Utilisateur = 2';
    
    return mysqli_query($bdd, $query);
    
}

?>