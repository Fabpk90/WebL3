<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 13:21
 */

function getAllIngr()
{
    global $db;

    $query = "select * from Ingredient";

    $res = $db->query($query) or die ($db->error);
    return $res;
}

function getIngr($name)
{
    global $db;

    $query = 'select * from Ingredient where nom ="'.$name.'" ';

    $res = $db->query($query) or die ($db->error);
    return $res;
}

?>