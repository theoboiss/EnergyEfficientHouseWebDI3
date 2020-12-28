<?php
/**
* Vue : ajouter une adresse
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


            <p><label for="numMaison">Numéro de la maison :</label>
            <input type="int" id="numMaison"  name="numMaison" 
                   placeholder="Entrez le numéro" required=""/></p>

            <p><label for="rue">Nom de la rue :</label>
            <input type="texte" id="rue"  name="rue" 
                   placeholder="Entrez le nom de la rue" required=""/></p>

            <p><label for="Id_Ville">Type :</label>
            <select id="Id_Ville" name="Id_Ville" >
                <option value="default">Choisissez la ville :</option>
                <?php              
                    foreach ($selectVille as $element) { 
                        echo '<option value="'.$element['Id_Ville'].'">'.$element['code_postal']." | ".$element['nom_ville']." | ".$element['nomDepartement']." | ".$element['nomRegion'].'</option>';
                    }
                ?>
            </select></p>

            <p><button type="submit" id="id_ajout" name="submit">Ajouter</button></p>

        </form>

        <p><a href="index.php?cible=maisons&fonction=ajoutMaison">Ajouter une maison</a></p>
        <p><a href="index.php?cible=maisons&fonction=afficherMaisons">Retour aux maisons</a></p>
        <p><a href="index.php">Accueil</a></p>

    </body>
</html>