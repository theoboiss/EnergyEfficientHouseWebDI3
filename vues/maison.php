<?php 
/**
* Vue : liste des maisons
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

        			<th class="object_td">Maison</th>
        			<th class="object_td">Degré d'Isolation</th>
        			<th class="object_td">Evaluation de base</th>
                    <th class="object_td">Date de début de propriété</th>
                    <th class="object_td">Date de fin de propriété</th>
                    <th class="object_td">Adresse</th>
        		</tr>
        	</thead>
        	<tbody>	
        	
            <?php foreach ($afficherMaisons as $element) { ?>
            
                <tr> 
                    <td class="object_td">
        		    <?php echo $element['nomMaison']; ?>
                    </td>
                    <td class="object_td">
                	<?php echo $element['degreIsolation']; ?>
                    </td>
                    <td class="object_td">
                	<?php echo $element['evaluationBase']; ?>
                    </td>
                    <td class="object_td">
                    <?php echo $element['dateDebutPropriete']; ?>
                    </td>
                    <td class="object_td">
                    <?php echo $element['dateFinPropriete']; ?>
                    </td>
                    <td class="object_td">
                    <?php echo $element['numMaison']," ", $element['rue']," ", $element['code_postal']," ", $element['nom_ville']," ", $element['nomDepartement']," ", $element['nomRegion']; ?>
                    </td>
                    <?php
                    echo '<td><a href="index.php?cible=maisons&fonction=modifier&id='.$element['Id_Maison'].'">Modifier</a></td>';
                    ?>
                </tr>
            
            <?php } ?>

        	</tbody>
        </table>


        <?php echo AfficheAlerte($alerte); ?>

        <p><a href="index.php?cible=maisons&fonction=ajoutMaison">Ajouter une maison</a></p>
        <p><a href="index.php?cible=datePropriete&fonction=ajouterDatePropriete">Ajouter une date de propriété</a></p>

    </body>
</html>