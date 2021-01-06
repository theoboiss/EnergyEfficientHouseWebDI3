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
                   value='. $element['nom_ville'] . ' required=""/></p> ';
            ?>
            

            <p><label for="Id_Departement">Région</label>
            <select id="Id_Departement" name="Id_Departement" >
            <?php echo "<option value=\"".$element['Id_Departement'].'">'. $element['nomDepartement'] . '</option>';           
                     foreach ($selectDept as $element2) { 
                        echo '<option value="'.$element2['Id_Departement'].'">'.$element2['nomDepartement'].'</option>';
                    }?>
           </select></p>
           <p><button type="submit" id="id_modif" name="submit">Modifier</button></p>
        </form>

        <p><a href="index.php?cible=ville&fonction=liste">Retour aux villes</a></p>

    </body>
</html>