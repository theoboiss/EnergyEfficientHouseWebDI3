<?php 
/**
* Vue : liste des pièces
*/
?>

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8" />
            <link rel="stylesheet" href="public/css/styles_con.css"/>
        </head>

    <body>

        <p><?php echo $entete; ?></p>


        <table class="appareil_table">
        	<thead>
        		<tr>

        			<th class="appareil_td">Libellé</th>
                    <th class="appareil_td">Type</th>

        		</tr>
        	</thead>
        	<tbody>	
        	
            <?php foreach ($afficherPieces as $element) { ?>
            
                <tr> 
                    <td class="appareil_td">
        		    <?php echo $element['libellePiece']; ?>
                    </td>
                    <td class="appareil_td">
                	<?php echo $element['libelle_type_piece']; ?>
                    </td>
                    <?php
                    echo '<td><a href="index.php?cible=pieces&fonction=modifier&id='.$element['Id_Piece'].'">Modifier</a></td>';
                    ?>

                </tr>
            
            <?php } ?>

        	</tbody>
        </table>


        <?php echo AfficheAlerte($alerte); ?>

        <?php echo '<p><a href="index.php?cible=pieces&fonction=ajouterPiece&id=' .$element['Id_Piece']. '">Ajouter une pièce</a></p>' ?>
        <p><a href="index.php?cible=appartements&fonction=afficherAppartements">Retour aux appartements</a></p>

    </body>
</html>