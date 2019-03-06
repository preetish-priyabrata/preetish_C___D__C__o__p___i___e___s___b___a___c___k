<?php
session_start();
// ob_start();
 $ip=$_SERVER['REMOTE_ADDR'];
$base="http://".$ip."/lnt_rev1/admin";

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

<!DOCTYPE html>
<html>
<div  id="printarea">
	<div class="section-to-print"> 	
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.css">
  <link rel="stylesheet" href="<?=$base?>/asserts/print.css" media="print"/>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>


<body>

<style type="text/css">

  @media print{
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
   /*.table{
       top: 200em;
   }*/
   .printbreak {

    page-break-before: always;
    }
    .mod{
      margin-top: 6cm 1cm;
    }
    .space_need,.mod {
      page-break-before: inherit;
    }
    @page { margin: 5cm 1cm } /* All margins set to 2cm */

    @page :first {
      margin-top: 1cm /* Top margin on first page 10cm */
      }
   /* body{
      margin-top: 100px;

    }*/
  	.footer { position: fixed; bottom: 0px; }
    .header { position: fixed !important; top: 0px; width: 100%}
    .page{ 
        /*position: fixed !important;*/
        max-height: 400px;
        /*should match height of header */
        /*margin-bottom: 40px;*/
        /*/* should match height of footer */
        /*width:100%;*/
       /* page-break-before: auto;
        page-break-after: auto;*/
         /*page-break-inside: auto;*/
      }
     /* table { page-break-inside:auto }
   tr    { page-break-inside:avoid; page-break-after:auto }
   @page {

        margin-bottom: 40px;
        counter-increment: page;

        @bottom-right {
            border-top: 1px solid #000000;
            padding-right:20px;
            font-size: 12px !important;
            content: "Page " counter(page) " of " counter(pages);
        }
        @bottom-left {
            content: "Footer content goes here.";
            border-top: 1px solid #000000;
        }

    }*/
      /*table{   page-break-inside: auto;orphans:3; widows:2;}*/
  }
 
</style>
<div class="wrapper">

  <!-- Main content -->
  
    
<section class="invoice" >
    <!-- title row -->
    <table class="table">
      <thead>
      <tr><td>
  <div class="header">
    <div class="row ">
      <div class="col-xs-12">
        <h2 class="page-header">
          <img src="LT1.png" class="img-circle" style="width: 73px;margin-right: 5px;">LARSEN & TOUBRO LIMITED
            <p style='line-height:1.5; font-size:10px; margin-bottom: 0px; margin-left: 75px; margin-top: -26px'>KANSBAHAL WORKS,<br>PO : KANSBAHAL, DIST : SUNDARGARH,<br> ODISHA, 770034 <br>+916624280241,www.lntecc.com
              <br>
              599, Annapurna Complex, Lewis Road, Khordha, Odisha, Pin-751014
            </p>

            <div class="Deposit3 text-center pull-right" style="margin-right: 2px; margin-top: -80px" >
        <h4 style="border: 1px solid black; padding: 1px;">Orginal Copy</h4>
        <small class="pull-right">Date: 2/10/2014</small>
      </div>
      <div class="Deposit4 text-center pull-right" style="margin-right: 2px; margin-top: -80px" >
        <h4 style="border: 1px solid black; padding: 1px;">Duplicate Copy</h4>
        <small class="pull-right">Date: 2/10/2014</small>
      </div>
      <div class="Deposit5 text-center pull-right" style="margin-right: 2px ; margin-top: -80px" >
        <h4 style="border: 1px solid black; padding: 1px;">Triplicate Copy</h4>
        <small class="pull-right">Date: 2/10/2014</small>
      </div>
        </h2>


    
       
      
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-xs-6 invoice-col">
        Consignee :
        <address>
         
          <?php 
      $zqcg_hq_location_id=$fetch_check['hqcg_zonal_location_id'];
          $query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zqcg_hq_location_id'";
        $sql_exe2=mysqli_query($conn,$query_sql2);
        // mysqli_error($conn);
        $result2=mysqli_fetch_assoc($sql_exe2);
        //print_r($result2);
        echo "<strong><p style='line-height:1.5; font-size:10px; margin-bottom: 0px;'>".strtoupper($result2['address_1'])."</p></strong>";
        echo "<p style='line-height:1.5; font-size:10px; margin-bottom: 0px;'>".strtoupper($result2['address_2'])."</p>";
        echo "<p style='line-height:1.5; font-size:10px; margin-bottom: 0px;'>C/O:- ".strtoupper($result2['address_3']).", " .strtoupper($result2['address_4'])."</p>";                       
        echo "<p style='line-height:1.5; font-size:10px; margin-bottom: 0px;'>".strtoupper($result2['address_5']).", ".strtoupper($result2['address_6']).", ".strtoupper($result2['address_7'])."-".strtoupper($result2['address_8'])."</p>";
    ?>
        </address>
      </div>

      <!-- /.col -->
      <div class="col-xs-6 invoice-col">
        <!-- <b>Invoice </b><br> -->
        
        <b style="font-size:10px;">DC No:</b> <span><small><?=$dc_no=strtoupper($fetch_check['dc_no'])?></small></span><br>
        <b style="font-size:10px;">DC Date:</b>  <span><small><?=strtoupper($fetch_check['date_enter'])?></small></span><br>
        <b style="font-size:10px;">Indent No:</b> <span><small><?=strtoupper($fetch_check['Indent_no'])?></small></span><br>
        <b style="font-size:10px;">DC Date:</b>  <span><small><?=strtoupper($fetch_check['Indent_dated'])?></small></span><br>
        <!-- <b>Indent No:</b> 968-34567 -->
      </div>
    </div>
    <div class="row invoice-info" style="font-size:10px;">
      <!-- /.col -->
        <div class="col-xs-4 invoice-col">
          <b>Vehicle No:</b> <small><?=strtoupper($fetch_check['Vehicle_no'])?></small>
      </div>
        <div class="col-xs-4 invoice-col">
          <b>LR No. :</b> <small><?=strtoupper($fetch_check['LR_no'])?></small></strong>
        </div>
        <div class="col-xs-4 invoice-col">

          <b>Project Code:</b> <small><?=strtoupper($fetch_check['Project_No'])?></small>
      </div>
       <!--  <div class="col-xs-3 invoice-col">
      </div> -->
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</section>
</td>
</tr>
</thead>
<tbody>
  <tr>
    <td>
    <!-- Table row -->
    <div class="row">
    	<div class="col-xs-12 table-responsive">
      		<div class="Deposit">
        		<table class="table table-striped">
		        	<thead>
			        	<tr>
				            <th>#</th>
				            <th>HSN Code</th>
				            <th>Material Description</th>
				            <th>Qty</th>
				            <th>UOM</th>
				            <th>Total Price<br><small>(in RS)</small></th>
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
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                  </tr>
                  <tr>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                  </tr>
                  <tr>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                  </tr>
                  <tr>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                  </tr>
			        	<tr>
				            <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
				            <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
				            <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
				            <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
				            <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
				            <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

			          	</tr>
                  <tr>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                  </tr>
                  <tr>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                  </tr>
                  <tr>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                    <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                  </tr>

			          	
			          	<?php }?>          
          			</tbody>
        		</table>
      		</div>
      		<div class="Deposit1">
        		<table class="table table-striped">
		        	<thead>
			        	<tr>
				            <th>#</th>
				            <th>HSN Code</th>
				            <th>Material Description</th>
				            <th>Qty</th>
				            <th>UOM</th>
				            <th>Total Price<br><small>(in RS)</small></th>
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
				            <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
					        <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
					        <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
					        <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_issue_qnt'])?> </small></td>
					        <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
							<td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total2=$fetch_item['price_total']?></small><?php $Total_id2=$Total_id2+$price_total2;?></td>
			          	</tr>
			          	<?php }?>          
          			</tbody>
        		</table>
      		</div>

      	</div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </td>
</tr>
<tr>
  <td>

    <div class="row printbreak">
      <div class="space_need">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <!-- <p class="lead">Note :</p> -->
       <!--  <img src="../../dist/img/credit/visa.png" alt="Visa">
        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="../../dist/img/credit/american-express.png" alt="American Express">
        <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

        <p class="text-muted well well-xs no-shadow" style="margin-top: 10px;">
         We have despatched above mentioned goods.  Kindly return the duplicate copy duly signed acknowledging the receipt of goods.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <!-- <p class="lead">Amount On <?=date('d/m/Y')?></p> -->

        <div class="table-responsive">
        	<div class="Deposit">
		        <table class="table">
		            <!-- <tr>
		              <th style="width:50%">Subtotal:</th>
		              <td>$250.30</td>
		            </tr>
		            <tr>
		              <th>Tax (9.3%)</th>
		              <td>$10.34</td>
		            </tr>
		            <tr>
		              <th>Shipping:</th>
		              <td>$5.80</td>
		            </tr> -->
		            <tr>
		              <th>Total:</th>
		              <td>Rs. <?=$Total_id1?></td>
		            </tr>
		        </table>
		    </div>
		    <div class="Deposit1">
		        <table class="table">
		            <!-- <tr>
		              <th style="width:50%">Subtotal:</th>
		              <td>$250.30</td>
		            </tr>
		            <tr>
		              <th>Tax (9.3%)</th>
		              <td>$10.34</td>
		            </tr>
		            <tr>
		              <th>Shipping:</th>
		              <td>$5.80</td>
		            </tr> -->
		            <tr>
		              <th>Total:</th>
		              <td>Rs. <?=$Total_id2?></td>
		            </tr>
		        </table>
		    </div>
        </div>
      </div>
      <!-- /.col -->
    </div>
  </div>
    <!-- /.row -->
 </td>
</tr>
</tbody>
<tfoot>
  <tr>
    <td>
    
    <div class="col-xs-11 footer">
    <div class="row" style="border: 1px solid black;">
    	<div class="col-xs-8 col-xs-8" style="border: 1px solid black">
        	<div class="row" style="border: 0.5px solid black">
               	<div class="col-xs-6 col-xs-6" style="border-right:  1px solid black">
               		<p style="padding: 1em"></p>
               		<p style="line-height:1.5; font-size:10px; margin-bottom: 0px;"> <small>Our GST NO :</small><strong> 21AAACL0140P4ZS</strong></p>
               		<p style="padding: 1em"></p>
               	</div>
               	<div class="col-xs-6 col-xs-6" style="border-left: 1px solid black">
               		<p style="padding: 1em"></p>
               		<p style="line-height:1.5; font-size:10px; margin-bottom: 0px;"><small>PAN NO :- </small><strong> AAACL0140P</strong></p>
               		<p style="padding: 1em"></p>
               	</div>
            </div>
            <div class="row">
              	<div class="col-xs-6 col-xs-6">
               		<p style="padding: 1.8em"></p>
               		<!-- <p style="padding: 1.8em"></p> -->
               		<p style="line-height:1.5; font-size:10px; margin-bottom: 0px;"> <small>Prepared By:</small></p>
               	</div>
               	<div class="col-xs-6 col-xs-6">
               		<p style="padding: 1.8em"></p>               		
               		<p style="line-height:1.5; font-size:10px; margin-bottom: 0px;"><small>Authorized By :- </small></p>
               	</div>
            </div>
        </div>
        <div class="col-xs-4 col-xs-4">
        	<div class="row">
              	<div class="col-xs-11 col-xs-11">
               		
                	<p class="text-center" style="line-height:1.5; font-size:10px; margin-bottom: 0px;"> <strong>For Larsen & Toubro Limited Construction:</strong></p>
                	<p style="padding: 1.8em"></p>
                </div>
            </div>
            <div class="row">
               	<div class="col-xs-11 col-xs-11">
               		<p style="padding: 1.8em"></p>
               		<p class="text-center" style="line-height:1.5; font-size:10px; margin-bottom: 0px;"> <strong> Accounts Department :</strong></p>
               		<!-- <p style="padding: 1.8em"></p> -->
               	</div>
            </div>

        </div>
	</div>
	<div class="row" style="border: 1px solid black">
		<div class="col-xs-11 col-xs-11">
           	<p style="padding: 0.5em"></p>			                        		
        </div>
	</div>
	<div class="row" style="border: 1px solid black">
		<div class="col-xs-11 col-xs-11">
           	<p style="padding: 0.1em"></p>
           	<div class="pull-left"><p style="line-height:1.5; font-size:10px; margin-bottom: 0px;">Registered Office : L & T House, Ballard Estate,  P.O.Box No.278, Mumbai - 400 038.</p> </div>	
           	<div class="pull-right"><p style="line-height:1.5; font-size:10px; margin-bottom: 0px;">CIN N0 : L99999MH1946PLC004768</p> </div>		                        		
        </div>
	</div>
	</div>
</td>
</tr>
</tfoot>
</table>

	<!-- <div class="row">
		<div class="col-xs-12  well invoice-thank">
			<h5 style="text-align:center;">Thank You!</h5>
		</div>
	</div> -->
</section>
  <!-- /.content -->
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- ./wrapper -->
</body>
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
</html>





<?php
}else{
	header('Location:logout.php');
	exit;
}
// $contents = ob_get_contents();
// ob_clean();
// include 'templete/header.php';

?>
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

         // popupWin.document.write('<html><meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"><link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"><link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css"><link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css"><link rel="stylesheet" href="../dist/css/AdminLTE.min.css"><link rel="stylesheet" href="<?=$base?>/asserts/print.css" media="print" /><body onload="window.print()" >')
        popupWin.document.write('<html><title>:: Date <?=date('d-m-y').'  Challan No '.$dc_no?>::</title><meta name="viewport" content="width=device-width, initial-scale=1" , maximum-scale=1, user-scalable=no"><link rel="stylesheet" type="text/css" href="<?=$base?>/asserts/print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></head><body onload="window.print()" >')
        
        popupWin.document.write(toPrint.innerHTML);
        // popupWin.document.write(' <a class="btn-primarys" href="#" onclick="close_window();return false;">close</a>');
        popupWin.document.write('</body></html>');

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
        // popupWin.document.write('<html><meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"><link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"><link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css"><link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css"><link rel="stylesheet" href="../dist/css/AdminLTE.min.css"><link rel="stylesheet" href="<?=$base?>/asserts/print.css" media="print"/><body onload="window.print()" >')
        popupWin.document.write('<html><title>:: Date <?=date('d-m-y').'  Challan No '.$dc_no?>::</title><meta name="viewport" content="width=device-width, initial-scale=1", maximum-scale=1, user-scalable=no"><link rel="stylesheet" type="text/css" href="<?=$base?>/asserts/print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></head><body onload="window.print()" >')

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
       // popupWin.document.write('<html><meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"><link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"><link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css"><link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css"><link rel="stylesheet" href="../dist/css/AdminLTE.min.css"><link rel="stylesheet" href="<?=$base?>/asserts/print.css" media="print"/><body onload="window.print()" >')
        popupWin.document.write('<html><title>:: Date <?=date('d-m-y').'  Challan No '.$dc_no?>::</title><meta name="viewport" content="width=device-width, initial-scale=1", maximum-scale=1, user-scalable=no"><link rel="stylesheet" type="text/css" href="<?=$base?>/asserts/print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /></head><body onload="window.print()" >')

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