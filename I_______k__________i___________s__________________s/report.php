<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['name']) || empty($_SESSION['name'])) {
    header("location:dataentry-error.php");
}if (!empty($_SESSION['file_name'])) {
    $profile_pic = 'upload/' . $_SESSION['file_name'];
} else {
    $profile_pic = 'Images/default-profile-pic.png';
}
?>
<html lang="en">
		<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Kalinga Institute of Social Sciences</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/pastel-stream.css" />
		<link rel="stylesheet" type="text/css" href="css/style_avi.css" />
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script><script type="text/javascript" src="bootstrap/js/bootstrap.js"></script><script>            function showTextarea(str) {
            var value = document.getElementById(str).value;
            if (value == 'others') {
                document.getElementById('textarea_' + str).style.display = 'block';
            } else {
                document.getElementById('textarea_' + str).style.display = 'none';
            }
        }
        function showTextBox(distance) {
            var dist = document.getElementById(distance).value;
            if (dist == 4 || dist == 5 || dist == 'others') {
                document.getElementById('distance').style.display = 'block';
            } else {
                document.getElementById('distance').style.display = 'none';
            }
        }
        function scrolTop() {                var bodyRect = document.body.getBoundingClientRect(); // Y- Offset from top                var duration = 750;                event.preventDefault();                jQuery(' html , body ').animate({scrollTop: 0}, duration);                return false;            }            jQuery(document).ready(function () {                $('.nav-tabs-top a[data-toggle="tab"]').on('click', function () {                    $('.nav-tabs-bottom li.active').removeClass('active')                    $('.nav-tabs-bottom a[href="' + $(this).attr('href') + '"]').parent().addClass('active');                });                $('.nav-tabs-bottom a[data-toggle="tab"]').on('click', function () {                    $('.nav-tabs-top li.active').removeClass('active')                    $('.nav-tabs-top a[href="' + $(this).attr('href') + '"]').parent().addClass('active');                });            });        
		</script>
		</head>
		<body>
<div class="container">
<!-- sample templates start --> <!-- Navbar -->
<div class="row">
          <div class="col-lg-12">
    <div class="navbar navbar-default navbar-fixed-top">
              <div class="container">
        <div class="col-lg-4 text-center"> <a class="" href="studentStatus.html" target= "_blank"><img class="img-responsive img-thumbnail logo" src="Images/left.png"></a> </div>
        <div class="col-lg-4 wrapper text-center"> <span>Students / Family information sheet</span> </div>
        <div class="col-lg-4 text-center"> <a class="" target= "_blank" href="http://achyutasamanta.com/"><img class="img-responsive img-thumbnail logo" src="Images/sir2.jpg"></a> </div>
      </div>
            </div>
  </div>
        </div>
<hr>
<!-- Forms  -->
<div class="row">
          <div class="col-lg-12">
    <div class="page-header">
              <h1 id="forms">Report <span class="pull-right"> <span class="pull-right"> <a href="registration.php" class="btn btn-primary">Back To Data Entry</a> &nbsp; <a href="logout.php" class="btn btn-primary">Logout</a> </span> </span> </h1>
            </div>
  </div>
        </div>
<div class=" panel panel-default" style="padding:15px">
          <div class="row">
    <div class="col-lg-12">
              <div class="col-lg-4">
        <div class="panel">
                  <div class="panel-body form-horizontal">
            <div class="form-group">
                      <label for="Name" class="col-sm-3">Student Name</label>
                      <div class="col-sm-9"> <span><?php echo $_SESSION['name']; ?></span> </div>
                    </div>
            <div class="form-group">
                      <label for="description" class="col-sm-3">Date of Birth</label>
                      <div class="col-sm-9"> <?php echo $_SESSION['dob']; ?> </div>
                    </div>
            <div class="form-group">
                      <label for="description" class="col-sm-3">Sex</label>
                      <div class="col-sm-9"> <?php echo $_SESSION['gender']; ?> </div>
                    </div>
            <div class="form-group">
                      <label for="contact" class="col-sm-3">Contact No</label>
                      <div class="col-sm-9"> <?php echo $_SESSION['Pcontact']; ?> </div>
                    </div>
            <div class="form-group">
                      <label for="amount" class="col-sm-3">Name of tribe</label>
                      <div class="col-sm-9"> <?php echo $_SESSION['tribe']; ?> </div>
                    </div>
            <div class="form-group">
                      <label for="amount" class="col-sm-3">Class</label>
                      <div class="col-sm-9"> <?php echo $_SESSION['standard']; ?> </div>
                    </div>
          </div>
                </div>
      </div>
              <div class="col-lg-4">
        <div class="panel">
                  <div class="panel-body form-horizontal">
            <div class="form-group">
                      <label for="Name" class="col-sm-3">Father's Name</label>
                      <div class="col-sm-9"> <span><?php echo $_SESSION['father']; ?></span> </div>
                    </div>
            <div class="form-group">
                      <label for="description" class="col-sm-3">Mother's Name</label>
                      <div class="col-sm-9"> <?php echo $_SESSION['mother']; ?> </div>
                    </div>
            <div class="form-group">
                      <label for="contact" class="col-sm-3">Village</label>
                      <div class="col-sm-9"> <?php echo $_SESSION['village']; ?> </div>
                    </div>
            <div class="form-group">
                      <label for="amount" class="col-sm-3">Block</label>
                      <div class="col-sm-9"> <?php echo $_SESSION['block']; ?> </div>
                    </div>
            <div class="form-group">
                      <label for="amount" class="col-sm-3">District</label>
                      <div class="col-sm-9"> <?php echo $_SESSION['dist']; ?> </div>
                    </div>
          </div>
                </div>
      </div>
              <div class="col-lg-4 text-center"><img src="<?php echo $profile_pic; ?>" class="img-thumbnail"></div>
            </div>
  </div>
          <div class="clearfix spacer5"></div>
          <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="panel panel-default">
        <div class="panel-heading">
                  <h3>Report of <?php echo $_SESSION['name']; ?> </h3>
                </div>
        <div class="panel-body" style="line-height: 2em;text-align: justify;"> 
                  <!-- ********************** -->
                  
                  <p> The story of <?php echo ucfirst($_SESSION['name']);?> is the story of inspiration for any boy or girl of
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            age. At present, <?php echo ucfirst($_SESSION['name']);?> is a student of class
            <?php if(isset($_SESSION['standard']) && !empty($_SESSION['standard'])){echo $_SESSION['standard'];}else{echo "12";}?>
            in the Kalinga Institute of
            Social Sciences(<strong>KISS</strong>). But seven months ago when
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            made
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            journey from
            <?php if(isset($_SESSION['dist']) && !empty($_SESSION['dist'])){echo $_SESSION['dist'];}else{echo "Malkangiri";}?>
            to Bhubaneswar it was not the same. </p>
                  <p> <?php echo ucfirst($_SESSION['name']);?> is a
            <?php if(isset($_SESSION['tribe']) && !empty($_SESSION['tribe'])){echo $_SESSION['tribe'];}else{echo "bonda";}?>
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "boy";}else{echo "girl";}}else{echo "boy";}?>
            of
            <?php if(isset($_SESSION['village']) && !empty($_SESSION['village'])){echo $_SESSION['village'];}else{echo "Andrahali";}?>
            village under
            <?php if(isset($_SESSION['block']) && !empty($_SESSION['block'])){echo $_SESSION['block'];}else{echo "Khairput";}?>
            block in tribal dominated
            <?php if(isset($_SESSION['dist']) && !empty($_SESSION['dist'])){echo $_SESSION['dist'];}else{echo "Malkangiri";}?>
            district of southern
            <?php if(isset($_SESSION['state']) && !empty($_SESSION['state'])){echo $_SESSION['state'];}else{echo "Odisha";}?>
            .
            <?php if(isset($_SESSION['tribe']) && !empty($_SESSION['tribe'])){echo $_SESSION['tribe'];}else{echo "bonda";}?>
            are one of the
            <?php if(isset($_SESSION['tibe']) && !empty($_SESSION['tribe'])){echo $_SESSION['tribe'];}else{echo "primitive";}?>
            tribes inhabit in the
            district for ages together.
            <?php if(isset($_SESSION['tribe']) && !empty($_SESSION['tribe'])){echo $_SESSION['tribe'];}else{echo "bonda";}?>
            are instinctively aborigines and never intend to be a part of modern society. <?php echo ucfirst($_SESSION['name']);?>'s father
            <?php if(isset($_SESSION['father']) && !empty($_SESSION['father'])){echo ucfirst($_SESSION['father']);}else{echo "Sambari Batri";}?>
            was no exception too. But somehow he had
            sent
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            child to school and <?php echo ucfirst($_SESSION['name']);?> completed
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            HSC examination. But to pursue higher studies <?php echo ucfirst($_SESSION['name']);?> had two hurdles to cross. Firstly,
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            father 
            was not in a position to meet
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            education expenses and secondly,
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            had to cover a distance of around
            <?php if(isset($_SESSION['distance_village']) && !empty($_SESSION['distance_village'])){echo $_SESSION['distance_village'];}else{echo "40";}?>
            kilometers daily. </p>
                  <p> <?php echo ucfirst($_SESSION['name']);?>'s father
            <?php if(isset($_SESSION['father']) && !empty($_SESSION['father'])){echo ucfirst($_SESSION['father']);}else{echo "Sambari Batri";}?>
            somehow came to know about <strong>KISS</strong> and its philanthropic work. As the father of three children he had no means to educate them all. As a BPL card holder
            government's help was the only source of sustenance for the family. So
            <?php if(isset($_SESSION['father']) && !empty($_SESSION['father'])){echo ucfirst($_SESSION['father']);}else{echo "Sambari Batri";}?>
            decided to send
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "him";}else{echo "her";}}else{echo "him";}?>
            to <strong>KISS</strong>. But initially he was apprehensive whether he
            could adjust with the hustle and bustle of city life leaving behind
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            remote hilly surroundings where
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            was born and bought up. At last <?php echo ucfirst($_SESSION['name']);?> became a student
            of <strong>KISS</strong> on
            <?php if(isset($_SESSION['yoj']) && !empty($_SESSION['yoj'])){echo $_SESSION['yoj'];}else{echo "July 2014";}?>
            and joined in class
            <?php if(isset($_SESSION['standard']) && !empty($_SESSION['standard'])){echo $_SESSION['standard'];}else{echo "XI";}?>
            . </p>
                  <p> When <?php echo ucfirst($_SESSION['name']);?> joined <strong>KISS</strong>, Bhubaneswar campus, it was cultural shock for
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "him";}else{echo "her";}}else{echo "him";}?>
            , 
            but only for a couple of days. Because
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            had left behind
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            parents,
            younger brothers, friends and the habitat
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            was born and bought up with. 
            But within days
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            found that thousands of tribal students of different age group are staying
            in the same hostel ans studying in the school
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            was in. Fellow students were friendly, teachers cordial and the surrounds was very favorable to <?php echo ucfirst($_SESSION['name']);?>. The ice of shyness 
            gradually started melting from his mind. Gradually he made friendship with
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            classmates. This helped
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "him";}else{echo "her";}}else{echo "him";}?>
            in
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            studies too. Though not very bright in studies, <?php echo ucfirst($_SESSION['name']);?> is a sincere and obedient student, is the observation 
            of
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            mentors and teachers. Although average in all subjects,
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            likes to read and write in Odia.
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "He";}else{echo "She";}}else{echo "He";}?>
            is very keen in reading Odia stories.
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "His";}else{echo "Her";}}else{echo "His";}?>
            other
            interests in co-curricular activities are cricket and football. <?php echo ucfirst($_SESSION['name']);?> takes part in every cultural function that is organised either in school or in hostel. There
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            takes part in singing and dancing.
            Apart from this, tailoring is another vocational activity where <?php echo ucfirst($_SESSION['name']);?> has shown deep interest.
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "He";}else{echo "She";}}else{echo "He";}?>
            is now learning tailoring and he has a special interest in this activity. </p>
                  <p> As a part of the <strong>KISS</strong> education system, <?php echo ucfirst($_SESSION['name']);?> is a changed
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "boy";}else{echo "girl";}}else{echo "boy";}?>
            what
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            was a few months before. No more
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            is apprehensive of leaving his scenic
            <?php if(isset($_SESSION['tribe']) && !empty($_SESSION['tribe'])){echo $_SESSION['tribe'];}else{echo "bonda";}?>
            hills. Rather
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            now proudly exhorts-"I shall read more and become an ideal teacher so that I can change the backwardness of my area and people. He thanks <strong>KISS</strong> and 
            it's Founder for giving this opportunity to pursue
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            studies. Remembering the days of hardship of
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            family <?php echo $_SESSION['name'];?> says, while in
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            native village
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            had to cover 40 kilometers daily to attend school. Now <strong>KISS</strong> provides more facilities than
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            actually requires." </p>
                  <p> For <?php echo ucfirst($_SESSION['name']);?> a teacher is
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            role model. Hence
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            wants to be a teacher. For this
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            wants to work hard and study more. To bring a change in
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            remote native area, 
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            has a dream. As a teacher
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            would educate
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            fellow
            <?php if(isset($_SESSION['tribe']) && !empty($_SESSION['tribe'])){echo $_SESSION['tribe'];}else{echo "bonda";}?>
            children, remove blind belief from their minds, and make them aware socially and so on. Also
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            wants to imporve the 
            economic condition of
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            family so that
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            brothers could be sufficiently educated. <?php echo ucfirst($_SESSION['name']);?>'s dream is a colourful imagination for any tribal student. Yet
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            is hopeful. With
            <strong>KISS</strong> in
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            support
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            can fulfil this, <?php echo ucfirst($_SESSION['name']);?> says, with a confident smile on his face. </p>
                  <p> <?php echo ucfirst($_SESSION['name']);?>'s mentors are always a very positive opinion about
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "him";}else{echo "her";}}else{echo "him";}?>
            . Although shy,
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            is obedient and inquisitive. With every passing day
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "he";}else{echo "she";}}else{echo "he";}?>
            improves
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "him";}else{echo "her";}}else{echo "him";} ?>self
            towards achieving
            <?php if(isset($_SESSION['gender']) && !empty($_SESSION['gender'])){if($_SESSION['gender']=='Male'){echo "his";}else{echo "her";}}else{echo "his";}?>
            goal in life. </p>
                  
                  <!-- *********************** --> 
                </div>
      </div>
            </div>
  </div>
        </div>
<div class="clearfix" style="height:50px;"></div>
<script type="text/javascript">           
	jQuery(function ($) {                
	$('[data-toggle="popover"]').popover(); 
	$('[data-toggle="tooltip"]').tooltip(); 
	});
    </script> 
<!-- sample templates end -->
</body>
</html>