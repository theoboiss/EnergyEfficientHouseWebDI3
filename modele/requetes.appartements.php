<?php

// Appel du fichier déclarant mysqli_
include("modele/connexion.php"); 


/**
 * Affiche les appareils d'un utilisateur
 * @param mysqli_ $bdd
 * @return array
 */
function afficherAppartements(mysqli $bdd) {
    
    $query = 'SELECT * FROM `appartement` NATURAL JOIN locataire WHERE Id_Utilisateur=2';
    
    return mysqli_query($bdd, $query);
    
}

?>