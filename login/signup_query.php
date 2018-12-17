<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 16/12/18
 * Time: 18:26
 */

function signup($name, $psw)
{
    global $db;

    $query = "INSERT INTO User(pseudo, mdp, dateInscription) VALUES('".$name."', '".$psw."',  DATE(NOW()))";

    return $db->query($query);
}

?>