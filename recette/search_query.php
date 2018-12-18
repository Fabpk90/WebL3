<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 12/12/18
 * Time: 15:48
 */

function getRecetteByName($name)
{
    global $db;

    $query = "select id, nom, SUBSTRING(description, 1, 50) as description from Recette where nom like '%".urldecode($name)."%'";

    $res = $db->query($query)or die($db->error);
    return $res;
}

function getRecetteByNameType($name, $idType)
{
    global $db;

    $query = "select r.id, r.nom, SUBSTRING(r.description, 1, 50) as description 
from Recette as r, Compose as c, Ingredient as i, Type as t
where r.nom like '%".urldecode($name)."%'
and c.idRecette = r.id and c.idIngredient = i.nom and t.id = i.idCat
and t.id= ".$idType;

    $res = $db->query($query)or die($db->error);
    return $res;
}

?>