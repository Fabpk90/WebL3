<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 14/12/18
 * Time: 21:33
 */

function getComm($recetteId)
{
    global $db;

    $query = "select u.pseudo,c.idRecette as recetteId, c.description, c.date from Commentaire as c, User as u where c.idUser = u.pseudo and c.idRecette = ".$recetteId." order by c.date";

    $res = $db->query($query)or die($db->error);
    return $res;
}

function getUserComm($recetteId, $userId, $date)
{
    global $db;

    $query = "select c.idRecette as recetteId, c.description, c.date from Commentaire as c where c.idUser = '".$userId."' and c.idRecette = ".$recetteId." and date ='".$date."'";

    $res = $db->query($query)or die($db->error);
    return $res;
}

?>