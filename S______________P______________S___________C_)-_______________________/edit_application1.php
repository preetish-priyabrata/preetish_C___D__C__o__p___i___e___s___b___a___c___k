<?php
error_reporting(0);
ob_start();
session_start();
require 'FlashMessages.php';
include "config.php";
if($_SESSION['cand_user'])
{
   $msg = new \Preetish\FlashMessages\FlashMessages();
   ?>
  <div class="text-center">
    <?php $msg->display(); ?>   
   </div>

<!--<script>
            $(function () {
                $("#decl_dt").datepicker({
                     changeMonth: true,
                    changeYear: true,
                    yearRange: "1980:2020",
                    dateFormat: "yy-mm-dd" 
                });
                 
            });
        </script>-->
        <script>

$(function () {
 $('#c_dob').datepicker({
              onSelect: function(value, ui) {
                  var today = new Date(), 
                      dob = new Date(value), 
                      age = new Date(today - dob).getFullYear() - 1970;
                     // alert(age);
                  document.getElementById("c_age").value=age;
                  document.getElementById("c_age").readOnly = true;
                  //$('#c_age').text(age);
              },
              
              yearRange: '1980:2010',
              dateFormat: "yy-mm-dd",
              changeMonth: true,
              changeYear: true
          });
  });
  </script>
 <script>

       function PreviewImage() {

            var oFReader = new FileReader();

            oFReader.readAsDataURL(document.getElementById("c_photo").files[0]);

        

            oFReader.onload = function(oFREvent) {

              document.getElementById("photopreview").src = oFREvent.target.result;

            };

          };
          
          </script>
          <script>

       function PreviewSign() {

            var oFReader = new FileReader();

            oFReader.readAsDataURL(document.getElementById("sign").files[0]);

        

            oFReader.onload = function(oFREvent) {

              document.getElementById("signpreview").src = oFREvent.target.result;

            };

          };
          
          </script>
<script>

function bank_details(str)
{
if(str=="Cheque" || str=="DD")
{
    document.getElementById("bank").style.display="block";
    document.getElementById("chq").style.display="block";
    document.getElementById("doi").style.display="block";
}
else
{
    document.getElementById("bank").style.display="none";
    document.getElementById("chq").style.display="none";
    document.getElementById("doi").style.display="none";
}
}

function show_application(){
    var xyz=$('#exam').val();
    if(xyz!=""){
    // alert(xyz);
   
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
<section>    
  <div class="col-lg-12">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <?php include'application_form_exam.php';?>
    </div>
    <div class="col-lg-4"></div>
  </div>
</section>
  <?php 
    if($_SESSION['exam_selected']){
       $qry_check_appno="SELECT * FROM `candidate_application_info` WHERE `candidate_email`='$_SESSION[cand_user]' AND `exam_name`='$_SESSION[exam_selected]'";
    $sql_check_appno=mysqli_query($conn, $qry_check_appno);
    $num_rows=mysqli_num_rows($sql_check_appno);
    if($num_rows!="0")
    {
        $res_check_appno=mysqli_fetch_array($sql_check_appno);
        $appno= $res_check_appno["application_no"];
    }
    //search after exam in session
    $qry_login="SELECT `candidate_id` FROM `candidate_login_info` WHERE `emailid`='$_SESSION[cand_user]'";
    $sql_login=mysqli_query($conn, $qry_login);
    $res_login=mysqli_fetch_array($sql_login);
    
    $qry_personal="SELECT * FROM `candidate_personal_details` where `candidate_id`='$res_login[candidate_id]' AND `application_no`='$appno'";
    $sql_personal=mysqli_query($conn, $qry_personal);
    $res_personal=mysqli_fetch_array($sql_personal);
    
    $qry_edu="SELECT * FROM `candidate_educational_details` where `candidate_id`='$res_login[candidate_id]' AND `application_no`='$appno'";
    $sql_edu=mysqli_query($conn, $qry_edu);
    $res_edu=mysqli_fetch_array($sql_edu);
    
    $qry_emp="SELECT * FROM `candidate_employment_details` where `candidate_id`='$res_login[candidate_id]' AND `application_no`='$appno'";
    $sql_emp=mysqli_query($conn, $qry_emp);
    $res_emp=mysqli_fetch_array($sql_emp);
    
    $qry_upld="SELECT * FROM `candidate_certificate_uploads` where `candidate_id`='$res_login[candidate_id]' AND `application_no`='$appno'";
    $sql_upld=mysqli_query($conn, $qry_upld);
    $res_upld=mysqli_fetch_array($sql_upld);
    
    $qry_pmnt="SELECT * FROM `candidate_payment_details` where `candidate_id`='$res_login[candidate_id]' AND `application_no`='$appno'";
    $sql_pmnt=mysqli_query($conn, $qry_pmnt);
    $res_pmnt=mysqli_fetch_array($sql_pmnt);
    
    $qry_decl="SELECT * FROM `candidate_declaration` where `candidate_id`='$res_login[candidate_id]' AND `application_no`='$appno'";
    $sql_decl=mysqli_query($conn, $qry_decl);
    $res_decl=mysqli_fetch_array($sql_decl); 
  ?>
  <div id="edit_app"  class="col-lg-12">
    <legend><h3>Application Form No:- <?php echo $appno; ?></h3></legend>
    <div class="tab-content">                
      <div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
        <div align="center" id="txtHint">
          <div class="row">
            <div class="col-md-12">
              <ul class="nav nav-pills nav-justified" id="myTab">
                <li class="active"><a data-toggle="pill" href="#Personal">Personal Details</a></li>
                <li><a data-toggle="pill" href="#Educational">Educational Details</a></li>
                <li><a data-toggle="pill" href="#Employment">Employment Details</a></li>
                <li><a data-toggle="pill" href="#Upload">Upload Certificate</a></li>
                <li><a data-toggle="pill" href="#Payment">Payment Details</a></li>
                <li><a data-toggle="pill" href="#Declaration">Declaration</a></li>
              </ul>
  
              <div class="tab-content">
                <div id="Personal" class="tab-pane fade in active">
                 <div class="row"></div>
                  <?php  
                      $qry_personal="SELECT * FROM `candidate_personal_details` where `application_no`='$appno'";
                      $sql_personal=mysqli_query($conn, $qry_personal);
                      $res_personal_num=mysqli_num_rows($sql_personal);
                      $res_personal=mysqli_fetch_array($sql_personal);                   
                      if($res_personal['personal_verif_status']==1 OR $res_personal['personal_verif_status']==3){
                        if($res_personal['personal_verif_status']==1){?>
                         <div class="col-md-12">
                          <div class="alert alert-success text-center">
                            <strong >Personal Section is Verified  .</strong>
                          </div>
                          </div>
                  <?php }else{?>
                      <div class="col-md-12">
                          <div class="alert alert-danger text-center">
                            <strong > Appliaction Is Rejected.</strong>
                          </div>
                          </div>

                  <?php }}?>
                    <form action="update_personal_info.php" id="personalinfo" enctype="multipart/form-data" method="post" role="form" novalidate>
                        <input type="hidden" name="upd_photo" value="<?php echo $res_personal["candidate_photo"]; ?>" />
                        <input type="hidden" name="appno" value="<?php echo $appno; ?>" />
                        <table class="table">             
                            <tr>
                              <td>Name</td>
                              <td><input type="text" class="form-control" value="<?php echo $res_personal["candidate_name"] ?>" id="c_name" name="c_name"></td>
                              <td style="width:15%"><input type="file" id="c_photo" name="c_photo"  onChange="PreviewImage();" class="form-control"/></td>
                              <td>Upload Photo</td>
                              <td rowspan="3" align="center"><img src="uploads/candidate_photos/<?php echo $res_personal["candidate_photo"] ?>"  width="150"  height="150" id="photopreview" name="photopreview"></td>
                            </tr>
                            <tr>
                              <td>Father's Name</td>
                              <td><input type="text" class="form-control" value="<?php echo $res_personal["father's_name"] ?>" id="c_f_name" name="c_f_name"></td>
                            </tr>                            
                            <tr>
                              <td>Gender</td>
                              <td><input type="radio" id="male" value="male" <?php if($res_personal["gender"]=="male"){ echo 'checked="checked"';} ?> name="gender">Male &nbsp;<input type="radio" id="female" value="female" <?php if($res_personal["gender"]=="female"){ echo 'checked="checked"';} ?> name="gender">Female</td>
                            </tr>
                            <tr>
                              <td>Husband's Name (if married)</td>
                              <td><input type="text" value="<?php echo $res_personal["husband's_name"] ?>" class="form-control" id="c_h_name" name="c_h_name"></td>
                            </tr>
                            <tr>
                              <td>Date Of Birth</td>
                              <td><input type="text" value="<?php echo $res_personal["dob"] ?>" id="c_dob" name="c_dob" class="form-control" /></td>
                            </tr>
                            <tr>
                              <td>Age</td>
                              <td><input type="text" value="<?php echo $res_personal["age"] ?>" id="c_age" name="c_age" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td>Place of Birth</td>
                              <td><input type="text" value="<?php echo $res_personal["pob_village"] ?>" id="c_pob_vill" name="c_pob_vill" placeholder="Village" class="form-control"/></td>
                              <td><input type="text" value="<?php echo $res_personal["pob_city"] ?>" id="c_pob_city" name="c_pob_city" placeholder="City" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><input type="text" value="<?php echo $res_personal["pob_district"] ?>" id="c_pob_dist" name="c_pob_dist" placeholder="District" class="form-control"/></td>
                              <td><input type="text" value="<?php echo $res_personal["pob_state"] ?>" id="c_pob_state" name="c_pob_state" placeholder="State" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td>Address for Communication</td>
                              <td colspan="3"><input type="text" value="<?php echo $res_personal["ca_address"] ?>" id="c_ca_add" name="c_ca_add" placeholder="Address" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><input type="text" value="<?php echo $res_personal["ca_city"] ?>" id="c_ca_city" name="c_ca_city" placeholder="City" class="form-control"/></td>
                              <td><input type="text" value="<?php echo $res_personal["ca_district"] ?>" id="c_ca_dist" name="c_ca_dist" placeholder="District" class="form-control"/></td>
                              <td><input type="text" value="<?php echo $res_personal["ca_pincode"] ?>" id="c_ca_pin" name="c_ca_pin" placeholder="Pincode" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><input type="text" value="<?php echo $res_personal["ca_phoneno"] ?>" id="c_ca_phno" name="c_ca_phno" placeholder="Phone" class="form-control"/></td>
                              <td><input type="text" value="<?php echo $res_personal["ca_mobno"] ?>" id="c_ca_mob" name="c_ca_mob" placeholder="Mobile" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td>Permanent Address</td>
                              <td colspan="3"><input type="text" value="<?php echo $res_personal["pa_address"] ?>" placeholder="Address" id="c_pa_add" name="c_pa_add" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><input type="text" id="c_pa_city" value="<?php echo $res_personal["pa_city"] ?>" name="c_pa_city" placeholder="City" class="form-control"/></td>
                              <td><input type="text" id="c_pa_dist" value="<?php echo $res_personal["pa_district"] ?>" name="c_pa_dist" placeholder="District" class="form-control"/></td>
                              <td><input type="text" value="<?php echo $res_personal["pa_pincode"] ?>" id="c_pa_pin" name="c_pa_pin" placeholder="Pincode" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><input type="text" value="<?php echo $res_personal["pa_phoneno"] ?>" id="c_pa_phno" name="c_pa_phno" placeholder="Phone" class="form-control"/></td>
                              <td><input type="text" value="<?php echo $res_personal["pa_mobno"] ?>" id="c_pa_mob" name="c_pa_mob" placeholder="Mobile" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td>Email Id</td>
                              <td><input type="text" value="<?php echo $res_personal["email_id"] ?>" id="c_email" name="c_email" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td>Category</td>
                              <td colspan="3"><input type="radio" id="gen_ur" value="GEN/UR[unreserved]" <?php if($res_personal["category"]=="GEN/UR[unreserved]"){ echo 'checked="checked"';} ?> name="c_cat">GEN/UR[unreserved]&nbsp;<input type="radio" <?php if($res_personal["category"]=="OBC(CL)"){ echo 'checked="checked"';} ?> id="obc_cl" value="OBC(CL)" name="c_cat">OBC(CL) &nbsp;<input type="radio" <?php if($res_personal["category"]=="OBC(SL)"){ echo 'checked="checked"';} ?> id="obc_sl" value="OBC(SL)" name="c_cat">OBC(SL) &nbsp;<input type="radio" <?php if($res_personal["category"]=="BL"){ echo 'checked="checked"';} ?> id="bl" value="BL" name="c_cat">BL &nbsp;<input type="radio" <?php if($res_personal["category"]=="ST"){ echo 'checked="checked"';} ?> id="st" value="ST" name="c_cat">ST &nbsp;<input type="radio" <?php if($res_personal["category"]=="SC"){ echo 'checked="checked"';} ?> id="sc" value="SC" name="c_cat">SC &nbsp;<input type="radio" <?php if($res_personal["category"]=="PT"){ echo 'checked="checked"';} ?> id="pt" value="PT" name="c_cat">PT<br/><input type="radio" <?php if($res_personal["category"]=="OBC(CL)(BPL)"){ echo 'checked="checked"';} ?> id="obc_cl_bpl" value="OBC(CL)(BPL)" name="c_cat">OBC(CL)(BPL)&nbsp;<input type="radio" <?php if($res_personal["category"]=="OBC(SL)(BPL)"){ echo 'checked="checked"';} ?> id="obc_sl_bpl" value="OBC(SL)(BPL)" name="c_cat">OBC(SL)(BPL) &nbsp;<input type="radio" <?php if($res_personal["category"]=="BL(BPL)"){ echo 'checked="checked"';} ?> id="bl_bpl" value="BL(BPL)" name="c_cat">BL(BPL) &nbsp;<input type="radio" <?php if($res_personal["category"]=="ST(BPL)"){ echo 'checked="checked"';} ?> id="st_bpl" value="ST(BPL)" name="c_cat">ST(BPL) &nbsp;<input type="radio" <?php if($res_personal["category"]=="SC(BPL)"){ echo 'checked="checked"';} ?> id="sc_bpl" value="SC(BPL)" name="c_cat">SC(BPL)</td>
                            </tr>
                            <tr>
                              <td>If you belong to BPL category</td>
                              <td><input type="text" value="<?php echo $res_personal["bpl_certificate_no"] ?>" id="c_bpl_cert_no" name="c_bpl_cert_no" placeholder="Certificate No." class="form-control"/></td>
                              <td><input type="text" value="<?php echo $res_personal["bpl_issuing_authority"] ?>" id="c_bpl_iss_aut" name="c_bpl_iss_aut" placeholder="Issuing Authority" class="form-control"/></td>
                              <td><input type="text" value="<?php echo $res_personal["bpl_issue_date"] ?>" id="c_bpl_iss_dt" name="c_bpl_iss_dt" placeholder="Date" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td>Whether any of the following category</td>
                              <td colspan="2"><input type="radio" <?php if($res_personal["other_category"]=="ESM"){ echo 'checked="checked"';} ?> id="esm" value="ESM" name="oth_cat">ESM &nbsp;<input type="radio" <?php if($res_personal["other_category"]=="PWD"){ echo 'checked="checked"';} ?> id="pwd" value="PWD" name="oth_cat">PWD &nbsp;<input type="radio" <?php if($res_personal["other_category"]=="SPAE"){ echo 'checked="checked"';} ?> id="spae" value="SPAE" name="oth_cat">SPAE &nbsp;<input type="radio" <?php if($res_personal["other_category"]=="NONE"){ echo 'checked="checked"';} ?> id="none" value="NONE" name="oth_cat">NONE</td>
                            </tr>
                            <tr>
                              <td>Sikkim Subject / Certificatetion</td>
                              <td><input type="text" value="<?php echo $res_personal["sikkim_certificate_id_no"] ?>" id="c_sc_id_no" name="c_sc_id_no" placeholder="Identification No." class="form-control"/></td>
                              <td><input type="text" value="<?php echo $res_personal["sikkim_certificate_issuing_authority"] ?>" id="c_sc_iss_aut" name="c_sc_iss_aut" placeholder="Issuing Authority" class="form-control"/></td>
                              <td><input type="text" value="<?php echo $res_personal["sikkim_certificate_district"] ?>" id="c_sc_dist" name="c_sc_dist" placeholder="District" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td>Valid Employee Card No</td>
                              <td><input type="text" value="<?php echo $res_personal["employee_card_no"] ?>" id="c_emp_card_no" name="c_emp_card_no" placeholder="Employee Card No." class="form-control"/></td>
                            </tr>
                          </table>
                      <?php 
                          if($res_personal_num!=0){
                            if($res_personal['personal_verif_status']==0 OR $res_personal['personal_verif_status']==2){?>
                               <center><input type="submit" id="update_personal" name="update_personal" value="Update" class="btn-primary"></center>
                      <?php } }?>
                    </form>                     
                </div>
                <!--personal end here-->
                <div id="Educational" class="tab-pane fade">
                  <div class="row"></div>
                  <?php  
                      $qry_education="SELECT * FROM `candidate_educational_details` where `application_no`='$appno'";
                      $sql_education=mysqli_query($conn, $qry_education);
                      $res_education_num=mysqli_num_rows($sql_education);
                      $res_education=mysqli_fetch_array($sql_education);                    
                      if($res_education['educational_verif_status']==1 OR $res_education['educational_verif_status']==3){
                        if($res_education['educational_verif_status']==1){?>
                         <div class="col-md-12">
                          <div class="alert alert-success text-center">
                            <strong >Educational Section is Verified  .</strong>
                          </div>
                          </div>
                  <?php }else{?>
                      <div class="col-md-12">
                          <div class="alert alert-danger text-center">
                            <strong > Appliaction Is Rejected .</strong>
                          </div>
                          </div>

                  <?php }}?>
                  <form action="update_educational_info.php" id="academic_info" enctype="multipart/form-data" method="post" role="form" novalidate>
                      <input type="hidden" name="appno" value="<?php echo $appno; ?>" />
                      <table class="table" id="education_table">
                         <tr>
                           <th>Sl. No.</th>
                           <th>Name of the Qualifying Exam</th>
                           <th>Upload Mark Sheet/Provisional Mark Sheet</th>
                           <th>Upload Certificate Qualifying Exam</th>
                          
                           <th>% obtained</th>
                           <th></th>
                         </tr>
                    <?php                        
                        $i=0;
                        $res_edu_qen=explode(',' , $res_edu['qualifying_exam_name']);
                        $res_edu_yop=explode(',' , $res_edu['month_year_of_passing']);
                        $res_edu_scn=explode(',' , $res_edu['school_college_name']);
                        $res_edu_bun=explode(',' , $res_edu['board_university_name']);
                        $res_edu_po=explode(',' , $res_edu['percntg_obtained']);
                          while($res_edu_qen[$i] && $res_edu_yop[$i] && $res_edu_scn[$i] && $res_edu_bun[$i] && $res_edu_po[$i]){
                    ?> 
                        <tr>
                          <td><?php echo $i+1;?>.</td>
                          <td><input type="text" value="<?php echo $res_edu_qen[$i];?>" id="qlfy_exam<?php echo $i+1;?>" name="qlfy_exam<?php echo $i+1;?>" class="form-control"></td>
                          <td><input type="text" value="<?php echo $res_edu_yop[$i];?>" id="yop<?php echo $i+1;?>" name="yop<?php echo $i+1;?>" class="form-control"></td>
                          <td><input type="text" value="<?php echo $res_edu_scn[$i];?>" id="skul_clg_name<?php echo $i+1;?>" name="skul_clg_name<?php echo $i+1;?>" class="form-control"></td>
                          <td><input type="text" value="<?php echo $res_edu_bun[$i];?>" id="board_name<?php echo $i+1;?>" name="board_name<?php echo $i+1;?>" class="form-control"></td>
                          <td><input type="text" value="<?php echo $res_edu_po[$i];?>" id="perc_obt<?php echo $i+1;?>" name="perc_obt<?php echo $i+1;?>" class="form-control"></td>
                          <td><button class="btn" id="edit<?php echo $i+1;?>" name="edit<?php echo $i+1;?>">Edit</button></td>
                        </tr>
                    <?php $i++;}?>
                      </table>
                      <table class="table">
                        <tr>
                          <td><b>Optional subjects opted for (no changes will be entertained)</b></td>
                          <td><input type="text" value="<?php echo $res_edu["optional_subject"];?>"  class="form-control"  id="opt_sub" name="opt_sub" /></td>
                        </tr>
                      </table>
                      <?php 
                            if($res_education_num!=0){
                              if($res_education['educational_verif_status']==0 OR $res_education['educational_verif_status']==2){?>
                                  <center><input type="submit" id="update_academic" name="update_academic" value="Update" class="btn-primary"></center>
                          <?php } } ?>
                  </form>
                </div>
                <!--education inform end here-->
                <div id="Employment" class="tab-pane fade">
                  <div class="row"></div>
                  <?php  
                      $qry_employment="SELECT * FROM `candidate_employment_details` where `application_no`='$appno'";
                      $sql_employment=mysqli_query($conn, $qry_employment);
                      $res_employment_num=mysqli_num_rows($sql_employment);
                      $res_employment=mysqli_fetch_array($sql_employment);                      
                      if($res_employment['employment_verif_status']==1 OR $res_employment['employment_verif_status']==3){
                        if($res_employment['employment_verif_status']==1){?>
                         <div class="col-md-12">
                          <div class="alert alert-success text-center">
                            <strong >Employment Section is Verified  .</strong>
                          </div>
                          </div>
                  <?php }else{?>
                      <div class="col-md-12">
                          <div class="alert alert-danger text-center">
                            <strong > Appliaction Is Rejected .</strong>
                          </div>
                          </div>
                  <?php }}?>
                  <form action="update_employment_info.php" id="emp_info" enctype="multipart/form-data" method="post" role="form" novalidate>
                      <input type="hidden" name="appno" value="<?php echo $appno; ?>" />
                      <table class="table">                      
                        <tr>
                          <td style="width:40%"><input type="text" value="<?php echo $res_emp["employment_card_no"] ?>" id="emp_card_no" name="emp_card_no" placeholder="Employment Card No." class="form-control"></td>
                          <td style="width:30%"><input type="text" value="<?php echo $res_emp["issuing_authority"] ?>" placeholder="Issuing Authority" class="form-control" id="emp_card_iss_aut" name="emp_card_iss_aut"></td>
                          <td style="width:30%"><input type="text" value="<?php echo $res_emp["issue_district"] ?>" placeholder="District" class="form-control" id="emp_card_dist" name="emp_card_dist"></td>
                           
                        </tr>
                        <tr>
                          <td>Whether employed</td>
                          <td><input type="radio" <?php if($res_emp["whether_employed"]=="yes"){ echo 'checked="checked"';} ?> id="wh_emp_y" value="yes" name="wh_emp">Yes &nbsp;<input type="radio" <?php if($res_emp["whether_employed"]=="no"){ echo 'checked="checked"';} ?> value="no" id="wh_emp_n"  name="wh_emp">No</td>                       
                        </tr>
                        <tr>
                          <td>Nature of employment (if employed)</td>
                          <td><input type="radio" <?php if($res_emp["employment_nature"]=="Regular"){ echo 'checked="checked"';} ?> id="noe_reg" value="Regular"  name="noe">Regular<br /><input type="radio" <?php if($res_emp["employment_nature"]=="Temporary Service[MR/Adhoc/WC]"){ echo 'checked="checked"';} ?> id="noe_ts" value="Temporary Service[MR/Adhoc/WC]" name="noe">Temporary Service[MR/Adhoc/WC]</td>            
                        </tr>
                        <tr>
                          <td>Name of the department (if employed)</td>
                          <td><input type="text" value="<?php echo $res_emp["employment_department"] ?>" id="emp_dep" name="emp_dep" class="form-control"></td>                       
                        </tr>
                        <tr>
                          <td>Age relaxation sought as employed under the State/Central Govt. Dept., etc. as mentioned in the advertisement</td>
                          <td><input type="radio" <?php if($res_emp["age_relaxation"]=="yes"){ echo 'checked="checked"';} ?> value="yes" id="age_rel_y"  name="age_rel">Yes &nbsp;<input type="radio" <?php if($res_emp["age_relaxation"]=="no"){ echo 'checked="checked"';} ?> value="no" id="age_rel_n" name="age_rel">No</td>                       
                        </tr>
                        <tr>
                          <td>Name of the Organization/Programmers/Projects</td>
                          <td><input type="text" value="<?php echo $res_emp["Org_prog_proj_name"] ?>" id="opp_name"  name="opp_name" class="form-control"></td>                       
                        </tr>
                      </table>
                      <?php 
                            if($res_employment_num!=0){
                              if($res_employment['employment_verif_status']==0 OR $res_employment['employment_verif_status']==2){?>
                                 <center><input type="submit" id="update_emp" name="update_emp" value="Update" class="btn-primary"></center>
                           <?php   }
                      } ?>

                  </form>
                </div>
                <div id="Upload" class="tab-pane fade">
                  <div class="row"></div>
                   <?php  
                      $qry_certificate="SELECT * FROM `candidate_certificate_uploads` where `application_no`='$appno'";
                      $sql_certificate=mysqli_query($conn, $qry_certificate);
                      $res_certificate_num=mysqli_num_rows($sql_certificate);
                      $res_certificate=mysqli_fetch_array($sql_certificate);                  
                      if($res_certificate['certificate_verif_status']==1 OR $res_certificate['certificate_verif_status']==3){
                        if($res_certificate['certificate_verif_status']==1){?>
                         <div class="col-md-12">
                          <div class="alert alert-success text-center">
                            <strong >Upload Certificate Section is Verified  .</strong>
                          </div>
                          </div>
                  <?php }else{?>
                      <div class="col-md-12">
                          <div class="alert alert-danger text-center">
                            <strong > Appliaction Is Rejected .</strong>
                          </div>
                          </div>
                  <?php }}?>
                   <form action="update_upload_info.php" id="upload_info" enctype="multipart/form-data" method="post" role="form" novalidate>
                      <input type="hidden" name="appno" value="<?php echo $appno; ?>" />
                      <input type="hidden" name="upd_cert_name1" value="<?php echo $res_upld["obc/bl/pt/st/sc_certificate_name"]; ?>" />
                      <input type="hidden" name="upd_cert_name2" value="<?php echo $res_upld["sikkim_coi_name"]; ?>" />
                      <input type="hidden" name="upd_cert_name3" value="<?php echo $res_upld["husband's_coi_name"]; ?>" />
                      <input type="hidden" name="upd_cert_name4" value="<?php echo $res_upld["father's_coi_name"]; ?>"/>
                      <input type="hidden" name="upd_cert_name5" value="<?php echo $res_upld["esm/spea/pwd_name"]; ?>"/>
                      <input type="hidden" name="upd_cert_name6" value="<?php echo $res_upld["mrg_certificate_name"]; ?>"/>
                         <table class="table">
                           <tr>
                              <th>Sl. No.</th>
                              <th>Particulars of Certificates submitted</th>
                              <th>Certificate Sl. No.</th>
                              <th>Issuing Authority</th>
                              <th>Upload</th>
                              <th>Download</th>
                           </tr>
                          <tr>
                            <td>1.</td>
                            <td>OBC (Central List)/OBC(State List)BL/PT/ST/SC Certificate</td>
                            <td><input type="text" id="cert_sl_no1" value="<?php echo $res_upld["obc/bl/pt/st/sc_certificate_sl_no"]; ?>" name="cert_sl_no1" class="form-control"></td>
                            <td><input type="text" value="<?php echo $res_upld["obc/bl/pt/st/sc_certificate_issuing_authority"]; ?>" id="cert_iss_aut1" name="cert_iss_aut1" class="form-control"></td>
                            <td><input type="file" id="cert_name1" name="cert_name1"></td>
                            <td>
                                <?php if(!empty($res_upld["obc/bl/pt/st/sc_certificate_name"])){?>
                                    <a target="_blank" href="uploads/certificates/obc_bl_pt_st_sc_certificate/<?php  echo $res_upld["obc/bl/pt/st/sc_certificate_name"]; ?>">Download</a>
                              <?php }else{?>
                                    <a href="#"><s>Download</s></a>
                              <?php } ?>
                            </td>
                          </tr>
                          <tr>
                            <td>2.</td><td>Sikkim Subject/Certificate of Identification</td>
                            <td><input type="text" value="<?php echo $res_upld["sikkim_coi_sl_no"]; ?>" id="cert_sl_no2" name="cert_sl_no2" class="form-control"></td>
                            <td><input type="text" value="<?php echo $res_upld["sikkim_coi_issuing_authority"]; ?>" id="cert_iss_aut2" name="cert_iss_aut2" class="form-control"></td>
                            <td><input type="file" id="cert_name2" name="cert_name2"></td>
                            <td>
                                <?php if(!empty($res_upld["sikkim_coi_name"])){?>
                                    <a target="_blank" href="uploads/certificates/Sikkim_Certificate_of_Identification/<?php  echo $res_upld["sikkim_coi_name"]; ?>">Download</a>
                              <?php }else{?>
                                  <a href="#"><s>Download</s></a>
                              <?php } ?>
                            </td>
                          </tr>
                          <tr>
                            <td>3.</td>
                            <td>In case of married female candidates husband's C.O.I</td>
                            <td><input type="text" value="<?php echo $res_upld["husband's_coi_sl_no"]; ?>" id="cert_sl_no3" name="cert_sl_no3" class="form-control"></td>
                            <td><input type="text" value="<?php echo $res_upld["husband's_coi_issuing_authority"]; ?>" id="cert_iss_aut3" name="cert_iss_aut3" class="form-control"></td>
                            <td><input type="file" id="cert_name3" name="cert_name3"></td>
                            <td>
                                <?php if(!empty($res_upld["husband's_coi_name"])){?>
                                    <a target="_blank" href="uploads/certificates/female_candidates_husbands_COI/<?php  echo $res_upld["husband's_coi_name"]; ?>">Download</a>
                              <?php }else{?>
                                  <a href="#"><s>Download</s></a>
                              <?php } ?>
                            </td>
                          </tr>
                          <tr>
                            <td>4.</td>
                            <td>In case of unmarried female candidates father's C.O.I</td>
                            <td><input type="text" value="<?php echo $res_upld["father's_coi_sl_no"]; ?>" id="cert_sl_no4" name="cert_sl_no4" class="form-control"></td>
                            <td><input type="text" value="<?php echo $res_upld["father's_coi_issuing_authority"]; ?>" id="cert_iss_aut4" name="cert_iss_aut4" class="form-control"></td>
                            <td><input type="file" id="cert_name4" name="cert_name4"></td>
                            <td>
                                <?php if(!empty($res_upld["father's_coi_name"])){?>
                                    <a target="_blank" href="uploads/certificates/candidates_fathers_COI/<?php  echo $res_upld["father's_coi_name"]; ?>">Download</a>
                              <?php }else{?>
                                  <a href="#"><s>Download</s></a>
                              <?php } ?>
                            </td>
                          </tr>
                          <tr>
                            <td>5.</td>
                            <td>Certificate of ESM/SPEA/PWD</td>
                            <td><input type="text" value="<?php echo $res_upld["esm/spea/pwd_sl_no"]; ?>" id="cert_sl_no5" name="cert_sl_no5" class="form-control"></td>
                            <td><input type="text" value="<?php echo $res_upld["esm/spea/pwd_issuing_authority"]; ?>" id="cert_iss_aut5" name="cert_iss_aut5" class="form-control"></td>
                            <td><input type="file" id="cert_name5" name="cert_name5"></td>
                            <td>
                                <?php if(!empty($res_upld["esm/spea/pwd_name"])){?>
                                    <a target="_blank" href="uploads/certificates/ESM_SPEA_PWD_certificates/<?php  echo $res_upld["esm/spea/pwd_name"]; ?>">Download</a>
                              <?php }else{?>
                                    <a href="#"><s>Download</s></a>
                              <?php } ?>
                            </td>
                          </tr>
                          <tr>
                            <td>6.</td>
                            <td>Marriage certificate issued by competent authority</td>
                            <td><input type="text" value="<?php echo $res_upld["mrg_certificate_sl_no"]; ?>" id="cert_sl_no6" name="cert_sl_no6" class="form-control"></td>
                            <td><input type="text" value="<?php echo $res_upld["mrg_certificate_issuing_authority"]; ?>" id="cert_iss_aut6" name="cert_iss_aut6" class="form-control"></td>
                            <td><input type="file" id="cert_name6" name="cert_name6" /></td>
                            <td>
                                <?php if(!empty($res_upld["mrg_certificate_name"])){?>
                                    <a target="_blank" href="uploads/certificates/Marriage_certificates/<?php  echo $res_upld["mrg_certificate_name"]; ?>">Download</a>
                              <?php }else{?>
                                      <a href="#"><s>Download</s></a>
                              <?php } ?>
                            </td>
                          </tr>                            
                        </table>
                        <?php 
                              if($res_certificate_num!=0){
                                if($res_certificate['certificate_verif_status']==0 OR $res_certificate['certificate_verif_status']==2){?>
                                  <center><input type="submit" id="update_uploads" name="update_uploads" value="Update" class="btn-primary"></center>
                        <?php   }
                              } ?>

                   </form>
                </div>
                <!-- Upload ENds Here-->
                <div id="Payment" class="tab-pane fade">
                 <div class="row"></div>
                  <?php  
                      $qry_payment="SELECT * FROM `candidate_payment_details` where `application_no`='$appno'";
                      $sql_payment=mysqli_query($conn, $qry_payment);
                      $res_payment_num=mysqli_num_rows($sql_payment);
                      $res_payment=mysqli_fetch_array($sql_payment);                  
                      if($res_payment['payment_verif_status']==1 OR $res_payment['payment_verif_status']==3){
                        if($res_payment['payment_verif_status']==1){?>
                         <div class="col-md-12">
                          <div class="alert alert-success text-center">
                            <strong >Upload Certificate Section is Verified  .</strong>
                          </div>
                          </div>
                  <?php }else{?>
                      <div class="col-md-12">
                          <div class="alert alert-danger text-center">
                            <strong > Appliaction Is Rejected .</strong>
                          </div>
                          </div>
                  <?php }}?>
                  <form action="update_payment_info.php" id="payment_info" enctype="multipart/form-data" method="post" role="form" novalidate>
                    <input type="hidden" name="appno" value="<?php echo $appno; ?>" />
                    <input type="hidden" name="upd_pmnt_rcpt" value="<?php echo $res_pmnt["bank_rcpt_doc_name"] ?>" />
                    <table class="table">
                      <tr>
                       <td>Details of fee remitted</td>
                       <td><input type="text" value="<?php echo $res_pmnt["bank_rcpt_no"] ?>" placeholder="Bank receipt No." id="bank_rcpt_no" name="bank_rcpt_no" class="form-control" /></td>
                       <td><input type="text" value="<?php echo $res_pmnt["payment_dt"] ?>" placeholder="Dated" id="pmnt_dt" name="pmnt_dt" class="form-control" /></td>
                       <td><input type="text" value="<?php echo $res_pmnt["payment_amount"] ?>" placeholder="Amount" id="pmnt_amount" name="pmnt_amount" class="form-control" /></td>
                       <td><input type="file" id="pmnt_rcpt_doc" name="pmnt_rcpt_doc" class="form-control"/></td>
                       <td>
                        <?php if(!empty($res_pmnt["bank_rcpt_doc_name"])){?>
                            <a target="_blank" href="uploads/candidate_payment_receipt/<?php echo $res_pmnt["bank_rcpt_doc_name"] ?>">Download Receipt</a>
                        <?php }else{?>
                            <a  href="#"><s>Download Receipt</s></a>
                        <?php }?>
                       </td>
                      </tr>                           
                    </table>
                    <?php 
                          if($res_payment_num!=0){
                            if($res_payment['payment_verif_status']==0 OR $res_payment['payment_verif_status']==2){?>
                                <center><input type="submit" id="update_payment" name="update_payment" value="Update" class="btn-primary"></center>
                    <?php } } ?>
                  </form>
                </div>
                <div id="Declaration" class="tab-pane fade">
                  <div class="row"></div>
                  <?php  
                      $qry_declaration="SELECT * FROM `candidate_declaration` where `application_no`='$appno'";
                      $sql_declaration=mysqli_query($conn, $qry_declaration);
                      $res_declaration_num=mysqli_num_rows($sql_declaration);
                      $res_declaration=mysqli_fetch_array($sql_declaration);                   
                      if($res_declaration['declaration_verif_status']==1 OR $res_declaration['declaration_verif_status']==3){
                        if($res_declaration['declaration_verif_status']==1){?>
                         <div class="col-md-12">
                          <div class="alert alert-success text-center">
                            <strong >Declaration Section is Verified  .</strong>
                          </div>
                          </div>
                  <?php }else{?>
                      <div class="col-md-12">
                          <div class="alert alert-danger text-center">
                            <strong > Appliaction Is Rejected .</strong>
                          </div>
                          </div>
                  <?php }}?>
                    <form action="update_declaration_info.php" id="declaration_info" enctype="multipart/form-data" method="post" role="form" novalidate>
                      <div class="row">

                        <div class="col-lg-10 col-lg-offset-1">
                          <input type="hidden" name="appno" value="<?php echo $appno; ?>" />
                          <input type="hidden" name="upd_sign_img" value="<?php echo $res_decl["signature"] ?>" />
                          <div class="row text-justify ">
                            
                              <p class="text-capitalize">I hereby declare that the information furnished above are true and correct to the best of my knowledge and belief. In case, any information furnished is found incorrect, incomplete before issue of admit card and or at any stage of examination, I undertake that my candidature is liable to be rejected.
                              </p>
                          
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="col-lg-5 form-inline">
                              <label >Place :- </label>
                                <input type="text" class="form-control" readonly="readonly" placeholder="Place" id="place" name="place" value="<?php echo $res_decl["place"] ?>"/>
                              </div>
                              <div class="col-lg-5 form-inline">
                              <label >Date of Submitted :-  </label>      <input type="text" class="form-control" readonly="readonly" placeholder="Date" id="decl_dt" name="decl_dt" value="<?php echo $res_decl["date"] ?>" />
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="col-lg-2">
                                <label>Upload Your Signature:-</label>
                              </div>
                              <div class="col-lg-3">
                                <input type="file" class="" id="sign" name="sign"  onChange="PreviewSign();" />
                              </div>
                              <div class="col-lg-6">
                                <img style="width: 264.3px;height: 79px;float: left;"  id="signpreview" name="signpreview" src="uploads/candidate_signature/<?php echo $res_decl["signature"] ?>" >
                              </div>
                            </div>
                          </div>         
                                 
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-lg-1"></div>
                        <div class="col-lg-10 text-center">
                        <?php 
                              if($res_declaration_num!=0){
                                if($res_declaration['declaration_verif_status']==0 OR $res_declaration['declaration_verif_status']==2){?>
                                     <input type="submit" id="update_declaration" name="update_declaration" value="Update" class="btn-primary">

                        <?php   }
                              }
                        ?>

                        </div>

                      </div>
                    </form>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>


  </div>


  <?php }else{?>
  <div class="col-md-12">
    <div class="alert alert-success text-center">
      <strong > Please Select The Exam For Applying Form</strong>
    </div>
  </div>
  <?php } ?>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once'template.php';
?>
<script>
$(document).ready(function() {
    if(location.hash) {
        $('a[href=' + location.hash + ']').tab('show');
    }
    $(document.body).on("click", "a[data-toggle]", function(event) {
        location.hash = this.getAttribute("href");
    });
});
$(window).on('popstate', function() {
    var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
    $('a[href=' + anchor + ']').tab('show');
});
</script>