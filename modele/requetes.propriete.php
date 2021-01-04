<?php

// Appel du fichier déclarant mysqli_
include("modele/connexion.php"); 

function selectMaison(mysqli $bdd) {

    $query = 'SELECT * FROM maison ORDER BY nomMaison';

    return mysqli_query($bdd, $query);
}

function ajoutPropriete(mysqli $bdd, array $values): bool {

    $attributs = '';
    $valeurs = '';
    foreach ($values as $key => $value) {
       
        $attributs .= $key . ', ';
        $valeurs   .= ' "' . $value . '", ';
    }
    $attributs = substr_replace($attributs, '', -2, 2);
    $valeurs = substr_replace($valeurs, '', -2, 1);

    $query = ' INSERT INTO proprietaire' . ' (' . $attributs . ') VALUES (' . $valeurs . ')';
    
    //echo $query;
    //return mysqli_insert_id(mysqli_query($bdd, $query)) != 0 ? true : false;
    return mysqli_query($bdd, $query) != false ? true : false;
}


?>