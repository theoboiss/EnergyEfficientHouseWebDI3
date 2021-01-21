<?php

// Appel du fichier déclarant mysqli_
include("modele/connexion.php"); 
include("modele/requetes.connexion_inscription.php"); 

function getUtilisateur($bdd): array {
    return recherche($bdd, 'utilisateur', ['Id_Utilisateur' => $_SESSION["id"]])->fetch_row();
}

?>