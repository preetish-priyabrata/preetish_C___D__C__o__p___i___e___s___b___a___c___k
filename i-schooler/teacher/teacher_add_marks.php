
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 
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
    <!-- end success or error message alert  -->
     <div class="container-fluid">
     <div class="row">
       <div class="panel panel-default">
        <div class="panel-heading"><center><strong><h4>Add Subject Marks</h4></strong></center></div>
          <div class="panel-body">
            <form class="form-horizontal" id="reli" action="teacher_add_marks_save.php" method="POST">
              <div class="form-group">
                <label class="control-label col-sm-2" for="exam_cat">Exam Category:</label>
                  <div class="col-sm-10 col-md-10 col-lg-6">
                    <select name="exam_cat" id="exam_cat" onchange="show_exam()" class="form-control" required="">
                     <option value="">--Select Exam Category--</option>
                    <?php
                      $query = "SELECT  * FROM `master_exam_category`";
                      $exe = mysqli_query($conn,$query);
                      if(mysqli_num_rows($exe)){                
                      while($rec = mysqli_fetch_array($exe)){?>
                      <option value="<?php echo $rec['slno_exam'];?>"><?=$rec['exam_name_cat'];?></option>
                    <?php 
                       }
                        }
                    ?> 
                </select>
              </div>
            </div>
            
              <div class="form-group">
              <label class="control-label col-sm-2" for="exam_name">Exam Name:</label>
              <div class="col-sm-10 col-md-10 col-lg-6">
              <span  id="hide_exam">
              <select name="exam_name"  id="exam_name" class="form-control" required="">
              <option value="">--Select Exam Name--</option>
              </select>
              </span>
              <span  id="hide_exam1"></span>
              </div>
              </div>


              <div class="form-group">
              <label class="control-label col-sm-2" for="class_name">Class:</label>
              <div class="col-sm-10 col-md-10 col-lg-6">
              <select name="class_name" onchange="showTeacher()" id="class_name" class="form-control" required="">
              <option value="">--Select Class--</option>
              <?php
              $teacher_id=$_SESSION['teacher_id'];
              $query="SELECT * FROM `master_asign_teacher_subject` where `teacher_id`='$teacher_id'";
              $exe=mysqli_query($conn,$query);
               if(mysqli_num_rows($exe)){      
              while($rec = mysqli_fetch_array($exe)){?>
              <option value="<?php echo $rec['class_id'];?>"><?=$rec['class_name'];?></option>
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
              <select name="section_name" onchange="showTeacher1()" id="section_name" class="form-control"  required="">
              <option value="">--select Section--</option>
               <?php
              $teacher_id=$_SESSION['teacher_id'];
              $query="SELECT * FROM `master_asign_teacher_subject` where `teacher_id`='$teacher_id'";
              $exe=mysqli_query($conn,$query);
               if(mysqli_num_rows($exe)){      
              while($rec = mysqli_fetch_array($exe)){?>
              <option value="<?php echo $rec['teacher_id'];?>"><?=$rec['section_name'];?></option>
              <?php 
                 }
                  }  
              ?> 
             </select>
              </div>
              </div>

              <div class="form-group">
              <label class="control-label col-sm-2" for="class_name">Subject:</label>
              <div class="col-sm-10 col-md-10 col-lg-6">
              <select name="subject_name" id="subject_name" class="form-control" required="">
              <option value="">--Select Subject--</option>
             
              </select>
              </div>
              </div>


              <div class="form-group row">
              <label class="control-label col-sm-2" for="sub_skill">Sub Skills:</label>
              <div class="col-sm-10 col-md-6">
              <input type="text" class="form-control" name="sub_skill" placeholder="Enter Sub Skills">
              <br>
              <span id="myerror" style="color: red;"></span>
              </div>
              </div>


                <span id="myerror" style="color: red;"></span>
               <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
            <center><input type="submit" name="OK" value="OK"></center>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</section>
</div>




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


function show_exam(){
   var exam_cat1= $('#exam_cat').val();
   // alert(exam_cat1)
         if(exam_cat1){
            $.ajax({
                type:'POST',
                url:'get_exam_name.php',
                data:'exam_cat_id='+exam_cat1,
                success:function(html){
                  // $('#hide_exam').hide();
                  // $('#hide_exam').html(html);
                  document.getElementById("exam_name").innerHTML = html;

                   
                }
             }); 
  }
}


 function showTeacher(){
  
  var http = new XMLHttpRequest();
var url = "teacher_get_section.php";
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
function showTeacher1(){
  
  var http = new XMLHttpRequest();
var url = "teacher_get_sub.php";
var class_na=$('#class_name').val();
var section_name=$('#section_name').val();
// var subject_name=$('#subject_name').val();
// alert(class_na);
var params = 'Class_name='+class_na+'&section_id='+section_name;
http.open("POST", url, true);

//Send the proper header information along with the request
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
http.onreadystatechange = function() {
//Call a function when the state changes.
    if(http.readyState == 4 && http.status == 200) 
    {
      document.getElementById("subject_name").innerHTML = this.responseText;
        // alert(http.responseText);
    }
}
http.send(params);
  // body...
}

// section_name
// subject_name
</script>


