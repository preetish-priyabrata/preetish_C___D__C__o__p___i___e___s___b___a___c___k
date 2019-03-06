	<!-- /Page Container ends -->

		<!-- ScrolltoTop -->
		<a id="scrollTop" href="#top"><i class="icon-arrow-up12"></i></a>
		<!-- /ScrolltoTop -->

	</div>

<!-- Rightbar -->
<!-- <div id="right_sidebar" class="right_bar"></div> -->
<!-- <script>
function open_rightbar() {
	$(window).resize(function() {
		if(($(window).width() < 500)){
			document.getElementById("right_sidebar").style.width = "100%";
		}
		else if($(window).width() > 500) {
			document.getElementById("right_sidebar").style.width = "260px";
		}
	}).resize();
}
function close_rightbar() {
	document.getElementById("right_sidebar").style.width = "0";
}
</script> -->
<!-- /Rightbar -->

<!-- Layout settings -->
<div class="layout"></div>
<span class="is_hidden" id="jquery_vars">
	<span class="is_hidden switch-active"></span>
	<span class="is_hidden switch-inactive"></span>
	<span class="is_hidden chart-bg"></span>
	<span class="is_hidden chart-gridlines-color"></span>
	<span class="is_hidden chart-legends-text-color"></span>
	<span class="is_hidden chart-grid-text-color"></span>
	<span class="is_hidden chart-data-color-option1"></span>
	<span class="is_hidden chart-data-color-option2"></span>
	<span class="is_hidden chart-data-color-option3"></span>
	<span class="is_hidden chart-data-color-option4"></span>
	<span class="is_hidden chart-data-color-option5"></span>
	<span class="is_hidden chart-data-color-option6"></span>
	<span class="is_hidden chart-data-color-option7"></span>
	<span class="is_hidden chart-data-color-option8"></span>
</span>
<!-- /Layout settings -->

<!-- Global scripts -->
<script src="../asserts/lib/js/core/jquery/jquery.js"></script>
<script src="../asserts/lib/js/core/jquery/jquery.ui.js"></script>
<script src="../asserts/lib/js/core/bootstrap/bootstrap.js"></script>
<script src="../asserts/lib/js/core/bootstrap/jasny_bootstrap.min.js"></script>
<script src="../asserts/lib/js/core/navigation/nav.accordion.js"></script>
<script src="../asserts/lib/js/core/hammer/hammerjs.js"></script>
<script src="../asserts/lib/js/core/hammer/jquery.hammer.js"></script>
<script src="../asserts/lib/js/core/slimscroll/jquery.slimscroll.js"></script>
<script src="../asserts/lib/js/extensions/smart-resize.js"></script>
<script src="../asserts/lib/js/extensions/blockui.min.js"></script>
<script src="../asserts/lib/js/forms/uniform.min.js"></script>
<script src="../asserts/lib/js/forms/switchery.js"></script>
<script src="../asserts/lib/js/forms/select2.min.js"></script>
<script src="../asserts/lib/js/plugins/venobox.js"></script>
<script src="../asserts/lib/js/core/app/layouts.js"></script>
<script src="../asserts/lib/js/core/app/core.js"></script>
<!-- /Global scripts -->
<!-- Jquery Core Js -->
    <script src="../asserts/plugins/jquery/jquery.min.js"></script>
<!-- Page scripts -->
<script src="../asserts/lib/js/core/jquery/jquery.easing.min.js"></script>
<script src="../asserts/lib/js/charts/jquery.easypiechart.min.js"></script>
<script src="../asserts/lib/js/charts/raphael-min.js"></script>
<script src="../asserts/lib/js/charts/morris.min.js"></script>
<script src="../asserts/lib/js/charts/highcharts.js"></script>
<script src="../asserts/lib/js/charts/highcharts-more.js"></script>
<script src="../asserts/lib/js/maps/jvectormap/jvectormap.min.js"></script>
<script src="../asserts/lib/js/maps/jvectormap/map_files/world.js"></script>
<script src="../asserts/lib/js/pages/dashboard.js"></script>
<!-- /Page scripts -->
 <!-- Jquery DataTable Plugin Js -->
 <!-- 

    //code.jquery.com/jquery-1.12.4.js
    https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js
    https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js
    //cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js
    //cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js
    //cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js
    //cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js
    
    //cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js
 -->
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
   <script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.colVis.min.js"></script>
   <link type="text/css" rel="stylesheet" href="../asserts/dist/datepicker.css">
 	<script src="../asserts/dist/datepicker.js"></script>
   <script type="text/javascript">
	function detail_location(){
		var hq_code=$('#location').val();
		
		// var user_role=$('#user_role').val();
		if(hq_code!=""){
		$.ajax({
          	type:'POST',
          	url:'hq_get_machine.php',
          	data:'hq_id='+hq_code,
          	success:function(html){
            	  // $remove_display
             	// $("#remove_display").remove();
             	 $("#machine").show(1000);
              	$('#machine').html(html);
             
          	}
  		});
		}else{
			alert('Please Select Site Location');
			$('#machine').html('<option value="">--Select Site--</option>');
		}

	}
</script>
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
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
	    $("#example21").DataTable();
	} );
		
     </script>
     <script type="text/javascript">
      // here for submition is stop by enter value of keyboard
        $(document).on("keypress", "form", function(event) { 
          return event.keyCode != 13;
      });
        // here this restrict back button submition
        $(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    });
    </script>
    <script type="text/javascript">
function session_checking()
{
    $.post( "session.php", function( data ) {
        if(data == "-1")
        {
            alert("Your session has been expired!");
            location.reload();
        }
    });
}
var validateSession = setInterval(session_checking, 10000);
</script>
</body>


</html>