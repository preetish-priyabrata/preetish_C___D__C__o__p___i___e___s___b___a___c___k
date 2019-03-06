<?php
error_reporting(0);
ob_start();
session_start();
require 'FlashMessages.php';
include "config.php";
if($_SESSION['cand_user']){
 $qry_login="SELECT `candidate_id` FROM `candidate_login_info` WHERE `emailid`='$_SESSION[cand_user]'";
  $sql_login=mysqli_query($conn, $qry_login);
  $res_login=mysqli_fetch_array($sql_login);
  
  $qry_personal="SELECT * FROM `candidate_personal_details` where `candidate_id`='$res_login[candidate_id]'  ORDER BY `slno` DESC";
  $sql_personal=mysqli_query($conn, $qry_personal);
  $res_personal=mysqli_fetch_array($sql_personal);
  
  $qry_edu="SELECT * FROM `candidate_educational_details` where `candidate_id`='$res_login[candidate_id]' ORDER BY `slno` DESC";
  $sql_edu=mysqli_query($conn, $qry_edu);
  $res_edu=mysqli_fetch_array($sql_edu);
  $res_edunum=mysqli_num_rows($sql_edu);
  
  $qry_emp="SELECT * FROM `candidate_employment_details` where `candidate_id`='$res_login[candidate_id]' ORDER BY `slno` DESC";
  $sql_emp=mysqli_query($conn, $qry_emp);
  $res_emp=mysqli_fetch_array($sql_emp);

 $msg = new \Preetish\FlashMessages\FlashMessages();
   ?>
  <div class="text-center">
    <?php $msg->display(); ?>   
   </div>
  <script src="js/jquery.js"></script>
  <script>
 // $(document).ready(function(){
 //  $("#row_adder").click(function(){
 //    if($("#education_table tr").length <= 5){
 //    $("#education_table tbody").append('<tr> <td>'+$("#education_table tr").length+'.</td> <td><input type="text" id="qlfy_exam'+$("#education_table tr").length+'" name="qlfy_exam'+$("#education_table tr").length+'" class="form-control"></td> <td><input type="text" id="yop'+$("#education_table tr").length+'" name="yop'+$("#education_table tr").length+'" class="form-control"></td> <td><input type="text" id="skul_clg_name'+$("#education_table tr").length+'" name="skul_clg_name'+$("#education_table tr").length+'" class="form-control"></td> <td><input type="text" id="board_name'+$("#education_table tr").length+'" name="board_name'+$("#education_table tr").length+'" class="form-control"></td> <td><input type="text" id="perc_obt'+$("#education_table tr").length+'" name="perc_obt'+$("#education_table tr").length+'" class="form-control"></td> <td><button class="btn" id="remove'+$("#education_table tr").length+'" name="remove'+$("#education_table tr").length+'">Remove</button></td> </tr>');
 //    }
 //  });
 // });

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
      $(document).ready(function(){
        $(".rnotes").hide();
        $('input[type=radio]').change(function(){
            var isChecked = $(this).prop('checked');        
            var isShow = $(this).hasClass('xshow');
            $(".rnotes").toggle(isChecked && isShow);
        });
    });
      </script>
   <script>
            $(function () {
                /*$("#decl_dt").datepicker({
                     changeMonth: true,
                    changeYear: true,
          yearRange: "1980:2020",
          dateFormat: "yy-mm-dd" 
                });*/
         // $("#c_dob").datepicker({
     //                 changeMonth: true,
     //                changeYear: true,
          // yearRange: "1980:2020",
          // dateFormat: "yy-mm-dd" 
     //            });
                $('#c_dob').datepicker({
              onSelect: function(value, ui) {
                  var today = new Date(), 
                      dob = new Date(value), 
                      age = new Date(today - dob).getFullYear() - 1970;
                      //alert(age);
                  document.getElementById("c_age").value=age;
                  document.getElementById("c_age").readOnly = true;
                  //$('#c_age').text(age);
              },
              
              yearRange: '1980:2010',
              dateFormat: "yy-mm-dd",
              changeMonth: true,
              changeYear: true
          });
         $("#dop").datepicker({
                     changeMonth: true,
                    changeYear: true,
          yearRange: "1980:2020",
          dateFormat: "yy-mm-dd" 
                });
        $("#c_bpl_iss_dt").datepicker({
                     changeMonth: true,
                    changeYear: true,
          yearRange: "1980:2020",
          dateFormat: "yy-mm-dd" 
                });
        $("#pmnt_dt").datepicker({
                     changeMonth: true,
                    changeYear: true,
          yearRange: "1980:2020",
          dateFormat: "yy-mm-dd" 
                });
            });
        </script>
  <div class="col-lg-12">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <?php include'application_form_exam.php';?>
    </div>
    <div class="col-lg-4"></div>
  </div>

<?php
}else{
  header('location:logout.php');
}

$contents = ob_get_contents();
ob_clean();
include_once'template.php';
if($_SESSION['exam_selected']){
   $qry_check_appno="SELECT * FROM `candidate_application_info` WHERE `candidate_email`='$_SESSION[cand_user]' AND `exam_name`='$_SESSION[exam_selected]'";
  $sql_check_appno=mysqli_query($conn, $qry_check_appno);
    $num_rows=mysqli_num_rows($sql_check_appno);
    if($num_rows==0){
      while(1){        
        // generate unique random number
         $numbers = "0123456789";
         $appno = substr( str_shuffle( $numbers ), 0, 6 );
          
        // check if it exists in database
        $qry_check = "SELECT * FROM `candidate_application_info` WHERE `application_no`='$appno'";       
        $sql_check = mysqli_query($conn, $qry_check);         
         $rowCount = mysqli_num_rows($sql_check);      
        // if not found in the db (it is unique), break out of the loop
        if($rowCount < 1){
          break;
        }
      }
    
    }else{
      $res_check_appno=mysqli_fetch_array($sql_check_appno);
      $appno= $res_check_appno["application_no"];
    }
?>
    <div id="application" style="display:block"  class="col-lg-12">
      <legend><h3>Application Form No:-<?php echo $appno;?></h3></legend>
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
                <!--Personal Information add && Updated-->
                <div class="tab-content">
                  <div id="Personal" class="tab-pane fade in active">
                  <div class="row"></div>
                  <?php $qry_personal_mod="SELECT * FROM `candidate_personal_details` where `application_no`='$appno'";
                   $sql_personal_mod=mysqli_query($conn, $qry_personal_mod);
                   $res_personal_num=mysqli_num_rows($sql_personal_mod);
                   //$res_personal_mod=mysqli_fetch_array($sql_personal_mod); 
                   
                    if($res_personal_num!=0){?>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="alert alert-success text-center">
                            <strong >Personal Details submitted Successfully</strong>
                          </div>
                        </div>
                      </div>
                     <?php }?>
                    <form action="save_personal_info.php" id="personalinfo" enctype="multipart/form-data" method="post" role="form" >
                      <input type="hidden" id="appno1" name="appno1" value="<?php echo $appno;?>" />
                      <input type="hidden" id="exam1" name="exam1" value="<?php echo $_SESSION['exam_selected'];?>"/>
                      
                      <table class="table">            
                        <tr>
                          <td>Name</td>
                          <td><input type="text" class="form-control" value="<?php echo $res_personal["candidate_name"] ?>" id="c_name" name="c_name"></td>
                          <td style="width:15%"><input type="file" id="c_photo" name="c_photo"  onChange="PreviewImage();" class="form-control" required/></td>
                          <td>Upload Photo</td>
                          <td rowspan="3" align="center"><img src="uploads/candidate_photos/<?php echo $res_personal["candidate_photo"] ?>"  width="150"  height="150" id="photopreview" name="photopreview"></td>
                        </tr>
                        <tr>
                          <td>Father's Name</td>
                          <td><input type="text" class="form-control" value="<?php echo $res_personal["father's_name"] ?>" id="c_f_name" name="c_f_name"></td>
                        </tr>
                        <tr>
                          <td>Gender</td>
                          <td><input type="radio" id="male" class="xhide" value="male" <?php if($res_personal["gender"]=="male"){ echo "checked";} ?> name="gender">Male &nbsp;<input type="radio" id="female" class="xshow" value="female" <?php if($res_personal["gender"]=="female"){ echo "checked";} ?> name="gender">Female</td>
                        </tr>
                        <tr class="rnotes">
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
                          <?php 
                          $sql_category="SELECT * FROM category_table";
                          $qry_category=mysqli_query($conn,$sql_category);
                          ?>
                          <td colspan="3">
                          <?php while ($res_category=mysqli_fetch_array($qry_category)) {?>
                          
                          <input type="radio"  value="<?=$res_category['category_name']?>" <?php if($res_personal["category"]==$res_category['category_name']){ echo 'checked="checked"';} ?> name="c_cat"><?=$res_category['category_name']?>&nbsp;
                          <?php }?>
                          </td>
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
                  <!-- Personal information -->
                  <?php                    
                   if($res_personal_num==0){?>
                   
                   <center><input type="submit" id="save_personal" name="save_personal" value="Save" class="btn-primary"></center>
                   <?php }?>        

                    </form>
                  </div>
                  <div id="Educational" class="tab-pane fade">
                    <div class="row"></div>
                    <?php 
                        $qry_educations="SELECT * FROM `candidate_educational_details` where `application_no`='$appno'";
                        $sql_educations=mysqli_query($conn, $qry_educations);
                        $res_education_num=mysqli_num_rows($sql_educations);
                      //$res_personal_mod=mysqli_fetch_array($sql_personal_mod);                      
                      if($res_education_num!=0){?>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="alert alert-success text-center">
                              <strong >Educational Details submitted Successfully</strong>
                            </div>
                          </div>
                        </div>
                       <?php }?>
                    <form action="save_educational_info.php" id="academic_info" enctype="multipart/form-data" method="post" role="form" novalidate>
                        <input type="hidden" id="appno2" name="appno2" value="<?php echo $appno;?>" />
                        <input type="hidden" id="exam2" name="exam2" value="<?php echo $_SESSION['exam_selected'];?>"/>
                        
                            <table class="table" id="education_table">
                              <thead>
                                <tr>
                                  <th>Sl. No.</th>
                                  <th>Name of the Qualifying Exam</th>
                                  <th>Upload Mark Sheet/Provisional Mark Sheet </th>
                                  <th>Upload Certificate Qualifying Exam </th>                               
                                  <th>% Obtained</th>                                
                                </tr> 
                              </thead>
                             <?php for ($i=1; $i < 7; $i++) { ?>
                              <tr>
                                <td><?=$i?></td>
                                <td><input type="text" name="qlfy_exam[]" placeholder="Please Enter Name of the Qualifying Exam" class="form-control"></td>
                                <td><input id="" name="mark_upload[]" type="file" class="file-loading"  ></td>
                                <td><input id="" name="cer_upload[]" type="file" class="file-loading" ></td>                               
                                <td><input type="text" name="perc_obt[]" placeholder="Please Enter % Obtained" class="form-control"></td>
                              </tr>
                           <?php  }?>
                            </table>
                            <table class="table">
                              <tr>
                                <td><b style="color:orange">Optional subjects opted for (no changes will be entertained)</b></td>
                                <td><input type="text" id="opt_sub" name="opt_sub" class="form-control" /></td>
                              </tr>
                            </table>

                              <span style="color:red; float:left;"><b>Please Attach File In Pdf Format</b> </span>
                        <?php 
                          if($res_education_num==0){?>
                            <center><input type="submit" id="save_academic" name="save_academic" value="Submit" class="btn-primary"></center>
                            <?php }?>

                    </form>
                  </div>
                  <!--enductions end here-->
                  <!--Employeement-->
                  <div id="Employment" class="tab-pane fade">
                    <div class="row"></div>
                <?php 
                        $qry_employment_nu="SELECT * FROM `candidate_employment_details` where `application_no`='$appno'";
                   $sql_employment_nu=mysqli_query($conn, $qry_employment_nu);
                   $res_employment_num=mysqli_num_rows($sql_employment_nu);
                                    
                      if($res_employment_num!=0){?>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="alert alert-success text-center">
                              <strong >Employment Details submitted Successfully</strong>
                            </div>
                          </div>
                        </div>
                <?php }?>
                       <form action="save_employment_info.php" id="emp_info" enctype="multipart/form-data" method="post" role="form" novalidate>
                          <input type="hidden" id="appno3" name="appno3" value="<?php echo $appno;?>" />
                          <input type="hidden" id="exam3" name="exam3" value="<?php echo $_SESSION['exam_selected'];?>"/>
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
                            <tr>
                              <td>N.O.C Certificate From Current Employer *</td>
                              <td><input type="file" name="noc_certifcate" class="file-loading"></td>                               
                            </tr>
                          </table>
                        <?php if($res_employment_num==0){?>
                                <center><input type="submit" id="save_emp" name="save_emp" value="Submits" class="btn-primary"></center>
                        <?php }?>
                        </form>
                      </div>
                      <div id="Upload" class="tab-pane fade">
                    <div class="row"></div>
                <?php 
                       $qry_certificate="SELECT * FROM `candidate_certificate_uploads` where `application_no`='$appno'";
                   $sql_certificate=mysqli_query($conn, $qry_certificate);
                   $res_certificate_num=mysqli_num_rows($sql_certificate);                                   
                      if($res_certificate_num!=0){?>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="alert alert-success text-center">
                              <strong >Certificate Upload Details submitted Successfully</strong>
                            </div>
                          </div>
                        </div>
                <?php }?> 
                 <form action="save_upload_info.php" id="upload_info" enctype="multipart/form-data" method="post" role="form" novalidate>
                    <input type="hidden" id="appno4" name="appno4" value="<?php echo $appno;?>" />
                    <input type="hidden" id="exam4" name="exam4" value="<?php echo $_SESSION['exam_selected'];?>"/>
                    
                            <table class="table">
                              <tr>
                                <th>Sl. No.</th>
                                  <th>Particulars of Certificates submitted</th>
                                  <th>Certificate Sl. No.</th>
                                  <th>Issuing Authority</th>
                                  <th>Action</th>
                              </tr>
                    <?php
                        $arr_backup = array("Class X Marksheet","Class X Pass Certificate","Class XII Marksheet","Class XII Pass Certificate","Degree/Diploma Marksheet","Degree/Diploma Marksheet Pass Certificate","Post Graduate Marksheet","Post Graduate Certificate","OBC (Central List)/OBC(State List)BL/PT/ST/SC Certificate","Sikkim Subject/Certificate of Identification","If employed, NOC from the employer","Employment Card(Renewed)","Unmarried Certificate in case of female candidate (if necessary)","In case of married female candidates husband's C.O.I","In case of unmarried female candidates father's C.O.I","Certificate of ESM/SPEA/PWD");
                        $arr = array("OBC (Central List)/OBC(State List)BL/PT/ST/SC Certificate","Sikkim Subject/Certificate of Identification","Candidates C.O.I","Certificate of ESM/SPEA/PWD","Marriage certificate issued by competent authority");
                        for($i = 1; $i <= 5; $i++){
                          echo '<tr><td>'.$i.'.</td><td>'.$arr[$i-1].'</td><td><input type="text" id="cert_sl_no'.$i.'" name="cert_sl_no'.$i.'" class="form-control"/></td><td><input type="text" id="cert_iss_aut'.$i.'" name="cert_iss_aut'.$i.'" class="form-control"/></td><td><input type="file" id="cert_name'.$i.'" name="cert_name'.$i.'" ></td></tr>';
                        }
                    ?> 
                           </table>

                     <?php if($res_certificate_num==0){?>
                        <center><input type="submit" id="save_uploads" name="save_uploads" value="Submit" class="btn-primary"></center>
                    <?php }?>
                  </form>
                  </div>
                  <div id="Payment" class="tab-pane fade">
                     <div class="row"></div>
                <?php 
                       $qry_payment="SELECT * FROM `candidate_payment_details` where `application_no`='$appno'";
                   $sql_payment=mysqli_query($conn, $qry_payment);
                   $res_payment_num=mysqli_num_rows($sql_payment);                                   
                      if($res_payment_num!=0){?>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="alert alert-success text-center">
                              <strong >Payment Details submitted Successfully</strong>
                            </div>
                          </div>
                        </div>
                <?php }?>
                       <form action="save_payment_info.php" id="payment_info" enctype="multipart/form-data" method="post" role="form" > 
                          <input type="hidden" id="appno5" name="appno5" value="<?php echo $appno;?>" />
                          <input type="hidden" id="exam5" name="exam5" value="<?php echo $_SESSION['exam_selected'];?>"/>
                          <table class="table">
                          <thead>
                          <tr>
                          <th></th>
                          <th>Bank receipt No</th>
                          <th>Dated</th>
                          <th>Amount</th>
                          <th>Attach File</th>
                          </tr>
                          </thead>
                            <tr>
                             <td>Details of fee remitted</td>
                             <td><input type="text" placeholder="Bank receipt No." id="bank_rcpt_no" name="bank_rcpt_no" class="form-control" required /></td>
                             <td><input type="text" placeholder="Dated" id="pmnt_dt" name="pmnt_dt" class="form-control"  required/></td>
                             <td><input type="text" placeholder="Amount" id="pmnt_amount" name="pmnt_amount" class="form-control"  required/></td>
                             <td><input type="file" id="pmnt_rcpt_doc" name="pmnt_rcpt_doc" class="form-control" required/></td>
                             <td colspan="4">Upload Bank Receipt</td>
                           </tr>
                          </table>
                            <?php if($res_payment_num==0){?>
                        <center><input type="submit" id="save_payment" name="save_payment" value="Submit" class="btn-primary"></center>
                    <?php }?>
                       </form>
                    </div>
                    <div id="Declaration" class="tab-pane fade">
                    <div class="row"></div>
                <?php 
                       $qry_declaration="SELECT * FROM `candidate_declaration` where `application_no`='$appno'";
                   $sql_declaration=mysqli_query($conn, $qry_declaration);
                   $res_declaration_num=mysqli_num_rows($sql_declaration);                                  
                      if($res_declaration_num!=0){?>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="alert alert-success text-center">
                              <strong >Declaration Details submitted Successfully</strong>
                            </div>
                          </div>
                        </div>
                <?php }?>
                        <form action="save_declaration_info.php" id="declaration_info" enctype="multipart/form-data" method="post" role="form" >
                          <div class="col-md-10">
                            <div class="row">
                                <input type="hidden" id="appno6" name="appno6" value="<?php echo $appno;?>" />
                                <input type="hidden" id="exam6" name="exam6" value="<?php echo $_SESSION['exam_selected'];?>"/>
                                <p class="text-justify text-capitalize">I hereby declare that the information furnished above are true and correct to the best of my knowledge and belief. In case, any information furnished is found incorrect, incomplete before issue of admit card and or at any stage of examination, I undertake that my candidature is liable to be rejected.
                                </p>
                             </div>
                             <div class="row">
                               <div class="col-md-10">
                                  <input type="text" placeholder="Place" id="place" name="place" class="form-control" style="width:100px;float:left;" required/>
                                </div>
                                <input type="text" readonly="readonly" value="<?php echo date("Y/m/d"); ?>" id="decl_dt" name="decl_dt" class="form-control"style="width:100px;float:left;"/>
                              </div>
                              <div class="row">
                                <div class="col-lg-2">
                                 <label>Upload Your Signature</label> 
                                 </div>
                                <div class="col-lg-4">                   
                                   <input type="file" class="" id="sign" name="sign"  onChange="PreviewSign();" required/>
                                </div>
                                <div class="col-lg-4">
                                  <img  id="signpreview" style="width: 264.3px;height: 79px;float: left;" name="signpreview">
                                </div>                          
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                          <?php 
                                if($res_declaration_num==0){
                                     $qry_check_status="SELECT * FROM `candidate_application_submit_info` WHERE `candidate_email`='$_SESSION[cand_user]' And `application_no`='$appno'";
                                    $sql_check_status=mysqli_query($conn, $qry_check_status);
                                    $res_check_status=mysqli_fetch_array($sql_check_status);
                                    $row_no=mysqli_num_rows($sql_check_status);
                                    if($row_no!=0){
                                      if(($res_check_status["personal_info_submtd"]=="yes") && ($res_check_status["educational_info_submtd"]=="yes") && ($res_check_status["employment_info_submtd"]=="yes") && ($res_check_status["certificate_info_submtd"]=="yes") && ($res_check_status["payment_info_submtd"]=="yes")){?>
                                          <input type="submit" id="save_declaration" name="save_declaration" value="Confirm" class="btn-primary">
                                     <?php }else{?>
                                      <input type="button" id="save_declaration" name="save_declaration" onclick="alert('Please Fill All Sections  Information Before Submitting Declaration')" value="Confirm" class="btn-primary">

                                   <?php  }

                                    }else{?>
                                      <input type="button" id="save_declaration" name="save_declaration" onclick="alert('Please Fill The Form Then Submit Declaration ')" value="Confirm" class="btn-primary">

                                  <?php  }
                            }?>
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
<?php  }else{

    ?>
  <div class="col-md-12">
    <div class="alert alert-success text-center">
      <strong > Please Select The Exam For Applying Form</strong>
    </div>
  </div>
  
    <?php }?>
<script type="text/javascript">
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