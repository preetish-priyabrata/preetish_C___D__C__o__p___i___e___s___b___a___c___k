<?php
error_reporting(0);
session_start();
if($_SESSION['updation_user_id'])
  {
  $operator_id = $_SESSION['updation_user_id'];
include '../config.php';

$sid = $_REQUEST['s_id'];
include 'retrive_update_data.php';
$str = "SELECT DISTINCT * FROM std_general_information a WHERE a.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kalinga Institute of Social Sciences</title>

        <!--Date Picker-->
        <link rel="stylesheet" href="../css/jquery-ui.css">
        <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
        <script src="../js/jquery-ui.js"></script>
        
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/pastel-stream.css" />
        <link rel="stylesheet" type="text/css" href="../css/style_avi.css" />
        <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
        <script src="../js/script.js"></script>
        <script src="../js/texttoggle.js"></script>
        <script src="ajax/ajax js/ajax_js.js" type="text/javascript" language="javascript"></script>

<script>
            function update() {
                var conf = confirm("Are you sure to submit ?");
                if (conf) {
                    document.getElementById("studentinfoupdation").submit();

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
                            <div class="col-lg-4 text-center"> <a class="" href="studentStatus.html" target= "_blank"><img class="img-responsive img-thumbnail logo" src="../Images/left.png"></a> </div>
                            <div class="col-lg-4 wrapper text-center"> <span>Students / Family information sheet</span> </div>
                            <div class="col-lg-4 text-center"> <a class="" target= "_blank" href="http://achyutasamanta.com/"><img class="img-responsive img-thumbnail logo" src="../Images/sir2.jpg"></a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Forms  -->

            <div class="row">

                <div class="col-lg-12">
                    <div class="page-header">

                        <h1 id="forms">Student Information <span class="pull-right"><span><a href="javascript:void(0)" onclick="winClose()" class="btn btn-primary">Close</a> </span> </h1>
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
                <form name= "studentinfoupdation" action=""  method="post" enctype="multipart/form-data" id="studentinfoupdation">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs nav-justified nav-tabs-top" role="tablist">
                            <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General Information</a></li>
                            <li role="presentation"><a href="#house" aria-controls="house" role="tab" data-toggle="tab">Household</a></li>
                            <li role="presentation"><a href="#income" aria-controls="income" role="tab" data-toggle="tab">Annual income</a></li>
                            <li role="presentation"><a href="#sanitation" aria-controls="sanitation" role="tab" data-toggle="tab">Sanitation &amp; Health</a></li>
                            <li role="presentation"><a href="#education" aria-controls="education" role="tab" data-toggle="tab">Education</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
                                <fieldset>
                                    <legend>General Information By Students/Parents</legend>
                                    <table class="table">
                                    <tr>
                                            <td class="col-lg-1"><b>100.</b></td>
                                            <td class="col-lg-3">BPL card no</td>
                                            <td class="col-lg-5"><input type="text" name="bpl_card_no" id="bpl_card_no" class="form-control" value="<?php echo $data['std_bpl_card_no']; ?>"></td>
                                            </tr>
                                        <tr>
                                            <td class="col-lg-1"><b>101.</b></td>
                                            <td class="col-lg-3">Name of the student</td>
                                            <td class="col-lg-5"><input class="form-control" type="text" name="name" id="foc0" value="<?php echo $data['std_name']; ?>"></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="col-lg-1"><b>101.1.</b></td>
                                            <td>Year you joined</td>
                                            <td>
                                            <select class="form-control" name="yoj">
                                                    <option value="">-- Select One --</option>
                                                    <option <?php if($data['join_year']=="1993"){ echo "selected";}?>  value="1993">1993</option>
                                                    <option <?php if($data['join_year']=="1994"){ echo "selected";}?> value="1994">1994</option>
                                                    <option <?php if($data['join_year']=="1995"){ echo "selected";}?> value="1995">1995</option>
                                                    <option <?php if($data['join_year']=="1996"){ echo "selected";}?> value="1996">1996</option>
                                                    <option <?php if($data['join_year']=="1997"){ echo "selected";}?> value="1997">1997</option>
                                                    <option <?php if($data['join_year']=="1998"){ echo "selected";}?> value="1998">1998</option>
                                                    <option <?php if($data['join_year']=="1999"){ echo "selected";}?> value="1999">1999</option>
                                                    <option <?php if($data['join_year']=="2000"){ echo "selected";}?> value="2000">2000</option>
                                                    <option <?php if($data['join_year']=="2001"){ echo "selected";}?> value="2001">2001</option>
                                                    <option <?php if($data['join_year']=="2002"){ echo "selected";}?> value="2002">2002</option>
                                                    <option <?php if($data['join_year']=="2003"){ echo "selected";}?> value="2003">2003</option>
                                                    <option <?php if($data['join_year']=="2004"){ echo "selected";}?> value="2004">2004</option>
                                                    <option <?php if($data['join_year']=="2005"){ echo "selected";}?> value="2005">2005</option>
                                                    <option <?php if($data['join_year']=="2006"){ echo "selected";}?> value="2006">2006</option>
                                                    <option <?php if($data['join_year']=="2007"){ echo "selected";}?> value="2007">2007</option>
                                                    <option <?php if($data['join_year']=="2008"){ echo "selected";}?> value="2008">2008</option>
                                                    <option <?php if($data['join_year']=="2009"){ echo "selected";}?> value="2009">2009</option>
                                                    <option <?php if($data['join_year']=="2010"){ echo "selected";}?> value="2010">2010</option>
                                                    <option <?php if($data['join_year']=="2011"){ echo "selected";}?> value="2011">2011</option>
                                                    <option <?php if($data['join_year']=="2012"){ echo "selected";}?> value="2012">2012</option>
                                                    <option <?php if($data['join_year']=="2013"){ echo "selected";}?> value="2013">2013</option>
                                                    <option <?php if($data['join_year']=="2014"){ echo "selected";}?> value="2014">2014</option>
                                                    <option <?php if($data['join_year']=="2015"){ echo "selected";}?> value="2015">2015</option>
                                                </select>
											<td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-1"><b>101.2.</b></td>
                                            <td>Class you joined</td>
                                            <td>
                                            <select class="form-control" name="coj" id="coj" onChange="showTextBox(this.id)">
                                                    <option value="">-- Select One --</option>
                                                    <option <?php if($data['join_class']=="I"){ echo "selected";}?> value="I">I</option>
                                                    <option <?php if($data['join_class']=="II"){ echo "selected";}?> value="II">II</option>
                                                    <option <?php if($data['join_class']=="III"){ echo "selected";}?> value="III">III</option>
                                                    <option <?php if($data['join_class']=="IV"){ echo "selected";}?> value="IV">IV</option>
                                                    <option <?php if($data['join_class']=="V"){ echo "selected";}?> value="V">V</option>
                                                    <option <?php if($data['join_class']=="VI"){ echo "selected";}?> value="VI">VI</option>
                                                    <option <?php if($data['join_class']=="VII"){ echo "selected";}?> value="VII">VII</option>
                                                    <option <?php if($data['join_class']=="VIII"){ echo "selected";}?> value="VIII">VIII</option>
                                                    <option <?php if($data['join_class']=="IX"){ echo "selected";}?> value="IX">IX</option>
                                                    <option <?php if($data['join_class']=="X"){ echo "selected";}?> value="X">X</option>
                                                    <option <?php if($data['join_class']=="+2 Science"){ echo "selected";}?> value="+2 Science">+2 Science</option>
                                                    <option <?php if($data['join_class']=="+2 Commerce"){ echo "selected";}?> value="+2 Commerce">+2 Commerce</option>
                                                    <option <?php if($data['join_class']=="+2 Arts"){ echo "selected";}?> value="+2 Arts">+2 Arts</option>
                                                    <option <?php if($data['join_class']=="+3 Science"){ echo "selected";}?> value="+3 Science">+3 Science</option>
                                                    <option <?php if($data['join_class']=="+3 Commerce"){ echo "selected";}?> value="+3 Commerce">+3 Commerce</option>
                                                    <option <?php if($data['join_class']=="+3 Arts"){ echo "selected";}?> value="+3 Arts">+3 Arts</option>
                                                    <option <?php if($data['join_class']=="pg"){ echo "selected";}?> value="pg">Post graduation</option>
                                                </select>
                                                <?php if($data['join_class']=="pg"){?>
                                                <input type="text" name="pg_stream_coj" id="distance" class="form-control" placeholder="PG Specialization" value="<?php echo $data['pg_specialization']; ?>">
                                                <?php } ?>
                                                <input type="text" name="pg_stream_coj" id="distance" class="form-control" style="display:none" placeholder="PG Specialization">
											</td>
                                        </tr>
                                        <tr>
                                            <td><b>101.3.</b></td>
                                            <td>How you came to know about <strong>KISS</strong> ?</td>
                                            <td><input class="form-control" type="text" name="know" value="<?php echo $data['info_kiss']; ?>"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>101.4.</b></td>
                                            <td>Gender</td>
                                            <td>
                                            <select class="form-control" name="gender">
                                                    <option <?php if($data['gender']=="Male"){ echo "selected";}?> value="Male">Male</option>
                                                    <option <?php if($data['gender']=="Female"){ echo "selected";}?> value="Female">Female</option>
                                                </select>
											<td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>101.5.</b></td>
                                            <td>Marital status</td>
                                            <td>
                                            <select class="form-control" name="Mstatus">
                                                    <option <?php if($data['maritial_status']=="Unmarried"){ echo "selected";}?> value="Unmarried">Unmarried</option>
                                                    <option <?php if($data['maritial_status']=="Married"){ echo "selected";}?> value="Married">Married</option>
                                                </select>
											<td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>102.</b></td>
                                            <td>Class </td>
                                            <td>
                                            <select class="form-control" name="standard" id = "standard" onChange="showTextBoxClass(this.id);
                                                        showYear(this.value);">
                                                    <option value="">-- Select One --</option>
                                                    <option <?php if($data['class']=="I"){ echo "selected";}?> value="I">I</option>
                                                    <option <?php if($data['class']=="II"){ echo "selected";}?> value="II">II</option>
                                                    <option <?php if($data['class']=="III"){ echo "selected";}?> value="III">III</option>
                                                    <option <?php if($data['class']=="IV"){ echo "selected";}?> value="IV">IV</option>
                                                    <option <?php if($data['class']=="V"){ echo "selected";}?> value="V">V</option>
                                                    <option <?php if($data['class']=="VI"){ echo "selected";}?> value="VI">VI</option>
                                                    <option <?php if($data['class']=="VII"){ echo "selected";}?> value="VII">VII</option>
                                                    <option <?php if($data['class']=="VIII"){ echo "selected";}?> value="VIII">VIII</option>
                                                    <option <?php if($data['class']=="IX"){ echo "selected";}?> value="IX">IX</option>
                                                    <option <?php if($data['class']=="X"){ echo "selected";}?> value="X">X</option>
                                                    <option <?php if($data['class']=="+2 Science"){ echo "selected";}?> value="+2 Science">+2 Science</option>
                                                    <option <?php if($data['class']=="+2 Commerce"){ echo "selected";}?> value="+2 Commerce">+2 Commerce</option>
                                                    <option <?php if($data['class']=="+2 Arts"){ echo "selected";}?> value="+2 Arts">+2 Arts</option>
                                                    <option <?php if($data['class']=="+3 Science"){ echo "selected";}?> value="+3 Science">+3 Science</option>
                                                    <option <?php if($data['class']=="+3 Commerce"){ echo "selected";}?> value="+3 Commerce">+3 Commerce</option>
                                                    <option <?php if($data['class']=="+3 Arts"){ echo "selected";}?> value="+3 Arts">+3 Arts</option>
                                                    <option <?php if($data['class']=="pg"){ echo "selected";}?> value="pg">Post graduation</option>
                                                    <option <?php if($data['class']=="PhD Scholar"){ echo "selected";}?> value="PhD Scholar">PhD Scholar</option>
                                                </select>
                                                <td>
                                                <?php if($data['class']=="pg"){ ?>
                                                <input type="text" name="pg" id="class" class="form-control" value="<?php echo $data['class_year']; ?>" placeholder="PG Specialization">
                                                <?php } else if($data['class']=="+2 Science" || $data['class']=="+2 Commerce" || $data['class']=="+2 Arts"){ ?>
                                                <select name="+2year" id="+2year" class="form-control">
                                                    <option value="">-select-</option>
                                                    <option <?php if($data['class_year']=="+2 1st Year"){ echo "selected";}?> value="+2 1st Year">+2 1st Year</option>
                                                    <option <?php if($data['class_year']=="+2 2nd Year"){ echo "selected";}?> value="+2 2nd Year">+2 2nd Year</option>
                                                </select>
                                                <?php } else if($data['class']=="+3 Science" || $data['class']=="+3 Commerce" || $data['class']=="+3 Arts"){ ?>
                                                <select name="+3year" id="+3year" class="form-control" style="display: none;">
                                                    <option value="">-select-</option>
                                                    <option <?php if($data['class_year']=="+3 1st Year"){ echo "selected";}?> value="+3 1st Year">+3 1st Year</option>
                                                    <option <?php if($data['class_year']=="+3 2nd Year"){ echo "selected";}?> value="+3 2nd Year">+3 2nd Year</option>
                                                    <option <?php if($data['class_year']=="+3 3rd Year"){ echo "selected";}?> value="+3 3rd Year">+3 3rd Year</option>
                                                </select>
                                                <?php } ?>
                                                <input type="text" name="pg" id="class" class="form-control" style="display: none;" placeholder="PG Specialization">
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
                                                </select>
                                                </td>
											
                                        </tr>
                                        <tr>
                                            <td><b>103.</b></td>
                                            <td>Section</td>
                                            <td><input type="text" class="form-control" name="section" value="<?php echo $data['section']; ?>"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>104.</b></td>
                                            <td>Roll no.</td>
                                            <td><input class="form-control" type="text" value="<?php echo $data['roll_no']; ?>" name="rollNo"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>104.1.</b></td>
                                            <td>Blood group</td>
                                            <td>
                                            <select class="form-control" name="bgroup">
                                                    <option value="">-- Select One --</option>
                                                    <option <?php if($data['blood_group']=="O +ve"){ echo "selected";}?> value="O +ve">O +ve</option>
                                                    <option <?php if($data['blood_group']=="O -ve"){ echo "selected";}?> value="O -ve">O -ve</option>
                                                    <option <?php if($data['blood_group']=="A +ve"){ echo "selected";}?> value="A +ve">A +ve</option>
                                                    <option <?php if($data['blood_group']=="A -ve"){ echo "selected";}?> value="A +ve">A -ve</option>
                                                    <option <?php if($data['blood_group']=="B +ve"){ echo "selected";}?> value="B +ve">B +ve</option>
                                                    <option <?php if($data['blood_group']=="B -ve"){ echo "selected";}?> value="B -ve">B -ve</option>
                                                    <option <?php if($data['blood_group']=="AB +ve"){ echo "selected";}?> value="AB +ve">AB +ve</option>
                                                    <option <?php if($data['blood_group']=="AB -ve"){ echo "selected";}?> value="AB -ve">AB -ve</option>
                                                </select>
											</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>104.2.</b></td>
                                            <td>DOB</td>
                                            <td>
                                            <?php
                                            $dob=explode('/' , $data['dob']);
											 ?>
                                             <select class="form-control pull-left" name="date" style="width:90px">
                                                    <option value="">Date</option>
                                                    <?php
                                                    for ($i = 1; $i < 32; $i++) {
                                                        ?>
                                                        <option <?php if($dob['0']==$i){ echo "selected";}?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <select class="form-control pull-left" name="month" style="width:90px">
                                                    <option value="">Month</option>
                                                    <option <?php if($dob['1']=="Jan"){ echo "selected";}?> value="Jan">Jan</option>
                                                    <option <?php if($dob['1']=="Feb"){ echo "selected";}?>  value="Feb">Feb</option>
                                                    <option <?php if($dob['1']=="Mar"){ echo "selected";}?>  value="Mar">Mar</option>
                                                    <option <?php if($dob['1']=="Apr"){ echo "selected";}?>  value="Apr">Apr</option>
                                                    <option <?php if($dob['1']=="May"){ echo "selected";}?>  value="May">May</option>
                                                    <option <?php if($dob['1']=="Jun"){ echo "selected";}?>  value="Jun">Jun</option>
                                                    <option <?php if($dob['1']=="Jul"){ echo "selected";}?>  value="Jul">Jul</option>
                                                    <option <?php if($dob['1']=="Aug"){ echo "selected";}?>  value="Aug">Aug</option>
                                                    <option <?php if($dob['1']=="Sept"){ echo "selected";}?>  value="Sept">Sept</option>
                                                    <option <?php if($dob['1']=="Oct"){ echo "selected";}?>  value="Oct">Oct</option>
                                                    <option <?php if($dob['1']=="Nov"){ echo "selected";}?>  value="Nov">Nov</option>
                                                    <option <?php if($dob['1']=="Dec"){ echo "selected";}?>  value="Dec">Dec</option>
                                                </select>
                                                <select class="form-control clearfix" name="years" style="width:90px">
                                                    <option value="">Year</option>
                                                    <?php
                                                    for ($i = 1975; $i < 2020; $i++) {
                                                        ?>
                                                        <option <?php if($dob['2']==$i){ echo "selected";}?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>105.</b></td>
                                            <td>Name of the mentor</td>
                                            <td><input class="form-control" type="text" name="mentor" value="<?php echo $data['mentor_name']; ?>"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>106.</b></td>
                                            <td>Contact No. Of Mentor</td>
                                            <td><input class="form-control" type="text" name="mentor_ph" value="<?php echo $data['mentor_ph']; ?>"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>106.1.</b></td>
                                            <td>Name Of Local Gaurdian</td>
                                            <td><input class="form-control" type="text" name="local_gaurdian" value="<?php echo $data['l_gaurdian_name']; ?>"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>106.2.</b></td>
                                            <td>Contact No. Of Local Gaurdian</td>
                                            <td><input class="form-control" type="text" name="Lcontact" value="<?php echo $data['l_gaurdian_ph']; ?>"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>106.3.</b></td>
                                            <td>Contact No. Of Your Parents</td>
                                            <td><input class="form-control" type="text" name="Pcontact" value="<?php echo $data['parents_ph']; ?>"></td>
                                            <td>&nbsp;</td>
                                        </tr>
<?php
$str = "SELECT DISTINCT * FROM std_general_geo b WHERE  b.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?>

                                        
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
                                                        <td><input class="form-control" type="text" name="motherName" value="<?php echo $data['mother_name']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>108</b></td>
                                                        <td>Name of the Father</td>
                                                        <td><input class="form-control" type="text" name="fatherName" value="<?php echo $data['father_name']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>109</b></td>
                                                        <td>Name of the State</td>
                                                        <td>
                                                        <select class="form-control" name="state" id="state" onChange="updt_showDistrict(this.value, '<?php echo $sid; ?>');">
                                                                <option value="">-- Select One --</option>
                                                                <option <?php if($data['state_name']=="Assam"){ echo "selected";}?>  value="Assam">Assam</option>
                                                                <option <?php if($data['state_name']=="Chattisgarh"){ echo "selected";}?> value="Chattisgarh">Chattisgarh</option>
                                                                <option <?php if($data['state_name']=="Jharkhand"){ echo "selected";}?> value="Jharkhand">Jharkhand</option>
                                                                <option <?php if($data['state_name']=="Mizoram"){ echo "selected";}?> value="Mizoram">Mizoram</option>
                                                                <option <?php if($data['state_name']=="Odisha"){ echo "selected";}?> value="Odisha">Odisha</option>
                                                                <!--<option value="other">other</option>-->
                                                            </select>
													</tr>
                                                    <tr>
                                                        <td><b>110</b></td>
                                                        <td>Name of the District</td>
                                                        <td>
                                                        <select class="form-control" name="district_name" id="district_name" onChange="updt_showBlock(this.value, state.id);">
                                                        <option selected="selected"><?php echo $data['district_name']; ?></option>
                                                            </select>
														</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>111</b></td>
                                                        <td>Name of the Block</td>
                                                        <td>
                                                        <select class="form-control" name="block_name" id="block_name">
                                                        <option selected="selected"><?php echo $data['block_name']; ?></option>
                                                                <!-- onchange="findDistance(this.value);" -->

                                                            </select>
														</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>112</b></td>
                                                        <td>Name of the Gram Panchaayat</td>
                                                        <td><input class="form-control" type="text" name="panchayat" value="<?php echo $data['panchayat_name']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>113</b></td>
                                                        <td>Name of the Village</td>
                                                        <td><input class="form-control" type="text" name="village" value="<?php echo $data['village_name']; ?>"></td>
                                                    </tr>
                                                </table></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>113.1.</b></td>
                                            <td>Distance from your village to <strong>KISS</strong> </td>
                                            <td><input class="form-control" type="text" name="distance_village" id="distance_village" value="<?php echo $data['disstance_to_kiss']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><b>114.</b></td>
                                            <td>Name Of the tribe</td>
                                            <td>
                                            <input type="radio" name="tribe" value="scheduled" onchange="showTribe_Types(this.value);" style="margin-left: 1%;margin-right: 2%;" <?php if($data['tribe_name']=="scheduled") { echo 'checked="checked"'; }?>>
                                                Scheduled Tribes
                                                <input type="radio" name="tribe" value="primitive" onchange="showTribe_Types(this.value);" style="margin-left: 7%;margin-right: 2%;" <?php if($data['tribe_name']=="primitive") { echo 'checked="checked"'; }?>>
                                                Primitive Tribes 
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                        <td></td>
                                            <td></td>
                                            <td id="tribetype">
                                            <?php if($data['tribe_name']=="scheduled") { ?>
                                            <select name="sch_tribes" id="sch_tribes" class="form-control" >
                                                    <option value="">--Select Scheduled Tribe--</option>
                                                    <?php 
                                                    /*$conn=mysqli_connect("localhost","root","","innovado_kiss");*/
                                                    $query= "SELECT * FROM `scheduled_tribe`";
                                                    $result=mysqli_query($con,$query);
                                                    while ($row = mysqli_fetch_array($result)){  
                                                    ?> 
                                                    <option <?php if($data['tribe_type']==$row['scheduled_tribe']) { echo "selected"; }?> value="<?php echo $row["scheduled_tribe"]; ?>"><?php echo $row['scheduled_tribe']; ?></option>
                                                    <?php 
                                                    }
                                                    ?>
                                                </select>
                                            <?php } else if($data['tribe_name']=="primitive") { ?>
                                            <select name="prm_tribes" id="prm_tribes" class="form-control" >
                                                    <option value="">--Select Primitive Tribe--</option>
                                                     <?php 
                                                    /*$conn=mysqli_connect("localhost","root","","innovado_kiss");*/
                                                    $query= "SELECT * FROM `primitive_tribe`";
                                                    $result=mysqli_query($con,$query);
                                                    while ($row = mysqli_fetch_array($result)){
                                                    ?> <option <?php if($data['tribe_type']==$row["primitive_tribe"]) { echo "selected"; }?> value="<?php echo $row["primitive_tribe"]; ?>"><?php echo $row["primitive_tribe"]; ?></option>
                                                    <?php 
                                                    }
                                                    ?>
                                                </select>
                                            <?php } ?>
                                               
 
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
                                                    ?> <option <?php if($data['dialect_speek']==$row['dialect']) { echo "selected"; }?> value="<?php echo $row['dialect']; ?>"><?php echo $row['dialect']; ?></option>
                                                    <?php 
                                                    }
                                                    ?>
                                                </select>
											</td>
                                        </tr>
                                        <tr>
                                            <td><b>114.2.</b></td>
                                            <td>Whether the student belongs to differently-abled category?</td>
                                            <td>
                                            <select class="form-control" name="belongs">
                                                    <option value="">--Select--</option>
                                                    <option <?php if($data['diff_able_cat']=="Yes") { echo "selected"; }?> value="Yes">Yes</option>
                                                    <option <?php if($data['diff_able_cat']=="No") { echo "selected"; }?> value="No">No</option>
                                                </select>
											</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>115.</b></td>
                                            <td>Religion</td>
                                            <td>
                                            <select class="form-control" name="religion" id="religion" onChange="showTextarea(this.id);">
                                                    <option <?php if($data['religion']=="Hindu") { echo "selected"; }?> value="Hindu">Hindu</option>
                                                    <option <?php if($data['religion']=="Muslim") { echo "selected"; }?> value="Muslim">Muslim</option>
                                                    <option <?php if($data['religion']=="Christian") { echo "selected"; }?> value="Christian">Christian</option>
                                                    <option <?php if($data['religion']=="others") { echo "selected"; }?> value="others">others</option>
                                                </select>
											
                                            <td>
                                            <?php if($data['religion']=="others") { ?>
                                            <input type="text" class="form-control" name="textarea_religion" id="textarea_religion" value="<?php $data['religion_other']; ?>">
                                            <?php } ?>
                                            <input type="text" class="form-control" name="textarea_religion" id="textarea_religion" style="display: none;"></td>
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
                                                                                     <?php
$str = "SELECT DISTINCT * FROM std_household_background c WHERE  c.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?>
                                                <tr>
                                                
                                                    <td><b>116 A.</b></td>
                                                    <td>0 to 6 Years Members</td>
                                                    <td><input class="form-control row1 male_row" id="male1" name="male1" type="text" onKeyUp="calculteTotalMember('row1')" value="<?php echo $data['0_6_male']; ?>"></td>
                                                    <td><input class="form-control row1 female_row" id="female1" name="female1" type="text"  onkeyup="calculteTotalMember('row1')" value="<?php echo $data['0_6_female']; ?>"></td>
                                                    <td><input class="form-control" id="total1" name="total1"  type="text" value="<?php echo $data['0_6_male']+$data['0_6_female']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>116 B.</b></td>
                                                    <td>7-17 years Members</td>
                                                    <td><input class="form-control row2 male_row" id="male2" name="male2" type="text"  onkeyup="calculteTotalMember('row2')" value="<?php echo $data['7_17_male']; ?>"></td>
                                                    <td><input class="form-control row2 female_row" id="female2" name="female2" type="text"  onkeyup="calculteTotalMember('row2')" value="<?php echo $data['7_17_female']; ?>"></td>
                                                    <td><input class="form-control" id="total2" name="total2" type="text" value="<?php echo $data['7_17_male']+$data['7_17_female'];  ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>116 C.</b></td>
                                                    <td>Adults</td>
                                                    <td><input class="form-control  row3 male_row" id="male3" name="male3" type="text" value="<?php echo $data['adult_male']; ?>"  onkeyup="calculteTotalMember('row3')"></td>
                                                    <td><input class="form-control  row3 female_row" id="female3" name="female3" type="text" value="<?php echo $data['adult_female']; ?>" onKeyUp="calculteTotalMember('row3')"></td>
                                                    <td><input class="form-control" id="total3" name="total3" type="text" value="<?php echo $data['adult_male']+$data['adult_female'];  ?>" ></td>
                                                </tr>
                                                <tr>
                                                    <td><b>117.</b></td>
                                                    <td>Total members in the family</td>
                                                    <td><input class="form-control row4" id="male_total" name="male_total" value="<?php echo $data['total_male']; ?>" type="text" ></td>
                                                    <td><input class="form-control row4" id="female_total" name="female_total" value="<?php echo $data['total_female']; ?>" type="text" ></td>
                                                    <td><input class="form-control" type="text" name="total_member" value="<?php echo $data['total_member'];  ?>" id="total_member"></td>
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
                                                    <th>Relation</th>
                                                </tr>
                                                <?php 
                                               $query1="select DISTINCT relative_name,relative_class,relation from std_household_rel_education where `std_id`='$sid' LIMIT 5";
                                               $result1=mysqli_query($con,$query1);
											   while($row=mysqli_fetch_assoc($result1))
											   {
											    $json1[] = $row["relative_name"];
												  $json2[] = $row["relative_class"];
												  $json3[] = $row["relation"];
												}
												$relative_name=explode('"',json_encode($json1));
												$relative_class=explode('"',json_encode($json2));
												$relation=explode('"',json_encode($json3));
											  
											   ?>
                                                <tr>
                                                    <td><b>119</b></td>
                                                    <td><input class="form-control" type="text" name="rel_name[]" value="<?php echo $relative_name[1];?>"></td>
                                                    <td><input class="form-control" type="text" name="rel_class[]" value="<?php echo $relative_class[1];?>"></td>
                                                    <td><select class="form-control" name="relationship[]">
                                                            <option value="">--Select--</option>
                                                            <option <?php if($relation[1]=="Brother") { echo "selected"; } ?>>Brother</option>
                                                            <option <?php if($relation[1]=="Sister") { echo "selected"; } ?>>Sister</option>
                                                            <option <?php if($relation[1]=="Cousin Brother") { echo "selected"; } ?>>Cousin Brother</option>
                                                            <option <?php if($relation[1]=="Cousin Sister") { echo "selected"; } ?>>Cousin Sister</option>
                                                            <option <?php if($relation[1]=="Nephew") { echo "selected"; } ?>>Nephew</option>
                                                            <option <?php if($relation[1]=="Niece") { echo "selected"; } ?>>Niece</option>
                                                            <option <?php if($relation[1]=="Uncle") { echo "selected"; } ?>>Uncle</option>
                                                            <option <?php if($relation[1]=="Aunt") { echo "selected"; } ?>>Aunt</option>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b>120</b></td>
                                                    <td><input class="form-control" type="text" name="rel_name[]" value="<?php echo $relative_name[3];?>"></td>
                                                    <td><input class="form-control" type="text" name="rel_class[]" value="<?php echo $relative_class[3];?>"></td>
                                                    <td><select class="form-control" name="relationship[]">
                                                            <option value="">--Select--</option>
                                                            <option <?php if($relation[3]=="Brother") { echo "selected"; } ?>>Brother</option>
                                                            <option <?php if($relation[3]=="Sister") { echo "selected"; } ?>>Sister</option>
                                                            <option <?php if($relation[3]=="Cousin Brother") { echo "selected"; } ?>>Cousin Brother</option>
                                                            <option <?php if($relation[3]=="Cousin Sister") { echo "selected"; } ?>>Cousin Sister</option>
                                                            <option <?php if($relation[3]=="Nephew") { echo "selected"; } ?>>Nephew</option>
                                                            <option <?php if($relation[3]=="Niece") { echo "selected"; } ?>>Niece</option>
                                                            <option <?php if($relation[3]=="Uncle") { echo "selected"; } ?>>Uncle</option>
                                                            <option <?php if($relation[3]=="Aunt") { echo "selected"; } ?>>Aunt</option>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b>121</b></td>
                                                    <td><input class="form-control" type="text" name="rel_name[]" value="<?php echo $relative_name[5];?>"></td>
                                                    <td><input class="form-control" type="text" name="rel_class[]" value="<?php echo $relative_class[5];?>"></td>
                                                    <td><select class="form-control" name="relationship[]">
                                                            <option value="">--Select--</option>
                                                            <option <?php if($relation[5]=="Brother") { echo "selected"; } ?>>Brother</option>
                                                            <option <?php if($relation[5]=="Sister") { echo "selected"; } ?>>Sister</option>
                                                            <option <?php if($relation[5]=="Cousin Brother") { echo "selected"; } ?>>Cousin Brother</option>
                                                            <option <?php if($relation[5]=="Cousin Sister") { echo "selected"; } ?>>Cousin Sister</option>
                                                            <option <?php if($relation[5]=="Nephew") { echo "selected"; } ?>>Nephew</option>
                                                            <option <?php if($relation[5]=="Niece") { echo "selected"; } ?>>Niece</option>
                                                            <option <?php if($relation[5]=="Uncle") { echo "selected"; } ?>>Uncle</option>
                                                            <option <?php if($relation[5]=="Aunt") { echo "selected"; } ?>>Aunt</option>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b>122</b></td>
                                                    <td><input class="form-control" type="text" name="rel_name[]" value="<?php echo $relative_name[7];?>"></td>
                                                    <td><input class="form-control" type="text" name="rel_class[]" value="<?php echo $relative_class[7];?>"></td>
                                                    <td><select class="form-control" name="relationship[]">
                                                            <option value="">--Select--</option>
                                                            <option <?php if($relation[7]=="Brother") { echo "selected"; } ?>>Brother</option>
                                                            <option <?php if($relation[7]=="Sister") { echo "selected"; } ?>>Sister</option>
                                                            <option <?php if($relation[7]=="Cousin Brother") { echo "selected"; } ?>>Cousin Brother</option>
                                                            <option <?php if($relation[7]=="Cousin Sister") { echo "selected"; } ?>>Cousin Sister</option>
                                                            <option <?php if($relation[7]=="Nephew") { echo "selected"; } ?>>Nephew</option>
                                                            <option <?php if($relation[7]=="Niece") { echo "selected"; } ?>>Niece</option>
                                                            <option <?php if($relation[7]=="Uncle") { echo "selected"; } ?>>Uncle</option>
                                                            <option <?php if($relation[7]=="Aunt") { echo "selected"; } ?>>Aunt</option>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b>123</b></td>
                                                    <td><input class="form-control" type="text" name="rel_name[]" value="<?php echo $relative_name[9];?>"></td>
                                                    <td><input class="form-control" type="text" name="rel_class[]" value="<?php echo $relative_class[9];?>"></td>
                                                    <td><select class="form-control" name="relationship[]">
                                                            <option value="">--Select--</option>
                                                            <option <?php if($relation[9]=="Brother") { echo "selected"; } ?>>Brother</option>
                                                            <option <?php if($relation[9]=="Sister") { echo "selected"; } ?>>Sister</option>
                                                            <option <?php if($relation[9]=="Cousin Brother") { echo "selected"; } ?>>Cousin Brother</option>
                                                            <option <?php if($relation[9]=="Cousin Sister") { echo "selected"; } ?>>Cousin Sister</option>
                                                            <option <?php if($relation[9]=="Nephew") { echo "selected"; } ?>>Nephew</option>
                                                            <option <?php if($relation[9]=="Niece") { echo "selected"; } ?>>Niece</option>
                                                            <option <?php if($relation[9]=="Uncle") { echo "selected"; } ?>>Uncle</option>
                                                            <option <?php if($relation[9]=="Aunt") { echo "selected"; } ?>>Aunt</option>
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
                                                    <td>FamilyOccupation*</td>
                                                </tr>
                                                <tr>
                                                <?php
$str = "SELECT DISTINCT * FROM std_household_occupation d WHERE  d.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?>
                                                    <td><input class="form-control" type="text" name="male_earn" value="<?php echo $data['male_earn']; ?>"></td>
                                                    <td><input class="form-control" type="text" name="female_earn" value="<?php echo $data['female_earn']; ?>"></td>
                                                    <td>
                                                        <table class="table" border="0">
                                                            <tr>
                                                                <td>A. Primary <br>
                                                                    <input class="form-control" type="text" name="erning_primary" value="<?php echo $data['occu_primary']; ?>"></td>
                                                                <td>B. Secondary <br>
                                                                    <input class="form-control" type="text" name="erning_secondary" value="<?php echo $data['occu_secondary']; ?>"></td>
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
                                                       <textarea name="occu_code" class="form-control"><?php echo $data['occu_code']; ?></textarea></td>
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
                                                <?php
$str = "SELECT DISTINCT * FROM std_household_drink_source f WHERE  f.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?> 
                                                <tr>
                                                    <td>A</td>
                                                    <td>Open well</td>
                                                    <td>
                                                    <select class="form-control" name="openwell">
                                                            <option <?php if($data['open_well_owner']=="0") { echo "selected"; }?> value="0">0</option>
                                                            <option <?php if($data['open_well_owner']=="1") { echo "selected"; }?> value="1">1</option>
                                                            <option  <?php if($data['open_well_owner']=="2") { echo "selected"; }?> value="2">2</option>
                                                        </select>
													</td>
                                                    <td>
                                                    <select class="form-control" name="openwell2">
                                                            <option <?php if($data['open_well_quality']=="0") { echo "selected"; }?> value="0">0</option>
                                                            <option <?php if($data['open_well_quality']=="1") { echo "selected"; }?> value="1">1</option>
                                                            <option <?php if($data['open_well_quality']=="2") { echo "selected"; }?> value="2">2</option>
                                                            <option <?php if($data['open_well_quality']=="3") { echo "selected"; }?> value="3">3</option>
                                                            <option <?php if($data['open_well_quality']=="4") { echo "selected"; }?> value="4">4</option>
                                                        </select>
													</td>
                                                </tr>
                                                <tr>
                                                    <td>B</td>
                                                    <td>Tube well</td>
                                                    <td>
                                                    <select class="form-control" name="tubewell">
                                                            <option <?php if($data['tube_well_owner']=="0") { echo "selected"; }?> value="0">0</option>
                                                            <option <?php if($data['tube_well_owner']=="1") { echo "selected"; }?> value="1">1</option>
                                                            <option <?php if($data['tube_well_owner']=="2") { echo "selected"; }?> value="2">2</option>
                                                        </select>
													</td>
                                                    <td>
                                                    <select class="form-control" name="tubewell2">
                                                            <option <?php if($data['tube_well_quality']=="0") { echo "selected"; }?> value="0">0</option>
                                                            <option <?php if($data['tube_well_quality']=="1") { echo "selected"; }?> value="1">1</option>
                                                            <option <?php if($data['tube_well_quality']=="2") { echo "selected"; }?> value="2">2</option>
                                                            <option <?php if($data['tube_well_quality']=="3") { echo "selected"; }?> value="3">3</option>
                                                            <option <?php if($data['tube_well_quality']=="4") { echo "selected"; }?> value="4">4</option>
                                                        </select>
													</td>
                                                </tr>
                                                <tr>
                                                    <td>C</td>
                                                    <td>Piped</td>
                                                    <td><select class="form-control" name="piped">
                                                            <option <?php if($data['piped_owner']=="0") { echo "selected"; }?> value="0">0</option>
                                                            <option <?php if($data['piped_owner']=="1") { echo "selected"; }?> value="1">1</option>
                                                            <option <?php if($data['piped_owner']=="2") { echo "selected"; }?> value="2">2</option>
                                                        </select></td>
                                                    <td><select class="form-control" name="piped2">
                                                            <option <?php if($data['piped_quality']=="0") { echo "selected"; }?> value="0">0</option>
                                                            <option <?php if($data['piped_quality']=="1") { echo "selected"; }?> value="1">1</option>
                                                            <option <?php if($data['piped_quality']=="2") { echo "selected"; }?> value="2">2</option>
                                                            <option <?php if($data['piped_quality']=="3") { echo "selected"; }?> value="3">3</option>
                                                            <option <?php if($data['piped_quality']=="4") { echo "selected"; }?> value="4">4</option>
                                                        </select></td>
                                               </tr>
                                                <tr>
                                                    <td>D</td>
                                                    <td>Pond/tank/river</td>
                                                    <td><select class="form-control" name="ptr">
                                                            <option <?php if($data['PTR_owner']=="0") { echo "selected"; }?> value="0">0</option>
                                                            <option <?php if($data['PTR_owner']=="1") { echo "selected"; }?> value="1">1</option>
                                                            <option <?php if($data['PTR_owner']=="2") { echo "selected"; }?> value="2">2</option>
                                                        </select></td>
                                                    <td><select class="form-control" name="ptr2">
                                                            <option <?php if($data['PTR_quality']=="0") { echo "selected"; }?> value="0">0</option>
                                                            <option <?php if($data['PTR_quality']=="1") { echo "selected"; }?> value="1">1</option>
                                                            <option <?php if($data['PTR_quality']=="2") { echo "selected"; }?> value="2">2</option>
                                                            <option <?php if($data['PTR_quality']=="3") { echo "selected"; }?> value="3">3</option>
                                                            <option <?php if($data['PTR_quality']=="4") { echo "selected"; }?> value="4">4</option>
                                                        </select></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>E</td>
                                                    <td>Others(specify) <br>
                                                    <textarea class="form-control"></textarea></td>
                                                    <td><select class="form-control" name="others">
                                                            <option <?php if($data['other_owner']=="0") { echo "selected"; }?> value="0">0</option>
                                                            <option <?php if($data['other_owner']=="1") { echo "selected"; }?> value="1">1</option>
                                                            <option <?php if($data['other_owner']=="2") { echo "selected"; }?> value="2">2</option>
                                                        </select></td>
                                                    <td><select class="form-control" name="others2">
                                                            <option <?php if($data['other_quality']=="0") { echo "selected"; }?> value="0">0</option>
                                                            <option <?php if($data['other_quality']=="1") { echo "selected"; }?> value="1">1</option>
                                                            <option <?php if($data['other_quality']=="2") { echo "selected"; }?> value="2">2</option>
                                                            <option <?php if($data['other_quality']=="3") { echo "selected"; }?> value="3">3</option>
                                                            <option <?php if($data['other_quality']=="4") { echo "selected"; }?> value="4">4</option>
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
                                        <td colspan="3"><textarea class="form-control" name="waterplm"><?php echo $data['problem_info']; ?></textarea></td>
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
                                                <?php
$str = "SELECT DISTINCT * FROM std_household_stock_poultry g WHERE  g.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?> 
                                                <tr>
                                                    <td><b>128</b></td>
                                                    <td>cow</td>
                                                    <td><input class="form-control" type="text" name="cow" value="<?php echo $data['num_cow']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>129</b></td>
                                                    <td>Bullock</td>
                                                    <td><input class="form-control" type="text" name="bullock" value="<?php echo $data['num_bullock']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>130</b></td>
                                                    <td>Buffalo</td>
                                                    <td><input class="form-control" type="text" name="buffalo" value="<?php echo $data['num_buffalo']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>131</b></td>
                                                    <td>calf</td>
                                                    <td><input class="form-control" type="text" name="calf" value="<?php echo $data['num_calf']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>132</b></td>
                                                    <td>Goat/sheep</td>
                                                    <td><input class="form-control" type="text" name="sheep" value="<?php echo $data['num_goat']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>133</b></td>
                                                    <td>poultry</td>
                                                    <td><input class="form-control" type="text" name="poultry" value="<?php echo $data['num_poultry']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>134</b></td>
                                                    <td>others(specify)</td>
                                                    <td><input class="form-control" type="text" name="others" value="<?php echo $data['num_others']; ?>"></td>
                                                </tr>

                                            </table></td>
                                    </tr>
                                    <?php
$str = "SELECT DISTINCT * FROM std_household_house_type  h WHERE  h.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?> 
                                    <tr>
                                        <td><b>135.</b></td>
                                        <td class="col-lg-4"><b>House Type</b></td>
                                        <td colspan="2"><label class="checkbox-inline">
                                                <input type="checkbox" name="mud_house_hut" <?php if($data['mud_house_hut']!=0){ ?> checked <?php } ?> value="V" class="form-control">
                                                Mud House/hut </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="thatched_house" <?php if($data['thatched_house']!=0){ ?> checked <?php } ?> value="Thatched house" class="form-control">
                                                Thatched house </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="semi_pucca" <?php if($data['semi_pucca']!=0){ ?> checked <?php } ?> value="Semi Pucca" class="form-control">
                                                Semi Pucca </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="Pucca" <?php if($data['pucca']!=0){ ?> checked <?php } ?> value="Pucca" class="form-control">
                                                Pucca </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="Other" <?php if($data['other']!=0){ ?> checked <?php } ?> value="Any Other" class="form-control">
                                                Any Other </label></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><b>No.of rooms</b></td>
                                        <td colspan="2"><input type="text" value="<?php echo $data['mudhouse_hut_room']; ?>" style="width: 50px;" name="mudhouse" id="mudhouse">
                                            <input type="text" value="<?php echo $data['thatched_room']; ?>" style="width: 50px;margin-left: 14%;" name="thachedhouse" id="thachedhouse">
                                            <input type="text" value="<?php echo $data['semi_pucca_room']; ?>" style="width: 50px;margin-left: 15%;" name="semipucca" id="semipucca">
                                            <input type="text" value="<?php echo $data['pucca_room']; ?>" style="width: 50px;margin-left: 8%;" name="pucca" id="pucca">
                                            <input type="text" value="<?php echo $data['other_room']; ?>" style="width: 50px;margin-left: 4%;" name="other" id="other"></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><b>Other capital assets</b></td>
                                    </tr>
                                    <?php
$str = "SELECT DISTINCT * FROM std_household_capital_assets  i WHERE  i.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?> 
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
                                                    <td><input class="form-control" type="text" name="bullock_cart" value="<?php echo $data['num_bullock_cart']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>137</b></td>
                                                    <td>Plough</td>
                                                    <td><input class="form-control" type="text" name="plough" value="<?php echo $data['num_plough']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>138</b></td>
                                                    <td>Thresher</td>
                                                    <td><input class="form-control" type="text" name="thresher" value="<?php echo $data['num_thresher']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>139</b></td>
                                                    <td>Cycle/Motor Cycle</td>
                                                    <td><input class="form-control" type="text" name="vehicle" value="<?php echo $data['no_vehicle']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>140</b></td>
                                                    <td>TV</td>
                                                    <td><input class="form-control" type="text" name="tv" value="<?php echo $data['num_tv']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>141</b></td>
                                                    <td>Radio</td>
                                                    <td><input class="form-control" type="text" name="radio" value="<?php echo $data['num_radio']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>142</b></td>
                                                    <td> Electric Fan</td>
                                                    <td><input class="form-control" type="text" name="fan" value="<?php echo $data['num_fan']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>143</b></td>
                                                    <td>Other</td>
                                                    <td><input class="form-control" type="text" name="other" value="<?php echo $data['num_other']; ?>"></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <?php
$str = "SELECT DISTINCT * FROM std_household_other_observe  j WHERE  j.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?> 
                                    <tr>
                                        <td><b>144.</b></td>
                                        <td>&nbsp;&nbsp;What types of festivals observed in your village ?</td>
                                        <td><input class="form-control" type="text" name="festivalstype" value="<?php echo $data['festival_type']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><b>144.1.</b></td>
                                        <td>&nbsp;&nbsp;Types of dances and songs you perform in your festivals?</td>
                                        <td><input class="form-control" type="text" name="dance_song_type" value="<?php echo $data['dance_song_type']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><b>145.</b></td>
                                        <td>&nbsp;&nbsp;What are the utensils used in your kitchen</td>
                                        <td><input class="form-control" type="text" name="utensilType" value="<?php echo $data['kitchen_utensils']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><b>146.</b></td>
                                        <td>&nbsp;&nbsp;Availability of food (on daily basis) in your family?</td>
                                        <td>
                                        <select class="form-control" name="food_avail">
                                                <option <?php if($data['food_avail']=="Sufficient") { echo "selected"; } ?> value="Sufficient">Sufficient</option>
                                                <option <?php if($data['food_avail']=="Average") { echo "selected"; } ?> value="Average">Average</option>
                                                <option <?php if($data['food_avail']=="Insufficient") { echo "selected"; } ?> value="Insufficient">Insufficient</option>
                                            </select>
										</td>
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
                                        <?php
$str = "SELECT DISTINCT * FROM std_income_agriculture k WHERE  k.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?> 
                                        <tr>
                                            <td colspan="3"><table class="table table-bordered">
                                                    <tr>
                                                        <th>Crops</th>
                                                        <th>Area</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Paddy</td>
                                                        <td>
                                                        <input type="text" name="paddy" id="foc2" style="width: 83%;height: 120%;border: 1px solid #cccccc;color: #555555;padding: 6px 12px;font-size: 14px;" value="<?php echo $data['paddy_area'];?>">
                                                            <select name="paddy_measure" style="height: 84%;border: 1px solid #cccccc;">
                                                                <option value="">--Select--</option>
                                                                <option <?php if($data['paddy_area_unit']=="Decimal") { echo "selected"; } ?> value="Decimal">Decimal</option>
                                                                <option <?php if($data['paddy_area_unit']=="Gunth") { echo "selected"; } ?> value="Gunth">Gunth</option>
                                                                <option <?php if($data['paddy_area_unit']=="Acre") { echo "selected"; } ?> value="Acre">Acre</option>
                                                            </select>
														</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other cash crops</td>
                                                        <td>
                                                        <input type="text" name="other_corp" style="width: 83%;height: 120%;border: 1px solid #cccccc;color: #555555;padding: 6px 12px;font-size: 14px;" value="<?php echo $data['other_corp_area'];?>">
                                                            <select name="cash_crop_measure" style="height: 84%;border: 1px solid #cccccc;">
                                                                <option value="">--Select--</option>
                                                                <option <?php if($data['corp_area_unit']=="Decimal") { echo "selected"; } ?> value="Decimal">Decimal</option>
                                                                <option <?php if($data['corp_area_unit']=="Gunth") { echo "selected"; } ?> value="Gunth">Gunth</option>
                                                                <option <?php if($data['corp_area_unit']=="Acre") { echo "selected"; } ?> value="Acre">Acre</option>
                                                            </select>
													</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Minor Forest Produces</td>
                                                        <td>
                                                        <input type="text" name="forest" style="width: 83%;height: 120%;border: 1px solid #cccccc;color: #555555;padding: 6px 12px;font-size: 14px;" value="<?php echo $data['forest_area'];?>">
                                                            <select name="minor_forest_measure" style="height: 84%;border: 1px solid #cccccc;">
                                                                <option value="">--Select--</option>
                                                                <option <?php if($data['forest_area_unit']=="Decimal") { echo "selected"; } ?> value="Decimal">Decimal</option>
                                                                <option <?php if($data['forest_area_unit']=="Gunth") { echo "selected"; } ?> value="Gunth">Gunth</option>
                                                                <option <?php if($data['forest_area_unit']=="Acre") { echo "selected"; } ?> value="Acre">Acre</option>
                                                            </select>
														</td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td><b>147.2.</b></td>
                                            <td><span>Livestock</span></td>
                                        </tr>
                                        <?php
$str = "SELECT DISTINCT * FROM std_income_livestock l WHERE  l.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?> 
                                        <tr>
                                            <td colspan="3"><table class="table table-bordered">
                                                    <tr>
                                                        <th>What you sale from livestock</th>
                                                        <th>Quantity</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Milk</td>
                                                        <td><input type="text" class="form-control" name="milk_qun" value="<?php echo $data['milk_quantity']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Poultry</td>
                                                        <td><input type="text" class="form-control" name="poultry_qun" value="<?php echo $data['poultry_quantity']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cow</td>
                                                        <td><input type="text" class="form-control" name="cow_qun" value="<?php echo $data['cow_quantity']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bullocks</td>
                                                        <td><input type="text" class="form-control" name="bullock_qun" value="<?php echo $data['bullock_quantity']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Fish</td>
                                                        <td><input type="text" class="form-control" name="fish_qun" value="<?php echo $data['fish_quantity']; ?>"></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <?php
$str = "SELECT DISTINCT * FROM std_income_daily  m WHERE  m.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?> 
                                        <tr>
                                            <td><b>147.3.</b></td>
                                            <td colspan="3"><span class="pull-left">Daily wage</span> <span class="pull-right" style="margin-right: 15%;">Working Days</span>
                                                </th>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><table class="table table-bordered">
                                                    <tr>
                                                        <td>Daily Labour(MGNREGA) Card No.:
                                                            <input type="text" class="form-control" name="nrega_card_no" value="<?php echo $data['nrega_card_no']; ?>"></td>
                                                        <td><input type="text" class="form-control" name="nrega" value="<?php echo $data['nrega_work_day']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Agri-labour</td>
                                                        <td><input type="text" class="form-control" name="agri_labour" value="<?php echo $data['agri_work_day']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Migration</td>
                                                        <td><input type="text" class="form-control" name="migration" value="<?php echo $data['migration_work_day']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other</td>
                                                        <td><input type="text" class="form-control" name="other_wage" value="<?php echo $data['other_work_day']; ?>"></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><span>Total Annual Income:</span></td>
                                            <td><input type="text" name="total_annual_income" id="total_annual_income" class="form-control" value="<?php echo $data['total_income']; ?>"></td>
                                        </tr>
                                        <tr>
                                        <td><b>147.4.</b> </td>
                                            <td><span>Government schemes/programmes your family availed? </span></td>
                                            <td colspan="2" class="label240">
                                                <div>
                                                    <table class="table table-bordered">
                                                      
                                                    <?php 
                                               $query="SELECT DISTINCT `scheme`,`scheme_info` FROM `std_income_gov_scheme` where `std_id`='$sid'";
                                               $result=mysqli_query($con,$query);
											   
											   while($row = mysqli_fetch_assoc($result)){
												  $json4[] = $row["scheme"];
												  $json5[] = $row["scheme_info"];
												}
												$focus=explode('"',json_encode($json4));
												$scheme_info=explode('"',json_encode($json5));
												?>
                                               
                                                 <tr>
                                                            <td>

                                                                <label class="checkbox-inline" style="width:204px;">
                                                                    <input type="checkbox" name="scheme[]" value="BPL" id="bpl" onClick="check();" <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="BPL"){ ?> checked="checked"<?php break; } }?>  class="form-control">
                                                                    BPL </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="scheme[]" value="Antodaya Annapurna Yojana" <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="Antodaya Annapurna Yojana"){ ?> checked="checked"<?php break; } }?> id="aay" onClick="check2();"  class="form-control">
                                                                    Antodaya Annapurna Yojana </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="scheme[]" value="IAY" <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="IAY"){ ?> checked="checked"<?php break; } }?>  class="form-control" id="iay" onClick="check3();">
                                                                    IAY </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>  
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="scheme[]" value="KISSAN Credit Card" <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="KISSAN Credit Card"){ ?> checked="checked"<?php break; } }?>  class="form-control" id="kcc" onClick="check4();">
                                                                    KISSAN Credit Card </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="scheme[]" value="Health Card" <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="Health Card"){ ?> checked="checked"<?php break; } }?> class="form-control" id="hc" onClick="check5();" id="hc" onClick="check5();">
                                                                    Health Card </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="scheme[]" value="Green Card" <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="Green Card"){ ?> checked="checked"<?php break; } }?>  class="form-control" id="gc" onClick="check6();">
                                                                    Green Card </label>
                                                            </td>
                                                        </tr>
                                                        <tr>   
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="scheme[]" value="Lal Card" <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="Lal Card"){ ?> checked="checked"<?php break; } }?>  class="form-control" id="lc" onClick="check7();">
                                                                    Lal Card </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="oth_scheme" value="others" <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="others"){ ?> checked="checked"<?php break; } }?>  class="form-control"  id="card" onChange="showTextarea(this.id);">
                                                                    Others </label>
                                                            </td>
                                                             <td>
                                                            <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="others"){ ?> 
                                                           
                                                            <input type="text" name="other_card_no" class="form-control" id="textarea_card" value="<?php echo $scheme_info[$i]; ?>" />
                                                            <?php break;} } ?>
                                                            
                                                                <textarea name="other_card_no" class="form-control" id="textarea_card" style="display: none;"></textarea>
                                                            </td>
                                                        </tr>
 
                                                
                                                </table>     
                                                </div>
                                                <div><span>
                                                        <table width="100%"  border="0">
                                                            <tr>
                                                                <td><input class="form-control" type="hidden" name="" placeholder="Card Number"></td>
                                                            </tr>
                                                            <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="BPL"){ ?> 
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text1" value="<?php echo $scheme_info[$i]; ?>"></td>
                                                            </tr>
                                                            <?php break;} } ?>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text1" style="display:none;" placeholder="BPL No."></td>
                                                            </tr>
                                                            <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="Antodaya Annapurna Yojana"){ ?> 
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text2" value="<?php echo $scheme_info[$i]; ?>"></td>
                                                            </tr>
                                                            <?php break;} } ?>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text2" style="display:none;" placeholder="Antodaya Annapurna Yojana"></td>
                                                            </tr>
                                                            <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="IAY"){ ?> 
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text3" value="<?php echo $scheme_info[$i]; ?>"></td>
                                                            </tr>
                                                            <?php break;} } ?>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text3" style="display:none;" placeholder="IAY No."></td>
                                                            </tr>
                                                            <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="KISSAN Credit Card"){ ?> 
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text4" value="<?php echo $scheme_info[$i]; ?>"></td>
                                                            </tr>
                                                            <?php break;} } ?>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text4" style="display:none;" placeholder="KISSAN Credit Card"></td>
                                                            </tr>
                                                            <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="Health Card"){ ?> 
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text5" value="<?php echo $scheme_info[$i]; ?>"></td>
                                                            </tr>
                                                            <?php break;} } ?>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text5" style="display:none;" placeholder="Health Card"></td>
                                                            </tr>
                                                            <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="Green Card"){ ?> 
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text6" value="<?php echo $scheme_info[$i]; ?>"></td>
                                                            </tr>
                                                            <?php break;} } ?>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text6" style="display:none;" placeholder="Green Card"></td>
                                                            </tr>
                                                            <?php for($i=0; $i <= count($focus); $i++) {  if($focus[$i]=="Lal Card"){ ?> 
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="card_no[]" id="text7" value="<?php echo $scheme_info[$i]; ?>"></td>
                                                            </tr>
                                                            <?php break;} } ?>
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
                                                    <?php
                                                        $query="SELECT DISTINCT `banking`,`banking_info` FROM `std_income_parents_banking` where `std_id`='$sid'";
                                               $result=mysqli_query($con,$query);
											   while($row = mysqli_fetch_assoc($result)){
												  $json6[] = $row["banking"];
												  $json7[] = $row["banking_info"];
												}
												$banking=explode('"',json_encode($json6));
												$banking_info=explode('"',json_encode($json7));
												
                                               ?> 
                                                        <tr>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px;">
                                                                    <input type="checkbox" name="account[]" value="Bank Account" <?php for($i=0; $i <= count($banking); $i++) {  if($banking[$i]=="Bank Account"){ ?> checked="checked"<?php break; } }?> class="form-control" id="bank_acc" onClick="Check1();">
                                                                    Bank Account </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="account[]" value="Debit/Credit Card" <?php for($i=0; $i <= count($banking); $i++) {  if($banking[$i]=="Debit\/Credit Card"){ ?> checked="checked"<?php break; } }?>  class="form-control" id="db_card" onClick="Check2();" >
                                                                    Debit/Credit Card </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="account[]" value="Postal Savings" <?php for($i=0; $i <= count($banking); $i++) {  if($banking[$i]=="Postal Savings"){ ?> checked="checked"<?php break; } }?> class="form-control" id="ps" onClick="Check3();">
                                                                    Postal Savings </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>  
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="oth_banking" value="others" <?php for($i=0; $i <= count($banking); $i++) {  if($banking[$i]=="others"){ ?> checked="checked"<?php break; } }?>  class="form-control" id="account" onChange="showTextarea(this.id);">
                                                                    Others </label>
                                                            </td>
                                                            <?php for($i=0; $i <= count($banking); $i++) {  if($banking[$i]=="others"){ ?>
                                                    <td>
                                                                <textarea name="oth_banking_info" class="form-control" id="textarea_account"><?php echo $banking_info[$i]; ?></textarea>
                                                            </td>
													<?php break; } }?>
                                                            <td>
                                                                <textarea name="oth_banking_info" class="form-control" id="textarea_account" style="display: none;"></textarea>
                                                            </td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                    </table>    
                                                </div>
                                                <div>

                                                    <table width="100%" border="0">
                                                    <?php for($i=0; $i <= count($banking); $i++) {  if($banking[$i]=="Bank Account"){ ?>
                                                    <tr>
                                                            <td><input class="form-control" type="text" name="bank[]" id="text_1" value="<?php echo $banking_info[$i]; ?>"></td>
                                                        </tr>
													<?php break; } }?>
                                                        
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="bank[]" id="text_1" style="display:none;" placeholder="Bank Account"></td>
                                                        </tr>
                                                        <?php for($i=0; $i <= count($banking); $i++) {  if($banking[$i]=="Debit\/Credit Card"){ ?>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="bank[]" id="text_2" value="<?php echo $banking_info[$i]; ?>"></td>
                                                        </tr>
                                                        <?php break; } }?>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="bank[]" id="text_2" style="display:none;" placeholder="Debit/Credit Card"></td>
                                                        </tr>
                                                        <?php for($i=0; $i <= count($banking); $i++) {  if($banking[$i]=="Postal Savings"){ ?>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="bank[]" id="text_3" value="<?php echo $banking_info[$i]; ?>"></td>
                                                        </tr>
                                                        <?php break; } }?>
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
                                                    <?php
                                                        $query="SELECT DISTINCT `identification`,`identification_info` FROM `std_income_parentsid` where `std_id`='$sid'";
                                               $result=mysqli_query($con,$query);
                                               while($row=mysqli_fetch_assoc($result))
											   {
											   $json8[] = $row["identification"];
												  $json9[] = $row["identification_info"];
												}
												$identification=explode('"',json_encode($json8));
												$identification_info=explode('"',json_encode($json9));
											   ?>
                                                   <tr>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px;">
                                                                    <input type="checkbox" name="identification[]" value="Voter Card" <?php for($i=0; $i <= count($identification); $i++) {  if($identification[$i]=="Voter Card"){ ?> checked="checked"<?php break; } }?> id="v_card" onClick="check_1();"  class="form-control">
                                                                    Voter Card </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="identification[]" value="Addhar Card" <?php for($i=0; $i <= count($identification); $i++) {  if($identification[$i]=="Addhar Card"){ ?> checked="checked"<?php break; } }?> id="a_card" onClick="check_2();"  class="form-control">
                                                                    Addhar Card </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="identification[]" value="Passport" <?php for($i=0; $i <= count($identification); $i++) {  if($identification[$i]=="Passport"){ ?> checked="checked"<?php break; } }?> id="passport" onClick="check_3();" class="form-control">
                                                                    Passport </label>
                                                            </td>
                                                        </tr>
                                                        <tr>    
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="oth_identification" value="others" <?php for($i=0; $i <= count($identification); $i++) {  if($identification[$i]=="others"){ ?> checked="checked"<?php break; } }?>  class="form-control" id="identification" onChange="showTextarea(this.id);">
                                                                    Any Other </label>
                                                            </td>
                                                            <?php for($i=0; $i <= count($identification); $i++) {  if($identification[$i]=="others"){ ?>
                                                            <td>
                                                                <textarea name="oth_identification_info" class="form-control" id="textarea_identification"><?php echo $identification_info[$i];  ?></textarea>
                                                            </td>
                                                            <?php break; } }?>
                                                            <td>
                                                                <textarea name="oth_identification_info" class="form-control" id="textarea_identification" style="display: none;"></textarea>
                                                            </td>
                                                        </tr>
                                                    </table>    
                                                </div>
                                                <div>

                                                    <table width="100%" border="0">
                                                        <?php for($i=0; $i <= count($identification); $i++) {  if($identification[$i]=="others"){ ?>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="id_card[]" id="t1" value="<?php echo $identification_info[$i]; ?>"></td>
                                                        </tr>
                                                        <?php break; } }?>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="id_card[]" id="t1" style="display:none;" placeholder="Voter Card"></td>
                                                        </tr>
                                                        <?php for($i=0; $i <= count($identification); $i++) {  if($identification[$i]=="others"){ ?>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="id_card[]" id="t2" value="<?php echo $identification_info[$i]; ?>"></td>
                                                        </tr>
                                                        <?php break; } }?>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="id_card[]" id="t2" style="display:none;" placeholder="Addhar Card"></td>
                                                        </tr>
                                                        <?php for($i=0; $i <= count($identification); $i++) {  if($identification[$i]=="others"){ ?>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="id_card[]" id="t3" value="<?php echo $identification_info[$i]; ?>"></td>
                                                        </tr>
                                                        <?php break; } }?>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="id_card[]" id="t3" style="display:none;" placeholder="Passport"></td>
                                                        </tr>

                                                    </table>
                                                                                                        <!--<input class="form-control" type="text" name="" placeholder="Card Number">-->
                                                </div></td>
                                        </tr>
                                        
                                        </tr>
                                         <?php
$str = "SELECT DISTINCT * FROM std_income_use_openion  m WHERE  m.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
$cooking_use=explode("-",$data["cooking_use"]);
$lighting_use=explode("-",$data["lighting_use"]);

?>  
                                        <tr>
                                            <td><b>148.</b> </td>
                                            <td><span>What do your family use most for cooking?</span></td>
                                            <td colspan="2" class="label240">
                                                <div>
                                                    <table class="table table-bordered">
                                                   
                                                        <tr>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px;">
                                                                    <input type="checkbox" <?php for($i=0; $i <= count($cooking_use); $i++) {  if($cooking_use[$i]=="Electric Burner"){ ?> checked="checked"<?php break; } }?> class="form-control" name="cooking[]" value="Electric Burner">
                                                                    Electric Burner </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" <?php for($i=0; $i <= count($cooking_use); $i++) {  if($cooking_use[$i]=="Kerosene"){ ?> checked="checked"<?php break; } }?>  class="form-control" name="cooking[]" value="Kerosene">
                                                                    Kerosene </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" <?php for($i=0; $i <= count($cooking_use); $i++) {  if($cooking_use[$i]=="Gas"){ ?> checked="checked"<?php break; } }?>  class="form-control" name="cooking[]" value="Gas">
                                                                    Gas </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> 
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" <?php for($i=0; $i <= count($cooking_use); $i++) {  if($cooking_use[$i]=="Fire wood"){ ?> checked="checked"<?php break; } }?> class="form-control" name="cooking[]" value="Fire wood">
                                                                    Fire wood </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" <?php for($i=0; $i <= count($cooking_use); $i++) {  if($cooking_use[$i]=="Cowdung cake"){ ?> checked="checked"<?php break; } }?>  class="form-control" name="cooking[]" value="Cowdung cake">
                                                                    Cowdung cake </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" <?php for($i=0; $i <= count($cooking_use); $i++) {  if($cooking_use[$i]=="Straw"){ ?> checked="checked"<?php break; } }?>  class="form-control" name="cooking[]" value="Straw">
                                                                    Straw </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> 
                                                                <label class="checkbox-inline" style="width:213px">
                                                                    <input type="checkbox" <?php for($i=0; $i <= count($cooking_use); $i++) {  if($cooking_use[$i]=="Bio"){ ?> checked="checked"<?php break; } }?>  class="form-control" name="cooking[]" value="Bio-gas">
                                                                    Bio-gas </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="margin-left:1px">
                                                                    <input type="checkbox" <?php for($i=0; $i <= count($cooking_use); $i++) {  if($cooking_use[$i]=="Solar Cooker"){ ?> checked="checked"<?php break; } }?>  class="form-control" name="cooking[]" value="Solar Cooker">
                                                                    Solar Cooker </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                  <input type="checkbox" <?php for($i=0; $i <= count($cooking_use); $i++) {  if($cooking_use[$i]=="Others"){ ?> checked="checked"<?php break; } }?> value="others"  class="form-control" name="cooking[]" id="cooking"  onChange="showTextarea(this.id);" value="Others">
                                                                    Others </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> 
                                                                 <?php for($i=0; $i <= count($cooking_use); $i++) {  if($cooking_use[$i]=="Others"){ ?>
                                                                 <textarea class="form-control" name="cooking_other" id="textarea_cooking"><?php echo $data["cooking_other"]; ?></textarea>
                                                                 <?php break; } }?>
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
                                                                    <input type="checkbox" <?php for($i=0; $i <= count($lighting_use); $i++) {  if($lighting_use[$i]=="Electric bulb/tube"){ ?> checked="checked"<?php break; } }?> name="lighting[]" value="Electric bulb/tube" class="form-control">
                                                                    Electric bulb/tube </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" <?php for($i=0; $i <= count($lighting_use); $i++) {  if($lighting_use[$i]=="Kerosene"){ ?> checked="checked"<?php break; } }?> name="lighting[]" value="Kerosene" class="form-control">
                                                                    Kerosene </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" <?php for($i=0; $i <= count($lighting_use); $i++) {  if($lighting_use[$i]=="Candle"){ ?> checked="checked"<?php break; } }?> name="lighting[]" value="Candle" class="form-control">
                                                                    Candle </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>   
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" <?php for($i=0; $i <= count($lighting_use); $i++) {  if($lighting_use[$i]=="Solar Lantern"){ ?> checked="checked"<?php break; } }?> name="lighting[]" value="Solar Lantern"  class="form-control">
                                                                    Solar Lantern </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" <?php for($i=0; $i <= count($lighting_use); $i++) {  if($lighting_use[$i]=="others"){ ?> checked="checked"<?php break; } }?> name="lighting[]" value="others" class="form-control"  id="lighting" onchange="showTextarea(this.id);">
                                                                    Other(Specify) </label>
                                                            </td>
                                                            <td>
                                                            <?php for($i=0; $i <= count($lighting_use); $i++) {  if($lighting_use[$i]=="others"){ ?>
                                                                <textarea class="form-control" name="lighting_other" id="textarea_lighting"><?php echo $data["lighting_other"]; ?></textarea>
                                                                <?php break; } }?>
                                                                <textarea class="form-control" name="lighting_other" id="textarea_lighting" style="display: none;"></textarea>
                                                            </td>
                                                        </tr>
                                                    </table>      
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td><b>150.</b> </td>
                                            <td><span>Whether the house is electrified?</span></td>
                                            <td>
                                            <select class="form-control" name="house_electrify" id="electrified">
                                                    <option value="">Select</option>
                                                    <option <?php if($data['house_electrified']=="Yes"){ echo "selected";} ?> value="Yes">Yes</option>
                                                    <option <?php if($data['house_electrified']=="No"){ echo "selected";} ?> value="No">No</option>
                                                </select>
											</td>
                                        </tr>
                                        <tr>
                                            <td><b>151.</b> </td>
                                            <td><span>What is your opinion about village road?</span></td>
                                            <td>
                                            <select class="form-control" name="road" id="road" onChange="showTextarea(this.id);">
                                                    <option value="">Select</option>
                                                    <option <?php if($data['road_opinion']=="Concrete Road"){ echo "selected";} ?> value="Concrete Road">Concrete Road</option>
                                                    <option <?php if($data['road_opinion']=="Pucca Road"){ echo "selected";} ?> value="Pucca Road">Pucca Road</option>
                                                    <option <?php if($data['road_opinion']=="Kucha Road"){ echo "selected";} ?> value="Kucha Road">Kucha Road</option>
                                                    <option <?php if($data['road_opinion']=="No Road"){ echo "selected";} ?> value="No Road">No Road</option>
                                                    <option <?php if($data['road_opinion']=="others"){ echo "selected";} ?> value="others">Other(Specify)</option>
                                                </select>
											</td>
                                            <?php if($data['road_opinion']=="others") { ?>
                                            <td><input type="text" name="road_other" id="textarea_road" style="display: none;height: 32px;width: 190px;" value="<?php echo $data['road_other']; ?>"></td>
                                            <?php } ?>
                                            <td><input type="text" name="road_other" id="textarea_road" style="display: none;height: 32px;width: 190px;"></td>
                                        </tr>
                                        <tr>
                                        <?php
										$transport_facilities=explode("-",$data["transport_facilities"]);

										?>
                                            <td><b>152.</b> </td>
                                            <td><span>What are the road communication/transportation facilities available in your village?</span></td>
                                            <td colspan="2">

                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" <?php for($i=0; $i <= count($transport_facilities); $i++) {  if($transport_facilities[$i]=="Walking"){ ?> checked="checked"<?php break; } }?>  name="road_comm[]" value="Walking" class="form-control">
                                                                Walking </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" <?php for($i=0; $i <= count($transport_facilities); $i++) {  if($transport_facilities[$i]=="Auto"){ ?> checked="checked"<?php break; } }?>  name="road_comm[]" value="Auto" class="form-control">
                                                                Auto </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" <?php for($i=0; $i <= count($transport_facilities); $i++) {  if($transport_facilities[$i]=="Tractor"){ ?> checked="checked"<?php break; } }?>  name="road_comm[]" value="Tractor" class="form-control">
                                                                Tractor </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>    
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" <?php for($i=0; $i <= count($transport_facilities); $i++) {  if($transport_facilities[$i]=="Jeep"){ ?> checked="checked"<?php break; } }?>  name="road_comm[]" value="Jeep"  class="form-control">
                                                                Jeep </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input id="roadComm" type="checkbox" <?php for($i=0; $i <= count($transport_facilities); $i++) {  if($transport_facilities[$i]=="others"){ ?> checked="checked"<?php break; } }?>  name="road_comm[]" value="others" class="form-control" onChange="showTextarea(this.id);">
                                                                Others </label>
                                                        </td>
                                                        <td>
                                                        <?php for($i=0; $i <= count($transport_facilities); $i++) {  if($transport_facilities[$i]=="others"){ ?>
                                                        <input type="text" class="form-control" name="transport_other" id="textarea_roadComm" value="<?php echo $data["transport_other"]; ?>">
                                                        <?php break; } }?>
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
                                        
                                        <tr>
                                            <td><b>153.</b> </td>
                                            <td><span>Shops available in your village(Specify)?</span></td>
                                            <td><textarea class="form-control" name="shop_avail"><?php echo $data['shop_available']; ?></textarea></td>
                                        </tr>
                                        <?php
$str = "SELECT DISTINCT * FROM std_income_other_facilities   m WHERE  m.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?>  
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
                                                        <td><input type="text" class="form-control" name="panchayat_diss" value="<?php echo $data['panchayat_distance']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Anganwadi</td>
                                                        <td><input type="text" class="form-control" name="anganwadi_diss" value="<?php echo $data['anganwadi_distance']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Primary School</td>
                                                        <td><input type="text" value="<?php echo $data['primary_school_diss']; ?>" class="form-control" name="p_school_diss"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Secondary School</td>
                                                        <td><input type="text" class="form-control" name="s_school_diss" value="<?php echo $data['secondary_school_diss']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>High School</td>
                                                        <td><input type="text" class="form-control" name="h_school_diss" value="<?php echo $data['high_school_diss']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>College</td>
                                                        <td><input type="text" class="form-control" name="college_diss" value="<?php echo $data['college_distance']; ?>"></td>
                                                    </tr>
                                               <tr>
                                                        <td></td>
                                                        <td>Public Health Centre</td>
                                                        <td><input type="text" class="form-control" name="helth_center_diss" value="<?php echo $data['health_center_diss']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Post Office</td>
                                                        <td><input type="text" class="form-control" name="po_diss" value="<?php echo $data['po_distance']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Bank</td>
                                                        <td><input type="text" class="form-control" name="bank_diss" value="<?php echo $data['bank_distance']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Police Station</td>
                                                        <td><input type="text" class="form-control" name="ps_distance" value="<?php echo $data['ps_distance']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>PDS outlet</td>
                                                        <td><input type="text" class="form-control" name="pds_distance" value="<?php echo $data['pds_distance']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Bus Stand</td>
                                                        <td><input type="text" class="form-control" name="bus_diss" value="<?php echo $data['bus_distance']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Railway Station</td>
                                                        <td><input type="text" class="form-control" name="railway_diss" value="<?php echo $data['railway_distance']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Daily Market</td>
                                                        <td><input type="text" class="form-control" name="market_diss" value="<?php echo $data['market_distance']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Community centre</td>
                                                        <td><input type="text" class="form-control" name="community_diss" value="<?php echo $data['community_distance']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Veterinary centre</td>
                                                        <td><input type="text" class="form-control" name="veterinary_diss" value="<?php echo $data['veterinary_distance']; ?>"></td>
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
                                    <?php
$str = "SELECT DISTINCT * FROM std_sanitation_health    m WHERE  m.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
$sanitation=explode("-",$data["sanitation"]);
?>  
                                        <tr>
                                            <td class="col-lg-1"><b>155.</b> </td>
                                            <td class="col-lg-3"><span>Sanitation</span></td>
                                            <td class="col-lg-5"><label class="checkbox-inline">
                                                    <input type="checkbox" name="sanitation[]" value="Open"  class="form-control" <?php for($i=0; $i <= count($sanitation); $i++) {  if($sanitation[$i]=="Open"){ ?> checked="checked"<?php break; } }?>>
                                                    Open </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="sanitation[]" value="Public Toilet"  class="form-control" <?php for($i=0; $i <= count($sanitation); $i++) {  if($sanitation[$i]=="Public Toilet"){ ?> checked="checked"<?php break; } }?>>
                                                    Public Toilet </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="sanitation[]" value="Private Toilet"  class="form-control" <?php for($i=0; $i <= count($sanitation); $i++) {  if($sanitation[$i]=="Private Toilet"){ ?> checked="checked"<?php break; } }?>>
                                                    Private Toilet </label></td>
                                            <td class="col-lg-3"></td>
                                        </tr>
                                        <tr>
                                            <td><b>156.</b></td>
                                            <td colspan="3"> <span> Ownership of Health Infrastructure available in your village ( record multiple responses ).
                                                    Please specify types of medicine used ( Ayurvedic , Homeopathic , Allopathic , Traditional etc. ) </span></td>
                                        </tr>
                                        <tr>
                                        <?php
										$health_infra_owner=explode("-",$data["health_infra_owner"]);
										?>
                                            <td>&nbsp;</td>
                                            <td><span>Ownership</span></td>
                                            <td colspan="2">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px;">
                                                                <input type="checkbox" class="form-control" name="ownership[]" value="Government" <?php for($i=0; $i <= count($health_infra_owner); $i++) {  if($health_infra_owner[$i]=="Government"){ ?> checked="checked"<?php break; } }?>>
                                                                Government </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="form-control" name="ownership[]" value="Private" <?php for($i=0; $i <= count($health_infra_owner); $i++) {  if($health_infra_owner[$i]=="Private"){ ?> checked="checked"<?php break; } }?>>
                                                                Private </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" class="form-control" name="ownership[]" value="NGO-run" <?php for($i=0; $i <= count($health_infra_owner); $i++) {  if($health_infra_owner[$i]=="NGO"){ ?> checked="checked"<?php break; } }?>>
                                                                NGO-run </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>  
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="ownership" name="ownership[]" onChange="showTextarea(this.id);" class="form-control" value="others" <?php for($i=0; $i <= count($health_infra_owner); $i++) {  if($health_infra_owner[$i]=="others"){ ?> checked="checked"<?php break; } }?>>
                                                                others(specify) </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" class="form-control" name="ownership[]" value="Not available" <?php for($i=0; $i <= count($health_infra_owner); $i++) {  if($health_infra_owner[$i]=="Not available"){ ?> checked="checked"<?php break; } }?>>
                                                                Not available </label>
                                                        </td>
                                                        <td>
                                                        <?php for($i=0; $i <= count($health_infra_owner); $i++) {  if($health_infra_owner[$i]=="others"){ ?>
                                                        <textarea class="form-control" name="owner_other" id="textarea_ownership"><?php echo $data["infra_owner_other"]; ?></textarea>
                                                        <?php break; } }?>
                                                        <textarea class="form-control" name="owner_other" id="textarea_ownership" style="display: none;"></textarea>
                                                        </td>
                                                    </tr>
                                                </table>  
                                            </td>

                                        </tr>
                                        
                                        <tr>
                                        <?php
										$type_medicine=explode("-",$data["type_medicine"]);
										?>
                                            <td>&nbsp;</td>
                                            <td><span>Types of medicine</span></td>
                                            <td colspan="2">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px;">
                                                                <input type="checkbox" class="form-control" name="medicine[]" value="Ayurvedic" <?php for($i=0; $i <= count($type_medicine); $i++) {  if($type_medicine[$i]=="Ayurvedic"){ ?> checked="checked"<?php break; } }?>>
                                                                Ayurvedic </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="form-control" name="medicine[]" value="Homeopathic" <?php for($i=0; $i <= count($type_medicine); $i++) {  if($type_medicine[$i]=="Homeopathic"){ ?> checked="checked"<?php break; } }?>>
                                                                Homeopathic </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" class="form-control" name="medicine[]" value="Allopathic" <?php for($i=0; $i <= count($type_medicine); $i++) {  if($type_medicine[$i]=="Allopathic"){ ?> checked="checked"<?php break; } }?>>
                                                                Allopathic </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>   
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="form-control" name="medicine[]" value="Traditional" <?php for($i=0; $i <= count($type_medicine); $i++) {  if($type_medicine[$i]=="Traditional"){ ?> checked="checked"<?php break; } }?>>
                                                                Traditional </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" id="medicine" name="medicine[]" onChange="showTextarea(this.id);" class="form-control" value="others" <?php for($i=0; $i <= count($type_medicine); $i++) {  if($type_medicine[$i]=="others"){ ?> checked="checked"<?php break; } }?>>
                                                                others(specify) </label>
                                                        </td>
                                                        <td>
                                                        <?php for($i=0; $i <= count($type_medicine); $i++) {  if($type_medicine[$i]=="others"){ ?>
                                                        <textarea class="form-control" name="medicine_other" id="textarea_medicine"><?php echo $data["type_medicine_other"]; ?></textarea>
                                                        <?php break; } }?>
                                                        <textarea class="form-control" name="medicine_other" id="textarea_medicine" style="display: none;"></textarea>
                                                        </td>
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
                                    <?php
$str = "SELECT DISTINCT * FROM std_education_information m WHERE  m.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);

?>  
                                        <tr>
                                            <td colspan="2">
                                                <table class="table">
                                                <tr>
                                                        <td class="col-lg-1"><b>157.</b></td>
                                                        <td class="col-lg-3"><span> Education Infrastructure available in your village(Specify) </span></td>
                                                        <td>
                                                            <input type="text" class="form-control" name="edu_infra" id="edu_infra" value="<?php echo $data['education_infra_avail']; ?>">
                                                        </td>
                                                        <td class="col-lg-4"> 
                                                        <?php 
														if($data['infra_other']!="") {
														?>
                                                            <input type="text" class="form-control" name="infra_other2" id="textarea_edu" style="height:29px;width:190px;" value="<?php echo $data['infra_other']; ?>">
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    
                                                    
													<tr>
                                                        <td style="vertical-align: top;"><b>158.</b></td>
                                                        <td style="vertical-align: top;"> <span> If drop-outs,ask the causes of drop-outs(Record the multiple responses) </span></td>
                                                        <td>
                                                            <select name="dropouts" class="form-control" onChange="showDropouts(this.value);">
                                                                <option value="">--Select--</option>
                                                                <option <?php if($data["drop_outs"]=="Yes") { echo "selected"; } ?> value="Yes">Yes</option>
                                                                <option <?php if($data["drop_outs"]=="No") { echo "selected"; } ?> value="No">No</option>
                                                            </select>
                                                            <br>
                                                            <?php if($data["drop_outs"]=="Yes") { 
															$cause_drop_outs=explode("-",$data["cause_drop_outs"]);
															?>
                                                            <div id="dropout_tr">
                                                                <span name="dropout_row" id="dropout_row">
                                                                    <label class="checkbox" >
                                                                        <input type="checkbox" name="drop-out[]" value="Children needed to work in order to sustain their livelihood"  class="form-control" <?php for($i=0; $i <= count($cause_drop_outs); $i++) {  if($cause_drop_outs[$i]=="Children needed to work in order to sustain their livelihood"){ ?> checked="checked"<?php break; } }?>>Children needed to work in order to sustain their livelihood
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="drop-out[]" value="Children had to look after siblings"  class="form-control" <?php for($i=0; $i <= count($cause_drop_outs); $i++) {  if($cause_drop_outs[$i]=="Children had to look after siblings"){ ?> checked="checked"<?php break; } }?>>Children had to look after siblings
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="drop-out[]" value="No job opportunities after education"  class="form-control" <?php for($i=0; $i <= count($cause_drop_outs); $i++) {  if($cause_drop_outs[$i]=="No job opportunities after education"){ ?> checked="checked"<?php break; } }?>>No job opportunities after education
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="drop-out[]" value="Primary school far away from the home"  class="form-control" <?php for($i=0; $i <= count($cause_drop_outs); $i++) {  if($cause_drop_outs[$i]=="Primary school far away from the home"){ ?> checked="checked"<?php break; } }?>>Primary school far away from the home
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="drop-out[]" value="Secondary school far away from the home"  class="form-control" <?php for($i=0; $i <= count($cause_drop_outs); $i++) {  if($cause_drop_outs[$i]=="Secondary school far away from the home"){ ?> checked="checked"<?php break; } }?>>Secondary school far away from the home
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="drop-out[]" value="Security problems for girls"  class="form-control" <?php for($i=0; $i <= count($cause_drop_outs); $i++) {  if($cause_drop_outs[$i]=="Security problems for girls"){ ?> checked="checked"<?php break; } }?>>Security problems for girls
                                                                    </label>
                                                                    <label class="checkbox" style="width:300px">
                                                                        <input type="checkbox" name="drop-out[]" value="others"  class="form-control"  id="drop-out" <?php for($i=0; $i <= count($cause_drop_outs); $i++) {  if($cause_drop_outs[$i]=="others"){ ?> checked="checked"<?php break; } }?>>Other(Specify)
                                                                    </label>
                                                                </span>
                                                            </div> 
                                                            <?php } ?>
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
                                                                        <input type="checkbox" name="drop-out[]" value="others"  class="form-control"  id="drop-out">Other(Specify)
                                                                    </label>
                                                                </span>
                                                            </div>
                                                        </td>

                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    

                                                    <tr>
                                                        <td><b>159.</b></td>
                                                        <td> <span> The subject/s you like most(Specify): </span></td>
                                                        <td><textarea class="form-control" name="subject_like"><?php echo $data['subject_like'];?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>160.</b></td>
                                                        <td> <span> Any hobbies/habits do you have: </span></td>
                                                        <td><textarea class="form-control" name="hobbies"><?php echo $data['hobbies'];?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>161.</b></td>
                                                        <td> <span> What was doing before joining <strong>KISS</strong>: </span></td>
                                                        <td><textarea class="form-control" name="before_kiss"><?php echo $data['doing_before_kiss'];?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                    <?php
											$improvment_after_kiss=explode("-",$data["improvment_after_kiss"]);
													?>
                                                        <td><b>162.</b> </td>
                                                        <td><span> What are the areas in which you have improved after joining <strong>KISS</strong>: </span></td>
                                                        <td>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="Behaviour"  class="form-control" <?php for($i=0; $i <= count($improvment_after_kiss); $i++) {  if($improvment_after_kiss[$i]=="Behaviour"){ ?> checked="checked"<?php break; } }?>>Behaviour
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="Discipline"  class="form-control" <?php for($i=0; $i <= count($improvment_after_kiss); $i++) {  if($improvment_after_kiss[$i]=="Discipline"){ ?> checked="checked"<?php break; } }?>>Discipline
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="Smartness"  class="form-control" <?php for($i=0; $i <= count($improvment_after_kiss); $i++) {  if($improvment_after_kiss[$i]=="Smartness"){ ?> checked="checked"<?php break; } }?>>Smartness
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="Education"  class="form-control" <?php for($i=0; $i <= count($improvment_after_kiss); $i++) {  if($improvment_after_kiss[$i]=="Education"){ ?> checked="checked"<?php break; } }?>>Education
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="General Knowledge"  class="form-control" <?php for($i=0; $i <= count($improvment_after_kiss); $i++) {  if($improvment_after_kiss[$i]=="General Knowledge"){ ?> checked="checked"<?php break; } }?>>General Knowledge
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="Vocational Education"  class="form-control" <?php for($i=0; $i <= count($improvment_after_kiss); $i++) {  if($improvment_after_kiss[$i]=="Vocational Education"){ ?> checked="checked"<?php break; } }?>>Vocational Education
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="Sports"  class="form-control" <?php for($i=0; $i <= count($improvment_after_kiss); $i++) {  if($improvment_after_kiss[$i]=="Sports"){ ?> checked="checked"<?php break; } }?>>Sports
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_areas[]" value="Games"  class="form-control" <?php for($i=0; $i <= count($improvment_after_kiss); $i++) {  if($improvment_after_kiss[$i]=="Games"){ ?> checked="checked"<?php break; } }?>>Games
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="improved_area[]" id="improved_area" value="others"  class="form-control" onChange="showTextarea(this.id);" <?php if($data["improvment_other"]!=""){ ?> checked="checked"<?php }?>>Others
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td>
                                                        <?php if($data["improvment_other"]!=""){ ?> 
                                                            <input type="text" class="form-control" name="other_improve" id="textarea_improved_area" style="height: 32px;width: 190px;" value="<?php echo $data["improvment_other"]; ?>">
                                                            <?php }?>
                                                            <input type="text" class="form-control" name="other_improve" id="textarea_improved_area" style="display: none;height: 32px;width: 190px;">
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php
$str = "SELECT DISTINCT * FROM std_education_activity  m WHERE  m.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
$activity=explode("-",$data["activity"]);
?>  
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
                                                                            <input type="checkbox" name="activities[]" value="Debate"  class="form-control" <?php for($i=0; $i <= count($activity); $i++) {  if($activity[$i]=="Debate"){ ?> checked="checked"<?php break; } }?>>Debate
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Essay"  class="form-control" <?php for($i=0; $i <= count($activity); $i++) {  if($activity[$i]=="Essay"){ ?> checked="checked"<?php break; } }?>>Essay
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="GK"  class="form-control" <?php for($i=0; $i <= count($activity); $i++) {  if($activity[$i]=="GK"){ ?> checked="checked"<?php break; } }?>>GK
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="NSS"  class="form-control" <?php for($i=0; $i <= count($activity); $i++) {  if($activity[$i]=="NSS"){ ?> checked="checked"<?php break; } }?>>NSS
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Scout&Guide"  class="form-control" <?php for($i=0; $i <= count($activity); $i++) {  if($activity[$i]=="Scout&Guide"){ ?> checked="checked"<?php break; } }?>>Scout &amp; Guide
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Cub Bul-Bul"  class="form-control" <?php for($i=0; $i <= count($activity); $i++) {  if($activity[$i]=="Cub Bul"){ ?> checked="checked"<?php break; } }?>>Cub Bul-Bul
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Rovers Rangers"  class="form-control" <?php for($i=0; $i <= count($activity); $i++) {  if($activity[$i]=="Rovers Rangers"){ ?> checked="checked"<?php break; } }?>>Rovers Rangers
                                                                        </label>
                                                                    </td>

                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="NCC"  class="form-control" <?php for($i=0; $i <= count($activity); $i++) {  if($activity[$i]=="NCC"){ ?> checked="checked"<?php break; } }?>>NCC
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Red Cross"  class="form-control" <?php for($i=0; $i <= count($activity); $i++) {  if($activity[$i]=="Red Cross"){ ?> checked="checked"<?php break; } }?>>Red Cross
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="KYS"  class="form-control" <?php for($i=0; $i <= count($activity); $i++) {  if($activity[$i]=="KYS"){ ?> checked="checked"<?php break; } }?>>KYS
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Peer Educator"  class="form-control" <?php for($i=0; $i <= count($activity); $i++) {  if($activity[$i]=="Peer Educator"){ ?> checked="checked"<?php break; } }?>>Peer Educator
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" id="activity_other" value="others"  class="form-control" <?php for($i=0; $i <= count($activity); $i++) {  if($activity[$i]=="others"){ ?> checked="checked"<?php break; } }?> onChange="showTextarea(this.id);">Others
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td>
                                                        <?php for($i=0; $i <= count($activity); $i++) {  if($activity[$i]=="others"){ ?>
                                                        <input type="text" class="form-control" name="other_activity" id="textarea_activity_other" value="<?php echo $data["activity_other"]; ?>" style="height: 32px;width: 190px;">
														<?php break; } }?>
                                                            <input type="text" class="form-control" name="other_activity" id="textarea_activity_other" style="display: none;height: 32px;width: 190px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    <?php
													$games=explode("-",$data["games"]);
?>
                                                        <td><b>163.2</b></td>
                                                        <td> <span> Sports and Games: </span></td>
                                                        <td colspan="2">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Sprint"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Sprint"){ ?> checked="checked"<?php break; } }?>>Sprint
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Kho Kho"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Kho Kho"){ ?> checked="checked"<?php break; } }?>>Kho-Kho
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Archery"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Archery"){ ?> checked="checked"<?php break; } }?>>Archery
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="sports[]" value="Tennis"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Tennis"){ ?> checked="checked"<?php break; } }?>>Tennis
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Table Tennis"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Table Tennis"){ ?> checked="checked"<?php break; } }?>>Table Tennis
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Rugby"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Rugby"){ ?> checked="checked"<?php break; } }?>>Rugby
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Net ball"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Net ball"){ ?> checked="checked"<?php break; } }?>>Net ball
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Cricket"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Cricket"){ ?> checked="checked"<?php break; } }?>>Cricket
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Weight lifting"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Weight lifting"){ ?> checked="checked"<?php break; } }?>>Weight lifting
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="sports[]" value="Lodu"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Lodu"){ ?> checked="checked"<?php break; } }?>>Lodu
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Football"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Football"){ ?> checked="checked"<?php break; } }?>>Football
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Soft ball"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Soft ball"){ ?> checked="checked"<?php break; } }?>>Soft ball
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Hand ball"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Hand ball"){ ?> checked="checked"<?php break; } }?>>Hand ball
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Base ball"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Base ball"){ ?> checked="checked"<?php break; } }?>>Base ball
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Carom"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Carom"){ ?> checked="checked"<?php break; } }?>>Carom
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Hockey"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Hockey"){ ?> checked="checked"<?php break; } }?>>Hockey
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Chess"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Chess"){ ?> checked="checked"<?php break; } }?>>Chess
                                                                        </label>  
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="sports[]" value="Kabadi"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Kabadi"){ ?> checked="checked"<?php break; } }?>>Kabadi
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Kick boxing"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Kick boxing"){ ?> checked="checked"<?php break; } }?>>Kick boxing
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="others" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="others"){ ?> checked="checked"<?php break; } }?>  class="form-control"  id="sports" onChange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                        <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="others"){ ?>
                                                                        <input type="text" class="form-control" name="textarea_sports" id="textarea_sports" style="height: 32px;width:190px;" value="<?php echo $data["game_other"]; ?>">
                                                                        <?php break; } }?>
                                                                        <input type="text" class="form-control" name="textarea_sports" id="textarea_sports" style="display: none;height: 32px;width:190px;">

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Judo"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Judo"){ ?> checked="checked"<?php break; } }?>>Judo
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Volley ball"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Volley ball"){ ?> checked="checked"<?php break; } }?>>Volley ball
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="Athletics"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Athletics"){ ?> checked="checked"<?php break; } }?>>Athletics
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="sports[]" value="Yoga"  class="form-control" <?php for($i=0; $i <= count($games); $i++) {  if($games[$i]=="Yoga"){ ?> checked="checked"<?php break; } }?>>Yoga
                                                                        </label> 
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    
                                                     <tr>
                                                     <?php
													$music=explode("-",$data["music"]);
?>
                                                        <td><b>163.3</b> </td>
                                                        <td><span> Music </span></td>
                                                        <td colspan="2">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px;margin-left:10px">
                                                                            <input type="checkbox" name="music[]" value="Light vocal"  class="form-control" <?php for($i=0; $i <= count($music); $i++) {  if($music[$i]=="Light vocal"){ ?> checked="checked"<?php break; } }?>>Light vocal
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="music[]" value="Odissi vocal"  class="form-control" <?php for($i=0; $i <= count($music); $i++) {  if($music[$i]=="Odissi vocal"){ ?> checked="checked"<?php break; } }?>>Odissi vocal
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="music[]" value="others"  class="form-control" <?php for($i=0; $i <= count($music); $i++) {  if($music[$i]=="others"){ ?> checked="checked"<?php break; } }?>  id="music" onChange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>  
                                                                    <?php for($i=0; $i <= count($music); $i++) {  if($music[$i]=="others"){ ?>
                                                                    <textarea class="form-control" name="textarea_music" id="textarea_music"><?php echo $data["music_other"]; ?></textarea>
                                                                    <?php break; } }?>
                                                                        <textarea class="form-control" name="textarea_music" id="textarea_music" style="display: none;"></textarea>
                                                                    </td>
                                                                </tr>
                                                            </table>     
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    <?php
													$dance=explode("-",$data["dance"]);
?>
                                                        <td>&nbsp;</td>
                                                        <td><span> Dance </span></td>
                                                        <td colspan="2">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px;margin-left:10px">
                                                                            <input type="checkbox" name="dance[]" value="Odissi"  class="form-control" <?php for($i=0; $i <= count($dance); $i++) {  if($dance[$i]=="Odissi"){ ?> checked="checked"<?php break; } }?>>Odissi
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="dance[]" value="Modern"  class="form-control" <?php for($i=0; $i <= count($dance); $i++) {  if($dance[$i]=="Modern"){ ?> checked="checked"<?php break; } }?>>Modern
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="dance[]" value="Semi Classical"  class="form-control" <?php for($i=0; $i <= count($dance); $i++) {  if($dance[$i]=="Semi Classical"){ ?> checked="checked"<?php break; } }?>>Semi Classical
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="dance[]" value="others"  class="form-control"  id="dance" <?php for($i=0; $i <= count($dance); $i++) {  if($dance[$i]=="others"){ ?> checked="checked"<?php break; } }?> onChange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                    </td>

                                                                    <td> 
                                                                    <?php for($i=0; $i <= count($dance); $i++) {  if($dance[$i]=="others"){ ?> 
                                                                        <textarea class="form-control" name="textarea_dance" id="textarea_dance"><?php echo $data["dance_other"]; ?></textarea>
                                                                        <?php break; } }?>
                                                                        <textarea class="form-control" name="textarea_dance" id="textarea_dance" style="display: none;"></textarea>
                                                                    </td>
                                                                </tr>
                                                            </table>     
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    <?php
													$instrumental=explode("-",$data["instrumental"]);
?>
                                                        <td>&nbsp;</td>
                                                        <td><span> Instrumental </span></td>
                                                        <td colspan="2">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px;">
                                                                            <input type="checkbox" name="instrumental[]" value="Guitar"  class="form-control" <?php for($i=0; $i <= count($instrumental); $i++) {  if($instrumental[$i]=="Guitar"){ ?> checked="checked"<?php break; } }?>>Guitar
                                                                        </label>
                                                                    </td>
                                                                    <td>

                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="instrumental[]" value="Drums"  class="form-control" <?php for($i=0; $i <= count($instrumental); $i++) {  if($instrumental[$i]=="Drums"){ ?> checked="checked"<?php break; } }?>>Drums (Pad)
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="instrumental[]" value="Keyboard"  class="form-control" <?php for($i=0; $i <= count($instrumental); $i++) {  if($instrumental[$i]=="Keyboard"){ ?> checked="checked"<?php break; } }?>>Keyboard
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>  
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="instrumental[]" value="Tabla"  class="form-control" <?php for($i=0; $i <= count($instrumental); $i++) {  if($instrumental[$i]=="Tabla"){ ?> checked="checked"<?php break; } }?>>Tabla
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="instrumental[]" value="others"  class="form-control" <?php for($i=0; $i <= count($instrumental); $i++) {  if($instrumental[$i]=="others"){ ?> checked="checked"<?php break; } }?> id="instrumental" onChange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                    <?php for($i=0; $i <= count($instrumental); $i++) {  if($instrumental[$i]=="others"){ ?>
                                                                    
                                                                    <textarea class="form-control" name="textarea_instrumental" id="textarea_instrumental"><?php echo $data["instrumental_other"]; ?></textarea>
                                                                    <?php break; } }?>
                                                                        <textarea class="form-control" name="textarea_instrumental" id="textarea_instrumental" style="display: none;"></textarea>
                                                                    </td>
                                                                </tr>
                                                            </table>    
                                                        </td>
                                                    </tr>
                                                    
                                                    
                                                    <tr>
                                                    <?php
													$yoga=explode("-",$data["yoga"]);
?>
                                                        <td><b>163.4</b></td>
                                                        <td> <span> Yoga and Meditation: </span></td>
                                                        <td>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="yoga[]" value="Yoga"  class="form-control" <?php for($i=0; $i <= count($yoga); $i++) {  if($yoga[$i]=="Yoga"){ ?> checked="checked"<?php break; } }?>>Yoga
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="yoga[]" value="Meditation"  class="form-control" <?php for($i=0; $i <= count($yoga); $i++) {  if($yoga[$i]=="Meditation"){ ?> checked="checked"<?php break; } }?>>Meditation
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="yoga[]" value="others"  class="form-control" <?php for($i=0; $i <= count($yoga); $i++) {  if($yoga[$i]=="others"){ ?> checked="checked"<?php break; } }?>  id="yoga" onChange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 
                                                                     <?php for($i=0; $i <= count($yoga); $i++) {  if($yoga[$i]=="others"){ ?>
                                                                     <textarea class="form-control" name="textarea_yoga" id="textarea_yoga"><?php echo $data["yoga_other"]; ?></textarea>
                                                                     <?php break; } }?>
                                                                     
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
                                                            <select class="form-control" name="vocational" id="vocational" onChange="showTextarea(this.id);">
                                                                <option value="">--Select--</option>
                                                                <option <?php if($data["vocational"]=="Computer training") { echo "selected"; } ?> value="Computer training">Computer training</option>
                                                                <option <?php if($data["vocational"]=="Tailoring") { echo "selected"; } ?> value="Tailoring">Tailoring</option>
                                                                <option <?php if($data["vocational"]=="Recycle Paper") { echo "selected"; } ?> value="Recycle Paper">Recycle Paper</option>
                                                                <option <?php if($data["vocational"]=="Food Processing & Preservation") { echo "selected"; } ?> value="Food Processing & Preservation">Food Processing & Preservation</option>
                                                                <option <?php if($data["vocational"]=="Composite Farming") { echo "selected"; } ?> value="Composite Farming">Composite Farming</option>
                                                                <option <?php if($data["vocational"]=="Applique") { echo "selected"; } ?> value="Applique">Applique</option>
                                                                <option <?php if($data["vocational"]=="Incense sticks") { echo "selected"; } ?> value="Incense sticks">Incense sticks</option>
                                                                <option <?php if($data["vocational"]=="Pisciculture") { echo "selected"; } ?> value="Pisciculture">Pisciculture</option>
                                                                <option <?php if($data["vocational"]=="Soft toys") { echo "selected"; } ?> value="Soft toys">Soft toys</option>
                                                                <option <?php if($data["vocational"]=="Photo Framing") { echo "selected"; } ?> value="Photo Framing">Photo Framing</option>
                                                                <option <?php if($data["vocational"]=="Bakery") { echo "selected"; } ?> value="Bakery">Bakery</option>
                                                                <option <?php if($data["vocational"]=="Animal Husbandry") { echo "selected"; } ?> value="Animal Husbandry">Animal Husbandry</option>
                                                                <option <?php if($data["vocational"]=="Painting") { echo "selected"; } ?> value="Painting">Painting</option>
                                                                <option <?php if($data["vocational"]=="Security Guard") { echo "selected"; } ?> value="Security Guard">Security Guard</option>
                                                                <option <?php if($data["vocational"]=="Arts and Craft") { echo "selected"; } ?> value="Arts and Craft">Arts and Craft</option>
                                                                <option <?php if($data["vocational"]=="Chemical Products") { echo "selected"; } ?> value="Chemical Products">Chemical Products</option>
                                                                <option <?php if($data["vocational"]=="Driving") { echo "selected"; } ?> value="Driving">Driving</option>
                                                                <option <?php if($data["vocational"]=="Medical Atendant") { echo "selected"; } ?> value="Medical Atendant">Medical Atendant</option>
                                                                <option <?php if($data["vocational"]=="Mineral Water") { echo "selected"; } ?> value="Mineral Water">Mineral Water</option>
                                                                <option <?php if($data["vocational"]=="others") { echo "selected"; } ?> value="others">others(specify)</option>
                                                            </select>
                                                        </td>
                                                        <td style="padding-left: 5%;width: 25%;">
                                                       <?php if($data["vocational"]=="others") { ?>     <textarea class="form-control" name="textarea_vocational" id="textarea_vocational" style="height:32px;width:190px;"><?php echo $data["vocational_other"]; ?></textarea>
                                                            <?php  } ?>
                                                            <textarea class="form-control" name="textarea_vocational" id="textarea_vocational" style="display: none;height:32px;width:190px;"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.7</b></td>
                                                        <td> <span> English Access: </span></td>
                                                        <td>
                                                            <select class="form-control" name="english_access">
                                                                <option value="">--Select--</option>
                                                                <option <?php if($data["english_access"]=="Attended") { echo "selected"; } ?> value="Attended">Attended</option>
                                                                <option <?php if($data["english_access"]=="Not Attended") { echo "selected"; } ?> value="Not Attended">Not Attended</option>
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
                                                                 <?php
                                                        $query2="SELECT DISTINCT `competition_level`,`prize`,`place`,`year` FROM `std_education_achive` where `std_id`='$sid'";
                                               $result2=mysqli_query($con,$query2);
                                               while($data=mysqli_fetch_assoc($result2)){
											   $json10[] = $data["competition_level"];
												  $json11[] = $data["prize"];
												  $json12[] = $data["place"];
												  $json13[] = $data["year"];
												}
												$competition_level=explode('"',json_encode($json10));
												$prize=explode('"',json_encode($json11));
												$place=explode('"',json_encode($json12));
												$year=explode('"',json_encode($json13));
											   ?>
                                                                    
                                                                <tr>
                                                                        <td> 1 </td>
                                                                        <td><input class="form-control" type="text" name="comp_level[]" value="<?php echo $competition_level[1];?>"></td>
                                                                        <td><input class="form-control" type="text" name="prize[]" value="<?php echo $prize[1];?>"></td>
                                                                        <td><input class="form-control" type="text" name="place[]" value="<?php echo $place[1];?>"></td>
                                                                        <td><input class="form-control" type="text" name="year[]" value="<?php echo $year[1];?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 2 </td>
                                                                        <td><input class="form-control" type="text" name="comp_level[]" value="<?php echo $competition_level[3];?>"></td>
                                                                        <td><input class="form-control" type="text" name="prize[]" value="<?php echo $prize[3];?>"></td>
                                                                        <td><input class="form-control" type="text" name="place[]" value="<?php echo $place[3];?>"></td>
                                                                        <td><input class="form-control" type="text" name="year[]" value="<?php echo $year[3];?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 3 </td>
                                                                        <td><input class="form-control" type="text" name="comp_level[]" value="<?php echo $competition_level[5];?>"></td>
                                                                        <td><input class="form-control" type="text" name="prize[]" value="<?php echo $prize[5];?>"></td>
                                                                        <td><input class="form-control" type="text" name="place[]" value="<?php echo $place[5];?>"></td>
                                                                        <td><input class="form-control" type="text" name="year[]" value="<?php echo $year[5];?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 4 </td>
                                                                       <td><input class="form-control" type="text" name="comp_level[]" value="<?php echo $competition_level[7];?>"></td>
                                                                        <td><input class="form-control" type="text" name="prize[]" value="<?php echo $prize[7];?>"></td>
                                                                        <td><input class="form-control" type="text" name="place[]" value="<?php echo $place[7];?>"></td>
                                                                        <td><input class="form-control" type="text" name="year[]" value="<?php echo $year[7];?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 5 </td>
                                                                        <td><input class="form-control" type="text" name="comp_level[]" value="<?php echo $competition_level[9];?>"></td>
                                                                        <td><input class="form-control" type="text" name="prize[]" value="<?php echo $prize[9];?>"></td>
                                                                        <td><input class="form-control" type="text" name="place[]" value="<?php echo $place[9];?>"></td>
                                                                        <td><input class="form-control" type="text" name="year[]" value="<?php echo $year[9];?>"></td>
                                                                    </tr>
                                                                   

                                                                </tbody>
                                                            </table></td>
                                                    </tr>
                                                    <?php
$str = "SELECT DISTINCT * FROM std_education_other   m WHERE  m.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?>  
													<tr>
                                                        <td><b>165.</b> </td>
                                                        <td><span> What is your ambition: </span></td>
                                                        <td>
                                                            <select name="ambition" id="ambition" class="form-control" onChange="showTextarea(this.id);">
                                                                <option value="">--Select--</option>
                                                                <option <?php if($data["ambition"]=="Doctor") { echo "selected";}?> value="Doctor">Doctor</option>
                                                                <option <?php if($data["ambition"]=="Engineer") { echo "selected";}?> value="Engineer">Engineer</option>
                                                                <option <?php if($data["ambition"]=="Teacher") { echo "selected";}?> value="Teacher">Teacher</option>
                                                                <option <?php if($data["ambition"]=="Nurse") { echo "selected";}?> value="Nurse">Nurse</option>
                                                                <option <?php if($data["ambition"]=="Social Worker") { echo "selected";}?> value="Social Worker">Social Worker</option>
                                                                <option <?php if($data["ambition"]=="others") { echo "selected";}?> value="others">Others</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                        <?php if($data["ambition"]=="others") { ?>
                                                            <input type="text" class="form-control" name="textarea_ambition" id="textarea_ambition" style="height: 32px;width: 190px;">
                                                            <?php } ?>
                                                            <input type="text" class="form-control" name="textarea_ambition" id="textarea_ambition" style="display: none;height: 32px;width: 190px;">
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><b>166.</b> </td>
                                                        <td><span> What are your plans to achieve your ambition: </span></td>
                                                        <td><textarea class="form-control" name="ambition_plan"><?php echo $data['ambition_plan']; ?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>167.</b> </td>
                                                        <td><span> Importance/Role of <strong>KISS</strong> in achieving your ambition: </span></td>
                                                        <td><textarea class="form-control" name="ambition_achive"><?php echo $data['kiss_role_ambition']; ?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>168.</b> </td>
                                                        <td><span> How you will involve yourself for achieving the objectives of <strong>KISS</strong>: </span></td>
                                                        <td><textarea class="form-control" name="obj_achive_involve"><?php echo $data['obj_achive_involve']; ?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>169.</b> </td>
                                                        <td><span> Present behavior of the student:- </span></td>
                                                        <td>
                                                        <select class="form-control" name="behavior" id="behavior" onChange="showTextarea(this.id);">
                                                                <option value="">Select</option>
                                                                <option <?php if($data["student_behaviour"]=="Shy") { echo "selected";}?> value="Shy">Shy</option>
                                                                <option <?php if($data["student_behaviour"]=="Smart") { echo "selected";}?> value="Smart">Smart</option>
                                                                <option <?php if($data["student_behaviour"]=="others") { echo "selected";}?> value="others">others(specify)</option>
                                                            </select>
														 <td>
                                                       
                                                        <input class="form-control" type="text" name="" id="textarea_behavior" style="display: none;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>170.</b> </td>
                                                        <td><span> Any other remarks by the teacher/mentor: </span></td>
                                                        <td><textarea class="form-control" name="remark"><?php echo $data['remark']; ?></textarea></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                    </table>
                                </fieldset>
                                <div class="form-group">
                                    <div class="col-lg-4 col-lg-offset-4">
                                        <input type="submit"  name="update" class="btn btn-primary btn-sm btn-block" value="Update">
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
                            <li role="presentation"><a href="#sanitation" aria-controls="sanitation" role="tab" data-toggle="tab" onClick="scrolTop()">Sanitation &amp; Health</a></li>
                            <li role="presentation"><a href="#education" aria-controls="education" role="tab" data-toggle="tab" onClick="scrolTop()">Education</a></li>
                        </ul>

                    </div>
                    <div class="clearfix" style="height:50px;"></div>
                </form>
            </div>
        </div>
    </body>   
    
    
    

	<script>
    function winClose()
	{
		window.close();	
	}
    </script>
</html>
<?php
}
?>