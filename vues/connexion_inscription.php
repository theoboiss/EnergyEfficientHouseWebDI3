<head>
    <title>Connexion/Inscription</title>
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
                        <input type="text" name="emailUtilisateur" placeholder="*e-mail"><br/>
                        <input type="text" name="prenomUtilisateur" placeholder="*Prenom"><br/>
                        <input type="text" name="telUtilisateur" placeholder="Telephone"><br/>
                        <input type="text" name="ageUtilisateur" placeholder="*Age"><br/>
                        <input type="password" name="mdpUtilisateur" placeholder="*Mot de passe"><br/>
                        <input type="password" name="mdpUtilisateurVerification" placeholder="*Confirmation de mot de passe"><br/>
                        <input type="submit" value="inscription" name="fonction">
                    </form>
                </td>
            </table>
            <p>(* Signifie que le champ est obligatoire)</p>
        </td>
    </table>
    <?php
    if (isset($alerte)) {
        echo AfficheAlerte($alerte);
    }
    ?>
</body>