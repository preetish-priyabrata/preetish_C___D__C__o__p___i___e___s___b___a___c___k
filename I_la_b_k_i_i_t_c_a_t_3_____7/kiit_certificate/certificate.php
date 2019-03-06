<?php
error_reporting(0);
include '../conf.php';
if(trim($_REQUEST['ref_no_dwl']," ")!="")
{
$sql = "SELECT * FROM tbl_certificate WHERE ref_no='$_REQUEST[ref_no_dwl]'";
$query = mysqli_query($con,$sql);
$row_count = mysqli_num_rows($query);
if($row_count>0)
{
$data = mysqli_fetch_array($query);
}else{
	header("location:../certificate.php?msg=error");
	}
?>
<!DOCTYPE html >
<html >
<head>
<meta charset="utf-8">
<title>KIIT CERTIFICATE</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<title>Untitled Document</title>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css">

</head>

<body onLoad="setTimeout(function () {window.print() }, 3000);">
	<center>
    	<div class="contenar">
        	<div class="header_bg">
            	<div class="logo">
                	<img src="images/logo.png">
                </div>
                <div class="logo_right">
                	CERTIFICATE OF EXCELLENCE
                </div>
            </div>
            
            <div class="inner_body">
            	<div class="heading">Center For Advanced Training</div>
                <div class="ready">I am Ready...</div>
            </div>
            <div class="clear"></div>
            <div class="inner_body">
            	<div class="name ">
                	<div class="text name_width">This is to certify that</div>
                    <div class="doted doted_width"><input name="" readonly type="text" class="text_box" value="<?php echo $data['name'];?>"></div>
                </div>
                
                <div class="rool_no ">
                	<div class="text name_width">roll no</div>
                    <div class="doted doted_width"><input name="" readonly type="text" class="text_box" value="<?php echo $data['roll_no'];?>"></div>
                </div>
                
                <div class="clear"></div>
                
                <div class=" branch">
                	<div class="text branch_width">Of Branch</div>
                    <div class="doted branch_doted_width"><input name="" readonly type="text" class="text_box" value="<?php echo $data['branch'];?>"></div>
                </div>
                
                <div class=" branch_right">
                	<div class="text "> participated and successfully completed the training program </div>
                    
                </div>
                
                 <div class="clear"></div>
                 
                 <div style="padding-top:20px;" >
                	<div class="text on_width ">on</div>
                    <div class="doted on_doted_width "><input name="" readonly type="text" class="text_box" value="<?php echo $data['course'];?>"></div>
                </div>
                
                <div class="clear"></div>
                
                
                <div class="peroid ">
                	<div class="text period_width">during the period from</div>
                    <div class="doted period_doted_width"><input name="" readonly type="text" class="text_box" value="<?php echo $data['dt_from'];?>"></div>
                </div>
                
                <div class="period_right ">
                	<div class="text on_width">to</div>
                    <div class="doted on_doted_width"><input name="" readonly type="text" class="text_box" value="<?php echo $data['dt_to'];?>"></div>
                </div>
                
            </div>
            
            <div class="clear"></div>
            <div class="footer_bg">
            	<div class="inner_body">
                    <div class="footer_part2_left">
                    
                        <div><input name="" readonly type="text" class="text_box_sign1"  ></div>
                        <div>Head CAT</div>
                    </div>
                    
                     <div class="footer_part2_middele">
                    
                        <img src="images/LogoOfKIIT.png">
                    </div>
                    
                
                    <div class="footer_part2_left">
                    
                        <div><input name="" type="text" readonly class="text_box_sign2" ></div>
                        <div>Dean T&P</div>
                    </div>
                    
                    <div class="clear"></div>
                
                    <div></div>
                </div>
                
                
                
				<div class="clear"></div>
                    <div class="ref_no">Ref. No. </div>
                    <div class="ref_no_right" style="color:#FFF;"><input name="" readonly type="text" value="<?php echo $data['ref_no'];?>" class="text_box" style="color:#FFF;"></div>                
        		</div>
                
       		</div>
    
    </center>

</body>
</html>
<?php
}
else
{
	header("location:../certificate.php?msg=success");
}
?>