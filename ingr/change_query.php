<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 13:35
 */

function changeIngr($oldName, $name, $desc, $idCat)
{
    global $db;

    $query = 'update Ingredient set nom="'.$name.'", description="'.$desc.'", idCat='.$idCat.'
            where nom="'.$oldName.'"';

    $db->query($query) or die($db->error);
}

?>