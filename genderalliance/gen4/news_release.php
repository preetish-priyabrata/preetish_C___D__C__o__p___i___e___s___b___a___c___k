<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
    <link href="assert/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="dist/css/lightbox.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="dist/css/lightbox.min.css">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/bootsnav.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/new_style.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
     <!-- <link href="magnific/magnific-popup.css" rel="stylesheet"> -->
    <!--  <link href="css/prettyPhoto.css" rel="stylesheet">
     <link href="css/custom.css" rel="stylesheet">
    
 -->     <script type="text/javascript">
    $("[rel='tooltip']").tooltip();    
 
    $('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(25); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(25); //.fadeOut(205)
        }
    ); 
  </script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="padding: 0;margin: 0;">
    <div class="container-fluid" style="padding: 0;margin: 0; border-bottom: 0px solid yellow;">
      <div class="row" style="margin-right: 1px;">
        <header>
          <div  style="background-color: black">
            <img src="img/Logo.jpg" class="logo" width="100%" height="20%">
          </div>
        </header>
      </div>
      <div class="clearfix"></div>
      <div class="row" style=" background-color: #800000">
              <div class="text-right" id="socal_id">
                <a href="#" class="fa fa-facebook "></a>
                <a href="#" class="fa fa-television "></a>
                <a href="#" class="fa fa-google "></a>
                <a href="#" class="fa fa-youtube "></a>
              </div>
            </div>
    </div>
 <style type="text/css">
    
.our-team{
    border: 1px solid #d3d3d3;
    position: relative;
    overflow: hidden;
}
.our-team img{
    width: 100%;
    /*height: auto;*/
    height: 307px;
}
.our-team .team-content{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    padding: 45px 18px;
    background: rgba(0,0,0,0.7);
    transform: translateX(-100%);
    transition: all 0.20s ease 0s;
}
.our-team:hover .team-content{
    transform: translateX(0);
}
.our-team .team-content .post-title{
    font-size: 18px;
    color: #fff;
    text-transform: uppercase;
}
.our-team .team-content .post{
    font-size: 14px;
    color: #cb95e1;
    display: block;
    margin-bottom: 20px;
}
.our-team .description{
    font-size: 14px;
    line-height: 25px;
    color: #fff;
    margin-bottom: 20px;
}
.our-team .team_social{
    margin:0;
    padding:0;
    list-style: none;
}
.our-team .team_social li{
    display: inline-block;
    margin-right: 5px;
}
.our-team .team_social li a{
    width: 40px;
    height: 40px;
    border-radius: 50%;
    /*border: 2px solid #f5f5f5;*/
    font-size: 17px;
    color: #f5f5f5;
    line-height: 40px;
    text-align: center;
    display: inline-block;
    transition: border 0.3s ease 0s;
}
.our-team .team_social li a:hover{
    border-color: transparent;
}
.our-team .team-prof{
    width: 100%;
    position: absolute;
    bottom: 0;
    text-align: right;
    padding: 20px 16px;
    background: rgba(0,0,0,0.7);
    transform: translateX(0);
    transition: all 0.20s ease 0s;
}
.our-team:hover .team-prof{
    transform: translateX(100%);
}
.our-team .team-prof .post-title{
    font-size: 18px;
    color: #fff;
    margin: 0 0 8px 0;
    text-transform: uppercase;
}
.our-team .team-prof .post{
    font-size: 14px;
    color: #cb95e1;
    margin-bottom: 0;
}
@media only screen and (max-width: 990px) {
    .our-team{ margin-bottom: 20px; }
}

 </style>
  <?php 
  include 'menu.php';
  ?>

    <div class="clearfix"></div>
    <br>
   <div class="container">
    <div class="row">
        
         <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/1.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/1.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/2.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/2.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/3.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/3.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/4.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/4.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/5.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/5.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/6.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/6.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/7.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/7.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/8.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/8.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/9.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/9.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/10.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/10.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/11.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/11.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/12.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/12.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/13.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/13.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/14.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/14.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/15.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/15.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/16.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/16.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/17.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/17.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/18.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/18.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/19.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/19.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/20.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/20.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/21.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/21.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

         <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/22.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/22.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

         <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/23.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/23.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

         <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/24.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/24.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

         <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/25.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/25.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

         <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/26.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/26.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

         <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/27.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/27.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

         <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/28.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/28.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

         

         <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/30.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/30.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

         <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/31.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/31.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

         <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/32.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/32.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

          <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/33.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/33.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

          <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/34.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/34.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

          <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/35.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/35.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>

          <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/img_2/36.jpg" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/img_2/36.jpg" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">11-Sept-2017</span>
                </div>
            </div>
        </div>
    
        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/media_1/1.JPG" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">22-Aug-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/media_1/1.JPG" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">22-Aug-2017</span>
                </div>
            </div>
        </div>
         <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/media_1/2.JPG" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">22-Aug-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/media_1/2.JPG" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">22-Aug-2017</span>
                </div>
            </div>
        </div>
         <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/media_1/3.JPG" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">22-Aug-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/media_1/3.JPG" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">22-Aug-2017</span>
                </div>
            </div>
        </div>
         <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/media_1/4.JPG" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">22-Aug-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/media_1/4.JPG" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">22-Aug-2017</span>
                </div>
            </div>
        </div>
        </div>
      </div>
         <div class="container">
    <div class="row">
         <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/media_1/5.JPG" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">22-Aug-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/media_1/5.JPG" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">22-Aug-2017</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="our-team">
               <img src="img/media_1/6.JPG" class="img-responsive" alt="" width="200" height="150">
                <div class="team-content">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">22-Aug-2017</span>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem facilis laborum perferendis quasi, ratione.
                    </p>
                    <ul class="team_social">
                        <li><a class="example-image-link" href="img/media_1/6.JPG" data-lightbox="example-1"><i class="fa fa-television"></i></a></li>
                        <!-- <li><a href="#"></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                    </ul>
                </div>
                <div class="team-prof">
                    <!-- <h3 class="post-title">Williamson</h3> -->
                    <span class="post">22-Aug-2017</span>
                </div>
            </div>
        </div>








    </div>
</div>


<section class="footer">
    <div class="container">
      <div class="row">
          <div class="col-lg-4  col-md-4 col-sm-4">
              <div class="footer_dv">
                  <!-- <h4>Services</h4>
                  <ul>
                      <li class="line_rv"><a href="canon-printer-support.php">Canon Printer Support</a></li>
               
                        <li><a href="hp-printer-support.php">Hp printer Support</a></li>
                        <li><a href="dell-printer-support.php">Dell Printer Support</a></li>
                        <li><a href="epson-printer-support.php">Epson printer Support</a></li>
                        <li><a href="samsung-printer-support.php">Samsung Printer Support</a></li>
                        <li><a href="lexmark-printer-support.php">Lexmark Printer Support</a></li>
                    </ul> -->

                  <p style="margin: -19px 0 0px ; color: #337ab7; text-decoration: none;">Supported By</p>
                  <img src="img/logo/UNFPA_logo.svg.png" style="width: 102px;  background: white" class="img-responsive"  alt="Avatar">
           
                </div>
            </div>
            <div class="col-lg-4  col-md-4 col-sm-4">
              <div class="footer_dv text-center">
                <img src="img/logo4.png" class="img-responsive" style="width: 150px; margin-left: 84px;" alt="Avatar">
                 <a target="_blank" href="http://innovadorslab.com"><h4 style="font-size: 13px;">&copy;  Innovadors Lab Pvt Ltd</h4></a>
                  <!-- <h4>Services</h4>
                  <ul>
                      <li><a href="tosiba-printer-support.php">Toshiba Printer Support</a></li>
                        <li><a href="panasonic-printer-support.php">Panasonic Printer Support</a></li>
                        <li><a href="xerox-printer-support.php">Xerox Printer Support</a></li>
                        <li><a href="brother-printer-support.php">Brother printer support</a></li>
                        <li><a href="zebra-printer-support.php">Zebra printer support</a></li>
                        <li><a href="lenovo-printer-support.php">Lenovo printer Support</a></li>
                       
                        
                    </ul> -->
                </div>
            </div>
            <div class="col-lg-4  col-md-4 col-sm-4">
              <div class="footer_dv">
                 

        
               
                <img src="img/logo/2.jpeg"  class="img-responsive" style="width: 201px; margin-left: 131px;" alt="Avatar">
                
                <div class=" text-center" style="margin-left: 33px; ">
               
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="dist/js/lightbox-plus-jquery.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assert/dist/js/bootstrap.min.js"></script>
    <!-- Bootsnavs -->
    <script src="js/bootsnav.js"></script>
    <!-- <script src="js/jquery.prettyPhoto.js"></script> -->
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/modernizr.js"></script>

  </body>
</html>