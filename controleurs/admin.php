<?php

/**
 * Contrôleur de gestion des Administrateurs
 */

// on inclut le fichier modèle contenant les appels à la BDD
if(!isset($_SESSION['etat'])) {
    $function = "";
    $vue = "accueil";
    $title = "Accueil";
    $alerte = "Vous devez vous connecter";
    include('vues/header.php');
    include('vues/' . $vue . '.php');
    include('vues/footer.php');
    exit();
}
include('./modele/requetes.admin.php');

$idAdmins = [0, 1];

$isAdmin = false;
foreach ($idAdmins as $element) {
    if ($_SESSION['id'] == $element) {
        $isAdmin = true;
    }
}

if ($isAdmin) {
    $_SESSION['admin'] = true;
}
else {
    $_SESSION['admin'] = false;
}


?>