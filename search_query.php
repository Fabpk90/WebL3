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

?>