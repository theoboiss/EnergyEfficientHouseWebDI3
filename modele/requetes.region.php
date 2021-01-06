<?php

/**
 * Liste des fonctions spécifiques à la table des regions
 */

// on récupère les requêtes génériques
include('requetes.generiques.php');

//on définit le nom de la table
$table = "region";



/**
 * Recherche les regions en fonction du type passé en paramètre
 * @param mysqli $bdd
 * @param string $table
 * @param string $type
 * @return array
 */
function rechercheParType(mysqli $bdd, string $table, string $id): array {
    
    return recherche($bdd, $table, ['id_Region' => $id]);
    
}

function getRegion(mysqli $bdd, int $id){
    $query = 'SELECT * FROM region WHERE id_Region ='.$id;
    return mysqli_query($bdd, $query);
}

function supprRegion(mysqli $bdd, int $id){
    $query = 'DELETE FROM region WHERE Id_Region ='.$id;
    return mysqli_query($bdd, $query);
}

?>