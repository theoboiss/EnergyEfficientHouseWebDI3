<?php

// requêtes génériques pour récupérer les données de la BDD

// Appel du fichier déclarant mysqli_
include("connexion.php"); 

/**
 * Récupère tous les éléments d'une table
 * @param mysqli_ $bdd
 * @param string $table
 * @return array
 */
function recupereTous(mysqli $bdd, string $table) {
    $query = 'SELECT * FROM ' . $table;
    //return mysqli_fetch_assoc(mysqli_query($bdd, $query));
    return mysqli_query($bdd, $query);
}

/**
 * Recherche des éléments en fonction des attributs passés en paramètre
 * @param mysqli_ $bdd
 * @param string $table
 * @param array $attributs
 * @return array
 */
function recherche(mysqli $bdd, string $table, array $attributs) {
    $where = "";
    foreach($attributs as $key => $value) {
        $where .= "$key = '$value'" . " AND ";
    }
    $where = substr_replace($where, '', -5, 5);
    
    $statement = 'SELECT * FROM ' . $table . ' WHERE ' . $where;
    
    return mysqli_query($bdd, $statement);
}

/**
 * Insère un nouvel élément dans une table
 * @param mysqli $bdd
 * @param array $values
 * @param string $table
 * @return boolean
 */
function insertion(mysqli $bdd, string $table, array $values): bool {

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

/**
 * Met à jour un nouvel élément dans une table
 * @param mysqli $bdd
 * @param array $attributs
 * @param array $values
 * @param string $table
 * @return boolean
 */
function metAJour(mysqli $bdd, string $table, array $values, array $eqConditions): bool {

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

    

    $query = ' UPDATE ' . $table . ' SET ' . $attributs . ' WHERE ' . $condition;
    //echo $query;
    //return mysqli_insert_id(mysqli_query($bdd, $query)) != 0 ? true : false;
    return mysqli_query($bdd, $query) != false ? true : false;
}


?>