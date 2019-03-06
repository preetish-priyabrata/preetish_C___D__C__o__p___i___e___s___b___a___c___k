<?php
session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
include '../config.php';
//$sl_no=$_GET['user_id'];
$msg = new \Preetish\FlashMessages\FlashMessages();
 $user_id=$_SESSION['email'];
 // personal
$query_personal="SELECT * FROM `master_personal_profile` WHERE `user_id`='$user_id'";
$sql_exe_personal=mysqli_query($conn,$query_personal);
$fetch_personal=mysqli_fetch_assoc($sql_exe_personal);
// family
$query_family="SELECT * FROM `master_family_Profile` WHERE `user_id`='$user_id'";
$sql_exe_family=mysqli_query($conn,$query_family);
$fetch_family=mysqli_fetch_assoc($sql_exe_family);
//Present Address
$query_present="SELECT * FROM `master_present_address_profile` WHERE `user_id`='$user_id'";
$sql_exe_present=mysqli_query($conn,$query_present);
$fetch_present=mysqli_fetch_assoc($sql_exe_present);
// permant
$query_permant="SELECT * FROM `master_permanent_address_profile` WHERE `user_id`='$user_id'";
$sql_exe_permant=mysqli_query($conn,$query_permant);
$fetch_permant=mysqli_fetch_assoc($sql_exe_permant);
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="alumni_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
      </div>
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
            <?php
                if(!empty($_SESSION['photo'])){?>
                  <img src="../upload/cadidate_reg_photo/<?php echo $_SESSION['photo']?>" class="profile-user-img img-responsive img-circle" alt="User Image">
                <?php }else{?>
              <img class="profile-user-img img-responsive img-circle" src="../assert/dist/img/avatar2.png" alt="User profile picture">
              <?php }?>
              <h3 class="profile-username text-center"><?=ucwords($_SESSION['name'])?></h3>

              <p class="text-muted text-center"><!-- Software Engineer --></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                <?php 
               
                //asked
                $query_qry="SELECT * FROM `master_queries_student` WHERE `s_user_id`='$user_id'";
                $sql_exe_qry=mysqli_query($conn,$query_qry);
                $no_ask_qry=mysqli_num_rows($sql_exe_qry);?>
                  <b>Query asked by me</b> <a class="pull-right"><?=$no_ask_qry?></a>
                </li>
                <li class="list-group-item">
                <?php 
                //query_replied
                //
                $query_qry_reply="SELECT * FROM `master_queries_student` WHERE `s_user_id`='$user_id' and `status_answer`='1'";
                $sql_exe_qry_reply=mysqli_query($conn,$query_qry_reply);
                $no_ask_qry_reply=mysqli_num_rows($sql_exe_qry_reply);
                ?>
                  <b>Query responsed by Admin</b> <a class="pull-right"><?=$no_ask_qry_reply?></a>
                </li>
                <li class="list-group-item">
                  <?php 
                //query_replied
                //
                $query_share="SELECT * FROM `user_sharing_info_details` WHERE `user_id`='$user_id' ";
                $sql_exe_share=mysqli_query($conn,$query_share);
                $no_ask_share=mysqli_num_rows($sql_exe_share);
                ?>
                  <b>Information Shared by me</b> <a class="pull-right"><?=$no_ask_share?></a>
                </li>
                <li class="list-group-item">
                 <?php 
                //query_replied
                //
                $query_share_info="SELECT * FROM `user_sharing_info_details` WHERE `user_id`='$user_id' and `status`='1'";
                $sql_exe_share_info=mysqli_query($conn,$query_share_info);
                $no_ask_share_info=mysqli_num_rows($sql_exe_share_info);
                ?>
                  <b>Informtion approved by admin</b> <a class="pull-right"><?=$no_ask_share_info?></a>
                </li>
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-calendar-check-o margin-r-5"></i> Year Passing</strong>

              <p class="text-muted">
               <?=$_SESSION['Year']?>
              </p>

              <hr>

              <strong><i class="fa fa-book margin-r-5"></i>Stream</strong>

              <p class="text-muted">
                <?=$_SESSION['Stream']?>
              </p>

              <hr>

              <strong><i class="fa fa-mobile margin-r-5"></i>Mobile</strong>

              <p>
              <?=$_SESSION['Mobile']?>
                <!-- <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span> -->
              </p>

              <hr>

              <strong><i class="fa fa-at margin-r-5"></i> Email Id</strong>

              <p><?=$_SESSION['email']?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Personal" data-toggle="tab">Personal Details</a></li>
              <li><a href="#Family" data-toggle="tab">Family Detail</a></li>
              <li><a href="#Present" data-toggle="tab">Present Address</a></li>
               <li><a href="#Permanent" data-toggle="tab">Permanent Address</a></li>
            </ul>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="Personal">
                <div class="row">
                  <div class="col-md-3">
                    <label>Current Occupation</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_personal['current_occupation']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_personal['current_occupation'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Designation</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_personal['designation']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_personal['designation'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Employer Name</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_personal['employer_name']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_personal['employer_name'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Mobile</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_personal['mobile_no']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_personal['mobile_no'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>LandLine</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_personal['land_Ph_no']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_personal['land_Ph_no'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Personal Mail</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_personal['email_id']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_personal['email_id'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Offical Mail</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_personal['official_email_id']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_personal['official_email_id'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Tribe</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_personal['tribe']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_personal['tribe'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Sports</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_personal['sports_participate']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_personal['sports_participate'];
                    }?>
                      
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <label>Co-Curricular</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_personal['co_curricular_activity']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_personal['co_curricular_activity'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Awards / Accolades</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_personal['awards']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_personal['awards'];
                    }?>
                      
                    </p>
                  </div>
                </div>

                 <div class="row">
                  <div class="col-md-3">
                    <label>Date Of Birth </label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_personal['DOB']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_personal['DOB'];
                    }?>
                      
                    </p>
                  </div>
                </div>

                 <div class="row">
                  <div class="col-md-3">
                    <label>Gender</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_personal['gender']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_personal['gender'];
                    }?>
                      
                    </p>
                  </div>
                </div>

                 <div class="row">
                  <div class="col-md-3">
                    <label>Alternative Mobile No </label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_personal['alter_mob']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_personal['alter_mob'];
                    }?>
                      
                    </p>
                  </div>
                </div>


               <div class="row">
                  <div class="text-center">
                    <a href="alumni_personal_profile_update.php" class="btn btn-success">Update Personal Information</a>
                  </div>
                </div>

                
              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="Family">
                <div class="row">
                  <div class="col-md-3">
                    <label>Father Name</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_family['father_name']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_family['father_name'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Occupation</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_family['father_occupation']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_family['father_occupation'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Designation</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_family['father_designation']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_family['father_designation'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Mobile No</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_family['father_mob_no']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_family['father_mob_no'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Land-Line No</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_family['father_land_ph_no']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_family['father_land_ph_no'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Mail Id</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_family['father_email']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_family['father_email'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Mother Name</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_family['mother_name']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_family['mother_name'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Mobile No</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_family['mother_mob_no']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_family['mother_mob_no'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Land-Line No</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_family['mother_land_ph_no']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_family['mother_land_ph_no'];
                    }?>
                      
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <label>Occupation</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_family['mother_occupation']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_family['mother_occupation'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Desination</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_family['mother_designation']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_family['mother_designation'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Mail Id</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_family['mother_email']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_family['mother_email'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="text-center">
                    <a href="alumni_family_profile_update.php" class="btn btn-success">Update Family Information</a>
                  </div>
                </div>


                
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="Present">
                <div class="row">
                  <div class="col-md-3">
                    <label>At</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_present['at']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_present['at'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Post</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_present['post']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_present['post'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Via</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_present['via']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_present['via'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Police Station</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_present['ps']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_present['ps'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>City</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_present['city']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_present['city'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>District</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_present['district']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_present['district'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Pin</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_present['pin']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_present['pin'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>State</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_present['state']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_present['state'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Zone</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_present['zone']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_present['zone'];
                    }?>
                      
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <label>Country</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_present['country']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_present['country'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Land-Line</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_present['land_ph_no']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_present['land_ph_no'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="text-center">
                    <a href="alumni_present_address_update.php" class="btn btn-success">Update Present Address</a>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="Permanent">
                <div class="row">
                  <div class="col-md-3">
                    <label>At</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_permant['at']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_permant['at'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Post</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_permant['post']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_permant['post'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Via</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_permant['via']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_permant['via'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Police Station</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_permant['ps']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_permant['ps'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>City</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_permant['city']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_permant['city'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>District</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_permant['district']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_permant['district'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Pin</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_permant['pin']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_permant['pin'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>State</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_permant['state']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_permant['state'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Zone</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_permant['zone']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_permant['zone'];
                    }?>
                      
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <label>Country</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_permant['country']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_permant['country'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Land-Line</label>
                  </div>
                  <div class="col-md-1">:</div><div class="col-md-8">
                    <p>
                    <?php 
                    if($fetch_permant['land_ph_no']==""){
                      echo "Information Not Available"; 
                    }else{
                        echo $fetch_permant['land_ph_no'];
                    }?>
                      
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="text-center">
                    <a href="alumni_permanent_address_update.php" class="btn btn-success">Update Permanent Address</a>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

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