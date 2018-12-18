<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 15:08
 */

function deleteCompo($idRecette, $idIngredient)
{
    global $db;

    $query = 'delete from Compose where idRecette='.$idRecette.' and idIngredient="'.$idIngredient.'"';

    $db->query($query) or die($db->error);
}

?>