<?php
/**
* Vue : ajouter une maison
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

            <p><label for="nomMaison">Nom :</label>
            <input type="text" id="nomMaison"  name="nomMaison" 
                   placeholder="Entrez le nom" required=""/></p>

            <p><label for="degreIsolation">Degré d'isolation :</label>
            <input type="int" id="degreIsolation"  name="degreIsolation" 
                   placeholder="Entrez le degré d'isolation" required=""/></p>

            <p><label for="evaluationBase">Evaluation de base :</label>
            <input type="int" id="evaluationBase"  name="evaluationBase" 
                   placeholder="Entrez l'évaluation de base" required=""/></p>

            <p><label for="Id_Adresse">Adresse :</label>
            <select id="Id_Adresse" name="Id_Adresse" >
                <option value="default">Choisissez l'adresse :</option>
                <?php              
                    foreach ($selectAdresse as $element) { 
                        echo '<option value="'.$element['Id_Adresse'].'">'.$element['numMaison']." | ".$element['rue']." | ".$element['code_postal']." | ".$element['nom_ville']." | ".$element['nomDepartement']." | ".$element['nomRegion'].'</option>';
                    }
                ?>
            </select></p>

            <p><button type="submit" id="id_ajout" name="submit">Ajouter</button></p>

        </form>

        <p><a href="index.php?cible=adresses&fonction=ajoutAdresse">Ajouter une adresse</a></p>
        <p><a href="index.php?cible=maisons&fonction=afficherMaisons">Retour aux maisons</a></p>
        <p><a href="index.php?cible=datePropriete&fonction=ajouterDatePropriete">Ajouter une date de propriété</a></p>

    </body>
</html>