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


                        Nom d'utilisateur : <input type="text" name="nomUser"><br/>
                        Mot de passe : <input type="password" name="mdpUtilisateur"><br/>
                        <input type="submit" value="Connexion" name="fonction">

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
                            
                                *Nom d'utilisateur : <input type="text" name="nomUser"><br/>
                                *Prenom : <input type="text" name="prenomUtilisateur"><br/>
                                *e-mail : <input type="email" name="emailUtilisateur"><br/>
                                Telephone: <input type="tel" name="telUtilisateur"><br/>
                                *Age : <input type="number" name="ageUtilisateur" min="0" max="150"><br/>
                                *Mot de passe : <input type="password" name="mdpUtilisateur"><br/>
                                *Confirmation du mot de passe : <input type="password" name="mdpUtilisateurVerification"><br/>
                                <input type="submit" value="Inscription" name="fonction">

                            </form>
                        </fieldset>
                    </td>
                </table>
                <p class="inscription_misc">(* Signifie que le champ est obligatoire)</p>
            </td>
        </table>

        <?php if (isset($alerte)) echo AfficheAlerte($alerte); ?>
    </body>
</html>