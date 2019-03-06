<?php
error_reporting(E_ALL);
ob_start();
include './class/DbConnection.php';
include './class/User.php';
include './class/Admin.php';
include './class/Message.php';
$usr = new User();
$adm = new Admin();
$msg = new Message();
//    track current job details
if (isset($_GET['job'])) {
    include './class/Encription.php';
    $enc = new Encription();

    $job = str_replace(" ", "+", $_GET['job']);
    $job = $enc->decryptIt($job);
} else {
    $job = 0;
}
?>
<?php
if (isset($_POST['addMyCareer'])) {


    $name = $_POST['name'];
    $fatherName = $_POST['fatherName'];
    $dob = $_POST['dob'];
    $dob = strtotime($dob);
    $dob = date('Y-m-d', $dob);
    $mobile = $_POST['mobile'];
    $alt_no = $_POST['alt_no'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $degree = $_POST['degree'];
    $college = $_POST['college'];
    $passYear = $_POST['passYear'];
    $interestArea = $_POST['interestArea'];
    $experience = $_POST['experience'];

    if ($_FILES['resume']['name'] != '') {
        $fileName = $_FILES['resume']['name'];
        $fileTmpName = $_FILES['resume']['tmp_name'];
        $targetPath = "resume/career/";
        $destination = $targetPath . time() . ".pdf";
        $upload = move_uploaded_file($fileTmpName, $destination);
        $resume = time() . ".pdf";
    } else {
        $resume = "";
    }
    $career = $usr->addDetailsToCareer($job, $name, $fatherName, $dob, $mobile, $alt_no, $email, $address, $degree, $college, $passYear, $interestArea, $experience, $resume);
    if ($career) {
        $message = "Thank you for showing your interest.\r\n"
                . "We will get back to you soon";
        $msg->successMessage($message);
    }
}
?>
<!--Error Messagebox-->
<div style="z-index: 100;text-align: center;width: 85%;margin-left: 9.2%;display: none;"
     id="message_box" class="alert alert-danger"
     onclick="this.style.display = 'none'">
</div>
<style>
    .content>form{margin-left: 280px;}
    img.ui-datepicker-trigger{
        position: absolute;
        cursor: pointer;
        height: 16px;
        width: 16px;
        margin-left: 400px;
        margin-top: -21px;
    }
</style>
<div class="contact-form " style="width: 790px;margin-left: auto;">
    <h2>Career</h2>
    <form method="post" name="career" id="career" enctype="multipart/form-data" onsubmit="return validateCareerForm();">

        <div>
            <span><label>Your Name</label></span>
            <span><input  type="text" class = "textbox" name='name' id='name'></span>
        </div>
        <div>
            <span><label>Father's Name</label></span>
            <span><input  type="text" class = "textbox" name='fatherName' id='fatherName'></span>
        </div>
        <div>
            <span><label>DOB</label></span>
            <span><input  type="text" class = "textbox" name='dob' id="dob"></span>
        </div>
        <div>
            <span><label>Mobile</label></span>
            <span><input  type="text" class = "textbox" name='mobile' id='mobile'></span>
        </div>
        <div>
            <span><label>Alt. Number</label></span>
            <span><input  type="text" class = "textbox" name='alt_no' id='alt_no'></span>
        </div>
        <div>
            <span><label>Email</label></span>
            <span><input  type="text" class = "textbox" name='email' id='email'></span>
        </div>
        <div>
            <span><label>Address</label></span>
            <span>
                <textarea name='address' id='address'></textarea>
            </span>
        </div>
        <div>
            <span><label>Last Qualifing Degree</label></span>
            <span><input  type="text" class = "textbox" name='degree' id='degree'></span>
        </div>
        <div>
            <span><label>College/University</label></span>
            <span><input  type="text" class = "textbox" name='college' id='college'></span>
        </div>
        <div>
            <span><label>Passout Year</label></span>
            <span>
                <select name="passYear" id='passYear'>
                    <option>Choose Year</option>
                    <?php
                    for ($i = date('Y'); $i >= 2005; $i--) {
                        echo "<option>$i</option>";
                    }
                    ?>
                </select>
            </span>
        </div>
        <div>
            <span><label>Interest Area</label></span>
            <span>
                <textarea name='interestArea' id='interestArea'></textarea>
            </span>
        </div>
        <div>
            <span><label>Job Experienct (If any)</label></span>
            <span>
                <textarea name="experience" id='experience'></textarea>
            </span>
        </div>
        <div>
            <span><label>Upload Your Resume</label></span>
            <span>
                <input type="file" name='resume' id='resume' class="textbox">
            </span>
        </div>
        <div style="text-align: right;">  
            <span>
                <input type="submit" name='addMyCareer'>
            </span>
        </div>
    </form>
</div>
<?php
$pageContent = ob_get_contents();
$menuClass1 = "";
$menuClass2 = "";
$menuClass3 = "";
$menuClass4 = "active";
$menuClass5 = "";
$menuClass6 = "";
$header = "Career";
$headerTag = "";
ob_get_clean();
include 'template_all.php';
?>