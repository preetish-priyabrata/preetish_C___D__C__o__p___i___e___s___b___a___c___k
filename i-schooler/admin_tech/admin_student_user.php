<?php
session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
include '../config.php';

$msg = new \Preetish\FlashMessages\FlashMessages();
?>
<div class="content-wrapper">
<section class="content-header">
<h1>Manage Student Details
<small></small>
</h1>	
</section>

 <section class="content">
    <!-- success or error message alert -->
    	<div class="text-center">
			 
        <?php $msg->display(); ?>
    
		  </div>

		
    <!-- end success or error message alert  -->
    <div class="box">
    <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home">Student Table View </a></li>
    <li><a data-toggle="pill" href="#menu1">Student Add Category</a></li>
    <!-- <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li> -->
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container">
        <div class="col-lg-11">
          <h3>Student Category</h3>
            <div class="table-responsive">
              <table id="" class="table table-bordered table-striped">
              <thead>
              <tr>
                 <th>Sl.No</th>
                 <th>Student Name</th>
                 <th>Student Class/Section</th>
                 <th>Student Photo</th>
                 <th>Status</th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM `master_student_user`";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
              $count =1;
              While($rec=mysqli_fetch_array($query_exe)){      
            ?>
            
                <tr>
                <td><?php echo $count ;?></td>
                <td><?php echo $rec['student_name'] ;?></td>
                <td>
                  <?php 
                    $class=$rec['student_current_class'];
                    $Query_class_details="SELECT * FROM `master_class` where `slno_class`='$class'";
                    $exe_class_details=mysqli_query($conn,$Query_class_details);
                    $res_clas_details=mysqli_fetch_assoc($exe_class_details);
                    $sect=$rec['student_current_section'] ;
                    $quey_section ="SELECT * FROM `master_class_section` WHERE `Slno`='$sect'";
                    $exe_section=mysqli_query($conn,$quey_section);
                    $res_section=mysqli_fetch_assoc($exe_section);
                    echo $res_clas_details['class_name']." / ".$res_section['section'];
                  ?>                  
                </td>
               
                <td><img src="../assert/upload/student_pic/<?php echo $rec['student_photo'] ;?>" width="70" heigth="70"></td>
                <td><?php echo $rec['status'] ;?></td>
                <td>
                 <table class="table-bordered table-striped text-center">
                 <tr>
                   
                   <td>
                   <a href="admin_student_view.php?std_id=<?=$rec['student_slno'];?>" class="label label-success"   student_id="student_slno" target="_blank">View</a></td>

                   <td>
                   <a href="admin_student_edit.php?std_id=<?php echo $rec['student_slno'];?>" class="label label-primary" target="_blank">Edit</a></td>
                   
                   <td><a href="#" class="label label-danger">Delete</a></td>
                 </tr> 
                </table>
                </td>                      
              </tr>
          <?php
          $count++;
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
        <h3>Add Student</h3>
          <form class="form-horizontal" id="reli" action="admin_student_user_save.php" method="POST" enctype="multipart/form-data">
         <!--- <div class="form-group">
              <label class="control-label col-sm-2" for="u_id"> user Id:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="u_id" placeholder="Enter User Id">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>-->

            <div class="form-group row">
              <label class="control-label col-sm-2" for="u_name"> Student Name:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_name" placeholder="Enter Student Name">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_redg"> Student Redg.No:</label>
                <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_redg" placeholder="Enter Redg.No">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_class">Current Class:</label>
              <div class="col-sm-10 col-md-8">
                <!-- <input type="text" class="form-control" name="u_class" placeholder="Enter Current Class"> -->

                <select id="u_class" name="u_class" class="form-control" onchange="get_class_section()">
                  <option value="">please select class</option>
                  <?php $Query_class="SELECT * FROM `master_class` ORDER BY `slno_class` ASC";
                  $exe_class=mysqli_query($conn,$Query_class);
                  while ($res_class=mysqli_fetch_assoc($exe_class)) {?>
                  <option value="<?php echo $res_class['slno_class']?>"><?php echo $res_class['class_name']?></option>
                  <?php }?>
                </select>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_section">Current Section:</label>
              <div class="col-sm-10 col-md-8">
                <!-- <input type="text" class="form-control" name="u_section" placeholder="Enter Current Section"> -->
                <select id="u_section" name="u_section" class="form-control">
                <option>-Please Select Class--</option>
                </select>

                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_batch">Current Batch:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_batch" placeholder="Enter Current Batch">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="u_jointsection">Joint Section:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_jointsection" placeholder="Enter Joint Section">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_jointbatch">Joint Batch:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_jointbatch" placeholder="Enter Joint Batch">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_file">Student Photo:</label>
              <div class="col-sm-10 col-md-8">
                <input type="file" name="u_file" placeholder="Enter Photo">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_gender">Student Gender:</label>
              <div class="col-sm-10 col-md-8">
                Male:<input type="radio"  name="u_gender" value="Male"/>
              
                Female:<input type="radio"  name="u_gender" value="Female"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_dob">Student DOB:</label>
              <div class="col-sm-10 col-md-8">
                <input type="" class="form-control" name="u_dob" placeholder="Enter DOB">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_parentnm">Parent Name:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_parentnm" placeholder="Enter Parent Name">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_parentph">Parent Phone No:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_parentph" placeholder="Enter Parent Phone No">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
              
                <input type="submit" name="Submit" value="Submit" class="btn btn-default" />
              </div>
            </div>
          </form>
      </div>
    </div>
   
  </div>
  <br>
          
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
include 'templates/template.php';

?>
<script type="text/javascript">
  function get_class_section() {
    
    // var u_section=$('#u_section').val();
  
  
      var http = new XMLHttpRequest();
    var url = "admin_get_section.php";
    var class_na=$('#u_class').val();
    // alert(class_na);
    var params = 'Class_name='+class_na;
    http.open("POST", url, true);

    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() {
    //Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) 
        {
          document.getElementById("u_section").innerHTML = this.responseText;
            // alert(http.responseText);
        }
    }
    http.send(params);
      // body...

      }
</script>