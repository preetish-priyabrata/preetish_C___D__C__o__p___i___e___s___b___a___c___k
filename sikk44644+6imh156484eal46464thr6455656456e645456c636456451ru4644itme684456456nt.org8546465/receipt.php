<?php 
	// print_r($_GET);
	// exit;
	// Array ( [CustomerID] => SKHF_20180207_9 ) 
	include 'config.php';
	session_start();
	if($_SESSION['user_no']){
		$CustomerID=$_GET['CustomerID'];
		$responde_receiced=$_SESSION['responde_receiced'];
		$array_id=explode("|",$responde_receiced);
		$TxnAmount=$array_id[4];
		$TxnDate=$array_id[13];
		$CustomerID_sess=web_decryptIt(str_replace(" ", "+",$_SESSION['CustomerID']));
		$slno_group_pay=web_decryptIt(str_replace(" ", "+",$_SESSION['secure_ids']));
		if($CustomerID_sess==$CustomerID){
			$check_query="SELECT * FROM `ilab_payment_info` WHERE `payment_reference_no`='$CustomerID' and `mobile_no`='$_SESSION[user_no]' and `application_no`='$_SESSION[application_no]' and `slno_group_pay`='$slno_group_pay'";
			$sql_check_query=mysqli_query($conn,$check_query);
			$numrow=mysqli_num_rows($sql_check_query);
			if($numrow==1){

				$candidate_name=$_SESSION['candidate_name'];
			}else{
				header('Location:logout');
        		exit;
			}
		}else{
			header('Location:logout');
        	exit;
		}
	}else{
		header('Location:logout');
        exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="receipt.css">
</head>
<body>

	<div class="container">
<div  id="printarea">
	<div id="section-to-print">
		<div class="text-center">
			<h3>Confirmation Receipt</h3>
		</div>
		<div class="receipt-content">
		    <div class="container bootstrap snippet">
				<div class="row">
					<div class="col-md-12">
						<div class="invoice-wrapper">
							<div class="intro">
								Hi <strong><?=$candidate_name?></strong>, 
								<br>
								The following is a receipt dealing your fees payment cost.
							</div>

							<div class="payment-info">
								<div class="row">
									<div class="col-sm-6">
										<span>Reference No.</span>
										<strong><?=$CustomerID?></strong>
									</div>
									
									<div class="col-sm-6 text-right">
										<span>Payment Date</span>
										<strong><?=$TxnDate?></strong>
									</div>
									<!-- <div class="col-sm-6">
										<span>Payment No.</span>
										<strong>434334343</strong>
									</div> -->
								</div>
							</div>

							<!-- <div class="payment-details">
								<div class="row">
									<div class="col-sm-6">
										<span>Client</span>
										<strong>
											Andres felipe posada
										</strong>
										<p>
											989 5th Avenue <br>
											City of monterrey <br>
											55839 <br>
											USA <br>
											<a href="#">
												jonnydeff@gmail.com
											</a>
										</p>
									</div>
									<div class="col-sm-6 text-right">
										<span>Payment To</span>
										<strong>
											Juan fernando arias
										</strong>
										<p>
											344 9th Avenue <br>
											San Francisco <br>
											99383 <br>
											USA <br>
											<a href="#">
												juanfer@gmail.com
											</a>
										</p>
									</div>
								</div>
							</div> -->

							<div class="line-items">
								<div class="headers clearfix">
									<div class="row">
										<div class="col-sm-6">Description</div>
										<!-- <div class="col-sm-3">Quantity</div> -->
										<div class="col-sm-6 text-right">Amount</div>
									</div>
								</div>
								<div class="items">
									<?php 
										$fetch_post=mysqli_fetch_assoc($sql_check_query);
										$post_name=json_decode($fetch_post['post_name']);
										$price_list=json_decode($fetch_post['price_list']);
										for ($i=0; $i <count($post_name) ; $i++) {
										?>
									<div class="row item">
										<div class="col-sm-6 desc">
											<?=$post_name[$i];?>
										</div>
										<!-- <div class="col-sm-3 qty">
											3
										</div> -->
										<div class="col-sm-6 amount text-right">
											&#8377; <?=$price_list[$i];?>
										</div>
									</div>
									<?php }?>
								</div>
								<div class="total text-right">
									<p class="extra-notes">
										<strong>Notes</strong>
										Please print or save a copy of this receipt for your records.
										Thanks a lot.
									</p>
									<!-- <div class="field">
										Subtotal <span>$379.00</span>
									</div>
									<div class="field">
										Shipping <span>$0.00</span>
									</div>
									<div class="field">
										Discount <span>4.5%</span>
									</div> -->
									<div class="field grand-total">
										Total <span>&#8377; <?=$TxnAmount?></span>
									</div>
								</div>

								
							</div>
							<br>
							<br>
							<div class="print text-center" id="printPageButton">
									
									<button id="printPageButton"  onclick="PrintDoc()" class="fa fa-print">Print this receipt</button>
									<a href="user_dashboard"> Back</a>
							</div>
						</div>

						<!-- <div class="footer">
							Copyright © 2014. company name
						</div> -->
					</div>
				</div>
			</div>
		</div> 
		</div>
		</div> 
	</div>



	<script type="text/javascript">
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
/*--This JavaScript method for Print command--*/

    function PrintDoc() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=auto,height=450,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>:: Date <?=date('d-m-y').'  Roll No'.$res[roll_no]?>::</title><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" type="text/css" href="print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><link rel="stylesheet" type="text/css" href="receipt.css"></head><body onload="window.print()" >')

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

        popupWin.document.write('<html><title>::Print Preview::</title><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" type="text/css" href="print.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><link rel="stylesheet" type="text/css" href="receipt.css"></head><body">')

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

</body>
</html>