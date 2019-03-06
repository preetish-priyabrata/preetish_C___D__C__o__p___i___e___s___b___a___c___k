
<?php
ob_start();
session_start();
?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <section style="padding-top: 8pc; padding-bottom: 5pc;">
    <div class="container" >
        <div class="row">
            <form class="form-horizontal">
                <div class="row">
                    <div class="panel-group">
                        <div class="panel panel-primary">
                           <form name="" method="POST" action="college_address_save.php" enctype="multipart/form-data">
                               <div class="panel panel-primary">
                                  <div class="panel-heading text-center">College Information</div>
                                <!-- <div class="panel-body">Panel Content</div> -->
                                      <div class="form-group">
                                         	 <label class="control-label col-sm-3" for="clg_name">Name Of The College<font color="red"><sup><b> * </b></sup> </font></label>
                                          <div class="col-sm-7">
                                            <input type="text" name="clg_name" class="form-control"  id="clg_name" placeholder="Enter College Name">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                         	 <label class="control-label col-sm-3" for="short_name">Short Name<font color="red"><sup><b> * </b></sup> </font></label>
                                          <div class="col-sm-7">
                                            <input type="text" name="short_name" class="form-control"  id="short_name" placeholder="Enter College Short Name ">
                                          </div>
                                      </div>
                                       <div class="form-group">
                                         	 <label class="control-label col-sm-3" for="clg_head_name">Name of the head of the college<font color="red"><sup><b> * </b></sup> </font></label>
                                          <div class="col-sm-7">
                                            <input type="text" name="clg_head_name" class="form-control"  id="clg_head_name" placeholder="Enter Name Of The Head Of The College">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                           <label class="control-label col-sm-3" for="head_Designation">Designation<font color="red"><sup><b> * </b></sup> </font></label>
                                          <div class="col-sm-7">
                                            <input type="text" name="head_Designation" class="form-control"  id="head_Designation" placeholder="Enter Head Designation ">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                         	 <label class="control-label col-sm-3" for="clg_address">College Address<font color="red"><sup><b> * </b></sup> </font></label>
                                          <div class="col-sm-7">
                                           <textarea rows="2" name="clg_address" class="form-control"  id="clg_address" placeholder="Enter College Address "></textarea>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                         	 <label class="control-label col-sm-3" for="phone_no">Phone No <font color="red"><sup><b> * </b></sup> </font></label>
                                          <div class="col-sm-7">
                                            <input type="text" name="phone_no" class="form-control"  id="phone_no" placeholder="Enter Phone No ">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-sm-3" for="email_id">Email Id<font color="red"><sup><b> * </b></sup> </font></label>
                                          <div class="col-sm-7">
                                            <input type="text" name="email_id" class="form-control"  id="email_id" placeholder="Enter Your Email ID">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-sm-3" for="wedsite_name">Website Name<font color="red"><sup><b> * </b></sup> </font></label>
                                          <div class="col-sm-7">
                                            <input type="text" name="wedsite_name" class="form-control"  id="wedsite_name" placeholder="Enter Your Website Name">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                         	 <label class="control-label col-sm-3" for="cntact_person_name">Name of the contact person<font color="red"><sup><b> * </b></sup> </font></label>
                                          <div class="col-sm-7">
                                            <input type="text" name="cntact_person_name" class="form-control"  id="cntact_person_name" placeholder="Enter Contact Person Name">
                                          </div>
                                      </div>
  								                  	<div class="form-group">
                                        	  <label class="control-label col-sm-3" for="person_Designation">person_Designation<font color="red"><sup><b> * </b></sup> </font></label>
                                        	 <div class="col-sm-7">
                                            <input type="text" name="person_Designation" class="form-control"  id="person_Designation" placeholder="Enter Designation">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                        	  <label class="control-label col-sm-3" for="contact_person_deatils">Contact Person Details<font color="red"><sup><b> * </b></sup> </font></label>
                                           <div class="col-sm-7">
                                            <textarea rows="2" name="contact_person_deatils" class="form-control"  id="contact_person_deatils" placeholder="Enter Contact Person Details"></textarea>
                                          </div>
                                      </div>
                                 </form>
            							   <center><input type="submit" value="Submit" name="submit">
            						</center>
                    </div>
                </div>          
            </form>
        </div>
    </div>
</section>

<?php
$content_display=ob_get_contents();
ob_get_clean();
include 'template_all.php';
?>