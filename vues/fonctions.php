<?php

/**
 * Fonctions liées à l'affichage
 */

/**
 * Génère le code HTML d'affichage d'une alerte
 * @param string|null $alerte
 */
function AfficheAlerte(?string $alerte) {
    if(!is_null($alerte) && !empty($alerte)) {
        return "<p><strong><i>{$alerte}</i></strong></p>";
    }
}

function estConnecte(): int {
    if (isset($_SESSION['etat'])) return ($_SESSION['etat'] == 'actif');
    else return 0;
}