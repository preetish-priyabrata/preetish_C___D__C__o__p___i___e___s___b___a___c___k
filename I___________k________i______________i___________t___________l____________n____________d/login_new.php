<?php
session_start();
ob_start();
include './class/DbConnection.php';
include './class/User.php';
include './class/Admin.php';
include './class/Message.php';
$usr = new User();
$adm = new Admin();
$msg = new Message();
?>


<!-- commented by sm <div class="contact" style="width: 50%;margin-left: 23%;">-->
<div class="contact" style="width: 50%;margin-left: 40%;">
    <div class="clear"></div>
    <div class="contact-form">
        <form method="post" autocomplete="off">
            <div style="margin-bottom: 16px;">
                <span>
                    <label style="font-size:20px">User Name</label>
                </span>
                <span>
                    <input name="userName" type="text" class="textbox" >
                </span>
            </div>
            <div style="margin-bottom: 16px;">
                <span>
                    <label style="font-size:20px">Password</label>
                </span>
                <span>
                    <input name="password" type="password" class="textbox">
                </span>
            </div>
            <div style="margin-bottom: 16px;">
                <span>
                    <!-- commented by sm <label style="font-size:20px">Usertype</label>-->
                    <label style="font-size:20px">User Type</label>
                </span>
                <span>
                    <select name="userType" >
                        <option>Candidate</option>
                        <option>Staff</option>
                    </select>
                </span>
            </div>
            <div>
                <span>
                    <input type="submit" name="userLogon" value="Log In">
                </span>
            </div>
            <div style="float: left;margin-left: 15%;">
                <span>
                    <a href="candidateregistration.php">
                        <!-- commented by sm for change in button label
                        <input type="button" name="userRegistration" value="Student Registration">
                        -->
                        <input type="button" name="userRegistration" value="Register">
                    </a>
                </span>
            </div>
        </form>
    </div>

    <div class="clear"></div>
</div>
<!-- end contact -->
<!-- commented by sm </div>-->
<?php
if (isset($_POST['userLogon'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];
    if ($userType == 'Staff') {
        $logon = $adm->validateUserLogon($userName, $password);

        if ($logon) {

            $_SESSION['ADMIN_ID'] = $userName;
            $_SESSION['userType'] = "Staff";
            ?>
            <script>
                window.location = 'admin/adminViewCandidateNew.php';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Login Failure");
                window.location = '';
            </script>
            <?php
        }
    } else if ($userType == 'Candidate') {
        $logon = $usr->validateUserLogon($userName, $password);
        if ($logon) {
            $_SESSION['USER_ID'] = $logon;
            ?>
            <script>
                window.location = 'user/editprofile.php';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Login Failure");
            </script>
            <?php
        }
    }
}
?>

<?php
$pageContent = ob_get_contents();
$menuClass1 = "";
$menuClass2 = "";
$menuClass3 = "";
$menuClass4 = "";
$menuClass5 = "active";
$menuClass6 = "";
$header = "Login";
$headerTag = "";
ob_get_clean();
include 'template_all.php';
?>