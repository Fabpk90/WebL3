<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 20:13
 */

include ("../header.php");
include ("../db_link.php");

include ("ingr_query.php");

if(isset($_GET['name']) && isset($_GET['recetteId']))
{
    $ingr = getIngr(urldecode($_GET['name']))->fetch_assoc();

    echo "Nom de l'ingredient: ".$ingr['nom']."<br/>";
    echo "Description: ".$ingr['description'];

    echo "<a href=../recette/recette.php?recetteId=".$_GET['recetteId']."> Revenir à la recette</a>";
}

else
{
    echo "Auncun ingredient n'a été choisi";
}



include ("../footer.php");

?>