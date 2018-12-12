<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 12/12/18
 * Time: 13:44
 **/

    function getRecette()
    {
        global $db;

        $query = "select nom, duree, description from Recette order by datePoste desc limit 5 ";
        $res = $db->query($query);

        return $res;
    }

?>