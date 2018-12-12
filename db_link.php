<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 11/12/18
 * Time: 17:44
 */

$host = "localhost";

if(isset($_SESSION['admLevel']))
{
    if($_SESSION['admLevel'] == 1) //user logged in
        $user = "utilisateur";
    else if($_SESSION['admLevel'] == 2) // admin logged in
        $user = "admin";
    else
        $user = "visiteur";
}

$psw = $user;

global $db;

$db = new mysqli("localhost", $user, $psw, "KitchenCook");

if($db->connect_errno) {
    die ("Erreur de connexion: errno:" . $db->errno." error: ".$db->error);
}

$db->set_charset("utf8");

?>