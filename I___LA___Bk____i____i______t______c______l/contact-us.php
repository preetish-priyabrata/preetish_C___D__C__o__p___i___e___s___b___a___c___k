<?php 
ob_start();

?>
<style type="text/css">
.content-wrapper {
    overflow: hidden;
}
.content-wrapper {
    width: 100%;
    float: left;
}
section#contact {
    background-color: #2991d6;
    background-image: url('http://artdnaswitchbd.com/componants/images/map-image.png');
    background-position: center;
    background-repeat: no-repeat;
}
/*section {
    padding: 30px 0PX;
}*/
section#contact .section-heading {
    color: white;
}
section#contact .form-group {
    margin-bottom: 25px;
}
section#contact .form-group input,
section#contact .form-group textarea {
    padding: 20px;
}
section#contact .form-group input.form-control {
    height: auto;
}
section#contact .form-group textarea.form-control {
    height: 236px;
}
section#contact .form-control:focus {
    border-color: #fed136;
    box-shadow: none;
}
section#contact ::-webkit-input-placeholder {
    font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
    text-transform: uppercase;
    font-weight: 700;
    color: #eeeeee;
}
.gellary_bg_none img{
    width: 100%;
    height: 250px;
}
section#contact :-moz-placeholder {
    /* Firefox 18- */
    font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
    text-transform: uppercase;
    font-weight: 700;
    color: #eeeeee;
}
section#contact ::-moz-placeholder {
    /* Firefox 19+ */
    font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
    text-transform: uppercase;
    font-weight: 700;
    color: #eeeeee;
}
section#contact :-ms-input-placeholder {
    font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
    text-transform: uppercase;
    font-weight: 700;
    color: #eeeeee;
}
section#contact .text-danger {
    color: #e74c3c;
}

.about_our_company{
    text-align: center;
}
.about_our_company h1{
    font-size: 25px;
}
.titleline-icon {
    position: relative;
    max-width: 100px;
    border-top: 4px double #F99700;
    margin: 20px auto 20px;
}
.titleline-icon:after {
    position: absolute;
    top: -11px;
    left: 0;
    right: 0;
    margin: auto;
    font-family: 'FontAwesome';
    content: "\f141";
    font-size: 20px;
    line-height: 1;
    color: #F99700;
    text-align: center;
    vertical-align: middle;
    width: 40px;
    height: 20px;
    background: #ffffff;
}

</style>
<!--  -->
<!-- <link rel="stylesheet" type="text/css" href="css/about.css"> -->
<section>
    <div id="content" class="site-content content-wrapper page-content">
        <div id="map" style="width:100%;height:500px"></div>
    </div>
</section>
<br>
    <section id="contact" style="">
            <div class="container" style="margin-top: 31pc; padding: 17px 0 28px 0;">
               
                <div class="row">
                    <div class="col-md-8">
                         <div class="row">
                    <div class="about_our_company" style="margin-bottom: 20px;margin-top: 4px">
                        <h1 style="color:#fff;">Write Your Message</h1>
                        <div class="titleline-icon"></div>
                        <p style="color:#fff;">Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                    </div>
                </div>
                        <form name="sentMessage" id="contactForm" novalidate="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your Name *" id="name" required="" data-validation-required-message="Please enter your name.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" id="email" required="" data-validation-required-message="Please enter your email address.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required="" data-validation-required-message="Please enter your phone number.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Your Message *" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <button type="submit" class="btn btn-xl get">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <p style="color:#fff;">
                            <strong><i class="fa fa-map-marker"></i> Address</strong><br>
                            1216/Mirpur_10 Beach, Dhaka(Bangladesh)
                        </p>
                        <p style="color:#fff;"><strong><i class="fa fa-phone"></i> Phone Number</strong><br>
                            (+8801)7123456</p>
                        <p style="color:#fff;">
                            <strong><i class="fa fa-envelope"></i>  Email Address</strong><br>
                            Email@info.com</p>
                        <p></p>
                    </div>
                </div>
            </div>
        </section>
<script>
function myMap() {
  var myCenter = new google.maps.LatLng(20.3499,85.8204);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 12};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
  google.maps.event.addListener(marker,'click',function() {
    var infowindow = new google.maps.InfoWindow({
      content:"KSOM, Bhubaneswar"
    });
  infowindow.open(map,marker);
  });
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuaB9vdRqWutkZwkWalJGi1BLQJ8AN3Nk&callback=myMap"></script>
				
<?php 

$content_display=ob_get_contents();
ob_get_clean();
include 'template_all.php';