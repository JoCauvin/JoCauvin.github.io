<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>



<script>
  $('.FORMATION').hide();
  $('button#BFORMATION').click(function(e){
    e.stopPropagation();
    $('.FORMATION').fadeOut(100);  //  this will hide others
    $(this).closest(".card_task").next('.FORMATION').load("card_formation.php");
    $(this).closest(".card_task").next('.FORMATION').fadeToggle(150);    /* here you see, i grabbed the closest parent that was relative to your content   */
    
  });
</script>


<script>
  $('.card_task').click(function(e){
    e.stopPropagation();
    $('.CONTENU_FORMATION').load("card_formation.php");    
  });
</script>