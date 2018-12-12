<?php include("header.php");
include ("db_link.php");
include ("index_query.php");

$recettes = getRecette();
?>

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
        echo "<td><b>".$row['nom']."</b></td>";
        echo "<td>".$row['description']."</td>";
        echo "<td>".$row['duree']."</td>";
    echo "</tr>";
}
echo "</table>";
?>

    <p>test</p>

<?php include("footer.php");?>