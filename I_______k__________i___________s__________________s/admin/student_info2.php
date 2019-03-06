<?php
include '../config.php';
$sid = $_REQUEST['s_id'];
echo $str = "SELECT DISTINCT * FROM std_general_information a WHERE a.std_id='$sid'";
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

                        <h1 id="forms">Student Information <span class="pull-right"><span><a href="javascript:void(0)" onclick="winClose()" class="btn btn-primary">Go to reports</a> </span> </h1>
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
                                            <td class="col-lg-5"><?php echo $data['std_bpl_card_no']; ?></td>
                                            </tr>
                                        <tr>
                                            <td class="col-lg-1"><b>101.</b></td>
                                            <td class="col-lg-3">Name of the student</td>
                                            <td class="col-lg-5"><?php echo $data['std_name']; ?></td>

                                        </tr>
                                        <tr>
                                            <td class="col-lg-1"><b>101.1.</b></td>
                                            <td>Year you joined</td>
                                            <td><?php echo $data['join_year']; ?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-1"><b>101.2.</b></td>
                                            <td>Class you joined</td>
                                            <td><?php echo $data['join_class']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>101.3.</b></td>
                                            <td>How you came to know about <strong>KISS</strong> ?</td>
                                            <td><?php echo $data['info_kiss']; ?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>101.4.</b></td>
                                            <td>Gender</td>
                                            <td><?php echo $data['gender']; ?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>101.5.</b></td>
                                            <td>Marital status</td>
                                            <td><?php echo $data['maritial_status']; ?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>102.</b></td>
                                            <td>Class </td>
                                            <td><?php echo $data['class']; ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><b>103.</b></td>
                                            <td>Section</td>
                                            <td><?php echo $data['section']; ?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>104.</b></td>
                                            <td>Roll no.</td>
                                            <td><?php echo $data['roll_no']; ?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>104.1.</b></td>
                                            <td>Blood group</td>
                                            <td><?php echo $data['blood_group']; ?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>104.2.</b></td>
                                            <td>DOB</td>
                                            <td><?php echo $data['dob']; ?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>105.</b></td>
                                            <td>Name of the mentor</td>
                                            <td><?php echo $data['mentor_name']; ?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>106.</b></td>
                                            <td>Contact No. Of Mentor</td>
                                            <td><?php echo $data['mentor_ph']; ?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>106.1.</b></td>
                                            <td>Name Of Local Gaurdian</td>
                                            <td><?php echo $data['l_gaurdian_name']; ?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>106.2.</b></td>
                                            <td>Contact No. Of Local Gaurdian</td>
                                            <td><?php echo $data['l_gaurdian_ph']; ?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>106.3.</b></td>
                                            <td>Contact No. Of Your Parents</td>
                                            <td><?php echo $data['parents_ph']; ?></td>
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
                                                        <td><?php echo $data['mother_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>108</b></td>
                                                        <td>Name of the Father</td>
                                                        <td><?php echo $data['father_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>109</b></td>
                                                        <td>Name of the State</td>
                                                        <td><?php echo $data['state_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>110</b></td>
                                                        <td>Name of the District</td>
                                                        <td><?php echo $data['district_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>111</b></td>
                                                        <td>Name of the Block</td>
                                                        <td><?php echo $data['block_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>112</b></td>
                                                        <td>Name of the Gram Panchaayat</td>
                                                        <td><?php echo $data['panchayat_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>113</b></td>
                                                        <td>Name of the Village</td>
                                                        <td><?php echo $data['village_name']; ?></td>
                                                    </tr>
                                                </table></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>113.1.</b></td>
                                            <td>Distance from your village to <strong>KISS</strong> </td>
                                            <td><?php echo $data['disstance_to_kiss']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>114.</b></td>
                                            <td>Name Of the <?php if($data['tribe_name']=="primitive") echo "primitive"; else echo "scheduled"; ?> tribe</td>
                                            <td><?php echo $data['tribe_type']; ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>114.1.</b>
                                            </td>
                                            <td>


                                                Dialect you speak


                                            </td>
                                            <td><?php echo $data['dialect_speek']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>114.2.</b></td>
                                            <td>Whether the student belongs to differently-abled category?</td>
                                            <td><?php echo $data['diff_able_cat']; ?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>115.</b></td>
                                            <td>Religion</td>
                                            <td><?php if($data['religion']!="")echo $data['religion'];else echo $data['religion_other']; ?></td>
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
                                                                                     <?php
$str = "SELECT DISTINCT * FROM std_household_background c WHERE  c.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?>
                                                <tr>
                                                
                                                    <td><b>116 A.</b></td>
                                                    <td>0 to 6 Years Members</td>
                                                    <td><?php echo $data['0_6_male']; ?></td>
                                                    <td><?php echo $data['0_6_female']; ?></td>
                                                    <td><?php echo $data['0_6_male']+$data['0_6_female']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>116 B.</b></td>
                                                    <td>7-17 years Members</td>
                                                    <td><?php echo $data['7_17_male']; ?></td>
                                                    <td><?php echo $data['7_17_female']; ?></td>
                                                    <td><?php echo $data['7_17_male']+$data['7_17_female'];  ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>116 C.</b></td>
                                                    <td>Adults</td>
                                                    <td><?php echo $data['adult_male']; ?></td>
                                                    <td><?php echo $data['adult_female']; ?></td>
                                                    <td><?php echo $data['7_17_male']+$data['7_17_female'];  ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>117.</b></td>
                                                    <td>Total members in the family</td>
                                                    <td><?php echo $data['total_male']; ?></td>
                                                    <td><?php echo $data['total_female']; ?></td>
                                                    <td><?php echo $data['total_member'];  ?></td>
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
                                               <?php $slno=119;
                                               $query="select DISTINCT relative_name,relative_class,relation from std_household_rel_education where `std_id`='$sid'";
                                               $result=mysqli_query($con,$query);
                                               while($row=mysqli_fetch_array($result)){?>
                                                <tr>
                                                    <td><b><?php echo $slno; ?></b></td>
                                                    <td><?php echo $row['relative_name']; ?></td>
                                                    <td><?php echo $row['relative_class']; ?></td>
                                                    <td><?php echo $row['relation']; ?></td>
                                                </tr>
                                               <?php $slno++; }  ?>
                                                
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
?>std_household_drink_source
                                                    <td><?php echo $data['male_earn']; ?></td>
                                                    <td><?php echo $data['female_earn']; ?></td>
                                                    <td>
                                                        <table class="table" border="0">
                                                            <tr>
                                                                <td>A. Primary <br>
                                                                    <?php echo $data['occu_primary']; ?></td>
                                                                <td>B. Secondary <br>
                                                                    <?php echo $data['occu_secondary']; ?></td>
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
                                                        <?php echo $data['occu_code']; ?></td>
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
?>std_household_stock_poultry 
                                                <tr>
                                                    <td>A</td>
                                                    <td>Open well</td>
                                                    <td><?php echo $data['open_well_owner']; ?></td>
                                                    <td><?php echo $data['open_well_quality']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>B</td>
                                                    <td>Tube well</td>
                                                    <td><?php echo $data['tube_well_owner']; ?></td>
                                                    <td><?php echo $data['tube_well_quality']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>C</td>
                                                    <td>Piped</td>
                                                    <td><?php echo $data['piped_owner']; ?></td>
                                                    <td><?php echo $data['piped_quality']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>D</td>
                                                    <td>Pond/tank/river</td>
                                                    <td><?php echo $data['PTR_owner']; ?></td>
                                                    <td><?php echo $data['PTR_quality']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>E</td>
                                                    <td>Others(specify) <br>
                                                    <td><?php echo $data['other_owner']; ?></td>
                                                    <td><?php echo $data['other_quality']; ?></td></td>
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
                                        <td colspan="3"><?php echo $data['problem_info']; ?></td>
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
                                                    <td><?php echo $data['num_cow']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>129</b></td>
                                                    <td>Bullock</td>
                                                    <td><?php echo $data['num_bullock']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>130</b></td>
                                                    <td>Buffalo</td>
                                                    <td><?php echo $data['num_buffalo']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>131</b></td>
                                                    <td>calf</td>
                                                    <td><?php echo $data['num_calf']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>132</b></td>
                                                    <td>Goat/sheep</td>
                                                    <td><?php echo $data['num_goat']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>133</b></td>
                                                    <td>poultry</td>
                                                    <td><?php echo $data['num_poultry']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>134</b></td>
                                                    <td>others(specify)</td>
                                                    <td><?php echo $data['num_others']; ?></td>
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
                                                <input type="checkbox" name="mud_house_hut" <?php if($data['mud_house_hut']!=0){ ?> checked <?php } ?> disabled class="form-control">
                                                Mud House/hut </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="thatched_house" <?php if($data['thatched_house']!=0){ ?> checked <?php } ?> disabled class="form-control">
                                                Thatched house </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="semi_pucca" <?php if($data['semi_pucca']!=0){ ?> checked <?php } ?> disabled class="form-control">
                                                Semi Pucca </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="Pucca" <?php if($data['pucca']!=0){ ?> checked <?php } ?> disabled class="form-control">
                                                Pucca </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="Other" <?php if($data['other']!=0){ ?> checked <?php } ?> disabled class="form-control">
                                                Any Other </label></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><b>No.of rooms</b></td>
                                        <td colspan="2"><input type="text" value="<?php echo $data['mudhouse_hut_room']; ?>" style="width: 50px;" readonly>
                                            <input type="text" value="<?php echo $data['thatched_room']; ?>" style="width: 50px;margin-left: 14%;" readonly>
                                            <input type="text" value="<?php echo $data['semi_pucca_room']; ?>" style="width: 50px;margin-left: 15%;" readonly>
                                            <input type="text" value="<?php echo $data['pucca_room']; ?>" style="width: 50px;margin-left: 8%;" readonly>
                                            <input type="text" value="<?php echo $data['other_room']; ?>" style="width: 50px;margin-left: 4%;" readonly></td>
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
                                                    <td><?php echo $data['num_bullock_cart']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>137</b></td>
                                                    <td>Plough</td>
                                                    <td><?php echo $data['num_plough']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>138</b></td>
                                                    <td>Thresher</td>
                                                    <td><?php echo $data['num_thresher']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>139</b></td>
                                                    <td>Cycle/Motor Cycle</td>
                                                    <td><?php echo $data['no_vehicle']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>140</b></td>
                                                    <td>TV</td>
                                                    <td><?php echo $data['num_tv']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>141</b></td>
                                                    <td>Radio</td>
                                                    <td><?php echo $data['num_radio']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>142</b></td>
                                                    <td> Electric Fan</td>
                                                    <td><?php echo $data['num_fan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>143</b></td>
                                                    <td>Other</td>
                                                    <td><?php echo $data['num_other']; ?></td>
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
                                        <td><?php echo $data['festival_type']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>144.1.</b></td>
                                        <td>&nbsp;&nbsp;Types of dances and songs you perform in your festivals?</td>
                                        <td><?php echo $data['dance_song_type']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>145.</b></td>
                                        <td>&nbsp;&nbsp;What are the utensils used in your kitchen</td>
                                        <td><?php echo $data['kitchen_utensils']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>146.</b></td>
                                        <td>&nbsp;&nbsp;Availability of food (on daily basis) in your family?</td>
                                        <td><?php echo $data['food_avail']; ?></td>
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
                                                        <td><?php echo $data['paddy_area']." ".$data['paddy_area_unit']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other cash crops</td>
                                                        <td><?php echo $data['other_corp_area']." ".$data['corp_area_unit']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Minor Forest Produces</td>
                                                        <td><?php echo $data['forest_area']." ".$data['forest_area_unit']; ?></td>
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
                                                        <td><?php echo $data['milk_quantity']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Poultry</td>
                                                        <td><?php echo $data['poultry_quantity']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cow</td>
                                                        <td><?php echo $data['cow_quantity']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bullocks</td>
                                                        <td><?php echo $data['bullock_quantity']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Fish</td>
                                                        <td><?php echo $data['fish_quantity']; ?></td>
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
                                            <td><span class="pull-left">Daily wage</span> <span class="pull-right" style="margin-right: 13%;">Working Days</span>
                                                </th>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><table class="table table-bordered">
                                                    <tr>
                                                        <td>Daily Labour(MGNREGA) Card No.:
                                                            <?php echo $data['nrega_card_no']; ?></td>
                                                        <td><?php echo $data['nrega_work_day']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Agri-labour</td>
                                                        <td><?php echo $data['agri_work_day']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Migration</td>
                                                        <td><?php echo $data['migration_work_day']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other</td>
                                                        <td><?php echo $data['other_work_day']; ?></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><span>Total Annual Income:</span></td>
                                            <td><?php echo $data['total_income']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>147.4.</b> </td>
                                            <td><span>Government schemes/programmes your family availed? </span></td>
                                        </tr>
                                        <tr>
                                        <td colspan="3">
                                            
                                                <div>
                                                    <table class="table table-bordered">
                                                    <tr>
                                                        <th>Scheme</th>
                                                        <th>Scheme ID</th>
                                                    </tr>
                                                    <?php 
                                               $query="SELECT DISTINCT `scheme`,`scheme_info` FROM `std_income_gov_scheme` where `std_id`='$sid'";
                                               $result=mysqli_query($con,$query);
                                               while($row=mysqli_fetch_array($result)){?>
                                                    <tr>
                                                        <td><?php echo $row['scheme'];?></td>
                                                        <td><?php echo $row['scheme_info']; ?></td>
                                                    </tr>
                                                 <?php } ?>    
                                                
                                                </table>     
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td><b>147.5.</b> </td>
                                            <td><span>Does your parents have </span></td>
                                        </tr>
                                        <tr>
                                        <td colspan="3">
                                            
                                                <div>
                                                    <table class="table table-bordered">
                                                    <tr>
                                                        <th>Banking Type</th>
                                                        <th>Banking ID</th>
                                                    </tr>
                                                    <?php
                                                        $query="SELECT DISTINCT `banking`,`banking_info` FROM `std_income_parents_banking` where `std_id`='$sid'";
                                               $result=mysqli_query($con,$query);
                                               while($row=mysqli_fetch_array($result)){?>
                                                    <tr>
                                                        <td><?php echo $row['banking'];?></td>
                                                        <td><?php echo $row['banking_info']; ?></td>
                                                    </tr>
                                                 <?php } ?>    
                                                
                                                </table>     
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td><b>147.6.</b> </td>
                                            <td><span>Does your parents have following identification cards?</span></td>
                                            </tr>
                                        <tr>
                                        <td colspan="3">
                                            
                                                <div>
                                                    <table class="table table-bordered">
                                                    <tr>
                                                        <th>Identification</th>
                                                        <th>ID</th>
                                                    </tr>
                                                    <?php
                                                        $query="SELECT DISTINCT `identification`,`identification_info` FROM `std_income_parentsid` where `std_id`='$sid'";
                                               $result=mysqli_query($con,$query);
                                               while($row=mysqli_fetch_array($result)){?>
                                                    <tr>
                                                        <td><?php echo $row['identification'];?></td>
                                                        <td><?php echo $row['identification_info']; ?></td>
                                                    </tr>
                                                 <?php } ?>    
                                                
                                                </table>     
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        
                                        
                                        </tr>
                                        <?php
$str = "SELECT DISTINCT * FROM std_income_use_openion  m WHERE  m.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
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
                                                                    <input disabled type="checkbox" <?php if($data['cooking_use']=="Electric Burner"){ ?> checked  <?php } ?> class="form-control">
                                                                    Electric Burner </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input disabled type="checkbox" <?php if($data['cooking_use']=="Kerosene"){ ?> checked  <?php } ?>  class="form-control">
                                                                    Kerosene </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input disabled type="checkbox" <?php if($data['cooking_use']=="Gas"){ ?> checked  <?php } ?>  class="form-control">
                                                                    Gas </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> 
                                                                <label class="checkbox-inline">
                                                                    <input disabled type="checkbox" <?php if($data['cooking_use']=="Fire wood"){ ?> checked  <?php } ?> class="form-control">
                                                                    Fire wood </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input disabled type="checkbox" <?php if($data['cooking_use']=="Cowdung cake"){ ?> checked  <?php } ?>  class="form-control">
                                                                    Cowdung cake </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input disabled type="checkbox" <?php if($data['cooking_use']=="Straw"){ ?> checked  <?php } ?>  class="form-control">
                                                                    Straw </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> 
                                                                <label class="checkbox-inline" style="width:213px">
                                                                    <input disabled type="checkbox" <?php if($data['cooking_use']=="Bio-gas"){ ?> checked  <?php } ?>  class="form-control">
                                                                    Bio-gas </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="margin-left:1px">
                                                                    <input type="checkbox" <?php if($data['cooking_use']=="Solar Cooker"){ ?> checked  <?php } ?>  class="form-control">
                                                                    Solar Cooker </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input disabled type="checkbox" <?php if($data['cooking_use']=="others"){ ?> checked  <?php } ?> value="others"  class="form-control">
                                                                    Others </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> 
                                                                 <?php if($data['cooking_other']!="others"){ echo $data['cooking_other'];} ?>
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
                                                                    <input disabled type="checkbox" <?php if($data['lighting_use']=="Electric bulb/tube"){ ?> checked  <?php } ?> class="form-control">
                                                                    Electric bulb/tube </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input disabled type="checkbox" <?php if($data['lighting_use']=="Kerosene"){ ?> checked  <?php } ?> class="form-control">
                                                                    Kerosene </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input disabled type="checkbox" <?php if($data['lighting_use']=="Candle"){ ?> checked  <?php } ?> class="form-control">
                                                                    Candle </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>   
                                                                <label class="checkbox-inline">
                                                                    <input disabled type="checkbox" <?php if($data['lighting_use']=="Solar Lantern"){ ?> checked  <?php } ?>  class="form-control">
                                                                    Solar Lantern </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input disabled type="checkbox" <?php if($data['lighting_other']!=""){ echo $data['lighting_other']; } ?> class="form-control"  id="lighting" onchange="showTextarea(this.id);">
                                                                    Other(Specify) </label>
                                                            </td>
                                                            <td>
                                                                <?php if($data['lighting_use']=="others"){ ?> checked  <?php } ?>
                                                            </td>
                                                        </tr>
                                                    </table>      
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td><b>150.</b> </td>
                                            <td><span>Whether the house is electrified?</span></td>
                                            <td><?php echo $data['house_electrified']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>151.</b> </td>
                                            <td><span>What is your opinion about village road?</span></td>
                                            <td><?php echo $data['road_opinion']; ?></td>
                                            <td><?php if($data['road_other']!=""){ echo $data['road_other']; } ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>152.</b> </td>
                                            <td><span>What are the road communication/transportation facilities available in your village?</span></td>
                                            <td colspan="2">

                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input disabled type="checkbox"  <?php if($data['transport_facilities']=="Walking"){ ?> checked  <?php } ?> class="form-control">
                                                                Walking </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input disabled type="checkbox" <?php if($data['transport_facilities']=="Auto"){ ?> checked  <?php } ?> class="form-control">
                                                                Auto </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input disabled type="checkbox" <?php if($data['transport_facilities']=="Tractor"){ ?> checked  <?php } ?> class="form-control">
                                                                Tractor </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>    
                                                            <label class="checkbox-inline">
                                                                <input disabled type="checkbox" <?php if($data['transport_facilities']=="Jeep"){ ?> checked  <?php } ?>  class="form-control">
                                                                Jeep </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input disabled type="checkbox" <?php if($data['transport_facilities']=="others"){ ?> checked  <?php } ?>  class="form-control">
                                                                Others </label>
                                                        </td>
                                                        <td>
                                                                <?php if($data['transport_facilities']=="others"){ echo $data['transport_other'];} ?>
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
                                            <td><?php echo $data['shop_available']; ?></td>
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
                                                        <td><?php echo $data['panchayat_distance']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Anganwadi</td>
                                                        <td><?php echo $data['anganwadi_distance']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Primary School</td>
                                                        <td><?php echo $data['primary_school_diss']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Secondary School</td>
                                                        <td><?php echo $data['secondary_school_diss']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>High School</td>
                                                        <td><?php echo $data['high_school_diss']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>College</td>
                                                        <td><?php echo $data['college_distance']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Public Health Centre</td>
                                                        <td><?php echo $data['health_center_diss']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Post Office</td>
                                                        <td><?php echo $data['po_distance']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Bank</td>
                                                        <td><?php echo $data['bank_distance']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Police Station</td>
                                                        <td><?php echo $data['ps_distance']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>PDS outlet</td>
                                                        <td><?php echo $data['pds_distance']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Bus Stand</td>
                                                        <td><?php echo $data['bus_distance']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Railway Station</td>
                                                        <td><?php echo $data['railway_distance']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Daily Market</td>
                                                        <td><?php echo $data['market_distance']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Community centre</td>
                                                        <td><?php echo $data['community_distance']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Veterinary centre</td>
                                                        <td><?php echo $data['veterinary_distance']; ?></td>
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
?>  
                                        <tr>
                                            <td class="col-lg-1"><b>155.</b> </td>
                                            <td class="col-lg-3"><span>Sanitation</span></td>
                                            <td class="col-lg-5"><label class="checkbox-inline">
                                                    <?php echo str_replace("-",",",$data['sanitation']); ?>
                                            </td>
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
                                                <table>
                                                    <tr>
                                                        
                                                        <td class="col-lg-5"><label class="checkbox-inline">
                                                    <?php echo str_replace("-",",",$data['health_infra_owner']); ?>
                                                        </td>
                                                        <?php if($data['infra_owner_other']!=""){ ?>
                                                        <td><?php echo "Others"." : ".$data['infra_owner_other']; ?></td>
                                                       <?php  } ?>
                                                    </tr>
                                                </table>  
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><span>Types of medicine</span></td>
                                            <td colspan="2">
                                                <table>
                                                    <tr>
                                                        
                                                        <td class="col-lg-5"><label class="checkbox-inline">
                                                    <?php echo str_replace("-",",",$data['type_medicine']); ?>
                                                        </td>
                                                        <?php if($data['type_medicine_other']!=""){ ?>
                                                        <td><?php echo "Others"." : ".$data['type_medicine_other']; ?></td>
                                                       <?php  } ?>
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
$str = "SELECT DISTINCT * FROM std_education_information     m WHERE  m.std_id='$sid'";
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
                                                            <?php echo $data['education_infra_avail']; 
                                                            if($data['infra_other']!="")echo $data['infra_other']; ?>
                                                        </td>
                                                        <td class="col-lg-4"> 
                                                            <input type="text" class="form-control" name="infra_other2" id="textarea_edu" style="display: none;height:29px;width:190px;">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="vertical-align: top;"><b>158.</b></td>
                                                        <td style="vertical-align: top;"> <span> If drop-outs,ask the causes of drop-outs(Record the multiple responses) </span></td>
                                                        <td>
                                                            <?php echo str_replace("-",".<br>",$data['cause_drop_outs']);?>

                                                        </td>

                                                        <td>&nbsp;</td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>159.</b></td>
                                                        <td> <span> The subject/s you like most(Specify): </span></td>
                                                        <td><?php echo $data['subject_like'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>160.</b></td>
                                                        <td> <span> Any hobbies/habits do you have: </span></td>
                                                        <td><?php echo $data['hobbies'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>161.</b></td>
                                                        <td> <span> What was doing before joining <strong>KISS</strong>: </span></td>
                                                        <td><?php echo $data['doing_before_kiss'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>162.</b> </td>
                                                        <td><span> What are the areas in which you have improved after joining <strong>KISS</strong>: </span></td>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <?php echo str_replace("-",",",$data['improvment_after_kiss']);
                                                                            if($data['improvment_other']!="")echo "<br>Others : ".$data['improvment_other'];?>
                                                                        </label>
                                                                    </td>

                                                                </tr>

                                                            </table>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="other_improve" id="textarea_improved_area" style="display: none;height: 32px;width: 190px;">
                                                        </td>
                                                    </tr>
                                                    <?php
$str = "SELECT DISTINCT * FROM std_education_activity  m WHERE  m.std_id='$sid'";
$sql = mysqli_query($con, $str);
$data = mysqli_fetch_array($sql);
?>  
                                                    <tr>
                                                        <td><b>163.</b></td>
                                                        <td colspan="2"> <span> Activities you have involved and enjoyed in <strong>KISS</strong> :(Specify) </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.1</b></td>
                                                        <td><span>Activity</span></td>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo str_replace("-",",",$data['activity']);
                                                                            if($data['activity_other']!="")echo "<br>Others : ".$data['activity_other'];?>
                                                                    </td>
                                                                </tr>

                                                            </table>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td><b>163.2</b></td>
                                                        <td> <span> Sports and Games: </span></td>
                                                        <td colspan="2">
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo str_replace("-",",",$data['games']);
                                                                        if($data['game_other']!="")echo "<br>Others : ".$data['game_other'];?>
                                                                    </td>

                                                                </tr>

                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.3</b> </td>
                                                        <td><span> Music </span></td>
                                                        <td colspan="2">
                                                            <table >
                                                                <tr>
                                                                    <td>
                                                                        <?php echo str_replace("-",",",$data['music']);
                                                                        if($data['music_other']!="")echo "<br>Others : ".$data['music_other'];?>
                                                                    </td>

                                                                </tr>

                                                            </table>     
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><span> Dance </span></td>
                                                        <td colspan="2">
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo str_replace("-",",",$data['dance']);
                                                                        if($data['dance_other']!="")echo "<br>Others : ".$data['dance_other'];?>
                                                                    </td>
<!--                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="dance[]" value="Modern"  class="form-control">Modern
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="dance[]" value="Semi Classical"  class="form-control">Semi Classical
                                                                        </label>
                                                                    </td>-->
                                                                </tr>
<!--                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="dance[]" value="others"  class="form-control"  id="dance" onchange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                    </td>

                                                                    <td>  
                                                                        <textarea class="form-control" name="textarea_dance" id="textarea_dance" style="display: none;"></textarea>
                                                                    </td>
                                                                </tr>-->
                                                            </table>     
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><span> Instrumental </span></td>
                                                        <td colspan="2">
                                                            <table >
                                                                <tr>
                                                                    <td>
                                                                        <?php echo str_replace("-",",",$data['instrumental']);
                                                                        if($data['instrumental_other']!="")echo "<br>Others : ".$data['instrumental_other'];?>
                                                                    </td>
<!--                                                                    <td>

                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="instrumental[]" value="Drums"  class="form-control">Drums (Pad)
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="instrumental[]" value="Keyboard"  class="form-control">Keyboard
                                                                        </label>
                                                                    </td>-->
                                                                </tr>
<!--                                                                <tr>
                                                                    <td>  
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="instrumental[]" value="Tabla"  class="form-control">Tabla
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="instrumental[]" value="others"  class="form-control"  id="instrumental" onchange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <textarea class="form-control" name="textarea_instrumental" id="textarea_instrumental" style="display: none;" onchange="showValue(this.value);"></textarea>
                                                                    </td>
                                                                </tr>-->
                                                            </table>    
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.4</b></td>
                                                        <td> <span> Yoga and Meditation: </span></td>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                       <?php echo str_replace("-",",",$data['yoga']);
                                                                        if($data['yoga_other']!="")echo "<br>Others : ".$data['yoga_other'];?>
                                                                    </td>
<!--                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="yoga[]" value="Meditation"  class="form-control">Meditation
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="yoga[]" value="others"  class="form-control"  id="yoga" onchange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                    </td>-->
                                                                </tr>
<!--                                                                <tr>
                                                                    <td> 
                                                                        <textarea class="form-control" name="textarea_yoga" id="textarea_yoga" style="display: none;" onchange="showValue(this.value);"></textarea>
                                                                    </td>
                                                                </tr>-->
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
                                                            <?php // echo str_replace("-",",",$data['vocational']);
                                                            if($data['vocational']!="0")echo str_replace("-",",",$data['vocational']);
                                                            if($data['vocational']=="0")echo "NA";
                                                            if($data['vocational_other']!="")echo "<br>Others : ".$data['vocational_other'];?>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td><b>163.7</b></td>
                                                        <td> <span> English Access: </span></td>
                                                        <td>
                                                             <?php echo str_replace("-",",",$data['english_access']); ?>
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
                                                                    $slno=1;
                                                        $query="SELECT DISTINCT `competition_level`,`prize`,`place`,`year` FROM `std_education_achive` where `std_id`='$sid'";
                                               $result=mysqli_query($con,$query);
                                               while($row=mysqli_fetch_array($result)){?>
                                                                    <tr>
                                                                        <td> <?php echo $slno;?> </td>
                                                                        <td><?php echo $row['competition_level']; ?></td>
                                                                        <td><?php echo $row['prize']; ?></td>
                                                                        <td><?php echo $row['place']; ?></td>
                                                                        <td><?php echo $row['year']; ?></td>
                                                                    </tr>
                                               <?php $slno++; }?>

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
                                                            <?php echo $data['ambition']; ?>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="textarea_ambition" id="textarea_ambition" style="display: none;height: 32px;width: 190px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>166.</b> </td>
                                                        <td><span> What are your plans to achieve your ambition: </span></td>
                                                        <td><?php echo $data['ambition_plan']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>167.</b> </td>
                                                        <td><span> Importance/Role of <strong>KISS</strong> in achieving your ambition: </span></td>
                                                        <td><?php echo $data['kiss_role_ambition']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>168.</b> </td>
                                                        <td><span> How you will involve yourself for achieving the objectives of <strong>KISS</strong>: </span></td>
                                                        <td><?php echo $data['obj_achive_involve']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>169.</b> </td>
                                                        <td><span> Present behavior of the student:- </span></td>
                                                        <td><?php echo $data['student_behaviour']; ?></td>
                                                        <td><input class="form-control" type="text" name="" id="textarea_behavior" style="display: none;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>170.</b> </td>
                                                        <td><span> Any other remarks by the teacher/mentor: </span></td>
                                                        <td><?php echo $data['remark']; ?></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                    </table>
                                </fieldset>
<!--                                <div class="form-group">
                                    <div class="col-lg-4 col-lg-offset-4">
                                        <button type="button" onClick="register();"  name="registerStudent" class="btn btn-primary btn-sm btn-block">Submit</button>
                                    </div>
                                </div>-->

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