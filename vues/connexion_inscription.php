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
            <td>
                <form class="connexion" action="" method="post" name="login">
                    <h1>Connexion</h1>
                    <input type="text" name="nomUser" placeholder="Nom d'utilisateur"><br/>
                    <input type="password" name="mdpUtilisateur" placeholder="Mot de passe"><br/>
                    <input type="submit" value="connexion" name="fonction">
                </form>
            </td>
            <td>
                <table>
                    <td>Vous êtes nouveau ici ?</td>
                    <td>
                        <form class="inscription" action="" method="post" name="signin">
                            <h1>Inscription</h1>
                            <input type="text" name="nomUser" placeholder="*Nom d'utilisateur"><br/>
                            <input type="text" name="emailUtilisateur" placeholder="*e-mail" required=""><br/>
                            <input type="text" name="prenomUtilisateur" placeholder="*Prenom" required=""><br/>
                            <input type="text" name="telUtilisateur" placeholder="Telephone"><br/>
                            <input type="text" name="ageUtilisateur" placeholder="*Age" required=""><br/>
                            <input type="password" name="mdpUtilisateur" placeholder="*Mot de passe" required=""><br/>
                            <input type="password" name="mdpUtilisateurVerification" placeholder="*Confirmation de mot de passe" required=""><br/>
                            <input type="submit" value="inscription" name="fonction">
                        </form>
                    </td>
                </table>
                <p>(* Signifie que le champ est obligatoire)</p>
            </td>
        </table>

        <?php if (isset($alerte)) echo AfficheAlerte($alerte); ?>

        <p><a href="index.php">Accueil</a></p>
    </body>
</html>