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

    function getMostInsertRecette()
    {
        global $db;

        $query ="SELECT u.pseudo, COUNT(*) as nbRecette
    FROM User as u, Recette as r
    WHERE u.pseudo = r.auteur
    GROUP BY u.pseudo
    HAVING COUNT(*) =
    (SELECT MAX(nbRecetteMonth)
            FROM 
            ( SELECT COUNT(*) as nbRecetteMonth
                FROM User as u, Recette as r
                WHERE u.pseudo = r.auteur AND MONTH(r.datePoste) = MONTH(NOW())
                    GROUP BY u.pseudo
            ) as RecetteMonth
    )";
        $res = $db->query($query) or die ($db->error);
        return $res;

    }

?>