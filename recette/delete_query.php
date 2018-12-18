<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 17/12/18
 * Time: 17:53
 */

include("../comm/delete_query.php");
include ("../ingr/delete_query.php");

function deleteRecette($id)
{
    global $db;

    $query = "delete from Recette where id=".$id;

    //first we delete the comm from the recette and then we delete it
    deleteAllComm($id);
    deleteAllIngrFromRecette($id);

    $db->query($query) or die($db->error);
}

?>