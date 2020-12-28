<?php
/**
* Vue : ajouter une date de propriete
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

            <p><label for="Id_Maison">Type</label>
            <select id="Id_Maison" name="Id_Maison" >
                <option value="default">Choisissez la maison :</option>
                <?php              
                    foreach ($selectMaison as $element) { 
                        echo '<option value="'.$element['Id_Maison'].'">'.$element['nomMaison'].'</option>';
                    }
                ?>
            </select></p>

            <p><label for="id_dateDebut">Date de début :</label>
            <input type="date" id="id_dateDebut"  name="dateDebut" required=""/></p>

            <p><label for="id_dateFin">Date de fin :</label>
            <input type="date" id="id_dateFin"  name="dateFin"/></p>
            

            <p><button type="submit" id="id_ajout" name="submit">Ajouter</button></p>

        </form>

        <p><a href="index.php?cible=maisons&fonction=afficherMaisons">Retour aux maisons</a></p>
        <p><a href="index.php">Accueil</a></p>

    </body>
</html>