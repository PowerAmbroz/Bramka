    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
    <!-- Pobrane z tej strony: https://datatables.net/download/release-->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.1.2/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="../scripts/tablica2.js"></script>
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
