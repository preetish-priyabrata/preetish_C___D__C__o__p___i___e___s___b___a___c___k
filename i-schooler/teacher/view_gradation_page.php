<!-- 

   <html>
   <head>
     <title></title>
   </head>
   <body>
   <center>
      <table border="1" id="" class="table table-bordered table-striped">

         <thead>
          <tr>
            <th>Sl.No</th>
            <th>Subskill-1 </th>
            <th>Grade</th>
            <th>Subskill-2</th>
            <th>Grade</th>
            <th>Subskill-3</th>
            <th>Grade</th>
          </tr>
        </thead>
      </table>
    </center>       
  </body>
</html>
 -->
 <?php
session_start();
ob_start();
if($_SESSION['user_teacher']){
require 'FlashMessages.php';
include '../config.php';

 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Add Marks
        
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- success or error message alert -->
    <div class="text-center">
        <?php 
          $msg->display(); 
        ?>
    </div>
   <div class="container">
  <div class="panel panel-default">
 <div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <div class="container">
      <div class="col-lg-11">
        <form class="form-horizontal" id="reli" action="" method="POST">
          <h4><center><b style="color:#483D8B;">View Gradation</b></center></h4>
            <div class="table-responsive">

            <table border="1" id="" class="table table-bordered table-striped">
            <thead>
            <tr>
            <th>Sl.No</th>
            <th>Subskill-1 </th>
            <th>Grade</th>
            <th>Subskill-2</th>
            <th>Grade</th>
            <th>Subskill-3</th>
            <th>Grade</th>
            </tr>
            </thead>
           </table>
          </div>
         </form>
        </div>
       </div>        
      </div>
     </div>
    </div>
   </div>
   </section>
   </div>

<?php
  $sub1="SELECT * FROM `master_add_subskill` WHERE `exam_list_id`='$serial'";
  $sql_exe_sub1=mysqli_query($conn,$sub1);
  while ($sub_result1=mysqli_fetch_assoc($sql_exe_sub1)) {
      $ID=$sub_result1['sl_no'];
      var data=["x","x1","x2","x3"];
      data.length;
      $data = array('SLNO' => $ID );
  }
  $datss=json_encode($data);
}else{
  header('Location:logout.php');
  exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">

var data = JSON.parse('<?php echo json_encode($data)?>');
alert (data);
function calculate(id) {
var total=0;
    // var x
console.log(data);
    // for (var i =0; i < count(<?=$datss?>); i++) {
        
    //   var x=<?=$datss?>;
    //   alert(x);
    //    var y=$('#sub'+id).val();
    //    alert(y);
    //   if(y!=""){
    //      var total=parseInt(y)+parseInt(total);
    //      alert(total);
    //      $('#total'+id).val(total);
    //   }
    // }
    // var x2=$('#sub3'+id).val();
    // var x3=$('#sub4'+id).val();
    //    if(x!="" && x1!="" && x2!="" && x3!=""){
    //   var total=parseInt(x)+parseInt(x1)+parseInt(x2)+parseInt(x3);
    //   $('#total'+id).val(total);

     }
    // body...
  </script>-->


<!--   <script type="text/javascript">
   function calculate(id) {
    var mark=["x","x1","x2","x3"];
    mark.length;
    var x=$('#sub1'+id).val();
    var x1=$('#sub2'+id).val();
    var x2=$('#sub3'+id).val();
    var x3=$('#sub4'+id).val();
     if(x!="" && x1!="" && x2!="" && x3!=""){
      var total=parseInt(x)+parseInt(x1)+parseInt(x2)+parseInt(x3);
      $('#total'+id).val(total);

     }
    // body...
  }
 </script> -->