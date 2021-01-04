<?php

// Appel du fichier déclarant mysqli_
include("modele/connexion.php"); 


/**
 * Affiche les appareils d'un utilisateur
 * @param mysqli_ $bdd
 * @return array
 */
function afficherMaisons(mysqli $bdd) {
    
    $query = 'SELECT * FROM maison NATURAL JOIN proprietaire NATURAL JOIN adresse NATURAL JOIN ville NATURAL JOIN departement NATURAL JOIN region WHERE Id_Utilisateur = ' . $_SESSION['id'] . '';
    
    return mysqli_query($bdd, $query);
    
}

function selectAdresse(mysqli $bdd) {

    $query = 'SELECT * FROM adresse NATURAL JOIN ville NATURAL JOIN departement NATURAL JOIN region ORDER BY nomRegion, nomDepartement, nom_ville';

    return mysqli_query($bdd, $query);
}

function ajoutMaison(mysqli $bdd, array $values): bool {

    $attributs = '';
    $valeurs = '';
    foreach ($values as $key => $value) {
       
        $attributs .= $key . ', ';
        $valeurs   .= ' "' . $value . '", ';
    }
    $attributs = substr_replace($attributs, '', -2, 2);
    $valeurs = substr_replace($valeurs, '', -2, 1);

    $query = ' INSERT INTO maison' . ' (' . $attributs . ') VALUES (' . $valeurs . ')';
    //echo $query;
    //return mysqli_insert_id(mysqli_query($bdd, $query)) != 0 ? true : false;
    return mysqli_query($bdd, $query) != false ? true : false;
}

function modifierMaison(mysqli $bdd, array $values, array $eqConditions): bool {

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

    

    $query = ' UPDATE maison SET ' . $attributs . ' WHERE ' . $condition;
    //echo $query;
    //return mysqli_insert_id(mysqli_query($bdd, $query)) != 0 ? true : false;
    return mysqli_query($bdd, $query) != false ? true : false;
}

function getMaison(mysqli $bdd, int $id) {

    $query = 'SELECT * FROM `maison` WHERE Id_Maison='. $id .'';
    return mysqli_query($bdd, $query);
}

?>