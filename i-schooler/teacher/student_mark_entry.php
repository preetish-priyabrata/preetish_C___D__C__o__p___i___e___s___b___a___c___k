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
    <form class="form-horizontal" id="reli" action="view_gradation_page.php" method="POST">
   <div class="container-fluid">
   <div class="row">
  <div class="panel panel-default">
 <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container">

        <div class="col-lg-11">
        
          <h4><center><b style="color:#483D8B;">Student Mark Entry</b></center></h4>
            <div class="table-responsive">
            <?php
              $serial=$_REQUEST['serial'];
                 $query = "SELECT * FROM `master_exam_result_list` where `sl_no`='$serial'";
                 $query_exe = mysqli_query($conn,$query);
                  while($rec=mysqli_fetch_array($query_exe)){   
                 ?>
                 <input type="hidden" name="serial" value="<?=$serial?>">
              <table id="" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Class</th>
                <th>
                  <?php 
                  $class=$rec['class_id'] ;
                  $subskill=$rec['subskill'] ;
                  //$serial=$_REQUEST['serial'];
                  $sql_class_detail="SELECT * FROM `master_class` where `slno_class`='$class'";
                  $sql_query_detail_class=mysqli_query($conn,$sql_class_detail);
                  $num_rows=mysqli_num_rows($sql_class_detail);
                  $class_name=mysqli_fetch_assoc($sql_query_detail_class);
                  echo $class_name['class_name'];

                  ?>
                </th>
              </tr>
              <tr>
                <th>Section</th>
                 <th>
                <?php 
                  $section=$rec['section_id'] ;
                
                  $sql_section_detail="SELECT * FROM `master_class_section` where `Slno`='$section'";
                  $sql_query_detail_section=mysqli_query($conn,$sql_section_detail);
                  $num_rows=mysqli_num_rows($sql_section_detail);
                  $section_name=mysqli_fetch_assoc($sql_query_detail_section);
                  echo $section_name['section'];

                  ?>
                </th>
              </tr>
              <tr>
                <th>Subject</th>
                <th>
                  <?php $subject=$rec['subject_id'] ;

                  $sql_subject_detail="SELECT * FROM `master_subject_name` where `slno`='$subject'";
                  $sql_query_detail_subject=mysqli_query($conn,$sql_subject_detail);
                  $num_rows=mysqli_num_rows($sql_subject_detail);
                  $subject_name=mysqli_fetch_assoc($sql_query_detail_subject);
                  echo $subject_name['subject_name'];

                  ?>
                </th>
              </tr>
              
            </thead>
            <?php

              }

            ?>
            
        </table>
       </div>
       
      </div>
     </div>        
    </div>
   </div>
  </div>
 </div>
 </div>
<div class="container-fluid">
<div class="row">
<div class="panel panel-default">
 <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="row">

        <div class="col-lg-12">
          <h4><center><strong style="color: #483D8B;" >Add Subskill Marks</strong></center></h4>
            <div class="table-responsive">
              <table id="" class="table table-bordered table-striped">
              <thead>
              <tr>
              <th>slno</th>
               <th>Roll</th>
               <th>Student Name</th>
               <?php
                $sub="SELECT * FROM `master_add_subskill` WHERE `exam_list_id`='$serial'";
                $sql_exe_sub=mysqli_query($conn,$sub);
                 while ($sub_result=mysqli_fetch_assoc($sql_exe_sub)) {?>
                  <th><?=$sub_result['subskill']?></th>
               <?php   }?>
               <th>Total</th>
               </tr>
               </thead>
               <tbody>

                <?php
                $x=0;
                $student="SELECT * FROM `master_student_user` WHERE `student_current_class`='$class' and `student_current_section`='$section'";
                $sql_exe_student=mysqli_query($conn,$student);
                $fields=mysqli_num_rows($sql_exe_student);
                while ($student_result=mysqli_fetch_array($sql_exe_student)) {
                  $x++;
                  ?>
                 <tr>
                 <td><?=$x?></td>
                 <td><?=$student_result['student_redg_no']?></td>
                 <td><?=$student_result['student_name']?></td>
                  <?php
                 $sub="SELECT * FROM `master_add_subskill` WHERE `exam_list_id`='$serial'";
                 $sql_exe_sub=mysqli_query($conn,$sub);
                 while ($sub_result=mysqli_fetch_assoc($sql_exe_sub)) {?>
                  <td style="width: 10%;"><input type="number" min="1" max="10" onkeyup="calculated(<?=$x?>)" name="sub[]" value="0" id="sub<?=$x?><?=$sub_result['sl_no']?>" required></td>
                <?php   }?>
                <td><input id="total<?=$x?>" required readonly></td>
                </tr>
               <?php }
                ?>
              </tbody>
             </table>
<?php  
$data = array();
$sub1="SELECT * FROM `master_add_subskill` WHERE `exam_list_id`='$serial'";
  $sql_exe_sub1=mysqli_query($conn,$sub1);
  while ($sub_result1=mysqli_fetch_assoc($sql_exe_sub1)) {
      $ID=$sub_result1['sl_no'];
      $data[]= array($ID);
  }
 // echo $datss=json_encode($data);
 ?>
             
            </div>
            <center><input type="submit" name="Submit" value="Submit"></center>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</form>
</section>
</div>
<?php
 
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

// alert (data.length);
  function calculated(id) {
    // var myObj, i, x = "";
    // alert(id);
    var total=0;
     var datass11 = JSON.parse('<?php echo json_encode($data)?>');
     var myJSON = JSON.stringify(datass11);
     // alert( myJSON);
     for (i in datass11) {
    // x =JSON.stringify(datass11[i]);;
    // alert(datass11[i]);
    var x=datass11[i];
    // var z=x+id;
    // alert(z);
     var y=$('#sub'+id+x).val();
       // alert(y);
       if(y!=""){
         var total=parseInt(y)+parseInt(total);
         // alert(total);
         $('#total'+id).val(total);
      }
    }

    // console.log(data);
    // for (var i = 0; i < datass11.length; i++) {
    //   // Things[i]
    //   // alert(data[i]);
    //   alert(i);
    //   var x=datass11.sl[i];
    //   alert(x);
    //   // console.log(data[i]);
    // }
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
  </script>


 <script type="text/javascript">
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
</script>