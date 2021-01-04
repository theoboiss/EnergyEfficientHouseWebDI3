<?php
/**
* Vue : connecter ou inscrire un utilisateur
*/
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Connexion/Inscription</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="public/css/styles_con.css"/>
    </head>

    <body>
        <table>
            <tr>
                <td>Nom d'utilisateur :</td>
                <td><?php echo $nomUser ?></td>
            </tr>
            <tr>
                <td>Prenom :</td>
                <td><?php echo $prenomUtilisateur ?></td>
            </tr>
            <tr>
                <td>e-mail :</td>
                <td><?php echo $emailUtilisateur ?></td>
            </tr>
            <tr>
                <td>Telephone:</td>
                <td><?php echo $telUtilisateur ?></td>
            </tr>
            <tr>
                <td>Age :</td>
                <td><?php echo $ageUtilisateur ?></td>
            </tr>
        </table>
        <p><a href="index.php?cible=modif_profil&fonction=Modifier">Modifier mes informations personnelles</a></p>
        <?php if (isset($alerte)) echo AfficheAlerte($alerte); ?>

    </body>
</html>