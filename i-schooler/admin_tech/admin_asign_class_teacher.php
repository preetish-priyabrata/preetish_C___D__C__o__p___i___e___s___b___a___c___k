<?php
session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
include '../config.php';

 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Class Teacher Details
        
      </h1>
     <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam Master</a></li>
        <li class="active"><b>View Exam & Add Category</b></li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- success or error message alert -->
      <div class="text-center">
        <?php 
          $msg->display(); 
          
        ?>
      </div>
    <!-- end success or errot message alert  -->
    <div class="box">
     <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home">View Class Teacher</a></li>
      <li><a data-toggle="pill" href="#menu1">To Class Teacher</a></li>
    <!-- <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li> -->
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container">
        <div class="col-lg-11">
        <h3>View Class Teacher</h3>
        <div class="table-responsive">
          <table  class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>SL.NO</th>
                <th>Class Teacher</th> 
                 <th>Class</th>  
                  <th>Section</th>                                          
              </tr>
            </thead>
            <tbody>
           

              <?php
                  $query ="SELECT * FROM `master_asign_teacher_class`";
                  $exe =mysqli_query($conn,$query);
                  if(mysqli_num_rows($exe)){
                    while($rec = mysqli_fetch_array($exe)){
                ?>
              <tr>
                <tr>
                <td><?php echo $rec['sl_no'] ;?></td>
                <td><?php echo $rec['teacher_name'] ;?></td>
                <td><?php echo $rec['class_name'] ;?></td>
               
                <td><?php echo $rec['section_name'];?></td>
                                     
              </tr>
            <?php 
                }
              }
                ?> 
           </tbody>                 
            </table>
            </div>
            </div>
            </div>        
            </div>
          <div id="menu1" class="tab-pane fade">
          <div class="container">
          <div class="row">
          <h3>Assign Teacher</p></h3>
          <form class="form-horizontal" id="reli" action="admin_asign_class_teacher_save.php" method="POST">
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Teacher Name:</label>
              <div class="col-sm-10 col-md-10 col-lg-6">
                <select name="teacher_name" class="form-control" required="">
                  <option value="">--Select Teacher Name--</option>
                 <?php
                  $query = "SELECT  * FROM `master_teacher_user`";
                  $exe = mysqli_query($conn,$query);
                  if(mysqli_num_rows($exe)){                
                    while($rec = mysqli_fetch_array($exe)){?>
                      <option value="<?php echo $rec['slno'];?>"><?=$rec['teacher_name'];?></option>
              <?php 
                 }
                  }
              ?> 
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="class_name">Class:</label>
              <div class="col-sm-10 col-md-10 col-lg-6">
              <select name="class_name" onchange="showTeacher()" id="class_name" class="form-control" required="">
              <option value="">--Select Class--</option>
              <?php
              $query="SELECT * FROM `master_class`";
              $exe=mysqli_query($conn,$query);
               if(mysqli_num_rows($exe)){      
              while($rec = mysqli_fetch_array($exe)){?>
              <option value="<?php echo $rec['slno_class'];?>"><?=$rec['class_name'];?></option>
              <?php 
                 }
                  }
              ?> 
             </select>
              </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2" for="section_name">Section:</label>
              <div class="col-sm-10 col-md-10 col-lg-6">
              <select name="section_name" id="section_name" class="form-control"  required="">
              <option value="">--select Section--</option>
              </select>
            </div>
            </div>
             <span id="myerror" style="color: red;"></span>
             <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <center><input type="submit" name="submit" value="submit"></center>
              </div>
              </div>
            </div>
           </div>
          </form>
      </div>
    </div>
   </div>       
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php

}
else
{
  header('Location:logout.php');
  exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>
<div id="txtHint">Teacher info will be listed here...</div>
<!-- <script type="text/javascript">
  function showTeacher(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  //  xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
     }
  // };
  xhttp.open("POST","admin_asign_class_teacher.php", true);
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

http.onreadystatechange = function() {//Call a function when the state changes.
    if(http.readyState == 4 && http.status == 200) {
        alert(http.responseText);
    }
}
  xhttp.send();
        } 
      }
    };
  }
}

function sub_check()
{
  if(check_teacher())
  {
    alert('hi');
  }else{
    alert('bye');
  }
}
</script> -->
<script type="text/javascript">
 function showTeacher(){
  
  var http = new XMLHttpRequest();
var url = "admin_get_section.php";
var class_na=$('#class_name').val();
// alert(class_na);
var params = 'Class_name='+class_na;
http.open("POST", url, true);

//Send the proper header information along with the request
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
http.onreadystatechange = function() {
//Call a function when the state changes.
    if(http.readyState == 4 && http.status == 200) 
    {
      document.getElementById("section_name").innerHTML = this.responseText;
        // alert(http.responseText);
    }
}
http.send(params);
  // body...
}

function removeOptionsByValue(selectBox, value)
{
  for (var i = selectBox.length - 1; i >= 0; --i) {
    if (selectBox[i].value == value) {
      selectBox.remove(i);
      $("#selectBox option:selected").remove();
    }
  }
}

function addOption(selectBox, text, value, selected)
{
  selectBox.add(new Option(text, value || '', false, selected || false));
}

var selectBox = document.getElementById('selectBox');

removeOptionsByValue(selectBox, 'option3');
addOption(selectBox, 'option5', 'option5', true);

</script>