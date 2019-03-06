<?php
include './class/DbConnection.php';
include './class/Message.php';
include './class/User.php';
$msg = new Message();
$usr = new User();
ob_start();
?>
<!--HTML and UI Design -->
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


<!--Candidate  Registration-->
<div style="margin-top: -10px;">
    <form method="post" id="user_registration" name="user_registration" enctype="multipart/form-data"
          autocomplete="off" >

        <!--Candidate Personal Details Registration-->
        <div id="per_details">
            <div class="contact_form">
                <div class="contact_left" style="width:1031px">
                    <div class="tab_container">
                        <div class="tab active"><h2 align="center" >Personal Details</h2></div>
                    </div>
                    <div class="table_content">
                        <table class="info personal" style="width:463px;border:1px solid;float:left;margin-left:100px;z-index:10;margin-top:5px;height: 315px">
                            <tbody>
                                <tr>
                                    <th style="width:191px">User Id <font color="red"><sup><b> * </b></sup> </font></th>
                                    <td style="width:381px">
                                        <input type="text" name="userName" id="userName" class="required"
                                               maxlength="20" onblur="isUserIdAvailable(this.value);" onkeyup="nextelementFocus(event);"/>
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
                                               class="required" onkeyup="nextelementFocus(event);">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Middle Name</th>
                                    <td>
                                        <input type="text" name="middleName" onkeyup="nextelementFocus(event);" maxlength="40"/>

                                    </td>
                                </tr>
                                <tr>    
                                    <th>Last Name<font color="red"><sup><b> * </b></sup> </font></th>
                                    <td>
                                        <input type="text" name="lastName" maxlength="40" onkeyup="nextelementFocus(event);"/>

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
                                    <th>Mobile No<font color="red"><sup><b> * </b></sup> </font></th>
                                    <td>
                                        <input type="text" name="mobileNo" data-validation="custom" maxlength="10" onkeyup="nextelementFocus(event);"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Alternative No</th>
                                    <td>
                                        <input type="text" name="altNo" data-validation="custom" maxlength="10" onkeyup="nextelementFocus(event);"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Land-line No (If any)</th>
                                    <td>
                                        <input type="text" name="landlineNo" data-validation="custom" maxlength="14" onkeyup="nextelementFocus(event);"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td class="controls">
                                        <input type="text" name="email" data-validation="custom" maxlength="40" onkeyup="nextelementFocus(event);"/>
                                    </td>
                                </tr>    
                                <tr>    
                                    <th>City / District <font color="red"><sup><b> * </b></sup> </font></th>
                                    <td>
                                        <input type="text" name="city" class="required" maxlength="30" onkeyup="nextelementFocus(event);"/>

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
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <br>
        <!--Candidate educational Details Registration-->
        <div id="acad_work_details" style="display: block;">
            <div class="contact_form"  style="width:1031px">
                <div class="contact_left" style="width:536px;">
                    <div class="tab_container" style="width:465px;margin-bottom:0px">
                        <div class="tab active" style="width:454px"><h2 align="center">Academic</h2></div>
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
                            <tr style="height: 43px;">
                                <th>Degree<font color="red"><sup><b> * </b></sup> </font></th>
                                <td>
                                    <select name="degree" id="degree" style="width: 154px;"
                                            onchange="generateSpecializationList(this.value);" 
                                            onclick="nextelementFocus(event);">
                                        <option value= ''>--Select--</option>
                                        <option>M.Tech.</option>
                                        <option>MCA</option>
                                        <option>MBA</option>
                                    </select>
                                </td>
                            </tr>

                            <tr style="height: 36px;">    
                                <th>Specialization</th>
                                <td>
                                    <select name="specialization" id="specialization" style="width: 154px;" >
                                        <option value="">--Select--</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="contact_right" style="width:460px;">       

                    <div class="tab_container" style="width:465px;margin-left:-2px;margin-bottom:0px">
                        <div class="tab active" style="width:454px"><h2 align="center">Work Experience</h2></div>
                    </div>

                    <table class="info" style="width:464px;border:1px solid;float:left;margin-left:-1px;z-index:10;height: 150px">
                        <tbody>
                            <tr>
                                <th style="width:122px">Total Experience<br />(in years)</th>
                                <td>
                                    <input type="text" name="experience" maxlength="3" style="width: 180px;" onkeyup="nextelementFocus(event);"/>
                                </td>

                            </tr>
                            <tr>
                                <th>Experience Summary</th>
                                <td>
                                    <textarea name="expSummery" style=" width: 283px; height: 44px;" onkeyup="nextelementFocus(event);"></textarea>
                                </td>
                            </tr>
                        <th>Upload your resume</th>
                        <td style=" padding: 0.5px 0.5px 6px 4px; ">
                            <input type="file" name="resume" >
                        </td>
                        </tbody>
                    </table>   

                    <!--</fieldset>-->

                </div>
                <div class="clear"></div>
                <div class="contact-form" style="margin-left:510px;" id="submitForm">
                    <input type="button" name="submitRegistration" value="SUBMIT"
                           onclick="validateCandidateRegistration();">
                </div>
            </div>
        </div>
    </form>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/validation/jQuery-Form-Validator-master/form-validator/jquery.form-validator.js"></script>
<!--<script src="js/validation/jQuery-Form-Validator-master/form-validator/additionalMethod.js"></script>-->
<!--<script src="js/validation/jQuery-Form-Validator-master/form-validator/mainJsV36.js"></script>
<script src="js/validation/jQuery-Form-Validator-master/form-validator/prettyPrint.js"></script>-->
<script src="js/formValidation.js"></script>
<script>
</script>

<?php
//Add registration details to the database
if (isset($_POST['userName'])) {
//Personal Details
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $dob = strtotime($dob);
    $dob = gmdate('Y-m-d', $dob);
    $mobileNo = $_POST['mobileNo'];
    $altNo = $_POST['altNo'];
    $landlineNo = $_POST['landlineNo'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $mornTime = $_POST['mornFromHour'] . ":" . $_POST['mornFromMin'] . "-" . $_POST['mornToHour'] . ":" . $_POST['mornToMin'];
    $evenTime = $_POST['evenFromHour'] . ":" . $_POST['evenFromMin'] . "-" . $_POST['evenToHour'] . ":" . $_POST['evenToMin'];
    //Education Details & Work Experience
    $degreeType = $_POST['degreeType'];
    $degree = $_POST['degree'];
    $specialization = $_POST['specialization'];
    $experience = $_POST['experience'];
    $expSummery = $_POST['expSummery'];

//    Generating unique registration number for user
    $userRegNumber = $usr->fetchUserRegNo();
    if ($userRegNumber != FALSE) {
        $num = false;
        $userRegNumber = substr($userRegNumber, 4, 6);
        $userRegNumber = ++$userRegNumber;
        $length = strlen($userRegNumber);
        for ($i = 0; $i < 6 - $length; $i++) {
            $num = $num . '0';
        }
        $userRegNumber = "can-" . $num . $userRegNumber;
    } else {
        $userRegNumber = "can-000001";
    }

    /* Add user personal details */
    $addUser = $usr->addUserPersonalInformation($userRegNumber, $userName, $password, $firstName, $middleName, $lastName, $gender, $dob, $email, $mobileNo, $altNo, $landlineNo, $city, $mornTime, $evenTime);
    if ($addUser) {
        /* Add user education and work wxperience details */
        $acdemicId = "aca-" . substr($userRegNumber, 4, 6);
        $userEdn = $usr->addUserEducationDetails($acdemicId, $userName, $degreeType, $degree, $specialization, $experience, $expSummery);
        if ($userEdn) {

//            Upload Resume
            if ($_FILES['resume']['name'] != '') {

                $fileName = $_FILES['resume']['name'];
                $fileTmpName = $_FILES['resume']['tmp_name'];
                $targetPath = "resume/";
                $destination = $targetPath . $userName . ".pdf";
                $resume = $userName . ".pdf";
                $keyword = array('', '', '');
                $upload = move_uploaded_file($fileTmpName, $destination);
                if ($upload) {
                    $res = $usr->updateResumeDetails($userName, $resume, $keyword);
                }
            }

//            send confirmation mail to candidate
            $to = $email;
            $subject = "Registration";
            $message = "Your user id:" . $userName . "<br/>";
            $message .= "Your password:" . $password . "<br/>";
            $from = "From: admin@innovadorslab.com \r\n";
            $from .= "Bcc:ppriyabrata8888@gmail.com \r\n";
            $from .= "MIME-Version: 1.0\r\n";
            $from .= "Content-type: text/html\r\n";
            $res = mail($to, $subject, $message, $from);
            ?>
            <script>
                document.getElementById("message_box").style.display = 'none';
                alert("Dear <?php echo $firstName; ?>,you have successfully registered with us.");
                window.location = 'index.php';
            </script>
            <?php
        } else {
            ?><script>
                            document.getElementById("message_box").className = "alert-danger alert";
                            document.getElementById("message_box").style.display = 'block';
                            document.getElementById("message_box").innerHTML = "Registration process aborted. Please try again";
            </script>
            <?php
        }
    } else {
        ?><script>
                    document.getElementById("message_box").className = "alert-danger alert";
                    document.getElementById("message_box").style.display = 'block';
                    document.getElementById("message_box").innerHTML = "Registration process aborted. Please try again";
        </script>
        <?php
    }
}
?>
<?php
$pageContent = ob_get_contents();
$menuClass1 = "";
$menuClass2 = "";
$menuClass3 = "";
$menuClass4 = "";
$menuClass5 = "";
$menuClass6 = "";
$header = ""; //Registration Form";
$headerTag = "";
ob_get_clean();
include 'template_all.php';
?>
