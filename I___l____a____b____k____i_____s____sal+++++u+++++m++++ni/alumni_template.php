<?php 
session_start();
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="assert/fontaswome/css/font-awesome.css">
  <!-- Theme style -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="assert/css/template.css"> 
 <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->

</head>
<body>
<style type="text/css">
    #div2 {
    list-style-type: none;
    /*margin: 0;
    padding: 0;*/
    overflow: hidden;
    float: right;
}

.cool_href1 {
    float: left;
}

.cool_href {
    display: block;
    padding: 8px;
    background-color: #000;
}
.cool_href:hover {
    background: #175921;
    color: wheat;
}
.inlineList {
  display: flex;
  flex-direction: row;
  /* Below sets up your display method, ex: flex-start|flex-end|space-between|space-around */
  justify-content: flex-start; 
  /* Below removes bullets and cleans white-space */
  list-style: none;
  padding: 0;
  /* Bonus: forces no word-wrap */
  white-space: nowrap;
  float: right;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="header_line"></div>
        <div class="header_line2"></div>
        <div class="text-right">
          <ul class="inlineList" style="background: #a81818;height: 2pc;width: 4pc; margin: 8px 11px 8px 0px;">
            <li><a href="logout.php" style="color: #fff;">Logout</a></li>          
          </ul>            
        </div>
    </div>
</div>


  <!-- menu -->
  
<div class="container-fluid">
  <div class="row">   
    <div class="header_line3"></div>
  </div>
    <div class="text-center ">
       
        <?php $msg->display(); ?>
    
      </div>
</div>

<div class="container">
<div class="row">
    <?php echo $contents?>
</div>
</div>









  
</body>
</html>