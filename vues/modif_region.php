<?php
/**
* Vue :modifier un appareil
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

            <?php foreach ($liste as $element) echo '<p><label for="id_libelle">Nom :</label>
            <input type="text" id="id_libelle"  name="libelle" 
                   value='. $element['nomRegion'] . ' required=""/></p> ';
            ?>
            <p><button type="submit" id="id_modif" name="submit">Modifier</button></p>

        </form>

        <p><a href="index.php?cible=region&fonction=liste">Retour aux régions</a></p>

    </body>
</html>