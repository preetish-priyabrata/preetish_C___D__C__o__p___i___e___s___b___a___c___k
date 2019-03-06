<?php 
session_start();
// ob_start();
if (($_SESSION['userId']!="")) {
	
	include 'config.php';
	$student_roll=$_POST['student_roll'];
	
	  $student_query="SELECT * FROM `tbl_certificate_list` WHERE `student_roll`='$student_roll'";
	$student_sql=mysqli_query($conn,$student_query);
	 $num=mysqli_num_rows($student_sql);
	if($num=='0'){
		?>
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">Sorry No List Is found Please Check Again</h3>
			</div>
		</div>
		<?php
		exit;
	}else{
		?>
		
		<div class="row">
			<hr>
			<h3 class="text-center">List Of Student</h3>
			<div class="form-group col-lg-12">
		<table id="example" class="display nowrap table-striped" cellspacing="0">
			<thead>
				<tr>
					<th>Roll No</th>
					<th>Student Name</th>
					<th>Program Name</th>
					<th>Program Completion Certificate </th>
					<th>Merit Certificate </th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Roll No</th>
					<th>Student Name</th>
					<th>Program Name</th>
					<th>Program Completion Certificate </th>
					<th>Merit Certificate </th>
				</tr>
			</tfoot>
			<tbody>
				<?php 
					$student_query1="SELECT DISTINCT `batch_id`,`course_id` FROM `tbl_certificate_list` WHERE  `student_roll`='$student_roll' ";
				$student_sql1=mysqli_query($conn,$student_query1);
				while ($res=mysqli_fetch_assoc($student_sql1)) {
					// print_r($res);
					$batch_id=$res['batch_id'];
					$course_id=$res['course_id'];
					$student_query2="SELECT * FROM `tbl_certificate_list` WHERE `batch_id`='$batch_id' and `course_id`='$course_id' and `student_roll`='$student_roll'  ";
					$student_sql2=mysqli_query($conn,$student_query2);
					$student_query3="SELECT * FROM `tbl_certificate_list` WHERE `batch_id`='$batch_id' and `course_id`='$course_id' and `student_roll`='$student_roll'  ";
					$student_sql3=mysqli_query($conn,$student_query3);
					$res3=mysqli_fetch_assoc($student_sql3);
					
			?>
				<tr>
					<td><?=$res3['student_roll'];?></td>
					<td><?=$res3['student_name'];?></td>
					<td><?=$res3['student_course'];?></td>
					<?php while ($res2=mysqli_fetch_assoc($student_sql2)) {
						
						if(($res2['certificate_status']==2) && ($res2['type_cer']==8) ){
							?>
							<td><a href="#">Click For Merit</a></td>
							<?php

						}
						if(($res2['certificate_status']==4) && ($res2['type_cer']==8)){
							?>
							<td>--</td>
							<?php

						}
						if(($res2['certificate_status']==1 )&& ($res2['type_cer']==9)) {
							?>
							<td><a href="#">Click For Completation</a></td>
							<?php

						}
						if(($res2['certificate_status']==3) && ($res2['type_cer']==9)){
							?>
							<td>--</td>
							<?php

						}

					}?>
				
				</tr>
				<?php }?>
			</tbody>
		</table>

</div>
<hr>
</div>
 <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <!-- <script src="../asserts/myjs/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
   <script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.colVis.min.js"></script>
     <!-- <script src="../asserts/plugins/jquery/jquery.min.js"></script> -->
     <!-- 'copy', 'csv', 'excel', 'pdf', 'print' -->
     <!-- buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ], -->
        <!-- buttons: [
            		'copy', 'csv', 'excel', 'pdf', 'print'    
				] -->
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
	                	// .columns( 0 )
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
	    $("#example21").DataTable();
	} );
		
     </script>
		<?php 
		exit;
	}

}else{
	header('Location:logout.php');
    exit;
}
// $contents = ob_get_contents();
// ob_clean();
// include '../template/header.php';