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
                        <h1 id="forms">Registration Form <span class="pull-right"> <span class="pull-right"> <a href="report.php" class="btn btn-primary">Go to reports</a> &nbsp; <a href="logout.php" class="btn btn-primary">Logout</a> </span> </span> </h1>
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
                <form name= "studentRegistration" action="success_msg.php"  method="post" enctype="multipart/form-data" onsubmit="return validateStudentRegistration();">
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
                                                    <option value="1993">1996</option>
                                                    <option value="1993">1997</option>
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
                                            <td><select class="form-control" name="coj" id="coj" onchange="showTextBox(this.id)">
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
                                                </select>
                                                <input type="text" name="pg_stream_coj" id="distance" class="form-control" style="display: none;" placeholder="PG Specialization"></td>
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
                                                <select class="form-control" name="standard" id = "standard" onchange="showTextBoxClass(this.id);
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
                                                    <option>+2 1st Year</option>
                                                    <option>+2 2nd Year</option>
                                                </select>
                                                <select name="+3year" id="+3year" class="form-control" style="display: none;">
                                                    <option>+3 1st Year</option>
                                                    <option>+3 2nd Year</option>
                                                    <option>+3 3rd Year</option>
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
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                    <option>13</option>
                                                    <option>14</option>
                                                    <option>15</option>
                                                    <option>16</option>
                                                    <option>17</option>
                                                    <option>18</option>
                                                    <option>19</option>
                                                    <option>20</option>
                                                    <option>21</option>
                                                    <option>22</option>
                                                    <option>23</option>
                                                    <option>24</option>
                                                    <option>25</option>
                                                    <option>26</option>
                                                    <option>27</option>
                                                    <option>28</option>
                                                    <option>29</option>
                                                    <option>30</option>
                                                    <option>31</option>
                                                </select>
                                                <select class="form-control pull-left" name="month" style="width:90px">
                                                    <option value="">Month</option>
                                                    <option>Jan</option>
                                                    <option>Feb</option>
                                                    <option>Mar</option>
                                                    <option>Apr</option>
                                                    <option>May</option>
                                                    <option>Jun</option>
                                                    <option>Jul</option>
                                                    <option>Aug</option>
                                                    <option>Sept</option>
                                                    <option>Oct</option>
                                                    <option>Nov</option>
                                                    <option>Dec</option>
                                                </select>
                                                <select class="form-control clearfix" name="year" style="width:90px">
                                                    <option value="">Year</option>
                                                    <option>2014</option>
                                                    <option>2013</option>
                                                    <option>2012</option>
                                                    <option>2011</option>
                                                    <option>2010</option>
                                                    <option>2009</option>
                                                    <option>2008</option>
                                                    <option>2007</option>
                                                    <option>2006</option>
                                                    <option>2005</option>
                                                    <option>2004</option>
                                                    <option>2003</option>
                                                    <option>2002</option>
                                                    <option>2001</option>
                                                    <option>2000</option>
                                                    <option>1999</option>
                                                    <option>1998</option>
                                                    <option>1997</option>
                                                    <option>1996</option>
                                                    <option>1995</option>
                                                    <option>1994</option>
                                                    <option>1993</option>
                                                    <option>1992</option>
                                                    <option>1991</option>
                                                    <option>1990</option>
                                                    <option>1989</option>
                                                    <option>1988</option>
                                                    <option>1987</option>
                                                    <option>1986</option>
                                                    <option>1985</option>
                                                    <option>1984</option>
                                                    <option>1983</option>
                                                    <option>1982</option>
                                                    <option>1981</option>
                                                    <option>1980</option>
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
                                            <td><input class="form-control" type="text" name="class"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>106.1.</b></td>
                                            <td>Name Of Local Gaurdian</td>
                                            <td><input class="form-control" type="text" name="local gaurdian"></td>
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

                                                            <select class="form-control" name="state" id="state" onchange="showDistrict(this.value);">
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
                                                        <td><select class="form-control" name="district_name" id="district_name" onchange="showBlock(this.value, state.id);">
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
                                                        <td><input class="form-control" type="text" ></td>
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
                                            <td><input type="radio" name="tribe" value="scheduled" onchange="showTribeTypes(this.value);" style="margin-left: 1%;margin-right: 2%;">
                                                Scheduled Tribes
                                                <input type="radio" name="tribe" value="primitive" onchange="showTribeTypes(this.value);" style="margin-left: 7%;margin-right: 2%;">
                                                Primitive Tribes </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <select name="sch_tribes" id="sch_tribes" class="form-control" style="display: none;">
                                                    <option value="">--Select Scheduled Tribe--</option>
                                                    <?php
                                                    $scheduledTribes = array('Bagata', 'Baiga', 'Banjara', 'Bathudi', 'Bhottada', 'Bhuiyan', 'Bhumia', 'Bhumij', 'Bhunjia', 'Binjhal', 'Binjhia', 'Birhor', 'Bonda', 'Chenchu', 'Dal', 'Desua Bhumij', 'Dharua', 'Didayi', 'Gadaba', 'Gandia', 'Ghara', 'Gond', 'Ho', 'Holva', 'Jatapu', 'Juanga', 'Kandha', 'Kawar', 'Kharia', 'Kharwar', 'Khond', 'Kissan', 'Kol', 'Kolah', 'Koli', 'Kondadora', 'Kora', 'Korua', 'Kotia', 'Koya', 'Kulis', 'Lodha', 'Madia', 'Mahali', 'Mankidi', 'Mankidia', 'Mataya', 'Mirdha', 'Munda', 'Mundari', 'Omanatya', 'Oraon', 'Parenga', 'Paraja', 'Pentia', 'Rajuar', 'Santal', 'Saora', 'Shabar', 'Souti', 'Tharua');
                                                    for ($i = 0; $i < count($scheduledTribes); $i++) {
                                                        echo "<option value='$scheduledTribes[$i]'>" . $scheduledTribes[$i] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <select name="prm_tribes" id="prm_tribes" class="form-control" style="display: none;">
                                                    <option value="">--Select Primitive Tribe--</option>
                                                    <?php
                                                    $primitiveTribes = array('Birhor', 'Bondo', 'Didai', 'Dangaria Kandha', 'Juanga', 'Kharia', 'Kutia Kandha', 'Lanjia Saura', 'Lodha', 'Mankedia', 'Paudi Bhuyan', 'Saura', 'Chutkia Bhunjia');
                                                    for ($i = 0; $i < count($primitiveTribes); $i++) {
                                                        echo "<option value='$primitiveTribes[$i]'>" . $primitiveTribes[$i] . '</option>';
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
                                                    $tribalLanguages = array('Bhumij', 'Gadaba', 'Gondi', 'Ho', 'Juang', 'Kharia', 'Khond', 'Kui', 'Kisan', 'Koya', 'Munda/Koi', 'Mundari', 'Kurukh/Oraon', 'Sandhali', 'Saora', 'Bonda', 'Didayi', 'Parenga', 'Parji', 'Bhuiyan', 'Binjhal', 'Halvi', 'Bathudi', 'Desia', 'Sadri');
                                                    for ($i = 0; $i < count($tribalLanguages); $i++) {
                                                        echo "<option value='$tribalLanguages[$i]'>" . $tribalLanguages[$i] . '</option>';
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
                                            <td><select class="form-control" name="religion" id="religion" onchange="showTextarea(this.id);">
                                                    <option>Hindu</option>
                                                    <option>Muslim</option>
                                                    <option>Christian</option>
                                                    <option value="others">other</option>
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
                                                    <td><input class="form-control row1 male_row" id="male1" name="male1" value="0" type="text" onkeyup="calculteTotalMember('row1')"></td>
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
                                                    <td><input class="form-control  row3 female_row" id="female3" name="female3" type="text" value="0" onkeyup="calculteTotalMember('row3')"></td>
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
                                                    <td><input class="form-control" type="text"></td>
                                                    <td><input class="form-control" type="text"></td>
                                                    <td><select class="form-control" name="relationship1">
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
                                                    <td><input class="form-control" type="text"></td>
                                                    <td><input class="form-control" type="text"></td>
                                                    <td><select class="form-control" name="relationship2">
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
                                                    <td><input class="form-control" type="text"></td>
                                                    <td><input class="form-control" type="text"></td>
                                                    <td><select class="form-control" name="relationship3">
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
                                                    <td><input class="form-control" type="text"></td>
                                                    <td><input class="form-control" type="text"></td>
                                                    <td><select class="form-control" name="relationship4">
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
                                                    <td><input class="form-control" type="text"></td>
                                                    <td><input class="form-control" type="text"></td>
                                                    <td><select class="form-control" name="relationship5">
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
                                                    <td>FamilyOccupation*</td>
                                                </tr>
                                                <tr>
                                                    <td><input class="form-control" type="text"></td>
                                                    <td><input class="form-control" type="text"></td>
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
                                                        <textarea class="form-control"></textarea></td>
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
                                                    <td><input class="form-control" type="text" name="128"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>129</b></td>
                                                    <td>Bullock</td>
                                                    <td><input class="form-control" type="text" name="129"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>130</b></td>
                                                    <td>Buffalo</td>
                                                    <td><input class="form-control" type="text" name="130"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>131</b></td>
                                                    <td>calf</td>
                                                    <td><input class="form-control" type="text" name="131"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>132</b></td>
                                                    <td>Goat/sheep</td>
                                                    <td><input class="form-control" type="text" name="132"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>133</b></td>
                                                    <td>poultry</td>
                                                    <td><input class="form-control" type="text" name="133"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>134</b></td>
                                                    <td>others(specify)</td>
                                                    <td><input class="form-control" type="text" name="134"></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td><b>135.</b></td>
                                        <td><b>House Type</b></td>
                                        <td colspan="2"><label class="checkbox-inline">
                                                <input type="checkbox" name="house_type[]" value="Mud House/hut"  class="form-control">
                                                Mud House/hut </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="house_type[]" value="Thatched house"  class="form-control">
                                                Thatched house </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="house_type[]" value="Semi Pucca"  class="form-control">
                                                Semi Pucca </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="house_type[]" value="Pucca"  class="form-control">
                                                Pucca </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="house_type[]" value="Any Other"  class="form-control">
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
                                                    <td><input class="form-control" type="text" name="136"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>137</b></td>
                                                    <td>Plough</td>
                                                    <td><input class="form-control" type="text" name="137"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>138</b></td>
                                                    <td>Thresher</td>
                                                    <td><input class="form-control" type="text" name="138"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>139</b></td>
                                                    <td>Cycle/Motor Cycle</td>
                                                    <td><input class="form-control" type="text" name="139"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>140</b></td>
                                                    <td>TV</td>
                                                    <td><input class="form-control" type="text" name="140"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>141</b></td>
                                                    <td>Radio</td>
                                                    <td><input class="form-control" type="text" name="141"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>142</b></td>
                                                    <td> Electric Fan</td>
                                                    <td><input class="form-control" type="text" name="142"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>143</b></td>
                                                    <td>Other</td>
                                                    <td><input class="form-control" type="text" name="143"></td>
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
                                        <td><select class="form-control">
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
                                                        <td><input type="text" name="" id="foc2" style="width: 83%;height: 120%;border: 1px solid #cccccc;color: #555555;padding: 6px 12px;font-size: 14px;">
                                                            <select name="paddy_measure" style="height: 84%;border: 1px solid #cccccc;">
                                                                <option value="">--Select--</option>
                                                                <option value="Decimal">Decimal</option>
                                                                <option value="Gunth">Gunth</option>
                                                                <option value="Acre">Acre</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other cash crops</td>
                                                        <td><input type="text" name="" style="width: 83%;height: 120%;border: 1px solid #cccccc;color: #555555;padding: 6px 12px;font-size: 14px;">
                                                            <select name="cash_crop_measure" style="height: 84%;border: 1px solid #cccccc;">
                                                                <option value="">--Select--</option>
                                                                <option value="Decimal">Decimal</option>
                                                                <option value="Gunth">Gunth</option>
                                                                <option value="Acre">Acre</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Minor Forest Produces</td>
                                                        <td><input type="text" name="" style="width: 83%;height: 120%;border: 1px solid #cccccc;color: #555555;padding: 6px 12px;font-size: 14px;">
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
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Poultry</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cow</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bullocks</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Fish</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td><b>147.3.</b></td>
                                            <td><span class="pull-left">Daily wage</span> <span class="pull-right" style="margin-right: 13%;">Working Days</span>
                                                </th>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><table class="table table-bordered">
                                                    <tr>
                                                        <td>Daily Labour(MGNREGA) Card No.:
                                                            <input type="text" class="form-control" name=""></td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Agri-labour</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Migration</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other</td>
                                                        <td><input type="text" class="form-control" name=""></td>
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
                                                                    <input type="checkbox" name="scheme[]" value="others"  class="form-control"  id="card" onchange="showTextarea(this.id);">
                                                                    Others </label>
                                                            </td>
                                                            <td>
                                                                <textarea name="" class="form-control" id="textarea_card" style="display: none;"></textarea>
                                                            </td>
                                                        </tr>

                                                    </table>     
                                                </div>
                                                <div><span>
                                                        <table width="100%"  border="0">
                                                            <tr>
                                                                <td><input class="form-control" type="hidden" name="" placeholder="Card Number"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="text1" id="text1" style="display:none;" placeholder="BPL No."></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="text2" id="text2" style="display:none;" placeholder="Antodaya Annapurna Yojana"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="text3" id="text3" style="display:none;" placeholder="IAY No."></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="text4" id="text4" style="display:none;" placeholder="KISSAN Credit Card"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="text5" id="text5" style="display:none;" placeholder="Health Card"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="text6" id="text6" style="display:none;" placeholder="Green Card"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="form-control" type="text" name="text7" id="text7" style="display:none;" placeholder="Lal Card"></td>
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
                                                                    <input type="checkbox" name="account[]" value="others"  class="form-control" id="account" onchange="showTextarea(this.id);">
                                                                    Others </label>
                                                            </td>
                                                            <td>
                                                                <textarea name="" class="form-control" id="textarea_account" style="display: none;"></textarea>
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
                                                            <td><input class="form-control" type="text" name="text_1" id="text_1" style="display:none;" placeholder="Bank Account"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="text_2" id="text_2" style="display:none;" placeholder="Debit/Credit Card"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="text_3" id="text_3" style="display:none;" placeholder="Postal Savings"></td>
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
                                                                    <input type="checkbox" name="identification[]" value="others"  class="form-control" id="identification" onchange="showTextarea(this.id);">
                                                                    Any Other </label>
                                                            </td>
                                                            <td>
                                                                <textarea name="" class="form-control" id="textarea_identification" style="display: none;"></textarea>
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
                                                            <td><input class="form-control" type="text" name="t1" id="t1" style="display:none;" placeholder="Voter Card"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="t2" id="t2" style="display:none;" placeholder="Addhar Card"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="t3" id="t3" style="display:none;" placeholder="Passport"></td>
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
                                                                    <input type="checkbox" name="cooking[]" value="1"  class="form-control">
                                                                    Electric Burner </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="cooking[]" value="2"  class="form-control">
                                                                    Kerosene </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="cooking[]" value="3"  class="form-control">
                                                                    Gas </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> 
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="cooking[]" value="4"  class="form-control">
                                                                    Fire wood </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="cooking[]" value="5"  class="form-control">
                                                                    Cowdung cake </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="cooking[]" value="6"  class="form-control">
                                                                    Straw </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> 
                                                                <label class="checkbox-inline" style="width:213px">
                                                                    <input type="checkbox" name="cooking[]" value="7"  class="form-control">
                                                                    Bio-gas </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="margin-left:1px">
                                                                    <input type="checkbox" name="cooking[]" value="8"  class="form-control">
                                                                    Solar Cooker </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="cooking[]" value="others"  class="form-control"  id="cooking" onchange="showTextarea(this.id);">
                                                                    Others </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> 
                                                                <textarea class="form-control" name="" id="textarea_cooking" style="display: none;"></textarea>
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
                                                                    <input type="checkbox" name="lighting[]" value="1"  class="form-control">
                                                                    Electric bulb/tube </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="lighting[]" value="2"  class="form-control">
                                                                    Kerosene </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="lighting[]" value="3"  class="form-control">
                                                                    Candle </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>   
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="lighting[]" value="4"  class="form-control">
                                                                    Solar Lantern </label>
                                                            </td>
                                                            <td>
                                                                <label class="checkbox-inline" style="width:204px">
                                                                    <input type="checkbox" name="lighting[]" value="others"  class="form-control"  id="lighting" onchange="showTextarea(this.id);">
                                                                    Other(Specify) </label>
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" name="" id="textarea_lighting" style="display: none;"></textarea>
                                                            </td>
                                                        </tr>
                                                    </table>      
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td><b>150.</b> </td>
                                            <td><span>Whether the house is electrified?</span></td>
                                            <td><select class="form-control" name="" id="electrified">
                                                    <option value="">Select</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><b>151.</b> </td>
                                            <td><span>What is your opinion about village road?</span></td>
                                            <td><select class="form-control" name="" id="road" onchange="showTextarea(this.id);">
                                                    <option value="">Select</option>
                                                    <option value="1">Concrete Road</option>
                                                    <option value="2">Pucca Road</option>
                                                    <option value="3">Kucha Road</option>
                                                    <option value="4">No Road</option>
                                                    <option value="others">Other(Specify)</option>
                                                </select></td>
                                            <td><input type="text" name="" id="textarea_road" style="display: none;height: 32px;width: 190px;"></td>
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
                                                                <input type="checkbox" name="roadComm" id="roadComm" value="others"  class="form-control" onchange="showTextarea(this.id);">
                                                                Others </label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="" id="textarea_roadComm" style="display: none;">
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
                                            <td><textarea class="form-control" name=""></textarea></td>
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
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Anganwadi</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Primary School</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Secondary School</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>High School</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>College</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Public Health Centre</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Post Office</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Bank</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Police Station</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>PDS outlet</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Bus Stand</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Railway Station</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Daily Market</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Community centre</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Veterinary centre</td>
                                                        <td><input type="text" class="form-control" name=""></td>
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
                                                    <input type="checkbox" name="sanitation[]" value="1"  class="form-control">
                                                    Open </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="sanitation[]" value="2"  class="form-control">
                                                    Public Toilet </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="sanitation[]" value="3"  class="form-control">
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
                                                                <input type="checkbox" class="form-control" >
                                                                Government </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="form-control" >
                                                                Private </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" class="form-control" >
                                                                NGO-run </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>  
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="ownership" onchange="showTextarea(this.id);" class="form-control" value="others" >
                                                                others(specify) </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" class="form-control" >
                                                                Not available </label>
                                                        </td>
                                                        <td><textarea class="form-control" name="" id="textarea_ownership" style="display: none;"></textarea></td>
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
                                                                <input type="checkbox" class="form-control" >
                                                                Ayurvedic </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="form-control" >
                                                                Homeopathic </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" class="form-control" >
                                                                Allopathic </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>   
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="form-control" >
                                                                Traditional </label>
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" id="medicine" onchange="showTextarea(this.id);" class="form-control" value="others" >
                                                                others(specify) </label>
                                                        </td>
                                                        <td><textarea class="form-control" name="" id="textarea_medicine" style="display: none;"></textarea></td>
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
                                                            <input type="text" class="form-control" name="" id="textarea_edu" style="display: none;height:29px;width:190px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <label class="checkbox-inline" style="margin-left:10px">
                                                                <input type="checkbox" name="education[]" value="Government"  class="form-control" onchange="showCheckedValue(this.value);">Government
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="education[]" value="Private"  class="form-control" onchange="showCheckedValue(this.value);">Private
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="education[]" value="NGO-run"  class="form-control" onchange="showCheckedValue(this.value);">NGO-run
                                                            </label>
                                                            <label class="checkbox-inline" style="width:300px">
                                                                <input type="checkbox" name="other_education" value="others"  class="form-control"  id="edu" onchange="showTextarea(this.id);
                                                                        showTextBox(this.id);">Other(Specify)
                                                            </label>
                                                        </td>
                                                        <td class="col-lg-4"> 
                                                            <input type="text" class="form-control" name="" id="textarea_edu" style="display: none;height:32px;width:190px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: top;"><b>158.</b></td>
                                                        <td style="vertical-align: top;"> <span> If drop-outs,ask the causes of drop-outs(Record the multiple responses) </span></td>
                                                        <td>
                                                            <select name="dropouts" class="form-control" onchange="showDropouts(this.value);">
                                                                <option value="">--Select--</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                            <br>
                                                            <div id="dropout_tr" style="display: none">
                                                            <span name="dropout_row" id="dropout_row" style="display: none;">
                                                                <label class="checkbox" >
                                                                    <input type="checkbox" name="drop-out[]" value="1"  class="form-control">Children needed to work in order to sustain their livelihood
                                                                </label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" name="drop-out[]" value="2"  class="form-control">Children had to look after siblings
                                                                </label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" name="drop-out[]" value="3"  class="form-control">No job opportunities after education
                                                                </label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" name="drop-out[]" value="4"  class="form-control">Primary school far away from the home
                                                                </label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" name="drop-out[]" value="5"  class="form-control">Secondary school far away from the home
                                                                </label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" name="drop-out[]" value="6"  class="form-control">Security problems for girls
                                                                </label>
                                                                <label class="checkbox" style="width:300px">
                                                                    <input type="checkbox" name="drop-out[]" value="others"  class="form-control"  id="drop-out" onchange="showTextarea(this.id);
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
                                                        <td><textarea class="form-control" name=""></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>160.</b></td>
                                                        <td> <span> Any hobbies/habits do you have: </span></td>
                                                        <td><textarea class="form-control" name=""></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>161.</b></td>
                                                        <td> <span> What was doing before joining <strong>KISS</strong>: </span></td>
                                                        <td><textarea class="form-control" name=""></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>162.</b> </td>
                                                        <td><span> What are the areas in which you have improved after joining <strong>KISS</strong>: </span></td>
                                                        <td colspan="2">
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
                                                                            <input type="checkbox" name="improved_area" id="improved_area" value="others"  class="form-control" onchange="showTextarea(this.id);">Others
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="" id="textarea_improved_area" style="display: none;height: 32px;width: 190px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.</b></td>
                                                        <td colspan="2"> <span> Activities you have involved and enjoyed in <strong>KISS</strong> :(Specify) </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.1</b></td>
                                                        <td><span>Activity</span></td>
                                                        <td colspan="2">
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
                                                                            <input type="checkbox" name="activity_other" id="activity_other" value="others"  class="form-control" onchange="showTextarea(this.id);">Others
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="" id="textarea_activity_other" style="display: none;height: 32px;width: 190px;">
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
                                                                            <input type="checkbox" name="sports[]" value="1"  class="form-control">Sprint
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="6"  class="form-control">Kho-Kho
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="11"  class="form-control">Archery
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="sports[]" value="16"  class="form-control">Tennis
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="21"  class="form-control">Table Tennis
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="2"  class="form-control">Rugby
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="7"  class="form-control">Net ball
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="12"  class="form-control">Cricket
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="17"  class="form-control">Weight lifting
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="sports[]" value="22"  class="form-control">Lodu
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="3"  class="form-control">Football
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="8"  class="form-control">Soft ball
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="13"  class="form-control">Hand ball
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="18"  class="form-control">Base ball
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="23"  class="form-control">Carom
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="4"  class="form-control">Hockey
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="9"  class="form-control">Chess
                                                                        </label>  
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="sports[]" value="14"  class="form-control">Kabadi
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="19"  class="form-control">Kick boxing
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="others"  class="form-control"  id="sports" onchange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                        <input type="text" class="form-control" name="textarea_sports" id="textarea_sports" style="display: none;height: 32px;width:190px;">

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="5"  class="form-control">Judo
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="10"  class="form-control">Volley ball
                                                                        </label> 
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="">
                                                                            <input type="checkbox" name="sports[]" value="15"  class="form-control">Athletics
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="sports[]" value="20"  class="form-control">Yoga
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
                                                                            <input type="checkbox" name="music[]" value="others"  class="form-control"  id="music" onchange="showTextarea(this.id);">Other(Specify)
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
                                                                            <input type="checkbox" name="dance[]" value="others"  class="form-control"  id="dance" onchange="showTextarea(this.id);">Other(Specify)
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
                                                                            <input type="checkbox" name="instrumental[]" value="others"  class="form-control"  id="instrumental" onchange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <textarea class="form-control" name="textarea_instrumental" id="textarea_instrumental" style="display: none;" onchange="showValue(this.value);"></textarea>
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
                                                                            <input type="checkbox" name="yoga[]" value="others"  class="form-control"  id="yoga" onchange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 
                                                                        <textarea class="form-control" name="textarea_yoga" id="textarea_yoga" style="display: none;" onchange="showValue(this.value);"></textarea>
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
                                                            <select class="form-control" name="vocational" id="vocational" onchange="showValue(this.value);
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
                                                            <select class="form-control" name="tailoring" id="tailoring" onchange="showTextarea(this.id);" style="display: none;">
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
                                                            <select class="form-control" name="chemical" id="chemical" onchange="showTextarea(this.id);" style="display: none;">
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
                                                            <select class="form-control" name="knitting" id="knitting" onchange="showTextarea(this.id);" style="display: none;">
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
                                                            <select class="form-control" name="applique" id="applique" onchange="showTextarea(this.id);" style="display: none;">
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
                                                            <select class="form-control" name="art_craft" id="art_craft" onchange="showTextarea(this.id);" style="display: none;">
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
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 2 </td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 3 </td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 4 </td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 5 </td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                        <td><input class="form-control" type="text" name=""></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>165.</b> </td>
                                                        <td><span> What is your ambition: </span></td>
                                                        <td>
                                                            <select name="ambition" id="ambition" class="form-control" onchange="showTextarea(this.id);">
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
                                                        <td><textarea class="form-control" name=""></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>167.</b> </td>
                                                        <td><span> Importance/Role of <strong>KISS</strong> in achieving your ambition: </span></td>
                                                        <td><textarea class="form-control" name=""></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>168.</b> </td>
                                                        <td><span> How you will involve yourself for achieving the objectives of <strong>KISS</strong>: </span></td>
                                                        <td><textarea class="form-control" name=""></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>169.</b> </td>
                                                        <td><span> Present behavior of the student:- </span></td>
                                                        <td><select class="form-control" name="" id="behavior" onchange="showTextarea(this.id);">
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
                                                        <td><textarea class="form-control" name=""></textarea></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                    </table>
                                </fieldset>
                                <div class="form-group">
                                    <div class="col-lg-4 col-lg-offset-4">
                                        <button type="submit" name="registerStudent" class="btn btn-primary btn-sm btn-block">Submit</button>
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