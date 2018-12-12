<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 12/12/18
 * Time: 14:23
 */

function getRecette($name)
{
    global $db;

    $query = "select r.name, r.description, r.duree from Recette where name ='".$name."'";

    $res = $db->query($query);
    return $res;
}

function getIngredients($recetteId)
{
    global $db;

    $query = "select * from Compose as c, Ingredient as i where c. ='".$name."'";

    $res = $db->query($query);
    return $res;
}

function getComm($recetteId)
{

}

?>