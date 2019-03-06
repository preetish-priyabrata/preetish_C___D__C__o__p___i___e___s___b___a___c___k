<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Centre For Advanced Training</title>

        <!-- Styles -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,700,800" rel="stylesheet" type="text/css"><!-- Google web fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><!-- font-awesome -->
        <link href="js/dropdown-menu/dropdown-menu.css" rel="stylesheet" type="text/css"><!-- dropdown-menu -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"><!-- Bootstrap -->
        <link href="js/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"><!-- Fancybox -->
        <link href="js/audioplayer/audioplayer.css" rel="stylesheet" type="text/css"><!-- Audioplayer -->
        <link href="style.css" rel="stylesheet" type="text/css"><!-- theme styles -->
		
        <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <script>
		function showUser() {
			var ref_no_verf = document.getElementById('ref_no_verf').value;
			
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","ajax/verification.php?q="+ref_no_verf,true);
				xmlhttp.send();
			}
		
	</script>
        
    </head>

    <body role="document">

        <!-- device test, don't remove. javascript needed! -->
        <span class="visible-xs"></span><span class="visible-sm"></span><span class="visible-md"></span><span class="visible-lg"></span>
        <!-- device test end -->

        <div id="k-head" class="container"><!-- container + head wrapper -->

            <?php include './template-header.php'; ?>

        </div><!-- container + head wrapper end -->

        <div id="k-body"><!-- content wrapper -->

            <div class="container"><!-- container -->

                
                <div class="col-padded">

                    <div class="row no-gutter"><!-- row -->
                      <div class="col-lg-8 col-md-8">

                        <div class="col-lg-6 col-md-6"><!-- recent news wrapper -->

                            <div class="col-padded"><!-- inner custom column -->

                                <div class="row gutter"><!-- row -->

                                    <div class="col-lg-12 col-md-12">

                                    	<h1 class="page-title">Verification </h1><!-- category title -->
                                        
                                        
                                        <div class="row" style="padding-top:30px;"><!-- starts row -->
                                            <div class="form-group clearfix col-lg-8">
                                                <input  aria-required="true" size="30" value="" name="ref_no_verf" id="ref_no_verf" class="form-control requiredField" type="text" required>
                                            </div>

                                            <div class="form-group clearfix col-lg-2 text-right remove-margin-bottom">
                                                <input value="Verify" id="submit" name="btn_enquiry" class="btn btn-default" type="button" onClick="showUser()">
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <!-- ends row -->

                                	</div>
                                    
                                     
                                    
                                </div>

                            </div><!--inner custom column end -->

                        </div><!--recent news wrapper end -->
                        
                        <div class="col-lg-6 col-md-6"><!-- recent news wrapper -->

                            <div class="col-padded"><!-- inner custom column -->

                                <div class="row gutter"><!-- row -->

                                    <div class="col-lg-12 col-md-12">

                                    	<h1 class="page-title">Certificate  </h1><!-- category title -->
                                        
                                        
                                        <form action="kiit_certificate/certificate.php" method="post"><div class="row" style="padding-top:30px;"><!-- starts row -->
                                        
                                            <div class="form-group clearfix col-lg-8">
                                                <input aria-required="true" size="30" value="" name="ref_no_dwl" id="ref_no_dwl" class="form-control requiredField" type="text" required>
                                            </div>

                                            <div class="form-group clearfix col-lg-2 text-right remove-margin-bottom">
                                                <input value="Download" id="submit" name="btn_enquiry" class="btn btn-default" type="submit">
                                            </div>
                                        </div>
                                        <?php
                if($_REQUEST['msg']=='success'){
				?>
                <div class="alert-box success"><span>This field should not be left blank</span></div>
                <?php
				}
				if($_REQUEST['msg']=='error'){
				?>
                <div class="alert-box success"><span>Ref. No. Does not Exist</span></div>
                <?php
				}
				
				?>
                                        </form>

                                	</div>
                                </div>

                            </div><!--inner custom column end -->

                        </div>
                        
                        <div class="col-lg-12 col-md-12" id="txtHint">
                                                </div>
                        
                        
                        
                        	 
                         </div>
                        
                        

                        <div class = "col-lg-4 col-md-4" id = "noticeBoard"><!--misc wrapper -->

                            <?php
                            include './news-and-events.php';
                            ?> 

                        </div><!-- misc wrapper end -->

                    </div><!-- row end -->
                </div>

            </div><!-- container end -->

        </div><!-- content wrapper end -->

        <div id="template-footer">
            <?php include './template-footer.php'; ?>
        </div>

        <!-- jQuery -->
        <script src="jQuery/jquery-2.1.1.min.js"></script>
        <script src="jQuery/jquery-migrate-1.2.1.min.js"></script>

        <!-- Bootstrap -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- Drop-down -->
        <script src="js/dropdown-menu/dropdown-menu.js"></script>

        <!-- Fancybox -->
        <script src="js/fancybox/jquery.fancybox.pack.js"></script>
        <script src="js/fancybox/jquery.fancybox-media.js"></script><!-- Fancybox media -->

        <!-- Responsive videos -->
        <script src="js/jquery.fitvids.js"></script>

        <!-- Audio player -->
        <script src="js/audioplayer/audioplayer.min.js"></script>

        <!-- Pie charts -->
        <script src="js/jquery.easy-pie-chart.js"></script>

        <!-- Google Maps -->
        <script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>

        <!-- Theme -->
        <script src="js/theme.js"></script>

    </body>
</html>