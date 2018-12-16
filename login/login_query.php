<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 11/12/18
 * Time: 17:43
 */

function login($username, $psw)
{
    global $db;
    $query = "select * from User where pseudo = '".$username."' and mdp= '".$psw."'";

    $query = $db->query($query) or die ($db->error);
    return $query; // doing this because otherwise the results get cast into a bool
}


?>