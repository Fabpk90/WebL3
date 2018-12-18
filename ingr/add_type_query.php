<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 12:15
 */

function insertType($name)
{
    global $db;

    $query = "insert into Type(nom) values('".$name."')";

    $db->query($query) or die($db->error);
}

?>