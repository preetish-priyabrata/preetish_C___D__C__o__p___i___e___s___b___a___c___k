<?php
error_reporting(0);
session_start();
include './config.php';
if (isset($_POST['login'])) 
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    //if ((!empty($email) && $email == "abc@gmail.com") && (!empty($password) && $password == "abc")) {
    $str1 = "SELECT * FROM dataentry_user_information WHERE user_name='$email' AND password='$password'";
    $sql1 = mysqli_query($con, $str1);
    $data1 = mysqli_fetch_array($sql1);
    $count1 = mysqli_num_rows($sql1);
	
	$str2 = "SELECT * FROM updation_user_information WHERE user_name='$email' AND password='$password'";
    $sql2 = mysqli_query($con, $str2);
    $data2 = mysqli_fetch_array($sql2);
    $count2 = mysqli_num_rows($sql2);
    if ($count1==1) 
	{
        $_SESSION['user_id'] = $data1['user_id'];
        header("location:optionPage.php");
    }
	else if($count2==1) 
	{
		$_SESSION['updation_user_id'] = $data2['user_id'];
		header("location:optionPage.php");
	}
	else
	{
				header("location:login.php?msg=error");
	}
}	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kalinga Institute of Social Sciences</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/pastel-stream.css" />
        <link rel="stylesheet" type="text/css" href="css/style_avi.css" />
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <style>
            body {
                background: url(Images/final_aog.jpg) no-repeat center center fixed ghostwhite;
                -webkit-background-size: contain;
                -moz-background-size: contain;
                -o-background-size: contain;
                background-size: contain;
            }
            .panel-default {
                opacity: 0.95;
                margin-top: 30px;
            }
            .form-group.last {
                margin-bottom: 0px;
            }
        </style>
    </head>
    <body>
        <div class="container"> 

            <!-- sample templates start --> 

            <!-- Navbar -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar navbar-default navbar-fixed-top">
                        <div class="container">
                            <div class="col-lg-4 text-center"> <a class="" href="studentStatus.php"><img class="img-responsive img-thumbnail logo" src="Images/left.png"></a> </div>
                            <div class="col-lg-4 wrapper text-center"> <span>Students / Family information sheet</span> </div>
                            <div class="col-lg-4 text-center"> <a class="" target= "_blank" href="http://achyutasamanta.com/"><img class="img-responsive img-thumbnail logo" src="Images/sir2.jpg"></a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Forms  -->
            <div class="container" style="padding-top:13%">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading"> <span class="glyphicon glyphicon-lock"></span> Login
							<?php
                if($_REQUEST['msg']=='error'){
				?>
                <div class="alert-box success"><span>password does not match </span></div>
                <?php
				}
				?></div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label"> Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label"> Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <!--<a href="optionPage.php" class="btn btn-success btn-sm"> Sign in</a>-->
                                            <input type="submit" name="login" class="btn btn-success btn-sm" value="Sign In">
                                            <input type="reset" class="btn btn-default btn-sm" value="Reset">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix" style="height:50px;"></div>
            <script type="text/javascript">
                jQuery(function ($) {
                    $('[data-toggle="popover"]').popover();
                    $('[data-toggle="tooltip"]').tooltip();
                });
            </script> 

            <!-- sample templates end -->

        </div>
    </body>
</html>