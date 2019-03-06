<?php

include_once './protected.php';
include '../class/DbConnection.php';
include '../class/Message.php';
include '../class/Admin.php';
$msg= new Message();
$adm= new Admin();

ob_start();
$title="addCompanyVisit";


if(isset($_POST['addCompanyVisit'])){
    $company= $_POST['company'];
    $date= $_POST['date'];
    $program= $_POST['program'];
    $yop= $_POST['yop'];
    $dop= $_POST['dop'];
    $per10= $_POST['per10'];
    $per12= $_POST['per12'];
    $perIti= $_POST['perIti'];
    $perDip= $_POST['perDip'];
    $gender= $_POST['gender'];
    $age= $_POST['age'];
    $age= $age[0]."-".$age[1];
    $preferrence= $_POST['preferrence'];
    $name_companyperson= $_POST['name_companyperson'];
    $contact_companyperson= $_POST['contact_companyperson'];
    $name_consultancyperson= $_POST['name_consultancyperson'];
    $contact_consultancyperson= $_POST['contact_consultancyperson'];
    $res= $adm->addCompanyVisit($company,$date,$program,$yop,$dop,$per10,$per12,$perIti,
            $perDip,$gender,$age,$preferrence,$name_companyperson,$contact_companyperson,$name_consultancyperson,
            $contact_consultancyperson);
    if($res){
        $msg->successMessage("Schedule For New Campus Drive Added Successfully.");
    }  else {
        $msg->errorMessage("Error!! Please Try It Again");
    }
}
?>
<script src="../js/formElementChange.js"></script>

<div class="row">
  <div class="col-lg-12">
    <h1>Form <small>Add Company Visit</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="fa fa-edit"></i> Add Visit Information</li>
    </ol>
  </div>
</div>
<!-- /.row -->


<div class="row">
<div class="col-lg-6">
<form role="form" method="post">
	
    <div class="form-group">
    <label>Company</label>
    <input type="text" name="company" class="form-control">
    </div>
    
    <div class="form-group">
    <label>Visit Date</label>
    <input type="text" name="date" class="form-control">
    </div>
    
    <div class="form-group">
    <label>Program</label>
    <select name="program" onchange="viewEligibility(this.value);" class="form-control">
                <option value="0">Select Program</option>
                <option value="iti">ITI</option>
                <option value="diploma">DIPLOMA</option>
    </select>
    </div>
    
    <div class="form-group">
    <label>Pass Year</label>
    <input type="text" name="yop" class="form-control">
    </div>
    
    <div class="form-group">
    <label>Publication On</label>
    <input type="text" name="dop" class="form-control">
    </div>
    
    <div class="form-group">
    <label>Eligibility</label><br />
    <label>10TH<input type="text" name="per10" class="form-control" size="13"  ></label>
    <label>ITI<input type="text" name="perIti" class="iti form-control" size="13"></label>
    <label>12TH<input type="text" name="per12" class="diploma form-control"size="13" ></label>
    <label>DIPLOMA<input type="text" name="perDip" class="diploma form-control" size="13">
    </label>
    </div>
    
    <div class="form-group">
    <label>Gender</label> &nbsp; &nbsp;
    <label><input type="radio" name="gender" value="Male" class="radio-inline">Male</label>
    <label><input type="radio" name="gender" value="Female" class="radio-inline">Female</label>
    <label><input type="radio" name="gender" value="All" class="radio-inline">Both</label>
    
    </div>
    
    <div class="form-group">
    <label>Age Limit &nbsp;</label>
    <label><input type="text" name="age[]" size="28" class="form-control"></label> to
    <label><input type="text" name="age[]" size="28" class="form-control"></label>
    </div>
    
    <div class="form-group">
    <label>Preference</label>
    <select name="preferrence" class="form-control">
        <option>Preference</option>
        <?php
        $res= $adm->fetchPreferrencelist();
        while($row= mysqli_fetch_array($res)){
            echo "<option value= '$row[trng_id]'>".$row['trng_about']."</option>";
        }
        ?>
    </select>
    </div>
    
    <div class="form-group">
    <label>Company Contact</label>
    <input type="text" name="name_companyperson" class="form-control">
    </div>
    
    <div class="form-group">
    <label>Phone</label>
    <input type="text" name="contact_companyperson" class="form-control">
    </div>
    
    <div class="form-group">
    <label>Consultancy Contact</label>
    <input type="text" name="name_consultancyperson" class="form-control">
    </div>
    
    <div class="form-group">
    <label>Phone</label> 
    <input type="text" name="contact_consultancyperson" class="form-control">
    </div>
    
    <div class="form-group">
    <label><input type="submit" name="addCompanyVisit" class="btn btn-primary" value="Post"></label>
    </div>
    
</form>

</div>
</div>
</div>
<?php $pageContent= ob_get_contents();
ob_get_clean();
include 'forms_template.php'; ?>
