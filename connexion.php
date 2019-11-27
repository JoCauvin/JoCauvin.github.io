<?php
include("head.php");
//Attribution des variables de session
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

include("./includes/functions.php");
include("./includes/constants.php");
include("./includes/identifiants.php");

$titre="Connexion";

if (isset($_POST['pseudo']))
{
    $message = '';
    $verif = "1";
    $query = $db->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
    $query->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $query->execute();
    $data=$query->fetch();
    $query->CloseCursor();
    
    if(empty($_POST['pseudo']) || empty($_POST['password']))
    {
        $message = '<p>Une erreur s\'est produite pendant votre identification.
        Vous devez remplur tous les champs</p><p>Cliquez<a href="./connexion.php">ici</a> pour revenir</p>';
    }
    else
    {
        if(1 == 1)
        {
            $query = $db->prepare('SELECT * FROM utilisateur WHERE pseudo = :pseudo');
            $query->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
            $query->execute();
            $data=$query->fetch();
            if($data['pass'] == md5($_POST['password']))
            {
                $_SESSION['pseudo'] = $data['pseudo'];
                $_SESSION['id'] = $data['id'];
                if(isset($_POST['remember']))
                {
                    $expire = time() + 30*24*3600;
                    setcookie('pseudo', $_SESSION['pseudo'], $expire);
                    setcookie('id', $_SESSION['id'], $expire);
                }
                $message = '<p>Bienvenue '.$data['pseudo'].', vous êtes maintenant connecté !</p><p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d\'accueil</p>';
                header('Location:index.php');
                exit();
            }
            else
            {
                $message = '<p>Une erreur s\'est produite 
                pendant votre identification.<br /> Le mot de passe ou le pseudo 
                entré n\'est pas correcte.</p><p>Cliquez <a href="./connexion.php">ici</a> 
                pour revenir à la page précédente
                <br /><br />Cliquez <a href="./index.php">ici</a> 
                pour revenir à la page d accueil</p>';
            }
        }
        else
        {
            $message = '<p>Vous n\'avez pas vérifié votre compte.</p><p>Cliquez <a href="./connexion.php">ici</a> pour revenir à la page précédente <br /><br />Cliquez <a href="./index.php">ici</a> pour revenir à la page d accueil</p>';
        }
        $query->CloseCursor();
    }
}
?>