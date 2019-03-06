<?php
		error_reporting(0);
		ob_start();
		session_start();
		include "config.php";
		require 'FlashMessages.php';
		$center="";
		if($_SESSION['preexam_user']){
			$msg = new \Preetish\FlashMessages\FlashMessages();
			if(isset($_POST['search'])){
				$center=$_POST['center'];
			}
?>
			<div class="text-center">
				<?php $msg->display(); ?>   
			</div>
			 <div class="col-lg-12">
		        <div class="col-lg-4"></div>
		            <div class="col-lg-4">
		              <?php include'application_form_exam.php';?>
		            </div>
		        <div class="col-lg-4"></div>
	        </div>


<?php

		}

		$contents = ob_get_contents();
		ob_clean();
		include_once 'template_data_table.php';
?>
<?php 
		if(!empty($_SESSION['exam_selected'])){
      		$exam=$_SESSION['exam_selected'];
      		$qry_check="SELECT * FROM `candidate_admit_card` where `exam_name`='$exam'";
      		$sql_check=mysqli_query($conn,$qry_check);
      		$num_rows_check=mysqli_num_rows($sql_check);
      		if($num_rows_check==0){
      			
?>
				<div class="col-md-12">
	        	<div class="alert alert-success text-center">
	        		<strong > Please Select Generate Admit Card For : <?=$exam?> </strong>
	        	</div>
	        </div>
<?php
			}else{ 
				 $qry_check_appno2="SELECT * FROM `candidate_admit_card` WHERE `exam_name`='$exam' ";
                   
                    $sql_check_appno2=mysqli_query($conn, $qry_check_appno2);
                     $res_check_appno2=mysqli_fetch_array($sql_check_appno2);
?>
					 <div  id="printarea">
                    <div id="section-to-print">
                      <div class="container-fluid"> 
                        <div class="row">      
                          <div style="text-align:center;">
                            <h4 style="text-transform:uppercase; "> <img style="width:70px; height:70px;" src="uploads/organisation_logo/<?php echo $res_temp["header_logo"]; ?>"/>          
                              <b><?php echo $res_temp["header_name"];?></b> 
                            </h4>
                          </div> 
                        </div>
                        <div class="row">
                          <div class="col-md-3"></div>
                          <div class="col-md-6">                    
                            <table class="table table-bordered" align="center"  cellspacing="0" cellpadding="1" >
                              <thead>
                                <tr>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><label>Exam Name</label></td>
                                  <td>:</td>
                                  <td><small><?=$res_check_appno2['exam_name']?></small></td>
                                  <td></td>         
                                  <td rowspan="5" ><img src="uploads/candidate_photos/<?php echo $res_check_appno2["candidate_photo"] ?>"  width="120"  height="80" id="photopreview" name="photopreview">
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Enrollment No</label></td>
                                  <td>:</td>
                                  <td><small><?=$res_check_appno2['roll_no']?></small></td>       
                                  <td></td>
                                </tr>
                                <tr>
                                  <td><label>Application No</label></td>
                                  <td>:</td>         
                                  <td><small><?=$res_check_appno2['application_no']?></small></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td><label>Name</label></td>
                                  <td>:</td>         
                                  <td><small><?=$res_check_appno2['candidate_name']?></small></td>
                                  <td></td> 
                                </tr>
                               <!-- <tr>
                                  <td><label>Exam Date</label></td>
                                  <td>:</td>         
                                  <td><small></small></td>
                                  <td></td>  
                                </tr>
                                <tr>
                                  <td><label>Exam Time</label></td>
                                  <td>:</td>         
                                  <td><small></small></td>
                                  <td></td>   
                                </tr>
                                <tr>
                                  <td><label>Exam Center</label></td>
                                  <td>:</td>         
                                  <td><small></small></td>
                                  <td></td>
                                </tr>-->
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <br>
                        <div class="row">
                          <div class="col-md-3"></div>
                          <div class="col-md-6">  
                            <table cellspacing="0" cellpadding="1"   align="Center" width="60%">
                              <thead>
                                <tr>
                                  <th>__________________________</th>
                                  <th><br>&nbsp;&#160;</th>
                                  <th><br>&nbsp;&#160;</th>
                                  <th>__________________________</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th>
                                   <label>Candidate Sign</label>
                                  </th>
                                  <th><br></th>
                                  <th><br></th>
                                  <th>
                                   <label>Authorised Sign</label>
                                  </th>
                                </tr>
                              </tbody>
                            </table>  
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>   


                    <br>  
                    <div class="row">
						<div class="col-md-5"></div>
						<div class="col-md-2">
							<a class="btn-block" style="background-color:#39F; text-align:center;color:#000;"" href="pe_generate_admit_card.php" >Back</a>
						</div>
						<div class="col-md-5"></div>
					</div>  
					 <br>  
					  <br>             

<?php
			}
 		}else{
?>
	       	<div class="col-md-12">
	        	<div class="alert alert-success text-center">
	        		<strong > Please Select The Exam </strong>
	        	</div>
	        </div>
<?php 
		}
?>
 <script type="text/javascript">
  function show_application(){
    var xyz=$('#exam').val();
    if(xyz!=""){ 
      $.ajax({
        type: "POST",
        url: "select_exam_application.php",
        data: {exam_type:xyz},
        success: function(result)   {
          if(result==1){
            // alert('hi');
            location.reload();
          }
        }
      });
    }   
  }
  </script>