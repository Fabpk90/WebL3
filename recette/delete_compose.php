<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 15:07
 */

include ("../header.php");
include ("../db_link.php");

include ("delete_compose_query.php");


if(isset($_GET['recetteId']) && isset($_GET['ingredientId']))
{
    deleteCompo($_GET['recetteId'], $_GET['ingredientId']);
    header("Location: recette.php?recetteId=".$_GET['recetteId']);
}

include ("../footer.php");
