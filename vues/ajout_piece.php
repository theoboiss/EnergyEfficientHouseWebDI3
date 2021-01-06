<?php
/**
* Vue : ajouter une pièce
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
            <input type="text" id="id_libelle"  name="libellePiece" 
                   placeholder="Entrez le libellé" required=""/></p>

            <p><label for="Id_Type_Piece">Type :</label>
            <select id="Id_Type_Piece" name="typePiece" >
                <option value="default">Choisissez le type</option>
                <?php              
                    foreach ($selectTypePiece as $element) { 
                        echo '<option value="'.$element['Id_Type_Piece'].'">'.$element['libelle_type_piece'].'</option>';
                    }
                ?>
            </select></p>

            <p><button type="submit" id="id_ajout" name="submit">Ajouter</button></p>

        </form>

        <p><a href="index.php?cible=appartements&fonction=afficherAppartements">Retour aux appartements</a></p>

    </body>
</html>