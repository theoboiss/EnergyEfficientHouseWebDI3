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
                                FROM appareil NATURAL JOIN piece NATURAL JOIN appartement NATURAL JOIN type_appareil
                                WHERE Id_Piece IN (SELECT Id_Piece
                                                   FROM piece NATURAL JOIN appartement
                                                   WHERE Id_Appartement IN (SELECT Id_Appartement
                                                                            FROM appartement NATURAL JOIN locataire
                                                                            WHERE Id_Utilisateur =' . $_SESSION['id'] . ' AND ((dateFinLocation IS NULL) OR (DATE(NOW()) BETWEEN dateDebutLocation AND dateFinLocation)))) ORDER BY Id_Piece';
    
    return mysqli_query($bdd, $query);
    
}

/**
 * Insère un nouvel appareil dans la table des appareils de l'utilisateur
 * @param mysqli $bdd
 * @param array $values
 * @return boolean
 */


function selectPiece(mysqli $bdd) {

    $query = 'SELECT Id_Piece, libellePiece, Id_Appartement, libelleAppartement FROM piece NATURAL JOIN appartement NATURAL JOIN locataire WHERE Id_Utilisateur = ' . $_SESSION['id'] . ' AND ((DATE(NOW()) BETWEEN dateDebutLocation AND dateFinLocation)OR dateFinLocation IS NULL) ORDER BY Id_Appartement';

    return mysqli_query($bdd, $query);
}

function selectTypeAppareil(mysqli $bdd) {

    $query = 'SELECT * FROM type_appareil';

    return mysqli_query($bdd, $query);
}


function ajoutAppareil(mysqli $bdd, array $values): bool {

    $attributs = '';
    $valeurs = '';
    foreach ($values as $key => $value) {
       
        $attributs .= $key . ', ';
        $valeurs   .= ' "' . $value . '", ';
    }
    $attributs = substr_replace($attributs, '', -2, 2);
    $valeurs = substr_replace($valeurs, '', -2, 1);

    $query = ' INSERT INTO appareil' . ' (' . $attributs . ') VALUES (' . $valeurs . ')';
    //echo $query;
    //return mysqli_insert_id(mysqli_query($bdd, $query)) != 0 ? true : false;
    return mysqli_query($bdd, $query) != false ? true : false;
}

/**
 * Met à jour un nouvel élément dans une table
 * @param mysqli $bdd
 * @param array $attributs
 * @param array $values
 * @param string $table
 * @return boolean
 */
function modifierAppareil(mysqli $bdd, array $values, array $eqConditions): bool {

    $attributs = '';
    $condition = '';
    foreach ($values as $key => $value) {
       
        $attributs .= $key . ' = "' . $value . '", ';
    }
    foreach($eqConditions as $key => $value) {
        $condition .= $key . ' = ' . $value . ' AND ';
    }
    $attributs = substr_replace($attributs, '', -2, 2);
    $condition = substr_replace($condition, '', -5, 5);

    

    $query = ' UPDATE appareil SET ' . $attributs . ' WHERE ' . $condition;
    //echo $query;
    //return mysqli_insert_id(mysqli_query($bdd, $query)) != 0 ? true : false;
    return mysqli_query($bdd, $query) != false ? true : false;
}

function getAppareil(mysqli $bdd, int $id) {

    $query = 'SELECT * FROM `appareil` NATURAL JOIN type_appareil NATURAL JOIN piece WHERE Id_Appareil='. $id .'';
    return mysqli_query($bdd, $query);
}

?>