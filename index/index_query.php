<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 12/12/18
 * Time: 13:44
 **/

    function getRecentRecette($nbRecent)
    {
        global $db;

        $query = "select id, nom, duree, description from Recette order by datePoste desc limit ".$nbRecent;
        $res = $db->query($query);

        return $res;
    }

?>