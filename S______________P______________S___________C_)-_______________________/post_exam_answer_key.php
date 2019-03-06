<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
if($_SESSION['postexam_user']){
	$exam="";
	if(isset($_POST['search'])){
		$exam=$_POST['exam'];
	}
	
?>
  <div class="text-center">
    <?php $msg->display(); ?>   
   </div>
   <br>

<?php }else{
	header("location:logout.php");
	exit;
}
$contents = ob_get_contents();
ob_clean();

include_once 'template_data_table.php';
?>



<div class="container">
  <h2>Upload Answer Key </h2>
  <p class="text-right"><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Add Answer</button>
</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Exam Name</th>
        <th>View</th>
        <th>Status Display</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $qry_answer="SELECT * FROM `post_exam_upload_answer_key`";
      $sql_answer=mysqli_query($conn,$qry_answer);
      $x=0;
      while ($res_answer=mysqli_fetch_array($sql_answer)) {
        $x++;
        ?>
        <td><?=$res_answer['exam_name']?></td>
        <td><a class="btn btn-success btn-sm"  href="uploads/answerkey/<?php  echo $res_answer["file_name"]; ?>">Click View</a>
       </td>
        <td>
          <?php
        if(($res_answer['status'])=='0')
        {
        ?>
        <a class="btn btn-warning btn-sm" href="post_save_upload_answer_keys.php?status=<?php echo $res_answer['slno'];?>" 
          onclick="return confirm('Activate <?php echo $data?>');">De-Activate</a>
        
        <?php
        }
        if(($res_answer['status'])=='1')
        {
        ?>
        <a class="btn btn-info btn-sm" href="post_save_upload_answer_keys.php?status=<?php echo $res_answer['slno'];?>"  onclick="return confirm('De-activate <?php echo $data?>');">Activate</a>
        
        <?php
        }
        ?>
       </td>
        <td>
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?=$x?>">Update</button>
        </td>
   <?php   

   } ?>

    </tbody>
  </table>
</div>


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Answer Key</h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="post_save_upload_answer_keys.php" role="form" method="post" enctype="multipart/form-data">
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="Exam">Exam :</label>
			    <div class="col-sm-10">
			      <select id="exam" name="exam" class="form-control" required >
			                	<option value="">--Select Exam--</option>
				              <?php
								  	$qry_exam="SELECT * FROM `generate_intiamation_exam`";
								 	$sql_exam=mysqli_query($conn, $qry_exam);
									while($res_exam=mysqli_fetch_array($sql_exam)){
							  ?>
				                <option value="<?php echo $res_exam["exam_name"]; ?>" <?php if($exam==$res_exam['exam_name']){echo "selected";}?>><?php echo $res_exam["exam_name"]; ?></option>
				              <?php
								  	}
							  ?>
							</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="Attach">Attach File:(Pdf Files only)</label>
			    <div class="col-sm-10">
			      <input type="file" name="upload_files" required >
			    </div>
			  </div>
			 
			  
			
        </div>
        <div class="modal-footer">
        <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <input type="submit" class="btn btn-default" value="Submit" name="save">
			      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    </div>
			  </div>
          
        </div>
        </form>
      </div>
    </div>
  </div>
<?php 
 $qry_answer1="SELECT * FROM `post_exam_upload_answer_key`";
      $sql_answer1=mysqli_query($conn,$qry_answer1);
      $i=0;
      while ($res_answer1=mysqli_fetch_array($sql_answer1)) {
        $i++;
        ?>
  <!-- Modal -->
  <div class="modal fade"  role="dialog" id="update<?=$i?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="post_save_upload_answer_keys.php" role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label class="control-label col-sm-2" for="Exam">Exam :</label>
          <div class="col-sm-10">
            <select id="exam" name="exam" class="form-control" required >
                        <option value="">--Select Exam--</option>
                      <?php
                    $qry_exam1="SELECT * FROM `generate_intiamation_exam`";
                  $sql_exam1=mysqli_query($conn, $qry_exam1);
                  while($res_exam1=mysqli_fetch_array($sql_exam1)){
                ?>
                        <option value="<?php echo $res_exam1["exam_name"]; ?>" <?php if($res_answer1['exam_name']==$res_exam1['exam_name']){echo "selected";}?>><?php echo $res_exam1["exam_name"]; ?></option>
                      <?php
                    }
                ?>
              </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="Attach">Attach File: (Pdf Files only)</label>
          <div class="col-sm-10">
            <input type="file" name="upload_files" required >
             <input type="hidden" name="upload" value="<?=$res_answer1['file_name']?>" >
          </div>
        </div>
       
        
      
        </div>
        <div class="modal-footer">
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
          <input type="hidden" name="slno" value="<?=$res_answer1['slno']?>" >
            <input type="submit" class="btn btn-default" value="Update" name="Updated">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
          
        </div>
        </form>
      </div>
    </div>
  </div>
  <?php  }?>