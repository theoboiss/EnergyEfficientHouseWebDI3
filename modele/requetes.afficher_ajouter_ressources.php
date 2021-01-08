<?php

// Appel du fichier déclarant mysqli_
include("modele/connexion.php");

/**
 * Affiche les différentes ressources
 * @param mysqli_ $bdd
 * @return array
 */
 
 function afficherRessources(mysqli $bdd){
  
    $query = 'SELECT * FROM matiere';
    return mysqli_query($bdd, $query);
 }
?>
