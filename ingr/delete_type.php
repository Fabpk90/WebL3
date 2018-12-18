<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 18/12/18
 * Time: 16:01
 */

include ("../header.php");
include ("../db_link.php");

include ("type_query.php");
include ("delete_type_query.php");

if(isset($_POST['id']))
{
    deleteType($_POST['id']);

    echo "Type supprimé";
}

?>

<form method="post">

    <label for="id">Type: </label>
    <select name="id" id="id" required>
        <?php
            $resType = getTypes();

            while($res = $resType->fetch_assoc())
            {
                echo '<option value="' . $res['id'] . '"> ' . $res['nom'] . '</option>';
            }
        ?>
    </select>


    <button type="submit">Supprimer le type</button>
</form>




<?php
include ("../footer.php");
