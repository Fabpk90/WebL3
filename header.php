<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 11/12/18
 * Time: 17:07
 */

/*
 * TODO:  recherche avancée, modifier la photo de la recette aussi, utiliser les vues, (modif type) (modif ingredients dans recettes)
 * TODO:  check footer in all pages
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

    <?php
    if($_SESSION['admLevel'] == 2)
    {?>

        <div class="dropdown">
            <button class="dropbtn">Administration</button>
            <div class="dropdown-content">
                <a href="../ingr/add_type.php">Ajouter un Type</a>
                <a href="../ingr/delete_type.php">Supprimer un Type</a>
                <a href="../ingr/add.php">Ajouter un Ingredient</a>
                <a href="../ingr/delete.php">Supprimer un Ingredient</a>
                <a href="../ingr/change.php">Modifier un Ingredient</a>
            </div>
        </div>
    <?php
    }?>

    <div class="dropdown">
        <button class="dropbtn">Recette</button>
        <div class="dropdown-content">
            <a href="../recette/search.php">Rechercher une recette</a>

    <?php



    if(isset($_SESSION['id']))
    {?>
        <a href="../recette/add.php">Ajouter une recette</a>

        </div>
    </div>
        <li><a href="../login/logout.php">Déconnexion</a></li>

    <?php
    }
    ?>
        </div>
    </div>

    <?php
    if(!isset($_SESSION['id']))
    {
        echo ' <li><a href="../login/login.php">Connexion</a></li>';
        echo ' <li><a href="../login/signup.php">Inscription</a></li>';
    }
    ?>
</ul>