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

    $query = "select id, nom, description, duree from Recette where nom ='".$name."'";

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

function getComm($recetteId)
{
    global $db;

    $query = "select u.pseudo, c.description, c.date from Commentaire as c, User as u where c.idUser = u.id and c.idRecette = '".$recetteId."'";

    $res = $db->query($query)or die($db->error);
    return $res;
}

?>