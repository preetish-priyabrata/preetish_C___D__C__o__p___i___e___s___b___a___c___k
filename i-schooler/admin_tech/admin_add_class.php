<?php
session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<style type="text/css">
  div.demo{
    position: relative;
    width: 100%;
    min-height: auto;
    overflow-y: hidden;
    background: url("../assert/img/bg-pattern.png"), #7b4397;
    /* fallback for old browsers */
    background: url("../assert/img/bg-pattern.png"), -webkit-linear-gradient(to left, #8000ff, #1a0000);
    /* Chrome 10-25, Safari 5.1-6 */
    background: url("../assert/img/bg-pattern.png"), linear-gradient(to left, #8000ff, #1a0000);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: white;
    opacity: 0.8;
  }
  .error{
    color: blue;
  }
</style>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        Blank page
        <small>it all starts here</small>
      </h1> -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master Class & Section </a></li>        
         <li><a href="admin_class.php">View Master Class & Section</a></li>
        <li class="active"><b>Add New Class</b></li>
      </ol>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">
    <!-- message display -->
    	<div class="text-center">
			  <?php $msg->display(); ?>
		  </div>
    <!-- end message displayed -->
    <div class="panel panel-default">
      <div class="panel-heading">Entry Class</div>
      <div class="demo">
        <div class="panel-body">
        <button class="add_field_button btn-success">Add More Class</button>

          <form class="form-horizontal" id="reli" action="admin_add_class_save.php" method="POST">
          <h3><span id="spanid" style="color: red"></span></h3>
          <div class="input_fields_wrap">         
              <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Class Name</label>
                  <div class="col-sm-8">
                    <input type="text" name="class_id[]" class="form-control" required="" id="class_id1" onkeyup="check_class_list(1)" placeholder="Enter Class Name">
                  </div>
                  <span id="myerror1" style="color:red"></span>
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn btn-default submit">Submit</button>
              </div>
            </div>
       </form>
        </div>
      </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>
<script> 
function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("photo").files[0]);
    oFReader.onload = function(oFREvent) {
      document.getElementById("photopreview").src = oFREvent.target.result;
    };
};
         
</script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var max_fields      = 13; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1;
    var xx = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++;
            xx++; //text box increment
            $(wrapper).append('<div class="form-group"><label class="control-label col-sm-2" for="email">Class Name :</label><div class="col-sm-8"><input type="text" class="form-control" name="class_id[]" id="class_id'+xx+'" required onkeyup="check_class_list('+xx+')" placeholder="Enter Class Name'+xx+'"><span id="myerror'+xx+'" style="color:red"></div><a href="#" class="remove_field">Remove</a><br></span></div>'); //add input box
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    $('.submit').click(function(){
      var answers = [];
      $.each($('.form-control'), function() {
      answers.push($(this).val());

      
    });
    //     if(answers.length == 0) {
    //   answers = "none";
    // }
    var check_singles="Arr";
    // alert(answers);

    // return false;
      $.ajax({
        type:'POST',
        url:'admin_class_check.php',
        data:{Class_names:answers,check_single:check_singles},
        success:function(html){                 
          if(html==1){
            document.getElementById("spanid").innerHTML = "";
            $("#reli").submit(); 
          }else{
            document.getElementById("spanid").innerHTML = "Class Is Present In Our Records ,"+html;
            return false;
          }
        }
      });

  });

    //  $('#myform').validate({ // initialize the plugin
    //     submitHandler: function (form) { // for demo
    //         alert('valid form submitted'); // for demo
    //         return false; // for demo
    //     }
    // });
    
    // $('.num').each(function() {
    //     $(this).rules('add', {
    //         required: true,
    //         number: true,
    //         messages: {
    //             required:  "your custom required message",
    //             number:  "your custom number message"
    //         }
    //     });
    // });

    // $('#reli').validate({ // initialize the plugin
    //     submitHandler: function (form) { // for demo
    //         // alert('valid form submitted'); // for demo
    //         // return false; // for demo
    //     }
    // });
    
    // $('[name*="class_id"]').each(function() {
    //     $(this).rules('add', {
    //         required: true
    //     });
    // });
});

function check_class_list(id) {
  var class_name=$('#class_id'+id).val();
  var chheck_single="single";
  //alert(x);
  // alert(class_name);
            if(class_name!=""){ 
              // alert(class_name);             
            $.ajax({
                type:'POST',
                url:'admin_class_check.php',
                data:{Class_name:class_name,check_single:chheck_single},
                success:function(html){                 
                    if(html==1){
                        document.getElementById("myerror"+id).innerHTML = "";
                        return false;
                        // $("#reli").submit(); 
                    }else{
                        document.getElementById("myerror"+id).innerHTML = "Class Is Present In Our Records ,"+class_name;
                        return false;
                    }
                }
            });
        }
}


</script>