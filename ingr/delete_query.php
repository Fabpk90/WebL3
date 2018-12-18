<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 11:20
 */

function deleteAllIngrFromRecette($recetteId)
{
    global $db;

    $query = "delete from Compose where idRecette = ".$recetteId;

    $db->query($query) or die($db->error);
}

function deleteIngr($name)
{
    global $db;

    //we delete all the entries of compose where the ingredient is used
    //then we delete it

    $query = 'delete from Compose where idIngredient="'.$name.'"';

    $db->query($query) or die($db->error);

    $query = 'delete from Ingredient where nom="'.$name.'"';
    $db->query($query) or die($db->error);
}

?>