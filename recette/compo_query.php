<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 15:20
 */

function getAllCompo($recetteId)
{
    global $db;

    $query = "select * from Compose where idRecette=".$recetteId;

    $res = $db->query($query) or die($db->error);
    return $res;
}

?>