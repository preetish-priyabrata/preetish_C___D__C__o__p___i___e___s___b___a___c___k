<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";


if(isset($_POST['login'])){

	// code for check server side validation
	if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){ 
	?>
    <script>
	$(document).ready(function () {
              $("#vpb_login_pop_up_box").show();
        });
    </script>
    <?php 
		$login_msg1="<span style='color:red'>The Validation code does not match!</span>";// Captcha verification is incorrect.		
	}else{// Captcha verification is Correct. Final Code Execute here!		
			
		include 'login.php';

	}
}
if(isset($_POST['submit']))
{ 
	// code for check server side validation
	if(empty($_SESSION['captcha_code1'] ) || strcasecmp($_SESSION['captcha_code1'], $_POST['captcha_code1']) != 0)
	{ 
	?>
    <script>
	$(document).ready(function () {
              $("#vpb_signup_pop_up_box").show();
        });
    </script>
    <?php  
		$signup_msg1="<span style='color:red'>The Validation code does not match!</span>";// Captcha verification is incorrect.		
	}
	else
	{// Captcha verification is Correct. Final Code Execute here!		
		include 'save_signup.php';
	}
}
//if(isset($_SESSION['si_success']) && ($_SESSION['si_success'] == 1))
//{ 
?>
<!--    <script type="text/javascript">
        alert('you have successfully signed up, your login details sent to your emailid');
    </script>-->
<?php 
//} 
//if(isset($_SESSION['si_error']) && ($_SESSION['si_error'] == 1))
//{
?>
<!--<script type="text/javascript">
        alert('your sign up was not successful , please sign up again');
    </script>-->
<?php 
//}

?>
<style type="text/css">
	#header h1 a {
  display: block;
  width: 300px;
  height: 80px;
}
</style>
<script>
            $(function () {
                $("#appdob").datepicker({
                     changeMonth: true,
                    changeYear: true,
					yearRange: "1980:2020",
					dateFormat: "yy-mm-dd" 
                });
				 
            });
        </script>
<script type='text/javascript'>
function refreshCaptcha1(){
	var img = document.images['captchaimg1'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
function refreshCaptcha2(){
	var img = document.images['captchaimg2'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
<div class="row">
<legend>
<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	About </h2></legend>
<div class="col-md-6">
<div class="col-md-6"> 
<p align="justify" style="padding:0px 20px 0px 20px">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p> 
<p align="justify" style="padding:0px 20px 0px 20px">
	<ul>
   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
   <li>Aliquam tincidunt mauris eu risus.</li>
   <li>Vestibulum auctor dapibus neque.</li>
</ul>
      
</p>
<p align="justify" style="padding:0px 20px 0px 20px">
	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing 
elit. Aenean commodo ligula eget dolor. Aenean massa. 
Cum sociis natoque penatibus et magnis dis parturient 
montes, nascetur ridiculus mus. Donec quam felis, 
ultricies nec, pellentesque eu, pretium quis, sem.</p>



<p>Lorem ipsum dolor sit amet, consectetuer adipiscing 
elit. Aenean commodo ligula eget dolor. Aenean massa. 
Cum sociis natoque penatibus et magnis dis parturient 
montes, nascetur ridiculus mus. Donec quam felis, 
ultricies nec, pellentesque eu, pretium quis, sem.</p>


</p>
<table class="data">
  <tr>
    <th>Entry Header 1</th>
    <th>Entry Header 2</th>
    <th>Entry Header 3</th>
    <th>Entry Header 4</th>
  </tr>
  <tr>
    <td>Entry First Line 1</td>
    <td>Entry First Line 2</td>
    <td>Entry First Line 3</td>
    <td>Entry First Line 4</td>
  </tr>
  <tr>
    <td>Entry Line 1</td>
    <td>Entry Line 2</td>
    <td>Entry Line 3</td>
    <td>Entry Line 4</td>
  </tr>
  <tr>
    <td>Entry Last Line 1</td>
    <td>Entry Last Line 2</td>
    <td>Entry Last Line 3</td>
    <td>Entry Last Line 4</td>
  </tr>
</table>
</div>
<div class="col-md-6"> 
<h1>HTML Ipsum Presents</h1>

<p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>

<h2>Header Level 2</h2>

<ol>
   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
   <li>Aliquam tincidunt mauris eu risus.</li>
</ol>

<blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote>

<h3>Header Level 3</h3>

<ul>
   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
   <li>Aliquam tincidunt mauris eu risus.</li>
</ul>



</div>
<!--<p align="justify" style="padding:0px 20px 0px 20px"> r rgrir jgtg  ti tjgit j jsd hjsdhdvs sjxh sdhxcsdhxhsdc sjhdh csjxcsd sh hjf hj sdh shd sd bxccjsdhcsdiuv s bdiaudeb  dvbduv dbdvbdvuduvdu dmfbsdj djhhfvbd djhf dfdfjs fjhds hdc hsd sdhjgir  goj dfkveri gjkbnwdiuu r efweei trit gdkn ir jriterti ert er  irete riter itertitjtg tjtgi dvbcvdbvb dvdv fvdv fvbsvdc  nvvv jfvjvfj fjdwi evcnjjvfv jdvhfi jfvdkvjfie jgctc fhvbue vdjvmei vdvhbv vbj   ub  djv djbj n djvnjfn jd n jd nd jdk huid udnd d dj reif rif.</p>-->
</div>
<div class="col-md-3">
<legend>View Application Status</legend>
<table class="table">
<tr>
<th>Application No:</th>
<td><input type="text" id="appno" name="appno" class="form-control" /></td>
</tr>
<tr>
<th>Date Of Birth:</th>
<td><input type="text" id="appdob" name="appdob" class="form-control" /></td>
</tr>
<tr>
<span id="error_appstatus"></span>
<td colspan="2"><input type="button" onclick="vpb_show_status();" id="view" name="view" value="Submit" class="btn-primary" /></td>
</tr>
</table>
<div id="app_status">
<legend>Application Status</legend>
<table class="table">
<tr>
<th>Your Application Is Approved</th>
</tr>
</table>
</div>
</div>

<div class="col-md-3">
<div class="wrap ">
<div class="col-md-12" style="background-color:#032; border-radius:15px; box-shadow: 0 0 10px #000; -moz-box-shadow: 0 0 10px #000; -webkit-box-shadow: 0 0 10px #000;" >

<legend style="color:#FFF;">Upcoming Exams</legend>
<marquee style="height:85px; border-radius:20px;" id="exam" onMouseOver="document.all.exam.stop()" onMouseOut="document.all.exam.start()" bgcolor="#cccccc" scrollamount="1" direction="up" loop="true">
<div style="text-align:left; margin-left:20px;">
<?php
$qry_exam="SELECT * FROM `exam_master_data` where `status`='1' ORDER BY `slno` DESC" ;
$sql_exam=mysqli_query($conn, $qry_exam);
// ORDER BY 'DESC' 
while($res_exam=mysqli_fetch_array($sql_exam))
{
?>
<script>
function vpb_show_exam<?php echo $res_exam["slno"]; ?>()
{
	$("#vpb_pop_up_background").css({
		"opacity": "0.4"
	});
	$("#vpb_pop_up_background").fadeIn("slow");
	$("#exam_<?php echo $res_exam["slno"]; ?>").fadeIn('fast');
	window.scroll(0,0);
}
</script>
<a href="javascript:void(0);" onclick="vpb_show_exam<?php echo $res_exam["slno"]; ?>();" style="color:#000"><?php echo $res_exam["examname"]; ?></a><p>
<?php
}
?>
</div>
</marquee>
<!--<marquee behavior="scroll" scrollamount="5" bgcolor="#cccccc" width="100%"><a href="javascript:void(0);" onclick="vpb_show_sio_exam();" style="color:#000">State IT officer</a>&nbsp;&nbsp;&nbsp;<a href="#" style="color:#000">Exam-2</a>&nbsp;&nbsp;&nbsp;<a href="#" style="color:#000">Exam-3</a></marquee>-->
<?php
$qry_exam="SELECT * FROM `exam_master_data` where `status`='1' ";
$sql_exam=mysqli_query($conn, $qry_exam);

while($res_exam=mysqli_fetch_array($sql_exam))
{
?>
<script>
function vpb_hide_exam<?php echo $res_exam["slno"]; ?>_popup_boxes()
{
	$("#exam_<?php echo $res_exam["slno"]; ?>").hide(); //Hides the login box when clicked outside the form
	$("#vpb_pop_up_background").fadeOut("slow");
}
</script>
<style>
#exam_<?php echo $res_exam["slno"]; ?>
{
	display:none;
	width:420px;
	border: solid 1px #000;
	background-color: #FFF;
	box-shadow: 0 0 20px #000;
	-moz-box-shadow: 0 0 20px #000;
	-webkit-box-shadow: 0 0 20px #000;
	-webkit-border-radius: 15px;-moz-border-radius: 15px;border-radius: 15px;
	padding:10px;
	padding-left:20px;
	padding-right:20px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:11px;
	top: 20%; 
	right: 30%; 
	position:fixed;
	z-index:9999999999;
}

</style>
<div id="exam_<?php echo $res_exam["slno"]; ?>">
<legend><?php echo $res_exam["examname"]; ?></legend>
<table class="table">
<tr>
<th>Starting Date For Applying :</th>
<td><?= date("d-M-Y", strtotime($res_exam['starting_date']))?></td>
</tr>
<tr>
<th>Last Date For Applying :</th>
<td><?= date("d-M-Y", strtotime($res_exam['starting_date']))?></td>
</tr>
<tr>
<th>Date Of Exam:</th>
<td><?= date("d-M-Y", strtotime($res_exam['exam_date']))?></td>
</tr>
<tr>
<th>More Information :</th>
<td><a href="uploads/exam/documents_to_submit/<?=$res_exam['file_attach']?>">click here view</a></td>
</tr>
<tr>
<td colspan="2" style="text-align:center"><button onclick="vpb_hide_exam<?php echo $res_exam["slno"]; ?>_popup_boxes()" id="close_exam" class="btn-primary">Close</button></td>
</tr>
</table>
</div>
<?php
}
?>
</div>

<div class="col-md-12" style="background-color:#032; border-radius:15px; box-shadow: 0 0 10px #000; -moz-box-shadow: 0 0 10px #000; -webkit-box-shadow: 0 0 10px #000;">
<legend style="color:#FFF;">Notice</legend>
<marquee style="height:85px; border-radius:20px;" id="notice" bgcolor="#cccccc" onMouseOver="document.all.notice.stop()" onMouseOut="document.all.notice.start()" scrollamount="1" direction="up" loop="true">
<div style="text-align:left; margin-left:20px;">
<?php
$qry="SELECT * FROM `notice_master_data` where `status`='1' ORDER BY `slno` DESC";
$sql=mysqli_query($conn, $qry);
while($res=mysqli_fetch_array($sql))
{
?>
<script>
function vpb_show_notice<?php echo $res["slno"]; ?>()
{
	$("#vpb_pop_up_background").css({
		"opacity": "0.4"
	});
	$("#vpb_pop_up_background").fadeIn("slow");
	$("#notice_<?php echo $res["slno"]; ?>").fadeIn('fast');
	window.scroll(0,0);
}
</script>
<a href="javascript:void(0);" onclick="vpb_show_notice<?php echo $res["slno"]; ?>();" style="color:#000"><?php echo $res["heading"]; ?></a><p>
<?php
}
?>
</div>
</marquee>
<!--<marquee behavior="scroll" scrollamount="5" bgcolor="#cccccc" width="100%"><a href="javascript:void(0);" onclick="vpb_show_sio_notice();" style="color:#000">State IT officer</a>&nbsp;&nbsp;&nbsp;<a href="#" style="color:#000">Notice-2</a>&nbsp;&nbsp;&nbsp;<a href="#" style="color:#000">Notice-3</a></marquee>-->
<?php
$qry="SELECT * FROM `notice_master_data` where `status`='1' ORDER BY `slno` DESC";
$sql=mysqli_query($conn, $qry);
while($res=mysqli_fetch_array($sql))
{
?>
<script>
function vpb_hide_notice<?php echo $res["slno"]; ?>_popup_boxes()
{
	$("#notice_<?php echo $res["slno"]; ?>").hide(); //Hides the login box when clicked outside the form
	$("#vpb_pop_up_background").fadeOut("slow");
}
</script>
<style>
#notice_<?php echo $res["slno"]; ?>
{
	display:none;
	width:420px;
	border: solid 1px #000;
	background-color: #FFF;
	box-shadow: 0 0 20px #000;
	-moz-box-shadow: 0 0 20px #000;
	-webkit-box-shadow: 0 0 20px #000;
	-webkit-border-radius: 15px;-moz-border-radius: 15px;border-radius: 15px;
	padding:10px;
	padding-left:20px;
	padding-right:20px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:11px;
	top: 20%; 
	right: 30%; 
	position:fixed;
	z-index:9999999999;
}

</style>
<div id="notice_<?php echo $res["slno"]; ?>">
<legend><?php echo $res["heading"]; ?></legend>
<table class="table">
<tr>
<th><?php echo $res["notice_txt"]; ?></th>
</tr>
<tr>
<th style="text-align:center"><a target="_blank" href="uploads/notices/<?php echo $res["notice_attachment"]; ?>">Download Attachment</a></th>
</tr>
<tr>
<td style="text-align:center"><button onclick="vpb_hide_notice<?php echo $res["slno"]; ?>_popup_boxes();" id="close_notice" class="btn-primary">Close</button></td>
</tr>
</table>
</div>
<?php
}
?>
</div>
</div>
</div>
</div>

<?php
$contents = ob_get_contents();
ob_clean();

include_once'template.php';
?>
<script type="text/javascript">
	function vpb_show_status() {
	 var app_no=$('#appno').val();
	 var app_dob=$('#appdob').val();
        if(app_no!=""){
        	if(app_dob!=""){ 
        		 document.getElementById("error_appstatus").innerHTML = "";        	         
                $.ajax({
                    type: "POST",
                    url: "search_appliction_verifiction.php",
                     data: {app_nos:app_no,app_dobs:app_dob},
                    success: function(result)   {
                        if(result==1){
                        	document.getElementById("error_appstatus").style.color = "green";
           					document.getElementById("error_appstatus").innerHTML = "Your Application Is Verified ";
            				return false;  
                        }else if(result==2){
                        	document.getElementById("error_appstatus").style.color = "red";
           					document.getElementById("error_appstatus").innerHTML = "Your Application Is Not Found Please Check Application No Or Date of Birth  ";
            				return false;  
                        }else if(result==3){
                        	document.getElementById("error_appstatus").style.color = "red";
           					document.getElementById("error_appstatus").innerHTML = "Your Application Is Not Submitted By You";
            				return false;  
                        }else if(result==4){
                        	document.getElementById("error_appstatus").style.color = "red";
           					document.getElementById("error_appstatus").innerHTML = "Your Application Under-Verfication";
            				return false;  
                        }else if(result==5){
                        	document.getElementById("error_appstatus").style.color = "orange";
           					document.getElementById("error_appstatus").innerHTML = "Your Application is In-adequcted Please Submit Proper Detail on Time ";
            				return false;  

                        }else if(result==6){
                        	document.getElementById("error_appstatus").style.color = "red";
           					document.getElementById("error_appstatus").innerHTML = "Your Application is Rejected ";
            				return false;
                        }else{
                        document.getElementById("error_appstatus").style.color = "red";
           				document.getElementById("error_appstatus").innerHTML = "Required Field Left Blank Please Fill And Submit";
            			return false;
                        }
                    }
                });  

            }else{
            	document.getElementById("error_appstatus").style.color = "red";
            	document.getElementById("error_appstatus").innerHTML = "Date Of Birth: Should Not Left ";
            	return false;
            }         
        }else{
        	document.getElementById("error_appstatus").style.color = "red";
            document.getElementById("error_appstatus").innerHTML = "Application No: Should Not Left ";
            return false;

        }
        
	}
</script>