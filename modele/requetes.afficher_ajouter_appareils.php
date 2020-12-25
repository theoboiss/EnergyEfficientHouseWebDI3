<?php

// Appel du fichier déclarant mysqli_
include("modele/connexion.php"); 


/**
 * Affiche les appareils d'un utilisateur
 * @param mysqli_ $bdd
 * @return array
 */
function afficherAppareils(mysqli $bdd) {
    
    $query = 'SELECT *
                                FROM appareil NATURAL JOIN piece
                                WHERE Id_Piece IN (SELECT Id_Piece
                                                   FROM piece NATURAL JOIN appartement
                                                   WHERE Id_Appartement IN (SELECT Id_Appartement
                                                                            FROM appartement NATURAL JOIN locataire
                                                                            WHERE Id_Utilisateur = 2))';
    
    return mysqli_query($bdd, $query);
    
}

/**
 * Insère un nouvel appareil dans la table des appareils de l'utilisateur
 * @param mysqli $bdd
 * @param array $values
 * @return boolean
 */
/*
function insertionAppareil(mysqli $bdd, array $values): bool {

    $attributs = '';
    $valeurs = '';
    foreach ($values as $key => $value) {
       
        $attributs .= $key . ', ';
        $valeurs   .= ' "' . $value . '", ';
    }
    $attributs = substr_replace($attributs, '', -2, 2);
    $valeurs = substr_replace($valeurs, '', -2, 1);

    $query = ' INSERT INTO ' . $table . ' (' . $attributs . ') VALUES (' . $valeurs . ')';
    //echo $query;
    //return mysqli_insert_id(mysqli_query($bdd, $query)) != 0 ? true : false;
    return mysqli_query($bdd, $query) != false ? true : false;
}
*/
?>