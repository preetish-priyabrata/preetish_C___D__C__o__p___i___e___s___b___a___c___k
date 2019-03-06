<?php
ob_start();
$title="KIIT L&D Home Page";
$menuClass1="active";
?><br>
<style type="text/css">
	.main_bg {
	    background: #34495E;
	    z-index: 100;
	    margin-top: 5pc;
	}
	.main{
		padding: 30px 0 30px 0;
	}

</style>
<div class="main_bg">
	<div class="wrap">
		<div class="main">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="box">
                <img class="banner-image" src="img/images/hr-solution.png" class="img-rounded" alt="Cinque Terre" width="304" height="236"  />
                <div class="box-content">
                    <p class="title">HR Solution</p>
                     <span class="text-category">Description on HR Solution</span>
                    <a href="#" class="read">Read More</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="box">
                <img class="banner-image" src="img/images/staffing.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236" />
                <div class="box-content">
                    <p class="title">Manpower Solution</p>
                     <span class="text-category">Description on Manpower Solution</span>
                    <a href="#" class="read">Read More</a>
                </div>
            </div>

        </div>

        <div class="col-md-4 col-sm-6">
            <div class="box">
                <img class="banner-image" src="img/images/training-solution.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236" />
                <div class="box-content">
                    <p class="title">Training</p>
                     <span class="text-category">Description on Training</span>
                    <a href="#" class="read">Read More</a>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
</div>

      


<?php
$content_display=ob_get_contents();
ob_get_clean();
include 'template_all.php';

