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
        <p><a href="index.php?cible=profil">Retour</a></p>
        <form action="" method="post" name="modifProfile">
            <table>
                <tr>
                    <td>Modifiez vos informations personnelles :</td>
                    <td>
                        Nom d'utilisateur : <input type="text" name="nomUser" placeholder=<?php echo $nomUser ?>><br/>
                        Prenom : <input type="text" name="prenomUtilisateur" placeholder=<?php echo $prenomUtilisateur ?>><br/>
                        e-mail : <input type="email" name="emailUtilisateur" placeholder=<?php echo $emailUtilisateur ?>><br/>
                        Telephone: <input type="tel" name="telUtilisateur" placeholder=<?php echo $telUtilisateur ?>><br/>
                        Age : <input type="number" name="ageUtilisateur" placeholder=<?php echo $ageUtilisateur ?> min="0" max="150"><br/>
                    </td>
                </tr>
                <tr>
                    <td>Modifiez votre mot de passe :</td>
                    <td>
                        Mot de passe : <input type="password" name="mdpUtilisateur"><br/>
                        Confirmation du mot de passe : <input type="password" name="mdpUtilisateurVerification"></br>
                    </td>
                </tr>
            </table>
            <p><input type="submit" value="Modifier" name="fonction"></p>
        </form>
        <?php if (isset($message)) echo AfficheAlerte($message) ?>
    </body>
</html>