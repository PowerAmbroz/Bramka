    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="../scripts/webflow.js"></script>

    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
    <!-- Pobrane z tej strony: https://datatables.net/download/release-->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.1.2/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="../scripts/liczenie_znaki.js"></script>
  	<script type="text/javascript" src="../scripts/otwieranie_okna.js"></script>
    <script type="text/javascript" src="../scripts/zegarek.js"></script>
    <script type="text/javascript" src="../scripts/edycja.js"></script>
    <script type="text/javascript" src="../scripts/uikit.min.js"></script>

    <script>
      var wykladowca_id = '<?php echo $_SESSION['id']?>';
    </script>

    <?php if($_SESSION['permision']==='1') {?>
    <script type="text/javascript" src="../scripts/tablica_admin.js"></script>
    <?php }else{?>
    <script type="text/javascript" src="../scripts/tablica2.js"></script>
      <?php } ?>
    <?php include_once('customJS.php'); ?>
    <script>
      $(document).ready(function() {
        $('#div2').hide();
        $('#div3').hide();
        $('#dodawanie_studenta').click(function() {
          $('#div3').slideUp();
          $('#div2').toggle();
        });
        $('#dodawanie_studentow').click(function() {
          $('#div2').slideUp();
          $('#div3').toggle();
        });
      });
    </script>
  </body>
</html>
