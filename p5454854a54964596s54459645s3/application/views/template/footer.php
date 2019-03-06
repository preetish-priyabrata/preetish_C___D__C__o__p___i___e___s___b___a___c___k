
      <footer class="main-footer" id ="printbtn">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
       <strong>Copyright &copy; <?php echo date('Y') ?> <a href="">Innovadors Lab</a>.</strong> All rights reserved.
      </footer>

     
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
  <!-- <script type='text/javascript' src='<?=base_url()?>asset/jquery-1.3.2.min.js'></script> -->
    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url()?>admin_assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url()?>admin_assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url()?>admin_assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url()?>admin_assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>admin_assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url()?>admin_assets/dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="<?=base_url()?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript"> 
    $(document).ready(function() {
      if(location.hash) {
            $('a[href=' + location.hash + ']').tab('show');
      }
      $(document.body).on("click", "a[data-toggle]", function(event) {
            location.hash = this.getAttribute("href");
        }); 
  });
    $(window).on('popstate', function() {
        var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
        $('a[href=' + anchor + ']').tab('show');

    });
</script>
<script>
      $(function () {
        $("#example1").DataTable();
        $("#example3").DataTable();
        $("#example4").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>

  </body>
</html>