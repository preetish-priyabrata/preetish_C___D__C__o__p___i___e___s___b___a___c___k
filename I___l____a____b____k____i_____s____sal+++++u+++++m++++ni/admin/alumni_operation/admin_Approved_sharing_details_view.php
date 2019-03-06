<?php
session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
require 'FlashMessages.php';
include '../config.php';
$sl_no=$_GET['sl_no'];
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content ">
    <!-- success or error message alert -->
    	<div class="text-center ">
			 
        <?php $msg->display(); ?>
    
		  </div>
    <!-- end success or errot message alert  -->
    <div class="box">
   <div class="tab-content">  
    <div class="box">
     <ul class="nav nav-pills nav-tabs nav-justified">
      <li class="active"><a data-toggle="pill" href="#home"><h4>List Of Sharing Published</h4> </a></li>
     </ul>
      <div class="tab-content">
       <div id="home" class="tab-pane fade in active">
        <div class="container">
         <div class="col-lg-11 ">
          <div class="table-responsive col-lg-11">
           <table id="" class="table table-bordered table-striped text-center">
          <?php
        $query ="SELECT * FROM `user_sharing_info_details` where `sl_no`='$sl_no' and `status`='1'";   
        $query_exe = mysqli_query($conn,$query);
        $num=mysqli_num_rows($query_exe);
        if($num==1){ 
          $fetch=mysqli_fetch_assoc($query_exe);
          $post_type=$fetch['post_type'];
          switch ($post_type) {
            case '1':
              ?>
              <table class="table">
              <tr>
              <td><h4><b>Title</b></h4></td>
              <td>:</td>
              <td><?php echo $fetch['title'];?></td>
            </tr>
            <tr>
             <td><img height="200" width="200" src="../uploads/photo/<?php echo $fetch['photo'];?> "?></td>
            </tr>
            </table>

              <?php
              break;
             case '2':?>
            <table class="table">
            <tr>
              <td><h4><b>Title</b></h4></td>
              <td>:</td>
              <td><?php echo $fetch['title'];?></td>
             </tr>
            <tr>
              <td><h4><b>Text</b></h4></td>
              <td>:</td>
              <td><?php echo $fetch['text'];?></td>
            </tr>
            </table>
            <?php
              break;
             case '3':
              ?>
            <table class="table">
             <tr>
              <td><h4><b>Title</b></h4></td>
              <td>:</td>
              <td><?php echo $fetch['title'];?></td>
             </tr>
             <tr>
              <td><h4><b>URL</b></h4></td>
              <td>:</td>
              <td><iframe src="<?php echo $fetch['url'];?>" width="830" height="800"></iframe>
              <p><a href="<?php echo $fetch['url'];?>" target="iframe_a">Click Here To view </a></p>
              </td>
            </tr>
            </table>
              <?php
              break;
             case '5':
             ?>
            <table class="table">
            <tr>
              <td><h4><b>Short Description</b></h4></td>
              <td>:</td>
              <td><textarea name="title" rows="3" cols="50" maxlength="150" required="" class="form-control" onKeyDown="limitText(this.form.title,this.form.countdown,150);" onKeyUp="limitText(this.form.title,this.form.countdown,150);"><?php echo $fetch['title'];?></textarea>
              <font size="1">(Maximum characters: 150)<br>
                  You have <input readonly type="text" name="countdown" size="3" value="150"> characters left.</font></td>
              </tr>
              <input type="hidden" name="text_id" value="1">
              <tr>
              <td><h4><b>PDF</b></h4></td>
              <td>:</td>
              <td><iframe  width="800" height="800" src="../uploads/pdf_file/<?php echo $fetch['photo'];?> "?></td>
              </tr></iframe>
              </tr>
               </table>
             <?php
            break;
            default:
            break;
          }
        } 
        ?>

     <br>
     <div class="row">
     <div class="text-center">


     <a class="btn" href="admin_Approved_sharing_details.php">Back</a>
      </div>
       </div>
       <br>
       </table>
       </div>
       </div>
       </div>
       </div>

 </div>
  </div>
</table>
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
include 'templates/template.php';
?>
