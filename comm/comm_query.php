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

    $query = "select u.pseudo,c.idRecette as recetteId, c.description, c.date from Commentaire as c, User as u where c.idUser = u.pseudo and c.idRecette = '".$recetteId."' order by c.date";

    $res = $db->query($query)or die($db->error);
    return $res;
}

function insertComm($recetteId, $userId, $desc)
{
    global $db;

    $query = "INSERT INTO Commentaire VALUES(".$recetteId.", '".$userId."', '".$desc."', DATE(NOW()))";

    echo $query;

    $db->query($query)or die($db->error);
}

function deleteComm($recetteId, $userId)
{
    global $db;

    $query = "delete from Commentaire where idRecette = ".$recetteId." and idUser = '".$userId."'";

    $db->query($query) or die($db->error);
}

?>