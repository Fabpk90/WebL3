<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 12:53
 */

function getTypes()
{
    global $db;

    $query = "select * from Type";

    $res = $db->query($query);
    return $res;
}

?>