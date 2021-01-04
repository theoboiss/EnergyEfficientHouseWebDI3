<?php

// Appel du fichier déclarant mysqli_
include("modele/connexion.php"); 

/**
 * Affiche les appareils d'un utilisateur
 * @param mysqli_ $bdd
 * @return array
 */
function afficherPieces(mysqli $bdd, int $id) {
    
    $query = 'SELECT * FROM piece NATURAL JOIN type_piece WHERE Id_Appartement = ' . $id . '';
    
    return mysqli_query($bdd, $query);
    
}

function selectTypePiece(mysqli $bdd) {

    $query = 'SELECT * FROM type_piece';

    return mysqli_query($bdd, $query);
}

function selectAppartement(mysqli $bdd) {

    $query = 'SELECT * FROM appartement';

    return mysqli_query($bdd, $query);
}

function ajoutPiece(mysqli $bdd, array $values): bool {

    $attributs = '';
    $valeurs = '';
    foreach ($values as $key => $value) {
       
        $attributs .= $key . ', ';
        $valeurs   .= ' "' . $value . '", ';
    }
    $attributs = substr_replace($attributs, '', -2, 2);
    $valeurs = substr_replace($valeurs, '', -2, 1);

    $query = ' INSERT INTO piece' . ' (' . $attributs . ') VALUES (' . $valeurs . ')';
    //echo $query;
    //return mysqli_insert_id(mysqli_query($bdd, $query)) != 0 ? true : false;
    return mysqli_query($bdd, $query) != false ? true : false;
}

function modifierPiece(mysqli $bdd, array $values, array $eqConditions): bool {

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

    

    $query = ' UPDATE piece SET ' . $attributs . ' WHERE ' . $condition;
    //echo $query;
    //return mysqli_insert_id(mysqli_query($bdd, $query)) != 0 ? true : false;
    return mysqli_query($bdd, $query) != false ? true : false;
}

function getPiece(mysqli $bdd, int $id) {

    $query = 'SELECT * FROM piece NATURAL JOIN type_piece WHERE Id_Piece='. $id .'';
    return mysqli_query($bdd, $query);
}


?>