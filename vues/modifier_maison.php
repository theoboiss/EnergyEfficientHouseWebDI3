<?php
/**
* Vue : modifier une maison
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

            <?php foreach ($getMaison as $element) echo '<p><label for="nomMaison">Nom :</label>
            <input type="text" id="nomMaison"  name="nomMaison" 
                   value ="' . $element['nomMaison'] . '" required=""/></p>

            <p><label for="degreIsolation">Degré d\'isolation :</label>
            <input type="int" id="degreIsolation"  name="degreIsolation" 
                   value =' . $element['degreIsolation'] . ' required=""/></p>

            <p><label for="evaluationBase">Evaluation de base :</label>
            <input type="int" id="evaluationBase"  name="evaluationBase" 
                   value =' . $element['evaluationBase'] . ' required=""/></p>

            </select></p>'; ?>

            <p><button type="submit" id="id_ajout" name="submit">Modifier</button></p>

        </form>

        <p><a href="index.php?cible=maisons&fonction=afficherMaisons">Retour aux maisons</a></p>

    </body>
</html>