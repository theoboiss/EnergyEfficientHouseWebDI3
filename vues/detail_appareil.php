<?php 
/**
* Vue : liste des ressources
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
                    <th class="object_td">Libellé</th>
                    <th class="object_td">Description</th>
                    <th class="object_td">Valeur Critique</th>
                    <th class="object_td">Valeur Idéale</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="object_td"><?php echo $affRessources[3]; ?></td>
                    <td class="object_td"><?php echo $affRessources[4]; ?></td>
                    <td class="object_td"><?php echo $affRessources[5]; ?></td>
                    <td class="object_td"><?php echo $affRessources[6]; ?></td>
            </tbody>
            <?php echo AfficheAlerte($alerte); ?>
    </body>
        
</html>
