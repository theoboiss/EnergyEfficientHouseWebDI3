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

            <p><label for="id_lieu">Lieu :</label>
            <input type="text" id="id_lieu"  name="lieu" 
                   placeholder="Entrez la descritpion du lieu de l'appareil" required=""/></p>

            <p><label for="id_description">Description :</label>
            <input type="text" id="id_description"  name="description" 
                   placeholder="Entrez la descritpion"/></p>

            <p><label for="id_video">Vidéo :</label>
            <input type="text" id="id_video"  name="video" 
                   placeholder="Entrez le lien de la vidéo"/></p>

            <p><label for="Id_TypeAppareil">Type</label>
            <select id="Id_TypeAppareil" name="Id_TypeAppareil" >
                <option value="default">Choisissez le type de votre appareil</option>
                <?php              
                    foreach ($selectTypeAppareil as $element) { 
                        echo '<option value="'.$element['Id_Type_Appareil'].'">'.$element['nomTypeAppareil'].'</option>';
                    }
                ?>
            </select></p>

            <p><label for="Id_Piece">Piece</label>
            <select id="Id_Piece" name="Id_Piece" >
                <option value="default">Choisissez la pièce</option>
                <?php              
                    foreach ($selectPiece as $element) { 
                        echo '<option value="'.$element['Id_Piece'].'">'.$element['libellePiece']."   |   Appartement :".$element['libelleAppartement'].'</option>';
                    }
                ?>
            </select></p>

            <p><button type="submit" id="id_ajout" name="submit">Ajouter</button></p>

        </form>

        <p><a href="index.php?cible=appareils&fonction=afficherAppareils">Retour aux appareils</a></p>
        <p><a href="index.php">Accueil</a></p>

    </body>
</html>
