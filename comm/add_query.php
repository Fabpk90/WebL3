<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 11:25
 */

function insertComm($recetteId, $userId, $desc)
{
    global $db;

    $query = "INSERT INTO Commentaire VALUES(".$recetteId.", '".$userId."', '".$desc."', DATE(NOW()))";

    $db->query($query)or die($db->error);
}

?>