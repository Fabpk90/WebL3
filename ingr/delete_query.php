<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 11:20
 */

function deleteAllIngrFromRecette($recetteId)
{
    global $db;

    $query = "delete from Compose where idRecette = ".$recetteId;

    $db->query($query) or die($db->error);
}

?>