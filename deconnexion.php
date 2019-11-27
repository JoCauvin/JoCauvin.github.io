<?php
session_start();
if (isset ($_COOKIE['pseudo']))
{
setcookie('pseudo', '', -1);
setcookie('id', '', -1);
}
session_destroy();
$titre = "Déconnexion";
include("includes/header.php");
if($id == 0)
{
    erreur(ERR_IS_NOT_CO);
}
else
{
    header('Location:index.php');
    exit();
}
?>