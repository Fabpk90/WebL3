<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 13:34
 */

include ("../header.php");
include ("../db_link.php");

include ("change_query.php");

include ("type_query.php");
include ("ingr_query.php");

if(isset($_POST['desc']))//modification to be done
{
    changeIngr($_POST['oldName'], $_POST['name'],$_POST['desc'], $_POST['idCat']);
    echo "Ingredient changé";
}
elseif(isset($_POST['name'])) // we show the form to modifiy
{
    $resIngr = getIngr($_POST['name'])->fetch_assoc();

    ?>
     <form method="post">
         <input type="hidden" name="oldName" value="<?php echo $resIngr['nom']; ?>" >
        <label for="name">Nom de l'ingredient</label>
        <input type="text" id="name" name="name" value="<?php echo $resIngr['nom']; ?>" required><br/>

        <label for="idCat">Type de l'ingredient</label>
        <select name="idCat" id="idCat">
            <?php

            $types = getTypes();

            while ($type = $types->fetch_assoc()) {

                $selected = "";

                if($type['id'] == $resIngr['idCat'])
                    $selected = 'selected="selected"';

                echo '<option value="' . $type['id'] . '" '.$selected.'> ' . $type['nom'] . '</option>';
            }

            ?>
        </select><br/>

        <label for="desc">Description de l'ingredient</label>
        <input type="text" name="desc" id="desc" value="<?php echo $resIngr['description']; ?>"  required/> <br/>
        <button type="submit">Modifier l'ingredient</button>
    </form>
    <?php
}

else {
    $resIngr = getAllIngr();
    ?>

    <form method="post">
        <label for="name">Nom de l'ingredient à modifier</label>
        <select name="name" id="name" required>
            <?php

            while ($ingr = $resIngr->fetch_assoc())
                echo '<option value="' . $ingr['nom'] . '"> ' . $ingr['nom'] . '</option>';
            ?>
        </select>
        <button type="submit">Modifier l'ingredient</button>
    </form>

    <?php
}

include ("../footer.php");
