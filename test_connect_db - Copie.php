<?php

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

$reponse = $bdd->query('SELECT * FROM retraitot');



// On affiche chaque entrée une à une

while ($donnees = $reponse->fetch())

{

?>

<p>

<?php echo $donnees['ID']; ?> --
<?php echo $donnees['CATEGORIE']; ?> --
<?php echo $donnees['TACHES']; ?> --

<?php echo 
'<table>
  <tr>
    <td>Jean</td>
    <td>Biche</td>
  </tr>
  <tr>
    <td>Jeanne</td>
    <td>Biche</td>
  </tr>
</table>'
; ?>
<?php echo $donnees['Type']; ?> --   <br />
</p>

<?php

}

$reponse->closeCursor(); // Termine le traitement de la requête

?>








