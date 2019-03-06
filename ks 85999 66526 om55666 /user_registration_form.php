<!DOCTYPE html>
<html>
<head>
  <title></title>
<!-- <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">  -->
<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
  <!-- <link rel="stylesheet" type="text/css" href="css/template.css"> -->
  <style type="text/css">

  div.demo{
    position: relative;
    /*width: 100%;*/
    min-height:900px;
    overflow-y: hidden;

    /*background: url("images/bg-pattern.png"), #7b4397;*/
    /* fallback for old browsers */
    /*background: url("images/bg-pattern.png"), -webkit-linear-gradient(to left, #424242, #1a0000);*/
    /* Chrome 10-25, Safari 5.1-6 */
    /*background: url("images/bg-pattern.png"), linear-gradient(to left, #424242, #1a0000);*/
    /*background:  -webkit-linear-gradient(to left, #47cdf2, #3aafef);*/
    /* Chrome 10-25, Safari 5.1-6 */
    /*background:  linear-gradient(to left, #424242, #1a0000);*/
    /*background: linear-gradient(to left, #f2a69a, #3a7cef);*/
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    
    color:#07993c;
    opacity: 1.5;
  }
  .error{
    color: red;
    font-size: 12px;
    margin-left: 65px;
  }
  table{

      width: 620px;
      height: 684px;
   
      
      background-color:#e7edf04d;
      padding: 20px;
      /*margin-left: 150px;*/
      border-radius:10px; 
      }
    .table input[type='text']{
      width: 356px;
      height: 31px;
      }
    .table input[type='password']{
      width: 356px;
      height: 31px;
      }
      h4{

      font-size:15px;
      margin-left: 50px;
      }   
</style>

<!-- <style type="text/css">
  .table{
background-color:#98F398;
      padding: 20px;
      /*margin-left: 100px;*/
      border-radius:10px; 
      }.error{
        color: red;
      }
</style> -->

</head>
<body>

<!-- design -->

<section >
<div class="container-fluid">
    <div class="row">
         <div class="demo">
          <div class="panel-body">
            <div class="container">
              <div class="row"> 
              <div class="col-lg-10">
              
              <form method="POST" id="myform1" action="user_registration_form_save.php" enctype="multipart/form-data">

                <span class="text-center">
                <h1 style="color:#166f29; font-family: Times New Roman, Georgia, Serif;font-size: 30px;"><center><strong>Alumni Registration</strong></center></h1>

              <!-- <h5 style="color: #c31515;text-align: left; margin-left: 300px;">* Marked Fields Are Mandatory</h5> -->
                </span>

                <center>

                <table style="border-style: solid;border-color:#166f29;border-width: 6px; width: 600px; height: 900px;" class="table table-striped">

              <tr>
              <td colspan="3">
              <img src="young_people.gif" alt="alumni" width="700px" height="200px">
              </td>
              </tr>

             <tr>
              <td><h5 style="margin-left: 19px;">Name <!--<span style="color:red;">*</span>--></h5></td>
              <td>:</td>
              <td><input type="text" name="name" id="name" for="name" placeholder="Enter your name"  style="border-radius:8px; "></td>
             </tr>

             <tr>
              <td><h5 style="margin-left: 19px;">Email</h5></td>
              <td>:</td>
              <td><input type="text" name="email" id="email" for="email" placeholder="Enter your email"  style="border-radius:8px;"></td>
             </tr>

             <tr>
               <td><h5 style="margin-left: 19px;">Mobile No</h5></td>
               <td>:</td>
               <td><input type="text" name="mobile" id="mobile" placeholder="Enter your mobile no"  style="border-radius:8px;"></td>
             </tr>

             <tr>
               <td><h5 style="margin-left: 19px;">Passing Year </h5></td>
               <td>:</td>
               <td><input type="text" name="pass_year" id="pass_year" for="pass_year" placeholder="Enter your passing year"  style="border-radius:8px;"></td>
             </tr>

             <tr>
              <td><h5 style="width: 200px;height: 31px; margin-left: 19px;">Stream</h5></td>
                <td>:</td>
                <td><select name="stream" id="stream" for="stream" style="width: 365px;height: 38px ;border-radius:8px;">
                  <option value="">Select your stream...</option>
                  <option value="2_Arts">+2 Arts</option>
                  <option value="2_Science">+2 Science</option>
                  <option value="2_Commerce">+2 Commerce</option>
                  <option value="3_Arts">+3 Arts</option>
                  <option value="3_Science">+3 Science</option>
                  <option value="3_Commerce">+3 Commerce</option>
                  <option value="BCA">BCA</option>
                  <option value="BBA">BBA</option>
                  <option value="MBA">MBA</option>
                  <option value="MCA">MCA</option>
                  <option value="MBA Rural">MBA(Rural Management)</option>
                  <option value="Hotel Management">Hotel Management</option>
                  <option value="journalism">Journalism</option>
                  <option value="BTech">B.Tech</option>
                  <option value="PGDM">PGDM</option>
                  <option value="PHD">P.H.D</option>
                  <option value="Computer Science">PG.Computer Science</option>
                 </select></td>
            </tr>

            <tr>
              <td><h5 style="margin-left: 19px;">Password</h5></td>
                <td>:</td>
               <td><input type="password" name="password" id="password" for="password" placeholder="Enter password"  style="border-radius:8px;"></td>
            </tr>

            <tr>
                <td><h5 style="margin-left: 19px;">Photo <span style="color:red"> *</span></h5></td>
                <td>:</td>
                <td><input type="file" name="img" id="img" for="img"  style="width: 300px;height: 31px; border-radius:8px;" required=""> </td>
            </tr>
            <!-- <tr>
              <td><h5 style="margin-left: 19px;">Enrollment No</h5></td>
                <td>:</td>
                <td><input type="text" name="reg_no" id="reg_no" for="reg_no"  placeholder="Enter Registration No"  style="border-radius:8px;"></td>
            </tr> -->

           <tr>
           <td colspan="3">
           <br>
           <center>
           <input type="submit" name="submit" value="submit"/>
           </center>
      
        
           </h5>
           </td>
           </tr>
           </table>
           </center>
           </form>
           </div>
           </div>
           </div>
           </div>
           </div>
           </div>
         </div>
        </div>
      </section>

     <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
      <script type="text/javascript">

       //FORM VALIDATION//
       
        $("#myform1").validate({
            
                rules: {
                 
                  name:{
                     required:true,
                    
                  }, 
                  email:{
                    required:true,
                    email:true
                  },
                  mobile:{
                    required:true,
                   number:true
                  },

                  pass_year:{
                    required:true,
                   number:true
                  },

                  stream:{
                    required:true,
                   
                  },

                  password:{
                    required:true,
                    
                  },

                  img:{
                    required:true,
                     
                  },
                  reg_no:{
                    required:true,
                    

                 },

                

                 

                },
                messages: {

                  name:{
                     required:"Please Enter Your Name.",
                    
                  }, 

                  email:{
                    required:"Email Id Should Left Blank.",
                    email:"Please put vaild email."
                 },

                  mobile:{
                    required:"Please Enter Your Mobile No.",
                   number:"Please Enter Numbers."
                  },


                  pass_year:{
                     required:"Please Enter Your Passing Year.",
                      number:"Please Enter Numbers."
                  },
                  
                 stream:{
                    required:"Please Select Your Stream.",
                    
                  },              
                 password:{
                    required:"Please Enter Password.",
                  },
                 
                  img:{
                    required:"Please Browse Your Photo ",
                     
                  },
                  

                  reg_no:{
                    required:"Please Enter Your Registration No.",
                    

                 },
                  
                


              },
            
               
            })
        jQuery.validator.setDefaults({
          debug: true,
          // success: "valid"
        });

        </script>     -->  


</body>
</html>