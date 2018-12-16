<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 16/12/18
 * Time: 12:15
 */

session_start();
session_destroy();

header("Location: ../index/index.php");

?>