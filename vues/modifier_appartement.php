<?php
/**
* Vue : modifier un appartement
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

            <?php foreach ($getAppartement as $element) echo '<p><label for="id_libelle">Libellé :</label>
            <input type="text" id="id_libelle"  name="libelle" 
                   value ="' . $element['libelleAppartement'] . '" required=""/></p>

            <p><label for="degreSecuriteAppartement">Degré de sécurité :</label>
            <input type="text" id="degreSecuriteAppartement"  name="degreSecuriteAppartement" 
                   value =' . $element['degreSecuriteAppartement'] . ' required=""/></p>


            <p><label for="Id_Type_Appartement">Type :</label>
            <select id="Id_Type_Appartement" name="typeAppartement" >
                <option value="'.$element['Id_Type_Appartement'].'">'.$element['libelle_type_appartement'].'</option>';              
                    foreach ($selectTypeAppartement as $element2) { 
                        echo '<option value="'.$element2['Id_Type_Appartement'].'">'.$element2['libelle_type_appartement'].'</option>';
                    }
            echo '</select></p>'; ?>

            <p><button type="submit" id="id_modif" name="submit">Modifier</button></p>

        </form>

        <p><a href="index.php?cible=appartements&fonction=afficherAppartements">Retour aux appartements</a></p>

    </body>
</html>