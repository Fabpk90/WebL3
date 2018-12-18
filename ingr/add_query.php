<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 11:20
 */

function insertIngr($name, $desc, $idCat)
{
    global $db;

    $query = 'insert into Ingredient(nom, description, idCat) values("'.$name.'", "'.$desc.'", '.$idCat.')';

    $db->query($query) or die($db->error);
}

?>