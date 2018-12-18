<?php include("../header.php");
include("../db_link.php");
include("search_query.php");
include ("../ingr/type_query.php");

?>

    <form method="get">
        <label for="name">Nom de la recette à cherchée</label><br/>
        <input type="text" name="name" id="name"/> <br/>

        <label for="useCat">Chercher aussi le type d'ingredient ?</label>
        <input type="checkbox" name="useCat" id="useCat"> <br/>

        <label for="idCat">Type d'ingredient de la recette</label>
        <select name="idCat" id="idCat">
            <?php
                $resType = getTypes();

                while ($res = $resType->fetch_assoc())
                {
                    echo '<option value="'.$res['id'].'">'.$res['nom'].'</option>';
                }
            ?>
        </select><br/>

        <button type="submit">Rechercher les recettes</button>

    </form>

<?php
if(isset($_GET['name']))
{

    if(isset($_GET['useCat']))
       $recetteSearch = getRecetteByNameType(htmlspecialchars($_GET['name']), $_GET['idCat']);
    else
        $recetteSearch = getRecetteByName(htmlspecialchars($_GET['name']));

    if($recetteSearch->num_rows == 0)
    {
        echo "Aucune recette trouvée contenant ".htmlspecialchars($_GET['name'])." dans le nom";
        if(isset($_GET['useCat']))
            echo " et avec le type choisi";
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
            echo "<td>".$recette['description'];
            if(strlen($recette['description']) > 48)
                echo "...";
            echo"</td>";
            echo "</tr>";
        }

        echo "</table>";
    }


}

?>

<?php include("../footer.php");?>