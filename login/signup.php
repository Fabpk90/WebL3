<?php
/**
 * Created by PhpStorm.
 * User: fab
 * Date: 16/12/18
 * Time: 18:26
 */

include ("../header.php");
include ("../db_link.php");

if(isset($_POST['name']) && isset($_POST['psw']))
{
    include ("signup_query.php");

    $name = htmlspecialchars($_POST['name']);
    $psw = htmlspecialchars($_POST['psw']);

    if(signup($name, $psw))
        echo "Inscription réussite ".$name." !";
    else
        echo "Inscription non réussite";
}
else
{?>
    <form method="post">
        <label for="name">Pseudo: </label>
        <input type="text" id="name" name="name" required><br/>
        <label for="name">Mot de passe: </label>
        <input type="password" id="psw" name="psw"><br/>
        <button type="submit">S'inscrire</button>
    </form>
<?php
}


include ("../footer.php");
?>