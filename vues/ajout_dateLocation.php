<?php
/**
* Vue : ajouter une date de location
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

            <p><label for="Id_Appartement">Type</label>
            <select id="Id_Appartement" name="Id_Appartement" >
                <option value="default">Choisissez l'appartement :</option>
                <?php              
                    foreach ($selectAppartement as $element) { 
                        echo '<option value="'.$element['Id_Appartement'].'">'.$element['libelleAppartement'].'</option>';
                    }
                ?>
            </select></p>

            <p><label for="id_dateDebut">Date de début :</label>
            <input type="date" id="id_dateDebut"  name="dateDebut" required=""/></p>

            <p><label for="id_dateFin">Date de fin :</label>
            <input type="date" id="id_dateFin"  name="dateFin"/></p>
            

            <p><button type="submit" id="id_ajout" name="submit">Ajouter</button></p>

        </form>

        <p><a href="index.php?cible=appartements&fonction=afficherAppartements">Retour aux appartements</a></p>
        <p><a href="index.php">Accueil</a></p>

    </body>
</html>