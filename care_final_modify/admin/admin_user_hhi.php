<?php
session_start();
ob_start();
if($_SESSION['admin']){
  include  '../config_file/config.php';
  require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
if(!empty($_GET['village_info'])){
  $village_info=web_decryptIt(str_replace(" ", "+", $_GET['village_info']));
  $query_count="SELECT * FROM `care_master_hhi_infomation` WHERE `care_village_name` ='$village_info' and `status`='1'";
  $query_exe_no=mysqli_query($conn,$query_count);
  // if(mysqli_num_rows($query_exe_no)==0){
  //    $query_count_no="SELECT * FROM `care_master_hhi_infomation` WHERE  `status`='1'";
  //    $query_exe_no=mysqli_query($conn,$query_count_no);
  // }

}else{
    $query_count_no="SELECT * FROM `care_master_hhi_infomation` WHERE  `status`='1'";
    $query_exe_no=mysqli_query($conn,$query_count_no);
}
?>
<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        HHI Information
       <!--  <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li><a href="admin_user_hhi_village.php">User Information</a></li>
        <li><a href="admin_user_hhi_village.php">HHI User Info</a></li>
        <?php if(!empty($_GET['village_info'])){?>
        <li><a href="#">HHI User Info Village wise </a></li> 
        <?php }?>       
        <li class="active">HHI Information</li>
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
               <i class="fa fa-users"></i>
                <h3 class="box-title">List Of HHI</h3>
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
                           
                            <th width="8%">Slno</th>
                            <th width="12%">District Name</th>
                            <th  width="12%">Block Name</th>
                            <th  width="12%">GP Name</th>
                            <th  width="12%">Villege Name</th>
                            <th  width="12%">HHI</th>  
                            <th  width="12%">Women Farmer</th>    
                            <th  width="12%">Spouse Farmer</th> 
                                                 
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th width="8%">Slno</th>
                            <th width="12%">District Name</th>
                            <th  width="12%">Block Name</th>
                            <th  width="12%">GP Name</th>
                            <th  width="12%">Villege Name</th>
                            <th  width="12%">HHI</th>  
                            <th  width="12%">Women Farmer</th>    
                            <th  width="12%">Spouse Farmer</th> 
                        </tr>
                    </tfoot>
                    <tbody>
                      <?php
                        $x=0;
                        
                        while ($result=mysqli_fetch_assoc($query_exe_no)) {
                         
                          $x++;
                          ?>
                        <tr>
                          <td><?=$x?></td>
                          <td><?=strtoupper($result['care_district_name'])?></td>
                          <td><?=strtoupper($result['care_block_name'])?></td>
                          <td><?=strtoupper($result['care_gp_name'])?></td>
                          <td><?=strtoupper($result['care_village_name'])?></td>
                          <td><?=strtoupper($result['care_hhi_id'])?></td>
                          <td><?=strtoupper($result['care_women_farmer'])?></td>
                          <td><?=strtoupper($result['care_spouse_name'])?></td>
                          
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
    // $('#example77 tfoot th').not(":eq(0),:eq(4),:eq(2),:eq(3)").each( function () {

    //     var title = $('#example77 thead th').eq( $(this).index() ).text();
    //     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    // } );
 
    // DataTable
    var table = $('#example77').DataTable({
        "scrollY":        "1000px",
        "scrollCollapse": true,
        // "paging":         false
    } );
 
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