<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 16:02
 */

include_once ("delete_query.php");

function deleteType($id)
{
    global $db;

    deleteIngrByCat($id);

    $query = "delete from Type where id=".$id;
    $res = $db->query($query) or die($db->error);

    return $res;
}

?>