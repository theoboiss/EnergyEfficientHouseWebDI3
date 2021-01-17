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

 function afficherStat(mysqli $bdd){
  
    $query = 'SELECT * FROM consoappareil WHERE Id_Appareil IN (SELECT * FROM appareil NATURAL JOIN piece NATURAL JOIN appartement NATURAL JOIN type_appareil
                                                                WHERE Id_Piece IN (SELECT Id_Piece FROM piece NATURAL JOIN appartement
                                                                                   WHERE Id_Appartement IN (SELECT Id_Appartement FROM appartement NATURAL JOIN locataire
                                                                                                            WHERE Id_Utilisateur =' . $_SESSION['id'] . ' AND ((dateFinLocation IS NULL) OR (DATE(NOW()) BETWEEN dateDebutLocation AND dateFinLocation)))))';
    return mysqli_query($bdd, $query);
 }
?>
