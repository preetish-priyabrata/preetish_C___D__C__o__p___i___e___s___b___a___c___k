<?php
ob_start();
$title="KIIT L&D Home Page";
$menuClass1="active";
?>

<div class="main_bg" >
            <div class="wrap">
                <div class="main" style="padding:0"> 
                    <!-- start gallery  -->
                    <div class="container">
                        <div id="portfoliolist"> <a class="popup-with-zoom-anim" >
                                <div class="portfolio logo1" data-cat="logo">
                                    <div class="portfolio-wrapper"> <img class="banner-image" src="img/images/hr-solution.png"  alt="Image 2" />
                                        <div class="label">
                                            <div class="label-text">
                                                <p class="text-title">HR Solution</p>
                                                <span class="text-category">Description on HR Solution</span> </div>
                                            <div class="label-bg"></div>
                                        </div>
                                    </div>
                                </div>
                            </a> <a class="popup-with-zoom-anim" >
                                <div class="portfolio app" data-cat="app">
                                    <div class="portfolio-wrapper"> <img class="banner-image" src="img/images/staffing.jpg"  alt="Image 2" />
                                        <div class="label">
                                            <div class="label-text">
                                                <p class="text-title">Manpower Solution</p>
                                                <span class="text-category">Description on Manpower Solution</span> </div>
                                            <div class="label-bg"></div>
                                        </div>
                                    </div>
                                </div>
                            </a> <a class="popup-with-zoom-anim" >
                                <div class="portfolio web" data-cat="web">
                                    <div class="portfolio-wrapper"> <img class="banner-image" src="img/images/training-solution.jpg"  alt="Image 2" />
                                        <div class="label">
                                            <div class="label-text">
                                                <p class="text-title">Training</p>
                                                <span class="text-category">Brief Description</span> </div>
                                            <div class="label-bg"></div>
                                        </div>
                                    </div>
                                </div>
                            </a> </div>
                    </div>
                    <!-- end container --> 
                </div>
            </div>
        </div>


<?php
$content_display=ob_get_contents();
ob_get_clean();
include 'template_all.php';

