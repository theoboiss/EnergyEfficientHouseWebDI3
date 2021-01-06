<?php 
/**
* Vue : liste des appareils
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


        <table class="object_table">
        	<thead>
        		<tr>

        			<th class="object_td">Libellé</th>
                    <th class="object_td">Type</th>
                    <th class="object_td">Description</th>
                    <th class="object_td">Lieu</th>
        			<th class="object_td">Pièce</th>
                    <th class="object_td">Appartement</th>
        		</tr>
        	</thead>
        	<tbody>	
        	
            <?php foreach ($afficherAppareils as $element) { ?>
            
                <tr> 
                    <td class="object_td">
        		    <?php echo $element['libelleAppareil']; ?>
                    </td>
                    <td class="object_td">
                	<?php echo $element['nomTypeAppareil']; ?>
                    </td>
                    <td class="object_td">
                    <?php echo $element['descriptionAppareil']; ?>
                    </td>
                    <td class="object_td">
                    <?php echo $element['lieuAppareil']; ?>
                    </td>
                    <td class="object_td">
                	<?php echo $element['libellePiece']; ?>
                    </td>
                    <td class="object_td">
                    <?php echo $element['libelleAppartement']; ?>
                    </td>
                    <?php
                    echo '<td><a href="index.php?cible=appareils&fonction=modifier&id='.$element['Id_Appareil'].'">Modifier</a></td>';
                    ?>
                </tr>
            
            <?php } ?>

        	</tbody>
        </table>


        <?php echo AfficheAlerte($alerte); ?>

        <p><a href="index.php?cible=appareils&fonction=ajoutAppareil">Ajouter un appareil</a></p>

    </body>
</html>
