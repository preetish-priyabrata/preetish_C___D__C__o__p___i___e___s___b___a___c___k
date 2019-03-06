<?php
include './class/DbConnection.php';
include './class/Message.php';
include './class/User.php';
$msg = new Message();
$usr = new User();
ob_start();
?>
<!-- start contact -->
<div class="contact">				
    <div class="contact_left">
        <div class="contact_info">
            <h3>Find Us Here</h3>
            <div class="map">

                <script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&sensor=false"></script>
                <div id="gmap_canvas" style="height:175px; width:366px;z-index:1;"></div>
                <a href="#" class="map-data"></a>
                <link rel="stylesheet" type="text/css" href="http://www.map-embed.com/maps.css">
                <style>.maps-style_map:initreaction=10false_attempt10-border</style>
                <style>closemap"init"if=fb_connect-start="25"check_bandwith</style>
                <a id="get-map-data" href="#" class="map-data">Teerth Consultancies</a>
                <script type="text/javascript">function init_map() {
                        var myOptions = {zoom: 8, center: new google.maps.LatLng(20.3553, 85.8153), mapTypeId: 'roadmap'};
                        map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
                        map.setTilt(45);
                        marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(20.29880769, 85.8310774)});
                        infowindow = new google.maps.InfoWindow({content: "<span><strong>KIIT L&D</strong>, BBSR</span>"});
                        google.maps.event.addListener(marker, "click", function () {
                            infowindow.open(map, marker);
                        });
                        infowindow.open(map, marker);
                    }
                    google.maps.event.addDomListener(window, "load", init_map);</script>   


            </div>
        </div>
        <div class="company_address">
            <h3>Company Information :</h3>
            <p class="top">KALINGA INSTITUTE OF INDUSTRIAL TECHNOLOGY                              
            </p>
            <p class="text-center"> KIIT UNIVERSITY</p>
            <p> BHUBANESWAR - 751024, ODISHA, INDIA</p>
            <p>Phone : + 91 674-2725113                                
            <span style="margin-top:0%;margin-left:53px;"> 91 674-2725347</span>
                                
            </p>
            <p>TELEFAX : +  91 674-2725113  </p>             
                       
           <!--  <p>Phone : +91-8908010323 ,<br /><span style="margin-top:0%;margin-left:53px;">+91-9937803219</span></p> -->

        </div>
    </div>				
    <div class="contact_right">
        <div class="contact-form">
            <h3>Contact Us</h3>
            <form method="post" action="#">
                <div>
                    <span><label>name</label></span>
                    <span><input name="userName" type="text" class="textbox"></span>
                </div>
                <div>
                    <span><label>e-mail</label></span>
                    <span><input name="userEmail" type="text" class="textbox"></span>
                </div>
                <div>
                    <span><label>mobile</label></span>
                    <span><input name="userPhone" type="text" class="textbox"></span>
                </div>
                <div>
                    <span><label>subject</label></span>
                    <span><textarea name="userMsg"> </textarea></span>
                </div>
                <div>
                    <span><input type="submit" value="submit us"></span>
                </div>
            </form>
        </div>
    </div>		
    <div class="clear"></div>		
</div>
<!-- end contact -->
</div>
<?php
$pageContent = ob_get_contents();
$menuClass1 = "";
$menuClass2 = "";
$menuClass3 = "active";
$menuClass4 = "";
$menuClass5 = "";
$menuClass6 = "";
$header = "Contact";
$headerTag = "";
ob_get_clean();
include 'template_all.php';
?>