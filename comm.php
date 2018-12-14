<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 14/12/18
 * Time: 22:06
 */

session_start();

include_once ("db_link.php");
include ("comm_query.php");

if(isset($_POST['recetteId']))
{
    $recetteId = $_POST['recetteId'];
    $desc = $_POST['desc'];

    insertComm($recetteId, $_SESSION['id'], htmlspecialchars($desc));

    header("Location: recette.php?id=".$recetteId);
}


?>