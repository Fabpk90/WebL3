<?php include("header.php");
include ("db_link.php");
include ("recette_query.php");

if(isset($_GET['name']))
{
    $recette = getRecette(htmlspecialchars(urldecode($_GET['name'])));

    if($recette == null)
    {
        //TODO: change that
        print "Tu essaye de tricher ?";
    }
    else
    {
        $resRecette = $recette->fetch_assoc();

        $ingredients = getIngredients($resRecette['id']);

        echo "<h3>".$resRecette['nom']."</h3>";
        echo "<br/>";

        echo "Ingredients: ";
        echo "<ul>";
        while($ing = $ingredients->fetch_assoc())
        {
            echo "<li>";
            echo $ing['nom']."  ";
            echo $ing['qte'];
            echo "</li>";
        }

        echo "</ul>";
        echo "<p>".$resRecette['description']."</p>";

        $ingredients->free();

        $Comm = getComm($resRecette['id']);

        echo "Commentaires: <br/>";

        while($com = $Comm->fetch_assoc())
        {
            echo "<b>".$com['pseudo']."</b> le ".$com['date']." <br/>";
            echo $com['description'];
            echo "<br/>";
        }

        $Comm->free();
    }

    $recette->free();

}
else
{
    echo "Aucune recette spécifiée";
}

?>

<?php include("footer.php");?>