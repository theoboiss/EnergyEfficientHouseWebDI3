<?php
/**
* Vue : modifier une pièce
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

            <?php foreach ($getPiece as $element) echo '<p><label for="id_libelle">Libellé :</label>
            <input type="text" id="id_libelle"  name="libellePiece" 
                   value ="' . $element['libellePiece'] . '" required=""/></p>

            <p><label for="Id_Type_Piece">Type :</label>
            <select id="Id_Type_Piece" name="typePiece" >
                <option value="'.$element['Id_Type_Piece'].'">'.$element['libelle_type_piece'].'</option>' ;           
                    foreach ($selectTypePiece as $element2) { 
                        echo '<option value="'.$element2['Id_Type_Piece'].'">'.$element2['libelle_type_piece'].'</option>';
                    }
            echo '</select></p>' ; ?>

            <p><button type="submit" id="id_ajout" name="submit">Modifier</button></p>

        </form>

        <p><a href="index.php?cible=appartements&fonction=afficherAppartements">Retour aux appartements</a></p>

    </body>
</html>