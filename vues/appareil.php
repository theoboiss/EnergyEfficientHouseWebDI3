<?php 
/**
* Vue : liste des appareils
*/
?>

<p><?php echo $entete; ?></p>


<table>
	<thead>
		<tr>

			<th>Identifiant</th>
			<th>Libellé</th>
			<th>Pièce</th>
            <th>Appartement</th>
		</tr>
	</thead>
	<tbody>	
	
    <?php foreach ($afficherAppareils as $element) { ?>
    
        <tr> 
            <td>
		    <?php echo $element['Id_Appareil']; ?>
            </td>
            <td>
        	<?php echo $element['libelleAppareil']; ?>
            </td>
            <td>
        	<?php echo $element['Id_Piece']; ?>
            </td>
            <td>
            <?php echo $element['Id_Appartement']; ?>
            </td>
        </tr>
    
    <?php } ?>

	</tbody>
</table>


<?php echo AfficheAlerte($alerte); ?>

<a href="index.php">Accueil</a></p>
