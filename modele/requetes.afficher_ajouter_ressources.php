<?php

// Appel du fichier déclarant mysqli_
include("modele/connexion.php");

/**
 * Affiche les différentes ressources
 * @param mysqli_ $bdd
 * @return array
 */
 
 function afficherRessources(mysqli $bdd){
  
    $query = 'SELECT * FROM matiere
                WHERE Id_Matiere IN ( SELECT Id_Matiere
                                            FROM appareil NATURAL JOIN piece NATURAL JOIN type_appareil
                                            WHERE Id_Piece IN (SELECT Id_Piece
                                                               FROM piece NATURAL JOIN appartement
                                                               WHERE Id_Appartement IN (SELECT Id_Appartement
                                                                                        FROM appartement NATURAL JOIN locataire
                                                                                        WHERE Id_Utilisateur = 2 AND ((dateFinLocation IS NULL) OR (DATE(NOW()) BETWEEN dateDebutLocation AND dateFinLocation)))) ORDER BY Id_Piece');

    return mysqli_query($bdd, $query);
?>
