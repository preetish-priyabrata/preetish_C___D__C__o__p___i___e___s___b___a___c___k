<?php 
ob_start();

?>

<link rel="stylesheet" type="text/css" href="css/about.css">
<section>
	<!--Begin content wrapper-->
    <div id="content" class="site-content content-wrapper page-content">
    	<div class="entry-header text-center">
    		<h1 class="entry-title">Directors Message</h1>
    	</div>
    	<div class="page-content">
    		<div class="container">						
				<article id="post-2635" class="post-2635 page type-page status-publish has-post-thumbnail hentry">

            		<div class="entry-content">
                		<div class="page-content-body">
                    		<p>
                    			<img class="size-medium wp-image-2636 alignleft" src="img/director/KSOM-director-prof-Debasish-Das-300x252.jpg" alt="" width="300" height="252" srcset="http://alumni.ksom.ac.in/wp-content/uploads/2017/08/KSOM-director-prof-Debasish-Das-300x252.jpg 300w, http://alumni.ksom.ac.in/wp-content/uploads/2017/08/KSOM-director-prof-Debasish-Das-768x644.jpg 768w, http://alumni.ksom.ac.in/wp-content/uploads/2017/08/KSOM-director-prof-Debasish-Das.jpg 950w" sizes="(max-width: 300px) 100vw, 300px" />
                    			We are proud to have you as a part of this unique association of KSOM alumni. This Alumni Network provides a forum for our alumni to share expertise and best practices, post job opportunities as well as provides a means to stay connected with people who share a common alma mater. We plan to provide you a platform that enhances your professional and personal life through networking. We hope that you will actively participate here in encouraging current students and by spreading information related to KSOM on a regular basis.
                    		</p>
							<p>We would love to hear from you as to how our program helped prepare you for your career.</p>
							<p>We wish you continued success in your career!</p>
                		</div>
                    </div><!-- .entry-content -->
                </article>
                <!-- #post-## -->
			</div>
		</div>
	</div><!-- #primary -->
</section>
				
<?php 

$content_display=ob_get_contents();
ob_get_clean();
include 'template_all.php';