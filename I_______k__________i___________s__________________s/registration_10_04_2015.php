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
            function showTextarea(str) {
                var value = document.getElementById(str).value;
                if (value == 'others') {
                    if (document.getElementById('textarea_' + str).style.display == 'none') {
                        document.getElementById('textarea_' + str).style.display = 'block';
                    } else {
                        document.getElementById('textarea_' + str).style.display = 'none';
                    }
                }

            }

            function showTextBox(distance) {
                var dist = document.getElementById(distance).value;
                if (dist == 4 || dist == 5 || dist == 'others' || dist == 'pg') {
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

            function autoSelectDistState(val)
            {
                //alert(val);
                if (val == "Cuttack Sadar" || val == "Baranga" || val == "Niali" || val == "Kantapada" || val == "Salipur" || val == "Nischintakoili" || val == "Tangi-Chowdwar" || val == "Mahanga" || val == "Athgarh" || val == "Baramba" || val == "Narasinghpur" || val == "Tigiria" || val == "Banki" || val == "Dampara")
                {
                    document.getElementById("district").value = "Cuttack";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Jajpur" || val == "Dasarathpur" || val == "Sukinda" || val == "Korei" || val == "Binjharpur" || val == "Dharmasala" || val == "Bari" || val == "Badachana" || val == "Dangadi" || val == "Rasulpur")
                {
                    document.getElementById("district").value = "Jajpur";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Jagatsinghpur" || val == "Raghunathpur" || val == "Biridi-F" || val == "Kujang" || val == "Erasma" || val == "Tirtol" || val == "Balikuda" || val == "Nuagaon")
                {
                    document.getElementById("district").value = "Jagatsinghpur";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Aul" || val == "Rajkanika" || val == "Kendrapara" || val == "Derabis" || val == "Marsaghai" || val == "Garadpur" || val == "Pattamundai" || val == "Rajnagar" || val == "Mahakalapada")
                {
                    document.getElementById("district").value = "Kendrapara";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Balasore" || val == "Remuna" || val == "Basta" || val == "Jaleswar" || val == "Bhograi" || val == "Soro" || val == "Simulia" || val == "Khaira" || val == "Baliapal" || val == "Bahanaga" || val == "Nilgiri" || val == "Oupada")
                {
                    document.getElementById("district").value = "Balasore";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Bhadrak" || val == "Chandabali" || val == "Dhamnagar" || val == "Bhandari pokhari" || val == "Basudevpur" || val == "Banth" || val == "Tihidi")
                {
                    document.getElementById("district").value = "Bhadrak";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Krushna- prasad" || val == "Nimapara" || val == "Gop" || val == "Pipili" || val == "Delang" || val == "Puri Sadar" || val == "Kanas" || val == "Kakatpur" || val == "Astarang" || val == "Satyabadi" || val == "Brahmagiri")
                {
                    document.getElementById("district").value = "Puri";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Bhubaneswar" || val == "Balianta" || val == "Balipatna" || val == "Jatni" || val == "Khurda" || val == "Banpur" || val == "Chilika" || val == "Bolgarh" || val == "Begunia" || val == "Tangi")
                {
                    document.getElementById("district").value = "Khurda";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Daspalla" || val == "Gania" || val == "Khandapada" || val == "Bhapur" || val == "Nayagarh" || val == "Odagaon" || val == "Nuagaon" || val == "Ranpur")
                {
                    document.getElementById("district").value = "Nayagarh";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Rairangpur" || val == "Bahalda" || val == "Bijatala" || val == "Bisoi" || val == "Jamda" || val == "Kusumi" || val == "Tiring" || val == "Baripada" || val == "Sarasakana" || val == "Betnoti" || val == "Rasgovindpur" || val == "Bodasahi" || val == "Bangiriposi" || val == "Kuliana" || val == "Morada" || val == "Samakhunta" || val == "Suliapada" || val == "Udala" || val == "Gopabandhunagar" || val == "Kaptipada" || val == "Khunta" || val == "Karanjia" || val == "Jasipur" || val == "Raruan" || val == "Thakurmunda" || val == "Sukruli")
                {
                    document.getElementById("district").value = "Mayurbhanj";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Dhenkanal Sadar" || val == "Gondia" || val == "Odapada" || val == "Hindol" || val == "Kamakhyanagar" || val == "Bhuban" || val == "Parjang" || val == "Kankadahad")
                {
                    document.getElementById("district").value = "Dhenkanal";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Angul" || val == "Banarpal" || val == "Chhendipada" || val == "Talcher" || val == "Kaniha" || val == "Athmallik" || val == "Kishorenagar" || val == "Pallahara")
                {
                    document.getElementById("district").value = "Angul";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Bolangir" || val == "Gudvella" || val == "Loisinga" || val == "Agalpur" || val == "Deogaon" || val == "Puintala" || val == "Patnagarh" || val == "Khaparakhol" || val == "Belpara" || val == "Titilagarh" || val == "Tureikela" || val == "Bongamunda" || val == "Muribahal" || val == "Saintala")
                {
                    document.getElementById("district").value = "Bolangir";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Sonepur" || val == "Tarva" || val == "Dunguripalli" || val == "Binika" || val == "Biramaharajpur" || val == "Ullunda")
                {
                    document.getElementById("district").value = "Subarnapur";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Dhankhanda" || val == "Rengali" || val == "Jujumura" || val == "Maneswar" || val == "Rairakhol" || val == "Naktideul" || val == "Kuchinda" || val == "Bamra" || val == "Jamankira")
                {
                    document.getElementById("district").value = "Sambalpur";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Bargarh" || val == "Attabira" || val == "Bheden" || val == "Barpalli" || val == "Bhatli" || val == "Ambabhana" || val == "Rajborasambar" || val == "Gaisilet" || val == "Paikmal" || val == "Sohela" || val == "Bijepur" || val == "Jharabandha")
                {
                    document.getElementById("district").value = "Bargarh";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Anadapur" || val == "Hatadihi" || val == "Ghasipur" || val == "Joda" || val == "Champua" || val == "Jhumpura" || val == "Telkoi" || val == "Keonjhar Sadar" || val == "Ghatgaon" || val == "Harichandanpur" || val == "Patna" || val == "Banspal" || val == "Saharpada")
                {
                    document.getElementById("district").value = "Keonjhar";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Kuarmunda" || val == "Nuagaon" || val == "Bisra" || val == "Lathikata" || val == "Hemgiri" || val == "Rajgangpur" || val == "Sundargarh" || val == "Subdega" || val == "Lafripada" || val == "Tangarpalli " || val == "Balisankara " || val == "Bargaon" || val == "Kutra" || val == "Bonaigarh" || val == "Koira " || val == "Gurundia " || val == "Lahunipada")
                {
                    document.getElementById("district").value = "Sundargarh";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Jharsuguda" || val == "Laikera" || val == "Lakhanpur" || val == "Kolabira" || val == "Kirimira")
                {
                    document.getElementById("district").value = "Jharsuguda";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Tileibani" || val == "Riamal" || val == "Barkote")
                {
                    document.getElementById("district").value = "Deogarh";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Bhawanipatna" || val == "Lanjigarh" || val == "ThumalRampur" || val == "Kesinga" || val == "M.Rampur" || val == "Karlamunda" || val == "Narla" || val == "Dharmagarh" || val == "Junagarh" || val == "Jaipatna" || val == "Koksara" || val == "Golamunda" || val == "Kalampur")
                {
                    document.getElementById("district").value = "Kalahandi";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Nawapara" || val == "Komna" || val == "Khariar" || val == "Boden" || val == "Sinapalli")
                {
                    document.getElementById("district").value = "Nuapada";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Rangeilunda" || val == "Chikiti" || val == "Digapahandi" || val == "Kukudakhandi" || val == "Patrapur" || val == "Sankhemundi" || val == "Chhatrapur" || val == "Kodala" || val == "Khalikote" || val == "Purusottampur" || val == "Hinjilicut" || val == "Ganjam" || val == "K.S.Nagar" || val == "Polsara" || val == "Aska" || val == "Bhanjanagar" || val == "Buguda" || val == "Surada" || val == "Seragad" || val == "Belguntha" || val == "Dharakote" || val == "Jagannathprasad")
                {
                    document.getElementById("district").value = "Ganjam";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Paralakhemundi" || val == "Rayagada" || val == "R.Udayagiri" || val == "Mohana" || val == "Kasinagar" || val == "Gumma" || val == "Nuagad")
                {
                    document.getElementById("district").value = "Gajapati";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Koraput" || val == "Dasmantpur" || val == "Laxmipur" || val == "Pottangi" || val == "Lamtaput" || val == "Nandapur" || val == "Narayanpatna" || val == "Bandhugaon" || val == "Similiguda" || val == "Bariguma" || val == "Jeypore" || val == "Kotpada" || val == "Boipariguda" || val == "Kundara")
                {
                    document.getElementById("district").value = "Koraput";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Malkangiri" || val == "Mathili" || val == "Podia" || val == "Korkunda" || val == "Kalimela" || val == "Khairaput" || val == "Kudumuluguma")
                {
                    document.getElementById("district").value = "Malkanagiri";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Kasipur" || val == "Rayagada" || val == "K.Singpur" || val == "Kolnara" || val == "Bisam-Cuttack" || val == "Gunupur" || val == "Gudari" || val == "Chandrapur" || val == "Muniguda" || val == "Padmapur" || val == "Ramanguda")
                {
                    document.getElementById("district").value = "Rayagada";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Nawrangpur" || val == "Umerkote" || val == "Raighar" || val == "Kosagumuda" || val == "Dabugaon" || val == "Jharigam" || val == "Chandahandi" || val == "Nandahandi" || val == "Papadahandi" || val == "Tentulikhunti")
                {
                    document.getElementById("district").value = "Nawrangpur";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Balliguda" || val == "G.Udayagiri" || val == "Daringibadi" || val == "Chakpad" || val == "Kotgarh" || val == "Nuagaon" || val == "Tikabali" || val == "Tumudibandh" || val == "Raikia" || val == "Phulbani" || val == "Khajuripada" || val == "Phiringia")
                {
                    document.getElementById("district").value = "Kandhamal";
                    document.getElementById("state").value = "Odisha";
                }
                else if (val == "Boudh" || val == "Kantamal" || val == "Harabhanga")
                {
                    document.getElementById("district").value = "Boudh";
                    document.getElementById("state").value = "Odisha";
                } else {
                }
            }

            function showValue(radioVal) {
                if (radioVal == 'Tailoring') {
                    document.getElementById('tailoring').style.display = 'block';
                }
                else {
                    document.getElementById('tailoring').style.display = 'none';
                }
                if (radioVal == 'Chemical Products') {
                    document.getElementById('chemical').style.display = 'block';
                }
                else {
                    document.getElementById('chemical').style.display = 'none';
                }
                if (radioVal == 'Knitting') {
                    document.getElementById('knitting').style.display = 'block';
                }
                else {
                    document.getElementById('knitting').style.display = 'none';
                }
                if (radioVal == 'Applique') {
                    document.getElementById('applique').style.display = 'block';
                }
                else {
                    document.getElementById('applique').style.display = 'none';
                }
                if (radioVal == 'Art_Craft') {
                    document.getElementById('art_craft').style.display = 'block';
                }
                else {
                    document.getElementById('art_craft').style.display = 'none';
                }
            }

            function showTribeTypes(tribe_value) {
                if (tribe_value == 'scheduled') {
                    document.getElementById('sch_tribes').style.display = 'block';
                    document.getElementById('prm_tribes').style.display = 'none';
                }
                else if (tribe_value == 'primitive') {
                    document.getElementById('prm_tribes').style.display = 'block';
                    document.getElementById('sch_tribes').style.display = 'none';
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
                        <h1 id="forms">Registration Form <span class="pull-right">
                                <span class="pull-right">
                                    <a href="report.php" class="btn btn-primary">Go to reports</a>
                                    &nbsp;
                                    <a href="logout.php" class="btn btn-primary">Logout</a>
                                </span>
                            </span>
                        </h1>
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
                                            <td>Year you joined</td>
                                            <td>
                                                <select class="form-control" name="yoj">
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
                                                </select>
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Class you joined</td>
                                            <td>
                                                <select name="coj" class="form-control">
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
                                                </select>
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
                                                <select class="form-control" name="standard" id = "standard" onchange="showTextBox('standard')">
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
                                            </td>
                                            <td><input type="text" name="pg_stream" id="distance" class="form-control" style="display: none;" placeholder="PG Specialization"></td>
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
                                                                </optgroup>
                                                                <optgroup label="Bhadrak">
                                                                    <option value="Bhadrak">Bhadrak</option>
                                                                    <option value="Chandabali">Chandabali</option>
                                                                    <option value="Dhamnagar">Dhamnagar</option>
                                                                    <option value="Bhandari pokhari">Bhandari pokhari</option>
                                                                    <option value="Basudevpur">Basudevpur</option>
                                                                    <option value="Banth">Banth</option>
                                                                    <option value="Tihidi">Tihidi</option>
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
                                                                </optgroup>
                                                                <optgroup label="Subarnapur">
                                                                    <option value="Sonepur">Sonepur</option>
                                                                    <option value="Tarva">Tarva</option>
                                                                    <option value="Dunguripalli">Dunguripalli</option>
                                                                    <option value="Binika">Binika</option>
                                                                    <option value="Biramaharajpur">Biramaharajpur</option>
                                                                    <option value="Ullunda">Ullunda</option>
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
                                                                </optgroup>
                                                                <optgroup label="Sundargarh">
                                                                    <option value="Kuarmunda">Kuarmunda</option>
                                                                    <option value="Nuagaon">Nuagaon</option>
                                                                    <option value="Bisra">Bisra</option>
                                                                    <option value="Lathikata">Lathikata</option>
                                                                    <option value="Hemgiri">Hemgiri</option>
                                                                    <option value="Rajgangpur">Rajgangpur</option>
                                                                    <option value="Sundargarh">Sundargarh</option>
                                                                    <option value="Subdega">Subdega</option>
                                                                    <option value="Lafripada">Lafripada</option>
                                                                    <option value="Harichandanpur">Tangarpalli </option>
                                                                    <option value="Balisankara ">Balisankara  </option>
                                                                    <option value="Bargaon">Bargaon</option>
                                                                    <option value="Kutra">Kutra</option>
                                                                    <option value="Bonaigarh">Bonaigarh</option>
                                                                    <option value="Koira ">Koira </option>
                                                                    <option value="Gurundia ">Gurundia </option>
                                                                    <option value="Lahunipada">Lahunipada</option>
                                                                </optgroup>
                                                                <optgroup label="Jharsuguda">
                                                                    <option value="Jharsuguda">Jharsuguda</option>
                                                                    <option value="Laikera">Laikera</option>
                                                                    <option value="Lakhanpur">Lakhanpur</option>
                                                                    <option value="Kolabira">Kolabira</option>
                                                                    <option value="Kirimira">Kirimira</option>
                                                                </optgroup>
                                                                <optgroup label="Deogarh">
                                                                    <option value="Tileibani">Tileibani</option>
                                                                    <option value="Riamal">Riamal</option>
                                                                    <option value="Barkote">Barkote</option>
                                                                </optgroup>
                                                                <optgroup label="Kalahandi">
                                                                    <option value="Bhawanipatna">Bhawanipatna</option>
                                                                    <option value="Lanjigarh">Lanjigarh</option>
                                                                    <option value="ThumalRampur">ThumalRampur</option>
                                                                    <option value="Kesinga">Kesinga</option>
                                                                    <option value="M.Rampur">M.Rampur</option>
                                                                    <option value="Karlamunda">Karlamunda</option>
                                                                    <option value="Narla">Narla</option>
                                                                    <option value="Dharmagarh">Dharmagarh</option>
                                                                    <option value="Junagarh">Junagarh</option>
                                                                    <option value="Jaipatna">Jaipatna </option>
                                                                    <option value="Koksara">Koksara</option>
                                                                    <option value="Golamunda">Golamunda</option>
                                                                    <option value="Kalampur">Kalampur</option>
                                                                </optgroup>
                                                                <optgroup label="Nuapada">
                                                                    <option value="Nawapara">Nawapara</option>
                                                                    <option value="Komna">Komna</option>
                                                                    <option value="Khariar">Khariar</option>
                                                                    <option value="Boden">Boden</option>
                                                                    <option value="Sinapalli">Sinapalli</option>
                                                                </optgroup>
                                                                <optgroup label="Ganjam">
                                                                    <option value="Rangeilunda">Rangeilunda</option>
                                                                    <option value="Chikiti">Chikiti</option>
                                                                    <option value="Digapahandi">Digapahandi</option>
                                                                    <option value="Kukudakhandi">Kukudakhandi</option>
                                                                    <option value="Patrapur">Patrapur</option>
                                                                    <option value="Sankhemundi">Sankhemundi</option>
                                                                    <option value="Chhatrapur">Chhatrapur</option>
                                                                    <option value="Kodala">Kodala</option>
                                                                    <option value="Khalikote">Khalikote</option>
                                                                    <option value="Purusottampur">Purusottampur</option>
                                                                    <option value="Hinjilicut">Hinjilicut</option>
                                                                    <option value="Ganjam">Ganjam</option>
                                                                    <option value="K.S.Nagar">K.S.Nagar</option>
                                                                    <option value="Polsara">Polsara</option>
                                                                    <option value="Aska">Aska</option>
                                                                    <option value="Bhanjanagar">Bhanjanagar</option>
                                                                    <option value="Buguda">Buguda</option>
                                                                    <option value="Surada">Surada</option>
                                                                    <option value="Seragad">Seragad</option>
                                                                    <option value="Belguntha">Belguntha</option>
                                                                    <option value="Dharakote">Dharakote</option>
                                                                    <option value="Jagannathprasad">Jagannathprasad</option>
                                                                </optgroup>
                                                                <optgroup label="Gajapati">
                                                                    <option value="Paralakhemundi">Paralakhemundi</option>
                                                                    <option value="Rayagada">Rayagada</option>
                                                                    <option value="R.Udayagiri">R.Udayagiri</option>
                                                                    <option value="Mohana">Mohana</option>
                                                                    <option value="Kasinagar">Kasinagar</option>
                                                                    <option value="Gumma">Gumma</option>
                                                                    <option value="Nuagad">Nuagad</option>
                                                                </optgroup>
                                                                <optgroup label="Koraput">
                                                                    <option value="Koraput">Koraput</option>
                                                                    <option value="Dasmantpur">Dasmantpur</option>
                                                                    <option value="Laxmipur">Laxmipur</option>
                                                                    <option value="Pottangi">Pottangi</option>
                                                                    <option value="Lamtaput">Lamtaput</option>
                                                                    <option value="Nandapur">Nandapur</option>
                                                                    <option value="Narayanpatna">Narayanpatna</option>
                                                                    <option value="Bandhugaon">Bandhugaon</option>
                                                                    <option value="Similiguda">Similiguda</option>
                                                                    <option value="Bariguma">Bariguma</option>
                                                                    <option value="Jeypore">Jeypore</option>
                                                                    <option value="Kotpada">Kotpada</option>
                                                                    <option value="Boipariguda">Boipariguda</option>
                                                                    <option value="Kundara">Kundara</option>
                                                                </optgroup>
                                                                <optgroup label="Malkanagiri">
                                                                    <option value="Malkangiri">Malkangiri</option>
                                                                    <option value="Mathili">Mathili</option>
                                                                    <option value="Podia">Podia</option>
                                                                    <option value="Korkunda">Korkunda</option>
                                                                    <option value="Kalimela">Kalimela</option>
                                                                    <option value="Khairaput">Khairaput</option>
                                                                    <option value="Kudumuluguma">Kudumuluguma</option>
                                                                </optgroup>
                                                                <optgroup label="Rayagada">
                                                                    <option value="Kasipur">Kasipur</option>
                                                                    <option value="Rayagada">Rayagada</option>
                                                                    <option value="K.Singpur">K.Singpur</option>
                                                                    <option value="Kolnara">Kolnara</option>
                                                                    <option value="Bisam-Cuttack">Bisam-Cuttack</option>
                                                                    <option value="Gunupur">Gunupur</option>
                                                                    <option value="Gudari">Gudari</option>
                                                                    <option value="Chandrapur">Chandrapur</option>
                                                                    <option value="Muniguda">Muniguda</option>
                                                                    <option value="Padmapur">Padmapur</option>
                                                                    <option value="Ramanguda">Ramanguda</option>
                                                                </optgroup>
                                                                <optgroup label="Nawrangpur">
                                                                    <option value="Nawrangpur">Nawrangpur</option>
                                                                    <option value="Umerkote">Umerkote</option>
                                                                    <option value="Raighar">Raighar</option>
                                                                    <option value="Kosagumuda">Kosagumuda</option>
                                                                    <option value="Dabugaon">Dabugaon</option>
                                                                    <option value="Jharigam">Jharigam</option>
                                                                    <option value="Chandahandi">Chandahandi</option>
                                                                    <option value="Nandahandi">Nandahandi</option>
                                                                    <option value="Papadahandi">Papadahandi</option>
                                                                    <option value="Tentulikhunti">Tentulikhunti</option>
                                                                </optgroup>
                                                                <optgroup label="Kandhamal">
                                                                    <option value="Nawrangpur">Balliguda</option>
                                                                    <option value="G.Udayagiri">G.Udayagiri</option>
                                                                    <option value="Daringibadi">Daringibadi</option>
                                                                    <option value="Chakpad">Chakpad</option>
                                                                    <option value="Kotgarh">Kotgarh</option>
                                                                    <option value="Nuagaon">Nuagaon</option>
                                                                    <option value="Tikabali">Tikabali</option>
                                                                    <option value="Tumudibandh">Tumudibandh</option>
                                                                    <option value="Raikia">Raikia</option>
                                                                    <option value="Phulbani">Phulbani</option>
                                                                    <option value="Khajuripada">Khajuripada</option>
                                                                    <option value="Phiringia">Phiringia</option>
                                                                </optgroup>
                                                                <optgroup label="Boudh">
                                                                    <option value="Boudh">Boudh</option>
                                                                    <option value="Kantamal">Kantamal</option>
                                                                    <option value="Harabhanga">Harabhanga</option>
                                                                </optgroup>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Name of the District</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="district" id="txt_district" style="display:none">
                                                            <select class="form-control" name="district" id="district" >
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
                                                                    <option value="Sundargarh">Sundargarh</option>
                                                                    <option value="Jharsuguda">Jharsuguda</option>
                                                                    <option value="Deogarh">Deogarh</option>
                                                                    <option value="Kalahandi">Kalahandi</option>
                                                                    <option value="Nuapada">Nuapada</option>
                                                                    <option value="Ganjam">Ganjam</option>
                                                                    <option value="Gajapati">Gajapati</option>
                                                                    <option value="Koraput">Koraput</option>
                                                                    <option value="Malkanagiri">Malkanagiri</option>
                                                                    <option value="Rayagada">Rayagada</option>
                                                                    <option value="Nawrangpur">Nawrangpur</option>
                                                                    <option value="Kandhamal">Kandhamal</option>
                                                                    <option value="Boudh">Boudh</option>
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
                                                                <option value="Assam">Assam</option>
                                                                <option value="Mizoram">Mizoram</option>
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

                                                <input type="radio" name="tribe" value="scheduled" onchange="showTribeTypes(this.value);" style="margin-left: 1%;margin-right: 2%;">Scheduled Tribes 
                                                <input type="radio" name="tribe" value="primitive" onchange="showTribeTypes(this.value);" style="margin-left: 7%;margin-right: 2%;">Primitive Tribes
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <select name="sch_tribes" id="sch_tribes" class="form-control" style="display: none;">
                                                    <option value="">--Select Scheduled Tribe--</option>
                                                    <?php
                                                    $scheduledTribes = array('Bagata', 'Baiga', 'Banjara', 'Bathudi', 'Bhottada', 'Bhuiyan', 'Bhumia', 'Bhumij', 'Bhunjia', 'Binjhal', 'Binjhia', 'Birhor', 'Bondo', 'Chenchu', 'Dal', 'Desua Bhumij', 'Dharua', 'Didayi', 'Gadaba', 'Gandia', 'Ghara', 'Gond', 'Ho', 'Holva', 'Jatapu', 'Juanga', 'Kandha', 'Kawar', 'Kharia', 'Kharwar', 'Khond', 'Kissan', 'Kol', 'Kolah', 'Koli', 'Kondadora', 'Kora', 'Korua', 'Kotia', 'Koya', 'Kulis', 'Lodha', 'Madia', 'Mahali', 'Mankidi', 'Mankidia', 'Mataya', 'Mirdha', 'Munda', 'Mundari', 'Omanatya', 'Oraon', 'Parenga', 'Poroja', 'Pentia', 'Rajuar', 'Santal', 'Saora', 'Shabar', 'Souti', 'Tharua');
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
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dialect you speak</td>
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
                                            <td>Whether the student belongs to differently-able category?</td>
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
                                                                <td>B. Secondary <br> <input class="form-control" type="text" name="erning_secondary"></td>
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
                                                            <table style="max-width: none;width: 155%;">
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
                                                                        <textarea class="form-control" name="textarea_sports" id="textarea_sports" style="display: none;"></textarea>

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
                                                        <td><b>163.3</b> <span> Music </span></td>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px;margin-left:10px">
                                                                <input type="checkbox" name="music[]" value="Light vocal"  class="form-control">Light vocal
                                                            </label>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" name="music[]" value="Odissi vocal"  class="form-control">Odissi vocal
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
                                                                <input type="checkbox" name="dance[]" value="Odissi"  class="form-control">Odissi
                                                            </label>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" name="dance[]" value="Modern"  class="form-control">Modern
                                                            </label>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" name="dance[]" value="Semi Classical"  class="form-control">Semi Classical
                                                            </label>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" name="dance[]" value="others"  class="form-control"  id="dance" onchange="showTextarea(this.id);">Other(Specify)
                                                            </label>
                                                            <textarea class="form-control" name="textarea_dance" id="textarea_dance" style="display: none;"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span> Instrumental </span></td>
                                                        <td>
                                                            <label class="checkbox-inline" style="width:204px;margin-left:10px">
                                                                <input type="checkbox" name="instrumental[]" value="Guitar"  class="form-control">Guitar
                                                            </label>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" name="instrumental[]" value="Drums"  class="form-control">Drums (Pad)
                                                            </label>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" name="instrumental[]" value="Keyboard"  class="form-control">Keyboard
                                                            </label>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" name="instrumental[]" value="Tabla"  class="form-control">Tabla
                                                            </label>
                                                            <label class="checkbox-inline" style="width:204px">
                                                                <input type="checkbox" name="instrumental[]" value="others"  class="form-control"  id="instrumental" onchange="showTextarea(this.id);">Other(Specify)
                                                            </label>
                                                            <textarea class="form-control" name="textarea_instrumental" id="textarea_instrumental" style="display: none;" onchange="showValue(this.value);"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.4</b> <span> Yoga and Meditation: </span></td>
                                                        <td>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="yoga[]" value="Yoga"  class="form-control">Yoga
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="yoga[]" value="Meditation"  class="form-control">Meditation
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="yoga[]" value="others"  class="form-control"  id="yoga" onchange="showTextarea(this.id);">Other(Specify)
                                                            </label>
                                                            <textarea class="form-control" name="textarea_yoga" id="textarea_yoga" style="display: none;" onchange="showValue(this.value);"></textarea>
                                                        </td>
<!--                                                        <td>
                                                            <span style="color: red;">(To be provided.)</span>
                                                        </td>-->
                                                    </tr>
                                                    <tr>
                                                        <td><b>163.5</b> <span> Vocational: </span></td>

<!--                                                    <tr>
     <td colspan="2" style="padding-left: 3%;">
         <input type="radio" name="vocational" value="Tailoring" onchange="showValue(this.value);" style="margin-left: 3%;">Tailoring
         <input type="radio" name="vocational" value="Chemical" onchange="showValue(this.value);" style="margin-left: 3%;">Chemical
         <input type="radio" name="vocational" value="Knitting" onchange="showValue(this.value);" style="margin-left: 3%;">Knitting
         <input type="radio" name="vocational" value="Applique" onchange="showValue(this.value);" style="margin-left: 3%;">Applique
         <input type="radio" name="vocational" value="Art_Craft" onchange="showValue(this.value);" style="margin-left: 3%;">Art &amp; Craft

     </td>
 </tr>-->

                                                        <td>
                                                            <select class="form-control" name="vocational" id="vocational" onchange="showValue(this.value);">
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
                                                        </td>
                                                    </tr>
                                                    <tr>
<!--                                                        <td style="padding-left: 5%;width: 25%;">
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
                                                        </td>-->
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
                                                                <option value="Shy">Shy</option>
                                                                <option value="Smart">Smart</option>
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

                    </div>
                </form>
            </div>
            <div class="clearfix" style="height:50px;"></div>
            <script type="text/javascript">
                jQuery(function ($) {
                    $('[data-toggle="popover"]').popover();
                    $('[data-toggle="tooltip"]').tooltip();
                }
                );
            </script> 

            <!-- sample templates end --> 

        </div>
    </body>
</html>