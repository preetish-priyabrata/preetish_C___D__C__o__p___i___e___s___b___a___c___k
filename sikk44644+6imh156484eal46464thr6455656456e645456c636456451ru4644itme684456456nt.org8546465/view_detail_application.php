<?php 
ob_start();
include 'config.php';
session_start();
if($_SESSION['user_no']){
   $get_details1="SELECT * FROM `application_form` WHERE `candidate_mobile`='$_SESSION[user_no]'";
                        

  $sql_exe_res=mysqli_query($conn,$get_details1);
  $fetch_result=mysqli_fetch_assoc($sql_exe_res);
    require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<style type="text/css">
  .error{
    color: red;
  }
</style>
<script type="text/javascript">
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

</script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <!--  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<div class="container">
  <div class="col-md-12 col-sm-12">
        <?php $msg->display(); ?>
      </div>
<!--   <div class="row"> -->
    <form id="myform_details" method="POST" action="#" onSubmit="return validates();" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">Application Form No <?=$_SESSION['application_no'];?></div>
        <div class="card-body">
          <div class="row row-eq-height">
            
            <div class="col-sm-8">
              <fieldset style="border: 1px solid rebeccapurple; padding: 6px; margin-bottom: 11px;"><legend>Personal Information</legend>
              <!-- <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Upload Photo *</label>
                <div class="col-sm-6">
                  <input value="<?=$fetch_result['']?>" disabled type="file"  class="form-control-plaintext demoInputBox" id="c_photo" onChange="PreviewImage();"  name="candidate_photo" required=""> <span id="file_error"></span>
                </div>   
              </div> -->

              <div class="form-group row">
                
                <label for="candidate_name" class="col-sm-4 col-form-label">Mobile Noe * </label>
                <div class="col-sm-6"><?=$fetch_result['candidate_mobile']?>
                 
                </div>
              </div> 
              <div class="form-group row">
                
                <label for="candidate_name" class="col-sm-4 col-form-label">Candidate Name * </label>
                <div class="col-sm-6">
                  <input value="<?=$fetch_result['candidate_name']?>" disabled type="text" class="form-control" id="candidate_name" name="candidate_name" placeholder="Enter Name" required="">
                </div>
              </div> 

              <div class="form-group row">
                <label for="candidate_dob" class="col-sm-4 col-form-label">Date Of Birth * </label>
                <div class="col-sm-6">
                  <input value="<?=$fetch_result['candidate_dob']?>" disabled type="text" class="form-control" id="candidate_dob" name="candidate_dob" placeholder="MM/DD/YYYY" >
                </div>
              </div>
              <div class="form-group row">
                <label for="c_age" class="col-sm-4 col-form-label">Age * </label>
                <div class="col-sm-6">
                  <input value="<?=$fetch_result['c_age']?>" disabled type="text" class="form-control" id="c_age" name="c_age" placeholder="" >
                </div>
              </div>
               
              <div class="form-group row">
                <label for="candidate_father_name" class="col-sm-4 col-form-label">Father Name * </label>
                <div class="col-sm-6">
                  <input value="<?=$fetch_result['candidate_father_name']?>" disabled type="text" class="form-control" id="candidate_father_name" name="candidate_father_name" placeholder="Enter Father Name">
                </div>
              </div> 
              <div class="form-group row">
                
                <label for="gender" class="col-sm-4 col-form-label" >Gender * </label>
                <div class="col-sm-6">
                  <select disabled class="form-control" id="gender" name="gender" required>
                    <option value="">----</option>
                    <option value="male" <?php if($fetch_result['candidate_gender']=='male'){echo "selected";}?>>Male</option>
                    <option value="female" <?php if($fetch_result['candidate_gender']=='female'){echo "selected";}?> >Female</option>
                    <!-- <option value="transgender">Transgender</option> -->
                  </select>
                </div>
              
              </div> 
             <?php 
              if($fetch_result['candidate_gender']=='female'){?>
              <div class="form-group row">
                <label for="marred_status" class="col-sm-4 col-form-label">Marital Status * </label>
                <div class="col-sm-6">
                  <select disabled class="form-control" id="marred_status" onchange="marred_status_changes()" name="marred_status" required="">
                    <option value="">----</option>
                    <option value="1" <?php if($fetch_result['candidate_marital_status']=='1'){echo "selected";}?> >Unmarried</option>
                    <option value="2" <?php if($fetch_result['candidate_marital_status']=='2'){echo "selected";}?> >Married</option> 
                    <!-- <option value="3">Divorce</option>                  -->
                  </select>               
                </div>
              </div>
              <?php if($fetch_result['candidate_marital_status']=='2'){?>
              <div class="form-group row" >
                <label for="candidate_husband_name" class="col-sm-4 col-form-label">Husband Name * </label>
                <div class="col-sm-6">
                  <input value="<?=$fetch_result['candidate_husband_name']?>" disabled type="text" class="form-control" id="candidate_husband_name" name="candidate_husband_name" placeholder="Enter Husband Name">
                  <small id="emailHelp" class="form-text text-muted danger">If Married *</small>         
                </div>
              </div>
              <?php
              }
              if($fetch_result['candidate_marital_status']=='1'){?>
               <div class="form-group row">
                <label for="candidate_unmaried_certificate_no_status" class="col-sm-4 col-form-label">Unmarried certificate * </label>
                <div class="col-sm-6">
                  
                  <br>     
                  <input value="<?=$fetch_result['candidate_unmaried_certificate_no']?>" disabled type="text" class="form-control" id="candidate_unmaried_certificate_no" placeholder="Enter Unmarried Certificate No" name="candidate_unmaried_certificate_no">     
                  <small id="emailHelp" class="form-text text-muted">Unmarried certificate no In case of female candidate * </small>           
                </div>
              </div>
              <?php }
                 if($fetch_result['candidate_marital_status']=='2'){
              ?>
              <div class="form-group row">
                <label for="candidate_husbands_SSC_status" class="col-sm-4 col-form-label">Husband certificate COI/SSC * </label>
                <div class="col-sm-6">
                  
                  <br>     
                  <input value="<?=$fetch_result['candidate_husbands_SSC']?>" disabled type="text" class="form-control" id="candidate_husbands_SSC" placeholder="Enter Husbands COI/SSC" name="candidate_husbands_SSC">     
                  <small id="emailHelp" class="form-text text-muted">If married, husband COI/SSC * </small>           
                </div>
              </div>
              <?php 
                  }
            }?>
              <!-- <div class="form-group row">
                <label for="Employment_status" class="col-sm-4 col-form-label">Employment Status * </label>
                <div class="col-sm-6">
                  <select disabled class="form-control" id="Employment_status"  name="Employment_status" required="">
                    <option value="">----</option>
                    <option value="1" <?php if($fetch_result['Employment_status']=='1'){echo "selected";}?> >Yes</option>
                    <option value="2" <?php if($fetch_result['Employment_status']=='2'){echo "selected";}?> >No</option> 
                  </select>
                </div>
              </div> -->
               <div class="form-group row">
                <label for="Employment_no" class="col-sm-4 col-form-label">Employment Card No * </label>
                <div class="col-sm-6">
                  <input value="<?=$fetch_result['employment_card_no']?>" disabled type="text" class="form-control" id="Employment_no" name="Employment_no" placeholder="Enter Employment Card No" >
                  <small id="emailHelp" class="form-text text-muted">If Employment Employment Card No * </small> 
                </div>
              </div> 
            </fieldset>
           
            <fieldset style="border: 1px solid lightblue; padding: 6px; margin-bottom: 11px;"><legend>Sikkim Subject Information</legend>
              <!-- <div class="form-group row">
                <label for="sikkim_status_subject" class="col-sm-4 col-form-label">Sikkim Subject Status * </label>
                <div class="col-sm-6">
                  <select class="form-control" disabled="" id="sikkim_status_subject" onchange="Subject_status()" name="sikkim_status_subject" required="">
                    <option value="">----</option>
                    <option value="1" <?php if($fetch_result['sikkim_subject_no_status']=='1'){echo "selected";}?> >Yes</option>
                    <option value="2" <?php if($fetch_result['sikkim_subject_no_status']=='2'){echo "selected";}?> >No</option>             
                  </select>               
                </div>
              </div> -->
              <div class="form-group row" >
                <label for="sikkim_subject_no" class="col-sm-4 col-form-label">Sikkim Subject Certificate Id * </label>
                <div class="col-sm-6">
                 <input type="text" value="<?=$fetch_result['sikkim_subject_no']?>" disabled class="form-control" id="sikkim_subject_no" name="sikkim_subject_no" placeholder="Sikkim Subject Certificate Identification">              
                </div>
              </div>
            </fieldset>
            <fieldset style="border: 1px solid lightgreen; padding: 6px; margin-bottom: 11px;"><legend>Education Information</legend>
              <div class="form-group row">
                <label for="candidate_qualification" class="col-sm-4 col-form-label"> Min. Educational Qualification pertinent to advertised post * </label>
                <div class="col-sm-6">

                  <select disabled class="form-control" id="candidate_qualification" name="candidate_qualification" required="">
                    <option value="">----</option>
                    <?php 
                    $edu="SELECT * FROM `ilab_class` WHERE `status`='1'";
                    $sql_edu=mysqli_query($conn,$edu);
                    while($res_edu=mysqli_fetch_assoc($sql_edu)){
                    ?>
                    <option value="<?=$res_edu['slno_class']?>" <?php if($res_edu['slno_class']==$fetch_result['candidate_qualification']){ echo "selected";}?>><?=$res_edu['class_name']?></option>
                    <?php }?>
                  </select>               
                </div>
              </div>

              <div class="form-group row">
                <label for="diploma_status" class="col-sm-4 col-form-label">Diploma/ ITI * </label>
                <div class="col-sm-6">
                  <select disabled class="form-control" id="diploma_status"  name="diploma_status" required="">
                    <option value="">----</option>
                     <option value="1" <?php if($fetch_result['diploma_status']=='1'){echo "selected";}?> >Yes</option>
                    <option value="2" <?php if($fetch_result['diploma_status']=='2'){echo "selected";}?> >No</option> 
                  </select>
                </div>
              </div>
               
            </fieldset>            
            <fieldset style="border: 1px solid lightblue; padding: 6px; margin-bottom: 11px;"><legend>Basic Information</legend>                      
              <div class="form-group row" >
                <label for="candidate_belongs_cat" class="col-sm-4 col-form-label">Candidate belongs to the category * </label>
                <div class="col-sm-6">
                   <select disabled class="form-control" id="candidate_belongs_cat"  name="candidate_belongs_cat" required="">
                    <option value="">----</option>
                    <option value="Gen" <?php if($fetch_result['candidate_belongs_cat']=='Gen'){echo "selected";}?> > UN-Reserved</option>
                    <option value="OBCCL" <?php if($fetch_result['candidate_belongs_cat']=='OBCCL'){echo "selected";}?> > OBC CL</option> 
                    <option value="OBCSL" <?php if($fetch_result['candidate_belongs_cat']=='OBCSL'){echo "selected";}?> > OBC SL</option>
                    <option value="BL" <?php if($fetch_result['candidate_belongs_cat']=='BL'){echo "selected";}?> > BL</option>
                    <option value="ST" <?php if($fetch_result['candidate_belongs_cat']=='ST'){echo "selected";}?> > ST</option> 
                    <option value="SC" <?php if($fetch_result['candidate_belongs_cat']=='SC'){echo "selected";}?> > SC</option>
                    <option value="PT" <?php if($fetch_result['candidate_belongs_cat']=='PT'){echo "selected";}?> > PT</option>
                                    
                  </select> 
                               
                </div>
                </div>

                <div class="form-group row">
                <label for="candidate_certificate_cat" class="col-sm-4 col-form-label">Castes Certificate No  * </label>
                <div class="col-sm-6">
                  <input value="<?=$fetch_result['candidate_certificate_cat']?>" disabled type="text" class="form-control" id="candidate_certificate_cat" name="candidate_certificate_cat" placeholder="Enter Castes Certificate No" required="">
                </div>
              </div>
              <div class="form-group row">
                <label for="spae_status" class="col-sm-4 col-form-label">SPAE Status * </label>
                <div class="col-sm-6">                
                  <select disabled class="form-control" id="spae_status"  name="spae_status" required="">
                    <option value="">----</option>
                    <option value="1" <?php if($fetch_result['spae_status']=='1'){echo "selected";}?> >Yes</option>
                    <option value="2" <?php if($fetch_result['spae_status']=='2'){echo "selected";}?> >No</option> 
                  </select>
                </div>
              </div>                 
               <div class="form-group row">
                <label for="spae_no" class="col-sm-4 col-form-label">SPAE Certificate No </label>
                <div class="col-sm-6">
                  <input value="<?=$fetch_result['spae_no']?>" disabled type="text" class="form-control" id="spae_no" name="spae_no" placeholder="Enter SPAE Certificate No" >
                  <small id="emailHelp" class="form-text text-muted">If SPAE (Sports Persons and Artisans with Excellence) Certificate No * </small> 
                </div>
              </div>               
            </fieldset>
           
            <fieldset style="border: 1px solid lightblue; padding: 6px; margin-bottom: 11px;"><legend>Candidate Category</legend>
              <div class="form-group row">
                <label for="applying_status" class="col-sm-4 col-form-label">Whether the candidate applying under * </label>
                <div class="col-sm-6">
                  <select disabled class="form-control" id="applying_status" onchange="Subject_status()" name="applying_status" required="">
                    <option value="">----</option>
                    <option value="1" <?php if($fetch_result['candidate_category']=='1'){echo "selected";}?> >BPL</option>
                    <option value="2" <?php if($fetch_result['candidate_category']=='2'){echo "selected";}?> >PWD</option>  
                    <option value="3" <?php if($fetch_result['candidate_category']=='3'){echo "selected";}?> >ExServiceman</option>                
                  </select>               
                </div>
              </div>             
              <div class="form-group row">
                <label for="BPL_No" class="col-sm-4 col-form-label">BPL certificate Issued by DES & ME</label>
                <div class="col-sm-6">
                 <input value="<?=$fetch_result['candidate_bpl_card_no']?>" disabled type="text" class="form-control" id="BPL_No" name="BPL_No" placeholder="Enter BPL No">  <small id="emailHelp" class="form-text text-muted danger">If BPL The candidate should mention the certificate issued by DES & ME different stating for employment only *</small>         
                </div>
              </div>
               <div class="form-group row" >
                <label for="pwd_card_no" class="col-sm-4 col-form-label">PWD Card no issued by SJ & WD </label>
                <div class="col-sm-6">
                 <input value="<?=$fetch_result['pwd_card_no']?>" disabled type="text" class="form-control" id="pwd_card_no" name="pwd_card_no" placeholder="Enter PWD Card No">     
                  <small id="emailHelp" class="form-text text-muted">If PWD The Candidate should mention the card no issued by SJ & WD * </small>  
                  <br>     
                  <select disabled class="form-control" id="pwd_name_id" onchange="Subject_status()" name="pwd_name_id" >
                    <option value="">----</option>
                    <option value="Low Vision" <?php if($fetch_result['pwd_name_id']=='Low Vision'){echo "selected";}?> >Low Vision</option>
                    <option value="Hearing Imparement" <?php if($fetch_result['pwd_name_id']=='Hearing Imparement'){echo "selected";}?> >Hearing Imparement</option>  
                    <option value="Celebral Plassy" <?php if($fetch_result['pwd_name_id']=='Celebral Plassy'){echo "selected";}?> >Celebral Plassy</option>                
                  </select>            
                </div>
              </div>

              <div class="form-group row">
                <label for="candidate_driving_licence_no_status" class="col-sm-4 col-form-label">Applying For Driver * </label>
                <div class="col-sm-6">
                  <select disabled class="form-control" id="candidate_driving_licence_no_status"  name="candidate_driving_licence_no_status" required="">
                    <option value="">----</option>
                   <option value="1" <?php if($fetch_result['candidate_driving_licence_no_status']=='1'){echo "selected";}?> >Yes</option>
                    <option value="2" <?php if($fetch_result['candidate_driving_licence_no_status']=='2'){echo "selected";}?> >No</option>
                  </select>               
                </div>
              </div>
              <div class="form-group row">
                <label for="candidate_driving_licence_no" class="col-sm-4 col-form-label">Latest Driving Licence No</label>
                <div class="col-sm-6">
                 <input value="<?=$fetch_result['candidate_driving_licence_no']?>" disabled type="text" class="form-control" id="candidate_driving_licence_no" name="candidate_driving_licence_no" placeholder="Enter Driving Licence No">  <small id="emailHelp" class="form-text text-muted danger">If Candidate Applying For Driver, Latest Driving Licence No *</small>         
                </div>
              </div>
            </fieldset>
           
         
             
             <fieldset style="border: 1px solid lightblue; padding: 6px; margin-bottom: 11px;"><legend>Basic Information</legend>
              <div class="form-group row" >
                <label for="candidate_present_address" class="col-sm-4 col-form-label">Present Address * </label>
                <div class="col-sm-6">
                  <textarea class="form-control" rows="5" id="candidate_present_address" placeholder="Enter Address Of Communication" name="candidate_present_address" required="" disabled=""><?=$fetch_result['candidate_present_address']?></textarea>  
                   <!-- <small id="emailHelp" class="form-text text-muted">Present Address Same As Permanet Address. * </small>   <input value="<?=$fetch_result['']?>" disabled type="checkbox" onclick="FillBilling(this.form)" name="billingtoo">   -->       
                </div>
                
                  
                </div>
                <div class="form-group row">
                <label for="candidate_permanent_address" class="col-sm-4 col-form-label">Permanent Address * </label>
                <div class="col-sm-6">
                 <textarea class="form-control" rows="5"  name="candidate_permanent_address" disabled="" id="candidate_permanent_address" placeholder="Enter Permanent Address" required=""><?=$fetch_result['candidate_permanent_address']?></textarea>
                </div>
              </div>
              
            </fieldset>
            </div>
            <div class="col-sm-4 pull-right">

                <img src="images/photo/<?=$fetch_result['candidate_photo']?>"  width="150"  height="180" id="photopreview" name="photopreview"><br>
                <label>Candidate Photo</label>
              </div>
              <div class="row">
              <div class="col-sm-8">
              <fieldset style="border: 1px solid rebeccapurple; padding: 6px; margin-bottom: 11px;">
                <legend>Self Declaration </legend>
                <div class="form-group row">
                  <label class="col-sm-1 col-form-label"></label>
                  <div class="col-sm-10">
                    <input checked disabled type="checkbox" required="" class="form-check-input" name="">
                    <p class="text-justify text-capitalize">I hereby declare that the information furnished above are true and correct to the best of my knowledge and belief. In case, any information furnished is found incorrect, incomplete before issue of admit card and or at any stage of examination, I undertake that my candidature is liable to be rejected. <br>
                      
                      <strong class="pull-right">Date : <?=$fetch_result['date']?></strong>
                    </p>
                  </div>
                  
                </div>
              </fieldset>
            </div>
            <div class="col-sm-4 pull-right">
               <!--  <img src="images/sign/<?=$fetch_result['signature_FILE']?>"  width="200"  height="100" id="signpreview" name="signpreview"><br>
                <label>Candiadte signature</label> -->
              </div>
            </div>
               <div class="col-sm-8">
                 <!--  <fieldset style="border: 1px solid rebeccapurple; padding: 6px; margin-bottom: 11px;"><legend>Candiadte signature </legend>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Scan signature *</label>
                    <div class="col-sm-6">
                      <input value="<?=$fetch_result['']?>" disabled type="file"  class="form-control-plaintext" id="sign" onChange="PreviewSign();"  name="signature" required="">
                    </div>   
                  </div>
                </fieldset> -->
              </div>
               
              
              <div class="col-md-12">
                
              </div>
            </div>

          </div>
      </div>
        <div class="card-footer">
          <div class="col-sm-offset-8 col-sm-12 text-center">
           <a href="user_dashboard" class="btn btn-success"> Back</a>
             <!-- <input value="<?=$fetch_result['']?>" disabled type="submit" name="submit" id="save" class="btn btn-success" value="Submit">
 -->         </div>
       </div>
      </div>
      
      <!-- <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input value="<?=$fetch_result['']?>" disabled type="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
      </div> -->
    </form>
    
  <!-- </div> -->
</div>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->



<?php 
}else{
  header('Location:logout');
  exit;
}
$content_details = ob_get_contents();
ob_clean();
include 'template1.php';

?>
