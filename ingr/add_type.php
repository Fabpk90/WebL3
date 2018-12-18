<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 12:15
 */

include ("../header.php");
include ("../db_link.php");

include ("add_type_query.php");

if(isset($_GET['typeName']))
{
    insertType($_GET['typeName']);
    echo "Type ajoutée!";
    //TODO: revenir maybe
}
else
{?>

    <form method="get">
        <label for="typeName">Nom du type:</label>
        <input type="text" name="typeName" id="typeName">

        <button type="submit">Ajouter le type</button>
    </form>

<?php
}

?>