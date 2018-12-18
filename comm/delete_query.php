<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 11:26
 */

function deleteComm($recetteId, $userId, $date)
{
    global $db;

    $query = "delete from Commentaire where idRecette = ".$recetteId." and idUser = '".$userId."' and date = '".$date."'";

    $db->query($query) or die($db->error);
}

function deleteAllComm($recetteId)
{
    global $db;

    $query = "delete from Commentaire where idRecette=".$recetteId;

    $db->query($query) or die ($db->error);
}

?>