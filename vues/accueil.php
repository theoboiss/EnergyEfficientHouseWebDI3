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
    		<div id="image_centrale">
    			<div id="menu_accueil">
					<?php if (estConnecte()) echo '
					<p><a href="index.php?cible=profil">Mon profil</a></p>
					<p><a href="index.php?cible=principal&fonction=parametrage">Gestion des entités paramétrables</a></p>
					<p><a href="index.php?cible=appareils&fonction=afficherAppareils">Mes Appareils</a></p>
					<p><a href="index.php?cible=ressources&fonction=afficherRessources">Ressources</a></p>
					<p><a href="index.php?cible=appartements&fonction=afficherAppartements">Mes Appartements</a></p>
					<p><a href="index.php?cible=maisons&fonction=afficherMaisons">Mes Maisons</a></p>
					'?>
					<p><a href="index.php?cible=connexion_inscription">Connexion/Deconnexion</a></p>
				</div>
				
				<?php if (isset($alerte)) echo AfficheAlerte($alerte); ?>
			</div>
		</body>
	</html>

