<?php
/**
* Vue : entête HTML
*/
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="author" content="Eco-logis"/>
    <meta name="keywords" content="html5, CSS3, site web"/>
    <link rel="stylesheet" href="public/css/styles_con.css"/>
</head>
<body>

    <header>
        <form method="get" name="logInOut">
            <button type="submit" value="connexion_inscription" name="cible">Connexion/Deconnexion</button>
        </form>
        <?php echo '<h1 class="title">' . $title . '</h1>'; ?>
    </header>
    
    