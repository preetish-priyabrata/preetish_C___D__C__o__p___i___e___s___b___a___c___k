<?php
session_start();
ob_start();
if($_SESSION['admin']){
  include  '../config_file/config.php';
  require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Admin New User ";
?>
<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Of Villages
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li><a href="admin_user_hhi_village.php">User Information</a></li>
        <li><a href="admin_user_hhi_village.php">HHI User Info</a></li>
        <li><a href="#">HHI User Info Village wise </a></li>        
        <li class="active">Village wise HHI</li>
      </ol>
    </section>

 <section class="content">
      <div class="row">
        <div class="text-center">
          <?php $msg->display(); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="box box-primary">
            <div class="box-header with-border">
             <div class="box-header ui-sortable-handle" style="cursor: move;">
               <i class="fa fa-map-marker"></i>
                <h3 class="box-title">List Of Villages</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                
               </div>
              <!-- /. tools -->
            </div>
           </div>
            
            <!-- form start -->
           <form role="form">
              <div class="box-body">
                 <table id="example77" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Slno</th>
                            <th>District Name</th>
                            <th>Block Name</th>
                            <th>GP Name</th>
                            <th>Villege Name</th>
                            <th>No Of HHI</th>  
                            <th>Action</th>                           
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Slno</th>
                             <th>District Name</th>
                            <th>Block Name</th>
                            <th>GP Name</th>
                            <th>Villege Name</th>
                            <th>No Of HHI</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                      <?php
                        $x=0;
                        $query_list="SELECT * FROM `care_master_village_info` ";
                        $sql_exe=mysqli_query($conn,$query_list);
                        while ($result=mysqli_fetch_assoc($sql_exe)) {
                          // `care_vlg_district`, `care_vlg_block`, `care_vlg_gp`
                          $x++;
                          ?>
                        <tr>
                          <td><?=$x?></td>
                          <td><?=strtoupper($result['care_vlg_district'])?></td>
                          <td><?=strtoupper($result['care_vlg_block'])?></td>
                          <td><?=strtoupper($result['care_vlg_gp'])?></td>
                          <td><?=strtoupper($result['care_vlg_name'])?></td>
                          <td><?php $care_vlg_name=$result['care_vlg_name'];
                              $query_count="SELECT * FROM `care_master_hhi_infomation` WHERE `care_village_name` ='$care_vlg_name' and `status`='1'";
                              $query_exe_no=mysqli_query($conn,$query_count);
                              echo mysqli_num_rows($query_exe_no);
                             
                          ?></td>
                          <td><a class="btn-info btn-sm btn" href="admin_user_hhi.php?village_info=<?=web_encryptIt($care_vlg_name)?>">View More</a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="index.php" class="btn btn-primary btn-xs"><i class="fa fa-caret-square-o-left" aria-hidden="true"></i>BACK</a>
              </div>
            </form>
          </div>
        </div>
      </div>

    </section>  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  
}else{
  header('Location:logout.php');
  exit;
}
  $contents = ob_get_contents();
  ob_clean();
  include 'template/template.php';

?>
<script type="text/javascript">
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example77 tfoot th').not(":eq(0),:eq(4),:eq(2),:eq(3)").each( function () {
        var title = $('#example77 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example77').DataTable();
 
    // Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
        if (colIdx == 0 || colIdx == 4 ) return;
        
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );
} );
  $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script>