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
            
			<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCOzXhs4-X9m_C8T3N3QxHLXYfzEgkrp-Y '></script><div style='overflow:hidden;height:300px;width:390px;'><div id='gmap_canvas' style='height:400px;width:520px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://embedmaps.net'>embedding google map</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=286fffcbc8a2c9c3eb9e999ff3894fe3791bc52f'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:18,center:new google.maps.LatLng(20.3554239,85.81534310000006),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(20.3554239,85.81534310000006)});infowindow = new google.maps.InfoWindow({content:'<strong>KALINGA INSTITUTE OF INDUSTRIAL TECHNOLOGY</strong><br>KIIT UNIVERSITY<br>751023 Bhubaneswar, PATIA ,ODISHA, INDIA<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>

          
 


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
            <form method="post" action="contact_save.php">
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
                    <span><input type="submit" name="contract" value="submit us"></span>
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