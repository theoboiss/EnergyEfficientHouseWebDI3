<?php
/**
* Vue : modifier une date de location
*/
?>

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8" />
            <link rel="stylesheet" href="public/css/styles_con.css"/>
        </head>

    <body>

        <?php echo AfficheAlerte($alerte); ?>

        <form method="POST" action="">

            <?php echo '<p><label for="dateFin">Nom :</label>
            <input type="date" id="dateFin"  name="dateFin" 
                   value =' . $_GET['datefin'] . '/></p>'; ?>

            <p><button type="submit" id="id_ajout" name="submit">Modifier</button></p>

        </form>

        <p><a href="index.php?cible=maisons&fonction=afficherMaisons">Retour aux maisons</a></p>

    </body>
</html>