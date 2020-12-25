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
                <input type="submit" value="connexion" name="submit">
            </form>
        </td>
        <td>
            <form class="inscription" action="" method="post" name="signin">
            <table>
                <td>Vous êtes nouveau ici ?</td>
                <td>
                    <h1>Inscription</h1>
                    <input type="text" name="nomUser" placeholder="Nom d'utilisateur"><br/>
                    <input type="password" name="mdpUtilisateur" placeholder="Mot de passe"><br/>
                    <input type="password" name="mdpUtilisateurVerification" placeholder="Confirmation de mot de passe"><br/>
                    <input type="submit" value="inscription" name="submit">
                </td>
            </form>
        </td>
    </table>
</body>