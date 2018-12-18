<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 11:33
 */

function changeComm($recetteId, $userId, $date, $desc)
{
    global $db;

    $query = 'update Commentaire set description = "'.$desc.'" where idRecette ='.$recetteId.' and idUser ="'.$userId.'" and date ="'.$date.'"';

    $db->query($query) or die($db->error);
}

?>