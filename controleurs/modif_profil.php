<?php

/**
 * Contrôleur du profil Utilisateur
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('./modele/requetes.connexion_inscription.php');

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $vue = "modif_profil";
    $title = "Modifier mon profil";
    $function = "";
    $alerte = "";
} else {
    $vue = "modif_profil";
    $title = "Modifier mon profil";
    $function = $_GET['fonction'];
    $alerte = "";
}

$infos = getUtilisateur($bdd);

$nomUser = $infos[1];
$prenomUtilisateur = $infos[5];
$emailUtilisateur = $infos[2];
$telUtilisateur = $infos[4];
$ageUtilisateur = $infos[6];
$mdpUtilisateur = $infos[3];


if (isset($_POST['nomUser'])
 ||
    isset($_POST['emailUtilisateur'])
 ||
    isset($_POST['prenomUtilisateur'])
 ||
    isset($_POST['telUtilisateur'])
 ||
    isset($_POST['ageUtilisateur'])
 ||
    isset($_POST['mdpUtilisateur'])
 ||
    isset($_POST['mdpUtilisateurVerification']) )
{
    switch($function) {
        case 'Modifier':
            if (isset($_POST['mdpUtilisateur']) && !empty($_POST['mdpUtilisateur'])) {
                if ($mdpUtilisateur != $_POST['mdpUtilisateur']) {
                    if (isset($_POST['mdpUtilisateurVerification']) && !empty($_POST['mdpUtilisateurVerification'])
                     && $_POST['mdpUtilisateur'] == $_POST['mdpUtilisateurVerification'])
                    {
                        $mdpUtilisateur = $_POST['mdpUtilisateur'];
                    }
                    else {
                        $alerte = "Votre mot de passe ne correspond pas avec votre mot de passe de confirmation";
                    }
                } else {
                $alerte = "Votre mot de passe est identique à l'ancien";
                }
            }
            if (isset($_POST['nomUser'])           && !empty($_POST['nomUser']))           $nomUser = $_POST['nomUser'];
            if (isset($_POST['emailUtilisateur'])  && !empty($_POST['emailUtilisateur']))  $emailUtilisateur = $_POST['emailUtilisateur'];
            if (isset($_POST['prenomUtilisateur']) && !empty($_POST['prenomUtilisateur'])) $prenomUtilisateur = $_POST['prenomUtilisateur'];
            if (isset($_POST['telUtilisateur'])    && !empty($_POST['telUtilisateur']))    $telUtilisateur = $_POST['telUtilisateur'];
            if (isset($_POST['ageUtilisateur'])    && !empty($_POST['ageUtilisateur']))    $ageUtilisateur = $_POST['ageUtilisateur'];

            if (metAJour($bdd, 'utilisateur', ['nomUser' => $nomUser, 'emailUtilisateur' => $emailUtilisateur, 'mdpUtilisateur' => $mdpUtilisateur,
                         'prenomUtilisateur' => $prenomUtilisateur, 'telUtilisateur' => $telUtilisateur, 'ageUtilisateur' => $ageUtilisateur], ['Id_Utilisateur' => $_SESSION['id']])) {
                $result = connexionUtilisateur($bdd, $nomUser, $mdpUtilisateur);

                if ($result && mysqli_num_rows($result) == 1) {
                    $_SESSION['name'] = $nomUser;
                    $message = "Changements effectues";
                    header('Location: index.php?cible=profil&modif');
                    exit();

                } else {
                    $nomUser = $infos[1];
                    $prenomUtilisateur = $infos[5];
                    $emailUtilisateur = $infos[2];
                    $telUtilisateur = $infos[4];
                    $ageUtilisateur = $infos[6];
                    $mdpUtilisateur = $infos[3];
                    metAJour($bdd, 'utilisateur', ['nomUser' => $nomUser, 'emailUtilisateur' => $emailUtilisateur, 'mdpUtilisateur' => $mdpUtilisateur,
                             'prenomUtilisateur' => $prenomUtilisateur,'telUtilisateur' => $telUtilisateur, 'ageUtilisateur' => $ageUtilisateur], ['Id_Utilisateur' => $_SESSION['id']]);
                    $alerte = "Echec lors de la modification, veuillez reessayer plus tard ou nous contacter1";
                }
            } else {
                $nomUser = $infos[1];
                $prenomUtilisateur = $infos[5];
                $emailUtilisateur = $infos[2];
                $telUtilisateur = $infos[4];
                $ageUtilisateur = $infos[6];
                $mdpUtilisateur = $infos[3];
                $alerte = "Echec lors de la modification, veuillez reessayer plus tard ou nous contacter2";
            }
            break;

        default:
            // si aucune fonction ne correspond au paramètre function passé en GET
            $vue = "erreur404";
            $title = "error404";
            $message = "Erreur 404 : la page recherchée n'existe pas.";
    }
}



include ('vues/header.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');