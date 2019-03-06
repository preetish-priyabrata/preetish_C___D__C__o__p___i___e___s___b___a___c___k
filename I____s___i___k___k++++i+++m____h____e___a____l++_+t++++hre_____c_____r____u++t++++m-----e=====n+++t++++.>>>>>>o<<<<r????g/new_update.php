<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>News</title>

<base target="_parent">

<link rel="stylesheet" href="assert/css/news_scroll.css" type="text/css">

</head>

<body class="news-scroll" onMouseover="scrollspeed=0" onMouseout="scrollspeed=current" OnLoad="NewsScrollStart();">


<!-- START NEWS FEED -->
<div id="NewsDiv">
<div class="scroll-text-if">

<!-- SCROLLER CONTENT STARTS HERE Starting Date of Online Application:

 Date of Examination:
Those who have not received their login details in the respective registered mobile no  to download admit card, kindly write a mail to siprah@gmail.com mentioning their registered mobile no.

Selection Process:OMR and Viva Voce -->


<span class="scroll-title-if">
 Not received their login details:
</span><h4 class="text-justify" style="color:green">Those who have not received their login details in the respective registered mobile no  to download admit card, kindly write a mail to siprah@gmail.com mentioning their registered mobile no.</h4>
<!-- <a href="#" target="_blank"><b>Click View</b></a><br> -->
<br>

<span class="scroll-title-if">
Date of Written Examination:<br>
</span>
<a href="#" target="_blank"><b style="color:green">06.05.2018</b></a>.
<br>
<br>
<span class="scroll-title-if">
 Availability of Admit card:
</span><h4 class="text-justify" style="color:red">Admit card can be downloaded from this site between 16th April to 30th April 2018 by inserting allotted login id and password.</h4>
<!-- <a href="#" target="_blank"><b>Click View</b></a><br> -->
<br>
<span class="scroll-title-if">
Starting Date of Online Application:<br>
</span>
<a href="Advertisement.pdf" target="_blank"><b style="color:red">15.02.2018</b></a>.
<br>
<br>

<span class="scroll-title-if">
 Last Date of Online Application:
</span><h4 class="text-justify" style="color:red">On or before 15.03.2018 upto 12 midnight.  Application  submitted  after 15.03.2018  from  12:00 midnight will not be accepted by the software</h4>
<a href="Advertisement.pdf" target="_blank"><b>Click View</b></a><br>






<!-- <span class="scroll-title-if">
Date of Examination:<br>
</span> -->

<!-- Add your news or other current info in this text window. This window uses an HTML IFrame and Javascript for the scrolling animation.  -->

<!-- <a href="#">Coming Soon</a>.

<br><br> -->





<!-- 
<span class="scroll-title-if">
Selection Process:OMR and Viva Voce<br>
</span> -->

<!-- Add your news or other current info in this text window. This window uses an HTML IFrame and Javascript for the scrolling animation.  -->

<!-- <a href="news.htm">Coming Soon</a>.

<br> -->






<!-- END SCROLLER CONTENT -->

</div>
</div>
<!-- END NEWS FEED -->




<!-- YOU DO NOT NEED TO EDIT BELOW THIS LINE -->

<script type="text/javascript">


var startdelay 		= 2; 		// START SCROLLING DELAY IN SECONDS
var scrollspeed		= 1.1;		// ADJUST SCROLL SPEED
var scrollwind		= 1;		// FRAME START ADJUST
var speedjump		= 30;		// ADJUST SCROLL JUMPING = RANGE 20 TO 40
var nextdelay		= 0; 		// SECOND SCROLL DELAY IN SECONDS 0 = QUICKEST
var topspace		= "2px";	// TOP SPACING FIRST TIME SCROLLING
var frameheight		= 176;		// IF YOU RESIZE THE CSS HEIGHT, EDIT THIS HEIGHT TO MATCH


current = (scrollspeed);


function HeightData(){
AreaHeight=dataobj.offsetHeight
if (AreaHeight===0){
setTimeout("HeightData()",( startdelay * 1000 ))
}
else {
ScrollNewsDiv()
}}

function NewsScrollStart(){
dataobj=document.all? document.all.NewsDiv : document.getElementById("NewsDiv")
dataobj.style.top=topspace
setTimeout("HeightData()",( startdelay * 1000 ))
}

function ScrollNewsDiv(){
dataobj.style.top=scrollwind+'px';
scrollwind-=scrollspeed;
if (parseInt(dataobj.style.top)<AreaHeight*(-1)) {
dataobj.style.top=frameheight+'px';
scrollwind=frameheight;
setTimeout("ScrollNewsDiv()",( nextdelay * 1000 ))
}
else {
setTimeout("ScrollNewsDiv()",speedjump)
}}


</script>


</body>
</html>
