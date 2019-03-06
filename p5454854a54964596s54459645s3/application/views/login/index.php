<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?=base_url()?>theme_asserts/assets/images/favicon_1.ico">

        <title>Admin Login </title>

        <link href="<?=base_url()?>theme_asserts/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>theme_asserts/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>theme_asserts/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>theme_asserts/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>theme_asserts/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>theme_asserts/assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/style.css" />
        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?=base_url()?>theme_asserts/assets/js/modernizr.min.js"></script>
<!-- <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-69506598-1', 'auto');
    ga('send', 'pageview');
</script>
         -->
         <style type="text/css">
             .card-box {
                z-index: 112;
                background: #404854;
             }
         </style>
    </head>
    <body style="background-image: url('<?=base_url()?>img/3303361.jpg'); height: 1440px;">

        <div class="account-pages"></div>
        <div class="animations-on">
    <div id="background" class="sky_back"></div>
    <div id="midground" class="sky_back"></div>
    <div id="foreground" class="sky_back"></div>
    <div id="page-wrap">
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class=" card-box">
            <div class="panel-heading"> 
                <h3 class="text-center"> Admin <strong class="text-custom">Login </strong> </h3>
            </div> 


            <div class="panel-body">
             <?php if ($this->session->flashdata('msg1')) {?>
        <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"> <?php echo $this->session->flashdata('msg1'); ?> </i></h4>
                  
                  </div>
                    <?php }
?>
                     <?php if ($this->session->flashdata('msg')) {?>
 <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i>  <?php echo $this->session->flashdata('msg'); ?></h4>
                  
                  </div>
                   <?php }
?>
            <form  action="<?=base_url()?>check-user" method="Post">
            <div class="form-horizontal m-t-20">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="username" required="" placeholder="Email id">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password"  required="" placeholder="Password">
                    </div>
                </div>

               <!--  <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">
                                Remember me
                            </label>
                        </div>
                        
                    </div>
                </div> -->
                
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

                <!-- <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                    </div>
                </div> -->
                </div>
            </form> 
            
            </div>   
            </div>                              
              <!--   <div class="row">
                <div class="col-sm-12 text-center">
                    <p>Don't have an account? <a href="page-register.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                        
                    </div>
            </div> -->
            
        </div>
    </div>
    </div>  

        
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?=base_url()?>theme_asserts/assets/js/jquery.min.js"></script>
        <script src="<?=base_url()?>theme_asserts/assets/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>theme_asserts/assets/js/detect.js"></script>
        <script src="<?=base_url()?>theme_asserts/assets/js/fastclick.js"></script>
        <script src="<?=base_url()?>theme_asserts/assets/js/jquery.slimscroll.js"></script>
        <script src="<?=base_url()?>theme_asserts/assets/js/jquery.blockUI.js"></script>
        <script src="<?=base_url()?>theme_asserts/assets/js/waves.js"></script>
        <script src="<?=base_url()?>theme_asserts/assets/js/wow.min.js"></script>
        <script src="<?=base_url()?>theme_asserts/assets/js/jquery.nicescroll.js"></script>
        <script src="<?=base_url()?>theme_asserts/assets/js/jquery.scrollTo.min.js"></script>


        <script src="<?=base_url()?>theme_asserts/assets/js/jquery.core.js"></script>
        <script src="<?=base_url()?>theme_asserts/assets/js/jquery.app.js"></script>
    
    </body>
</html>




