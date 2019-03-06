<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	
	<title>Maniac - Blank Page</title>
	
	<!-- BEGIN CORE FRAMEWORK -->
	<link href="../assert_admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assert_admin/assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
	<link href="../assert_admin/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<!-- END CORE FRAMEWORK -->

	<!-- BEGIN THEME STYLES -->
	<link href="../assert_admin/assets/css/material.css" rel="stylesheet" />
	<link href="../assert_admin/assets/css/style.css" rel="stylesheet" />
	<link href="../assert_admin/assets/css/helpers.css" rel="stylesheet" />
	<link href="../assert_admin/assets/css/plugins.css" rel="stylesheet" />
	<link href="../assert_admin/assets/css/responsive.css" rel="stylesheet" />
	
	<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet">
	<!-- END THEME STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-header">
	<!-- BEGIN HEADER -->
	<header>
		<a href="admin_dashboard.php" class="logo"><i class="ion-ios-bolt"></i> <span>TnP</span></a>
		<nav class="navbar navbar-static-top">
			<a href="#" class="navbar-btn sidebar-toggle">
				<span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
			<div class="navbar-header">
				<!-- <ul class="nav navbar-nav pull-left">
					<li><a href="#"><i class="ion-arrow-expand"></i></a></li>
					<li><a href="#"><i class="ion-image"></i></a></li>
					<li class="dropdown dropdown-inverse">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ion-plus-round"></i></a>
						<ul class="dropdown-menu">
							<li>
								<a href="#"><i class="ion-compose"></i> New Post </a>
							</li>
							<li>
								<a href="#"><i class="ion-person-add"></i> New User </a>
							</li>
							<li>
								<a href="#"><i class="ion-chatbox"></i> New Comment </a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#" class="clearfix"><span class="pull-left">Comments</span> <span class="label bg-teal-500 pull-right">3</span></a>
							</li>
							<li>
								<a href="#" class="clearfix"><span class="pull-left">Articles</span> <span class="label bg-red-500 pull-right">2</span></a>
							</li>
						</ul>
					</li>
				</ul> -->
			</div>
            <div class="navbar-right">
				<!-- <form role="search" class="navbar-form pull-left" method="post" action="#">
					<div class="btn-inline">
						<input type="text" class="form-control padding-right-35" placeholder="Search..."/>
						<button class="btn btn-link no-shadow bg-transparent no-padding-top padding-right-10" type="button"><i class="ion-search"></i></button>
					</div>
				</form -->

				
			</div>
        </nav>
    </header>
	<!-- END HEADER -->

	<!-- <div class="wrapper"> -->
	<?php  include 'side_bar.php';?>
	
	<!-- </div> -->
	<?php
	// include 'content.php';
	 echo "$contents"; 

	?>


<!-- BEGIN CORE PLUGINS -->
<script src="../assert_admin/assets/plugins/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="../assert_admin/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assert_admin/assets/plugins/bootstrap/js/holder.js"></script>
<script src="../assert_admin/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="../assert_admin/assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assert_admin/assets/js/core.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- maniac -->
<script src="../assert_admin/assets/js/maniac.js" type="text/javascript"></script>
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
   <script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.colVis.min.js"></script>
    <script type="text/javascript">
     	$(document).ready(function() {
    		$('#example').DataTable( {
       			dom: 'Bfrtip',
       			buttons: [
            		'copy', 'csv', 'excel', 'pdf', 'print'    
				]
        			           	
    		} );
		} );
		$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#example1 tfoot th').each( function () {
	        var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );
	 
	    // DataTable
	    var table = $('#example1').DataTable();
	 
	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
	    $("#example21").DataTable();
	} );
		
     </script>
<!-- sliders -->
<script type="text/javascript">
</script>
</body>
<!-- END BODY -->
</html>