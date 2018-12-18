<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 13:20
 */

include ("../header.php");
include ("../db_link.php");

include ("delete_query.php");
include ("ingr_query.php");

if(isset($_POST['name']))
{
    deleteIngr($_POST['name']);
    echo "Ingredient supprimé";
}
else {

    $resIngr = getAllIngr();

    ?>

    <form method="post">
        <label for="name">Nom de l'ingredient à supprimer</label>
        <select name="name" id="name" required>
            <?php

            while($ingr = $resIngr->fetch_assoc())
                echo '<option value="'.$ingr['nom'].'"> '.$ingr['nom'].'</option>';
            ?>
        </select>
        <button type="submit">Supprimer l'ingredient</button>
    </form>

    <?php
}

include ("../footer.php");
