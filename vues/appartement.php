<?php 
/**
* Vue : liste des appartements
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


        <table class='object_table'>
        	<thead>
        		<tr>
                    <th class='object_td'>Libellé</th>
        			<th class='object_td'>Degré de sécurité</th>
                    <th class='object_td'>Type de l'appartement</th>
                    <th class='object_td'>Libellé de la maison</th>
                    <th class='object_td'>Date de début de location</th>
                    <th class='object_td'>Date de fin de location</th>
        		</tr>
        	</thead>
        	<tbody>	
        	
            <?php foreach ($afficherAppartements as $element) { ?>
            
                <tr> 
                    <td class='object_td'>
        		    <?php echo $element['libelleAppartement']; ?>
                    </td>
                    <td class='object_td'>
                	<?php echo $element['degreSecuriteAppartement']; ?>
                    </td>
                    <td class='object_td'>
                    <?php echo $element['libelle_type_appartement']; ?>
                    </td>
                    <td class='object_td'>
                    <?php echo $element['nomMaison']; ?>
                    </td>
                    <td class='object_td'>
                    <?php echo $element['dateDebutLocation']; ?>
                    </td>
                    <td class='object_td'>
                    <?php echo $element['dateFinLocation']; ?>
                    </td>
                    <?php
                    echo '<td><a href="index.php?cible=pieces&fonction=afficherPieces&id='.$element['Id_Appartement'].'">Pièces</a></td>';
                    echo '<td><a href="index.php?cible=appartements&fonction=modifier&id='.$element['Id_Appartement'].'">Modifier</a></td>';
                    echo '<td><a href="index.php?cible=dateLocation&fonction=modifier&id='.$element['Id_Appartement'].'&datefin='.$element['dateFinLocation'].'"">Modifier la date de fin de location</a></td>';
                    ?>
                </tr>
            
            <?php } ?>

        	</tbody>
        </table>


        <?php echo AfficheAlerte($alerte); ?>

        <p><a href="index.php?cible=appartements&fonction=ajoutAppartement">Ajouter un appartement</a></p>
        <p><a href="index.php?cible=dateLocation&fonction=ajouterDateLocation">Ajouter une date de location</a></p>

    </body>
</html>