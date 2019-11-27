<?php include("head.php");?>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include("side_bar.php");?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <?php include("top_bar.php"); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Projet 1</h1>
          </div>

          <!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row">
  <div class="col-lg-4 col-sm-12 col-xs-12" style="height:150px; overflow-y: scroll; min-height: 80vh;">

  <?php
  include("fetch_tasks.php");
  ?>



  </div>
  <div class="CONTENU_FORMATION col-lg-8 col-sm-12 col-xs-12 pt-3" style="overflow-y: scroll; min-height: 80vh;">
  <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" src="img/undraw_upload_87y9.svg" style="max-height: 60vh; display:block; margin:auto;" alt="">
  </div>

</div>

      
        <?php include("footer.php");?>
      </div>
      <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

<?php include("Scroll_to_Top_Button.php");?>


<?php include("JS_scripts.php");?>
</body>
</html>
