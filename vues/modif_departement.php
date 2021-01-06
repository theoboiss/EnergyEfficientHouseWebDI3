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
                   value='. $element['nomDepartement'] . ' required=""/></p> ';
            ?>
            

            <p><label for="Id_Region">Région</label>
            <select id="Id_Region" name="Id_Region" >
            <?php echo "<option value=\"".$element['Id_Region'].'">'. $element['nomRegion'] . '</option>';           
                     foreach ($selectRegion as $element2) { 
                        echo '<option value="'.$element2['Id_Region'].'">'.$element2['nomRegion'].'</option>';
                    }?>
           </select></p>
           <p><button type="submit" id="id_modif" name="submit">Modifier</button></p>
        </form>

        <p><a href="index.php?cible=departement&fonction=liste">Retour aux départements</a></p>

    </body>
</html>