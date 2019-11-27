<?php
function card ($ID = "00", $CATEGORIE = "Categorie", $TACHES = "La tâche à réaliser", $Option="dark", $Date_debut="02/10/1991",  $Duree="",  $Date_de_fin="14/10/2019",$Participants="",  $Type="",  $MOMENT="")
{
  
    $output = '
<div class="card_task '.$Type.'" >
  <div class="row">
    <div class="col-lg-1 col-sm-12" style="margin: auto; text-align:center;">
          <i class="fas fa-check text-success pl-2"></i>
    </div>
    <div class="col-lg-11 col-sm-11">
        <div class="row">
          <div class="col-lg-12 col-sm-12 task_title">
            '.$TACHES.'
          </div>
          <div class="col-lg-12 col-sm-12 d-flex justify-content-between">
          <div class="task_id">ID: #'.$ID.'</div>
          <div class="task_date">'.$Date_debut.'- '.$Date_de_fin.'</div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 col-sm-6">
            <div class="badge badge-pill badge-primary">'.$CATEGORIE.'</div>
          </div>
          <div class="col-lg-6 col-sm-6">
            <img class="task-img-profile rounded-circle" src="https://thispersondoesnotexist.com/image">
            <img class="task-img-profile rounded-circle" src="https://thispersondoesnotexist.com/image">
            <img class="task-img-profile rounded-circle" src="https://thispersondoesnotexist.com/image">
            <a class="task_link" href="PROJECTS.php"><i class="fas fa-plus"></i> ajouter un participant</a>
          </div>
        </div>
    </div>
  </div>
</div>
';


    return $output;
}


try

{

       // On se connecte à MySQL

       $bdd = new PDO('mysql:host=localhost;dbname=retraitot', 'root', '');

}

catch(Exception $e)

{

       // En cas d'erreur, on affiche un message et on arrête tout

       die('Erreur : '.$e->getMessage());

}

       

// Si tout va bien, on peut continuer



// On récupère tout le contenu de la table jeux_video

$reponse = $bdd->query('SELECT * FROM tasks WHERE MOMENT=2');


// On affiche chaque entrée une à une

while ($donnees = $reponse->fetch())

{

echo card($donnees['ID'],$donnees['CATEGORIE'],$donnees['TACHES'],"dark");

}


$reponse->closeCursor(); // Termine le traitement de la requête

?>








