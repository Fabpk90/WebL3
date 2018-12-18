<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 11:19
 */

include ("../header.php");
include ("../db_link.php");

include ("add_query.php");
include ("type_query.php");

if(isset($_POST['name']))
{
    insertIngr($_POST['name'], $_POST['desc'], $_POST['idCat']);
    echo "Ingredient ajouté";
}
else {

    ?>

    <form method="post">
        <label for="name">Nom de l'ingredient</label>
        <input type="text" id="name" name="name" required><br/>

        <label for="idCat">Type de l'ingredient</label>
        <select name="idCat" id="idCat">
            <?php

            $types = getTypes();

            while ($type = $types->fetch_assoc()) {
                echo '<option value="' . $type['id'] . '"> ' . $type['nom'] . '</option>';
            }

            ?>
        </select><br/>

        <label for="desc">Description de l'ingredient</label>
        <input type="text" name="desc" id="desc" required/> <br/>
        <button type="submit">Ajouter l'ingredient</button>
    </form>

    <?php

}

include ("../footer.php");