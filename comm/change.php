<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 11:33
 */
include ("../header.php");
include ("../db_link.php");
include("change_query.php");
include ("comm_query.php");


if(isset($_GET['recetteId']))
{
    $resComm = getUserComm($_GET['recetteId'], $_GET['userId'], $_GET['date'])->fetch_assoc();

    ?>
    <form action="change.php" method="post">
        <input type="hidden" value="<?php echo $_GET['recetteId'] ?>" name="recetteId"/>
        <input type="hidden" value="<?php echo $_GET['date'] ?>" name="date"/>
        <input type="hidden" value="<?php echo $_GET['userId'] ?>" name="userId"/>
        <label for="name">Contenu du commentaire:</label><br/>
        <textarea id="desc" name="desc" rows="5" style="width: 100%;"><?php echo $resComm['description']; ?></textarea><br/>
        <button type="submit">Mettre à jour le commentaire</button>
    </form>
    <?php
}
else if (isset($_POST['recetteId']))
{
    changeComm($_POST['recetteId'], $_POST['userId'], $_POST['date'], $_POST['desc']);

    echo "Commentaire changé <a href='../recette/recette.php?recetteId=".$_POST['recetteId']."'>Aller le voir</a>";
}
?>