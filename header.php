<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 11/12/18
 * Time: 17:07
 */

/*
 * TODO: inscription, insertion recette et suppression, insertion type/ingredient (suppression)
 */



session_start();

if(!isset($_SESSION['admLevel']))
{
    $_SESSION['admLevel'] = 0;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KitchenCook</title>

    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<ul id="head">
    <li><a href="../index/index.php">Accueil</a></li>
    <li><a href="../recette/search.php">Rechercher une recette</a></li>
    <?php
    if(isset($_SESSION['name']))
    {?>
        <li><a href="../recette/add.php">Ajouter une recette</a></li>
        <li><a href="../login/logout.php">Déconnexion</a></li>


    <?php
    }
    else
    {
        echo ' <li><a href="../login/login.php">Connexion</a></li>';
    }
    ?>
</ul>