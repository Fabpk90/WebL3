<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 17/12/18
 * Time: 20:58
 */

//TODO: maybe modify the photo

function changeRecette($recetteId, $desc, $duree)
{
    global $db;

    $query = "update Recette set description = '".$desc."', duree = ".$duree." 
                where id = ".$recetteId;

    $db->query($query) or die ($db->error);
}

?>