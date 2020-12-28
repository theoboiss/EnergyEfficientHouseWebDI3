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


        <table class="appareil_table">
        	<thead>
        		<tr>

        			<th class="appareil_td">Libellé</th>
                    <th class="appareil_td">Type</th>
        			<th class="appareil_td">Pièce</th>
                    <th class="appareil_td">Appartement</th>
        		</tr>
        	</thead>
        	<tbody>	
        	
            <?php foreach ($afficherAppareils as $element) { ?>
            
                <tr> 
                    <td class="appareil_td">
        		    <?php echo $element['libelleAppareil']; ?>
                    </td>
                    <td class="appareil_td">
                	<?php echo $element['nomTypeAppareil']; ?>
                    </td>
                    <td class="appareil_td">
                	<?php echo $element['Id_Piece']; ?>
                    </td>
                    <td class="appareil_td">
                    <?php echo $element['Id_Appartement']; ?>
                    </td>
                </tr>
            
            <?php } ?>

        	</tbody>
        </table>


        <?php echo AfficheAlerte($alerte); ?>

        <p><a href="index.php?cible=appareils&fonction=ajoutAppareil">Ajouter un appareil</a></p>

        <p><a href="index.php">Accueil</a></p>
    </body>
</html>
