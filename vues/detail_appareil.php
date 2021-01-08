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
                <?php foreach($affRessources as $element) { ?>
                <tr>
                    <td class="object_td"><?php echo $element[3]; ?></td>
                    <td class="object_td"><?php echo $element[4]; ?></td>
                    <td class="object_td"><?php echo $element[5]; ?></td>
                    <td class="object_td"><?php echo $element[6]; ?></td>
                </tr>
                <?php } ?>
            </tbody>
            <?php echo AfficheAlerte($alerte); ?>
    </body>
        
</html>
