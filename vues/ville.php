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


<table class="ville_table">
	<thead>
		<tr>
            <th>Code postal</th>
			<th>Nom</th>
			<th>Département</th>
		</tr>
	</thead>
	<tbody>	
	
    <?php foreach ($liste as $element) { ?>
    
        <tr> 
            <td class="ville_td">
        	<?php echo $element['code_postal']; ?>
            </td>
            <td class="ville_td">
        	<?php echo $element['nom_ville']; ?>
            </td>
            <td class="ville_td">
        	<?php echo $element['nomDepartement']; ?>
            </td>
            <?php
            echo '<td class="ville_td"><a href="index.php?cible=region&fonction=modifier&id='.$element['Id_Departement'].'">Modifier</a></td>';
            echo '<td class="ville_td"><a href="index.php?cible=region&fonction=supprimer&id='.$element["Id_Departement"].'">Supprimer</a></td>';
            ?>
        </tr>
    
    <?php } ?>

	</tbody>
</table>


<?php echo AfficheAlerte($alerte); ?>


<p><a href="index.php?cible=ville&fonction=ajout">Ajouter une ville</a> | <a href="index.php?cible=ville&fonction=recherche">Chercher une ville</a> | <a href="index.php">Accueil</a></p>
