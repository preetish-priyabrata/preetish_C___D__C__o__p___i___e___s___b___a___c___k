<?php
session_start();
error_reporting(0);
if ($_SESSION['user_id'] == "") {
    header("location:login.php");
}
include './config.php';
$operator_id = $_SESSION['user_id'];
include 'retrive_data.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kalinga Institute of Social Sciences</title>

        <!--Date Picker-->
        <link rel="stylesheet" href="css/jquery-ui.css">
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#datepicker").datepicker();
            });
        </script>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/pastel-stream.css" />
        <link rel="stylesheet" type="text/css" href="css/style_avi.css" />
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <script src="js/script.js"></script>
        <script src="js/texttoggle.js"></script>
        <script>
            function register() {
                var conf = confirm("Are you sure to submit ?");
                if (conf) {
                    document.getElementById("studentRegistration").submit();

                }

            }
        </script>

    </head>
    <body>
        <div class="container"> 

            <!-- sample templates start --> 

            <!-- Navbar -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar navbar-default navbar-fixed-top">
                        <div class="container">
                            <div class="col-lg-4 text-center"> <a class="" href="studentStatus.html" target= "_blank"><img class="img-responsive img-thumbnail logo" src="Images/left.png"></a> </div>
                            <div class="col-lg-4 wrapper text-center"> <span>Students / Family information sheet</span> </div>
                            <div class="col-lg-4 text-center"> <a class="" target= "_blank" href="http://achyutasamanta.com/"><img class="img-responsive img-thumbnail logo" src="Images/sir2.jpg"></a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Forms  -->

            <div class="row">

                <div class="col-lg-12">
                    <div class="page-header">

                        <h1 id="forms">Registration Form <span class="pull-right"> <span class="pull-right"> <a href="admin/index.php" class="btn btn-primary">Go to reports</a> &nbsp; <a href="logout.php" class="btn btn-primary">Logout</a> </span> </span> </h1>
                    </div>
                </div>
            </div>
            <div class="row well">
                <div class="row">
                    <div class="col-lg-12" id="error-container">
                        <div class="alert alert-dismissable alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong id="error"></strong> </div>
                    </div>
                    <div class="col-lg-12" id="success-container">
                        <div class="alert alert-dismissable alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong id="success"></strong> </div>
                    </div>
                    <div class="col-lg-12" id="info-container">
                        <div class="alert alert-dismissable alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong id="info"></strong> </div>
                    </div>
                </div>
                <form name= "studentRegistration" action=""  method="post" enctype="multipart/form-data" id="studentRegistration" onsubmit="return validateStudentRegistration();">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs nav-justified nav-tabs-top" role="tablist">
                            <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General Information</a></li>
                            <li role="presentation"><a href="#house" aria-controls="house" role="tab" data-toggle="tab">Household</a></li>
                            <li role="presentation"><a href="#income" aria-controls="income" role="tab" data-toggle="tab">Annual income</a></li>
                            <li role="presentation"><a href="#sanitation" aria-controls="sanitation" role="tab" data-toggle="tab">Sanitaion &amp; Health</a></li>
                            <li role="presentation"><a href="#education" aria-controls="education" role="tab" data-toggle="tab">Education</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
                                <fieldset>
                                    <legend>General Information By Students/Parents</legend>
                                    <table class="table">
                                    <tr>
                                            <td class="col-lg-1"><b>100.</b></td>
                                            <td>Enter your BPL card no</td>
                                            <td><input type="text" name="bpl_card_no" id="bpl_card_no" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-1"><b>101.</b></td>
                                            <td class="col-lg-3">Name of the student</td>
                                            <td class="col-lg-5"><input class="form-control" type="text" name="name" id="foc0"></td>
                                            <td class="col-lg-2"><div class="thumbnail" style="position:absolute;width:193px">
                                                    <img class="well" id="previewing1" src="Images/default-profile-pic.png" alt="No Image Selected Yet !" />
                                                    <div class="caption" style="padding:0px">
                                                        <div id="selectImage">
                                                            <form id="uploadimage1" action="" method="post" enctype="multipart/form-data">
                                                                <label>
                                                                    <div id="message1"></div>
                                                                </label>
                                                                <br/>
                                                                <input type="file" name="file1" id="file1" style="width:190;float:left;padding:0px;margin-bottom:0px"/>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-1"><b>101.1.</b></td>
                                            <td>Year you joined</td>
                                            <td><select class="form-control" name="yoj">
                                                    <option value="">-- Select One --</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1997">1997</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1999">1999</option>
                                                    <option value="2000">2000</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2011">2011</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2015">2015</option>
                                                </select></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-1"><b>101.2.</b></td>
                                            <td>Class you joined</td>
                                            <td>
                                                <select class="form-control" name="coj" id="coj" onChange="showTextBox(this.id)">
                                                    <option value="">-- Select One --</option>
                                                    <option value="I">I</option>
                                                    <option value="II">II</option>
                                                    <option value="III">III</option>
                                                    <option value="IV">IV</option>
                                                    <option value="V">V</option>
                                                    <option value="VI">VI</option>
                                                    <option value="VII">VII</option>
                                                    <option value="VIII">VIII</option>
                                                    <option value="IX">IX</option>
                                                    <option value="X">X</option>
                                                    <option value="2 Science">+2 Science</option>
                                                    <option value="2 Commerce">+2 Commerce</option>
                                                    <option value="2 Arts">+2 Arts</option>
                                                    <option value="3 Science">+3 Science</option>
                                                    <option value="3 Commerce">+3 Commerce</option>
                                                    <option value="3 Arts">+3 Arts</option>
                                                    <option value="pg">Post Graduation</option>  
		   	                                        <option>PhD Scholar</option>
                                        		    <option>ITI</option>
                                        		    <option>DIPLOMA</option>
                                        		    <option>B-TECH</option>
                                        		    <option>M-TECH</option>
                                        		    <option>NURSHING</option>
                                        		    <option>MBBS</option>
                                        		    <option>MBA</option>
                                        		    <option>BBA</option>
                                        		    <option>BCA</option>
                                        		    <option>MCA</option>
                                        		    <option>BIO-TECH</option>
                                        		    <option>LAW</option>
                                        		    <option>FILM & MEDIA</option>
                                        		    <option>FASHION TECHONLOGY</option>
                                        		    <option>DENTAL SCIENCE(BDS)</option>
                                                </select>
                                                <input type="text" name="pg_stream_coj" id="distance" class="form-control" style="display: none;" placeholder="PG Specialization">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>101.3.</b></td>
                                            <td>How you came to know about <strong>KISS</strong> ?</td>
                                            <td><input class="form-control" type="text" name="know"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>101.4.</b></td>
                                            <td>Gender</td>
                                            <td><select class="form-control" name="gender">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>101.5.</b></td>
                                            <td>Marital status</td>
                                            <td><select class="form-control" name="Mstatus">
                                                    <option>Unmarried</option>
                                                    <option>Married</option>
                                                </select></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>102.</b></td>
                                            <td>Class </td>
                                            <td>
                                                <select class="form-control" name="standard" id = "standard" onChange="showTextBoxClass(this.id);
                                                        showYear(this.value);">
                                                    <option value="">-- Select One --</option>
                                                    <option value="I">I</option>
                                                    <option value="II">II</option>
                                                    <option value="III">III</option>
                                                    <option value="IV">IV</option>
                                                    <option value="V">V</option>
                                                    <option value="VI">VI</option>
                                                    <option value="VII">VII</option>
                                                    <option value="VIII">VIII</option>
                                                    <option value="IX">IX</option>
                                                    <option value="X">X</option>
                                                    <option value="+2 Science">+2 Science</option>
                                                    <option value="+2 Commerce">+2 Commerce</option>
                                                    <option value="+2 Arts">+2 Arts</option>
                                                    <option value="+3 Science">+3 Science</option>
                                                    <option value="+3 Commerce">+3 Commerce</option>
                                                    <option value="+3 Arts">+3 Arts</option>
                                                    <option value="pg">Post graduation</option>
                                                    <option value="PhD Scholar">PhD Scholar</option>
                                                </select>
                                            </td>
                                            <td><input type="text" name="pg" id="class" class="form-control" style="display: none;" placeholder="PG Specialization">
                                                <select name="+2year" id="+2year" class="form-control" style="display: none;">
                                                    <option value="">-select-</option>
                                                    <option value="+2 1st Year">+2 1st Year</option>
                                                    <option value="+2 2nd Year">+2 2nd Year</option>
                                                </select>
                                                <select name="+3year" id="+3year" class="form-control" style="display: none;">
                                                    <option value="">-select-</option>
                                                    <option value="+3 1st Year">+3 1st Year</option>
                                                    <option value="+3 2nd Year">+3 2nd Year</option>
                                                    <option value="+3 3rd Year">+3 3rd Year</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><b>103.</b></td>
                                            <td>Section</td>
                                            <td><input type="text" class="form-control" name="section"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>104.</b></td>
                                            <td>Roll no.</td>
                                            <td><input class="form-control" type="text" name="rollNo"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>104.1.</b></td>
                                            <td>Blood group</td>
                                            <td><select class="form-control" name="bgroup">
                                                    <option value="">-- Select One --</option>
                                                    <option value="O +ve">O +ve</option>
                                                    <option value="O -ve">O -ve</option>
                                                    <option value="A +ve">A +ve</option>
                                                    <option value="A +ve">A -ve</option>
                                                    <option value="B +ve">B +ve</option>
                                                    <option value="B -ve">B -ve</option>
                                                    <option value="AB +ve">AB +ve</option>
                                                    <option value="AB -ve">AB -ve</option>
                                                </select></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>104.2.</b></td>
                                            <td>DOB</td>
                                            <td><select class="form-control pull-left" name="date" style="width:90px">
                                                    <option value="">Date</option>
                                                    <?php
                                                    for ($i = 1; $i < 32; $i++) {
                                                        ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <select class="form-control pull-left" name="month" style="width:90px">
                                                    <option value="">Month</option>
                                                    <option value="Jan">Jan</option>
                                                    <option value="Feb">Feb</option>
                                                    <option value="Mar">Mar</option>
                                                    <option value="Apr">Apr</option>
                                                    <option value="May">May</option>
                                                    <option value="Jun">Jun</option>
                                                    <option value="Jul">Jul</option>
                                                    <option value="Aug">Aug</option>
                                                    <option value="Sept">Sept</option>
                                                    <option value="Oct">Oct</option>
                                                    <option value="Nov">Nov</option>
                                                    <option value="Dec">Dec</option>
                                                </select>
                                                <select class="form-control clearfix" name="years" style="width:90px">
                                                    <option value="">Year</option>
                                                    <?php
                                                    for ($i = 1975; $i < 2020; $i++) {
                                                        ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>105.</b></td>
                                            <td>Name of the mentor</td>
                                            <td><input class="form-control" type="text" name="mentor"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>106.</b></td>
                                            <td>Contact No. Of Mentor</td>
                                            <td><input class="form-control" type="text" name="mentor_ph"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>106.1.</b></td>
                                            <td>Name Of Local Gaurdian</td>
                                            <td><input class="form-control" type="text" name="local_gaurdian"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>106.2.</b></td>
                                            <td>Contact No. Of Local Gaurdian</td>
                                            <td><input class="form-control" type="text" name="Lcontact"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>106.3.</b></td>
                                            <td>Contact No. Of Your Parents</td>
                                            <td><input class="form-control" type="text" name="Pcontact"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><table class="table table-bordered" >
                                                    <tr>
                                                        <th></th>
                                                        <th>Information</th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td><b>107</b></td>
                                                        <td>Name of the Mother</td>
                                                        <td><input class="form-control" type="text" name="motherName" ></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>108</b></td>
                                                        <td>Name of the Father</td>
                                                            <td><input class="form-control" type="text" name="fatherName"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>109</b></td>
                                                        <td>Name of the State</td>
                                                        <td><!--<input type="text" class="form-control" name="state" id="txt_state" style="display:none">-->

                                                            <select class="form-control" name="state" id="state" onChange="showDistrict(this.value);">
                                                                <option value="">-- Select One --</option>
                                                                <option value="Assam">Assam</option>
                                                                <option value="Chattisgarh">Chattisgarh</option>
                                                                <option value="Jharkhand">Jharkhand</option>
                                                                <option value="Mizoram">Mizoram</option>
                                                                <option value="Odisha">Odisha</option>
                                                                <!--<option value="other">other</option>-->
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>110</b></td>
                                                        <td>Name of the District</td>
                                                        <td><select class="form-control" name="district_name" id="district_name" onChange="showBlock(this.value, state.id);">
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>111</b></td>
                                                        <td>Name of the Block</td>
                                                        <td><select class="form-control" name="block_name" id="block_name">
                                                                <!-- onchange="findDistance(this.value);" -->

                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>112</b></td>
                                                        <td>Name of the Gram Panchaayat</td>
                                                        <td><input class="form-control" type="text" name="panchayat" ></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>113</b></td>
                                                        <td>Name of the Village</td>
                                                        <td><input class="form-control" type="text" name="village" ></td>
                                                    </tr>
                                                </table></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>113.1.</b></td>
                                            <td>Distance from your village to <strong>KISS</strong> </td>
                                            <td><input class="form-control" type="text" name="distance_village" id="distance_village"></td>
                                        </tr>
                                        <tr>
                                            <td><b>114.</b></td>
                                            <td>Name Of the tribe</td>
                                            <td><input type="radio" name="tribe" value="scheduled" onChange="showTribeTypes(this.value);" style="margin-left: 1%;margin-right: 2%;">
                                                Scheduled Tribes
                                                <input type="radio" name="tribe" value="primitive" onChange="showTribeTypes(this.value);" style="margin-left: 7%;margin-right: 2%;">
                                                Primitive Tribes </td>
                                        </tr>
                                        <tr>
                                        <td></td>
                                            <td></td>
                                            <td>
                                                <select name="sch_tribes" id="sch_tribes" class="form-control" style="display: none;">
                                                    <option value="">--Select Scheduled Tribe--</option>
                                                    <?php 
                                                    /*$conn=mysqli_connect("localhost","root","","innovado_kiss");*/
                                                    $query= "SELECT * FROM `scheduled_tribe`";
                                                    $result=mysqli_query($con,$query);
                                                    while ($row = mysqli_fetch_array($result)){  
                                                    ?> <option><?php echo $row["scheduled_tribe"]; ?></option>
                                                    <?php 
                                                    }
                                                    ?>
                                                </select>
                                                <select name="prm_tribes" id="prm_tribes" class="form-control" style="display: none;">
                                                    <option value="">--Select Primitive Tribe--</option>
                                                     <?php 
                                                    /*$conn=mysqli_connect("localhost","root","","innovado_kiss");*/
                                                    $query= "SELECT * FROM `primitive_tribe`";
                                                    $result=mysqli_query($con,$query);
                                                    while ($row = mysqli_fetch_array($result)){
                                                    ?> <option><?php echo $row["primitive_tribe"]; ?></option>
                                                    <?php 
                                                    }
                                                    ?>
                                                </select>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>114.1.</b>
                                            </td>
                                            <td>


                                                Dialect you speak


                                            </td>
                                            <td>
                                                <select name="dialect" id="dialect" class="form-control">
                                                    <option value="">--Select--</option>
                                                     <?php 
                                                    /*$conn=mysqli_connect("localhost","root","","innovado_kiss");*/
                                                    $query= "SELECT * FROM `dialect`";
                                                    $result=mysqli_query($con,$query);
                                                    while ($row = mysqli_fetch_array($result)){
                                                    ?> <option><?php echo $row["dialect"]; ?></option>
                                                    <?php 
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>114.2.</b></td>
                                            <td>Whether the student belongs to differently-abled category?</td>
                                            <td><select class="form-control" name="belongs">
                                                    <option value="">--Select--</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>115.</b></td>
                                            <td>Religion</td>
                                            <td><select class="form-control" name="religion" id="religion" onChange="showTextarea(this.id);">
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Muslim">Muslim</option>
                                                    <option value="Christian">Christian</option>
                                                    <option value="others">others</option>
                                                </select></td>
                                            <td><input type="text" class="form-control" name="textarea_religion" id="textarea_religion" style="display: none;"></td>
                                        </tr>
                                    </table>
                                </fieldset>
                            </div>
                            <div role="tabpanel" class="well modal-content form-horizontal tab-pane fade" id="house">
                                <fieldset>
                                    <legend>Household : Background Information</legend>
                                </fieldset>
                                <table class="table">
                                    <tr>
                                        <td class="col-lg-1"><b>116.</b></td>
                                        <td class="col-lg-10" colspan="2">Please mention some background informatin about all indivisual members of the household</td>
                                        <td class="col-lg-1">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="col-lg-8"><table class="table table-bordered">
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Category</th>
                                                    <th>MALE</th>
                                                    <th>FEMALE</th>
                                                    <th>TOTAL</th>
                                                </tr>
                                                <tr>
                                                    <td><b>116 A.</b></td>
                                                    <td>0 to 6 Years Members</td>
                                                    <td><input class="form-control row1 male_row" id="male1" name="male1" value="0" type="text" onKeyUp="calculteTotalMember('row1')"></td>
                                                    <td><input class="form-control row1 female_row" id="female1" name="female1" value="0" type="text"  onkeyup="calculteTotalMember('row1')"></td>
                                                    <td><input class="form-control" id="total1" name="total1" value="0" type="text" ></td>
                                                </tr>
                                                <tr>
                                                    <td><b>116 B.</b></td>
                                                    <td>7-17 years Members</td>
                                                    <td><input class="form-control row2 male_row" id="male2" name="male2" value="0" type="text"  onkeyup="calculteTotalMember('row2')"></td>
                                                    <td><input class="form-control row2 female_row" id="female2" name="female2" value="0" type="text"  onkeyup="calculteTotalMember('row2')"></td>
                                                    <td><input class="form-control" id="total2" name="total2" type="text" value="0" ></td>
                                                </tr>
                                                <tr>
                                                    <td><b>116 C.</b></td>
                                                    <td>Adults</td>
                                                    <td><input class="form-control  row3 male_row" id="male3" name="male3" type="text" value="0"  onkeyup="calculteTotalMember('row3')"></td>
                                                    <td><input class="form-control  row3 female_row" id="female3" name="female3" type="text" value="0" onKeyUp="calculteTotalMember('row3')"></td>
                                                    <td><input class="form-control" id="total3" name="total3" type="text" value="0" ></td>
                                                </tr>
                                                <tr>
                                                    <td><b>117.</b></td>
                                                    <td>Total members in the family</td>
                                                    <td><input class="form-control row4" id="male_total" name="male_total" value="0" type="text" ></td>
                                                    <td><input class="form-control row4" id="female_total" name="female_total" value="0" type="text" ></td>
                                                    <td><input class="form-control" type="text" name="total_member" value="0" id="total_member"></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td><b>118.</b></td>
                                        <td colspan="2"> Details of yourbrother / sister/ relatives studying in <strong>KISS</strong></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><b>Education</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><table class="table table-bordered">
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>Class</th>
                                                    <th>Relation (Specify if twin)</th>
                                                </tr>
                                                <tr>
                                                    <td><b>119</b></td>
                                                    <td><input class="form-control" type="text" name="rel_name[]"></td>
                                                    <td><input class="form-control" type="text" name="rel_class[]"></td>
                                                    <td><select class="form-control" name="relationship[]">
                                                            <option value="">--Select--</option>
                                                            <option>Brother</option>
                                                            <option>Sister</option>
                                                            <option>Cousin Brother</option>
                                                            <option>Cousin Sister</option>
                                                            <option>Nephew</option>
                                                            <option>Niece</option>
                                                            <option>Uncle</option>
                                                            <option>Aunt</option>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b>120</b></td>
                                                    <td><input class="form-control" type="text" name="rel_name[]"></td>
                                                    <td><input class="form-control" type="text" name="rel_class[]"></td>
                                                    <td><select class="form-control" name="relationship[]">
                                                            <option value="">--Select--</option>
                                                            <option>Brother</option>
                                                            <option>Sister</option>
                                                            <option>Cousin Brother</option>
                                                            <option>Cousin Sister</option>
                                                            <option>Nephew</option>
                                                            <option>Niece</option>
                                                            <option>Uncle</option>
                                                            <option>Aunt</option>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b>121</b></td>
                                                    <td><input class="form-control" type="text" name="rel_name[]"></td>
                                                    <td><input class="form-control" type="text" name="rel_class[]"></td>
                                                    <td><select class="form-control" name="relationship[]">
                                                            <option value="">--Select--</option>
                                                            <option>Brother</option>
                                                            <option>Sister</option>
                                                            <option>Cousin Brother</option>
                                                            <option>Cousin Sister</option>
                                                            <option>Nephew</option>
                                                            <option>Niece</option>
                                                            <option>Uncle</option>
                                                            <option>Aunt</option>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b>122</b></td>
                                                    <td><input class="form-control" type="text" name="rel_name[]"></td>
                                                    <td><input class="form-control" type="text" name="rel_class[]"></td>
                                                    <td><select class="form-control" name="relationship[]">
                                                            <option value="">--Select--</option>
                                                            <option>Brother</option>
                                                            <option>Sister</option>
                                                            <option>Cousin Brother</option>
                                                            <option>Cousin Sister</option>
                                                            <option>Nephew</option>
                                                            <option>Niece</option>
                                                            <option>Uncle</option>
                                                            <option>Aunt</option>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b>123</b></td>
                                                    <td><input class="form-control" type="text" name="rel_name[]"></td>
                                                    <td><input class="form-control" type="text" name="rel_class[]"></td>
                                                    <td><select class="form-control" name="relationship[]">
                                                            <option value="">--Select--</option>
                                                            <option>Brother</option>
                                                            <option>Sister</option>
                                                            <option>Cousin Brother</option>
                                                            <option>Cousin Sister</option>
                                                            <option>Nephew</option>
                                                            <option>Niece</option>
                                                            <option>Uncle</option>
                                                            <option>Aunt</option>
                                                        </select></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><b>Occupation</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td><b>124</b></td>
                                                    <td><b>125</b></td>
                                                    <td><b>126</b></td>
                                                </tr>
                                                <tr>
                                                    <td>Total no. of Male earning members</td>
                                                    <td> No. of female earning members</td>
                                                    <td>Family Occupation*</td>
                                                </tr>
                                                <tr>
                                                    <td><input class="form-control" type="text" name="male_earn"></td>
                                                    <td><input class="form-control" type="text" name="female_earn"></td>
                                                    <td>
                                                        <table class="table" border="0">
                                                            <tr>
                                                                <td>A. Primary <br>
                                                                    <input class="form-control" type="text" name="erning_primary"></td>
                                                                <td>B. Secondary <br>
                                                                    <input class="form-control" type="text" name="erning_secondary"></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><b>*Occupation code:</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><table class="table table-bordered no-pad" >
                                                <tr>
                                                    <td><table class="table">
                                                            <tr>
                                                                <td>Farmer/cultivator= 1</td>
                                                                <td>Non-agri-laborer= 4</td>
                                                                <td>Business= 7</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Homemaker(housewife)= 2</td>
                                                                <td>salaried job= 5</td>
                                                                <td>student= 8</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Agri-laborer= 3</td>
                                                                <td>Artisan= 6</td>
                                                                <td>unemployed= 9</td>
                                                            </tr>
                                                        </table></td>
                                                    <td> Others(specify)= 10 <br>
                                                        <textarea name="occu_code" class="form-control"></textarea></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td><b>127.</b></td>
                                        <td> Drinking Water</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><table class="table table-bordered">
                                                <tr>
                                                    <td></td>
                                                    <td>Source of drinking water</td>
                                                    <td><b>Ownership</b> <br>
                                                        Private=1, Public=2, NA=0</td>
                                                    <td><b>Quality of Drinking water</b> <br>
                                                        Good=1,Average=2,Poor=3,Unhygienic=4, NA=0</td>
                                                </tr>
                                                <tr>
                                                    <td>A</td>
                                                    <td>Open well</td>
                                                    <td><select class="form-control" name="openwell">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select></td>
                                                    <td><select class="form-control" name="openwell2">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td>B</td>
                                                    <td>Tube well</td>
                                                    <td><select class="form-control" name="tubewell">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select></td>
                                                    <td><select class="form-control" name="tubewell2">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td>C</td>
                                                    <td>Piped</td>
                                                    <td><select class="form-control" name="piped">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select></td>
                                                    <td><select class="form-control" name="piped2">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td>D</td>
                                                    <td>Pond/tank/river</td>
                                                    <td><select class="form-control" name="ptr">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select></td>
                                                    <td><select class="form-control" name="ptr2">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td>E</td>
                                                    <td>Others(specify) <br>
                                                        <textarea class="form-control"></textarea></td>
                                                    <td><select class="form-control" name="others">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select></td>
                                                    <td><select class="form-control" name="others2">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                        </select></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Remarks (if any):</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Specific problem with drinking water(if any)......................</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><textarea class="form-control" name="waterplm"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Livestock and poultry assets</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><table class="table table-bordered">

                                                <tr>
                                                    <td><b>codes</b></td>
                                                    <td><b>category</b></td>
                                                    <td>Number</td>
                                                </tr>
                                                <tr>
                                                    <td><b>128</b></td>
                                                    <td>cow</td>
                                                    <td><input class="form-control" type="text" name="cow"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>129</b></td>
                                                    <td>Bullock</td>
                                                    <td><input class="form-control" type="text" name="bullock"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>130</b></td>
                                                    <td>Buffalo</td>
                                                    <td><input class="form-control" type="text" name="buffalo"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>131</b></td>
                                                    <td>calf</td>
                                                    <td><input class="form-control" type="text" name="calf"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>132</b></td>
                                                    <td>Goat/sheep</td>
                                                    <td><input class="form-control" type="text" name="sheep"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>133</b></td>
                                                    <td>poultry</td>
                                                    <td><input class="form-control" type="text" name="poultry"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>134</b></td>
                                                    <td>others(specify)</td>
                                                    <td><input class="form-control" type="text" name="others"></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td><b>135.</b></td>
                                        <td class="col-lg-4"><b>House Type</b></td>
                                        <td colspan="2"><label class="checkbox-inline">
                                                <input type="checkbox" name="mud_house_hut" value="Mud House/hut"  class="form-control">
                                                Mud House/hut </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="thatched_house" value="Thatched house"  class="form-control">
                                                Thatched house </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="semi_pucca" value="Semi Pucca"  class="form-control">
                                                Semi Pucca </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="Pucca" value="Pucca"  class="form-control">
                                                Pucca </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="Other" value="Any Other"  class="form-control">
                                                Any Other </label></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><b>No.of rooms</b></td>
                                        <td colspan="2"><input type="text" name="mudhouse" id="mudhouse" style="width: 50px;">
                                            <input type="text" name="thachedhouse" id="thachedhouse" style="width: 50px;margin-left: 14%;">
                                            <input type="text" name="semipucca" id="semipucca" style="width: 50px;margin-left: 15%;">
                                            <input type="text" name="pucca" id="pucca" style="width: 50px;margin-left: 8%;">
                                            <input type="text" name="other" id="other" style="width: 50px;margin-left: 4%;"></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><b>Other capital assets</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <table class="table table-bordered">

                                                <tr>
                                                    <td><b>Codes</b></td>
                                                    <td><b>Assets</b></td>
                                                    <td><b>Number</b></td>
                                                </tr>
                                                <tr>
                                                    <td><b>136</b></td>
                                                    <td>Bullock Cart</td>
                                                    <td><input class="form-control" type="text" name="bullock_cart"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>137</b></td>
                                                    <td>Plough</td>
                                                    <td><input class="form-control" type="text" name="plough"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>138</b></td>
                                                    <td>Thresher</td>
                                                    <td><input class="form-control" type="text" name="thresher"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>139</b></td>
                                                    <td>Cycle/Motor Cycle</td>
                                                    <td><input class="form-control" type="text" name="vehicle"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>140</b></td>
                                                    <td>TV</td>
                                                    <td><input class="form-control" type="text" name="tv"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>141</b></td>
                                                    <td>Radio</td>
                                                    <td><input class="form-control" type="text" name="radio"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>142</b></td>
                                                    <td> Electric Fan</td>
                                                    <td><input class="form-control" type="text" name="fan"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>143</b></td>
                                                    <td>Other</td>
                                                    <td><input class="form-control" type="text" name="other"></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td><b>144.</b></td>
                                        <td>&nbsp;&nbsp;What types of festivals observed in your village ?</td>
                                        <td><input class="form-control" type="text" name="festivalstype"></td>
                                    </tr>
                                    <tr>
                                        <td><b>144.1.</b></td>
                                        <td>&nbsp;&nbsp;Types of dances and songs you perform in your festivals?</td>
                                        <td><input class="form-control" type="text" name="dance_song_type"></td>
                                    </tr>
                                    <tr>
                                        <td><b>145.</b></td>
                                        <td>&nbsp;&nbsp;What are the utensils used in your kitchen</td>
                                        <td><input class="form-control" type="text" name="utensilType"></td>
                                    </tr>
                                    <tr>
                                        <td><b>146.</b></td>
                                        <td>&nbsp;&nbsp;Availability of food (on daily basis) in your family?</td>
                                        <td><select class="form-control" name="food_avail">
                                                <option>Sufficient</option>
                                                <option>Average</option>
                                                <option>Insufficient</option>
                                            </select></td>
                                    </tr>
                                </table>
                            </div>
                            <div role="tabpanel" class="well modal-content form-horizontal tab-pane fade" id="income">
                                <fieldset>
                                    <legend>Annual Income</legend>
                                    <table class="table">
                                        <tr>
                                            <td class="col-lg-1"><b>147.</b></td>
                                            <td class="col-lg-10" colspan="2">Income source of the household</b></td>
                                            <td class="col-lg-1">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>147.1.</b></td>
                                            <td><span>Agriculture</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><table class="table table-bordered">
                                                    <tr>
                                                        <th>Crops</th>
                                                        <th>Area</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Paddy</td>
                                                        <td><input type="text" name="paddy" id="foc2" style="width: 83%;height: 120%;border: 1px solid #cccccc;color: #555555;padding: 6px 12px;font-size: 14px;">
                                                            <select name="paddy_measure" style="height: 84%;border: 1px solid #cccccc;">
                                                                <option value="">--Select--</option>
                                                                <option value="Decimal">Decimal</option>
                                                                <option value="Gunth">Gunth</option>
                                                                <option value="Acre">Acre</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other cash crops</td>
                                                        <td><input type="text" name="other_corp" style="width: 83%;height: 120%;border: 1px solid #cccccc;color: #555555;padding: 6px 12px;font-size: 14px;">
                                                            <select name="cash_crop_measure" style="height: 84%;border: 1px solid #cccccc;">
                                                                <option value="">--Select--</option>
                                                                <option value="Decimal">Decimal</option>
                                                                <option value="Gunth">Gunth</option>
                                                                <option value="Acre">Acre</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Minor Forest Produces</td>
                                                        <td><input type="text" name="forest" style="width: 83%;height: 120%;border: 1px solid #cccccc;color: #555555;padding: 6px 12px;font-size: 14px;">
                                                            <select name="minor_forest_measure" style="height: 84%;border: 1px solid #cccccc;">
                                                                <option value="">--Select--</option>
                                                                <option value="Decimal">Decimal</option>
                                                                <option value="Gunth">Gunth</option>
                                                                <option value="Acre">Acre</option>
                                                            </select></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td><b>147.2.</b></td>
                                            <td><span>Livestock</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><table class="table table-bordered">
                                                    <tr>
                                                        <th>What you sale from livestock</th>
                                                        <th>Quantity</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Milk</td>
                                                        <td><input type="text" class="form-control" name="milk_qun"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Poultry</td>
                                                        <td><input type="text" class="form-control" name="poultry_qun"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cow</td>
                                                        <td><input type="text" class="form-control" name="cow_qun"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bullocks</td>
                                                        <td><input type="text" class="form-control" name="bullock_qun"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Fish</td>
                                                        <td><input type="text" class="form-control" name="fish_qun"></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td><b>147.3.</b></td>
                                            <td colspan="3"><span class="pull-left">Daily wage</span> <span class="pull-right" style="margin-right: 15%;">Working Days</span>
                                                </th>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><table class="table table-bordered">
                                                    <tr>
                                                        <td>Daily Labour(MGNREGA) Card No.:
                                                            <input type="text" class="form-control" name="nrega_card_no"></td>
                                                        <td><input type="text" class="form-control" name="nrega"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Agri-labour</td>
                                                        <td><input type="text" class="form-control" name="agri_labour"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Migration</td>
                                                        <td><input type="text" class="form-control" name="migration"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other</td>
                                                        <td><input type="text" class="form-control" name="other_wage"></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><span>Total Annual Income:</span></td>
                                            <td><input type="text" name="total_annual_income" id="total_annual_income" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><b>147.4.</b> </td>
                                            <td><span>Government schemes/programmes your family availed? </span></td>
                                            <td colspan="2" class="label240">
                                                <div>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td>

                                                                <label class="checkbox-inline" style="width:204px;">
                                                                    <input type="checkbox" name="scheme[]" value="BPL" id="bpl" onClick="check();"  class="form-control">
                                                                    BPL </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="scheme[]" value="Antodaya Annapurna Yojana" id="aay" onClick="check2();"  class="form-control">
                                                                    Antodaya Annapurna Yojana </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="scheme[]" value="IAY"  class="form-control" id="iay" onClick="check3();">
                                                                    IAY </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>  
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="scheme[]" value="KISSAN Credit Card"  class="form-control" id="kcc" onClick="check4();">
                                                                    KISSAN Credit Card </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="scheme[]" value="Health Card"  class="form-control" id="hc" onClick="check5();" id="hc" onClick="check5();">
                                                                    Health Card </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="scheme[]" value="Green Card"  class="form-control" id="gc" onClick="check6();">
                                                                    Green Card </label>
                                                            </td>
                                                        </tr>
                                                        <tr>   
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="scheme[]" value="Lal Card"  class="form-control" id="lc" onClick="check7();">
                                                                    Lal Card </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="oth_scheme" value="others"  class="form-control"  id="card" onChange="showTextarea(this.id);">
                                                                    Others </label>
                                                            </td>
                                                            <td>
                                                                <textarea name="other_card_no" class="form-control" id="textarea_card" style="display: none;"></textarea>
                                                            </td>
                                                        </tr>

                                                    </table>     
                                                </div>
                                                <div><span>
                                                        <table width="100%"  border="0">
                                                            
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text1" style="display:none;" placeholder="BPL No."></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text2" style="display:none;" placeholder="Antodaya Annapurna Yojana"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text3" style="display:none;" placeholder="IAY No."></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text4" style="display:none;" placeholder="KISSAN Credit Card"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text5" style="display:none;" placeholder="Health Card"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text6" style="display:none;" placeholder="Green Card"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text7" style="display:none;" placeholder="Lal Card"></td>
                                                            </tr>
                                                        </table>
                                                                                                                <!--<input class="form-control" type="text" name="" placeholder="Card Number">-->
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>147.5.</b> </td>
                                            <td><span>Does your parents have </span></td>
                                            <td colspan="2" class="label240">
                                                <div>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px;">
                                                                    <input type="checkbox" name="account[]" value="Bank Account"  class="form-control" id="bank_acc" onClick="Check1();">
                                                                    Bank Account </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="account[]" value="Debit/Credit Card"  class="form-control" id="db_card" onClick="Check2();" >
                                                                    Debit/Credit Card </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="account[]" value="Postal Savings"  class="form-control" id="ps" onClick="Check3();">
                                                                    Postal Savings </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>  
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="account[]" value="others"  class="form-control" id="account" onChange="showTextarea(this.id);">
                                                                    Others </label>
                                                            </td>
                                                            <td>
                                                                <textarea name="bank[]" class="form-control" id="textarea_account" style="display: none;"></textarea>
                                                            </td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                    </table>    
                                                </div>
                                                <div>

                                                    <table width="100%" border="0">
                                                        <tr>
                                                            <td><input class="form-control" type="hidden" name="" placeholder="Account Number"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="bank[]" id="text_1" style="display:none;" placeholder="Bank Account"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="bank[]" id="text_2" style="display:none;" placeholder="Debit/Credit Card"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="bank[]" id="text_3" style="display:none;" placeholder="Postal Savings"></td>
                                                        </tr>

                                                    </table>
                                                                                                        <!--<input class="form-control" type="text" name="" placeholder="Account Number">-->
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>147.6.</b> </td>
                                            <td><span>Does your parents have following identification cards?</span></td>
                                            <td colspan="2" class="label240">
                                                <div>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px;">
                                                                    <input type="checkbox" name="identification[]" value="Voter Card" id="v_card" onClick="check_1();"  class="form-control">
                                                                    Voter Card </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="identification[]" value="Addhar Card" id="a_card" onClick="check_2();"  class="form-control">
                                                                    Addhar Card </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="identification[]" value="Passport" id="passport" onClick="check_3();" class="form-control">
                                                                    Passport </label>
                                                            </td>
                                                        </tr>
                                                        <tr>    
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="identification[]" value="others"  class="form-control" id="identification" onChange="showTextarea(this.id);">
                                                                    Any Other </label>
                                                            </td>
                                                            <td>
                                                                <textarea name="id_card[]" class="form-control" id="textarea_identification" style="display: none;"></textarea>
                                                            </td>
                                                        </tr>
                                                    </table>    
                                                </div>
                                                <div>

                                                    <table width="100%" border="0">
                                                        <tr>
                                                            <td><input class="form-control" type="hidden" name="" placeholder="Account Number"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="id_card[]" id="t1" style="display:none;" placeholder="Voter Card"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="id_card[]" id="t2" style="display:none;" placeholder="Addhar Card"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="id_card[]" id="t3" style="display:none;" placeholder="Passport"></td>
                                                        </tr>

                                                    </table>
                                                                                                        <!--<input class="form-control" type="text" name="" placeholder="Card Number">-->
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td><b>148.</b> </td>
                                            <td><span>What do your family use most for cooking?</span></td>
                                            <td colspan="2" class="label240">
                                                <div>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px;">
                                                                    <input type="checkbox" name="cooking[]" value="Electric Burner"  class="form-control">
                                                                    Electric Burner </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="cooking[]" value="Kerosene"  class="form-control">
                                                                    Kerosene </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="cooking[]" value="Gas"  class="form-control">
                                                                    Gas </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> 
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="cooking[]" value="Fire wood"  class="form-control">
                                                                    Fire wood </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="cooking[]" value="Cowdung cake"  class="form-control">
                                                                    Cowdung cake </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="cooking[]" value="Straw"  class="form-control">
                                                                    Straw </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> 
                                                                <label class="checkbox-inline" style="width:213px">
                                                                    <input type="checkbox" name="cooking[]" value="Bio-gas"  class="form-control">
                                                                    Bio-gas </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="margin-left:1px">
                                                                    <input type="checkbox" name="cooking[]" value="Solar Cooker"  class="form-control">
                                                                    Solar Cooker </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="cooking[]" value="others"  class="form-control"  id="cooking" onChange="showTextarea(this.id);">
                                                                    Others </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> 
                                                                <textarea class="form-control" name="cooking_other" id="textarea_cooking" style="display: none;"></textarea>
                                                            </td>
                                                        </tr>
                                                    </table>  
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td><b>149.</b> </td>
                                            <td><span>What your parents use most for lighting?</span></td>
                                            <td colspan="2" class="label240">
                                                <div>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px;">
                                                                    <input type="checkbox" name="lighting[]" value="Electric bulb/tube"  class="form-control">
                                                                    Electric bulb/tube </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="lighting[]" value="Kerosene"  class="form-control">
                                                                    Kerosene </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="lighting[]" value="Candle"  class="form-control">
                                                                    Candle </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>   
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="lighting[]" value="Solar Lantern "  class="form-control">
                                                                    Solar Lantern </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="lighting[]" value="others"  class="form-control"  id="lighting" onChange="showTextarea(this.id);">
                                                                    Other(Specify) </label>
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" name="lighting_other" id="textarea_lighting" style="display: none;"></textarea>
                                                            </td>
                                                        </tr>
                                                    </table>      
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td><b>150.</b> </td>
                                            <td><span>Whether the house is electrified?</span></td>
                                            <td><select class="form-control" name="house_electrify" id="electrified">
                                                    <option value="">Select</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><b>151.</b> </td>
                                            <td><span>What is your opinion about village road?</span></td>
                                            <td><select class="form-control" name="road" id="road" onChange="showTextarea(this.id);">
                                                    <option value="">Select</option>
                                                    <option value="Concrete Road">Concrete Road</option>
                                                    <option value="Pucca Road">Pucca Road</option>
                                                    <option value="Kucha Road">Kucha Road</option>
                                                    <option value="No Road">No Road</option>
                                                    <option value="others">Other(Specify)</option>
                                                </select></td>
                                            <td><input type="text" name="road_other" id="textarea_road" style="display: none;height: 32px;width: 190px;"></td>
                                        </tr>
                                        <tr>
                                            <td><b>152.</b> </td>
                                            <td><span>What are the road communication/transportation facilities available in your village?</span></td>
                                            <td colspan="2">

                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="road_comm[]" value="Walking"  class="form-control">
                                                                Walking </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="road_comm[]" value="Auto"  class="form-control">
                                                                Auto </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="road_comm[]" value="Tractor"  class="form-control">
                                                                Tractor </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>    
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="road_comm[]" value="Jeep"  class="form-control">
                                                                Jeep </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="road_comm[]" id="roadComm" value="others"  class="form-control" onChange="showTextarea(this.id);">
                                                                Others </label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="transport_other" id="textarea_roadComm" style="display: none;">
                                                        </td>
                                                    </tr>

                                                </table>
                                            </td>
                                            <td>
                                            <td>
                                            </td>
                                            </td>
                                        </tr>
                                        </td>

                                        </tr>

                                        <tr>
                                            <td><b>153.</b> </td>
                                            <td><span>Shops available in your village(Specify)?</span></td>
                                            <td><textarea class="form-control" name="shop_avail"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><b>154.</b></td>
                                            <td colspan="2" > <span>What are other facilities available in your village?</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"><table class="table table-bordered">
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>Name of the infrastructure</th>
                                                        <th>distance from your village</th>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Grama Panchayat Office</td>
                                                        <td><input type="text" class="form-control" name="panchayat_diss"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Anganwadi</td>
                                                        <td><input type="text" class="form-control" name="anganwadi_diss"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Primary School</td>
                                                        <td><input type="text" class="form-control" name="p_school_diss"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Secondary School</td>
                                                        <td><input type="text" class="form-control" name="s_school_diss"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>High School</td>
                                                        <td><input type="text" class="form-control" name="h_school_diss"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>College</td>
                                                        <td><input type="text" class="form-control" name="college_diss"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Public Health Centre</td>
                                                        <td><input type="text" class="form-control" name="helth_center_diss"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Post Office</td>
                                                        <td><input type="text" class="form-control" name="po_diss"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Bank</td>
                                                        <td><input type="text" class="form-control" name="bank_diss"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Police Station</td>
                                                        <td><input type="text" class="form-control" name="ps_distance"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>PDS outlet</td>
                                                        <td><input type="text" class="form-control" name="pds_distance"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Bus Stand</td>
                                                        <td><input type="text" class="form-control" name="bus_diss"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Railway Station</td>
                                                        <td><input type="text" class="form-control" name="railway_diss"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Daily Market</td>
                                                        <td><input type="text" class="form-control" name="market_diss"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Community centre</td>
                                                        <td><input type="text" class="form-control" name="community_diss"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Veterinary centre</td>
                                                        <td><input type="text" class="form-control" name="veterinary_diss"></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                    </table>
                                </fieldset>
                            </div>
                            <div role="tabpanel" class="well modal-content form-horizontal tab-pane fade" id="sanitation">
                                <fieldset>
                                    <legend>Sanitation and Health</legend>
                                    <table class="table">
                                        <tr>
                                            <td class="col-lg-1"><b>155.</b> </td>
                                            <td class="col-lg-3"><span>Sanitation</span></td>
                                            <td class="col-lg-5"><label class="checkbox-inline">
                                                    <input type="checkbox" name="sanitation[]" value="Open"  class="form-control">
                                                    Open </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="sanitation[]" value="Public Toilet"  class="form-control">
                                                    Public Toilet </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="sanitation[]" value="Private Toilet"  class="form-control">
                                                    Private Toilet </label></td>
                                            <td class="col-lg-3"></td>
                                        </tr>
                                        <tr>
                                            <td><b>156.</b></td>
                                            <td colspan="3"> <span> Ownership of Health Infrastructure available in your village ( record multiple responses ).
                                                    Please specify types of medicine used ( Ayurvedic , Homeopathic , Allopathic , Traditional etc. ) </span></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><span>Ownership</span></td>
                                            <td colspan="2">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px;">
                                                                <input type="checkbox" class="form-control" name="ownership[]" value="Government" >
                                                                Government </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="form-control" name="ownership[]" value="Private" >
                                                                Private </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" class="form-control" name="ownership[]" value="NGO-run" >
                                                                NGO-run </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>  
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="ownership" name="ownership[]" onChange="showTextarea(this.id);" class="form-control" value="others" >
                                                                others(specify) </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" class="form-control" name="ownership[]" value="Not available" >
                                                                Not available </label>
                                                        </td>
                                                        <td><textarea class="form-control" name="owner_other" id="textarea_ownership" style="display: none;"></textarea></td>
                                                    </tr>
                                                </table>  
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><span>Types of medicine</span></td>
                                            <td colspan="2">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px;">
                                                                <input type="checkbox" class="form-control" name="medicine[]" value="Ayurvedic" >
                                                                Ayurvedic </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="form-control" name="medicine[]" value="Homeopathic" >
                                                                Homeopathic </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" class="form-control" name="medicine[]" value="Allopathic" >
                                                                Allopathic </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>   
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="form-control" name="medicine[]" value="Traditional" >
                                                                Traditional </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" id="medicine" name="medicine[]" onChange="showTextarea(this.id);" class="form-control" value="others" >
                                                                others(specify) </label>
                                                        </td>
                                                        <td><textarea class="form-control" name="medicine_other" id="textarea_medicine" style="display: none;"></textarea></td>
                                                    </tr>
                                                </table>  
                                            </td>

                                        </tr>
                                    </table>
                                </fieldset>
                            </div>
                            <div role="tabpanel" class="well modal-content form-horizontal tab-pane fade" id="education">
                                <fieldset>
                                    <legend>Education</legend>
                                    <table class="table">
                                        <tr>
                                            <td colspan="2">
                                                <table class="table">
                                                    <tr>
                                                        <td class="col-lg-1"><b>157.</b></td>
                                                        <td class="col-lg-3"><span> Education Infrastructure available in your village(Specify) </span></td>
                                                        <td>
                                                            <input type="text" class="form-control" name="edu_infra" id="edu_infra">
                                                        </td>
                                                        <td class="col-lg-4"> 
                                                            <input type="text" class="form-control" name="infra_other2" id="textarea_edu" style="display: none;height:29px;width:190px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <label class="checkbox-inline" style="margin-left:10px">
                                                                <input type="checkbox" name="education[]" value="Government"  class="form-control" onChange="showCheckedValue(this.value);">Government
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="education[]" value="Private"  class="form-control" onChange="showCheckedValue(this.value);">Private
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="education[]" value="NGO-run"  class="form-control" onChange="showCheckedValue(this.value);">NGO-run
                                                            </label>
                                                            <label class="checkbox-inline" style="width:300px">
                                                                <input type="checkbox" name="other_education" value="others"  class="form-control"  id="edu" onChange="showTextarea(this.id);
                                                                        showTextBox(this.id);">Other(Specify)
                                                            </label>
                                                        </td>
                                                        <td class="col-lg-4"> 
                                                            <input type="text" class="form-control" name="infra_other" id="textarea_edu" style="display: none;height:32px;width:190px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: top;"><b>158.</b></td>
                                                        <td style="vertical-align: top;"> <span> If drop-outs,ask the causes of drop-outs(Record the multiple responses) </span></td>
                                                        <td>
                                                            <select name="dropouts" class="form-control" onChange="showDropouts(this.value);">
                                                                <option value="">--Select--</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                            <br>
                                                            <div id="dropout_tr" style="display: none">
                                                                <span name="dropout_row" id="dropout_row" style="display: none;">
                                                                    <label class="checkbox" >
                                                                        <input type="checkbox" name="drop-out[]" value="Children needed to work in order to sustain their livelihood"  class="form-control">Children needed to work in order to sustain their livelihood
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="drop-out[]" value="Children had to look after siblings"  class="form-control">Children had to look after siblings
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="drop-out[]" value="No job opportunities after education"  class="form-control">No job opportunities after education
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="drop-out[]" value="Primary school far away from the home"  class="form-control">Primary school far away from the home
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="drop-out[]" value="Secondary school far away from the home"  class="form-control">Secondary school far away from the home
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="drop-out[]" value="Security problems for girls"  class="form-control">Security problems for girls
                                                                    </label>
                                                                    <label class="checkbox" style="width:300px">
                                                                        <input type="checkbox" name="drop-out[]" value="others"  class="form-control"  id="drop-out" onChange="showTextarea(this.id);
                                                                                showTextBox(this.id);">Other(Specify)
                                                                    </label>
                                                                </span>
                                                            </div> 
                                                        </td>

                                                        <td>&nbsp;</td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>159.</b></td>
                                                        <td> <span> The subject/s you like most(Specify): </span></td>
                                                        <td><textarea class="form-control" name="subject_like"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>160.</b></td>
                                                        <td> <span> Any hobbies/habits do you have: </span></td>
                                                        <td><textarea class="form-control" name="hobbies"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>161.</b></td>
                                                        <td> <span> What was doing before joining <strong>KISS</strong>: </span></td>
                                                        <td><textarea class="form-control" name="before_kiss"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>162.</b> </td>
                                                        <td><span> What are the areas in which you have improved after joining <strong>KISS</strong>: </span></td>
                                                        <td>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="Behaviour"  class="form-control" checked="true">Behaviour
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="Discipline"  class="form-control" checked="true">Discipline
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="Smartness"  class="form-control" checked="true">Smartness
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="Education"  class="form-control" checked="true">Education
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="General Knowledge"  class="form-control" checked="true">General Knowledge
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="Vocational Education"  class="form-control" checked="true">Vocational Education
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="Sports"  class="form-control" checked="true">Sports
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="Games"  class="form-control" checked="true">Games
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_area[]" id="improved_area" value="others"  class="form-control" onChange="showTextarea(this.id);">Others
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="other_improve" id="textarea_improved_area" style="display: none;height: 32px;width: 190px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.</b></td>
                                                        <td colspan="2"> <span> Activities you have involved and enjoyed in <strong>KISS</strong> :(Specify) </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.1</b></td>
                                                        <td><span>Activity</span></td>
                                                        <td>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Debate"  class="form-control">Debate
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Essay"  class="form-control">Essay
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="GK"  class="form-control">GK
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="NSS"  class="form-control">NSS
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Scout&Guide"  class="form-control">Scout &amp; Guide
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Cub Bul-Bul"  class="form-control">Cub Bul-Bul
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Rovers Rangers"  class="form-control">Rovers Rangers
                                                                        </label>
                                                                    </td>

                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="NCC"  class="form-control">NCC
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Red Cross"  class="form-control">Red Cross
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="KYS"  class="form-control">KYS
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Peer Educator"  class="form-control">Peer Educator
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" id="activity_other" value="others"  class="form-control" onChange="showTextarea(this.id);">Others
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="other_activity" id="textarea_activity_other" style="display: none;height: 32px;width: 190px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.2</b></td>
                                                        <td> <span> Sports and Games: </span></td>
                                                        <td colspan="2">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Sprint"  class="form-control">Sprint
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Kho Kho"  class="form-control">Kho-Kho
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Archery"  class="form-control">Archery
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="sports[]" value="Tennis"  class="form-control">Tennis
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Table Tennis"  class="form-control">Table Tennis
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Rugby"  class="form-control">Rugby
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Net ball"  class="form-control">Net ball
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Cricket"  class="form-control">Cricket
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Weight lifting"  class="form-control">Weight lifting
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="sports[]" value="Lodu"  class="form-control">Lodu
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Football"  class="form-control">Football
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Soft ball"  class="form-control">Soft ball
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Hand ball"  class="form-control">Hand ball
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Base ball"  class="form-control">Base ball
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Carom"  class="form-control">Carom
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Hockey"  class="form-control">Hockey
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Chess"  class="form-control">Chess
                                                                        </label>  
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="sports[]" value="Kabadi"  class="form-control">Kabadi
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Kick boxing"  class="form-control">Kick boxing
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="others"  class="form-control"  id="sports" onChange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                        <input type="text" class="form-control" name="textarea_sports" id="textarea_sports" style="display: none;height: 32px;width:190px;">

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Judo"  class="form-control">Judo
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Volley ball"  class="form-control">Volley ball
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Athletics"  class="form-control">Athletics
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="sports[]" value="Yoga"  class="form-control">Yoga
                                                                        </label> 
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.3</b> </td>
                                                        <td><span> Music </span></td>
                                                        <td colspan="2">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px;margin-left:10px">
                                                                            <input type="checkbox" name="music[]" value="Light vocal"  class="form-control">Light vocal
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="music[]" value="Odissi vocal"  class="form-control">Odissi vocal
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="music[]" value="others"  class="form-control"  id="music" onChange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>  
                                                                        <textarea class="form-control" name="textarea_music" id="textarea_music" style="display: none;"></textarea>
                                                                    </td>
                                                                </tr>
                                                            </table>     
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><span> Dance </span></td>
                                                        <td colspan="2">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px;margin-left:10px">
                                                                            <input type="checkbox" name="dance[]" value="Odissi"  class="form-control">Odissi
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="dance[]" value="Modern"  class="form-control">Modern
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="dance[]" value="Semi Classical"  class="form-control">Semi Classical
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="dance[]" value="others"  class="form-control"  id="dance" onChange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                    </td>

                                                                    <td>  
                                                                        <textarea class="form-control" name="textarea_dance" id="textarea_dance" style="display: none;"></textarea>
                                                                    </td>
                                                                </tr>
                                                            </table>     
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><span> Instrumental </span></td>
                                                        <td colspan="2">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px;">
                                                                            <input type="checkbox" name="instrumental[]" value="Guitar"  class="form-control">Guitar
                                                                        </label>
                                                                    </td>
                                                                    <td>

                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="instrumental[]" value="Drums"  class="form-control">Drums (Pad)
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="instrumental[]" value="Keyboard"  class="form-control">Keyboard
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>  
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="instrumental[]" value="Tabla"  class="form-control">Tabla
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="instrumental[]" value="others"  class="form-control"  id="instrumental" onChange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <textarea class="form-control" name="textarea_instrumental" id="textarea_instrumental" style="display: none;" onChange="showValue(this.value);"></textarea>
                                                                    </td>
                                                                </tr>
                                                            </table>    
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.4</b></td>
                                                        <td> <span> Yoga and Meditation: </span></td>
                                                        <td>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="yoga[]" value="Yoga"  class="form-control">Yoga
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="yoga[]" value="Meditation"  class="form-control">Meditation
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="yoga[]" value="others"  class="form-control"  id="yoga" onChange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 
                                                                        <textarea class="form-control" name="textarea_yoga" id="textarea_yoga" style="display: none;" onChange="showValue(this.value);"></textarea>
                                                                    </td>
                                                                </tr>
                                                            </table>   
                                                        </td>
<!--                                                        <td>
                                                            <span style="color: red;">(To be provided.)</span>
                                                        </td>-->
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.5</b></td>
                                                        <td> <span> Vocational: </span></td>

                                                        <td>
                                                            <select class="form-control" name="vocational" id="vocational" onChange="showValue(this.value);
                                                                    showTextarea(this.id);">
                                                                <option>--Select--</option>
                                                                <option value="Computer training">Computer training</option>
                                                                <option value="Tailoring">Tailoring</option>
                                                                <option value="Recycle Paper">Recycle Paper</option>
                                                                <option value="Food Processing & Preservation">Food Processing & Preservation</option>
                                                                <option value="Composite Farming">Composite Farming</option>
                                                                <option value="Applique">Applique</option>
                                                                <option value="Incense sticks">Incense sticks</option>
                                                                <option value="Pisciculture">Pisciculture</option>
                                                                <option value="Soft toys">Soft toys</option>
                                                                <option value="Photo Framing">Photo Framing</option>
                                                                <option value="Bakery">Bakery</option>
                                                                <option value="Animal Husbandry">Animal Husbandry</option>
                                                                <option value="Painting">Painting</option>
                                                                <option value="Security Guard">Security Guard</option>
                                                                <option value="Arts and Craft">Arts and Craft</option>
                                                                <option value="Chemical Products">Chemical Products</option>
                                                                <option value="Driving">Driving</option>
                                                                <option value="Medical Atendant">Medical Atendant</option>
                                                                <option value="Mineral Water">Mineral Water</option>
                                                                <option value="others">others(specify)</option>
                                                            </select>
                                                        </td>
                                                        <td style="padding-left: 5%;width: 25%;">
                                                            <select class="form-control" name="tailoring" id="tailoring" onChange="showTextarea(this.id);" style="display: none;">
                                                                <option value="">Select Tailoring</option>
                                                                <option value="Full/Half Pant">Full Pant/Half Pant</option>
                                                                <option value="Half Shirt">Half Shirt</option>
                                                                <option value="Tunic Frock">Tunic Frock</option>
                                                                <option value="Tunic Shirt">Tunic Shirt</option>
                                                                <option value="Salwar Kameez">Salwar Kameez</option>
                                                                <option value="Casual Dresses">Casual Dresses</option>
                                                                <option value="others">others(specify)</option>
                                                            </select>    
                                                            <textarea class="form-control" name="textarea_tailoring" id="textarea_tailoring" style="display: none;"></textarea>
                                                            <select class="form-control" name="chemical" id="chemical" onChange="showTextarea(this.id);" style="display: none;">
                                                                <option value="">Select Chemical</option>
                                                                <option value="Phenyl">Phenyl</option>
                                                                <option value="Hand Wash">Hand Wash</option>
                                                                <option value="Utensil Case">Utensil Case</option>
                                                                <option value="Cloth Whitening">Cloth Whitening</option>
                                                                <option value="Detergent Liquid">Detergent Liquid</option>
                                                                <option value="Room Freshner">Room Freshner</option>
                                                                <option value="Candle">Candle</option>
                                                                <option value="others">others(specify)</option>
                                                            </select>  
                                                            <textarea class="form-control" name="textarea_chemical" id="textarea_chemical" style="display: none;"></textarea>
                                                            <select class="form-control" name="knitting" id="knitting" onChange="showTextarea(this.id);" style="display: none;">
                                                                <option value="">Select Knitting</option>
                                                                <option value="Sweater">Sweater</option>
                                                                <option value="Mufler">Muffler</option>
                                                                <option value="Cap">Cap</option>
                                                                <option value="Shawl">Shawl</option>
                                                                <option value="Baby Frock Set">Baby Frock Set</option>
                                                                <option value="Vanity Bag">Vanity Bag</option>
                                                                <option value="Purse">Purse</option>
                                                                <option value="T.V. Cover">T.V. Cover</option>
                                                                <option value="Filter Cover">Filter Cover</option>
                                                                <option value="Door Decorater">Door Decorator</option>
                                                                <option value="Baby Set">Baby Set</option>
                                                                <option value="Blouse">Blouse</option>
                                                                <option value="Jacket">Jacket</option>
                                                                <option value="Cardigan">Cardigan</option>
                                                                <option value="Water Bottle Cover">Water Bottle Cover</option>
                                                                <option value="others">others(specify)</option>
                                                            </select> 
                                                            <textarea class="form-control" name="textarea_knitting" id="textarea_knitting" style="display: none;"></textarea>
                                                            <select class="form-control" name="applique" id="applique" onChange="showTextarea(this.id);" style="display: none;">
                                                                <option value="">Select Applique</option>
                                                                <option value="Chandua">Chandua</option>
                                                                <option value="Modern Patch">Modern Patch</option>
                                                                <option value="Soft Toys">Soft Toys</option>
                                                                <option value="Shopping Bags">Shopping Bags</option>
                                                                <option value="Water Bottle Cover">Water Bottle Cover</option>
                                                                <option value="Mobile Cover">Mobile Cover</option>
                                                                <option value="Cushion with cover">Cushion with cover</option>
                                                                <option value="Sand Painting">Sand Painting</option>
                                                                <option value="Paddy Work">Paddy Work</option>
                                                                <option value="Purse">Purse</option>
                                                                <option value="Filter Cover">Filter Cover</option>
                                                                <option value="File Folder">File Folder</option>
                                                                <option value="Artificial Flower Set">Artificial Flower Set</option>
                                                                <option value="others">others(specify)</option>
                                                            </select> 
                                                            <textarea class="form-control" name="textarea_applique" id="textarea_applique" style="display: none;"></textarea>
                                                            <select class="form-control" name="art_craft" id="art_craft" onChange="showTextarea(this.id);" style="display: none;">
                                                                <option value="">Select Art & Craft</option>
                                                                <option value="Tribal Painting">Tribal Painting</option>
                                                                <option value="Tassar Painting">Tassar Painting</option>
                                                                <option value="Pattachitra">Pattachitra</option>
                                                                <option value="Textur Painting">Textur Painting</option>
                                                                <option value="Canvas Painting">Canvas Painting</option>
                                                                <option value="Poster Painting">Poster Painting</option>
                                                                <option value="Water Color Painting">Water Color Painting</option>
                                                                <option value="Oil Painting">Oil Painting</option>
                                                                <option value="Traditional Painting">Traditional Painting</option>
                                                                <option value="others">others(specify)</option>
                                                            </select>
                                                            <textarea class="form-control" name="textarea_art_craft" id="textarea_art_craft" style="display: none;"></textarea>
                                                            <input type="text" class="form-control" name="textarea_vocational" id="textarea_vocational" style="display: none;height:32px;width:190px;"></textarea>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>163.7</b></td>
                                                        <td> <span> English Access: </span></td>
                                                        <td>
                                                            <select class="form-control" name="english_access">
                                                                <option value="">--Select--</option>
                                                                <option selected>Attended</option>
                                                                <option>Not Attended</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>164.</b> </td>
                                                        <td colspan="2"><span> What are your achievements(Specify): </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sl No</th>
                                                                        <th>Name and Level of the Competition</th>
                                                                        <th>Position/Prize</th>
                                                                        <th>Place</th>
                                                                        <th>Year</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td> 1 </td>
                                                                        <td><input class="form-control" type="text" name="comp_level[]"></td>
                                                                        <td><input class="form-control" type="text" name="prize[]"></td>
                                                                        <td><input class="form-control" type="text" name="place[]"></td>
                                                                        <td><input class="form-control" type="text" name="year[]"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 2 </td>
                                                                        <td><input class="form-control" type="text" name="comp_level[]"></td>
                                                                        <td><input class="form-control" type="text" name="prize[]"></td>
                                                                        <td><input class="form-control" type="text" name="place[]"></td>
                                                                        <td><input class="form-control" type="text" name="year[]"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 3 </td>
                                                                        <td><input class="form-control" type="text" name="comp_level[]"></td>
                                                                        <td><input class="form-control" type="text" name="prize[]"></td>
                                                                        <td><input class="form-control" type="text" name="place[]"></td>
                                                                        <td><input class="form-control" type="text" name="year[]"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 4 </td>
                                                                        <td><input class="form-control" type="text" name="comp_level[]"></td>
                                                                        <td><input class="form-control" type="text" name="prize[]"></td>
                                                                        <td><input class="form-control" type="text" name="place[]"></td>
                                                                        <td><input class="form-control" type="text" name="year[]"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 5 </td>
                                                                        <td><input class="form-control" type="text" name="comp_level[]"></td>
                                                                        <td><input class="form-control" type="text" name="prize[]"></td>
                                                                        <td><input class="form-control" type="text" name="place[]"></td>
                                                                        <td><input class="form-control" type="text" name="year[]"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>165.</b> </td>
                                                        <td><span> What is your ambition: </span></td>
                                                        <td>
                                                            <select name="ambition" id="ambition" class="form-control" onChange="showTextarea(this.id);">
                                                                <option value="">--Select--</option>
                                                                <option value="Doctor">Doctor</option>
                                                                <option value="Engineer">Engineer</option>
                                                                <option value="Teacher">Teacher</option>
                                                                <option value="Nurse">Nurse</option>
                                                                <option value="Social Worker">Social Worker</option>
                                                                <option value="others">Others</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="textarea_ambition" id="textarea_ambition" style="display: none;height: 32px;width: 190px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>166.</b> </td>
                                                        <td><span> What are your plans to achieve your ambition: </span></td>
                                                        <td><textarea class="form-control" name="ambition_plan"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>167.</b> </td>
                                                        <td><span> Importance/Role of <strong>KISS</strong> in achieving your ambition: </span></td>
                                                        <td><textarea class="form-control" name="ambition_achive"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>168.</b> </td>
                                                        <td><span> How you will involve yourself for achieving the objectives of <strong>KISS</strong>: </span></td>
                                                        <td><textarea class="form-control" name="obj_achive_involve"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>169.</b> </td>
                                                        <td><span> Present behavior of the student:- </span></td>
                                                        <td><select class="form-control" name="behavior" id="behavior" onChange="showTextarea(this.id);">
                                                                <option value="">Select</option>
                                                                <option value="Shy">Shy</option>
                                                                <option value="Smart">Smart</option>
                                                                <option value="others">others(specify)</option>
                                                            </select></td>
                                                        <td><input class="form-control" type="text" name="" id="textarea_behavior" style="display: none;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>170.</b> </td>
                                                        <td><span> Any other remarks by the teacher/mentor: </span></td>
                                                        <td><textarea class="form-control" name="remark"></textarea></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                    </table>
                                </fieldset>
                                <div class="form-group">
                                    <div class="col-lg-4 col-lg-offset-4">
                                        <button type="button" onClick="register();"  name="registerStudent" class="btn btn-primary btn-sm btn-block">Submit</button>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    jQuery(function ($) {
                                        $('[data-toggle="popover"]').popover();
                                        $('[data-toggle="tooltip"]').tooltip();
                                    }
                                    );
                                </script> 
                                <!-- sample templates end -->

                            </div>
                        </div>
                        <ul class="nav nav-pills nav-justified nav-tabs-bottom" role="tablist">
                            <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab" onClick="scrolTop()">General Information</a></li>
                            <li role="presentation"><a href="#house" aria-controls="house" role="tab" data-toggle="tab" onClick="scrolTop()">Household</a></li>
                            <li role="presentation"><a href="#income" aria-controls="income" role="tab" data-toggle="tab" onClick="scrolTop()">Annual income</a></li>
                            <li role="presentation"><a href="#sanitation" aria-controls="sanitation" role="tab" data-toggle="tab" onClick="scrolTop()">Sanitaion &amp; Health</a></li>
                            <li role="presentation"><a href="#education" aria-controls="education" role="tab" data-toggle="tab" onClick="scrolTop()">Education</a></li>
                        </ul>

                    </div>
                    <div class="clearfix" style="height:50px;"></div>
                </form>
            </div>
        </div>
    </body>
</html>