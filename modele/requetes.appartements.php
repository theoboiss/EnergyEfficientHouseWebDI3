<?php

// Appel du fichier déclarant mysqli_
include("modele/connexion.php"); 


/**
 * Affiche les appareils d'un utilisateur
 * @param mysqli_ $bdd
 * @return array
 */
function afficherAppartements(mysqli $bdd) {
    
    $query = 'SELECT * FROM `appartement` NATURAL JOIN locataire NATURAL JOIN maison NATURAL JOIN type_appartement WHERE Id_Utilisateur=' . $_SESSION['id'] . '';
    
    return mysqli_query($bdd, $query);
    
}

function selectTypeAppartement(mysqli $bdd) {

    $query = 'SELECT * FROM type_appartement';

    return mysqli_query($bdd, $query);
}

function selectMaison(mysqli $bdd) {

    $query = 'SELECT * FROM maison';

    return mysqli_query($bdd, $query);
}

function ajoutAppartement(mysqli $bdd, array $values): bool {

    $attributs = '';
    $valeurs = '';
    foreach ($values as $key => $value) {
       
        $attributs .= $key . ', ';
        $valeurs   .= ' "' . $value . '", ';
    }
    $attributs = substr_replace($attributs, '', -2, 2);
    $valeurs = substr_replace($valeurs, '', -2, 1);

    $query = ' INSERT INTO appartement' . ' (' . $attributs . ') VALUES (' . $valeurs . ')';
    //echo $query;
    //return mysqli_insert_id(mysqli_query($bdd, $query)) != 0 ? true : false;
    return mysqli_query($bdd, $query) != false ? true : false;
}

function modifierAppartement(mysqli $bdd, array $values, array $eqConditions): bool {

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

    

    $query = ' UPDATE appartement SET ' . $attributs . ' WHERE ' . $condition;
    //echo $query;
    //return mysqli_insert_id(mysqli_query($bdd, $query)) != 0 ? true : false;
    return mysqli_query($bdd, $query) != false ? true : false;
}

function getAppartement(mysqli $bdd, int $id) {

    $query = 'SELECT * FROM `appartement` NATURAL JOIN type_appartement NATURAL JOIN maison WHERE Id_Appartement='. $id .'';
    return mysqli_query($bdd, $query);
}

?>