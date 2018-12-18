<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 17/12/18
 * Time: 16:30
 */

function insertRecette($name, $desc, $userId, $duration, $path, $ext)
{
    global $db;

    $query = 'insert into Recette(nom, description, auteur, duree, photoPath, datePoste)
              values("'.$name.'","'.htmlspecialchars($desc).'", "'.$userId.'", '.$duration.', "", DATE(NOW()))';

    $isInsertOk = $db->query($query) or die($db->error);

    if($isInsertOk)
    {

        $query = "select id from Recette order by id desc limit 1";
        $id = $db->query($query)->fetch_assoc();

        $imgPath = $path . $id['id'].".".$ext;

        $query = "update Recette  set photoPath ='".$imgPath."' where id = ".$id['id'];

        $db->query($query) or die($db->error);

        return $id['id'];
    }

    return false;
}

function insertRecetteNoImg($name, $desc, $userId, $duration)
{
    global $db;

    $query = 'insert into Recette(nom, description, auteur, duree, photoPath, datePoste)
              values("'.$name.'","'.htmlspecialchars($desc).'", "'.$userId.'", '.$duration.', "", DATE(NOW()))';

    $db->query($query) or die($db->error);

    $query = "select id from Recette order by id desc limit 1";
    $id = $db->query($query)->fetch_assoc();

    return $id['id'];
}

?>