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
					<th class="appareil_td">Description</th>
					<th class="appareil_td">Valeur ideale</th>
					<th class="appareil_td">Valeur critique</th>
				</tr>
			</thead>
		<tbody>
			<?php foreach ($afficherRessources as $element) { ?>
				<tr>
					<td class="appareil_td"> <?php echo $element['libelle']; ?> </td>
					<td class="appareil_td"> <?php echo $element['description']; ?> </td>
					<td class="appareil_td"> <?php echo $element['valIdeal']; ?> </td>
					<td class="appareil_td"> <?php echo $element['valCrit']; ?> </td>
				</tr>
			<?php } ?>
		</tbody>
     	</table>

	<?php echo AfficheAlerte($alerte); ?>

	<p><a href="index.php">Accueil</a></p>		
