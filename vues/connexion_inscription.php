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
        <table class="interface_conn_insc">
            <td>
                <fieldset class="connexion">
                    
                    <legend>Connexion</legend>
                        <form action="" method="post" name="login">


                        <input type="text" name="nomUser" placeholder="Nom d'utilisateur"><br/>
                        <input type="password" name="mdpUtilisateur" placeholder="Mot de passe"><br/>
                        <input type="submit" value="connexion" name="fonction">

                    </form>
                </fieldset>
            </td>
            <td>
                <table class="inscription_block">
                    <td class="inscription_misc">Vous êtes nouveau ici ?</td>
                    <td>
                        <fieldset class="inscription">

                            <legend>Inscription</legend>
                            <form action="" method="post" name="logInOut">
                            
                                <input type="text" name="nomUser" placeholder="*Nom d'utilisateur"><br/>
                                <input type="text" name="emailUtilisateur" placeholder="*e-mail"><br/>
                                <input type="text" name="prenomUtilisateur" placeholder="*Prenom"><br/>
                                <input type="text" name="telUtilisateur" placeholder="Telephone"><br/>
                                <input type="text" name="ageUtilisateur" placeholder="*Age"><br/>
                                <input type="password" name="mdpUtilisateur" placeholder="*Mot de passe"><br/>
                                <input type="password" name="mdpUtilisateurVerification" placeholder="*Confirmation de mot de passe"><br/>
                                <input type="submit" value="inscription" name="fonction">

                            </form>
                        </fieldset>
                    </td>
                </table>
                <p class="inscription_misc">(* Signifie que le champ est obligatoire)</p>
            </td>
        </table>

        <?php if (isset($alerte)) echo AfficheAlerte($alerte); ?>

        <p><a href="index.php">Accueil</a></p>
    </body>
</html>