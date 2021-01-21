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
                <!-- <?php switch ($function) { 
                        case 'afficherRessources': -->
        
                            foreach($affRessources as $element) { ?>
                                <tr>
                                    <td class="object_td"><?php echo $element['libelle']; ?></td>
                                    <td class="object_td"><?php echo $element['description']; ?></td>
                                    <td class="object_td"><?php echo $element['valCrit']; ?></td>
                                    <td class="object_td"><?php echo $element['valIdeale']; ?></td>
                                </tr>
                        <?php  } 
                            <!-- break;
                        case 'afficherStat':
                            foreach($affStat as $element) { ?>
                                <tr>
                                    <td class="object_td"><?php echo $element['Id_Appareil']; ?></td>
                                    <td class="object_td"><?php echo $element['Id_Matiere']; ?></td>
                                    <td class="object_td"><?php echo $element['consommation']; ?></td>
                                </tr>
                        <?php }
                            break; } ?> -->
            </tbody>
            <?php echo AfficheAlerte($alerte); ?>
        </table>
    </body>
        
</html>
