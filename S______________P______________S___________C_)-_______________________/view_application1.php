<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['user']=="verification@gmail.com")
{
	$qry_personal="SELECT * FROM `candidate_personal_details` where `application_no`='$_REQUEST[appno]'";
	$sql_personal=mysqli_query($conn, $qry_personal);
	$res_personal=mysqli_fetch_array($sql_personal);
	
	$qry_email="SELECT * FROM `candidate_login_info` where `candidate_id`='$res_personal[candidate_id]'";
	$sql_email=mysqli_query($conn, $qry_email);
	$res_email=mysqli_fetch_array($sql_email);
	
	$qry_edu="SELECT * FROM `candidate_educational_details` where `application_no`='$_REQUEST[appno]'";
	$sql_edu=mysqli_query($conn, $qry_edu);
	$res_edu=mysqli_fetch_array($sql_edu);
	
	$qry_emp="SELECT * FROM `candidate_employment_details` where `application_no`='$_REQUEST[appno]'";
	$sql_emp=mysqli_query($conn, $qry_emp);
	$res_emp=mysqli_fetch_array($sql_emp);
	
	$qry_upld="SELECT * FROM `candidate_certificate_uploads` where `application_no`='$_REQUEST[appno]'";
	$sql_upld=mysqli_query($conn, $qry_upld);
	$res_upld=mysqli_fetch_array($sql_upld);
	
	$qry_pmnt="SELECT * FROM `candidate_payment_details` where `application_no`='$_REQUEST[appno]'";
	$sql_pmnt=mysqli_query($conn, $qry_pmnt);
	$res_pmnt=mysqli_fetch_array($sql_pmnt);
	
	$qry_decl="SELECT * FROM `candidate_declaration` where `application_no`='$_REQUEST[appno]'";
	$sql_decl=mysqli_query($conn, $qry_decl);
	$res_decl=mysqli_fetch_array($sql_decl);
	
	if(isset($_REQUEST['verify_personal']))
	{
		$qry_check_status="SELECT * FROM `candidate_application_verification_info` WHERE `candidate_email`='$res_email[emailid]'";
		$sql_check_status=mysqli_query($conn, $qry_check_status);
		$res_check_status=mysqli_fetch_array($sql_check_status);
		$row_no=mysqli_num_rows($sql_check_status);
		if($row_no==0)
		{
			$qry_submit_status="INSERT INTO `candidate_application_verification_info`(`slno`, `candidate_email`, `application_no`, `personal_info_status`) VALUES (NULL, '$res_email[emailid]', '$_REQUEST[appno]', 'verified')";
		}
		
		else
		{
			$qry_submit_status="UPDATE `candidate_application_verification_info` SET `personal_info_status`='verified' WHERE `application_no`='$_REQUEST[appno]'";
		}
		$res_status=mysqli_query($conn, $qry_submit_status);
	}
	if(isset($_REQUEST['verify_edu']))
	{
		$qry_check_status="SELECT * FROM `candidate_application_verification_info` WHERE `candidate_email`='$res_email[emailid]'";
		$sql_check_status=mysqli_query($conn, $qry_check_status);
		$res_check_status=mysqli_fetch_array($sql_check_status);
		$row_no=mysqli_num_rows($sql_check_status);
		if($row_no==0)
		{
			$qry_submit_status="INSERT INTO `candidate_application_verification_info`(`slno`, `candidate_email`, `application_no`, `educational_info_status`) VALUES (NULL, '$res_email[emailid]', '$_REQUEST[appno]', 'verified')";
		}
		
		else
		{
			$qry_submit_status="UPDATE `candidate_application_verification_info` SET `educational_info_status`='verified' WHERE `application_no`='$_REQUEST[appno]'";
		}
		$res_status=mysqli_query($conn, $qry_submit_status);
	}
	if(isset($_REQUEST['verify_emp']))
	{
		$qry_check_status="SELECT * FROM `candidate_application_verification_info` WHERE `candidate_email`='$res_email[emailid]'";
		$sql_check_status=mysqli_query($conn, $qry_check_status);
		$res_check_status=mysqli_fetch_array($sql_check_status);
		$row_no=mysqli_num_rows($sql_check_status);
		if($row_no==0)
		{
			$qry_submit_status="INSERT INTO `candidate_application_verification_info`(`slno`, `candidate_email`, `application_no`, `employment_info_status`) VALUES (NULL, '$res_email[emailid]', '$_REQUEST[appno]', 'verified')";
		}
		
		else
		{
			$qry_submit_status="UPDATE `candidate_application_verification_info` SET `employment_info_status`='verified' WHERE `application_no`='$_REQUEST[appno]'";
		}
		$res_status=mysqli_query($conn, $qry_submit_status);
	}
	if(isset($_REQUEST['verify_certificate']))
	{
		$qry_check_status="SELECT * FROM `candidate_application_verification_info` WHERE `candidate_email`='$res_email[emailid]'";
		$sql_check_status=mysqli_query($conn, $qry_check_status);
		$res_check_status=mysqli_fetch_array($sql_check_status);
		$row_no=mysqli_num_rows($sql_check_status);
		if($row_no==0)
		{
			$qry_submit_status="INSERT INTO `candidate_application_verification_info`(`slno`, `candidate_email`, `application_no`, `certificate_info_status`) VALUES (NULL, '$res_email[emailid]', '$_REQUEST[appno]', 'verified')";
		}
		
		else
		{
			$qry_submit_status="UPDATE `candidate_application_verification_info` SET `certificate_info_status`='verified' WHERE `application_no`='$_REQUEST[appno]'";
		}
		$res_status=mysqli_query($conn, $qry_submit_status);
	}
	if(isset($_REQUEST['verify_payment']))
	{
		$qry_check_status="SELECT * FROM `candidate_application_verification_info` WHERE `candidate_email`='$res_email[emailid]'";
		$sql_check_status=mysqli_query($conn, $qry_check_status);
		$res_check_status=mysqli_fetch_array($sql_check_status);
		$row_no=mysqli_num_rows($sql_check_status);
		if($row_no==0)
		{
			$qry_submit_status="INSERT INTO `candidate_application_verification_info`(`slno`, `candidate_email`, `application_no`, `payment_info_status`) VALUES (NULL, '$res_email[emailid]', '$_REQUEST[appno]', 'verified')";
		}
		
		else
		{
			$qry_submit_status="UPDATE `candidate_application_verification_info` SET `payment_info_status`='verified' WHERE `application_no`='$_REQUEST[appno]'";
		}
		$res_status=mysqli_query($conn, $qry_submit_status);
	}
	if(isset($_REQUEST['verify_decl']))
	{
		$qry_check_status="SELECT * FROM `candidate_application_verification_info` WHERE `candidate_email`='$res_email[emailid]'";
		$sql_check_status=mysqli_query($conn, $qry_check_status);
		$res_check_status=mysqli_fetch_array($sql_check_status);
		$row_no=mysqli_num_rows($sql_check_status);
		if($row_no==0)
		{
			$qry_submit_status="INSERT INTO `candidate_application_verification_info`(`slno`, `candidate_email`, `application_no`, `declaration_status`) VALUES (NULL, '$res_email[emailid]', '$_REQUEST[appno]', 'verified')";
		}
		
		else
		{
			$qry_submit_status="UPDATE `candidate_application_verification_info` SET `declaration_status`='verified' WHERE `application_no`='$_REQUEST[appno]'";
		}
		$res_status=mysqli_query($conn, $qry_submit_status);
	}
	
?>
<script>
function show_reason(str)
{
	var reason=document.getElementById(str+"reason");
	var submitbtn=document.getElementById(str+"sub");
	reason.style.display = "block";
	submitbtn.style.display = "block";
}
</script>
<div class="col-lg-12">
<legend><h3>Application Form No:- <?php echo $_REQUEST["appno"]; ?></h3></legend>
                <div class="tab-content">
				
                  <div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
                    
                      <div align="center" id="txtHint">
                      <div class="row">
                        <div class="col-md-12">
                          
                          <ul id="tabs">
      <li><a id="current" href="#" name="#personal">Personal Info</a></li>
      <li><a id="" href="#" name="#academic">Educational Info</a></li>
      <li><a id="" href="#" name="#employment">Employment Info</a></li>
      <li><a id="" href="#" name="#upload">Upload Certificate</a></li>
      <li><a id="" href="#" name="#payment">Payment Info</a></li>
      <li><a id="" href="#" name="#declaration">Declaration</a></li>
  </ul>

                          <div id="content">
                              <div style="display: none;" id="personal">
                               <div class="col-md-8">
                                 <form action="" id="personalinfo" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                  <table class="table">
                  
                 
                  <tr>
                  <td>Name</td>
                  <td><?php echo $res_personal["candidate_name"] ?></td>
                   <td style="width:15%"></td>
 <td></td>
 <td rowspan="3" align="center"><img src="uploads/candidate_photos/<?php echo $res_personal["candidate_photo"] ?>"  width="150"  height="150" id="photopreview" name="photopreview"></td>
                  </tr>
                  <tr>
                  <td>Father's Name</td>
                  <td><?php echo $res_personal["father's_name"] ?></td>
                  </tr>
                  <tr>
                  <td>Husband's Name (if married)</td>
                  <td><?php echo $res_personal["husband's_name"] ?></td>
                  </tr>
                  <tr>
                  <td>Gender</td>
                  <td><input type="radio" disabled="disabled" id="male" value="male" <?php if($res_personal["gender"]=="male"){ echo 'checked="checked"';} ?> name="gender">Male &nbsp;<input type="radio" disabled="disabled" id="female" value="female" <?php if($res_personal["gender"]=="female"){ echo 'checked="checked"';} ?> name="gender">Female</td>
                  </tr>
                  <tr>
                  <td>Date Of Birth</td>
                  <td><?php echo $res_personal["dob"] ?></td>
                  </tr>
                  <tr>
                  <td>Age</td>
                  <td><?php echo $res_personal["age"] ?></td>
                  </tr>
                  <tr>
                  <td>Place of Birth</td>
                  <td><?php echo $res_personal["pob_village"] ?></td>
                  <td><?php echo $res_personal["pob_city"] ?></td>
                  </tr>
                  <tr>
                  <td></td>
                  <td><?php echo $res_personal["pob_district"] ?></td>
                  <td><?php echo $res_personal["pob_state"] ?></td>
                  </tr>
                  <tr>
                  <td>Address for Communication</td>
                  <td colspan="3"><?php echo $res_personal["ca_address"] ?></td>
                  </tr>
                  <tr>
                  <td></td>
                  <td><?php echo $res_personal["ca_city"] ?></td>
                  <td><?php echo $res_personal["ca_district"] ?></td>
                  <td><?php echo $res_personal["ca_pincode"] ?></td>
                  </tr>
                  <tr>
                  <td></td>
                  <td><?php echo $res_personal["ca_phoneno"] ?></td>
                  <td><?php echo $res_personal["ca_mobno"] ?></td>
                  </tr>
                  <tr>
                  <td>Permanent Address</td>
                  <td colspan="3"><?php echo $res_personal["pa_address"] ?></td>
                  </tr>
                  <tr>
                  <td></td>
                  <td><?php echo $res_personal["pa_city"] ?></td>
                  <td><?php echo $res_personal["pa_district"] ?></td>
                  <td><?php echo $res_personal["pa_pincode"] ?></td>
                  </tr>
                  <tr>
                  <td></td>
                  <td><?php echo $res_personal["pa_phoneno"] ?></td>
                  <td><?php echo $res_personal["pa_mobno"] ?></td>
                  </tr>
                  <tr>
                  <td>Email Id</td>
                  <td><?php echo $res_personal["email_id"] ?></td>
                  </tr>
                  <tr>
                  <td>Category</td>
                  <td colspan="3"><input type="radio" disabled="disabled" id="gen_ur" value="GEN/UR[unreserved]" <?php if($res_personal["category"]=="GEN/UR[unreserved]"){ echo 'checked="checked"';} ?> name="c_cat">GEN/UR[unreserved]&nbsp;<input type="radio" disabled="disabled" <?php if($res_personal["category"]=="OBC(CL)"){ echo 'checked="checked"';} ?> id="obc_cl" value="OBC(CL)" name="c_cat">OBC(CL) &nbsp;<input type="radio" disabled="disabled" <?php if($res_personal["category"]=="OBC(SL)"){ echo 'checked="checked"';} ?> id="obc_sl" value="OBC(SL)" name="c_cat">OBC(SL) &nbsp;<input type="radio" disabled="disabled" <?php if($res_personal["category"]=="BL"){ echo 'checked="checked"';} ?> id="bl" value="BL" name="c_cat">BL &nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["category"]=="ST"){ echo 'checked="checked"';} ?> id="st" value="ST" name="c_cat">ST &nbsp;<input type="radio" disabled="disabled" <?php if($res_personal["category"]=="SC"){ echo 'checked="checked"';} ?> id="sc" value="SC" name="c_cat">SC &nbsp;<input type="radio" disabled="disabled" <?php if($res_personal["category"]=="PT"){ echo 'checked="checked"';} ?> id="pt" value="PT" name="c_cat">PT<br/><input disabled="disabled" type="radio" <?php if($res_personal["category"]=="OBC(CL)(BPL)"){ echo 'checked="checked"';} ?> id="obc_cl_bpl" value="OBC(CL)(BPL)" name="c_cat">OBC(CL)(BPL)&nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["category"]=="OBC(SL)(BPL)"){ echo 'checked="checked"';} ?> id="obc_sl_bpl" value="OBC(SL)(BPL)" name="c_cat">OBC(SL)(BPL) &nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["category"]=="BL(BPL)"){ echo 'checked="checked"';} ?> id="bl_bpl" value="BL(BPL)" name="c_cat">BL(BPL) &nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["category"]=="ST(BPL)"){ echo 'checked="checked"';} ?> id="st_bpl" value="ST(BPL)" name="c_cat">ST(BPL) &nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["category"]=="SC(BPL)"){ echo 'checked="checked"';} ?> id="sc_bpl" value="SC(BPL)" name="c_cat">SC(BPL)</td>
                  </tr>
                  <tr>
                  <td>If you belong to BPL category</td>
                  <td><?php echo $res_personal["bpl_certificate_no"] ?></td>
                  <td><?php echo $res_personal["bpl_issuing_authority"] ?></td>
                  <td><?php echo $res_personal["bpl_issue_date"] ?></td>
                  </tr>
                  <tr>
                  <td>Whether any of the following category</td>
                  <td colspan="2"><input disabled="disabled" type="radio" <?php if($res_personal["other_category"]=="ESM"){ echo 'checked="checked"';} ?> id="esm" value="ESM" name="oth_cat">ESM &nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["other_category"]=="PWD"){ echo 'checked="checked"';} ?> id="pwd" value="PWD" name="oth_cat">PWD &nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["other_category"]=="SPAE"){ echo 'checked="checked"';} ?> id="spae" value="SPAE" name="oth_cat">SPAE &nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["other_category"]=="NONE"){ echo 'checked="checked"';} ?> id="none" value="NONE" name="oth_cat">NONE</td>
                  </tr>
                  <tr>
                  <td>Sikkim Subject / Certificatetion</td>
                  <td><?php echo $res_personal["sikkim_certificate_id_no"] ?></td>
                  <td><?php echo $res_personal["sikkim_certificate_issuing_authority"] ?></td>
                  <td><?php echo $res_personal["sikkim_certificate_district"] ?></td>
                  </tr>
                  <tr>
                  <td>Valid Employee Card No</td>
                  <td><?php echo $res_personal["employee_card_no"] ?></td>
                  </tr>
                  </table>
                  <table class="table">
                  <?php
				  $qry_check_personal="SELECT * FROM `candidate_application_verification_info` WHERE `candidate_email`='$res_email[emailid]'";
		$sql_check_personal=mysqli_query($conn, $qry_check_personal);
		$res_check_personal=mysqli_fetch_array($sql_check_personal);
				  if($res_check_personal["personal_info_verfd"]=="yes")
				  {
				  ?>
                  <tr>
                  <td colspan="2" style="text-align:center"><input type="button" value="Verified" class="btn-primary" disabled="disabled"></td>
                  </tr>
                  <?php
				  }
				  else if($res_check_personal["personal_info_rejctd"]=="yes")
				  {
				  ?>
                  <tr>
                  <td colspan="2" style="text-align:center"><input type="button" value="Rejected" class="btn-primary" disabled="disabled"></td>
                  </tr>
                  <?php
				  }
				  else
				  {
				  ?>
                  <tr>
                  <td><input type="submit" id="verify_personal" name="verify_personal" value="Verify" class="btn-primary"></td>
                  <td><input type="button" id="r1" name="reject_personal" value="Reject" class="btn-primary" onClick="show_reason('r1');"></td>
                  <td><input type="text" placeholder="Reason Of Rejection" id="r1reason" name="r1reason" style="display:none" class="form-control"></td>
                  <td><input type="button" id="submit_reason1" name="submit_reason1" value="Submit" style="display:none" class="btn-primary"></td>
                  </tr>
                  <?php
				  }
				  ?>
                  </table>
                         </form>
                                
                              </div>
                             
                              </div>
                              <div style="display: none;" id="academic">
                               <div class="col-md-12">
                                 <form action="" id="academic_info" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                 <table class="table" id="education_table">
                 <tr>
                 <th>Sl. No.</th>
                 <th>Name of the Qualifying Exam</th>
                 <th>Month & Year of Passing</th>
                 <th>Name of the school/college studied</th>
                 <th>Name of the Board/University</th>
                 <th>% obtained</th>
                 </tr>
                 <?php
				 
					 $i=0;
					 $res_edu_qen=explode(',' , $res_edu['qualifying_exam_name']);
					 $res_edu_yop=explode(',' , $res_edu['month_year_of_passing']);
					 $res_edu_scn=explode(',' , $res_edu['school_college_name']);
					 $res_edu_bun=explode(',' , $res_edu['board_university_name']);
					 $res_edu_po=explode(',' , $res_edu['percntg_obtained']);
					 while($res_edu_qen[$i] && $res_edu_yop[$i] && $res_edu_scn[$i] && $res_edu_bun[$i] && $res_edu_po[$i])
				 {
					 ?> 
                <tr>
                  <td><?php echo $i+1;?>.</td>
                  <td><?php echo $res_edu_qen[$i];?></td>
                  <td><?php echo $res_edu_yop[$i];?></td>
                  <td><?php echo $res_edu_scn[$i];?></td>
                  <td><?php echo $res_edu_bun[$i];?></td>
                  <td><?php echo $res_edu_po[$i];?></td>
                  </tr>
                <?php
				$i++;
				 }
				 ?>
                
                
                  </table>
                  <table class="table">
                  	<tr>
                    	<td><b>Optional subjects opted for (no changes will be entertained)</b></td>
                        <td><?php echo $res_edu["optional_subject"];?></td>
                    </tr>
                  </table>
                  <table class="table">
                  <?php
				  $qry_check_edu_vrf="SELECT * FROM `candidate_application_verification_info` WHERE `candidate_email`='$res_email[emailid]'";
		$sql_check_edu_vrf=mysqli_query($conn, $qry_check_edu_vrf);
		$res_check_edu_vrf=mysqli_fetch_array($sql_check_edu_vrf);
				  if($res_check_edu_vrf["educational_info_verfd"]=="yes")
				  {
				  ?>
                  <tr>
                  <td colspan="8" style="text-align:center"><input type="button" value="Verified" class="btn-primary" disabled="disabled"></td>
                  </tr>
                  <?php
				  }
				  else if($res_check_edu_rej["educational_info_rejctd"]=="yes")
				  {
				  ?>
                  <tr>
                  <td colspan="8" style="text-align:center"><input type="button" value="Rejected" class="btn-primary" disabled="disabled"></td>
                  </tr>
                  <?php
				  }
				  else
				  {
				  ?>
                  <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><input type="submit" id="verify_edu" name="verify_edu" value="Verify" class="btn-primary"></td>
                  <td><input type="button" id="r2" name="save_emp" value="Reject" class="btn-primary" onClick="show_reason('r2');"></td>
                  <td><input type="text" placeholder="Reason Of Rejection" id="r2reason" name="r2reason" style="display:none" class="form-control"></td>
                  <td><input type="submit" id="submit_reason2" name="submit_reason2" value="Submit" style="display:none" class="btn-primary"></td>
                  <td></td>
                  <td></td>
                  </tr>
                  <?php
				  }
				  ?>
                  </table>
                         </form>  
                         </div>
                              </div>
                              <div style="display: none;" id="employment">
                               <div class="col-md-8">
                                 <form action="" id="emp_info" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                <table class="table">
                  
                  <tr>
                  <td style="width:40%"><?php echo $res_emp["employment_card_no"] ?></td>
                  <td style="width:30%"><?php echo $res_emp["issuing_authority"] ?></td>
                  <td style="width:30%"><?php echo $res_emp["issue_district"] ?></td>
                   
                  </tr>
                  <tr>
                  <td>Whether employed</td>
                  <td><input disabled="disabled" type="radio" <?php if($res_emp["whether_employed"]=="yes"){ echo 'checked="checked"';} ?> id="wh_emp_y" value="yes" name="wh_emp">Yes &nbsp;<input disabled="disabled" type="radio" <?php if($res_emp["whether_employed"]=="no"){ echo 'checked="checked"';} ?> value="no" id="wh_emp_n"  name="wh_emp">No</td>
                   
                  </tr>
                  <tr>
                  <td>Nature of employment (if employed)</td>
                  <td><input disabled="disabled" type="radio" <?php if($res_emp["employment_nature"]=="Regular"){ echo 'checked="checked"';} ?> id="noe_reg" value="Regular"  name="noe">Regular<br /><input disabled="disabled" type="radio" <?php if($res_emp["employment_nature"]=="Temporary Service[MR/Adhoc/WC]"){ echo 'checked="checked"';} ?> id="noe_ts" value="Temporary Service[MR/Adhoc/WC]" name="noe">Temporary Service[MR/Adhoc/WC]</td>
                   
                  </tr>
                  <tr>
                  <td>Name of the department (if employed)</td>
                  <td><?php echo $res_emp["employment_department"] ?></td>
                   
                  </tr>
                  <tr>
                  <td>Age relaxation sought as employed under the State/Central Govt. Dept., etc. as mentioned in the advertisement</td>
                  <td><input disabled="disabled" type="radio" <?php if($res_emp["age_relaxation"]=="yes"){ echo 'checked="checked"';} ?> value="yes" id="age_rel_y"  name="age_rel">Yes &nbsp;<input disabled="disabled" type="radio" <?php if($res_emp["age_relaxation"]=="no"){ echo 'checked="checked"';} ?> value="no" id="age_rel_n" name="age_rel">No</td>
                   
                  </tr>
                  <tr>
                  <td>Name of the Organization/Programmers/Projects</td>
                  <td><?php echo $res_emp["Org_prog_proj_name"] ?></td>
                   
                  </tr>
                  </table>                   
                   <table class="table">
                   <?php
				  $qry_check_emp_vrf="SELECT * FROM `candidate_application_verification_info` WHERE `candidate_email`='$res_email[emailid]'";
		$sql_check_emp_vrf=mysqli_query($conn, $qry_check_emp_vrf);
		$res_check_emp_vrf=mysqli_fetch_array($sql_check_emp_vrf);
				  if($res_check_emp_vrf["employment_info_verfd"]=="yes")
				  {
				  ?>
                  <tr>
                  <td colspan="8" style="text-align:center"><input type="button" value="Verified" class="btn-primary" disabled="disabled"></td>
                  </tr>
                  <?php
				  }
				  else if($res_check_emp_rej["employment_info_rejctd"]=="yes")
				  {
				  ?>
                  <tr>
                  <td colspan="8" style="text-align:center"><input type="button" value="Rejected" class="btn-primary" disabled="disabled"></td>
                  </tr>
                  <?php
				  }
				  else
				  {
				  ?>
                  <tr>
                  
                  <td></td>
                  <td><input type="submit" id="verify_emp" name="verify_emp" value="Verify" class="btn-primary"></td>
                  <td><input type="button" id="r3" name="save_emp" value="Reject" class="btn-primary" onClick="show_reason('r3');"></td>
                  <td><input type="text" placeholder="Reason Of Rejection" id="r3reason" name="r3reason" style="display:none" class="form-control"></td>
                  <td><input type="submit" id="submit_reason3" name="submit_reason3" value="Submit" style="display:none" class="btn-primary"></td>
                  
                  </tr>
                  <?php
				  }
				  ?>
                  </table>
                         </form>
                              </div>
                              </div>
                                      
                                <div style="display: none;" id="upload">
                               <div class="col-md-6">
                                 <form action="" id="cert_info" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                 <table class="table">
                 <tr>
                 	<th>Sl. No.</th>
                    <th>Particulars of Certificates submitted</th>
                    <th>Certificate Sl. No.</th>
                    <th>Issuing Authority</th>
                    <th>Download</th>
                 </tr>
                <tr>
                <td>1.</td>
                <td>OBC (Central List)/OBC(State List)BL/PT/ST/SC Certificate</td>
                <td><?php echo $res_upld["obc/bl/pt/st/sc_certificate_sl_no"]; ?></td>
                <td><?php echo $res_upld["obc/bl/pt/st/sc_certificate_issuing_authority"]; ?></td>
                <td><a target="_blank" href="uploads/certificates/obc_bl_pt_st_sc_certificate/<?php  echo $res_upld["obc/bl/pt/st/sc_certificate_name"]; ?>">Download</a></td>
                </tr>
                <tr>
                <td>2.</td><td>Sikkim Subject/Certificate of Identification</td>
                <td><?php echo $res_upld["sikkim_coi_sl_no"]; ?></td>
                <td><?php echo $res_upld["sikkim_coi_issuing_authority"]; ?></td>
                <td><a target="_blank" href="uploads/certificates/Sikkim_Certificate_of_Identification/<?php  echo $res_upld["sikkim_coi_name"]; ?>">Download</a></td>
                </tr>
                <tr>
                <td>3.</td>
                <td>In case of married female candidates husband's C.O.I</td>
                <td><?php echo $res_upld["husband's_coi_sl_no"]; ?></td>
                <td><?php echo $res_upld["husband's_coi_issuing_authority"]; ?></td>
                <td><a target="_blank" href="uploads/certificates/female_candidates_husbands_COI/<?php  echo $res_upld["husband's_coi_name"]; ?>">Download</a></td>
                </tr>
                <tr>
                <td>4.</td>
                <td>In case of unmarried female candidates father's C.O.I</td>
                <td><?php echo $res_upld["father's_coi_sl_no"]; ?></td>
                <td><?php echo $res_upld["father's_coi_issuing_authority"]; ?></td>
                <td><a target="_blank" href="uploads/certificates/candidates_fathers_COI/<?php  echo $res_upld["father's_coi_name"]; ?>">Download</a></td>
                </tr>
                <tr>
                <td>5.</td>
                <td>Certificate of ESM/SPEA/PWD</td>
                <td><?php echo $res_upld["esm/spea/pwd_sl_no"]; ?></td>
                <td><?php echo $res_upld["esm/spea/pwd_issuing_authority"]; ?></td>
                <td><a target="_blank" href="uploads/certificates/ESM_SPEA_PWD_certificates/<?php  echo $res_upld["esm/spea/pwd_name"]; ?>">Download</a></td>
                </tr>
                <tr>
                <td>6.</td>
                <td>Marriage certificate issued by competent authority</td>
                <td><?php echo $res_upld["mrg_certificate_sl_no"]; ?></td>
                <td><?php echo $res_upld["mrg_certificate_issuing_authority"]; ?></td>
                <td><a target="_blank" href="uploads/certificates/Marriage_certificates/<?php  echo $res_upld["mrg_certificate_name"]; ?>">Download</a></td>
                </tr> 
                  </tbody>
                  </table>
                  <!--<center><a>Download All</a></center>-->
                  <table class="table">
                  <?php
				  $qry_check_cert_vrf="SELECT * FROM `candidate_application_verification_info` WHERE `candidate_email`='$res_email[emailid]'";
		$sql_check_cert_vrf=mysqli_query($conn, $qry_check_cert_vrf);
		$res_check_cert_vrf=mysqli_fetch_array($sql_check_cert_vrf);
				  if($res_check_cert_vrf["certificate_info_verfd"]=="yes")
				  {
				  ?>
                  <tr>
                  <td colspan="8" style="text-align:center"><input type="button" value="Verified" class="btn-primary" disabled="disabled"></td>
                  </tr>
                  <?php
				  }
				  else if($res_check_cert_rej["certificate_info_rejctd"]=="yes")
				  {
				  ?>
                  <tr>
                  <td colspan="8" style="text-align:center"><input type="button" value="Rejected" class="btn-primary" disabled="disabled"></td>
                  </tr>
                  <?php
				  }
				  else
				  {
				  ?>
                  <tr>
                  <td><input type="submit" id="verify_certificate" name="verify_certificate" value="Verify" class="btn-primary"></td>
                  <td><input type="button" id="r4" name="r4" value="Reject" class="btn-primary" onClick="show_reason('r4');"></td>
                  <td><input type="text" placeholder="Reason Of Rejection" id="r4reason" name="r4reason" style="display:none" class="form-control"></td>
                  <td><input type="submit" id="submit_reason4" name="submit_reason4" value="Submit" style="display:none" class="btn-primary"></td>
                  
                  </tr>
                  <?php
				  }
				  ?>
                  </table>
                         </form>
                              </div>
                              </div>
                              <div style="display: none;" id="payment">
                               <div class="col-md-6">
                                 <form action="" id="emp_info" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                <table class="table">
                  <tr>
                 <td>Details of fee remitted</td>
                 <td><?php echo $res_pmnt["bank_rcpt_no"] ?></td>
                 <td><?php echo $res_pmnt["payment_dt"] ?></td>
                 <td><?php echo $res_pmnt["payment_amount"] ?></td>
                 <td><a target="_blank" href="uploads/candidate_payment_receipt/<?php echo $res_pmnt["bank_rcpt_doc_name"] ?>">Download Receipt</a></td>
                 </tr>
                 
                  </table>
                  <table class="table">
                  <?php
				  $qry_check_pmnt_vrf="SELECT * FROM `candidate_application_verification_info` WHERE `candidate_email`='$res_email[emailid]'";
		$sql_check_pmnt_vrf=mysqli_query($conn, $qry_check_pmnt_vrf);
		$res_check_pmnt_vrf=mysqli_fetch_array($sql_check_pmnt_vrf);
				  if($res_check_pmnt_vrf["payment_info_verfd"]=="yes")
				  {
				  ?>
                  <tr>
                  <td colspan="8" style="text-align:center"><input type="button" value="Verified" class="btn-primary" disabled="disabled"></td>
                  </tr>
                  <?php
				  }
				  else if($res_check_pmnt_rej["payment_info_rejctd"]=="yes")
				  {
				  ?>
                  <tr>
                  <td colspan="8" style="text-align:center"><input type="button" value="Rejected" class="btn-primary" disabled="disabled"></td>
                  </tr>
                  <?php
				  }
				  else
				  {
				  ?>
                  <tr>
                  
                  <td></td>
                  <td><input type="submit" id="verify_payment" name="verify_payment" value="Verify" class="btn-primary"></td>
                  <td><input type="button" id="r5" name="r5" value="Reject" class="btn-primary" onClick="show_reason('r5');"></td>
                  <td><input type="text" placeholder="Reason Of Rejection" id="r5reason" name="r5reason" style="display:none" class="form-control"></td>
                  <td><input type="submit" id="submit_reason5" name="submit_reason5" value="Submit" style="display:none" class="btn-primary"></td>
                  
                  </tr>
                  <?php
				  }
				  ?>
                  </table>
                  
                         </form>
                              </div>
                              </div>
                              <div style="display: none;" id="declaration">
                               <div class="col-md-6">
                                 <p align="justify">I hereby declare that the information furnished above are true and correct to the best of my knowledge and belief. In caase, any information furnished is found incorrect, incomplete before issue of admit card and or at any stage of examination, I undertake that my candidature is liable to be rejected.
                                 </p><br /><br /><br /><br />
                                 <input type="text" readonly="readonly" placeholder="Place" id="place" name="place" value="<?php echo $res_decl["place"] ?>" class="form-control" style="width:100px;float:left;"/><br/><br/>
                                 <input type="text" readonly="readonly" placeholder="Date" id="decl_dt" name="decl_dt" value="<?php echo $res_decl["date"] ?>" class="form-control"style="width:100px;float:left;"/>
                                 <div style="float:right;">
                                 <img src="uploads/candidate_signature/<?php echo $res_decl["signature"] ?>"  width="150"  height="150" id="signpreview" name="signpreview"></div>
                                 <table class="table">
                  <tr>
                  
                  <td></td>
                  <td><input type="button" id="verify" name="save_emp" value="Verify" class="btn-primary"></td>
                  <td><input type="button" id="r6" name="save_emp" value="Reject" class="btn-primary" onClick="show_reason('r6');"></td>
                  <td><input type="text" placeholder="Reason Of Rejection" id="r6reason" style="display:none" class="form-control"></td>
                  <td><input type="button" id="r6sub" name="save_emp" value="Submit" style="display:none" class="btn-primary"></td>
                  
                  </tr>
                  </table>
                              </div>
                              </div>
                       </div>
                          
                          
                          
                        </div>
                        
                      </div>
                      
                      </div>
                  
                  </div>
                </div>
              </div>
<?php
}
if($_SESSION['adminexam_user'])
{
	
	
	$qry_personal="SELECT * FROM `candidate_personal_details` where `application_no`='$_REQUEST[appno]'";
	$sql_personal=mysqli_query($conn, $qry_personal);
	$res_personal=mysqli_fetch_array($sql_personal);
	
	$qry_edu="SELECT * FROM `candidate_educational_details` where `application_no`='$_REQUEST[appno]'";
	$sql_edu=mysqli_query($conn, $qry_edu);
	$res_edu=mysqli_fetch_array($sql_edu);
	
	$qry_emp="SELECT * FROM `candidate_employment_details` where `application_no`='$_REQUEST[appno]'";
	$sql_emp=mysqli_query($conn, $qry_emp);
	$res_emp=mysqli_fetch_array($sql_emp);
	
	$qry_upld="SELECT * FROM `candidate_certificate_uploads` where `application_no`='$_REQUEST[appno]'";
	$sql_upld=mysqli_query($conn, $qry_upld);
	$res_upld=mysqli_fetch_array($sql_upld);
	
	$qry_pmnt="SELECT * FROM `candidate_payment_details` where `application_no`='$_REQUEST[appno]'";
	$sql_pmnt=mysqli_query($conn, $qry_pmnt);
	$res_pmnt=mysqli_fetch_array($sql_pmnt);
	
	$qry_decl="SELECT * FROM `candidate_declaration` where `application_no`='$_REQUEST[appno]'";
	$sql_decl=mysqli_query($conn, $qry_decl);
	$res_decl=mysqli_fetch_array($sql_decl);
?>
<script>
function show_reason(str)
{
	var reason=document.getElementById(str+"reason")
	var submitbtn=document.getElementById(str+"sub")
	reason.style.display = "block";
	submitbtn.style.display = "block";
}
</script>
<div class="col-lg-12">
<legend><h3>Application Form No:- <?php echo $_REQUEST["appno"]; ?></h3></legend>
                <div class="tab-content">
				
                  <div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
                    
                      <div align="center" id="txtHint">
                      <div class="row">
                        <div class="col-md-12">
                          
                          <ul id="tabs">
      <li><a id="current" href="#" name="#personal">Personal Info</a></li>
      <li><a id="" href="#" name="#academic">Educational Info</a></li>
      <li><a id="" href="#" name="#employment">Employment Info</a></li>
      <li><a id="" href="#" name="#upload">Upload Certificate</a></li>
      <li><a id="" href="#" name="#payment">Payment Info</a></li>
      <li><a id="" href="#" name="#declaration">Declaration</a></li>
  </ul>

                          <div id="content">
                              <div style="display: none;" id="personal">
                               <div class="col-md-8">
                                 <form action="" id="personalinfo" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                  <table class="table">
                  
                 
                  <tr>
                  <td>Name</td>
                  <td><?php echo $res_personal["candidate_name"] ?></td>
                   <td style="width:15%"></td>
 <td></td>
 <td rowspan="3" align="center"><img src="uploads/candidate_photos/<?php echo $res_personal["candidate_photo"] ?>"  width="150"  height="150" id="photopreview" name="photopreview"></td>
                  </tr>
                  <tr>
                  <td>Father's Name</td>
                  <td><?php echo $res_personal["father's_name"] ?></td>
                  </tr>
                  <tr>
                  <td>Husband's Name (if married)</td>
                  <td><?php echo $res_personal["husband's_name"] ?></td>
                  </tr>
                  <tr>
                  <td>Gender</td>
                  <td><input type="radio" disabled="disabled" id="male" value="male" <?php if($res_personal["gender"]=="male"){ echo 'checked="checked"';} ?> name="gender">Male &nbsp;<input type="radio" disabled="disabled" id="female" value="female" <?php if($res_personal["gender"]=="female"){ echo 'checked="checked"';} ?> name="gender">Female</td>
                  </tr>
                  <tr>
                  <td>Date Of Birth</td>
                  <td><?php echo $res_personal["dob"] ?></td>
                  </tr>
                  <tr>
                  <td>Age</td>
                  <td><?php echo $res_personal["age"] ?></td>
                  </tr>
                  <tr>
                  <td>Place of Birth</td>
                  <td><?php echo $res_personal["pob_village"] ?></td>
                  <td><?php echo $res_personal["pob_city"] ?></td>
                  </tr>
                  <tr>
                  <td></td>
                  <td><?php echo $res_personal["pob_district"] ?></td>
                  <td><?php echo $res_personal["pob_state"] ?></td>
                  </tr>
                  <tr>
                  <td>Address for Communication</td>
                  <td colspan="3"><?php echo $res_personal["ca_address"] ?></td>
                  </tr>
                  <tr>
                  <td></td>
                  <td><?php echo $res_personal["ca_city"] ?></td>
                  <td><?php echo $res_personal["ca_district"] ?></td>
                  <td><?php echo $res_personal["ca_pincode"] ?></td>
                  </tr>
                  <tr>
                  <td></td>
                  <td><?php echo $res_personal["ca_phoneno"] ?></td>
                  <td><?php echo $res_personal["ca_mobno"] ?></td>
                  </tr>
                  <tr>
                  <td>Permanent Address</td>
                  <td colspan="3"><?php echo $res_personal["pa_address"] ?></td>
                  </tr>
                  <tr>
                  <td></td>
                  <td><?php echo $res_personal["pa_city"] ?></td>
                  <td><?php echo $res_personal["pa_district"] ?></td>
                  <td><?php echo $res_personal["pa_pincode"] ?></td>
                  </tr>
                  <tr>
                  <td></td>
                  <td><?php echo $res_personal["pa_phoneno"] ?></td>
                  <td><?php echo $res_personal["pa_mobno"] ?></td>
                  </tr>
                  <tr>
                  <td>Email Id</td>
                  <td><?php echo $res_personal["email_id"] ?></td>
                  </tr>
                  <tr>
                  <td>Category</td>
                  <td colspan="3"><input type="radio" disabled="disabled" id="gen_ur" value="GEN/UR[unreserved]" <?php if($res_personal["category"]=="GEN/UR[unreserved]"){ echo 'checked="checked"';} ?> name="c_cat">GEN/UR[unreserved]&nbsp;<input type="radio" disabled="disabled" <?php if($res_personal["category"]=="OBC(CL)"){ echo 'checked="checked"';} ?> id="obc_cl" value="OBC(CL)" name="c_cat">OBC(CL) &nbsp;<input type="radio" disabled="disabled" <?php if($res_personal["category"]=="OBC(SL)"){ echo 'checked="checked"';} ?> id="obc_sl" value="OBC(SL)" name="c_cat">OBC(SL) &nbsp;<input type="radio" disabled="disabled" <?php if($res_personal["category"]=="BL"){ echo 'checked="checked"';} ?> id="bl" value="BL" name="c_cat">BL &nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["category"]=="ST"){ echo 'checked="checked"';} ?> id="st" value="ST" name="c_cat">ST &nbsp;<input type="radio" disabled="disabled" <?php if($res_personal["category"]=="SC"){ echo 'checked="checked"';} ?> id="sc" value="SC" name="c_cat">SC &nbsp;<input type="radio" disabled="disabled" <?php if($res_personal["category"]=="PT"){ echo 'checked="checked"';} ?> id="pt" value="PT" name="c_cat">PT<br/><input disabled="disabled" type="radio" <?php if($res_personal["category"]=="OBC(CL)(BPL)"){ echo 'checked="checked"';} ?> id="obc_cl_bpl" value="OBC(CL)(BPL)" name="c_cat">OBC(CL)(BPL)&nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["category"]=="OBC(SL)(BPL)"){ echo 'checked="checked"';} ?> id="obc_sl_bpl" value="OBC(SL)(BPL)" name="c_cat">OBC(SL)(BPL) &nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["category"]=="BL(BPL)"){ echo 'checked="checked"';} ?> id="bl_bpl" value="BL(BPL)" name="c_cat">BL(BPL) &nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["category"]=="ST(BPL)"){ echo 'checked="checked"';} ?> id="st_bpl" value="ST(BPL)" name="c_cat">ST(BPL) &nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["category"]=="SC(BPL)"){ echo 'checked="checked"';} ?> id="sc_bpl" value="SC(BPL)" name="c_cat">SC(BPL)</td>
                  </tr>
                  <tr>
                  <td>If you belong to BPL category</td>
                  <td><?php echo $res_personal["bpl_certificate_no"] ?></td>
                  <td><?php echo $res_personal["bpl_issuing_authority"] ?></td>
                  <td><?php echo $res_personal["bpl_issue_date"] ?></td>
                  </tr>
                  <tr>
                  <td>Whether any of the following category</td>
                  <td colspan="2"><input disabled="disabled" type="radio" <?php if($res_personal["other_category"]=="ESM"){ echo 'checked="checked"';} ?> id="esm" value="ESM" name="oth_cat">ESM &nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["other_category"]=="PWD"){ echo 'checked="checked"';} ?> id="pwd" value="PWD" name="oth_cat">PWD &nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["other_category"]=="SPAE"){ echo 'checked="checked"';} ?> id="spae" value="SPAE" name="oth_cat">SPAE &nbsp;<input disabled="disabled" type="radio" <?php if($res_personal["other_category"]=="NONE"){ echo 'checked="checked"';} ?> id="none" value="NONE" name="oth_cat">NONE</td>
                  </tr>
                  <tr>
                  <td>Sikkim Subject / Certificatetion</td>
                  <td><?php echo $res_personal["sikkim_certificate_id_no"] ?></td>
                  <td><?php echo $res_personal["sikkim_certificate_issuing_authority"] ?></td>
                  <td><?php echo $res_personal["sikkim_certificate_district"] ?></td>
                  </tr>
                  <tr>
                  <td>Valid Employee Card No</td>
                  <td><?php echo $res_personal["employee_card_no"] ?></td>
                  </tr>
                  </table>
                  <!--<table class="table">
                  <tr>
                  <td><input type="button" id="verify" name="save_emp" value="Verify" class="btn-primary"></td>
                  <td><input type="button" id="r1" name="save_emp" value="Reject" class="btn-primary" onClick="show_reason('r1');"></td>
                  <td><input type="text" placeholder="Reason Of Rejection" id="r1reason" style="display:none" class="form-control"></td>
                  <td><input type="button" id="r1sub" name="save_emp" value="Submit" style="display:none" class="btn-primary"></td>
                  </tr>
                  </table>-->
                         </form>
                                
                              </div>
                             
                              </div>
                              <div style="display: none;" id="academic">
                               <div class="col-md-12">
                                 <form action="" id="academic_info" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                 <table class="table" id="education_table">
                 <tr>
                 <th>Sl. No.</th>
                 <th>Name of the Qualifying Exam</th>
                 <th>Month & Year of Passing</th>
                 <th>Name of the school/college studied</th>
                 <th>Name of the Board/University</th>
                 <th>% obtained</th>
                 </tr>
                 <?php
				 
					 $i=0;
					 $res_edu_qen=explode(',' , $res_edu['qualifying_exam_name']);
					 $res_edu_yop=explode(',' , $res_edu['month_year_of_passing']);
					 $res_edu_scn=explode(',' , $res_edu['school_college_name']);
					 $res_edu_bun=explode(',' , $res_edu['board_university_name']);
					 $res_edu_po=explode(',' , $res_edu['percntg_obtained']);
					 while($res_edu_qen[$i] && $res_edu_yop[$i] && $res_edu_scn[$i] && $res_edu_bun[$i] && $res_edu_po[$i])
				 {
					 ?> 
                <tr>
                  <td><?php echo $i+1;?>.</td>
                  <td><?php echo $res_edu_qen[$i];?></td>
                  <td><?php echo $res_edu_yop[$i];?></td>
                  <td><?php echo $res_edu_scn[$i];?></td>
                  <td><?php echo $res_edu_bun[$i];?></td>
                  <td><?php echo $res_edu_po[$i];?></td>
                  </tr>
                <?php
				$i++;
				 }
				 ?>
                
                
                  </table>
                  <table class="table">
                  	<tr>
                    	<td><b>Optional subjects opted for (no changes will be entertained)</b></td>
                        <td><?php echo $res_edu["optional_subject"];?></td>
                    </tr>
                  </table>
                  <!--<table class="table">
                  <tr>
                  <td></td>
                  <td></td>
                  <td><input type="button" id="verify" name="save_emp" value="Verify" class="btn-primary"></td>
                  <td><input type="button" id="r2" name="save_emp" value="Reject" class="btn-primary" onClick="show_reason('r2');"></td>
                  <td><input type="text" placeholder="Reason Of Rejection" id="r2reason" style="display:none" class="form-control"></td>
                  <td><input type="button" id="r2sub" name="save_emp" value="Submit" style="display:none" class="btn-primary"></td>
                  <td></td>
                  <td></td>
                  </tr>
                  </table>-->
                         </form>  
                         </div>
                              </div>
                              <div style="display: none;" id="employment">
                               <div class="col-md-8">
                                 <form action="" id="emp_info" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                <table class="table">
                  
                  <tr>
                  <td style="width:40%"><?php echo $res_emp["employment_card_no"] ?></td>
                  <td style="width:30%"><?php echo $res_emp["issuing_authority"] ?></td>
                  <td style="width:30%"><?php echo $res_emp["issue_district"] ?></td>
                   
                  </tr>
                  <tr>
                  <td>Whether employed</td>
                  <td><input disabled="disabled" type="radio" <?php if($res_emp["whether_employed"]=="yes"){ echo 'checked="checked"';} ?> id="wh_emp_y" value="yes" name="wh_emp">Yes &nbsp;<input disabled="disabled" type="radio" <?php if($res_emp["whether_employed"]=="no"){ echo 'checked="checked"';} ?> value="no" id="wh_emp_n"  name="wh_emp">No</td>
                   
                  </tr>
                  <tr>
                  <td>Nature of employment (if employed)</td>
                  <td><input disabled="disabled" type="radio" <?php if($res_emp["employment_nature"]=="Regular"){ echo 'checked="checked"';} ?> id="noe_reg" value="Regular"  name="noe">Regular<br /><input disabled="disabled" type="radio" <?php if($res_emp["employment_nature"]=="Temporary Service[MR/Adhoc/WC]"){ echo 'checked="checked"';} ?> id="noe_ts" value="Temporary Service[MR/Adhoc/WC]" name="noe">Temporary Service[MR/Adhoc/WC]</td>
                   
                  </tr>
                  <tr>
                  <td>Name of the department (if employed)</td>
                  <td><?php echo $res_emp["employment_department"] ?></td>
                   
                  </tr>
                  <tr>
                  <td>Age relaxation sought as employed under the State/Central Govt. Dept., etc. as mentioned in the advertisement</td>
                  <td><input disabled="disabled" type="radio" <?php if($res_emp["age_relaxation"]=="yes"){ echo 'checked="checked"';} ?> value="yes" id="age_rel_y"  name="age_rel">Yes &nbsp;<input disabled="disabled" type="radio" <?php if($res_emp["age_relaxation"]=="no"){ echo 'checked="checked"';} ?> value="no" id="age_rel_n" name="age_rel">No</td>
                   
                  </tr>
                  <tr>
                  <td>Name of the Organization/Programmers/Projects</td>
                  <td><?php echo $res_emp["Org_prog_proj_name"] ?></td>
                   
                  </tr>
                  </table>                   
                  <!--<table class="table">
                  <tr>
                  
                  <td></td>
                  <td><input type="button" id="verify" name="save_emp" value="Verify" class="btn-primary"></td>
                  <td><input type="button" id="r3" name="save_emp" value="Reject" class="btn-primary" onClick="show_reason('r3');"></td>
                  <td><input type="text" placeholder="Reason Of Rejection" id="r3reason" style="display:none" class="form-control"></td>
                  <td><input type="button" id="r3sub" name="save_emp" value="Submit" style="display:none" class="btn-primary"></td>
                  
                  </tr>
                  </table>-->
                         </form>
                              </div>
                              </div>
                                      
                               <div style="display: none;" id="upload">
                               <div class="col-md-6">
                                 <form action="" id="emp_info" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                 <table class="table">
                 <tr>
                 	<th>Sl. No.</th>
                    <th>Particulars of Certificates submitted</th>
                    <th>Certificate Sl. No.</th>
                    <th>Issuing Authority</th>
                    <th>Download</th>
                 </tr>
                <tr>
                <td>1.</td>
                <td>OBC (Central List)/OBC(State List)BL/PT/ST/SC Certificate</td>
                <td><?php echo $res_upld["obc/bl/pt/st/sc_certificate_sl_no"]; ?></td>
                <td><?php echo $res_upld["obc/bl/pt/st/sc_certificate_issuing_authority"]; ?></td>
                <td><a target="_blank" href="uploads/certificates/obc_bl_pt_st_sc_certificate/<?php  echo $res_upld["obc/bl/pt/st/sc_certificate_name"]; ?>">Download</a></td>
                </tr>
                <tr>
                <td>2.</td><td>Sikkim Subject/Certificate of Identification</td>
                <td><?php echo $res_upld["sikkim_coi_sl_no"]; ?></td>
                <td><?php echo $res_upld["sikkim_coi_issuing_authority"]; ?></td>
                <td><a target="_blank" href="uploads/certificates/Sikkim_Certificate_of_Identification/<?php  echo $res_upld["sikkim_coi_name"]; ?>">Download</a></td>
                </tr>
                <tr>
                <td>3.</td>
                <td>In case of married female candidates husband's C.O.I</td>
                <td><?php echo $res_upld["husband's_coi_sl_no"]; ?></td>
                <td><?php echo $res_upld["husband's_coi_issuing_authority"]; ?></td>
                <td><a target="_blank" href="uploads/certificates/female_candidates_husbands_COI/<?php  echo $res_upld["husband's_coi_name"]; ?>">Download</a></td>
                </tr>
                <tr>
                <td>4.</td>
                <td>In case of unmarried female candidates father's C.O.I</td>
                <td><?php echo $res_upld["father's_coi_sl_no"]; ?></td>
                <td><?php echo $res_upld["father's_coi_issuing_authority"]; ?></td>
                <td><a target="_blank" href="uploads/certificates/candidates_fathers_COI/<?php  echo $res_upld["father's_coi_name"]; ?>">Download</a></td>
                </tr>
                <tr>
                <td>5.</td>
                <td>Certificate of ESM/SPEA/PWD</td>
                <td><?php echo $res_upld["esm/spea/pwd_sl_no"]; ?></td>
                <td><?php echo $res_upld["esm/spea/pwd_issuing_authority"]; ?></td>
                <td><a target="_blank" href="uploads/certificates/ESM_SPEA_PWD_certificates/<?php  echo $res_upld["esm/spea/pwd_name"]; ?>">Download</a></td>
                </tr>
                <tr>
                <td>6.</td>
                <td>Marriage certificate issued by competent authority</td>
                <td><?php echo $res_upld["mrg_certificate_sl_no"]; ?></td>
                <td><?php echo $res_upld["mrg_certificate_issuing_authority"]; ?></td>
                <td><a target="_blank" href="uploads/certificates/Marriage_certificates/<?php  echo $res_upld["mrg_certificate_name"]; ?>">Download</a></td>
                </tr> 
                  </tbody>
                  </table>
                  <!--<center><a>Download All</a></center>-->
                  <!--<table class="table">
                  <tr>
                  <td><input type="button" id="verify" name="save_emp" value="Verify" class="btn-primary"></td>
                  <td><input type="button" id="r4" name="save_emp" value="Reject" class="btn-primary" onClick="show_reason('r4');"></td>
                  <td><input type="text" placeholder="Reason Of Rejection" id="r4reason" style="display:none" class="form-control"></td>
                  <td><input type="button" id="r4sub" name="save_emp" value="Submit" style="display:none" class="btn-primary"></td>
                  
                  </tr>
                  </table>-->
                         </form>
                              </div>
                              </div>
                              <div style="display: none;" id="payment">
                               <div class="col-md-6">
                                 <form action="" id="emp_info" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                <table class="table">
                  <tr>
                 <td>Details of fee remitted</td>
                 <td><?php echo $res_pmnt["bank_rcpt_no"] ?></td>
                 <td><?php echo $res_pmnt["payment_dt"] ?></td>
                 <td><?php echo $res_pmnt["payment_amount"] ?></td>
                 <td><a target="_blank" href="uploads/candidate_payment_receipt/<?php echo $res_pmnt["bank_rcpt_doc_name"] ?>">Download Receipt</a></td>
                 </tr>
                 
                  </table>
                  <!--<table class="table">
                  <tr>
                  
                  <td></td>
                  <td><input type="button" id="verify" name="save_emp" value="Verify" class="btn-primary"></td>
                  <td><input type="button" id="r5" name="save_emp" value="Reject" class="btn-primary" onClick="show_reason('r5');"></td>
                  <td><input type="text" placeholder="Reason Of Rejection" id="r5reason" style="display:none" class="form-control"></td>
                  <td><input type="button" id="r5sub" name="save_emp" value="Submit" style="display:none" class="btn-primary"></td>
                  
                  </tr>
                  </table>-->
                         </form>
                              </div>
                              </div>
                              <div style="display: none;" id="declaration">
                               <div class="col-md-6">
                                 <p align="justify">I hereby declare that the information furnished above are true and correct to the best of my knowledge and belief. In caase, any information furnished is found incorrect, incomplete before issue of admit card and or at any stage of examination, I undertake that my candidature is liable to be rejected.
                                 </p><br /><br /><br /><br />
                                 <input type="text" readonly="readonly" placeholder="Place" id="place" name="place" value="<?php echo $res_decl["place"] ?>" class="form-control" style="width:100px;float:left;"/><br/><br/>
                                 <input type="text" readonly="readonly" placeholder="Date" id="decl_dt" name="decl_dt" value="<?php echo $res_decl["date"] ?>" class="form-control"style="width:100px;float:left;"/>
                                 <div style="float:right;">
                                 <img src="uploads/candidate_signature/<?php echo $res_decl["signature"] ?>"  width="150"  height="150" id="signpreview" name="signpreview"></div>
                                 
                                 <!--<table class="table">
                  <tr>
                  
                  <td></td>
                  <td><input type="button" id="verify" name="save_emp" value="Verify" class="btn-primary"></td>
                  <td><input type="button" id="r6" name="save_emp" value="Reject" class="btn-primary" onClick="show_reason('r6');"></td>
                  <td><input type="text" placeholder="Reason Of Rejection" id="r6reason" style="display:none" class="form-control"></td>
                  <td><input type="button" id="r6sub" name="save_emp" value="Submit" style="display:none" class="btn-primary"></td>
                  
                  </tr>
                  </table>-->
                              </div>
                              </div>
                       </div>
                          
                          
                          
                        </div>
                        
                      </div>
                      
                      </div>
                  
                  </div>
                </div>
              </div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once'template.php';
?>