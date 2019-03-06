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
        <script>
                function scrolTop() {

                    var bodyRect = document.body.getBoundingClientRect();    // Y- Offset from top
                    var duration = 750;

                    event.preventDefault();
                    jQuery(' html , body ').animate({scrollTop: 0}, duration);
                    return false;
                }

                jQuery(document).ready(function () {
                    $('.nav-tabs-top a[data-toggle="tab"]').on('click', function () {
                        $('.nav-tabs-bottom li.active').removeClass('active')
                        $('.nav-tabs-bottom a[href="' + $(this).attr('href') + '"]').parent().addClass('active');
                    });

                    $('.nav-tabs-bottom a[data-toggle="tab"]').on('click', function () {
                        $('.nav-tabs-top li.active').removeClass('active')
                        $('.nav-tabs-top a[href="' + $(this).attr('href') + '"]').parent().addClass('active');
                    });

                });




                $(document).ready(function () {
                    $("#uploadimage1").on('submit', (function (e) {
                        e.preventDefault();
                        $("#message1").empty();
                        $('#loading1').show();
                        $.ajax({
                            url: "../../includes/ajax/update_mandap_gallery.php", // Url to which the request is send
                            type: "POST", // Type of request to be send, called as method
                            data: new FormData(this), // Data sent to server, a set of key/value pairs representing form fields and values 
                            contentType: false, // The content type used when sending data to the server. Default is: "application/x-www-form-urlencoded"
                            cache: false, // To unable request pages to be cached
                            processData: false, // To send DOMDocument or non processed data file it is set to false (i.e. data should not be in the form of string)
                            success: function (data)  		// A function to be called if request succeeds
                            {
                                $('#loading1').hide();
                                $("#message1").html(data);
                            }
                        });
                    }));

// Function to preview image
                    $(function () {
                        $("#file1").change(function () {
                            $("#message1").empty();         // To remove the previous error message
                            var file = this.files[0];
                            var imagefile = file.type;
                            var match = ["image/jpeg", "image/png", "image/jpg"];
                            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
                            {
                                $('#previewing1').attr('alt', 'No Image Selected Yet !');
                                $("#message1").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                                return false;
                            }
                            else
                            {
                                var reader = new FileReader();
                                reader.onload = imageIsLoaded;
                                reader.readAsDataURL(this.files[0]);
                            }
                        });
                    });
                    function imageIsLoaded(e) {
                        //$("#file1").css("color","green");
                        $('#previewing1').attr('src', e.target.result);
                        //$('#previewing1').css('width', '383px');
                        $('#previewing1').css('height', '190px');
                        $('#previewing1').css('padding', '0px');
                        $('#previewing1').css('margin-bottom', '0px');
                    }
                    ;
                });


        </script>
        <style>
            table{
                width: 70%;
                background-color: white;
            }
            table tr > th {
                text-align: center;
                font-size: 18px;
                font-family: sans-serif;
            }
            table tr > td {
                text-align: center;
                font-size: 16px;
                font-family: sans-serif;

            }
            .head{
                text-align: left;
                /*background-color: #cccccc;*/
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
            <!--            <div class="row">
                            <div class="col-lg-12">
                                <div class="page-header">
                                    <h1 id="forms">Registration Form <span class="pull-right"><a href="report.php" class="btn btn-primary">Go to reports</a></span></h1>
                                </div>
                            </div>
                        </div>-->
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

                        <!--                        <div class="tab-content">
                                                    <div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
                                                        <fieldset>
                                                            <legend>General Information By Students/Parents</legend>
                                                            <table class="table">
                                                                <tr>
                                                                    <td class="col-lg-3">Name of the student</td>
                                                                    <td class="col-lg-5"><input class="form-control" type="text" name="name" id="foc0"></td>
                                                                    <td class="col-lg-2">
                                                                        <div class="thumbnail" style="position:absolute;width:193px">
                                                                            <img class="well" id="previewing1" src="<?php echo $thumb1; ?>" alt="No Image Selected Yet !" />
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
                                                                    <td>Year you joined</td>
                                                                    <td>
                                                                        <select class="form-control" name="yoj">
                                                                            <option value="">-- Select One --</option>
                                                                            <option value="1993">1993</option>
                                                                            <option value="1993">1994</option>
                                                                            <option value="1993">1995</option>
                                                                            <option value="1993">1996</option>
                                                                            <option value="1993">1997</option>
                                                                            <option value="1993">1998</option>
                                                                            <option value="1993">1999</option>
                                                                            <option value="1993">2000</option>
                                                                            <option value="1993">2001</option>
                                                                            <option value="1993">2002</option>
                                                                            <option value="1993">2003</option>
                                                                            <option value="1993">2004</option>
                                                                            <option value="1993">2005</option>
                                                                            <option value="1993">2006</option>
                                                                            <option value="1993">2007</option>
                                                                            <option value="1993">2008</option>
                                                                            <option value="1993">2009</option>
                                                                            <option value="1993">2010</option>
                                                                            <option value="1993">2011</option>
                                                                            <option value="1993">2012</option>
                                                                            <option value="1993">2013</option>
                                                                            <option value="1993">2014</option>
                                                                            <option value="1993">2015</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Class you joined</td>
                                                                    <td>
                                                                        <input type="text" class="form-control" name="coj">
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Distance from your village to kiss </td>
                                                                    <td><input class="form-control" type="text" name="distance"></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>How you came to know about kiss?</td>
                                                                    <td><input class="form-control" type="text" name="know"></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Gender</td>
                                                                    <td><select class="form-control" name="gender">
                                                                            <option>Male</option>
                                                                            <option>Female</option>
                                                                        </select></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>    
                                                                <tr>    
                                                                    <td>Marital status</td>
                                                                    <td><select class="form-control" name="Mstatus">
                                                                            <option>Married</option>
                                                                            <option>Unmarried</option>
                                                                        </select></td>
                                                                    <td>&nbsp;</td>  
                                                                </tr>
                                                                <tr>
                                                                    <td>Class </td>
                                                                    <td>
                                                                        <select class="form-control" name="standard">
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
                                                                            <option value="+2">+2</option>
                                                                            <option value="ug">Graduation</option>
                                                                            <option value="pg">Post graduation</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>  
                                                                    <td>Section</td>
                                                                    <td>
                                                                        <select class="form-control" name="section">
                                                                            <option value="">-- Select One --</option>
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                            <option value="D">D</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>  
                                                                    <td>Roll no.</td>
                                                                    <td><input class="form-control" type="text" name="rollNo"></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>  
                                                                    <td>Blood group</td>
                                                                    <td>
                                                                        <select class="form-control" name="bgroup">
                                                                            <option value="">-- Select One --</option>
                                                                            <option value="O +ve">O +ve</option>
                                                                            <option value="O -ve">O -ve</option>
                                                                            <option value="A +ve">A +ve</option>
                                                                            <option value="A +ve">A -ve</option>
                                                                            <option value="B +ve">B +ve</option>
                                                                            <option value="B -ve">B -ve</option>
                                                                            <option value="AB +ve">AB +ve</option>
                                                                            <option value="AB -ve">AB -ve</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>  
                                                                    <td>DOB</td>
                                                                    <td>
                                                                        <select class="form-control pull-left" name="date" style="width:90px">
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
                                                                        </select>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Name of the mentor</td>
                                                                    <td><input class="form-control" type="text" name="mentor"></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>  
                                                                    <td>Contact No. Of Mentor</td>
                                                                    <td><input class="form-control" type="text" name="class"></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Name Of Local Gaurdian</td>
                                                                    <td><input class="form-control" type="text" name="local gaurdian"></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>  
                                                                    <td>Contact No. Of Local Gaurdian</td>
                                                                    <td><input class="form-control" type="text" name="Lcontact"></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
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
                                                                                <td>1</td>
                                                                                <td>Name of the Mother</td>
                                                                                <td><input class="form-control" type="text" name="motherName" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2</td>
                                                                                <td>Name of the Father</td>
                                                                                <td><input class="form-control" type="text" name="fatherName"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3</td>
                                                                                <td>Name of the Village</td>
                                                                                <td><input class="form-control" type="text" name="village" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>4</td>
                                                                                <td>Name of the Gram Panchaayat</td>
                                                                                <td><input class="form-control" type="text" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>5</td>
                                                                                <td>Name of the Block</td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" name="block" id="txt_block" style="display:none">
                                                                                    <select class="form-control" name="block" id="block" onchange="autoSelectDistState(this.value);">
                                                                                        <option value="">-- Select One --</option>
                                                                                        <optgroup label="Cuttack">
                                                                                            <option value="Cuttack Sadar">Cuttack Sadar</option>
                                                                                            <option value="Baranga">Baranga</option>
                                                                                            <option value="Niali">Niali</option>
                                                                                            <option value="Kantapada">Kantapada</option>
                                                                                            <option value="Salipur">Salipur</option>
                                                                                            <option value="Nischintakoili">Nischintakoili</option>
                                                                                            <option value="Tangi-Chowdwar">Tangi-Chowdwar</option>
                                                                                            <option value="Baranga">Mahanga</option>
                                                                                            <option value="Niali">Niali</option>
                                                                                            <option value="Kantapada">Kantapada</option>
                                                                                            <option value="Salipur">Salipur</option>
                                                                                            <option value="Nischintakoili">Nischintakoili</option>
                                                                                            <option value="Athgarh">Athgarh</option>
                                                                                            <option value="Baramba">Baramba</option>
                                                                                            <option value="Tigiria">Tigiria</option>
                                                                                            <option value="Banki">Banki</option>
                                                                                            <option value="Dampara">Dampara</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Jajpur">
                                                                                            <option value="Jajpur">Jajpur</option>
                                                                                            <option value="Dasarathpur">Dasarathpur</option>
                                                                                            <option value="Sukinda">Sukinda</option>
                                                                                            <option value="Korei">Korei</option>
                                                                                            <option value="Binjharpur">Binjharpur</option>
                                                                                            <option value="Dharmasala">Dharmasala</option>
                                                                                            <option value="Bari">Bari</option>
                                                                                            <option value="Badachana">Badachana</option>
                                                                                            <option value="Dangadi">Dangadi</option>
                                                                                            <option value="Rasulpur">Rasulpur</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Jagatsinghpur">
                                                                                            <option value="Jagatsinghpur">Jagatsinghpur</option>
                                                                                            <option value="Raghunathpur">Raghunathpur</option>
                                                                                            <option value="Biridi-F">Biridi-F</option>
                                                                                            <option value="Kujang">Kujang</option>
                                                                                            <option value="Erasma">Erasma</option>
                                                                                            <option value="Tirtol">Tirtol</option>
                                                                                            <option value="Balikuda">Balikuda</option>
                                                                                            <option value="Nuagaon">Nuagaon</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Kendrapara">
                                                                                            <option value="Aul">Aul</option>
                                                                                            <option value="Rajkanika">Rajkanika</option>
                                                                                            <option value="Kendrapara">Kendrapara</option>
                                                                                            <option value="Derabis">Derabis</option>
                                                                                            <option value="Marsaghai">Marsaghai</option>
                                                                                            <option value="Garadpur">Garadpur</option>
                                                                                            <option value="Pattamundai">Pattamundai</option>
                                                                                            <option value="Rajnagar">Rajnagar</option>
                                                                                            <option value="Mahakalapada">Mahakalapada</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Balasore">
                                                                                            <option value="Balasore">Balasore</option>
                                                                                            <option value="Remuna">Remuna</option>
                                                                                            <option value="Basta">Basta</option>
                                                                                            <option value="Jaleswar">Jaleswar</option>
                                                                                            <option value="Bhograi">Bhograi</option>
                                                                                            <option value="Soro">Soro</option>
                                                                                            <option value="Simulia">Simulia</option>
                                                                                            <option value="Khaira">Khaira</option>
                                                                                            <option value="Baliapal">Baliapal</option>
                                                                                            <option value="Bahanaga">Bahanaga</option>
                                                                                            <option value="Nilgiri">Nilgiri</option>
                                                                                            <option value="Oupada">Oupada</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Bhadrak">
                                                                                            <option value="Bhadrak">Bhadrak</option>
                                                                                            <option value="Chandabali">Chandabali</option>
                                                                                            <option value="Dhamnagar">Dhamnagar</option>
                                                                                            <option value="Bhandari pokhari">Bhandari pokhari</option>
                                                                                            <option value="Basudevpur">Basudevpur</option>
                                                                                            <option value="Banth">Banth</option>
                                                                                            <option value="Tihidi">Tihidi</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Puri">
                                                                                            <option value="Krushna- prasad">Krushna- prasad</option>
                                                                                            <option value="Nimapara">Nimapara</option>
                                                                                            <option value="Gop">Gop</option>
                                                                                            <option value="Pipili">Pipili</option>
                                                                                            <option value="Delang">Delang</option>
                                                                                            <option value="Puri Sadar">Puri Sadar</option>
                                                                                            <option value="Kanas">Kanas</option>
                                                                                            <option value="Kakatpur">Kakatpur</option>
                                                                                            <option value="Astarang">Astarang</option>
                                                                                            <option value="Satyabadi">Satyabadi</option>
                                                                                            <option value="Brahmagiri">Brahmagiri</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Khurda">
                                                                                            <option value="Bhubaneswar">Bhubaneswar</option>
                                                                                            <option value="Balianta">Balianta</option>
                                                                                            <option value="Balipatna">Balipatna</option>
                                                                                            <option value="Jatni">Jatni</option>
                                                                                            <option value="Khurda">Khurda</option>
                                                                                            <option value="Banpur">Banpur</option>
                                                                                            <option value="Chilika">Chilika</option>
                                                                                            <option value="Bolgarh">Bolgarh</option>
                                                                                            <option value="Begunia">Begunia</option>
                                                                                            <option value="Tangi">Tangi</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Nayagarh">
                                                                                            <option value="Daspalla">Daspalla</option>
                                                                                            <option value="Gania">Gania</option>
                                                                                            <option value="Khandapada">Khandapada</option>
                                                                                            <option value="Bhapur">Bhapur</option>
                                                                                            <option value="Nayagarh">Nayagarh</option>
                                                                                            <option value="Odagaon">Odagaon</option>
                                                                                            <option value="Nuagaon">Nuagaon</option>
                                                                                            <option value="Ranpur">Ranpur</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Mayurbhanj">
                                                                                            <option value="Rairangpur">Rairangpur</option>
                                                                                            <option value="Bahalda">Bahalda</option>
                                                                                            <option value="Bijatala">Bijatala</option>
                                                                                            <option value="Bisoi">Bisoi</option>
                                                                                            <option value="Jamda">Jamda</option>
                                                                                            <option value="Kusumi">Kusumi</option>
                                                                                            <option value="Tiring">Tiring</option>
                                                                                            <option value="Baripada">Baripada</option>
                                                                                            <option value="Sarasakana">Sarasakana</option>
                                                                                            <option value="Betnoti">Betnoti</option>
                                                                                            <option value="Rasgovindpur">Rasgovindpur</option>
                                                                                            <option value="Bodasahi">Bodasahi</option>
                                                                                            <option value="Bangiriposi">Bangiriposi</option>
                                                                                            <option value="Kuliana">Kuliana</option>
                                                                                            <option value="Morada">Morada</option>
                                                                                            <option value="Samakhunta">Samakhunta</option>
                                                                                            <option value="Suliapada">Suliapada</option>
                                                                                            <option value="Udala">Udala</option>
                                                                                            <option value="Gopabandhunagar">Gopabandhunagar</option>
                                                                                            <option value="Kaptipada">Kaptipada</option>
                                                                                            <option value="Khunta">Khunta</option>
                                                                                            <option value="Karanjia">Karanjia</option>
                                                                                            <option value="Jasipur">Jasipur</option>
                                                                                            <option value="Raruan">Raruan</option>
                                                                                            <option value="Thakurmunda">Thakurmunda</option>
                                                                                            <option value="Sukruli">Sukruli</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Dhenkanal">
                                                                                            <option value="Dhenkanal Sadar">Dhenkanal Sadar</option>
                                                                                            <option value="Gondia">Gondia</option>
                                                                                            <option value="Odapada">Odapada</option>
                                                                                            <option value="Hindol">Hindol</option>
                                                                                            <option value="Kamakhyanagar">Kamakhyanagar</option>
                                                                                            <option value="Bhuban">Bhuban</option>
                                                                                            <option value="Parjang">Parjang</option>
                                                                                            <option value="Kankadahad">Kankadahad</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Angul">
                                                                                            <option value="Angul">Angul</option>
                                                                                            <option value="Banarpal">Banarpal</option>
                                                                                            <option value="Chhendipada">Chhendipada</option>
                                                                                            <option value="Talcher">Talcher</option>
                                                                                            <option value="Kaniha">Kaniha</option>
                                                                                            <option value="Athmallik">Athmallik</option>
                                                                                            <option value="Kishorenagar">Kishorenagar</option>
                                                                                            <option value="Pallahara">Pallahara</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Bolangir">
                                                                                            <option value="Bolangir">Bolangir</option>
                                                                                            <option value="Gudvella">Gudvella</option>
                                                                                            <option value="Loisinga">Loisinga</option>
                                                                                            <option value="Agalpur">Agalpur</option>
                                                                                            <option value="Deogaon">Deogaon</option>
                                                                                            <option value="Patnagarh">Patnagarh</option>
                                                                                            <option value="Khaparakhol">Khaparakhol</option>
                                                                                            <option value="Belpara">Belpara</option>
                                                                                            <option value="Titilagarh">Titilagarh</option>
                                                                                            <option value="Tureikela">Tureikela</option>
                                                                                            <option value="Bongamunda">Bongamunda</option>
                                                                                            <option value="Muribahal">Muribahal</option>
                                                                                            <option value="Saintala">Saintala</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Subarnapur">
                                                                                            <option value="Sonepur">Sonepur</option>
                                                                                            <option value="Tarva">Tarva</option>
                                                                                            <option value="Dunguripalli">Dunguripalli</option>
                                                                                            <option value="Binika">Binika</option>
                                                                                            <option value="Biramaharajpur">Biramaharajpur</option>
                                                                                            <option value="Ullunda">Ullunda</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Sambalpur">
                                                                                            <option value="Dhankhanda">Dhankhanda</option>
                                                                                            <option value="Rengali">Rengali</option>
                                                                                            <option value="Jujumura">Jujumura</option>
                                                                                            <option value="Maneswar">Maneswar</option>
                                                                                            <option value="Rairakhol">Rairakhol</option>
                                                                                            <option value="Naktideul">Naktideul</option>
                                                                                            <option value="Kuchinda">Kuchinda</option>
                                                                                            <option value="Bamra">Bamra</option>
                                                                                            <option value="Jamankira">Jamankira</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Bargarh">
                                                                                            <option value="Bargarh">Bargarh</option>
                                                                                            <option value="Attabira">Attabira</option>
                                                                                            <option value="Bheden">Bheden</option>
                                                                                            <option value="Barpalli">Barpalli</option>
                                                                                            <option value="Bhatli">Bhatli</option>
                                                                                            <option value="Ambabhana">Ambabhana</option>
                                                                                            <option value="Rajborasambar">Rajborasambar</option>
                                                                                            <option value="Gaisilet">Gaisilet</option>
                                                                                            <option value="Paikmal">Paikmal</option>
                                                                                            <option value="Sohela">Sohela</option>
                                                                                            <option value="Bijepur">Bijepur</option>
                                                                                            <option value="Jharabandha">Jharabandha</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Keonjhar">
                                                                                            <option value="Anadapur">Anadapur</option>
                                                                                            <option value="Hatadihi">Hatadihi</option>
                                                                                            <option value="Ghasipur">Ghasipur</option>
                                                                                            <option value="Joda">Joda</option>
                                                                                            <option value="Champua">Champua</option>
                                                                                            <option value="Jhumpura">Jhumpura</option>
                                                                                            <option value="Telkoi">Telkoi</option>
                                                                                            <option value="Keonjhar Sadar">Keonjhar Sadar</option>
                                                                                            <option value="Ghatgaon">Ghatgaon</option>
                                                                                            <option value="Harichandanpur">Harichandanpur</option>
                                                                                            <option value="Patna">Patna</option>
                                                                                            <option value="Banspal">Banspal</option>
                                                                                            <option value="Saharpada">Saharpada</option>
                                                                                            <option value="other">other</option>
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>6</td>
                                                                                <td>Name of the District</td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" name="district" id="txt_district" style="display:none">
                                                                                    <select class="form-control" name="district" id="district">
                                                                                        <option value="">-- Select One --</option>
                                                                                        <optgroup label="Odisha">
                                                                                            <option value="Cuttack">Cuttack</option>
                                                                                            <option value="Jajpur">Jajpur</option>
                                                                                            <option value="Jagatsinghpur">Jagatsinghpur</option>
                                                                                            <option value="Kendrapara">Kendrapara</option>
                                                                                            <option value="Balasore">Balasore</option>
                                                                                            <option value="Bhadrak">Bhadrak</option>
                                                                                            <option value="Puri">Puri</option>
                                                                                            <option value="Khurda">Khurda</option>
                                                                                            <option value="Nayagarh">Nayagarh</option>
                                                                                            <option value="Mayurbhanj">Mayurbhanj</option>
                                                                                            <option value="Dhenkanal">Dhenkanal</option>
                                                                                            <option value="Angul">Angul</option>
                                                                                            <option value="Bolangir">Bolangir</option>
                                                                                            <option value="Subarnapur">Subarnapur</option>
                                                                                            <option value="Sambalpur">Sambalpur</option>
                                                                                            <option value="Bargarh">Bargarh</option>
                                                                                            <option value="Keonjhar">Keonjhar</option>
                                                                                                                                                                <option value="Jagatsinghpur">Jagatsinghpur</option>
                                                                                                                                                                <option value="Kendrapara">Kendrapara</option>
                                                                                                                                                                <option value="Balasore">Balasore</option>
                                                                                                                                                                <option value="Bhadrak">Bhadrak</option>
                                                                                                                                                                <option value="Puri">Puri</option>
                                                                                                                                                                <option value="Khurda">Khurda</option>
                                                                                                                                                                <option value="Nayagarh">Nayagarh</option>
                                                                                                                                                                <option value="Mayurbhanj">Mayurbhanj</option>
                                                                                                                                                                <option value="Dhenkanal">Dhenkanal</option>
                                                                                                                                                                <option value="Angul">Angul</option>
                                                                                                                                                                <option value="Bolangir">Bolangir</option>
                                                                                                                                                                <option value="Subarnapur">Subarnapur</option>
                                                                                                                                                                <option value="Sambalpur">Sambalpur</option>
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>7</td>
                                                                                <td>Name of the State</td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" name="state" id="txt_state" style="display:none">
                                                                                    <select class="form-control" name="state" id="state">
                                                                                        <option value="">-- Select One --</option>
                                                                                        <option value="Odisha">Odisha</option>
                                                                                        <option value="Jharkhand">Jharkhand</option>
                                                                                        <option value="Chattisgarh">Chattisgarh</option>
                                                                                        <option value="other">other</option>
                                                                                    </select>                                  
                                                                                </td>
                                                                            </tr>
                                                                        </table></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Name Of the tribe</td>
                                                                    <td>
                                                                        <select name="tribe" class="form-control">
                                                                            <option value="">--Select--</option>
                                                                            <option value="Santal">Santal</option>
                                                                            <option value="Munda">Munda</option>
                                                                            <option value="Bonda">Bonda</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Dialect you speak</td>
                                                                    <td><input class="form-control" type="text" ></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Whether the student belongs to differently-abele category?</td>
                                                                    <td><select class="form-control" name="belongs">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                        </select></td>
                                                                    <td>&nbsp;</td>  
                                                                </tr>
                                                                <tr>
                                                                    <td>Religion</td>
                                                                    <td><select class="form-control">
                                                                            <option>Hindu</option>
                                                                            <option>muslim</option>
                                                                            <option>other</option>
                                                                        </select></td>
                                                                    <td>&nbsp;</td>  
                                                                </tr>
                                                            </table>
                        
                                                        </fieldset>
                        
                                                    </div>-->

                        <!--                            <div role="tabpanel" class="well modal-content form-horizontal tab-pane fade" id="house">
                                                        <fieldset>
                                                            <legend>Household : Background Information</legend>
                                                        </fieldset>
                                                        <table class="table">
                                                            <tr>
                                                                <td class="col-lg-8" colspan="2">Please mention some background informatin about all indivisual members of the household</td>
                                                                <td class="col-lg-4">&nbsp;</td>
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
                                                                            <td>116 A</td>
                                                                            <td>0 to 6 Years Members</td>
                                                                            <td><input class="form-control" id="foc1" type="text" ></td>
                                                                            <td><input class="form-control" type="text" ></td>
                                                                            <td><input class="form-control" type="text" ></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>116 B</td>
                                                                            <td>7-17 years Members</td>
                                                                            <td><input class="form-control" type="text" ></td>
                                                                            <td><input class="form-control" type="text" ></td>
                                                                            <td><input class="form-control" type="text" ></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>116 C</td>
                                                                            <td>Adults</td>
                                                                            <td><input class="form-control" type="text" ></td>
                                                                            <td><input class="form-control" type="text" ></td>
                                                                            <td><input class="form-control" type="text" ></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>117</td>
                                                                            <td>Total members in the family</td>
                                                                            <td><input class="form-control" type="text" ></td>
                                                                            <td><input class="form-control" type="text" ></td>
                                                                            <td><input class="form-control" type="text" name="total_member"></td>
                                                                        </tr>
                                                                    </table></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Details of yourbrother / sister/ relatives studying in KISS</td>
                                                            </tr>
                                                            <tr>
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
                                                                            <td>119</td>
                                                                            <td><input class="form-control" type="text"></td>
                                                                            <td><input class="form-control" type="text"></td>
                                                                            <td><input class="form-control" type="text"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>120</td>
                                                                            <td><input class="form-control" type="text"></td>
                                                                            <td><input class="form-control" type="text"></td>
                                                                            <td><input class="form-control" type="text"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>121</td>
                                                                            <td><input class="form-control" type="text"></td>
                                                                            <td><input class="form-control" type="text"></td>
                                                                            <td><input class="form-control" type="text"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>122</td>
                                                                            <td><input class="form-control" type="text"></td>
                                                                            <td><input class="form-control" type="text"></td>
                                                                            <td><input class="form-control" type="text"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>123</td>
                                                                            <td><input class="form-control" type="text"></td>
                                                                            <td><input class="form-control" type="text"></td>
                                                                            <td><input class="form-control" type="text"></td>
                                                                        </tr>
                                                                    </table></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Occupation</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3"><table class="table table-bordered">
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
                                                                                        <td>A. Primary <br> <input class="form-control" type="text" name="erning_primary"></td>
                                                                                        <td>B. Secondary** <br> <input class="form-control" type="text" name="erning_secondary"></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>  
                                                                        </tr>
                                                                    </table>
                                                            <tr>
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
                                                                                </table>
                                                                            </td>
                                                                            <td> Others(specify)= 10 <br> <textarea class="form-control"></textarea> </td>
                                                                        </tr>
                                                                    </table></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Drinking Water</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3"><table class="table table-bordered">
                                                                        <tr>
                                                                            <td></td>
                                                                            <td>Source of drinking water</td>
                                                                            <td><b>Ownership</b> <br> Private=1, Public=2, NA=0</td>
                                                                            <td><b>Quality of Drinking water</b> <br>Good=1,Average=2,Poor=3,Unhygienic=4, NA=0</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>A</td>
                                                                            <td>Open well</td>
                                                                            <td>
                                                                                <select class="form-control" name="openwell">
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control" name="openwell2">
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>B</td>
                                                                            <td>Tube well</td>
                                                                            <td>
                                                                                <select class="form-control" name="tubewell">
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control" name="tubewell2">
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>C</td>
                                                                            <td>Piped</td>
                                                                            <td>
                                                                                <select class="form-control" name="piped">
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control" name="piped2">
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>D</td>
                                                                            <td>Pond/tank/river</td>
                                                                            <td>
                                                                                <select class="form-control" name="ptr">
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control" name="ptr2">
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>E</td>
                                                                            <td>Others(specify) <br> <textarea class="form-control"></textarea></td>
                                                                            <td>
                                                                                <select class="form-control" name="others">
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control" name="others2">
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                    </table></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Remarks (if any):</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">Specific problem with drinking water(if any)......................</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><textarea class="form-control" name="waterplm"></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Livestock and poultry assets</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3"><table class="table table-bordered">
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td>A</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>codes</b></td>
                                                                            <td><b>category</b></td>
                                                                            <td>Number</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>128</td>
                                                                            <td>cow</td>
                                                                            <td><input class="form-control" type="text" name="128"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>129</td>
                                                                            <td>Bullock</td>
                                                                            <td><input class="form-control" type="text" name="129"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>130</td>
                                                                            <td>Buffalo</td>
                                                                            <td><input class="form-control" type="text" name="130"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>131</td>
                                                                            <td>calf</td>
                                                                            <td><input class="form-control" type="text" name="131"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>132</td>
                                                                            <td>Goat/sheep</td>
                                                                            <td><input class="form-control" type="text" name="132"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>133</td>
                                                                            <td>poultry</td>
                                                                            <td><input class="form-control" type="text" name="133"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>134</td>
                                                                            <td>others(specify)</td>
                                                                            <td><input class="form-control" type="text" name="134"></td>
                                                                        </tr>
                                                                    </table></td>
                                                            </tr>
                                                            <tr>
                                                                <td>135&nbsp;&nbsp;<b>House Type</b></td>
                                                                <td colspan="2">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="house_type[]" value="Mud House/hut"  class="form-control">Mud House/hut
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="house_type[]" value="Thached house"  class="form-control">Thached house
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="house_type[]" value="Semi Pucca"  class="form-control">Semi Pucca
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="house_type[]" value="Pucca"  class="form-control">Pucca
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="house_type[]" value="Any Other"  class="form-control">Any Other
                                                                    </label>
                                                                </td>
                        
                                                            </tr>
                                                            <tr>
                                                                <td><b>No.of rooms</b></td>
                                                                <td colspan="2">
                                                                    <input type="text" name="mudhouse" id="mudhouse" style="width: 50px;">
                                                                    <input type="text" name="thachedhouse" id="thachedhouse" style="width: 50px;margin-left: 11%;">
                                                                    <input type="text" name="semipucca" id="semipucca" style="width: 50px;margin-left: 10%;">
                                                                    <input type="text" name="pucca" id="pucca" style="width: 50px;margin-left: 7%;">
                                                                    <input type="text" name="other" id="other" style="width: 50px;margin-left: 3%;">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Other capital assets</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3"><table class="table table-bordered">
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td><b>A</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Codes</b></td>
                                                                            <td><b>Assets</b></td>
                                                                            <td><b>Number</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>136</td>
                                                                            <td>Bullock Cart</td>
                                                                            <td><input class="form-control" type="text" name="136"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>137</td>
                                                                            <td>Plough</td>
                                                                            <td><input class="form-control" type="text" name="137"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>138</td>
                                                                            <td>Thresher</td>
                                                                            <td><input class="form-control" type="text" name="138"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>139</td>
                                                                            <td>Cycle/Motor Cycle</td>
                                                                            <td><input class="form-control" type="text" name="139"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>140</td>
                                                                            <td>TV</td>
                                                                            <td><input class="form-control" type="text" name="140"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>141</td>
                                                                            <td>Radio</td>
                                                                            <td><input class="form-control" type="text" name="141"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>142</td>
                                                                            <td> Electric Fan</td>
                                                                            <td><input class="form-control" type="text" name="142"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>143</td>
                                                                            <td>Other</td>
                                                                            <td><input class="form-control" type="text" name="143"></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>What types of festivals observed in your village ?</td>
                        
                                                                <td><input class="form-control" type="text" name="festivalstype"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Types of dances and songs you perform in your festivals ?</td>
                        
                                                                <td><input class="form-control" type="text" name="ferformtype"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Availability of food (on daily basis) in your family?</td>
                        
                                                                <td><select class="form-control">
                                                                        <option>sufficient</option>
                        
                                                                        <option>Average</option>
                        
                                                                        <option>insufficient</option>
                        
                                                                    </select></td>
                                                            </tr>
                                                        </table>
                        
                                                    </div>-->

                        <!--                            <div role="tabpanel" class="well modal-content form-horizontal tab-pane fade" id="income">
                                                        <fieldset>
                                                            <legend>Annual Income</legend>
                                                            <table class="table">
                                                                <tr>
                                                                    <td class="col-lg-8" colspan="2"><b>147.Income source of the household</b></td>
                                                                    <td class="col-lg-4">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <b>147.1.</b>
                                                                        <span>Agriculture Income(Annually)</span>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="agr_income" id="agr_income">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><table class="table table-bordered">
                                                                            <tr>
                                                                                <th>Crops</th>
                                                                                <th>Area</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Paddy</td>
                                                                                <td>
                                                                                    <input type="text" name="" id="foc2" style="width: 85%;height: 120%;border: 1px solid #cccccc;color: #555555;padding: 6px 12px;font-size: 14px;">
                                                                                    <select name="paddy_measure" style="height: 84%;border: 1px solid #cccccc;">
                                                                                        <option value="">--Select--</option>
                                                                                        <option value="Decimal">Decimal</option>
                                                                                        <option value="Gunth">Gunth</option>
                                                                                        <option value="Acre">Acre</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Other cash crops</td>
                                                                                <td><input type="text" name="" style="width: 85%;height: 120%;border: 1px solid #cccccc;color: #555555;padding: 6px 12px;font-size: 14px;">
                                                                                    <select name="cash_crop_measure" style="height: 84%;border: 1px solid #cccccc;">
                                                                                        <option value="">--Select--</option>
                                                                                        <option value="Decimal">Decimal</option>
                                                                                        <option value="Gunth">Gunth</option>
                                                                                        <option value="Acre">Acre</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Minor Forest Produces</td>
                                                                                <td><input type="text" name="" style="width: 85%;height: 120%;border: 1px solid #cccccc;color: #555555;padding: 6px 12px;font-size: 14px;">
                                                                                    <select name="minor_forest_measure" style="height: 84%;border: 1px solid #cccccc;">
                                                                                        <option value="">--Select--</option>
                                                                                        <option value="Decimal">Decimal</option>
                                                                                        <option value="Gunth">Gunth</option>
                                                                                        <option value="Acre">Acre</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                        </table></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>147.2.</b> <span>Livestock Income(Annually)</span></td>
                                                                    <td>
                                                                        <input type="text" name="livestock_income" id="livestock_income">
                                                                    </td>
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
                                                                    <td><b>147.3.</b> <span>Daily wage Income(Annually)</span></td>
                                                                    <td>
                                                                        <input type="text" name="daily_income" id="daily_income">
                                                                    </td>
                                                                    <th>Working Days</th>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3">
                                                                        <table class="table table-bordered">
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
                                                                    <td><b>147.4.</b> <span>Government schemes/programmes your family availed? </span></td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px;margin-left: 10px;">
                                                                            <input type="checkbox" name="scheme[]" value="BPL"  class="form-control">BPL
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="scheme[]" value="Antodaya Annapurna Yojana"  class="form-control">Antodaya Annapurna Yojana
                                                                        </label>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="scheme[]" value="IAY"  class="form-control">IAY
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="scheme[]" value="KISSAN Credit Card"  class="form-control">KISSAN Credit Card
                                                                        </label>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="scheme[]" value="Health Card"  class="form-control">Health Card
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="scheme[]" value="Green Card"  class="form-control">Green Card
                                                                        </label>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="scheme[]" value="Lal Card"  class="form-control">Lal Card
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="scheme[]" value="others"  class="form-control"  id="card" onchange="showTextarea(this.id);">Others
                                                                        </label>
                                                                        <textarea name="" class="form-control" id="textarea_card" style="display: none;"></textarea>
                                                                    </td>
                                                                    <td> <input class="form-control" type="text" name="" placeholder="Card Number"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>147.5.</b> <span>Does your parents have </span></td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px; margin-left:10px">
                                                                            <input type="checkbox" name="account[]" value="Bank Account"  class="form-control">Bank Account
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="account[]" value="Debit/Credit Card"  class="form-control">Debit/Credit Card
                                                                        </label>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="account[]" value="Postal Savings"  class="form-control">Postal Savings
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="account[]" value="others"  class="form-control" id="account" onchange="showTextarea(this.id);">Others
                                                                        </label>
                                                                        <textarea name="" class="form-control" id="textarea_account" style="display: none;"></textarea>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" type="text" name="" placeholder="Account Number"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>147.6.</b> <span>Does your parents have following identification cards?</span></td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px; margin-left:10px">
                                                                            <input type="checkbox" name="identification[]" value="Voter Card"  class="form-control">Voter Card
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="identification[]" value="Addhar Card"  class="form-control">Addhar Card
                                                                        </label>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="identification[]" value="Passport"  class="form-control">Passport
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="identification[]" value="others"  class="form-control" id="identification" onchange="showTextarea(this.id);">Any Other
                                                                        </label>
                                                                        <textarea name="" class="form-control" id="textarea_identification" style="display: none;"></textarea>
                                                                    </td>
                                                                    <td><input class="form-control" type="text" name="" placeholder="Card Number"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>148.</b> <span>What do your family use most for cooking?</span></td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px; margin-left:10px">
                                                                            <input type="checkbox" name="cooking[]" value="1"  class="form-control">Electric Burner
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="cooking[]" value="2"  class="form-control">Kerosene
                                                                        </label>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="cooking[]" value="3"  class="form-control">Gas
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="cooking[]" value="4"  class="form-control">Fire wood
                                                                        </label>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="cooking[]" value="5"  class="form-control">Cowdung cake
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="cooking[]" value="6"  class="form-control">Straw
                                                                        </label>
                                                                        <label class="checkbox-inline" style="width:213px">
                                                                            <input type="checkbox" name="cooking[]" value="7"  class="form-control">Bio-gas
                                                                        </label>
                                                                        <label class="checkbox-inline" style="margin-left:1px">
                                                                            <input type="checkbox" name="cooking[]" value="8"  class="form-control">Solar Cooker
                                                                        </label>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="cooking[]" value="others"  class="form-control"  id="cooking" onchange="showTextarea(this.id);">Others
                                                                        </label>
                                                                        <textarea class="form-control" name="" id="textarea_cooking" style="display: none;"></textarea>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>149.</b> <span>What your parents use most for lighting?</span></td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px;margin-left:10px">
                                                                            <input type="checkbox" name="lighting[]" value="1"  class="form-control">Electric bulb/tube
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="lighting[]" value="2"  class="form-control">Kerosene
                                                                        </label>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="lighting[]" value="3"  class="form-control">Candle
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="lighting[]" value="4"  class="form-control">Solar Lantern
                                                                        </label>
                                                                        <label class="checkbox-inline" style="width:204px">
                                                                            <input type="checkbox" name="lighting[]" value="others"  class="form-control"  id="lighting" onchange="showTextarea(this.id);">Other(Specify)
                                                                        </label>
                                                                        <textarea class="form-control" name="" id="textarea_lighting" style="display: none;"></textarea>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>150.</b> <span>Whether the house is electrified?</span></td>
                                                                    <td>
                                                                        <select class="form-control" name="" id="cooking" onchange="showTextarea(this.id);">
                                                                            <option value="">Select</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>151.</b> <span>What is your opinion about village road?</span></td>
                                                                    <td><select class="form-control" name="" id="road" onchange="showTextarea(this.id);">
                                                                            <option value="">Select</option>
                                                                            <option value="1">Concrete Road</option>
                                                                            <option value="2">Pucca Road</option>
                                                                            <option value="3">Kucha Road</option>
                                                                            <option value="4">No Road</option>
                                                                            <option value="others">Other(Specify)</option>
                                                                        </select>
                                                                        <textarea name="" id="textarea_road" style="display: none;"></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>152.</b> <span>What are the road communication/transportation facilities available in your village?</span></td>
                                                                    <td><textarea class="form-control" name=""></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>153.</b> <span>Shops available in your village(Specify)?</span></td>
                                                                    <td><textarea class="form-control" name=""></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>154.</b> <span>What are other facilities available in your village?</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><table class="table table-bordered">
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
                                                                                <td>Vetnary centre</td>
                                                                                <td><input type="text" class="form-control" name=""></td>
                                                                            </tr>
                                                                        </table></td>
                                                                </tr>
                                                            </table>
                        
                                                        </fieldset>
                                                    </div>-->

                        <!--                            <div role="tabpanel" class="well modal-content form-horizontal tab-pane fade" id="sanitation">
                                                        <fieldset>
                                                            <legend>Sanitation and Health</legend>
                                                            <table class="table">
                                                                <tr>
                                                                    <td class="col-lg-3"><b>155.</b> <span>Sanitation</span></td>
                                                                    <td class="col-lg-5">
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="sanitation[]" value="1"  class="form-control">Open
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="sanitation[]" value="2"  class="form-control">Public Toilet
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="sanitation[]" value="3"  class="form-control">Private Toilet
                                                                        </label>
                                                                    </td>
                                                                    <td class="col-lg-4"></td>  
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><b>156.</b> <span> Ownership of Health Infrastructure available in your village ( record multiple responses ).
                                                                            Please specify types of medicine used ( Ayurvedic , Homeopathic , Allopathic , Traditional etc. ) </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span>Ownership</span></td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px;margin-left:10px">
                                                                            <input type="checkbox" class="form-control" > Government
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="form-control" > Private 
                                                                        </label>
                                                                        <label class="checkbox-inline" style="width:204px">     
                                                                            <input type="checkbox" class="form-control" > NGO-run 
                                                                        </label>
                                                                        <label class="checkbox-inline">     
                                                                            <input type="checkbox" id="ownership" onchange="showTextarea(this.id);" class="form-control" value="others" > others(specify) 
                                                                        </label>
                                                                        <label class="checkbox-inline" style="width:204px">     
                                                                            <input type="checkbox" class="form-control" > Not available 
                                                                        </label>
                                                                    </td>
                                                                    <td>     
                                                                        <textarea class="form-control" name="" id="textarea_ownership" style="display: none;"></textarea></td>
                                                                </tr>
                                                                <tr>   
                                                                    <td><span>Types of medicine</span>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline" style="width:204px;margin-left:10px">
                                                                            <input type="checkbox" class="form-control" > Ayurvedic
                                                                        </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="form-control" > Homeopathic 
                                                                        </label>
                                                                        <label class="checkbox-inline" style="width:204px">     
                                                                            <input type="checkbox" class="form-control" > Allopathic 
                                                                        </label>
                                                                        <label class="checkbox-inline">     
                                                                            <input type="checkbox" class="form-control" > Traditional 
                                                                        </label>
                                                                        <label class="checkbox-inline" style="width:204px">     
                                                                            <input type="checkbox" id="medicine" onchange="showTextarea(this.id);" class="form-control" value="others" > others(specify) 
                                                                        </label>
                                                                    </td>
                                                                    <td>  
                                                                        <textarea class="form-control" name="" id="textarea_medicine" style="display: none;"></textarea>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </fieldset>
                                                    </div>-->

                        <!--                            <div role="tabpanel" class="well modal-content form-horizontal tab-pane fade" id="education">
                                                        <fieldset>
                                                            <legend>Education</legend>
                                                            <table class="table">
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <table class="table">
                                                                            <tr>
                                                                                <td class="col-lg-3"><b>157.</b> <span> Education Infrastructure available in your village(Specify) </span></td>
                                                                                <td class="col-lg-5"><select class="form-control" name="" id="education" onchange="showTextarea(this.id);">
                                                                                        <option value="">Select</option>
                                                                                        <option value="1">Government</option>
                                                                                        <option value="2">Private</option>
                                                                                        <option value="3">NGO-run</option>
                                                                                        <option value="others">others(specify)</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="col-lg-4"> 
                                                                                    <textarea class="form-control" name="" id="textarea_education" style="display: none;"></textarea></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>158.</b> <span> If drop-outs,ask the causes of drop-outs(Record the multiple responses) </span></td>
                                                                                <td>
                                                                                    <label class="checkbox-inline" style="margin-left:10px">
                                                                                        <input type="checkbox" name="drop-out[]" value="1"  class="form-control">Children needed to work in order to sustain their livelihood
                                                                                    </label>
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" name="drop-out[]" value="2"  class="form-control">Children had to look after siblings
                                                                                    </label>
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" name="drop-out[]" value="3"  class="form-control">No job opportunities after education
                                                                                    </label>
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" name="drop-out[]" value="4"  class="form-control">Primary school far away from the home
                                                                                    </label>
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" name="drop-out[]" value="5"  class="form-control">Secondary school far away from the home
                                                                                    </label>
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" name="drop-out[]" value="6"  class="form-control">Security problems for girls
                                                                                    </label>
                                                                                    <label class="checkbox-inline" style="width:300px">
                                                                                        <input type="checkbox" name="drop-out[]" value="others"  class="form-control"  id="drop-out" onchange="showTextarea(this.id);
                                                                                                    showTextBox(this.id);">Other(Specify)
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" name="" id="textarea_drop-out" style="display: none;" placeholder="Please specify the cause here"></textarea>
                                                                                    <div id="distance" style="display: none;">
                                                                                        <input class="form-control" type="text" name="distance" placeholder="Distance ( in Kms )">
                                                                                    </div></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>159.</b> <span> The subject/s you like most(Specify): </span></td>
                                                                                <td><textarea class="form-control" name=""></textarea></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>160.</b> <span> Any hobbies/habits do you have: </span></td>
                                                                                <td><textarea class="form-control" name=""></textarea></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>161.</b> <span> What was doing before joining KISS: </span></td>
                                                                                <td><textarea class="form-control" name=""></textarea></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>162.</b> <span> What are the areas in which you have improved after joining KISS: </span></td>
                                                                                <td><textarea class="form-control" name=""></textarea></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2"><b>163.</b> <span> Activities you have involved and enjoyed in KISS:(Specify) </span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>163.1</b><span>Activity</span></td>
                                                                                <td>
                                                                                    <select class="form-control" name="" id="activities" onchange="showTextarea(this.id);">
                                                                                        <option value="">Select</option>
                                                                                        <option>Debate</option>
                                                                                        <option>Essay</option>
                                                                                        <option>GK</option>
                                                                                        <option>NSS</option>
                                                                                        <option>Scout &amp; Guide</option>
                                                                                        <option>Cup Bul-Bul</option>
                                                                                        <option>Rovers Rangers</option>
                                                                                        <option>NCC</option>
                                                                                        <option>Red Cross</option>
                                                                                        <option>KYS</option>
                                                                                        <option>Peer Educator</option>
                                                                                        <option value="others">others(specify)</option>
                                                                                    </select>
                                                                                    <textarea class="form-control" name="" id="textarea_activities" style="display: none;"></textarea>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>163.2</b> <span> Sports and Games: </span></td>
                                                                                <td>
                                                                                    <label class="checkbox-inline" style="width:204px;margin-left:10px">
                                                                                        <input type="checkbox" name="sports[]" value="1"  class="form-control">Cricket
                                                                                    </label>
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" name="sports[]" value="2"  class="form-control">Football
                                                                                    </label>
                                                                                    <label class="checkbox-inline" style="width:204px">
                                                                                        <input type="checkbox" name="sports[]" value="3"  class="form-control">Badminton
                                                                                    </label>
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" name="sports[]" value="4"  class="form-control">Hockey
                                                                                    </label>
                                                                                    <label class="checkbox-inline" style="width:204px;margin-left:10px">
                                                                                        <input type="checkbox" name="sports[]" value="5"  class="form-control">Athletics
                                                                                    </label>
                                                                                    <label class="checkbox-inline" style="width:204px">
                                                                                        <input type="checkbox" name="sports[]" value="others"  class="form-control"  id="sports" onchange="showTextarea(this.id);">Other(Specify)
                                                                                    </label>
                                                                                    <textarea class="form-control" name="textarea_sports" id="textarea_sports" style="display: none;"></textarea>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>163.3</b> <span> Music </span></td>
                                                                                <td>
                                                                                    <label class="checkbox-inline" style="width:204px;margin-left:10px">
                                                                                        <input type="checkbox" name="music[]" value="Classical"  class="form-control">Classical
                                                                                    </label>
                                                                                    <label class="checkbox-inline" style="width:204px">
                                                                                        <input type="checkbox" name="music[]" value="Modern"  class="form-control">Modern
                                                                                    </label>
                                                                                    <label class="checkbox-inline" style="width:204px">
                                                                                        <input type="checkbox" name="music[]" value="others"  class="form-control"  id="music" onchange="showTextarea(this.id);">Other(Specify)
                                                                                    </label>
                                                                                    <textarea class="form-control" name="textarea_music" id="textarea_music" style="display: none;"></textarea>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><span> Dance </span></td>
                                                                                <td>
                                                                                    <label class="checkbox-inline" style="width:204px;margin-left:10px">
                                                                                        <input type="checkbox" name="dance[]" value="Odishi"  class="form-control">Odishi
                                                                                    </label>
                                                                                    <label class="checkbox-inline" style="width:204px">
                                                                                        <input type="checkbox" name="dance[]" value="Sambalpuri"  class="form-control">Sambalpuri
                                                                                    </label>
                                                                                    <label class="checkbox-inline" style="width:204px">
                                                                                        <input type="checkbox" name="dance[]" value="Asami"  class="form-control">Asami
                                                                                    </label>
                                                                                    <label class="checkbox-inline" style="width:204px">
                                                                                        <input type="checkbox" name="dance[]" value="Typical Tribal Dance"  class="form-control">Typical Tribal Dance
                                                                                    </label>
                                                                                    <label class="checkbox-inline" style="width:204px">
                                                                                        <input type="checkbox" name="music[]" value="others"  class="form-control"  id="music" onchange="showTextarea(this.id);">Other(Specify)
                                                                                    </label>
                                                                                    <textarea class="form-control" name="textarea_music" id="textarea_music" style="display: none;"></textarea>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>163.4</b> <span> Yoga and Meditation: </span></td>
                                                                                <td>
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" name="yoga[]" value="1"  class="form-control">A
                                                                                    </label>
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" name="yoga[]" value="2"  class="form-control">B
                                                                                    </label>
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" name="yoga[]" value="others"  class="form-control"  id="yoga" onchange="showTextarea(this.id);">Other(Specify)
                                                                                    </label>
                                                                                    <textarea class="form-control" name="textarea_yoga" id="textarea_yoga" style="display: none;"></textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <span style="color: red;">(To be provided.)</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>163.5</b> <span> Vocational: </span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 60%;">
                                                                                    <input type="radio" name="vocational" value="Tailoring" onchange="showValue(this.value);" style="margin-left: 3%;">Tailoring
                                                                                    <input type="radio" name="vocational" value="Chemical" onchange="showValue(this.value);" style="margin-left: 3%;">Chemical
                                                                                    <input type="radio" name="vocational" value="Knitting" onchange="showValue(this.value);" style="margin-left: 3%;">Knitting
                                                                                    <input type="radio" name="vocational" value="Applique" onchange="showValue(this.value);" style="margin-left: 3%;">Applique
                                                                                    <input type="radio" name="vocational" value="Art_Craft" onchange="showValue(this.value);" style="margin-left: 3%;">Art &amp; Craft
                        
                                                                                </td>
                                                                                <td>
                                                                                    <select class="form-control" name="" id="tailoring" onchange="showTextarea(this.id);" style="display: none;">
                                                                                        <option value="">Select</option>
                                                                                        <option value="Full/Half Pant">Full Pant/Half Pant</option>
                                                                                        <option value="Half Shirt">Half Shirt</option>
                                                                                        <option value="Tunic Frock">Tunic Frock</option>
                                                                                        <option value="Tunic Shirt">Tunic Shirt</option>
                                                                                        <option value="Salwar Kameez">Salwar Kameez</option>
                                                                                        <option value="Casual Dresses">Casual Dresses</option>
                                                                                        <option value="others">others(specify)</option>
                                                                                    </select>    
                                                                                    <textarea class="form-control" name="" id="textarea_tailoring" style="display: none;"></textarea>
                                                                                    <select class="form-control" name="" id="chemical" onchange="showTextarea(this.id);" style="display: none;">
                                                                                        <option value="">Select</option>
                                                                                        <option value="Phenyl">Phenyl</option>
                                                                                        <option value="Hand Wash">Hand Wash</option>
                                                                                        <option value="Utensil Case">Utensil Case</option>
                                                                                        <option value="Cloth Whitening">Cloth Whitening</option>
                                                                                        <option value="Detergent Liquid">Detergent Liquid</option>
                                                                                        <option value="Room Freshner">Room Freshner</option>
                                                                                        <option value="Candle">Candle</option>
                                                                                        <option value="others">others(specify)</option>
                                                                                    </select>  
                                                                                    <textarea class="form-control" name="" id="textarea_chemical" style="display: none;"></textarea>
                                                                                    <select class="form-control" name="" id="knitting" onchange="showTextarea(this.id);" style="display: none;">
                                                                                        <option value="">Select</option>
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
                                                                                    <textarea class="form-control" name="" id="textarea_knitting" style="display: none;"></textarea>
                                                                                    <select class="form-control" name="" id="applique" onchange="showTextarea(this.id);" style="display: none;">
                                                                                        <option value="">Select</option>
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
                                                                                    <textarea class="form-control" name="" id="textarea_applique" style="display: none;"></textarea>
                                                                                    <select class="form-control" name="" id="art_craft" onchange="showTextarea(this.id);" style="display: none;">
                                                                                        <option value="">Select</option>
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
                                                                                    <textarea class="form-control" name="" id="textarea_art_craft" style="display: none;"></textarea>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2"><b>164.</b> <span> What are your achievements(Specify): </span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="3">
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
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                                <td><input class="form-control" type="text" name=""></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>165.</b> <span> What is your ambition: </span></td>
                                                                                <td>
                                                                                    <select name="ambition" class="form-control">
                                                                                        <option value="">--Select--</option>
                                                                                        <option value="Doctor">Doctor</option>
                                                                                        <option value="Engineer">Engineer</option>
                                                                                        <option value="Teacher">Teacher</option>
                                                                                        <option value="Others">Others</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>166.</b> <span> What are your plans to achieve your ambition: </span></td>
                                                                                <td><textarea class="form-control" name=""></textarea></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>167.</b> <span> Importance/Role of KISS in achieving your ambition: </span></td>
                                                                                <td><textarea class="form-control" name=""></textarea></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>168.</b> <span> How you will involve yourself for achieving the objectives of KISS: </span></td>
                                                                                <td><textarea class="form-control" name=""></textarea></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>169.</b> <span> Present behavior of the student:- </span></td>
                                                                                <td><select class="form-control" name="" id="behavior" onchange="showTextarea(this.id);">
                                                                                        <option value="">Select</option>
                                                                                        <option>Shy</option>
                                                                                        <option>Smart</option>
                                                                                        <option value="others">others(specify)</option>
                                                                                    </select></td>
                                                                                <td><input class="form-control" type="text" name="" id="textarea_behavior" style="display: none;"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>170.</b> <span> Any other remarks by the teacher/mentor: </span></td>
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
                                                    </div>-->

                        <table border='1' align='center' style='margin-top:5%;'>
                            <tbody>
                                <tr>
                                    <td colspan="4" style="font-size: 22px;">
                                        <b>
                                        <?php $x=date('y');
                                                $y=$x+1;
                                                $z=$x-1;
                                                ?>
                                            Kalinga Institute of Social Sciences(KISS)<br/>
                                            Student's Status <?=date('Y')."-".$y;?>
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="head">
                                        <b>A. School Wing</b>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Class</th>
                                    <th colspan="3"><?=date('Y')."-".$y;?></th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="border-collapse: collapse;  border-right-color:  white;font-weight: bold;">Girls</td>
                                    <td style="border-collapse: collapse;  border-right-color:  white;font-weight: bold;">Boys</td>
                                    <td style="border-collapse: collapse;  border-right-color:  white;font-weight: bold;">Total</td>
                                </tr>
                                <tr>
                                    <td>I</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>1500<sup style="color:red">&#9733;</sup></td>
                                </tr>
                                <tr>
                                    <td>II</td>
                                    <td>1177</td>
                                    <td>842</td>
                                    <td>2019</td>
                                </tr>
                                <tr>
                                    <td>III</td>
                                    <td>914</td>
                                    <td>1048</td>
                                    <td>1962</td>
                                </tr>
                                <tr>
                                    <td>IV</td>
                                    <td>751</td>
                                    <td>1195</td>
                                    <td>1946</td>
                                </tr>
                                <tr>
                                    <td>V</td>
                                    <td>1010</td>
                                    <td>1276</td>
                                    <td>2286</td>
                                </tr>
                                <tr>
                                    <td>VI</td>
                                    <td>885</td>
                                    <td>1317</td>
                                    <td>2202</td>
                                </tr>
                                <tr>
                                    <td>VII</td>
                                    <td>883</td>
                                    <td>1341</td>
                                    <td>2224</td>
                                </tr>
                                <tr>
                                    <td>VIII</td>
                                    <td>875</td>
                                    <td>1258</td>
                                    <td>2133</td>
                                </tr>
                                <tr>
                                    <td>IX</td>
                                    <td>706</td>
                                    <td>1006</td>
                                    <td>1712</td>
                                </tr>
                                <tr>
                                    <td>X</td>
                                    <td>513</td>
                                    <td>817</td>
                                    <td>1330</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><b>7714</b></td>
                                    <td><b>10100</b></td>
                                    <td><b>19314</b></td>
                                </tr>
                            </tbody>
                            <tr>
                                <td colspan="4"><small><sup style="color:red">&#9733;</sup>N.B.  1500 seats in Class-I will be allocated in the academic year 2016-17.</small></td>
                            </tr>
                        </table>
                        <br><br/>
                        <table border='1' align='center'>
                            <tbody>
                                <tr>
                                    <td colspan="5" style="font-size: 22px;">
                                        <b>
                                            Student's Status <?=date("Y",strtotime("-1 year"))."-".$x;?><sup style="color:red">&#9733;</sup>
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="head">
                                        <b>B. College &amp; KIIT Wings</b>
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th colspan="3"><?=date("Y",strtotime("-1 year"))."-".$x;?></th>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Class</td>
                                    <td style="border-collapse: collapse;  border-right-color:  white;font-weight: bold;">Girls</td>
                                    <td style="border-collapse: collapse;  border-right-color:  white;font-weight: bold;">Boys</td>
                                    <td style="font-weight: bold;">Total</td>
                                </tr>
                                <tr>
                                    <td>+2 1st Year</td>
                                    <td>851</td>
                                    <td>364</td>
                                    <td>1215</td>
                                </tr>
                                <tr>
                                    <td>+2 2nd Year</td>
                                    <td>560</td>
                                    <td>655</td>
                                    <td>1215</td>
                                </tr>
                                <tr>
                                    <td>+3 1st Year</td>
                                    <td>417</td>
                                    <td>247</td>
                                    <td>664</td>
                                </tr>
                                <tr>
                                    <td>+3 2nd Year</td>
                                    <td>264</td>
                                    <td>400</td>
                                    <td>664</td>
                                </tr>
                                <tr>
                                    <td>+3 3rd Year</td>
                                    <td>425</td>
                                    <td>239</td>
                                    <td>664</td>
                                </tr>
                                <tr>
                                    <td>PG 1st Year</td>
                                    <td>186</td>
                                    <td>180</td>
                                    <td>366</td>
                                </tr>
                                <tr>
                                    <td>PG 2nd Year</td>
                                    <td>199</td>
                                    <td>167</td>
                                    <td>366</td>
                                </tr>
                                <tr>
                                    <td>KIIT Student</td>
                                    <td>302</td>
                                    <td>538</td>
                                    <td>840</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>3204</td>
                                    <td>2790</td>
                                    <td>5994</td>
                                </tr>
                            </tbody>
                            <tr>
                                <td colspan="4"><small><sup style="color:red">&#9733;</sup>The student status of the college for the academic year <?=date('Y')."-".$y;?> will be updated after the completion of the admission in July/August, <?=date('Y')?></small></td>
                            </tr>
                        </table>
                        <br><br/>
                        <table border='1' align='center'>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th>Girls</th>
                                    <th>Boys</th>
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <td><b>Grand Total</b></td>
                                    <td>
                                        <b>10918</b>
                                    </td>
                                    <td>
                                        <b>12890</b>
                                    </td>
                                    <td>
                                        <b>25308</b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>



                    </div>

                </form>
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

