<?php
session_start();
$titre="Enregistrement";
include("includes/header.php");

if (!empty($_POST['pseudo']))
{
    $pseudo_erreur1 = NULL;
    $pseudo_erreur2 = NULL;
    $mdp_erreur = NULL;
    $email_erreur1 = NULL;
    $email_erreur2 = NULL;

    $i = 0;
    $temps = time();
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $confirm = md5($_POST['confirm']);

    $query = $db->prepare('SELECT COUNT(*) AS nbr FROM utilisateur WHERE pseudo =\':pseudo\'');
    $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $query->execute();
    $pseudo_free=($query->fetchColumn() == 0)?1:0;
    $query->CloseCursor();

    if(!$pseudo_free)
    {
        $pseudo_erreur1 = "Votre pseudo est déjà utilisé par un membre.";
        $i++;
    }
    if(strlen($pseudo) <3 || strlen($pseudo) > 15)
    {
        $pseudo_erreur2 = "Votre pseudo est soit trop grand, soit trop petit";
        $i++;
    }
    if ($pass != $confirm || empty($confirm) || empty($pass))
    {
        $mdp_erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
        $i++;
    }
    $query=$db->prepare('SELECT COUNT(*) AS nbr FROM utilisateur WHERE email =:mail');
    $query->bindValue(':mail',$email, PDO::PARAM_STR);
    $query->execute();
    $mail_free=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();
    
    if(!$mail_free)
    {
        $email_erreur1 = "Votre adresse email est déjà utilisée par un membre";
        $i++;
    }
    if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
    {
        $email_erreur2 = "Votre adresse E-Mail n'a pas un format valide";
        $i++;
    }

    if ($i==0)
   {
    $lien = md5(time());
	echo'<h1>Inscription terminée</h1>';
        echo'<p>Bienvenue '.stripslashes(htmlspecialchars($_POST['pseudo'])).' vous êtes maintenant inscrit, un mail de vérification vous a été envoyé.</p>
	<p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d accueil</p>';
        $query=$db->prepare('INSERT INTO utilisateur (pseudo, pass, email, temps, code, verif)VALUES (:pseudo, :pass, :email, :temps, :code, :verif)');
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindValue(':pass', $pass, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':temps', $temps, PDO::PARAM_STR);
        $query->bindValue(':code', $lien, PDO::PARAM_STR);
        $query->bindValue(':verif', 0, PDO::PARAM_INT);
        $query->execute();

        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['id'] = $db->lastInsertId(); ;
        $query->CloseCursor();

        $to = $_POST['email'];

        $message = '<html>
        <head>
         <title>Inscription sur le site Retraitôt</title>
        </head>
        <body>
         <p>Bonjour '.$_POST['pseudo'].',</p>
         <p>Nous avons bien enregistré votre demande d\'inscription sur notre site.<br/>Merci de valider en cliquant sur : <a href=\'http://www.retraitot.fr/verif_register.php?code='.$lien.'\'>http://www.retraitot.fr/verif_register.php?code='.$lien.'</a><br/> Cordialement, l\'équipe Retraitot.</p>
        </body>
       </html>';
        $titre = "Inscription";

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        mail($to,$titre,$message,implode("\r\n", $headers));
    }
    else
    {
        echo'<h1>Inscription interrompue</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant l incription</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>'.$pseudo_erreur1.'</p>';
        echo'<p>'.$pseudo_erreur2.'</p>';
        echo'<p>'.$mdp_erreur.'</p>';
        echo'<p>'.$email_erreur1.'</p>';
        echo'<p>'.$email_erreur2.'</p>';
        echo'<p>Cliquez <a href="./register.php">ici</a> pour recommencer</p>';
    }
}
include("includes/footer.php");
?>