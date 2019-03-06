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
.row {
    margin-left: -2px;
    margin-right: -2px;
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
	<div class="container page-content">
		<div class="row">
			<?php $msg->display(); ?>
			
			<div class="col-md-12 col-sm-12">
				<div class="panel panel-default">
				<div  id="printarea" class="container">
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
				
				<fieldset>
					<div class="row" style="width: 100%">
						<div class="col-md-12 col-sm-12">
							<div class="col-sm-5 col-md-5">
								<label>Consignee : </label>
									<p><small><?php 
									$zqcg_hq_location_id=$fetch_check['hqcg_zonal_location_id'];
		        							  $query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zqcg_hq_location_id'";
		        							$sql_exe2=mysqli_query($conn,$query_sql2);
		        							// mysqli_error($conn);
		        							$result2=mysqli_fetch_assoc($sql_exe2);
		        							//print_r($result2);
		        							echo "<p style='line-height:1.5; font-size:10px; margin-bottom: 0px;'>".strtoupper($result2['address_1'])."</p>";
		        							echo "<p style='line-height:1.5; font-size:10px; margin-bottom: 0px;'>".strtoupper($result2['address_2'])."</p>";
		        							echo "<p style='line-height:1.5; font-size:10px; margin-bottom: 0px;'>C/O:- ".strtoupper($result2['address_3']).", " .strtoupper($result2['address_4'])."</p>";	        							
		        							echo "<p style='line-height:1.5; font-size:10px; margin-bottom: 0px;'>".strtoupper($result2['address_5']).", ".strtoupper($result2['address_6']).", ".strtoupper($result2['address_7'])."-".strtoupper($result2['address_8'])."</p>";
										?></small></p>
							</div>
							<div  class="col-sm-6 col-md-6">
								<div class="col-md-12">
								<label>DC No.    <strong><small><?=strtoupper($fetch_check['dc_no'])?></small></strong></label>
								</div>
								<div class="col-md-12">
								<label>DC Date.    <strong><small><?=strtoupper($fetch_check['date_enter'])?></small></strong></label>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row"  style="width: 100%">
						<div class="col-md-12 col-sm-12">
							<div class="col-sm-3 col-md-3">
								<label>Indent No :-   <strong><small><?=strtoupper($fetch_check['Indent_no'])?></small></strong></label>

							</div>
							<div class="col-sm-3 col-md-3">
								<label>Vehicle No :-    <strong><small><?=strtoupper($fetch_check['Vehicle_no'])?></small></strong></label>
							</div>
							<div class="col-sm-3 col-md-3">
								<label>LR No :-   <strong><small><?=strtoupper($fetch_check['LR_no'])?></small></strong></label>
							</div>
							<div class="col-sm-3 col-md-3">
								<label>Project Code :-   <strong><small><?=strtoupper($fetch_check['Project_No'])?></small></strong></label>
							</div>
						</div>
					</div>

						
						   
						
					</fieldset>
					</form>
						 <br>
						 <hr>
						 <h6 class="text-center"><small>We have despatched following goods.  Kindly return the duplicate copy duly signed acknowledging the receipt of goods.</small></h6>
						 <hr>
						<div class="table-responsive">
							<div class="Deposit">
				            	<table id="" class="display nowrap table table-bordered" cellspacing="0">
								    <thead>
								        <tr >
										    <th width="5%">#</th>
											<th width="11%">HSN Code</th>
										            <!-- <th width="11%">Primary Code</th>
										                <th width="11%">Secondary Code</th> -->
										    <th width="11%">Material Description</th>
										              	<!-- <th width="11%">Approved Quantity</th> -->
										    <th width="11%">Qty</th>
										    <th width="11%">UOM</th>
										    <th width="11%">Total Price<br><small>(in RS)</small></th>
										</tr>
									</thead>
					        		<tbody>
					        		<?php 
					        			$x=0;
					        			$Total_id1=0;
					        			$item="SELECT * FROM `lt_master_hq_issue_zonal_info` WHERE `hqzis_challan_id`='$challan' AND`hqzis_issued_status`='1'";
					        			$sql_item_exe=mysqli_query($conn,$item);
					        			while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        			$x++;
					        		?>
					        		<tr>
					        			<td width="5%"><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
					        			<td width="11%"><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
					        								
					        			<!-- <td width="11%"><?=strtoupper($fetch_item['hqzis_primary_id'])?></td>
					        				<td width="11%"><?=strtoupper($fetch_item['hqzis_secondary_id'])?></td> -->
					        			<td width="11%"><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
					        			<!-- <td width="11%"><?=strtoupper($fetch_item['hqzis_approve_qnt'])?> <?=strtoupper($fetch_item['hqzis_unit'])?></td> -->
					        			<td width="11%"><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?> </small></td>
					        			<td width="11%"><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
										<td width="11%"><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>
					        		</tr>			        				
					        	<?php	}?>
					        		<tr>
					        		   	<td colspan="5"  align="right">Total </td>
					        		   	<td><?=$Total_id1?></td>
					        		</tr>
					        		</tbody>				    						 
				    			</table>
				    		</div>
				    		<div class="Deposit1">
				    			<table id="" class="display nowrap table table-bordered"  cellspacing="0">
								    <thead>
								        <tr >
							                <th width="6%">#</th>
							                <th width="12%">HSN Code</th>
							                <!-- <th width="12%">Item Code</th> -->
							                <th width="12%">Material Description</th>
							              	<!-- <th width="12%">Approved Quantity</th> -->
							              	<th width="11%">Qty</th>
							              	<th width="11%">UOM</th>
							              	<th width="11%">Total Price<br><small>(in RS)</small></th>
							            </tr>
									</thead>
					        		<tbody>
					        		<?php 
					        			$x=0;
					        			$Total_id2=0;
					        			$item="SELECT * FROM `lt_master_hq_issue_zonal_info` WHERE `hqzis_challan_id`='$challan' AND`hqzis_issued_status`='1'";
					        			$sql_item_exe=mysqli_query($conn,$item);
					        			while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        				$x++;
					        		?>
                                        <tr>
					        				<td width="6%"><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
					        				<td width="12%"><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
					        				<!-- <td width="12%"><?=strtoupper($fetch_item['hqzis_secondary_id'])?></td> -->
					        				<td width="12%"><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
					        				<!-- <td width="12%"><?=strtoupper($fetch_item['hqzis_approve_qnt'])?> <?=strtoupper($fetch_item['hqzis_unit'])?></td> -->
					        								
					        				<td width="12%"><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_issue_qnt'])?> </small></td>
					        				<td width="12%"><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
											<td width="12%"><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total2=$fetch_item['price_total']?></small><?php $Total_id2=$Total_id2+$price_total2;?></td>
					        			</tr>
					        		<?php }?>
					        		    <tr>
					        				<td colspan="5" align="right">Total </td>
					        				<td><?=$Total_id1?></td>
					        			</tr>
					        		</tbody>				    						 
				    			</table>
				    		</div>              
                        </div>
                        <!-- <br>  -->
                        <div class="container">
	                        <div class="row" style="border: 1px solid black">
	                        	<div class="col-sm-8 col-md-8" style="border: 1px solid black">
	                        		<div class="row" style="border: 1px solid black">
			                        	<div class="col-sm-6 col-md-6" style="border-right:  1px solid black">
			                        		<p style="padding: 1em"></p>
			                        		<p style="line-height:1.5; font-size:10px; margin-bottom: 0px;"> <small>Our GST NO :</small><strong> 21AAACL0140P4ZS</strong></p>
			                        		<p style="padding: 1em"></p>
			                        	</div>
			                        	<div class="col-sm-6 col-md-6" style="border-left: 1px solid black">
			                        		<p style="padding: 1em"></p>
			                        		<p style="line-height:1.5; font-size:10px; margin-bottom: 0px;"><small>PAN NO :- </small><strong> AAACL0140P</strong></p>
			                        		<p style="padding: 1em"></p>
			                        	</div>
			                        </div>
			                        <div class="row">
			                        	<div class="col-sm-6 col-md-6">
			                        		<p style="padding: 1.8em"></p>
			                        		<!-- <p style="padding: 1.8em"></p> -->
			                        		<p style="line-height:1.5; font-size:10px; margin-bottom: 0px;"> <small>Prepared By:</small></p>
			                        	</div>
			                        	<div class="col-sm-6 col-md-6">
			                        		<p style="padding: 1.8em"></p>
			                        		
			                        		<p style="line-height:1.5; font-size:10px; margin-bottom: 0px;"><small>Authorized By :- </small></p>
			                        	</div>
			                        </div>
		                        </div>
	                        	<div class="col-sm-4 col-md-4">
	                        		 <div class="row">
			                        	<div class="col-sm-11 col-md-11">
			                        		
			                        		<p class="text-center" style="line-height:1.5; font-size:10px; margin-bottom: 0px;"> <strong>For Larsen & Toubro Limited Construction:</strong></p>
			                        		<p style="padding: 1.8em"></p>
			                        	</div>
			                        </div>
			                         <div class="row">
			                        	<div class="col-sm-11 col-md-11">
			                        		<p style="padding: 1.8em"></p>
			                        		<p class="text-center" style="line-height:1.5; font-size:10px; margin-bottom: 0px;"> <strong> Accounts Department :</strong></p>
			                        		<!-- <p style="padding: 1.8em"></p> -->
			                        	</div>
			                        </div>

	                        	</div>

							</div>
							<div class="row" style="border: 1px solid black">
								<div class="col-sm-11 col-md-11">
			                    	<p style="padding: 0.5em"></p>			                        		
			                    </div>
							</div>
							<div class="row" style="border: 1px solid black">
								<div class="col-sm-11 col-md-11">
			                    	<p style="padding: 0.1em"></p>
			                    	<div class="pull-left"><p style="line-height:1.5; font-size:10px; margin-bottom: 0px;">Registered Office : L & T House, Ballard Estate,  P.O.Box No.278, Mumbai - 400 038.</p> </div>	
			                    	<div class="pull-right"><p style="line-height:1.5; font-size:10px; margin-bottom: 0px;">CIN N0 : L99999MH1946PLC004768</p> </div>		                        		
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
    p {
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
}

p, ul, ol, dl, dd, dt, th, td, kbd, blockquote {
    font-family: inherit;
    font-size: 11px;
    line-height: 1.5;
    color: #1C2B36;
    text-align: inherit;
}
    .center {
    text-align: center;
    /*border: 3px solid green;*/
}
.row .row, .row-fluid .row-fluid {
    margin-bottom: 6px;
}
@media print{
	p {
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
}

p, ul, ol, dl, dd, dt, th, td, kbd, blockquote {
    font-family: inherit;
    font-size: 11px;
    line-height: 1.5;
    color: #1C2B36;
    text-align: inherit;
}
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

        popupWin.document.write('<html><title>:: Date <?=date('d-m-y').'  Challan No'.$challan?>::</title><meta name="viewport" content="width=device-width, initial-scale=1" , maximum-scale=1, user-scalable=no"><link rel="stylesheet" type="text/css" href="<?=$base?>/asserts/print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></head><body onload="window.print()" >')
        
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

        popupWin.document.write('<html><title>:: Date <?=date('d-m-y').'  Challan No'.$challan?>::</title><meta name="viewport" content="width=device-width, initial-scale=1", maximum-scale=1, user-scalable=no"><link rel="stylesheet" type="text/css" href="<?=$base?>/asserts/print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></head><body onload="window.print()" >')

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

        popupWin.document.write('<html><title>:: Date <?=date('d-m-y').'  Challan No'.$challan?>::</title><meta name="viewport" content="width=device-width, initial-scale=1", maximum-scale=1, user-scalable=no"><link rel="stylesheet" type="text/css" href="<?=$base?>/asserts/print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /></head><body onload="window.print()" >')

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
