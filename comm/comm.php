<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 14/12/18
 * Time: 22:06
 */

session_start();

include_once("../db_link.php");
include("comm_query.php");

$recetteId = "";

if(isset($_GET['recetteId']) && isset($_GET['userId']))
{
    $recetteId = $_GET['recetteId'];

    //check privileges
    if($_SESSION['admLevel'] == 2 || $_SESSION['id'] == $_GET['userId'])
        deleteComm($_GET['recetteId'], $_GET['userId']);
}
else if (isset($_POST['desc']))
{
    $recetteId = $_POST['recetteId'];

    $desc = $_POST['desc'];

    insertComm($_POST['recetteId'], $_SESSION['id'], htmlspecialchars($desc));
}

header("Location: ../recette/recette.php?recetteId=".$recetteId);

?>