<?php

/**
 * Liste des fonctions spécifiques à la table des départements
 */

// on récupère les requêtes génériques
include('requetes.generiques.php');

//on définit le nom de la table
$table = "departement";



/**
 * Recherche les regions en fonction du type passé en paramètre
 * @param mysqli $bdd
 * @param string $table
 * @param string $type
 * @return array
 */
function rechercheParType(mysqli $bdd, string $table, string $id): array {
    
    return recherche($bdd, $table, ['idDept' => $id]);
    
}

function afficheDept(mysqli $bdd){
    $query = 'SELECT * FROM departement NATURAL JOIN region ORDER BY nomDepartement';
    return mysqli_query($bdd, $query);
}

function supprDept(mysqli $bdd, int $id){
    $query = 'DELETE FROM departement WHERE Id_Departement = '.$id;
    return mysqli_query($bdd, $query);
}

?>