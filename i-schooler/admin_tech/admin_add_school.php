<?php
session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<style type="text/css">
  div.demo{
    position: relative;
    width: 100%;
    min-height: auto;
    overflow-y: hidden;
    background: url("../assert/img/bg-pattern.png"), #7b4397;
    /* fallback for old browsers */
    background: url("../assert/img/bg-pattern.png"), -webkit-linear-gradient(to left, #32CD32, #dc2430);
    /* Chrome 10-25, Safari 5.1-6 */
    background: url("../assert/img/bg-pattern.png"), linear-gradient(to left, #32CD32, #dc2430);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: white;
    opacity: 0.8;
  }
  .error{
    color: blue;
  }
</style>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        Blank page
        <small>it all starts here</small>
      </h1> -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setting</a></li>
         <li><a href="admin_school.php">Manage School Details</a></li>
        <li class="active"><b>Add New School</b></li>
      </ol>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">
    <!-- message display -->
    	<div class="text-center">
			  <?php $msg->display(); ?>
		  </div>
    <!-- end message displayed -->
    <div class="panel panel-default">
      <div class="panel-heading">Entry School Details</div>
      <div class="demo">
        <div class="panel-body">
          <fieldset>
            <legend> School Details</legend>
            <div class="row">
              <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                <form class="form-horizontal" id="new_application" action="admin_save_add_school.php" method="POST" enctype="multipart/form-data">           
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="School_name">School Name:</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control"  id="School_name" name="School_name" placeholder="Enter School Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="School_address">School Address:</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control"  id="School_address" name="School_address" placeholder="Enter School Address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="web_site">Web Site Details:</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" name="web_site" value="http://" id="web_site" placeholder="Enter Web Site Details">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="Location_name">Location Name:</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control"  id="Location_name" name="Location_name"  placeholder="Enter Location Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="Contact_no">Contact No:</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" name="Contact_no"  id="Contact_no" placeholder="Enter Contact No.">
                        </div>
                      </div>   
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="contact_person">Contact Person:</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" name="contact_person"  id="contact_person" placeholder="Enter Contact Person.">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="email_id">Email Id:</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" name="email_id"  id="email_id" placeholder="Enter Email.">
                        </div>
                      </div>                        
                    </div>
                    <div class="col-md-6 text-center" >
                      <label class="control-label col-sm-2" for="123">School Logo :</label>
                      <div class="col-sm-10" style="word-wrap: break-word;">
                      <input type="file" required id="photo" name="photo" onChange="PreviewImage();"> 
                      </div>      
                      <img  width="150"  height="150" id="photopreview" name="photopreview">              
                    </div>                        
                  </div>
                  <div class="text-right">
                    <input type="submit" class="btn btn-info" id="save" value="Save" name="add_new_app">
                  </div>
                </form>               
              </div>
            </div>
          </fieldset>
        
        </div>
      </div>
    </div>
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
<script> 
function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("photo").files[0]);
    oFReader.onload = function(oFREvent) {
      document.getElementById("photopreview").src = oFREvent.target.result;
    };
};
         
</script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script type="text/javascript">

$("#new_application").validate({
    // onfocusout: function(element) {
    //        this.element(element);
    //     },
        rules: {
          School_name:"required",
          School_address:"required",
          web_site: {
            required: true,
            url: true
          },
          Location_name:"required",
          Contact_no:{
            required:true,            
            number:true
          },
          contact_person:"required",
          email_id: {
            required: true,
            email: true
          },
                     
          

            

        },
        messages: {
          School_name:"Please Enter School Name",
          School_address:"Please Enter School Address",
          web_site:{
            required:"Please Enter School WebSite ",
            url:"Please Enter Vaild Url Name eg. 'http://www.xyz.com'",
          },
          Contact_no:{
            required:"Please Enter Landline No ",
            number:"Please Enter Vaild Contact No",
           
          },
          contact_person:"Please Contact Person",
          email_id:{
            required:"Please Enter Email Id",
            email:"Please Enter vaild Email Id"
          },
          
            
          
      
        },
  //         submitHandler: function(form) {
  //   form.submit();
  // }
       
    })
  $('#save').click(function() {
        $("#new_application").valid();
      });
</script>