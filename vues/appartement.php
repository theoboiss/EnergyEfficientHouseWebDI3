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


        <table>
        	<thead>
        		<tr>

        			<th>Identifiant</th>
        			<th>Degré de sécurité</th>
        			<th>Libellé</th>
                    <th>Identifiant du type de l'appartement</th>
                    <th>Identifiant de la maison</th>
                    <th>Date de début de location</th>
                    <th>Date de fin de location</th>
        		</tr>
        	</thead>
        	<tbody>	
        	
            <?php foreach ($afficherAppartements as $element) { ?>
            
                <tr> 
                    <td>
        		    <?php echo $element['Id_Appartement']; ?>
                    </td>
                    <td>
                	<?php echo $element['degreSecuriteAppartement']; ?>
                    </td>
                    <td>
                	<?php echo $element['libelleAppartement']; ?>
                    </td>
                    <td>
                    <?php echo $element['Id_Type_Appartement']; ?>
                    </td>
                    <td>
                    <?php echo $element['Id_Maison']; ?>
                    </td>
                    <td>
                    <?php echo $element['dateDebutLocation']; ?>
                    </td>
                    <td>
                    <?php echo $element['dateFinLocation']; ?>
                    </td>
                </tr>
            
            <?php } ?>

        	</tbody>
        </table>


        <?php echo AfficheAlerte($alerte); ?>

        <p><a href="index.php">Accueil</a></p>
    </body>
</html>