<?php
// print_r($_REQUEST);
// exit;
// Array ( [slno] => 1 ) 
session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="View Candidate Application Form List";
 $slno=$_GET['slno'];

?>
<style type="text/css">
  .row-eq-height {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display:         flex;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Candidate Application Form</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Candidate Application Form System</li>
				<li class="active">Application Form List</li>
			</ul>
		</div>
	</div>
	
	<!-- /Page Header-->
<div class="container-fluid page-content">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<!-- Basic inputs -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">View Application Form</div>
				</div>
				<div class="panel-body">
			<form class="form-horizontal" id="reli" action="#" method="POST" enctype="multipart/form-data">
	         <?php
	            $query = "SELECT * FROM `application_form` where `slno`='$slno'";
	            $query_exe = mysqli_query($conn,$query);
	            if(mysqli_num_rows($query_exe)){
	              $rec=mysqli_fetch_array($query_exe);  
	            ?>


			<input type="hidden" name="slno" value="<?php echo  $rec ['slno'] ;?>">
	

            <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="candidate_name">Candidate Name :</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="candidate_name" value="<?php echo  $rec['candidate_name'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

           
            <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="candidate_father_name">Father Name :</label>
              <div class="col-md-8">
                 <input type="text" class="form-control" name="candidate_father_name" value="<?php echo  $rec['candidate_father_name'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

           
            <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="candidate_husband_name">Husband Name :</label>
              <div class="col-md-8">
               <input type="text" class="form-control"  name="candidate_husband_name" value="<?php echo  $rec['candidate_husband_name'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

        
            <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="candidate_dob">Date Of Birth :</label>
              <div class="col-md-8">
                 <input type="text" class="form-control"  name="candidate_dob" value="<?php echo  $rec['candidate_dob'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div> 
            <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="candidate_present_address">Present Address :</label>
                <div class="col-md-8">
                	<textarea class="form-control"  name="candidate_present_address"> <?php echo  $rec['candidate_present_address'] ;?></textarea>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="candidate_permanent_address">Permanent Address :</label>
               <div class="col-md-8">
                 <textarea class="form-control"  name="candidate_permanent_address"> <?php echo  $rec['candidate_permanent_address'] ;?></textarea>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="candidate_qualification">Qualification :</label>
               <div class="col-md-8">
                 <input type="text" class="form-control"  name="candidate_qualification" value="<?php echo  $rec['candidate_qualification'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="candidate_driving_licence_no">Driving Licence No :</label>
               <div class="col-md-8">
                 <input type="text" class="form-control"  name="candidate_driving_licence_no" value="<?php echo  $rec['candidate_driving_licence_no'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="candidate_belongs_cat">Candidate Belongs To :</label>
               <div class="col-md-8">
                 <input type="text" class="form-control"  name="candidate_belongs_cat" value="<?php echo  $rec['candidate_belongs_cat'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
              <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="candidate_gender">Gender :</label>
               <div class="col-md-8">
                 <input type="text" class="form-control"  name="candidate_gender" value="<?php echo  $rec['candidate_gender'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
              <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="candidate_category">Candidate Category :</label>
               <div class="col-md-8">
                 <input type="text" class="form-control"  name="candidate_category" value="<?php echo  $rec['candidate_category'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="cadidate_bpl_category_list">Candidate BPL Category List :</label>
               <div class="col-md-8">
                 <input type="text" class="form-control"  name="cadidate_bpl_category_list" value="<?php echo  $rec['cadidate_bpl_category_list'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="candidate_bpl_card_no">Candidate BPL No :</label>
               <div class="col-md-8">
                 <input type="text" class="form-control"  name="candidate_bpl_card_no" value="<?php echo  $rec['candidate_bpl_card_no'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
              <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="candidate_unmaried_certificate_no">Unmarried Certificate No :</label>
               <div class="col-md-8">
                 <input type="text" class="form-control"  name="candidate_unmaried_certificate_no" value="<?php echo  $rec['candidate_unmaried_certificate_no'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="candidate_husbands_SSC">Candidate Husbands SSC/COI No :</label>
               <div class="col-md-8">
                 <input type="text" class="form-control"  name="candidate_husbands_SSC" value="<?php echo  $rec['candidate_husbands_SSC'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="candidate_devorce_certificate">Candidate Divorce Certificate No :</label>
               <div class="col-md-8">
                 <input type="text" class="form-control"  name="candidate_devorce_certificate" value="<?php echo  $rec['candidate_devorce_certificate'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="branch_name">Employment Card No :</label>
               <div class="col-md-8">
                 <input type="text" class="form-control"  name="candidate_name" value="<?php echo  $rec['candidate_husbands_SSC'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="employment_card_no">Category Certificate No :</label>
               <div class="col-md-8">
                 <input type="text" class="form-control"  name="employment_card_no" value="<?php echo  $rec['employment_card_no'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-4 text-right" for="applying_post_for">Applying Post For :</label>
               <div class="col-md-8">
                 <input type="text" class="form-control"  name="applying_post_for" value="<?php echo  $rec['applying_post_for'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

             <?php  
            }
          }
            ?>

          </form>
					</div>
				</div>						
			</div>
		</div>
	</div>

<?php
}else{
	header('Location:logout');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';

?>

