<?php

session_start();
ob_start();
 echo $ip=$_SERVER['REMOTE_ADDR'];
$base="http://".$ip."/lnt_rev1/admin";
// echo $base1 = __DIR__ ;
// $base=str_replace("/admin_headquater","",$base1);

// echo $_SERVER['DOCUMENT_ROOT'];
if($_SESSION['admin_hq']){
require 'FlashMessages.php';
include  '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Head Quarter view Site Requsition Received Detail ";
$location=$_SESSION['hq_store_id'];

 $slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name']));
 $challan=web_decryptIt(str_replace(" ", "+", $_GET['Token_id'])); // 
 $status=web_decryptIt(str_replace(" ", "+", $_GET['access']));
 
// unset($_GET);
$check="SELECT * FROM `lt_master_hq_challan_generate` where `hqcg_challan_no`='$challan' and `hqcg_receive_status`='0' and  `hqcg_hq_location_id`='$location' ";
$sql_exe=mysqli_query($conn,$check);
$num=mysqli_num_rows($sql_exe);
if($num!='0'){
}
$fetch_check=mysqli_fetch_assoc($sql_exe);
//$zonal_code=$fetch_check['zmr_site_from_location_id'];
?>
<link rel="stylesheet" href="<?=$base?>/asserts/print.css" />
<style type="text/css">

.panel-body p {
    margin-top: 10px;
}
.form-control[disabled], .form-control[readonly] {
    color: #000809;
}
</style>
<link rel="stylesheet" type="text/css" href="../asserts/print.css" />
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Challan Detail</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>								
				<li class="active">Print Challan Information to Site</li>
			</ul>
		</div>
	</div>
    <!-- /Page Header-->
	<div class="container-fluid page-content">
		<div class="row">
			<?php $msg->display(); ?>
			
			<div class="col-md-12 col-sm-12">
				<div class="panel panel-default">
				<div  id="printarea" class="container-fluid">
 			<div class="section-to-print"> 				
			  <!-- Basic inputs -->
			 
 						 	<div class="Deposit3 text-center">
 						 		<h4>Orginal Copy</h4>
 						 	</div>
 						 	<div class="Deposit4 text-center">
 						 		<h4>Duplicate Copy</h4>
 						 	</div>
 						 	<div class="Deposit5 text-center">
 						 		<h4>Triplicate Copy</h4>
 						 	</div>
					   	 <form name="myFunction" class="form-horizontal" action="#" >
					   	 <fieldset>
						   	<div class="col-sm-6 col-md-6">
						   		<div class="form-group">
								    <label class="control-label col-sm-4 col-md-4 text-right">Location Name :</label>
								    <div class="col-sm-8 col-md-8">
									<?php 
										$zqcg_hq_location_id=$fetch_check['hqcg_zonal_location_id'];
	        							  $query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zqcg_hq_location_id'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							// mysqli_error($conn);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							//print_r($result2);
	        							echo "<p>".strtoupper($result2['address_1'])."</p>";
	        							echo "<p>".strtoupper($result2['address_2'])."</p>";
	        							echo "<p>C/O:- ".strtoupper($result2['address_3']).", " .strtoupper($result2['address_4'])."</p>";	        							
	        							echo "<p>".strtoupper($result2['address_5']).", ".strtoupper($result2['address_6']).", ".strtoupper($result2['address_7']);
	        							echo "<p>".strtoupper($result2['address_8'])."</p>";
									?>
									<input type="hidden" name="zqcg_hq_location_id" value="<?=$zqcg_hq_location_id?>">
							    
							
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-sm-4 col-md-4 text-right">Date of Challan : </label>
							    <div class="col-sm-8 col-md-8">
							    	<input type="hidden" name="hqcg_date" value="<?=$fetch_check['hqcg_date']?>">
									<p><?=$fetch_check['hqcg_date']?></p>
							   </div>
							</div>
							
							<div class="form-group">
							    <label class="control-label col-sm-4 col-md-4 text-right">Requisition Id : </label>
							    <div class="col-sm-8 col-md-8">
									<p><?=strtoupper($fetch_check['hqcg_site_mr_id'])?></p>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-sm-4 col-md-4 text-right">Challan No : </label>
							   	   <div class="col-sm-8 col-md-8">
							  			
							    <p><?=strtoupper($fetch_check['hqcg_challan_no'])?></p>
							    	
							   
							  </div>
							</div>
						   <div class="form-group">
							    <label class="control-label col-sm-4 col-md-4 text-right">Time Of Challan : </label>
							    <div class="col-sm-8 col-md-8">
										
									<p><?=$fetch_check['hqcg_time']?></p>
							   </div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
							    <label class="control-label col-sm-4 text-right">DC No : </label>
							    <div class="col-sm-8">
									
									<p><?=strtoupper($fetch_check['dc_no'])?></p>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-sm-4 text-right">Date : </label>
							    <div class="col-sm-8">
									<p><?=$fetch_check['date_enter']?></p>
									
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-sm-4 text-right">Indent No : </label>
							    <div class="col-sm-8">
									<p><?=$fetch_check['Indent_no']?></p>
									
									
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-sm-4 text-right">Vehicle No : </label>
							    <div class="col-sm-8">
									<p><?=strtoupper($fetch_check['Vehicle_no'])?></p>
									
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-sm-4 text-right">LR No : </label>
							    <div class="col-sm-8">
									<p><?=strtoupper($fetch_check['LR_no'])?></p>
									
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-sm-4 text-right">LR Date : </label>
							    <div class="col-sm-8">
									<p><?=$fetch_check['LR_date']?></p>
									
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-sm-4 text-right"> Project No : </label>
							    <div class="col-sm-8">
									<p><?=strtoupper($fetch_check['Project_No'])?></p>
									
							   </div>
							</div>	
					   </div>
					</fieldset>
					</form>
						 <br>
						 <hr>
						 <h5 class="text-center">Component List</h5>
						 <hr>
						<div class="table-responsive">
									    	<div class="Deposit">
				                           <table id="" class="display nowrap table table-bordered" cellspacing="0">
										     
										         <thead>
										            <tr >
										                <th width="5%">#</th>
										                <th width="11%">HSN Code</th>
										                <th width="11%">Primary Code</th>
										                <th width="11%">Secondary Code</th>
										                <th width="11%">Description</th>
										              	<th width="11%">Approved Quantity</th>
										              	<th width="11%">Issue Quantity</th>
										              	<th width="11%">Rate</th>
										              	<th width="11%">Total Price</th>
										            </tr>

										         </thead>
					        					
					        					<tbody>
					        						<?php 
					        							$x=0;
					        							$item="SELECT * FROM `lt_master_hq_issue_zonal_info` WHERE `hqzis_challan_id`='$challan' AND`hqzis_issued_status`='1'";
					        							$sql_item_exe=mysqli_query($conn,$item);
					        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        								$x++;
					        								?>
                                                        <tr  >
					        								<td width="5%"><?=$x?></td>
					        								<td width="11%"><?=strtoupper($fetch_item['hqzis_hsn_id'])?></td>
					        								
					        								<td width="11%"><?=strtoupper($fetch_item['hqzis_primary_id'])?></td>
					        								
					        								<td width="11%"><?=strtoupper($fetch_item['hqzis_secondary_id'])?></td>
					        								<td width="11%"><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></td>
					        								<td width="11%"><?=strtoupper($fetch_item['hqzis_approve_qnt'])?> <?=strtoupper($fetch_item['hqzis_unit'])?></td>
					        								
					        								<td width="11%">
					        									<?=$fetch_item['hqzis_issue_qnt']?> <?=strtoupper($fetch_item['hqzis_unit'])?> 
					        								</td>
					        								<td width="11%">
																INR <?=$fetch_item['price_rate']?>
															</td>
															<td width="11%">
																INR <?=$fetch_item['price_total']?> 
															</td>
					        							</tr>
					        				
					        						<?php
					        						}
					        					   ?>
					        				   </tbody>
				    						 
				    						 </table>
				    						</div>
				    						 <div class="Deposit1">
				    						  <table id="" class="display nowrap table table-bordered"  cellspacing="0">
										     
										         <thead>
										            <tr >
										                <th width="6%">#</th>
										                <th width="12%">HSN Code</th>
										                <th width="12%">Item Code</th>
										                <th width="12%">Description</th>
										              	<th width="12%">Approved Quantity</th>
										              	<th width="12%">Issue Quantity</th>
										              	<th width="12%">Rate</th>
										              	<th width="12%">Total Price</th>
										            </tr>
										            
										         </thead>
					        					
					        					<tbody>
					        						<?php 
					        							$x=0;
					        							$item="SELECT * FROM `lt_master_hq_issue_zonal_info` WHERE `hqzis_challan_id`='$challan' AND`hqzis_issued_status`='1'";
					        							$sql_item_exe=mysqli_query($conn,$item);
					        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        								$x++;
					        								?>
                                                        <tr>
					        								<td width="6%"><?=$x?></td>
					        								<td width="12%"><?=strtoupper($fetch_item['hqzis_hsn_id'])?></td>
					        								
					        								
					        								
					        								<td width="12%"><?=strtoupper($fetch_item['hqzis_secondary_id'])?></td>
					        								<td width="12%"><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></td>
					        								<td width="12%"><?=strtoupper($fetch_item['hqzis_approve_qnt'])?> <?=strtoupper($fetch_item['hqzis_unit'])?></td>
					        								
					        								<td width="12%">
					        									<?=strtoupper($fetch_item['hqzis_issue_qnt'])?> <?=strtoupper($fetch_item['hqzis_unit'])?> 
					        								</td>
					        								<td width="12%">
																INR <?=$fetch_item['price_rate']?>
															</td>
															<td width="12%">
																INR <?=$fetch_item['price_total']?> 
															</td>
					        							</tr>
					        				
					        						<?php
					        						}
					        					   ?>
					        				   </tbody>
				    						 
				    						 </table>
				    						</div>
				                         <!--   </div>
				                        </div>
				                     </div> -->
                         		  </div>
                         	   <br>  
							
							<div class="row">								
								<div class="col-md-5 col-sm-12 pull-right">									
									<div class="text-center">
										<p>Authorized person</p>
										<!-- <img src="../../../app-assets/images/pages/signature-scan.png" alt="signature" class="height-100"> -->
										<br>
										<br>
										<br>
										
										__________________________________
										<h6>Issuer Name</h6>
										<br>
										
										____________________________________
										<p class="text-muted">Issuer Headquater Store</p>
									</div>
								</div>
							</div>
							<div class="row">
					  			<div class="col-md-12  well invoice-thank">
					  				<h5 style="text-align:center;">Thank You!</h5>
					  			</div>
					  		</div>
					  		
<br>
<br>
		 			 </div>						
					</div>	
					</div>
					</div>
					<div class="container">
  <div class="row text-center" style="padding-left:10px;">                    
                       
  <input type="button" class="btn-primary" style="background-color:#39F; color:#000;"  value="Orginal Copy" onclick="PrintDoc()"/> 
  || 
  <input type="button" class="btn-primary" style="background-color:#39F; color:#000;"  value="Duplicate Copy" onclick="PrintDoc1()"/>
  ||
  <input type="button" class="btn-primary" style="background-color:#39F; color:#000;"  value="Triplicate Copy" onclick="PrintDoc2()"/>
  || 
  <a class="btn-primarys" href="index.php">close</a>
                        
                   
                    </div>
                    </div>
<br>
<br>
<!-- <div class="container">
  <div class="row text-center" style="padding-left:10px;">                    
                       
  <input type="button" class="btn-primary" style="background-color:#39F; color:#000;"  value="Print" onclick="PrintDoc()"/> || <a class="btn-primarys" href="#" onclick="close_window();return false;">close</a>
                        
                   
                    </div>
                    </div> -->

<style type="text/css" media="print">
    
    .center {
    text-align: center;
    /*border: 3px solid green;*/
}
.row .row, .row-fluid .row-fluid {
    margin-bottom: 6px;
}
@media print{
	.panel-heading{
		padding:0;
	}
	 @page { size: landscape; 
	 	 	/* display: block;
	 	 	 page-break-before: always;*/
	 	 	 /*page-break-before: always;*/
	 }
    table td.shrink {
      white-space:nowrap
  }
  table td.expand {
      width: 99%
  }
  .clearfix:after {
    clear: both;
}
}
.newclass { display: none }
  </style>

  <script type="text/javascript">
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
/*--This JavaScript method for Print command--*/

    function PrintDoc() {
    		$(".Deposit").css('display','none');
    		$(".Deposit1").css('display','block');// second table
			$(".Deposit3").css('display','block');//original
			$(".Deposit4").css('display','none');//duplicate
    		$(".Deposit5").css('display','none');//original
    	 // document.getElementById(sid).setAttribute("style", "display:none;");
      //    document.getElementById(sid1).setAttribute("style", "display:none;");
        var toPrint = document.getElementById('printarea');
         var popupWin = window.open('', '_blank');
        // var popupWin = window.open('', '_self', 'width=auto,height=450,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>:: Date <?=date('d-m-y').'  Challan No'.$challan?>::</title><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" type="text/css" href="<?=$base?>/asserts/print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></head><body onload="window.print()" >')
        
        popupWin.document.write(toPrint.innerHTML);
        // popupWin.document.write(' <a class="btn-primarys" href="#" onclick="close_window();return false;">close</a>');
        popupWin.document.write('</html>');

        popupWin.document.close();
         window.close;
        

    }
        function PrintDoc1() {
        	$(".Deposit").css('display','none');
    		$(".Deposit1").css('display','block');// second table
			$(".Deposit3").css('display','none');//original
			$(".Deposit4").css('display','block');//duplicate
    		$(".Deposit5").css('display','none');//original
        var toPrint = document.getElementById('printarea');
         var popupWin = window.open('', '_blank');
        // var popupWin = window.open('', '_self', 'width=auto,height=450,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>:: Date <?=date('d-m-y').'  Challan No'.$challan?>::</title><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" type="text/css" href="<?=$base?>/asserts/print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></head><body onload="window.print()" >')

        popupWin.document.write(toPrint.innerHTML);
        // popupWin.document.write(' <a class="btn-primarys" href="#" onclick="close_window();return false;">close</a>');
        popupWin.document.write('</html>');

        popupWin.document.close();
         window.close;
        

    }
     function PrintDoc2() {
     		$(".Deposit").css('display','block');
    		$(".Deposit1").css('display','none');// second table
			$(".Deposit3").css('display','none');//original
			$(".Deposit4").css('display','none');//duplicate
    		$(".Deposit5").css('display','block');//original
        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank');

        popupWin.document.open();

        popupWin.document.write('<html><title>:: Date <?=date('d-m-y').'  Challan No'.$challan?>::</title><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" type="text/css" href="<?=$base?>/asserts/print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /></head><body onload="window.print()" >')

        popupWin.document.write(toPrint.innerHTML);
        // popupWin.document.write(' <a class="btn-primarys" href="#" onclick="close_window();return false;">close</a>');
        popupWin.document.write('</html>');

        popupWin.document.close();
         window.close;
        

    }

/*--This JavaScript method for Print Preview command--*/

    function PrintPreview() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=auto,height=150,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Print Preview::</title><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" type="text/css" href="<?=$base?>/asserts/print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">></head><body">')

        popupWin.document.write(toPrint.innerHTML);
        // popupWin.document.write(' <a class="btn-primarys" href="#" onclick="close_window();return false;">close</a>');
        popupWin.document.write('</html>');

        popupWin.document.close();

        window.close;

    }

function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}

</script>

<?php
}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templete/header.php';

?>
<script type="text/javascript">
	$(document).ready(function() {
		// $(".Deposit1").css('display','block');
		$(".Deposit1").css('display','none');// second table
		$(".Deposit3").css('display','none');//original
		$(".Deposit4").css('display','none');//duplicate
		$(".Deposit5").css('display','none');// tripicate
		
    // Setup - add a text input to each footer cell
    $('#example77 tfoot th').not(":eq(0),:eq(4),:eq(5),:eq(6)").each( function () {
        var title = $('#example77 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example77').DataTable();
 
    // Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
        if (colIdx == 0 || colIdx == 4 ) return;
        
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );
} );
</script>
<!--  -->
