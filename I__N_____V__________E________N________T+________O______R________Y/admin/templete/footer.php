	<!-- /Page Container ends -->

		<!-- ScrolltoTop -->
		<a id="scrollTop" href="#top"><i class="icon-arrow-up12"></i></a>
		<!-- /ScrolltoTop -->

	</div>

<!-- Rightbar -->
<div id="right_sidebar" class="right_bar"></div>
<script>
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
</script>
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

</body>


</html>