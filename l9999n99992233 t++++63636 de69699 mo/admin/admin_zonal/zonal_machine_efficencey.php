<?php
session_start();
ob_start();
if($_SESSION['admin_zonal']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Machine Performance Form ";
$zonal_place=$_SESSION['zonal_place'];
?>
<style type="text/css">

.panel-body p {
    margin-top: 10px;
}

</style>
<!-- <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css"> -->
	<!--Page Header-->
<div class="header">
	<div class="header-content">
		<div class="page-title"><i class="icon-display4"></i> Machine Performance Form</div>
		<ul class="breadcrumb">
			<li><a href="zonal_dashboard.php"></a></li>
			<li class="">Dashboards</li>
			<li class="">Machine Information </li>
			<li class="active">Machine Performance Add</li>
		</ul>
	</div>
</div>
	<!-- /Page Header-->
<div class="container-fluid page-content">
	<div class="row">
		<?php $msg->display(); ?>
		 <div class="col-md-12 col-sm-12">
		  <!-- Basic inputs -->
			 <div class="panel panel-default">
			   <div class="panel-heading">
				 <div class="panel-title">Machine Performance Form</div>
				   </div>
				     <div class="panel-body">
					   	<form name="myFunction" id="myform" autocomplete="off" class="form-horizontal" action="zonal_machine_efficencey_save.php" method="POST">
					   		<input type="hidden" name="form_type" value="<?=web_encryptIt('machine_information')?>">
					   		<div class="row">
							   	<div class="col-lg-6">
							   		<div class="form-group">
									    <label class="control-label col-lg-4 text-right" for="Machine"> Machine No:</label>
									    <div class="col-lg-8">
										<select class="form-control" name="Machine" id="Machine" required="">
											<?php
											$query="SELECT * FROM `lt_master_machine__transfer_information` WHERE `t_status`='1' and `t_store_site_location`='$zonal_place'";
											$sql_exe=mysqli_query($conn,$query);
											while ($res=mysqli_fetch_assoc($sql_exe)) {
										?>
											<option value="<?=$res['t_unique_id_machine']?>"><?=$res['t_unique_id_machine']?></option>
											<?php
										}  
										// `w_h`, `i_h`, `b_d_mcl`, `b_d_lnt`, `avl_hrs`, `shift_hrs`, `picks`, `diesel`, `production`, `site_mine_loc`,
										?>

										</select>
								   </div>
								</div>
								<div class="form-group">
								    <label class="control-label col-lg-4 text-right" for="w_h">W/H : </label>
								    <div class="col-lg-8">
										<input type="text" class="form-control" name="w_h" id="w_h"   required="">
								   </div>
								</div>
								<div class="form-group">
								    <label class="control-label col-lg-4 text-right" for="w_h">I/H : </label>
								    <div class="col-lg-8">
										<input type="text" class="form-control" name="i_h" id="i_h"   required="">
								   </div>
								</div>
								<div class="form-group">
								    <label class="control-label col-lg-4 text-right" for="m_t">M/T : </label>
								    <div class="col-lg-8">
										<input type="text" class="form-control" name="m_t" id="m_t"   required="">
								   </div>
								</div>
								<div class="form-group">
								    <label class="control-label col-lg-4 text-right" for="b_d_mcl">B/D MCL : </label>
								    <div class="col-lg-8">
										<input type="text" class="form-control" name="b_d_mcl" id="b_d_mcl"   required="">
								   </div>
								</div>
								<div class="form-group">
								    <label class="control-label col-lg-4 text-right" for="b_d_lnt">B/D L&T : </label>
								    <div class="col-lg-8">
										<input type="text" class="form-control" name="b_d_lnt" id="b_d_lnt"   required="">
								   </div>
								</div>
							</div>
							<div class="col-lg-6">
								
								<div class="form-group">
								    <label class="control-label col-lg-4 text-right" for="avl_hrs">AVL.HRS : </label>
								    <div class="col-lg-8">
										<input type="text" class="form-control" name="avl_hrs" id="avl_hrs"   required="">
								   </div>
								</div>
								<div class="form-group">
								    <label class="control-label col-lg-4 text-right" for="shift_hrs">Shift Hrs : </label>
								    <div class="col-lg-8">
										<input type="text" class="form-control" name="shift_hrs" id="shift_hrs"   required="">
								   </div>
								</div>
								<div class="form-group">
								    <label class="control-label col-lg-4 text-right" for="picks">PICKS : </label>
								    <div class="col-lg-8">
										<input type="text" class="form-control" name="picks" id="picks"   required="">
								   </div>
								</div>
								<div class="form-group">
								    <label class="control-label col-lg-4 text-right" for="diesel">DIESEL : </label>
								    <div class="col-lg-8">
										<input type="text" class="form-control" name="diesel" id="diesel"   required="">
								   </div>
								</div>
								<div class="form-group">
								    <label class="control-label col-lg-4 text-right" for="production">PRODUCTION : </label>
								    <div class="col-lg-8">
										<input type="text" class="form-control" name="production" id="production"  required="">
								   </div>
								</div>
								<div class="form-group">
								    <label class="control-label col-lg-4 text-right" for="site_mine_loc">Site / Mines Location  : </label>
								    <div class="col-lg-8">
										<input text="text" class="form-control" name="site_mine_loc" id="site_mine_loc"  required="">
								   </div>
								</div>
							</div>
						</div>

      
						<br>
						<div class="row">
							<div class="form-group">
								<div class="text-center ">
								    <input type="submit" class="btn btn-success" name="get" Value="ADD Detail">
							   </div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
// just for the demos, avoids form submit
// jQuery.validator.setDefaults({
//   debug: true,
//   success: "valid"
// });
$( "#myform" ).validate({
  rules: {
    w_h: {
      required: true,
      number: true
    },
    i_h: {
      required: true,
      number: true
    },
    b_d_mcl: {
      required: true,
      number: true
    },
    b_d_lnt: {
      required: true,
      number: true
    },
    m_t: {
      required: true,
      number: true
    },
    avl_hrs: {
      required: true,
      number: true
    },
    shift_hrs: {
      required: true,
      number: true
    },
    picks: {
      required: true,
      number: true
    },
    diesel: {
      required: true,
      number: true
    },
    production: {
      required: true,
      number: true
    },
    site_mine_loc: "required"
  }
});
$(".selector").validate({
  submitHandler: function(form) {
    // do other things for a valid form
    form.submit();
  }
});
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
    // Setup - add a text input to each footer cell
    $('#example77 tfoot th').not(":eq(0),:eq(4)").each( function () {
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
	$(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script>
<!-- <script>
// just for the demos, avoids form submit
jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
// `w_h`, `i_h`, `b_d_mcl`, `b_d_lnt`, `avl_hrs`, `shift_hrs`, `picks`, `diesel`, `production`, `site_mine_loc`,
										
$( "#myform" ).validate({
  rules: {
    w_h: {
      required: true,
      number: true
    },
    i_h: {
      required: true,
      digits: true
    },
    b_d_mcl: {
      required: true,
      digits: true
    },
    b_d_lnt: {
      required: true,
      digits: true
    },
    m_t: {
      required: true,
      digits: true
    },
    avl_hrs: {
      required: true,
      digits: true
    }
    shift_hrs: {
      required: true,
      digits: true
    },
    picks: {
      required: true,
      digits: true
    },
    diesel: {
      required: true,
      digits: true
    },
    production: {
      required: true,
      digits: true
    },
    site_mine_loc: "required"
   

  }
});
// $().ready(function () {
//   // validate signup form on keyup and submit
//   $("#myform").validate({
//     rules: {
//       firstname: "required",
//       lastname: "required",
//       address1: "required",
//       city: "required",
//       county: "required",
//       postcode: "required",

//       password_s: {
//         required: true,
//         minlength: 5
//       },
//       password_s_con: {
//         required: true,
//         minlength: 5,
//         equalTo: "#password_s"
//       },
//       email: {
//         required: true,
//         email: true
//       },

//       agree: "required"
//     },
//     messages: {
//       firstname: "Please enter your first name",
//       lastname: "Please enter your last name",
//       address1: "Please enter your addres",
//       city: "Please enter your city/town",
//       county: "Please enter your county",
//       postcode: "Please enter your postcode",

//       password: {
//         required: "Please provide a password",
//         minlength: "Your password must be at least 5 characters long"
//       },
//       confirm_password: {
//         required: "Please provide a password",
//         minlength: "Your password must be at least 5 characters long",
//         equalTo: "Please enter the same password as above"
//       },
//       email: "Please enter a valid email address",
//       agree: "Please accept our policy"
//     },
//     submitHandler: function (form) { // for demo
//       alert('valid form');
//       return false;
//     }
//   });
</script>

 -->