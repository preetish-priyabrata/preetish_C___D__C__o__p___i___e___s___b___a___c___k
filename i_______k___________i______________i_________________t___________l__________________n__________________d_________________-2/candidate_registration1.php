<?php
ob_start();
session_start();
include'config.php';
?>

<script src="js/ajaxCall.js"></script>
<script src="js/formElementChange.js"></script>
<!-- Bootstrap core CSS -->
<link href="admin/css/css/bootstrap.css" rel="stylesheet">
<style>
    img.ui-datepicker-trigger{
        cursor: pointer;
        height: 16px;
        width: 16px;
        margin-left: -35px;
        margin-bottom: -3px;
    }
    h2 {
        font-size: 14px;
        text-transform: initial;
        font-weight: bold;
        margin-top: -4px
    }
    h3 {
        font-size: 1.2em;
        text-transform: uppercase;
        font-weight: bold;
        padding: 5px;
    }
    span.form-error{
        float: left;
        color: #ff6666;
        position: relative;
        z-index: 100;
    }
    th, td {
        font-size: 12px;
        text-transform: initial;
        font-weight: bold;
        padding: 15px;
    }
    .personal td{
        height: 24px;
    }

    .content{min-width: 1110px;}

</style>
<!--Error Messagebox-->
<div style="z-index: 100;text-align: center;width: 85%;margin-left: 9.2%;display: none;"
     id="message_box" class="alert alert-danger"
     onclick="this.style.display = 'none'">
</div>

<div class="jumbotron text-center" style="padding-top: 109px;
padding-bottom: 1px;">
   <div class="tab active">
       <h3 align="text-center">Personal Details</h3>
   </div>
</div>

    <div style="margin-top: -10px;">
        <form method="post" id="user_registration" name="user_registration" enctype="multipart/form-data"
          autocomplete="off" >

           <!--Candidate Personal Details Registration-->
            <div id="per_details">
               <div class="contact_form">
                  <div class="contact_left" style="width:1031px">
                   <!--  <div class="tab_container">
                        <div class="tab active"><h2 align="center" >Personal Details</h2></div>
                      </div> -->
                        <div class="table_content">
                           <table class="info personal" style="width:463px;border:1px solid;float:left;margin-left:100px;z-index:10;margin-top:5px;height: 315px">
                             <tbody>
                                <tr>
                                    <th style="width:191px">User Id <font color="red"><sup><b> * </b></sup> </font></th>
                                    <td style="width:381px">
                                        <input type="text" name="userName" id="userName" class="required"
                                               maxlength="20" onblur="isUserIdAvailable(this.value);" onkeyup="nextelementFocus(event);" style="width: 235px;"/>
                                    </td>
                                </tr>

                                <tr>    
                                    <th style="width:186px">Password<font color="red"><sup><b> * </b></sup> </font></th>
                                    <td style="width:381px">
                                        <input type="password" name="password" data-validation="custom" style="width: 235px;"
                                               maxlength="8" class="required" onkeyup="nextelementFocus(event);"/>

                                    </td>
                                </tr>

                                <tr>    
                                    <th style="width:186px">Confirm Password<font color="red"><sup><b> * </b></sup> </font></th>
                                    <td style="width:381px">
                                        <input type="password" name="confPassword" maxlength="8" 
                                               class="required"  style="width: 235px;" onkeyup="nextelementFocus(event);"/>

                                    </td>
                                </tr>
                                <tr>
                                    <th>First Name<font color="red"><sup><b> * </b></sup> </font></th>
                                    <td>
                                        <input type="text" name="firstName" data-validation="custom" maxlength="40"
                                               class="required" onkeyup="nextelementFocus(event);" style="width: 235px;">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Middle Name</th>
                                    <td>
                                        <input type="text" name="middleName" onkeyup="nextelementFocus(event);" maxlength="40"/ style="width: 235px;">

                                    </td>
                                </tr>
                                <tr>    
                                    <th>Last Name<font color="red"><sup><b> * </b></sup> </font></th>
                                    <td>
                                        <input type="text" name="lastName" maxlength="40" onkeyup="nextelementFocus(event);" style="width: 235px;"/>

                                    </td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>
                                        <label>
                                            <input type="radio" name="gender" value="Male" checked />
                                            Male
                                        </label>
                                        <label>
                                            <input type="radio" name="gender" value="Female">                                                   
                                            Female
                                        </label>
                                    </td>
                                </tr>
                                <tr>              
                                    <th>Birth Date<font color="red"><sup><b> * </b></sup> </font></th>
                                    <td class="controls">
                                        <input type="text" name="dob" id="dob"   class="required" placeholder="DD-MM-YYYY"
                                               style="width:235px;margin-right: 12px;" onkeyup="nextelementFocus(event);">
                                    </td>
                                </tr>


                            </tbody>
                        </table> 
                          <table class="info" style="width:463px;border:1px solid;float:left;z-index:10;margin-left:5px;margin-top:5px;height:315px">
                            <tbody>
                                

                                <tr>
                                  <th>Candidate Photo<font color="red"><sup><b> * </b></sup> </font></th>
                                    <td>
                                        <input type="file" name="mobileNo" data-validation="custom" maxlength="10" onkeyup="nextelementFocus(event);"/>
                                    </td>

                                </tr>

                                <tr>
                                    <th>Mobile No<font color="red"><sup><b> * </b></sup> </font></th>
                                    <td>
                                        <input type="text" name="mobileNo" data-validation="custom" maxlength="10" onkeyup="nextelementFocus(event);" style="width: 235px;"/>
                                    </td>
                                </tr>
                               
                                <tr>
                                    <th>Alternative No</th>
                                    <td>
                                        <input type="text" name="altNo" data-validation="custom" maxlength="10" onkeyup="nextelementFocus(event);" style="width: 235px;" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>Land-line No (If any)</th>
                                    <td>
                                        <input type="text" name="landlineNo" data-validation="custom" maxlength="14" onkeyup="nextelementFocus(event);" style="width: 235px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td class="controls">
                                        <input type="text" name="email" data-validation="custom" maxlength="40" onkeyup="nextelementFocus(event)" required="" style="width: 235px;"/>
                                    </td>
                                </tr>    
                                <tr>    
                                    <th>City / District <font color="red"><sup><b> * </b></sup> </font></th>
                                    <td>
                                        <input type="text" name="city" class="required" maxlength="30" onkeyup="nextelementFocus(event);" style="width: 235px;"/>

                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2">Preferred time to attend a call </th>
                                </tr>
                                <tr>
                                    <th>Morning</th>
                                    <td>
                                        <select name="mornFromHour" size="1">
                                            <option value="00">hh</option>
                                            <?php
                                            for ($i = 6; $i <= 12; $i++) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>:
                                        <select name="mornFromMin" size="1">
                                            <option value="00">mm</option>
                                            <?php
                                            for ($i = 0; $i < 60; $i+=15) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select> &nbsp; - &nbsp;
                                        <select name="mornToHour" size="1">
                                            <option value="00">hh</option>
                                            <?php
                                            for ($i = 6; $i <= 12; $i++) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>:
                                        <select name="mornToMin" size="1">
                                            <option value="00">mm</option>
                                            <?php
                                            for ($i = 0; $i < 60; $i+=15) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>  
                                <tr>
                                    <th>Afternoon / Evening</th>
                                    <td>
                                        <select name="evenFromHour" size="1">
                                            <option value="00">hh</option>
                                            <?php
                                            for ($i = 12; $i <= 20; $i++) {
                                                echo "<option>" . $i . "</option>";
                                            }
                                            ?>
                                        </select>:
                                        <select name="evenFromMin" size="1">
                                            <option value="00">mm</option>
                                            <?php
                                            for ($i = 0; $i < 60; $i+=15) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select> &nbsp; - &nbsp;
                                        <select name="evenToHour" size="1">
                                            <option value="00">hh</option>
                                            <?php
                                            for ($i = 12; $i <= 20; $i++) {
                                                echo "<option>" . $i . "</option>";
                                            }
                                            ?>
                                        </select>:
                                        <select name="evenToMin" size="1">
                                            <option value="00">mm</option>
                                            <?php
                                            for ($i = 0; $i < 60; $i+=15) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

         <div class="text-center" style="padding-bottom: 1px;">
           <div class="tab active">
               <h3 align="text-center">Academic</h3>
           </div>
        </div>     

         <div id="acad_work_details" style="display: block;">
            <div class="contact_form"  style="width:1031px">
              
                    <div class="tab_container" style="width:465px;margin-bottom:0px">
                        <div class="tab active" style="width:804px"><h2 align="center">Academic</h2></div>
                    </div>
                    <table class="info" style="width:464px;border:1px solid;float:left;margin-left:100px;z-index:10;height: 150px">
                        <tbody>
                            <tr style="height: 47px;">
                                <th style="width:118px">Academic</th>
                                <td>
                                    <input name="degreeType" type="radio" value="PG"
                                           onchange="generateDegreeList(this.value);" checked="checked"/>
                                    &nbsp; Post-Graduation
                                    <br/>
                                    <input name="degreeType" type="radio" value="UG"
                                           onchange="generateDegreeList(this.value);" />
                                    &nbsp; Graduation
                                    <br/>
                                    <input name="degreeType" type="radio" value="VOCATIONAL"
                                           onchange="generateDegreeList(this.value);" />
                                    &nbsp; Vocational
                                </td>
                            </tr>
                           
                          <tr>
                             <th style="width:122px">Branch</th>
                                <td>
                                    <select name="degree" id="degree" style=" width: 283px;"
                                            onchange="generateSpecializationList(this.value);" 
                                            onclick="nextelementFocus(event);">
                                        <option value= ''>--Select--</option>
                                        <option>M.Tech.</option>
                                        <option>MCA</option>
                                        <option>MBA</option>
                                    </select>
                                </td>

                          </tr>
                          <tr>
                             <th style="width:122px">College Name</th>
                                <td>
                                    <input type="text" name="experience" maxlength="3" style=" width: 283px;"onkeyup="nextelementFocus(event);"/>
                              </td>

                          </tr>
                           <tr>
                             <th style="width:122px">Year Of Passing</th>
                                <td>
                                    <input type="text" name="experience" maxlength="3" style=" width: 283px;"onkeyup="nextelementFocus(event);"/>
                              </td>

                          </tr>
                           

                 
                        </tbody>
                    </table>
                
                 <div class="contact_right" style="width:460px;">          

                    <table class="info" style="width:464px;border:1px solid;float:left;margin-left:-1px;z-index:10;height: 150px">
                        <tbody>
                            <tr>
                                <th style="width:122px">Branch</th>
                                <td>
                                    <input type="text" name="experience" maxlength="3" style=" width: 283px;" onkeyup="nextelementFocus(event);"/>
                                </td>

                            </tr>
                            <tr>
                                <th>Attach Redg.No</th>
                                <td>
                                    <input type="text"  name="expSummery" style=" width: 283px;" onkeyup="nextelementFocus(event);">
                                </td>
                            </tr>
      
                            <tr>
                                <th>Board</th>
                                <td>
                                    <textarea name="expSummery" style=" width: 283px; height: 70px;" onkeyup="nextelementFocus(event);"></textarea>
                                </td>
                            </tr>


                        
                        </tbody>
                    </table>   

                    </fieldset>

             </div> 
 
<br>
<br>


                <div class="clear"></div>
                <div class="contact-form" style="margin-left:510px;" id="submitForm">
                    <input type="button" name="submitRegistration" value="SUBMIT"
                           onclick="validateCandidateRegistration();">
                </div>
            </div>
        </div>
    </form>
</div>
   
             
                <div class="clear"></div>
            </div>
        </div>
        <br>
                        
 
<!-- 
<div class="container">
  <div class="row">
    <div class="col-sm-12">
     <div class="col-sm-6">
      <h3>Column 1</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-6">
      <h3>Column 2</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
   </div>  
  </div>
</div> -->

<?php
$content_display=ob_get_contents();
ob_get_clean();
include 'template_all.php';