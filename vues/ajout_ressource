<?php
/**
* Vue : ajouter un appareil
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

            <p><label for="id_libelle">Libellé :</label>
            <input type="text" id="id_libelle"  name="libelle" 
                   placeholder="Entrez le libellé" required=""/></p>

            <p><label for="id_description">Description :</label>
            <input type="text" id="id_description"  name="description" 
                   placeholder="Entrez la descritpion"/></p>

            <p><label for="id_valMin">Valeur minimale :</label>
            <input type="text" id="id_valMin"  name="valMin" 
                   placeholder="Entrez la valeur minimale de la ressource"/></p>

            <p><label for="id_valMax">Valeur maximale :</label>
            <input type="text" id="id_valMax"  name="valMax" 
                   placeholder="Entrez la valeur maximale de la ressource"/></p>
            
            <p><label for="id_valCrit">Valeur critique :</label>
            <input type="text" id="id_valCrit"  name="valCrit" 
                   placeholder="Entrez la valeur critique de la ressource"/></p>
                   
                   <p><label for="id_valIdeale">Valeur idéale :</label>
            <input type="text" id="id_valIdeale"  name="valIdeale" 
                   placeholder="Entrez la valeur idéale de la ressource"/></p>
                   
                <?php              
                    foreach ($selectTypeAppareil as $element) { 
                        echo '<option value="'.$element['Id_Type_Appareil'].'">'.$element['nomTypeAppareil'].'</option>';
                    }
                ?>
            </select></p>

            <p><label for="Id_Piece">Piece</label>

            <p><button type="submit" id="id_ajout" name="submit">Ajouter</button></p>

        </form>

        <p><a href="index.php?cible=detail_appareils&fonction=afficherRessources">Retour aux ressources</a></p>

    </body>
</html>
