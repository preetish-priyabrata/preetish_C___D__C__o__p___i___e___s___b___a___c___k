<?php
session_start();
ob_start();
if($_SESSION['alumni_tech']){
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 


	<style type="text/css">



	    body{

		    background-color:#f2f4f4;

	        }
		.table{

			width: 640px;
			height: 750px;
			
			background-color:#A8619880;
			padding: 20px;
			margin-left: 150px;
			border-radius:10px; 
		  }
		.table input[type='text']{
			width: 360px;
			height: 37px;
		  }
		.table select {
			width: 300px;
			height: 37px;
		  }
        h4{

           font-size:15px;
           margin-left: 50px;
          }    
        
    </style>




<div class="container">
 <table style="border-style: solid;border-color: #800000;" class="table table-striped">

<form method="POST" action="alumni_present_address_insert.php" enctype="multipart/form-data">
<center>
<!-- <center><h2 style="color: #4a235a ; font-family: Times New Roman, Georgia, Serif;"><strong><marquee>KISS ALUMNI DETAILS</marquee></strong></h2></center> -->

<h3 style="color:blue; font-family: Times New Roman, Georgia, Serif;"><b>ADDRESS DETAILS</b></h3>
<i><h3 style="color:blue; font-family: Times New Roman, Georgia, Serif;"><B><u>Present Address</u></B></h3></i>

</center>

<h5 style="color: red;text-align: left; margin-left: 170px;"><span style="color:red;font-size:20px">*</span> <i>Marks Fields Are Mandatory</i></h5>

<tr>
    <td><h4><b>AT <span style="color:red; font-size:18px">*</span></b></h4></td>
    <td>:</td>
    <td><input type="text" name="at" placeholder="Enter Your AT"></td>
 </tr>
 <tr>
    <td><h4><b>Post <span style="color:red; font-size:18px">*</span></b></h4></td>
    <td>:</td>
    <td><input type="text" name="post" placeholder="Enter your Post"></td>
</tr>
<tr>
	<td><h4><b>Via </b><span style="color:red; font-size:18px">*</span></h4></td>
	<td>:</td>
	<td><input type="text" name="via" placeholder="Enter your via"></td>
</tr>
<tr>
   <td><h4><b>Police Station  <span style="color:red; font-size:18px">*</span></b></h4></td>
   <td>:</td>
   <td><input type="text" name="PS" placeholder="Enter your Police Station"></td>
</tr>
<tr>
   <td><h4><b>City  <span style="color:red; font-size:18px">*</span></b></h4></td>
   <td>:</td>
   <td><input type="text" name="city" placeholder="Enter your City"></td>
</tr>
<tr>
   <td><h4><b>District <span style="color:red; font-size:18px">*</span></b></h4></td>
   <td>:</td>
   <td><input type="text" name="District" placeholder="Enter your District"></td>
</tr>
<tr>
   <td><h4><b>Pin <span style="color:red; font-size:18px">*</span></b></h4></td>
   <td>:</td>
   <td><input type="text" name="pin" placeholder="Enter your Pin"></td>
</tr>
<tr>
  <td><h4><b>State<span style="color:red; font-size:18px">*</span></b></h4></td>
    <td>:</td>
    <td><select name="State">
      <option value="Select your State">Select Your State..</option>
      <option value="Odisha"> Odisha</option>
      <option value="Tamilnadu">Tamilnadu</option>
      <option value="Bihar">Bihar</option>
      <option value="West Bengal">West Bengal</option>
      <option value="Karnatak">Karnatak</option>
      <option value="Kolkata"> Kolkata</option>
      <option value="Kerla">Kerla</option>
      <option value="Uttarakhand">Uttarakhand</option>
      <option value="Jammu & Kasmir">Jammu & Kasmir</option>
      <option value="Himachal Pradesh"> Himachal Pradesh</option>
      <option value="Madhya pradesh">Madhya pradesh</option>
      <option value="Arunachal Pradesh">Arunachal Pradesh</option>
      <option value="Assam">Assam</option>
      <option value="Sikkim">Sikkim</option>
      <option value="Uttaranchal"> Uttaranchal</option>
      <option value="Tripura">Tripura</option>
      <option value="Nagaland">Nagaland</option>
      <option value="Mizoram">Mizoram</option>
      <option value="Meghalaya">Meghalaya</option>
    
      <option value="Andra Pradesh">Andra Pradesh</option>
      <option value="Chhattisgarh">Chhattisgarh</option>
      <option value="Goa">Goa</option>
      <option value="Gujarat">Gujarat</option>
      <option value="Jharkhand">Jharkhand</option>
      <option value="Maharashtra">Maharashtra</option>
      <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
      <option value="Chandigarh">Chandigarh</option>
      <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
      <option value="Daman and Diu">Daman and Diu</option>
      <option value="Delhi">Delhi</option>
      <option value="Lakshadeep">Lakshadeep</option>
      <option value="Pondicherry">Pondicherry</option>
 
    </select></td>
</tr>
<tr>
	<td><h4><b>Zone </b><span style=" font-size:12px">(East/West/North/South/Central)</span></h4></td>
    <td>:</td>
   <td><input type="text" name="zone" placeholder="Enter Your Zone"></td>
</tr>

<tr>
	<td><h4><b>Country<span style="color:red; font-size:18px">*</span></b></h4></td>
    <td>:</td>
    <td><input type="text" name="country" placeholder="Enter Your Country"></td>
</tr>
<tr>
	<td><h4><b>Land Phone No</b></h4></td>
    <td>:</td>
    <td><input type="text" name="Landline" placeholder="Enter Landline No"></td>
</tr>


<tr>
<td colspan="2">
<a href="alumni_family_profile.php"><input type="button" name="Back" value="Back"/></a></td>
<td style="text-align: right;">
<input type="submit" name="submit" value="Save"/>
<a href="alumni_permanent_address.php"><input type= "button" value="Next"></a>
</td>
</tr>
</form>
</table>
</div>
 </section>
    <!-- /.content -->
  </div>


<?php

}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>











