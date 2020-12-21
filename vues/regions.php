<?php 
/**
* Vue : liste des régions déjà enregistrés
*/
?>

<p><?php echo $entete; ?></p>


<table>
	<thead>
		<tr>

			<th>Identifiant</th>
			<th>Libellé</th>
		</tr>
	</thead>
	<tbody>	
	
    <?php foreach ($liste as $element) { ?>
    
        <tr> 
            <td>
		<?php echo $element['idRegion']; ?>
            </td>
            <td>
        	<?php echo $element['LibRegion']; ?>
            </td>
            <?php
            echo '<td><a href="index.php?cible=region&fonction=modifier&id='.$element['idRegion'].'">Modifier</a></td>';
            echo '<td><a href="index.php?cible=region&fonction=supprimer&id='.$element["idRegion"].'">Supprimer</a></td>';
            ?>
        </tr>
    
    <?php } ?>

	</tbody>
</table>


<?php echo AfficheAlerte($alerte); ?>


<p><a href="index.php?cible=region&fonction=ajout">Ajouter une région</a> | <a href="index.php?cible=region&fonction=recherche">Chercher une région</a> | <a href="index.php">Accueil</a></p>
