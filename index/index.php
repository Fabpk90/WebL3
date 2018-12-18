<?php include("../header.php");
include("../db_link.php");
include("index_query.php");

$recettes = getRecentRecette(5);
?>

<h1>Bienvenue !</h1>

<?php

$resMostInsert = getMostInsertRecette()->fetch_assoc();

echo "<h4>L'utilisateur qui a créé le plus de recette ce mois-ci est: ".$resMostInsert['pseudo']."</h4>";

?>

    <h3>Voyons voir les recettes les plus recentes</h3>

<table id="index_recette">
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Durée</th>
    </tr>
<?php
while ($row = $recettes->fetch_assoc())
{
    echo "<tr>";
        echo "<td><a href='../recette/recette.php?recetteId=".$row['id']."'><b>".$row['nom']."</b></a></td>";
        echo "<td>".$row['description'];
        if(strlen($row['description']) > 49)
            echo "...";
        echo "</td>";
        echo "<td>".$row['duree']."</td>";
    echo "</tr>";
}
echo "</table>";
?>

<?php include("../footer.php");?>