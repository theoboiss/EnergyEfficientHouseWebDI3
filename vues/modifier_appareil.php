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

            <?php foreach ($getAppareil as $element) echo '<p><label for="id_libelle">Libellé :</label>
            <input type="text" id="id_libelle"  name="libelle" 
                   value="'. $element['libelleAppareil'] . '" required=""/></p>

            <p><label for="id_lieu">Lieu :</label>
            <input type="text" id="id_lieu"  name="lieu" 
                   value="'. $element['lieuAppareil'] . '" required=""/></p>

            <p><label for="id_description">Description :</label>
            <input type="text" id="id_description"  name="description" 
                   value="' . $element['descriptionAppareil'] . '"/></p>

            <p><label for="id_video">Vidéo :</label>
            <input type="text" id="id_video"  name="video" 
                   value="' . $element['videoAppareil'] . '"/></p>

            <p><label for="Id_TypeAppareil">Type</label>
            <select id="Id_TypeAppareil" name="Id_TypeAppareil" >
                <option value="'.$element['Id_Type_Appareil'].'">'. $element['nomTypeAppareil'] . '</option>';           
                    foreach ($selectTypeAppareil as $element2) { 
                        echo '<option value="'.$element2['Id_Type_Appareil'].'">'.$element2['nomTypeAppareil'].'</option>';
                    }
            echo '</select></p>

            <p><label for="Id_Piece">Piece</label>
            <select id="Id_Piece" name="Id_Piece" >
                <option value="'.$element['Id_Piece'].'">'.$element['libellePiece'].'</option>';             
                    foreach ($selectPiece as $element3) { 
                        echo '<option value="'.$element3['Id_Piece'].'">'.$element3['libellePiece']."   |   Appartement :".$element3['libelleAppartement'].'</option>';
                    }
            echo '</select></p>'; ?>

            <p><button type="submit" id="id_modif" name="submit">Modifier</button></p>

        </form>

        <p><a href="index.php?cible=appareils&fonction=afficherAppareils">Retour aux appareils</a></p>

    </body>
</html>