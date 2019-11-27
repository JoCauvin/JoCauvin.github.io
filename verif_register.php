<?php
session_start();
$titre="Vérification";
include("includes/header.php");
if(isset($_GET["code"]))
{
    $query=$db->prepare('UPDATE utilisateur SET verif = 1 WHERE code = :code');
    $query->bindValue(':code', $_GET["code"], PDO::PARAM_STR);
    $query->execute();
    $query->CloseCursor();
    header('Location:index.php');
    exit();
}
else
{
    header('Location:index.php');
    exit();
}
?>