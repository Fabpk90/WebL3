<?php include("../header.php");
include("../db_link.php");
include("search_query.php");

?>

    <form method="get">
        <label for="name">Nom de la recette à cherchée</label><br/>
        <input type="text" name="name" id="name"/> <br/>
        <button type="submit">Rechercher les recettes</button>

    </form>

<?php
if(isset($_GET['name']))
{
    $recetteSearch = getRecetteByName(htmlspecialchars(urlencode($_GET['name'])));

    if($recetteSearch->num_rows == 0)
    {
        echo "Aucune recette trouvée contenant ".htmlspecialchars($_GET['name'])." dans le nom";
    }
    else
    {
        echo "<table align='center'>";
        ?>

        <tr>
            <th>Nom de la recette</th>
            <th>Description</th>
        </tr>

        <?php

        while($recette = $recetteSearch->fetch_assoc())
        {
            echo "<tr>";
            echo "<td><a href='recette.php?recetteId=".$recette['id']."'/>";
            echo $recette['nom']."</td>";
            echo "<td>".$recette['description']."... </td>";
            echo "</tr>";
        }

        echo "</table>";
    }


}

?>

<?php include("../footer.php");?>