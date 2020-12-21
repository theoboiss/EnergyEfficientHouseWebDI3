<?php 
/**
* Vue : liste des départements déjà enregistrés
*/
?>

<p><?php echo $entete; ?></p>


<table>
	<thead>
		<tr>

			<th>Identifiant</th>
			<th>Libellé</th>
			<th>Région</th>
		</tr>
	</thead>
	<tbody>	
	
    <?php foreach ($liste as $element) { ?>
    
        <tr> 
            <td>
		<?php echo $element['idDept']; ?>
            </td>
            <td>
        	<?php echo $element['LibDept']; ?>
            </td>
            <td>
        	<?php echo $element['idRegion']; ?>
            </td>
            <?php
            echo '<td><a href="index.php?cible=region&fonction=modifier&id='.$element['idDept'].'">Modifier</a></td>';
            echo '<td><a href="index.php?cible=region&fonction=supprimer&id='.$element["idDept"].'">Supprimer</a></td>';
            ?>
        </tr>
    
    <?php } ?>

	</tbody>
</table>


<?php echo AfficheAlerte($alerte); ?>


<p><a href="index.php?cible=departement&fonction=ajout">Ajouter un département</a> | <a href="index.php?cible=departement&fonction=recherche">Chercher un département</a> | <a href="index.php">Accueil</a></p>
