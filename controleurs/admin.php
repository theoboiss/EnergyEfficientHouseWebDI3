<?php

/**
 * Contrôleur de gestion des Administrateurs
 */

// on inclut le fichier modèle contenant les appels à la BDD
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