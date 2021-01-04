<?php 
/**
* Vue : accueil
*/
?>

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8" />
            <link rel="stylesheet" href="public/css/styles_con.css"/>
        </head>

    	<body>
			<?php if (estConnecte()) echo '
			<p><a href="index.php?cible=principal&fonction=parametrage">Gestion des entités paramétrables</a></p>
			<p><a href="index.php?cible=appareils&fonction=afficherAppareils">Mes Appareils</a></p>
			<p><a href="index.php?cible=appartements&fonction=afficherAppartements">Mes Appartements</a></p>
			<p><a href="index.php?cible=maisons&fonction=afficherMaisons">Mes Maisons</a></p>
			<p><a href="index.php?cible=departement&fonction=liste">Départements</a></p>
			<p><a href="index.php?cible=region&fonction=liste">Régions</a></p>
			'?>
			<p><a href="index.php?cible=connexion_inscription">Connexion/Deconnexion</a></p>
			
			<?php if (isset($alerte)) echo AfficheAlerte($alerte); ?>

		</body>
	</html>

