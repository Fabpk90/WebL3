<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 14:19
 */

include("../header.php");
include ("../db_link.php");

include ("add_compose_query.php");
include ("../ingr/ingr_query.php");

$recetteId = "";

if(isset($_POST['recetteId']))
{
    $recetteId = $_POST['recetteId'];

    insertCompose($_POST['recetteId'], $_POST['idIngredient'], $_POST['qte']);
    echo "L'ingredient ".$_POST['idIngredient']." a bien été ajouté";
}
else if(isset($_GET['recetteId']))
{
    $recetteId = $_GET['recetteId'];
}

?>

<form action="add_compose.php" method="post">

    <input type="hidden" name="recetteId" value="<?php echo $recetteId; ?>">

    <label for="idIngredient">Ingredient à rajouter à la recette</label>
    <select name="idIngredient" id="idIngredient">
        <?php

        $resIngr = getAllIngr();

        while($ingr = $resIngr->fetch_assoc())
        {
            echo '<option value="'.$ingr['nom'].'"> '.$ingr['nom'].'</option>';
        }

        ?>
    </select>
    <label for="qte">Quantité de l'ingredient: </label>
    <input type="number" min="1" max="3000" name="qte" id="qte" required>
    <br/>

    <button type="submit">Ajouter l'ingredient</button>
</form>
<a href="recette.php?recetteId=<?php echo $recetteId;?>">Aller voir la recette</a>