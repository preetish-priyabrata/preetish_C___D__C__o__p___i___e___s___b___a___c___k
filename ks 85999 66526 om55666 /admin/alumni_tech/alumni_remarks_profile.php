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

		    background-color:#2D925966;

	        }
		textarea{

			width: 640px;
			height: 400px;
			
			background-color:#A8619880;
			padding: 20px;
			margin-left: 150px;
			border-radius:7px; 
		  }

    </style>




<div class="container">
<b>Remarks (If any)</b> :<br>
   <textarea name="adr" ></textarea>
  <br>


<center>
<a href="alumni_permanent_address.php"><input type="button" name="Back" value="Back"/></a></td>
<td style="text-align: right;">
<input type="submit" name="submit" value="Save"/>
<input type= "submit" name="submit" value="Submit"></a>
</td>
</center>
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