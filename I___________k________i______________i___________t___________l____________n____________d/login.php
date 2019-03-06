<?php
ob_start();
include './class/DbConnection.php';
include './class/Message.php';
include './class/User.php';
include './class/College.php';
$user = new User();
$coll = new College();
$msg = new Message();
?><?php
if (isset($_POST['urerLogin'])) {
    $username = $_POST['userName'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    if ($type == 'student') {
        $res = $user->validateUserLogin($username, $password);
        $rows = mysqli_num_rows($res);
        if ($rows) {
            $row = mysqli_fetch_array($res);
            session_start();
            $_SESSION['USER_ID'] = $row['user_id'];
            header('location:./user/user_acc.php');
        } else {
            $msg->errorMessage("Login Failure");
        }
    }
    if ($type == 'college') {
        $res = $coll->validateUserLogin($username, $password);
        $rows = mysqli_num_rows($res);
        if ($rows) {
            $row = mysqli_fetch_array($res);
            session_start();
            $_SESSION['COLLEGE_ID'] = $row['coll_id'];
            header('location:./college/viewProfile.php');
        } else {
            $msg->errorMessage("Login Failure");
        }
    }
    if ($type == 'admin') {

        if ($username == 'admin' && $password == 'admin') {
            header('location:./admin/upcomingCompanies.php');
        } else {
            $msg->errorMessage("Login Failure");
        }
    }
}
?>
<!-- start contact -->
<div class="contact" style="width: 50%;margin-left: 23%;">
    <div class="clear"></div>
    <div class="contact-form">
        <h3>LOG IN</h3>
        <form method="post" action="#">
            <div> <span>
                    <label>User Name</label>
                </span> <span>
                    <input name="userName" type="text" class="textbox">
                </span> </div>
            <div> <span>
                    <label>Password</label>
                </span> <span>
                    <input name="password" type="password" class="textbox">
                </span> </div>
            <div> <span>
                    <label>Usertype</label>
                </span> <span>
                    <select name="type" >
                        <option value="student">Student</option>
                        <option value="college">College</option>
                        <option value="admin">Admin</option>
                    </select>
                </span> </div>
            <div> <span>
                    <input type="submit" name="urerLogin" value="Log In">
                </span> </div>
        </form>
    </div>
    <div class="clear"></div>
</div>
<!-- end contact --> 
</div>


<?php
$pageContent = ob_get_contents();
$menuClass1 = "";
$menuClass2 = "";
$menuClass3 = "";
$menuClass4 = "";
$menuClass5 = "";
$menuClass6 = "";
$header = "Login";
$headerTag = "";
ob_get_clean();
include 'template_all.php';
?>