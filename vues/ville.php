<?php 
/**
* Vue : liste des villes déjà enregistrés
*/
?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8" />
            <link rel="stylesheet" href="public/css/styles_con.css"/>
        </head>
<p><?php echo $entete; ?></p>


<table class="object_table">
	<thead>
		<tr>
            <th class="object_td">Code postal</th>
			<th class="object_td">Nom</th>
			<th class="object_td">Département</th>
		</tr>
	</thead>
	<tbody>	
	
    <?php foreach ($liste as $element) { ?>
    
        <tr> 
            <td class="object_td">
        	<?php echo $element['code_postal']; ?>
            </td>
            <td class="object_td">
        	<?php echo $element['nom_ville']; ?>
            </td>
            <td class="object_td">
        	<?php echo $element['nomDepartement']; ?>
            </td>
            <?php
            echo '<td class="object_td"><a href="index.php?cible=ville&fonction=modifier&id='.$element['Id_Ville'].'">Modifier</a></td>';
            echo '<td class="object_td"><a href="index.php?cible=ville&fonction=supprimer&id='.$element["Id_Ville"].'">Supprimer</a></td>';
            ?>
        </tr>
    
    <?php } ?>

	</tbody>
</table>


<?php echo AfficheAlerte($alerte); ?>


<p><a href="index.php?cible=ville&fonction=ajout">Ajouter une ville</a> | <a href="index.php?cible=ville&fonction=recherche">Chercher une ville</a></p>
