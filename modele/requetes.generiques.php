<?php

// requêtes génériques pour récupérer les données de la BDD

// Appel du fichier déclarant mysqli_
include("modele/connexion.php"); 

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
function recherche(mysqli $bdd, string $table, array $attributs): array {
    
    $where = "";
    foreach($attributs as $key => $value) {
        $where .= "$key = :$key" . ", ";
    }
    $where = substr_replace($where, '', -2, 2);
    
    $statement = $bdd->prepare('SELECT * FROM ' . $table . ' WHERE ' . $where);
    
    
    foreach($attributs as $key => $value) {
        $statement->bindParam(":$key", $value);
    }
    $statement->execute();
    
    return $statement->fetchAll();
}

function compte(mysqli $bdd, string $table, array $attributs): array {
    
    $where = "";
    foreach($attributs as $key => $value) {
        $where .= "$key = :$key" . ", ";
    }
    $where = substr_replace($where, '', -2, 2);
    
    $statement = $bdd->prepare('SELECT COUNT(*) FROM ' . $table . ' WHERE ' . $where);
    
    
    foreach($attributs as $key => $value) {
        $statement->bindParam(":$key", $value);
    }
    $statement->execute();
    
    return $statement->fetchAll();
}

/**
 * Insère un nouvel élément dans une table
 * @param mysqli $bdd
 * @param array $values
 * @param string $table
 * @return boolean
 */
function insertion(mysqli $bdd, array $values, string $table): bool {

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

?>