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
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="img/images/hr-solution.png" alt=""></a>
           <span style="border: 2px solid #8c0303;"></span>
            <div class="card-body">
              <h4 class="card-title text-center">
                <!-- <a href="#">Project One</a> -->HR Solution
              </h4>
              <p class="card-text text-center">Description on HR Solution</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="img/images/staffing.jpg" alt=""></a>
           <span style="border: 2px solid #8c0303;"></span>
            <div class="card-body">
              <h4 class="card-title text-center">
                <!-- <a href="#">Project Two</a> -->
                Manpower Solution
              </h4>
              <p class="card-text text-center">Description on Manpower Solution</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="img/images/training-solution.jpg" alt=""></a>
           	<span style="border: 2px solid #8c0303;"></span>
            <div class="card-body">
              <h4 class="card-title text-center">
                <!-- <a href="#">Project Three</a> -->Training
              </h4>
              <p class="card-text text-center">Description on Training</p>
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

