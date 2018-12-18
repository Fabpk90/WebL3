<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 14:20
 */

function insertCompose($idRecette, $idIngredient, $qte)
{
    global $db;

    $query = 'insert into Compose values('.$idRecette.', "'.$idIngredient.'", '.$qte.')';

    $db->query($query) or die($db->error);
}

?>