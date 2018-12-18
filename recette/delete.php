<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 17/12/18
 * Time: 17:53
 */

include ("../header.php");
include ("../db_link.php");
include ("delete_query.php");

//used to know if the user can truly delete the recette
include ("recette_query.php");

if(isset($_GET['recetteId']))
{
    $resRecette = getRecette($_GET['recetteId'])->fetch_assoc();
    if($_SESSION['admLevel'] != 2)
    {
        if($resRecette['auteur'] != $_SESSION['id'])
        {
            header("Location: ../index/index.php");
        }
    }

    //dangerous cause of sql injection
    deleteRecette($_GET['recetteId']);

    if($resRecette['photoPath'] != "")
        unlink("/opt/lampp/htdocs/KitchenCook/img/".$resRecette['photoPath']);

    echo "Recette supprimée";
}


include ("../footer.php");
?>