<?php include("../header.php");
include_once("../db_link.php");
include("recette_query.php");
include_once("../comm/comm_query.php");


if (isset($_GET['recetteId'])) // if we came from adding a comm
{
    $recetteId = $_GET['recetteId'];
    $recette = getRecette($recetteId);

    if($recette == null)
    {
        //TODO: change that
        print "Tu essaye de tricher ?";
    }
    else
    {
        $resRecette = $recette->fetch_assoc();

        $ingredients = getIngredients($recetteId);

        echo "<h2>".$resRecette['nom']."</h2>";
        echo "<br/>";

        if($resRecette['photoPath'] != "")
        {
            echo "<img src='../img/".$resRecette['photoPath']."'/><br/>";
        }

        echo "Durée de la recette: ".$resRecette['duree']." mins";

        echo "Ingredients: ";
        echo "<ul>";
        while($ing = $ingredients->fetch_assoc())
        {
            echo "<li>";
            echo $ing['qte']."x ";
            echo $ing['nom'];
            echo "</li>";
        }

        echo "</ul>";
        echo "<p>".$resRecette['description']."</p>";

        $ingredients->free();

        $Comm = getComm($recetteId);

        echo "Commentaires: <br/>";

        while($com = $Comm->fetch_assoc())
        {
            echo "<b>".$com['pseudo']."</b> le ".$com['date'];

            if(isset($_SESSION['id']))
            {
                if($com['pseudo'] == $_SESSION['id'] || $_SESSION['admLevel'] == 2)
                {
                    echo '<a href="../comm/comm.php?userId='.$com['pseudo'].'&recetteId='.$com['recetteId'].'">Supprimer le commentaire </a>';
                }
            }
            echo "<br/>";

            echo $com['description'];
            echo "<br/>";
        }

        $Comm->free();


        if($_SESSION['admLevel'] > 0)
        {?>
            <form action="../comm/comm.php" method="post">
                <input type="hidden" value="<?php echo $recetteId ?>" name="recetteId"/>
                <label for="name">Contenu du commentaire:</label><br/>
                <textarea id="desc" name="desc" rows="5" style="width: 100%;"></textarea><br/>
                <button type="submit">Ajouter un commentaire</button>
            </form>


            <?php
        }
    }

    $recette->free();
}
else
{
    echo "Aucune recette spécifiée";
}

?>

<?php include("../footer.php");?>