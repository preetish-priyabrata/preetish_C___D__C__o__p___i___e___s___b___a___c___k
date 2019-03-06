<?php 
ob_start();

?>
<style type="text/css">
    .alumni-story .alumni-story-wrapper .alumni-story-img img {
    width: 100%;
}
.page-content a img, .post-content a img, .comment-content a img {
    display: block;
}
a {
    color: #757575;
    -moz-transition: all 0.3s ease-in-out 0s;
    -webkit-transition: all 0.3s ease-in-out 0s;
    -ms-transition: all 0.3s ease-in-out 0s;
    -o-transition: all 0.3s ease-in-out 0s;
    transition: all 0.3s ease-in-out 0s;
}
.alumni-story .alumni-story-wrapper {
    margin-bottom: 75px;
    float: left;
}
.alumni-story .alumni-story-wrapper .alumni-story-content {
    margin-top: 35px;
    padding-left: 30px;
    float: left;
    width: 100%;
}
.alumni-story .alumni-story-wrapper .alumni-story-content h3 {
    color: #484848;
    line-height: 1.4;
    margin-top: 0px;
    margin-bottom: 20px;
}
.entry-summary h3, .page-content h3, .post-content h3, .comment-content h3 {
    font-size: 18px;
    font-size: 1.8rem;
    line-height: 1.3333;
    margin-top: 2.6667em;
    margin-bottom: 1.3333em;
}
.heading-regular, .text-regular {
    font-family: "Montserrat-Regular";
}
h1, h2, h3, h4, h5, h6 {
    clear: both;
    font-weight: 500;
    color: #484848;
    font-family: "Montserrat-Regular";
}
.alumni-story .alumni-story-wrapper .alumni-story-content .dates {
    float: left;
    margin-top: 20px;
    font-size: 13px;
    color: #9f9f9f;
}
</style>
<!--  -->
<!-- <link rel="stylesheet" type="text/css" href="css/about.css"> -->
<section>
	  <!--Begin content wrapper-->
        <div id="content" class="site-content content-wrapper page-content">       
            <article id="post-2116" class="post-2116 page type-page status-publish hentry">
                <div class="entry-content">
                    <div class="page-content-body">
                    <!-- <div id="pl-2116"  class="panel-layout" ><div id="pg-2116-0"  class="panel-grid panel-no-style" ><div id="pgc-2116-0-0"  class="panel-grid-cell" ><div id="panel-2116-0-0-0" class="so-panel widget widget_sayidan_banner_widget panel-first-child" data-index="0" ><div class="so-widget-sayidan_banner_widget so-widget-sayidan_banner_widget-default-d75171398898"> -->
                        <div class="alumni-interview" style="background: url('img/interview/Alumni-Interview-reet-khanuja.jpg') no-repeat;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12 pull-right">
                                        <div class="interview-wrapper">
                                            <div class="interview-title animated lightSpeedIn">
                                                <h4 class="heading-light text-capitalize">Alumni Interview</h4>
                                                <h1 class="heading-light text-capitalize">Reet Khanuja</h1>
                                            </div>
                                            <div class="interview-desc text-left animated rollIn">
                                                <p class="text-light">The energy and enthusiasm driven by our professors brought the best out of me.The exposure and the experience gained at various seminars, conclave and workshops conducted by experienced corporate professionals helped and motivated me to opt for the right career path.</p>
                                            </div>
                                            <div class="interview-see-story animated zoomInLeft">
                                                <a class="see-story bnt text-uppercase" href="#">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        </div><!--end alumni stories-->
                    </div>
                </div>
            </article>
        </div>
    </section>
    <br>
    <section>
        <div class="alumni-story">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="alumni-story-wrapper">
                            <div class="alumni-story-img" >
                                <a href="../story/i-found-the-way-how-to-setup-my-goals/index.html">
                                    <img width="569" height="331" src="img/interview/yuvraj.mehta-GMR-Group-569x331.jpg" class="img-responsive wp-post-image" alt="" />
                                </a>
                            </div>
                            <div class="alumni-story-content">
                                <h3 class="heading-regular">
                                    <a href="../story/i-found-the-way-how-to-setup-my-goals/index.html">Yuvraj Mehta: I Found The Way How To Setup My Goals</a
                                ></h3>
                                <p class="text-light">kjdfjgtjdoyoyuotiuyoitryiouyoiruit[...]                            </p>
                                <span class="dates text-center">July 25, 2016</span>                                
                            </div>
                        </div>
                    </div>
                    <div class="pagination-wrapper"></div>
                </div><!-- col -->
            </div><!-- row -->
        </div>
    </section>

				
<?php 

$content_display=ob_get_contents();
ob_get_clean();
include 'template_all.php';