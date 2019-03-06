<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
//if($_SESSION['user']=="verification@gmail.com")
if($_SESSION['final_verification_exam'])
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
  
  ?>
<div class="container">
  <h2>Application Form No:- <?php echo $_REQUEST["appno"]; ?></h2>
  <ul class="nav nav-pills nav-justified">
    <li class="active"><a data-toggle="tab" href="#Personal">Personal Info</a></li>
    <li><a data-toggle="tab" href="#Educational">Educational Info</a></li>
    <li><a data-toggle="tab" href="#Employment">Employment Info</a></li>
    <li><a data-toggle="tab" href="#Upload">Upload Certificate</a></li>     
    <li><a data-toggle="tab" href="#Payment">Payment Info</a></li>
    <li><a data-toggle="tab" href="#Declaration">Declaration</a></li>
    <li><a data-toggle="tab" href="#Conformation">Conformation</a></li>
  </ul>

  <div class="tab-content">
    <div id="Personal" class="tab-pane fade in active">
      <div class="col-md-8">
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
        
      </div>
     
       
    </div>
<!--end of Personal information-->
    <div id="Educational" class="tab-pane fade">
      <div class="col-md-12">
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
                        $res_edu_qen=explode(',', $res_edu['qualifying_exam_name']);
                        $mark_upload=explode(',', $res_edu['mark_upload']);
                      
                        $upload_cert=explode(',', $res_edu['upload_cert']);                       
                        $res_edu_po=explode(',', $res_edu['percntg_obtained']);
                       
                          while($res_edu_qen[$i] && $mark_upload[$i] && $upload_cert[$i] &&  $res_edu_po[$i]){
                    ?> 
                        <tr>
                          <td><?php echo $i+1;?>.</td>
                          <td><?php echo $res_edu_qen[$i];?></td>
                          <td>                          
                         <?php if(!empty(trim($mark_upload[$i]))){?>
                          <a target="_blank" class="btn-Primary" href="uploads/candidate_education/education_marks/<?php echo trim($mark_upload[$i]);?>" >View Mark Sheet</a>

                       <?php }else{?>
                         <a href="#"><s>View Mark Sheet</s></a>
                      <?php }?>
                          <input type="hidden" value="<?php echo $mark_upload[$i];?>" id="mark_upload<?php echo $i+1;?>" name="mark_uploads[]" class="form-control"></td>
                          <td>
                            
                          <?php if(!empty(trim($upload_cert[$i]))){?>
                          <a target="_blank" class="btn-Primary" href="uploads/candidate_education/education_cert/<?php echo trim($upload_cert[$i]);?>" >View Certificate</a>
                          <?php }else{?>
                             <a href="#"><s>View Certificate</s></a>
                            <?php } ?>
                         </td>
                          
                          <td><?php echo $res_edu_po[$i];?></td>
                          
                        </tr>
                    <?php $i++;}?>
                      </table>
        <table class="table">
          <tr>
            <td><b>Optional subjects opted for (no changes will be entertained)</b></td>
            <td><?php echo $res_edu["optional_subject"];?></td>
          </tr>
        </table>
      </div>
      
    </div>
<!-- Eduction section end here-->
    <div id="Employment" class="tab-pane fade">
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
         <tr>
        <td>N.O.C Certificate From Current Employer (If Employed)*</td>
        
        <td>
            <?php if(!empty(trim($res_emp['upload_noc']))){?>
          <a target="_blank" class="btn-Primary" href="uploads/candidate_noc/<?php echo trim($res_emp['upload_noc']);?>" >View Certificate</a>
          <input type="hidden" name="noc_certifcates" value="<?php echo trim($res_emp['upload_noc']);?>">
          <?php }else{?>
             <a href="#"><s>View Certificate</s></a>
            <?php } ?>
        </td>
        </tr>
      </table>
      
    </div>
<!--Employeement detail section end here-->
    <div id="Upload" class="tab-pane fade">
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
          <td><?php echo $res_upld["sikkim_coi_sl_no"]; ?></td>
          <td><?php echo $res_upld["sikkim_coi_issuing_authority"]; ?></td>
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
          <td>Candidates C.O.I</td>
          <td><?php echo $res_upld["candidates_coi_sl_no"]; ?></td>
          <td><?php echo $res_upld["candidates_coi_issuing_authority"]; ?></td>         
          <td>
          <?php if(!empty($res_upld["candidates_coi_name"])){?>
                <a target="_blank" href="uploads/certificates/candidates_COI/<?php  echo $res_upld["candidates_coi_name"]; ?>">Download</a>
          <?php }else{?>
                  <a href="#"><s>Download</s></a>
          <?php } ?>
          </td>
        </tr>
       
        <tr>
          <td>4.</td>
          <td>Certificate of ESM/SPEA/PWD</td>
          <td><?php echo $res_upld["esm/spea/pwd_sl_no"]; ?></td>
          <td><?php echo $res_upld["esm/spea/pwd_issuing_authority"]; ?></td>
          <td>
              <?php if(!empty($res_upld["esm/spea/pwd_name"])){?>
              <a target="_blank" href="uploads/certificates/ESM_SPEA_PWD_certificates/<?php  echo $res_upld["esm/spea/pwd_name"]; ?>">Download</a>
             <?php }else{?>
                  <a href="#"><s>Download</s></a>
          <?php } ?>
          </td>
        </tr>
        <tr>
        <td>5.</td>
          <td>Marriage certificate issued by competent authority</td>
          <td><?php echo $res_upld["mrg_certificate_sl_no"]; ?></td>
          <td><?php echo $res_upld["mrg_certificate_issuing_authority"]; ?></td>
          <td>
            <?php if(!empty($res_upld["mrg_certificate_name"])){?>
              <a target="_blank" href="uploads/certificates/Marriage_certificates/<?php  echo $res_upld["mrg_certificate_name"]; ?>">Download</a>
             <?php }else{?>
                  <a href="#"><s>Download</s></a>
          <?php } ?>
          </td>
        </tr> 
      </table>
      
    </div>
<!-- end of upload sectoion-->
    
    <div id="Payment" class="tab-pane fade">
        <table class="table">
          <tr>
            <td>Details of fee remitted</td>
            <td><?php echo $res_pmnt["bank_rcpt_no"] ?></td>
            <td><?php echo $res_pmnt["payment_dt"] ?></td>
           <td><?php echo $res_pmnt["payment_amount"] ?></td>
            <td><a target="_blank" href="uploads/candidate_payment_receipt/<?php echo $res_pmnt["bank_rcpt_doc_name"] ?>">Download Receipt</a></td>
         </tr>
         
        </table> 
        
    </div>
     <div id="Declaration" class="tab-pane fade">
      <div class="col-md-10">
        <p align="justify">I hereby declare that the information furnished above are true and correct to the best of my knowledge and belief. In case, any information furnished is found incorrect, incomplete before issue of admit card and or at any stage of examination, I undertake that my candidature is liable to be rejected.
        <div class="row">
        <div class="col-md-2">Place: </div>
         <div class="col-md-6"><?php echo $res_decl["place"] ?></div>
        </div>
        <div class="row">
        <div class="col-md-2">Date Of Submitted: </div>
         <div class="col-md-6"><?php echo $res_decl["date"] ?></div>
        </div>
        <div class="row">
          <div class="col-md-2">Candidate Signature: </div>
          <div class="col-md-3"> <img id="signpreview" height="100" width="200" name="signpreview" src="uploads/candidate_signature/<?php echo $res_decl['signature'] ?>"></div>
        </div>
          
      </div>
     
    </div>
     <div id="Conformation" class="tab-pane fade">     
      <p>I certify that the facts stated all the documents and statements are true and correct to the best of my knowledge and belief.</p>
     
        </div>
      </div>
    </div>
  </div>
</div>

<?php
}
$contents = ob_get_contents();
ob_clean();

include_once'template_data_table.php';
?>
