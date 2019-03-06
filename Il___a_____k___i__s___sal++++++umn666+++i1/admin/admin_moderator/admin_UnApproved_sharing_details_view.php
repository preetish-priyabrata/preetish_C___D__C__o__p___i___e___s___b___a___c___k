<?php
session_start();
ob_start();
if(isset($_SESSION['admin_moderator'])){
require 'FlashMessages.php';
include '../config.php';
$sl_no=$_GET['sl_no'];
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<!-- <style type="text/css">
  iframe{
    width:850px; height:800px;
  }
</style> -->
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
  
    
    <table  class="table  table-striped">
    
 <div class="box">
     <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home"><h4>Unverified Document LIst</h4> </a></li>
    <!--<li><a data-toggle="pill" href="#menu1">Teachers Add  Category</a></li>-->
    <!-- <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li> -->
  </ul>

        
          
        <form method="POST" enctype="multipart/form-data" action="admin_Approved_sharing_details_updated.php">
        <?php
        $query ="SELECT * FROM `user_sharing_info_details` where `sl_no`='$sl_no' and `status`='0'";   
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
            <input type="hidden" name="text_id" value="1">
             <td><img height="200" width="200" src="../uploads/photo/<?php echo $fetch['photo'];?> "?></td>
            </tr>
            <tr>
            <td>  
            <div class="form-group">
              <label class="control-label col-sm-2" for="Title">Short Description :</label>
                <div class="col-sm-10">
                 <textarea name="title" rows="3" cols="50" maxlength="150" required="" class="form-control" onKeyDown="limitText(this.form.title,this.form.countdown,150);" onKeyUp="limitText(this.form.title,this.form.countdown,150);"><?php echo $fetch['title'];?></textarea>
                 <font size="1">(Maximum characters: 150)<br>
                  You have <input readonly type="text" name="countdown" size="3" value="150"> characters left.</font> 
                </div>
              </div>
              </td>
              </tr>
            </table>

              <?php
              break;
              case '2':
              ?>



            <table class="table">
              <tr>
              <td><h4><b>Short Description </b></h4></td>
              <td>:</td>
              <td><textarea name="title" rows="3" cols="50" maxlength="150" required="" class="form-control" onKeyDown="limitText(this.form.title,this.form.countdown,150);" onKeyUp="limitText(this.form.title,this.form.countdown,150);"><?php echo $fetch['title'];?></textarea>
                 <font size="1">(Maximum characters: 150)<br>
                  You have <input readonly type="text" name="countdown" size="3" value="150"> characters left.</font></td>
            </tr>
             <input type="hidden" name="text_id" value="1">
            <tr>
              <td><h4><b>Text</b></h4></td>
              <td>:</td>
              <input type="hidden" name="text_id" value="2">
           
              <td><textarea name="text" class="form-control" required="true" autocomplete="off" rows="6" cols="45"><?php echo $fetch['text'];?></textarea></td>
            </tr>
            </table>


            <?php
            break;
            case '3':
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
              <td><h4><b>URL</b></h4></td>
              <td>:</td>
              <td><iframe src="<?php echo $fetch['url'];?>" width="850" height="800"></iframe>

              <p><a href="<?php echo $fetch['url'];?>" target="iframe_a">Click Here To view </a></p>
              </td>
            </tr>
            </table>
              <?php
              break;
            case '6':
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
              <td><h4><b>URL</b></h4></td>
              <td>:</td>
              <td><?php echo $fetch['url'];?>

              <p></p>
              </td>
            </tr>
            </table>
              <?php
              break;
            case '4':
             ?>
               <table class="table">
                 <tr>
                  <td><h4><b>Short Description</b></h4></td>
                  <td>:</td>
                  <td><?php echo $fetch['title'];?></td>
                </tr>
                <input type="hidden" name="text_id" value="1">
                <tr>
                  <td><h4><b>Text</b></h4></td>
                  <td>:</td>
                  <td><?php echo $fetch['text'];?></td>
                </tr>
                <tr>
                 <td><img height="200" width="200" src="../uploads/photo/<?php echo $fetch['photo'];?> "?></td>
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
              # code...
              break;
          }
        }else{
          $msg->success('This post already view by You');
          header('Location:admin_dashboard.php');
          exit;
        }?>
    
    <input type="hidden" name="slno" value="<?=$sl_no?>"> 
    <div class="row">
    <div class="text-center">
   <!--   <label class="radio-inline"><input type="radio" name="click" value="Rejected" required="">Rejected</label>
     <label class="radio-inline"><input type="radio" name="click" value="Approved" required="">Approved</label> -->
     </div>
     </div>
     <br>
     <div class="row">
     <div class="text-center">


     <a class="btn" href="admin_moderator_list_unapproved.php">Back</a>
       <input type="submit" class="btn" name="submit" value="Verified">
       </div>
       </div>
       <br>
   </form>
  </div>
  </div>
 
  <br>
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
  $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script> 
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
  if (limitField.value.length > limitNum) {
    limitField.value = limitField.value.substring(0, limitNum);
  } else {
    limitCount.value = limitNum - limitField.value.length;
  }
}
</script>