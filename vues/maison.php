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


        <table class="maison_table">
        	<thead>
        		<tr>

        			<th class="maison_td">Maison</th>
        			<th class="maison_td">Degré d'Isolation</th>
        			<th class="maison_td">Evaluation de base</th>
                    <th class="maison_td">Date de début de propriété</th>
                    <th class="maison_td">Date de fin de propriété</th>
                    <th class="maison_td">Adresse</th>
        		</tr>
        	</thead>
        	<tbody>	
        	
            <?php foreach ($afficherMaisons as $element) { ?>
            
                <tr> 
                    <td class="maison_td">
        		    <?php echo $element['nomMaison']; ?>
                    </td>
                    <td class="maison_td">
                	<?php echo $element['degreIsolation']; ?>
                    </td>
                    <td class="maison_td">
                	<?php echo $element['evaluationBase']; ?>
                    </td>
                    <td class="maison_td">
                    <?php echo $element['dateDebutPropriete']; ?>
                    </td>
                    <td class="maison_td">
                    <?php echo $element['dateFinPropriete']; ?>
                    </td>
                    <td class="maison_td">
                    <?php echo $element['numMaison']," ", $element['rue']," ", $element['code_postal']," ", $element['nom_ville']," ", $element['nomDepartement']," ", $element['nomRegion']; ?>
                    </td>
                </tr>
            
            <?php } ?>

        	</tbody>
        </table>


        <?php echo AfficheAlerte($alerte); ?>

        <p><a href="index.php">Accueil</a></p>
    </body>
</html>