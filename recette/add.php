<?php include("../header.php");
include ("../db_link.php");
include ("add_query.php");

if(isset($_POST['name']))
{
    $supported_image = array(
        'jpg',
        'jpeg',
        'png'
    );

    $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));

    $uploaddir = '/opt/lampp/htdocs/KitchenCook/img/';
    $cleanName = str_replace(" ", "", $_POST['name']);
    $uploadfile = $uploaddir . $cleanName.".".$ext;

    if (in_array($ext, $supported_image))
    {
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile))
        {
            $id = insertRecette($_POST['name'], $_POST['desc'], $_SESSION['id'], $_POST['duration'], $cleanName, $ext);
            if($id)
            {
                echo "Recette ajoutée!";
                echo '<a href="recette.php?recetteId='.$id.'">Aller la voir</a>';
            }
        } else {
            echo "Image pour la recette non valide \n";
        }
    }
    else {
        echo "Extension de l'image non supportée \n";
    }
}
else
{?>

    <form enctype="multipart/form-data" method="post">

        <label for="name">Nom de la recette: </label>
        <input type="text" name="name" id="name" required>
        <br/>

        <label for="desc">Description de la recette: </label><br/>
        <textarea name="desc" id="desc" rows="5" style="width: 100%;" required></textarea>
        <br/>

        <label for="duration">Durée de la recette: </label>
        <input type="number" min="1" max="360" name="duration" id="duration" required>
        <br/>

        <label for="photo">Image de la recette</label>
        <input type="file" name="photo"/>
        <br/>

        <button type="submit">Ajouter la recette</button>

    </form>


<?php
}


?>

<?php include("../footer.php");?>