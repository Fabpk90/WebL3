<?php
include("../header.php");
include_once("../db_link.php");
include("login_query.php");


if(isset($_POST['name']) && isset($_POST['psw']))
{
    $res = login($_POST['name'], $_POST['psw']);
    $row = $res->fetch_assoc();

    if($row == null)
    {
        echo "Connexion échouée";
    }
    else
    {
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['pseudo'];
        $_SESSION['admLevel'] = 1 + $row['isAdmin'];

    }

    $res->free();

    header("Location: ../index/index.php");
}
else // print the form
{?>

    <form method="post">
        <label id="name">Nom utilisateur</label><br/>
        <input type="text" name="name" id="name" required/><br/>

        <label id="psw">Mot de passe</label><br/>
        <input type="password" name="psw" id="psw" required/><br/>

        <input type="submit" value="Connexion"/>
    </form>

<?php
}

?>

<?php include("../footer.php");?>