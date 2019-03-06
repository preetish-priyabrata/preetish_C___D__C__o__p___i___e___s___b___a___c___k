<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kalinga Institute of Social Sciences</title>

        <!--Date Picker-->
        <link rel="stylesheet" href="css/jquery-ui.css">
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#datepicker").datepicker();
            });
        </script>

        <link rel="stylesheet" type="text/css" href="bootstrap/css/pastel-stream.css" />
        <link rel="stylesheet" type="text/css" href="css/style_avi.css" />
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <script>
      function showTextarea(str) {
          var value = document.getElementById(str).value;
          if (value == 'others') {
              document.getElementById('textarea_' + str).style.display = 'block';
          }
          else {
              document.getElementById('textarea_' + str).style.display = 'none';

          }
      }

      function showTextBox(distance) {
          var dist = document.getElementById(distance).value;
          if (dist == 4 || dist == 5 || dist == 'others') {
              document.getElementById('distance').style.display = 'block';
          }
          else {
              document.getElementById('distance').style.display = 'none';
          }
      }

      function scrolTop() {

          var bodyRect = document.body.getBoundingClientRect();    // Y- Offset from top
          var duration = 750;

          event.preventDefault();
          jQuery(' html , body ').animate({scrollTop: 0}, duration);
          return false;
      }

      jQuery(document).ready(function() {
          $('.nav-tabs-top a[data-toggle="tab"]').on('click', function() {
              $('.nav-tabs-bottom li.active').removeClass('active')
              $('.nav-tabs-bottom a[href="' + $(this).attr('href') + '"]').parent().addClass('active');
          });

          $('.nav-tabs-bottom a[data-toggle="tab"]').on('click', function() {
              $('.nav-tabs-top li.active').removeClass('active')
              $('.nav-tabs-top a[href="' + $(this).attr('href') + '"]').parent().addClass('active');
          });

      });




      $(document).ready(function() {
          $("#uploadimage1").on('submit', (function(e) {
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
                  success: function(data)  		// A function to be called if request succeeds
                  {
                      $('#loading1').hide();
                      $("#message1").html(data);
                  }
              });
          }));

// Function to preview image
          $(function() {
              $("#file1").change(function() {
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
    </head>
    <body>
        <div class="container"> 

            <!-- sample templates start --> 

            <!-- Navbar -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar navbar-default navbar-fixed-top">
                        <div class="container">
                            <div class="col-lg-4 text-center"> <a class="" href="index.php"><img class="img-responsive img-thumbnail logo" src="Images/left.png"></a> </div>
                            <div class="col-lg-4 wrapper text-center"> <span>Students / Family information sheet</span> </div>
                            <div class="col-lg-4 text-center"> <a class="" href="#"><img class="img-responsive img-thumbnail logo" src="Images/sir2.jpg"></a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Forms  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h1 id="forms">Registration Form <span class="pull-right"><a href="report.php" class="btn btn-primary">Go to reports</a></span></h1>
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
                                                    <option value="1993">II</option>
                                                    <option value="1993">III</option>
                                                    <option value="1993">IV</option>
                                                    <option value="1993">V</option>
                                                    <option value="1993">VI</option>
                                                    <option value="1993">VII</option>
                                                    <option value="1993">VIII</option>
                                                    <option value="1993">IX</option>
                                                    <option value="1993">X</option>
                                                    <option value="1993">+2</option>
                                                    <option value="1993">Graduation</option>
                                                    <option value="1993">Post graduation</option>
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
                                            <td><input type="text" class="form-control" name="dob" id="datepicker"></td>
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
                                                        <td>Name of the Gram,Panchaayat</td>
                                                        <td><input class="form-control" type="text" ></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Name of the Block</td>
                                                        <td><input class="form-control" type="text" name="block" ></td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Name of the District</td>
                                                        <td>
                                                            <select name="district" class="form-control">
                                                                <option value="">--Select--</option>
                                                                <optgroup label="Odisha">
                                                                    <option value="Angul">Angul</option>
                                                                    <option value="Bargarh">Bargarh</option>
                                                                    <option value="Bhadrak">Bhadrak</option>
                                                                    <option value="Balasore">Balasore</option>
                                                                    <option value="Balangir">Balangir</option>
                                                                    <option value="Boudh">Boudh</option>
                                                                    <option value="Cuttack">Cuttack</option>
                                                                    <option value="Deogarh">Deogarh</option>
                                                                    <option value="Dhenkanal">Dhenkanal</option>
                                                                    <option value="Gajapati">Gajapati</option>
                                                                    <option value="Ganjam">Ganjam</option>
                                                                    <option value="Jagatsinghpur">Jagatsinghpur</option>
                                                                    <option value="Jajpur">Jajpur</option>
                                                                    <option value="Jharsuguda">Jharsuguda</option>
                                                                    <option value="Kalahandi">Kalahandi</option>
                                                                    <option value="Kandhamal">Kandhamal</option>
                                                                    <option value="Kendrapara">Kendrapara</option>
                                                                    <option value="Keonjhar">Keonjhar</option>
                                                                    <option value="Khurda">Khurda</option>
                                                                    <option value="Koraput">Koraput</option>
                                                                    <option value="Malkangiri">Malkangiri</option>
                                                                    <option value="Mayurbhanj">Mayurbhanj</option>
                                                                    <option value="Nuapada">Nuapada</option>
                                                                    <option value="Nabrangpur">Nabrangpur</option>
                                                                    <option value="Nayagarh">Nayagarh</option>
                                                                    <option value="Puri">Puri</option>
                                                                    <option value="Rayagada">Rayagada</option>
                                                                    <option value="Sambalpur">Sambalpur</option>
                                                                    <option value="Subarnapur">Subarnapur</option>
                                                                    <option value="Sundargarh">Sundargarh</option>
                                                                </optgroup>
                                                                <optgroup label="Chhatttisgarh">
                                                                    <option value="Balod">Balod</option>
                                                                    <option value="Baloda Bazar">Baloda Bazar</option>
                                                                    <option value="Balrampur">Balrampur</option>
                                                                    <option value="Bastar">Bastar</option>
                                                                    <option value="Bemetara">Bemetara</option>
                                                                    <option value="Bijapur">Bijapur</option>
                                                                    <option value="Bilaspur">Bilaspur</option>
                                                                    <option value="Dantewada">Dantewada</option>
                                                                    <option value="Dhamtari">Dhamtari</option>
                                                                    <option value="Durg">Durg</option>
                                                                    <option value="Gariaband">Gariaband</option>
                                                                    <option value="Jashpur">Jashpur</option>
                                                                    <option value="Janjgir-Champa">Janjgir-Champa</option>
                                                                    <option value="Kondagaon">Kondagaon</option>
                                                                    <option value="Korba">Korba</option>
                                                                    <option value="Koriya">Koriya</option>
                                                                    <option value="Kanker">Kanker</option>
                                                                    <option value="Kabirdham">Kabirdham</option>
                                                                    <option value="Mahasamund">Mahasamund</option>
                                                                    <option value="Mungeli">Mungeli</option>
                                                                    <option value="Narayanpur">Narayanpur</option>
                                                                    <option value="Raigarh">Raigarh</option>
                                                                    <option value="Rajnandgaon">Rajnandgaon</option>
                                                                    <option value="Raipur">Raipur</option>
                                                                    <option value="Surajpur">Surajpur</option>
                                                                    <option value="Sukma">Sukma</option>
                                                                    <option value="Surguja">Surguja</option>
                                                                </optgroup>
                                                                <optgroup label="Jharkhand">
                                                                    <option value="Garhwa">Garhwa</option>
                                                                    <option value="Palamu">Palamu</option>
                                                                    <option value="Latehar">Latehar</option>
                                                                    <option value="Chatra">Chatra</option>
                                                                    <option value="Hazaribagh">Hazaribagh</option>
                                                                    <option value="Koderma">Koderma</option>
                                                                    <option value="Giridih">Giridih</option>
                                                                    <option value="Ramgarh">Ramgarh</option>
                                                                    <option value="Bokaro">Bokaro</option>
                                                                    <option value="Dhanbad">Dhanbad</option>
                                                                    <option value="Lohardaga">Lohardaga</option>
                                                                    <option value="Gumla">Gumla</option>
                                                                    <option value="Simdega">Simdega</option>
                                                                    <option value="Ranchi">Ranchi</option>
                                                                    <option value="Khunti">Khunti</option>
                                                                    <option value="West Singhbhum">West Singhbhum</option>
                                                                    <option value="Saraikela Kharsawan">Saraikela Kharsawan</option>
                                                                    <option value="East Singhbhum">East Singhbhum</option>
                                                                    <option value="Jamtara">Jamtara</option>
                                                                    <option value="Deoghar">Deoghar</option>
                                                                    <option value="Dumka">Dumka</option>
                                                                    <option value="Pakur">Pakur</option>
                                                                    <option value="Godda">Godda</option>
                                                                    <option value="Sahebganj">Sahebganj</option>
                                                                </optgroup>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>Name of the State</td>
                                                        <td>
                                                            <select name="state" class="form-control">
                                                                <option value="">--Select--</option>
                                                                <option value="Odisha">Odisha</option>
                                                                <option value="Chattisgarh">Chhattisgarh</option>
                                                                <option value="Jharkhand">Jharkhand</option>
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

                            </div>

                            <div role="tabpanel" class="well modal-content form-horizontal tab-pane fade" id="house">
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
                                                    <td><b>Ownership</b> <br> Private=1, Public=2</td>
                                                    <td><b>Quality of Drinking water</b> <br>Good=1,Average=2,Poor=3,Unhygienic=4</td>
                                                </tr>
                                                <tr>
                                                    <td>A</td>
                                                    <td>Open well</td>
                                                    <td>
                                                        <select class="form-control" name="openwell">
                                                            <option value="0">-- NA --</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="openwell2">
                                                            <option value="0">-- NA --</option>
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
                                                            <option value="0">-- NA --</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="tubewell2">
                                                            <option value="0">-- NA --</option>
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
                                                            <option value="0">-- NA --</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="piped2">
                                                            <option value="0">-- NA --</option>
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
                                                            <option value="0">-- NA --</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="ptr2">
                                                            <option value="0">-- NA --</option>
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
                                                            <option value="0">-- NA --</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="others2">
                                                            <option value="0">-- NA --</option>
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
                                        <td>
                                            <select class="form-control" name="house_type">
                                                <option>1.Mud House/hut</option>
                                                <option>2.Thached house</option>
                                                <option>3.semi pucca</option>
                                                <option>4.pucca</option>
                                                <option>5.Any other</option>
                                            </select>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><b>No.of rooms</b></td>
                                        <td>
                                            <select name="room_no" class="form-control">
                                                <option value="">--Select--</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
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

                            </div>

                            <div role="tabpanel" class="well modal-content form-horizontal tab-pane fade" id="income">
                                <fieldset>
                                    <legend>Annual Income</legend>
                                    <table class="table">
                                        <tr>
                                            <td class="col-lg-8" colspan="2"><b>147.Income source of the household</b></td>
                                            <td class="col-lg-4">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>147.1.</b> <span>Agriculture Income(Annually)</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><table class="table table-bordered">
                                                    <tr>
                                                        <th>Crops</th>
                                                        <th>Area</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Paddy</td>
                                                        <td><input type="text" class="form-control" name="" id="foc2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other cash crops</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Minor Forest Produces</td>
                                                        <td><input type="text" class="form-control" name=""></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td><b>147.2.</b> <span>Livestock Income(Annually)</span></td>
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
                                        </tr>
                                        <tr>
                                            <td colspan="3"><table class="table table-bordered">
                                                    <tr>
                                                        <th></th>
                                                        <th>Quantity</th>
                                                    </tr>
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
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="scheme[]" value="BPL"  class="form-control">BPL
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="scheme[]" value="Antodaya Annapurna Yojana"  class="form-control">Antodaya Annapurna Yojana
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="scheme[]" value="IAY"  class="form-control">IAY
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="scheme[]" value="KISSAN Credit Card"  class="form-control">KISSAN Credit Card
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="scheme[]" value="Health Card"  class="form-control">Health Card
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="scheme[]" value="Green Card"  class="form-control">Green Card
                                                </label>
                                                <label class="checkbox-inline">
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
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="account[]" value="Bank Account"  class="form-control">Bank Account
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="account[]" value="Debit/Credit Card"  class="form-control">Debit/Credit Card
                                                </label>
                                                <label class="checkbox-inline">
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
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="identification[]" value="Voter Card"  class="form-control">Voter Card
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="identification[]" value="Addhar Card"  class="form-control">Addhar Card
                                                </label>
                                                <label class="checkbox-inline">
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
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="cooking[]" value="1"  class="form-control">Electric Burner
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="cooking[]" value="2"  class="form-control">Kerosene
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="cooking[]" value="3"  class="form-control">Gas
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="cooking[]" value="4"  class="form-control">Fire wood
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="cooking[]" value="5"  class="form-control">Cowdung cake
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="cooking[]" value="6"  class="form-control">Straw
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="cooking[]" value="7"  class="form-control">Bio-gas
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="cooking[]" value="8"  class="form-control">Solar Cooker
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="cooking[]" value="others"  class="form-control"  id="cooking" onchange="showTextarea(this.id);">Others
                                                </label>
                                                <textarea class="form-control" name="" id="textarea_cooking" style="display: none;"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>149.</b> <span>What your parents use most for lighting?</span></td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="lighting[]" value="1"  class="form-control">Electric bulb/tube
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="lighting[]" value="2"  class="form-control">Kerosene
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="lighting[]" value="3"  class="form-control">Candle
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="lighting[]" value="4"  class="form-control">Solar Lantern
                                                </label>
                                                <label class="checkbox-inline">
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
                            </div>

                            <div role="tabpanel" class="well modal-content form-horizontal tab-pane fade" id="sanitation">
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
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="form-control" > Government
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="form-control" > Private 
                                                </label>
                                                <label class="checkbox-inline">     
                                                    <input type="checkbox" class="form-control" > NGO-run 
                                                </label>
                                                <label class="checkbox-inline">     
                                                    <input type="checkbox" id="ownership" onchange="showTextarea(this.id);" class="form-control" value="others" > others(specify) 
                                                </label>
                                                <label class="checkbox-inline">     
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
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="form-control" > Ayurvedic
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="form-control" > Homeopathic 
                                                </label>
                                                <label class="checkbox-inline">     
                                                    <input type="checkbox" class="form-control" > Allopathic 
                                                </label>
                                                <label class="checkbox-inline">     
                                                    <input type="checkbox" class="form-control" > Traditional 
                                                </label>
                                                <label class="checkbox-inline">     
                                                    <input type="checkbox" id="medicine" onchange="showTextarea(this.id);" class="form-control" value="others" > others(specify) 
                                                </label>
                                            </td>
                                            <td>  
                                                <textarea class="form-control" name="" id="textarea_medicine" style="display: none;"></textarea>
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
                                                            <label class="checkbox-inline">
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
                                                            <label class="checkbox-inline">
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
                                                        <td><select class="form-control" name="" id="activities" onchange="showTextarea(this.id);">
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
                                                            <textarea class="form-control" name="" id="textarea_activities" style="display: none;"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.2</b> <span> Sports and Games: </span></td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="sports[]" value="1"  class="form-control">Cricket
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="sports[]" value="2"  class="form-control">Football
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="sports[]" value="3"  class="form-control">Badminton
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="sports[]" value="4"  class="form-control">Hockey
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="sports[]" value="others"  class="form-control"  id="sports" onchange="showTextarea(this.id);">Other(Specify)
                                                            </label>
                                                            <textarea class="form-control" name="textarea_sports" id="textarea_sports" style="display: none;"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.3</b> <span> Music and Dance: </span></td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="music[]" value="1"  class="form-control">Classical
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="music[]" value="2"  class="form-control">Modern
                                                            </label>
                                                            <label class="checkbox-inline">
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
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.5</b> <span> Vocational: </span></td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="vocational[]" value="1"  class="form-control">1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="vocational[]" value="2"  class="form-control">2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="vocational[]" value="others"  class="form-control"  id="vocational" onchange="showTextarea(this.id);">Other(Specify)
                                                            </label>
                                                            <textarea class="form-control" name="textarea_vocational" id="textarea_vocational" style="display: none;"></textarea>
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
                            </div>

                            <ul class="nav nav-pills nav-justified nav-tabs-bottom" role="tablist">
                                <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab" onClick="scrolTop()">General Information</a></li>
                                <li role="presentation"><a href="#house" aria-controls="house" role="tab" data-toggle="tab" onClick="scrolTop()">Household</a></li>
                                <li role="presentation"><a href="#income" aria-controls="income" role="tab" data-toggle="tab" onClick="scrolTop()">Annual income</a></li>
                                <li role="presentation"><a href="#sanitation" aria-controls="sanitation" role="tab" data-toggle="tab" onClick="scrolTop()">Sanitaion &amp; Health</a></li>
                                <li role="presentation"><a href="#education" aria-controls="education" role="tab" data-toggle="tab" onClick="scrolTop()">Education</a></li>
                            </ul>

                        </div>

                </form>
            </div>
            <div class="clearfix" style="height:50px;"></div>
            <script type="text/javascript">
                jQuery(function($) {
                    $('[data-toggle="popover"]').popover();
                    $('[data-toggle="tooltip"]').tooltip();
                });
            </script> 

            <!-- sample templates end --> 

        </div>
    </body>
</html>
