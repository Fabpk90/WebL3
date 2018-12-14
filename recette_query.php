<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 12/12/18
 * Time: 14:23
 */

function getRecette($id)
{
    global $db;

    $query = "select nom, description, duree from Recette where id ='".$id."'";

    $res = $db->query($query) or die($db->error);
    return $res;
}

function getIngredients($recetteId)
{
    global $db;

    $query = "select * from Compose as c, Ingredient as i where i.nom = c.idIngredient and c.idRecette ='".$recetteId."'";

    $res = $db->query($query)or die($db->error);
    return $res;
}

?>