<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 17/12/18
 * Time: 20:58
 */

include ("../header.php");
include ("../db_link.php");

include ("recette_query.php");
include ("change_query.php");

if(isset($_GET['recetteId']))
{
    $resRecette = getRecette($_GET['recetteId'])->fetch_assoc();
?>
    <form action="change.php" method="post">

        <input type="hidden" value="<?php echo $resRecette['id'];  ?>" name="recetteId">

        <label for="desc">Description de la recette: </label><br/>
        <textarea name="desc" id="desc" rows="5" style="width: 100%;" required><?php echo $resRecette['description']; ?></textarea>
        <br/>

        <label for="duration">Durée de la recette: </label>
        <input type="number" value="<?php echo $resRecette['duree']; ?>" min="1" max="360" name="duration" id="duration" required> mins
        <br/>

        <button type="submit">Modifier la recette</button>

    </form>

    <a href="add_compose.php?recetteId=<?php echo $_GET['recetteId'];?>">Ajouter des ingredients</a>
<?php
}
else if(isset($_POST['recetteId']))
{
    changeRecette($_POST['recetteId'], $_POST['desc'], $_POST['duration']);
    echo "Recette modifiée <a href='recette.php?recetteId=".$_POST['recetteId'].".'>Aller la voir</a>";
}

?>


<?php include ("../footer.php"); ?>