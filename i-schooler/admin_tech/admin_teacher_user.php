<?php
session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
include '../config.php';
$t_userid=$_GET['t_userid'];
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage Teacher Details
        <small> </small>
      </h1>
      <!---<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam Master</a></li>
        <li class="active"><b>View Exam & Add Category</b></li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content ">
    <!-- success or error message alert -->
    	<div class="text-center ">
			 
        <?php $msg->display(); ?>
    
		  </div>
    <!-- end success or errot message alert  -->
    <div class="box">
     <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home">Teacher table View </a></li>
    <li><a data-toggle="pill" href="#menu1">Teachers Add  Category</a></li>
    <!-- <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li> -->
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container">
        <div class="col-lg-11 ">
        <h3>Teacher Category</h3>
        <div class="table-responsive col-lg-11">
          <table id="" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>Sl.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Img</th>
                <th>Status</th>
                <th>Action</th>                                         
              </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM `master_teacher_user`";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
              While($rec=mysqli_fetch_array($query_exe)){      
            ?>
            
              <tr>
                <td><?php echo $rec['slno'] ;?></td>
                <td><?php echo $rec['teacher_name'] ;?></td>
                <td><?php echo $rec['teacher_email'] ;?></td>
                <td><img src="../assert/upload/teacher/<?php echo $rec['teacher_photo'] ;?>" width="70" heigth="70"></td>
                
                <td><?php echo $rec['status'] ;?></td>
                <td>
                <table class="table-bordered table-striped text-center">
                 <tr>
                   <td>
                   <a href="admin_teacher_user_edit.php?t_userid=<?php echo $rec['slno'] ;?>" class="label label-primary">Edit</a>
                   </td>
                   <td><a href="admin_teacher_view.php?t_userid=<?php echo $rec['slno'] ;?>" class="label label-success">View</a></td>
                   <td><a href="#" class="label label-danger">Delete</a></td>
                   <td><a href="#" class="label label-warning">Re-password</a></td>
                 </tr> 
                </table>
                </td>                      
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
        <h3>Add Teacher</h3>
          <form class="form-horizontal" id="reli" action="admin_teacher_user_save.php" method="POST" enctype="multipart/form-data">
         <!--- <div class="form-group">
              <label class="control-label col-sm-2" for="u_id"> user Id:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="u_id" placeholder="Enter User Id">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>-->
            <div class="form-group row">
              <label class="control-label col-sm-2" for="u_name"> Name:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_name" placeholder="Enter User Name">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_email">E-mail Id:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_email" placeholder="Enter User Email">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_phone">Phone No:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_phone" placeholder="Enter User Phone">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_major">Major In:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_major" placeholder="Enter Major in">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_file">photo:</label>
              <div class="col-sm-10 col-md-8">
                <input type="file"  name="u_file" >
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <!--<div class="form-group">
              <label class="control-label col-sm-2" for="u_pass">Password:</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="u_pass" placeholder="Enter User Password">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>-->
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
              
                <input type="submit" name="Submit" value="Submit" class="btn btn-default" >
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
  function check_exam() {
  var exam_category_name=$('#exam_category').val();
  var check_exam_category="exams_category_name";
  if(exam_category_name!=""){ 
              // alert(class_name);             
    $.ajax({
      type:'POST',
      url:'admin_class_check.php',
      data:{exam_category_names:exam_category_name,check_exams_category:check_exam_category},
      success:function(html){                 
        if(html==1){
          document.getElementById("myerror").innerHTML = "";
          return true;
          // $("#reli").submit(); 
        }else{
          document.getElementById("myerror").innerHTML = "Exam Category Is Present In Our Records ,"+exam_category_name;
          return false;
        }
      }
    });
  }
}

function sub_check(){
  if(check_exam()){
    alert('hi');
  }else{
    alert('bye');
  }
}
</script>
