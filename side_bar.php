<!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="far fa-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3">RETRAITÔT <sup>beta</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <?php 

if(isset($_SESSION['pseudo']))
{
  echo '
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
<a class="nav-link" href="index.php">
<i class="fas fa-fw fa-tachometer-alt"></i>
<span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading" style="color:white";>
ACTION !
</div>

<!-- Nav Item - projetcs -->';
$projet="index";
$projet_nbr=0;
foreach ($_SESSION["projects"] as $projet){
  $projet_nbr = $projet_nbr+1;
  echo '<li class="nav-item">
  <a class="nav-link" href="projet.php?ID='.$projet.'">
  <i class="fas fa-fw fa-table"></i>
  <span>Projet '.$projet_nbr.'</span></a>
  </li>';

}
unset($projet);



echo '
<!-- Nav Item - Tables -->
<li class="nav-item">
<a class="nav-link" href="new-project.php">
<i class="fas fa-fw fa-plus-square"></i>
<span>nouveau projet</span></a>
</li>


  ';
}
else
{
  echo '
  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Accueil</span></a>
  </li>


<!-- Nav Item -  -->
<li class="nav-item">
  <a class="nav-link" href="offer.php">
  <i class="fas fa-fw fa-cog"></i>
  <span>Nos services</span></a>
</li>

<!-- Nav Item -  -->
<li class="nav-item">
  <a class="nav-link" href="realisations.php">
  <i class="fas fa-fw fa-table"></i>
  <span>Nos réalisations</span></a>
</li>

<!-- Nav Item -  -->
<li class="nav-item">
  <a class="nav-link" href="contactus.php">
  <i class="fas fa-fw fa-plus-square"></i>
  <span>Nous contacter</span></a>
</li>

  ';
}
?>

 <!-- Divider -->
 <hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading" style="color:white";>
  Outils
</div>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="calculrenta.php">
    <i class="fas fa-fw fa-plus-square"></i>
    <span>Calcul de rentabilité</span></a>
</li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
  <a class="nav-link" href="strategie.php">
    <i class="fas fa-fw fa-plus-square"></i>
    <span>Définir une stratégie</span></a>
</li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
  <a class="nav-link" href="faq.php">
    <i class="fas fa-fw fa-plus-square"></i>
    <span>F.A.Q</span></a>
</li>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>



  </ul>
    <!-- End of Sidebar -->