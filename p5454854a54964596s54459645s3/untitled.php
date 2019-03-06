<?php
include './message.php';
include './includes/db.php';
require_once "../ilab/mail/PHPMailerAutoload.php";

if (isset($_POST['userLogin'])) {
    //Validate Student Login
    $userName = mysqli_real_escape_string($con, $_POST['login-userName']);
    $password = mysqli_real_escape_string($con, $_POST['login-password']);
    $query = "SELECT * FROM `students` WHERE `UserId` = '$userName' AND `Password` = '$password'";
    $res = mysqli_query($con, $query);
    if (mysqli_num_rows($res) > 0) {
        session_start();
        $row = mysqli_fetch_array($res);
        $_SESSION['studentNo'] = $row['StudentNo'];
        $_SESSION['userName'] = $userName;
        $_SESSION['studentName'] = $row['FirstName'] . " " . $row['LastName'];
        header("location: student/showMails.php");
    } else {
        echo "Login Failure";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Innovadors Lab Internship</title>

        <link rel="stylesheet" type="text/css" href="css/pastel-stream.css" />
        <link rel="stylesheet" type="text/css" href="css/style_avi.css" />  
        <!--jQuery UI CSS File--> 
        <link rel="stylesheet" href="css/jquery-ui.css">
    </head>
    <body>
        <div class="container">           
            <!-- Navbar -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar navbar-default navbar-fixed-top">
                        <div class="container">	
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">Innovadors Lab Internship</a>
                            </div>
                            <div class="navbar-collapse collapse navbar-responsive-collapse">

                                <!-- 
                                <form class="navbar-form navbar-right" id="login-form" method="post" autocomplete="off">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="login-userName" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="login-password" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-default" name="userLogin">Sign In</button>
                                </form>
                                -->

                            </div>
                        </div>  
                    </div>

                </div>
            </div>

            <hr>
            <!-- Forms  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h1 id="forms">Registration Form</h1>
                    </div>
                </div>
            </div>
            <div class="row well">

                <div class="row">
                    <div class="col-lg-12" id="error-container">
                        <div class="alert alert-dismissable alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong id="error"></strong>
                        </div>
                    </div>
                    <div class="col-lg-12" id="success-container">
                        <div class="alert alert-dismissable alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong id="success"></strong>
                        </div>
                    </div>
                    <div class="col-lg-12" id="info-container">
                        <div class="alert alert-dismissable alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong id="info"></strong> 
                        </div>
                    </div>
                </div>
                <?php
//                echo date('Y-m-d h:i a ', time());
//                echo localtime (time(), true);
                if (isset($_POST['registerStudent'])) {
//Personal Information
                    $userName = mysqli_real_escape_string($con, $_POST['userName']);
                    $user_sql = "select * from `students` where UserId='$userName'";
                    $user_res = mysqli_query($con, $user_sql);
                    if (mysqli_num_rows($user_res) == 0) {
                        $password = mysqli_real_escape_string($con, $_POST['password']);
                        $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
                        $middleName = mysqli_real_escape_string($con, $_POST['middleName']);
                        $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
                        $gender = mysqli_real_escape_string($con, $_POST['gender']);
                        $dob = mysqli_real_escape_string($con, $_POST['dob']);
                        $dob = strtotime($dob);
                        $dob = gmdate('Y-m-d', $dob);
                        $mobileNo = mysqli_real_escape_string($con, $_POST['mobileNo']);
                        $email = mysqli_real_escape_string($con, $_POST['email']);
//Academic Information
                        $degreeType = mysqli_real_escape_string($con, $_POST['degreeType']);
                        $degree = mysqli_real_escape_string($con, $_POST['degree']);
                        $branch = mysqli_real_escape_string($con, $_POST['branch']);
                        $specialization = mysqli_real_escape_string($con, $_POST['specialization']);
                        $college = mysqli_real_escape_string($con, $_POST['college']);
                        $university = mysqli_real_escape_string($con, $_POST['university']);
                        $univRegno = mysqli_real_escape_string($con, $_POST['univRegno']);
                        $ednStatus = mysqli_real_escape_string($con, $_POST['ednStatus']);
                        $year = mysqli_real_escape_string($con, $_POST['year']);
                        $interest = mysqli_real_escape_string($con, $_POST['interest']);
//Student Resume
                        $resume = $_FILES['resume']['name'];
                        $tmpName = $_FILES['resume']['tmp_name'];
                        $target = "resume/";
                        $destination = $target . basename($resume);
                        $upload = move_uploaded_file($tmpName, $destination);
//Insert Values Into tbl_applicants
                        $query = "INSERT INTO `students`(`StudentNo`, `UserId`, `Password`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `BirthDate`,"
                                . " `Mobile`, `Email`, `DegreeType`, `Degree`, `Branch`, `Specialization`, `CollegeName`, `UniversityName`, `UniversityRegdNo`, "
                                . "`EducationStatus`, `Year`, `AreaInterest`, `Resume`,`RegistrationDate`, `Status`) "
                                . "VALUES ('NULL','$userName','$password','$firstName','$middleName','$lastName','$gender','$dob',"
                                . "'$mobileNo','$email','$degreeType','$degree','$branch','$specialization','$college','$university','$univRegno',"
                                . "'$ednStatus','$year','$interest','$resume',now(),'Registered')";
                        $res = mysqli_query($con, $query);
                        if ($res) {
                            $user_name=$firstName." ".$middleName." ".$lastName;
                            $mobile=$mobileNo;
                            
//                        Send Success Email To Student 
                            // if ($email != '') {
                            //     $to = $email;
                            //     $subject = "InnovadorsLab - Internship Registration";
                            //     $message = "Your user id:" . $userName . "\n\r";
                            //     $message .= "Your password:" . $password . "\n\r";
                            //     $from = "From: admin@innovadorslab.com";
                            //     //$res = mail($to, $subject, $message, $from);
                            // }
                            $mail = new PHPMailer;
                            $from_mail="siprah@gmail.com";
                            $from=$user_name;
                            $mail->From = "contact@innovadorslab.com";
                            $mail->FromName = "Innovadors Lab";

                            $mail->addAddress($from_mail, $from_name);
                                         //CC and BCC
                            //$mail->addCC($from_mail);
                            $mail->addBCC("siprah@gmail.com");
                            $mail->addBCC("siprah@innovadorslab.com");
                            $mail->addBCC("ppriyabrata8888@gmail.com");
                         //Provide file path and name of the attachments
                        //$mail->addAttachment("file.txt", "File.txt");        
                        $mail->addAttachment($destination); //Filename is optional

                        $mail->isHTML(true);

                        $mail->Subject = "Enquiry for Intership Applied On Date :- ".date('Y-m-d')."Time :- ".date('H:i:s');
                        $mail->Body = "<b>This is a Computer Generated mail. Don't Reply !!</b><br>"."<br><b>Name: </b>".$user_name."<br>"."<br><b>Contact No: </b>".$mobile."<br>"."<br><b>College Name: </b>".$college."<br><b>Academic: </b>".$degreeType."<br><b>Degree: </b>".$degree."<br><b>Branch: </b>".$branch."<br><b>Specialization: </b>".$specialization."<br><b>Status: </b>".$degree."<br><b>Year : </b>".$year."<br><b>University Roll No: </b>".$univRegno."<br><b>Area of Interest: </b>".$interest."<br>";
                        // $mail->AltBody = "This is the plain text version of the email content";

                            if(!$mail->send()){

                                successMessage("Hi $firstName ,You have successfully registered");
                            }else{
                                successMessage("Hi $firstName ,You have successfully registered1");
                            }
                        } else {
                            errorMessage("Failure !! Please try again.");
                        }
                    } else {
                        ?>
              <script type="text/javascript">
                    window.location="http://innovadorslab.com/internship/registration.php";
                      //window.location="http://localhost/ilab-internship/registration.php";
                        </script>
                            <?php
                    }
                } else {
                    ?>

                    <form name= "studentRegistration" method="post" enctype="multipart/form-data" onsubmit="return validateStudentRegistration();"> 
                        <div class="col-lg-6">
                            <div class="well modal-content form-horizontal">

                                <fieldset>
                                    <legend>Personal Information</legend>
                                    <div class="form-group">
                                        <label for="userName" class="col-lg-3 control-label" >User - Id</label>
                                        <div class="col-lg-9 ">
                                            <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter User Id" onblur="isUserNameExist(this.value)">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="col-lg-3 control-label">Password</label>
                                        <div class="col-lg-9">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="confirmPassword" class="col-lg-3 control-label">Confirm Password</label>
                                        <div class="col-lg-9">
                                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="firstName" class="col-lg-3 control-label">First Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middleName" class="col-lg-3 control-label">Middle Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Middle name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="lastName" class="col-lg-3 control-label">Last Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="lastName" name= "lastName" placeholder="Last Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Gender</label>
                                        <div class="col-lg-9">
                                            <div class="col-lg-9">
                                                <div class="radio-inline">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="gender" id="" value="Male" checked> Male
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="gender" id="" value="Female"> Female
                                                    </label>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="dob" class="col-lg-3 control-label">Birthdate</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="dob" name="dob" placeholder="dd-mm-yyyy" style="width: 92%;margin-right: 10px;display: inline;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="mobileNo" class="col-lg-3 control-label">Mobile No.</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="mobileNo" name="mobileNo" placeholder="10-digit mob no." maxlength="10">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-lg-3 control-label">Email</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        &nbsp;
                                    </div>


                                    <div class="form-group spacer">
                                        &nbsp;
                                    </div>

                                </fieldset>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="well modal-content form-horizontal">

                                <fieldset>
                                    <legend>Academics Information</legend>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Academic</label>
                                        <div class="col-lg-9">
                                            <div class="radio-inline">
                                                <label class="radio-inline">
                                                    <input type="radio" name="degreeType" id="" value="PG" checked onchange="generateDegreeList(this.value);"> Post-Graduation
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="degreeType" id="" value="UG" onchange="generateDegreeList(this.value);"> Graduation
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="degree" class="col-lg-3 control-label">Degree</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" id="degree" name="degree" onchange="generateSpecializationList(this.value);">
                                                <option value= ''>--Select--</option>
                                                <option>M.Tech.</option>
                                                <option>MCA</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="branch" class="col-lg-3 control-label">Branch</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" id="branch" name="branch">
                                                <option value="">--Select--</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="specialization" class="col-lg-3 control-label">Specialization</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="specialization" name="specialization">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="college" class="col-lg-3 control-label">College</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="college" name="college" placeholder="College Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="university" class="col-lg-3 control-label">University</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="university" name="university" placeholder="University Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="univRegno" class="col-lg-3 control-label">University Roll No</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="univRegno" name="univRegno" placeholder="University Roll No ">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Status</label>
                                        <div class="col-lg-9">
                                            <div class="radio-inline">
                                                <label class="radio-inline">
                                                    <input type="radio" name="ednStatus" id="" value="Passout" checked onchange="generateYearList(this.value);"> Passout
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="ednStatus" id="" value="Continue" onchange="generateYearList(this.value);">Continuing
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="year" class="col-lg-3 control-label">Current year</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" id="year" name="year">
                                                <option>--Select Year--</option>
                                                <?php $cur_year = date('Y');
                                               
                                            for($year = (2000); $year <= ($cur_year+1); $year++) {
                                        $x=$year+1;                             
                                        if($year==$cur_year){  
                                            echo '<option value="'.$year.'" selected="selected">'.$year.'</option>';
                                       }else{
                                        echo '<option value="'.$year.'" >'.$year.'</option>';
                                       }
                                    }    ?>     
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="interest" class="col-lg-3 control-label">Area of Interest</label>
                                        <div class="col-lg-9">
                                            <textarea class="form-control" rows="3" id="interest" name="interest"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="resume" class="col-lg-3 control-label">Resume</label>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-control" id="resume" name="resume">
                                        </div>
                                        <div class="col-lg-3 vcenter">
                                            <!--<a href="#" data-toggle="tooltip" data-placement="top" title="Please download the resume template">Download</a>-->
                                        </div>
                                    </div>

                                </fieldset>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-4">
                                <button type="submit" name="registerStudent" class="btn btn-primary btn-sm btn-block">Submit</button>
                            </div>
                        </div>

                    </form>
                <?php } ?>
            </div>

            <div class="clearfix" style="height:50px;"></div>
            <!-- sample templates end -->
        </div>
        <script type="text/javascript" src="js/ajaxCall.js"></script>
        <script type="text/javascript" src="js/formElementChange.js"></script>
        <script type="text/javascript" src="js/formValidation.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>        
        <script type="text/javascript">
                                                            jQuery(function ($) {
                                                                $('[data-toggle="popover"]').popover();
                                                                $('[data-toggle="tooltip"]').tooltip();
                                                            });
                                                            $(function () {
                                                                $("#dob").datepicker({
                                                                    showOn: "button",
                                                                    buttonImage: "images/calendar.gif",
                                                                    buttonImageOnly: true,
                                                                    dateFormat: "dd-mm-yy",
                                                                    showAnim: "slideDown",
                                                                    changeMonth: true,
                                                                    changeYear: true,
                                                                    yearRange: "1980:<?php echo date("Y", time()); ?>"
                                                                });
                                                            });
        </script>
    </body>
</html>

