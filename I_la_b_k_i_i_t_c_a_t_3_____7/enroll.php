<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Centre For Advanced Training</title>

        <!-- Styles -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,700,800" rel="stylesheet" type="text/css"><!-- Google web fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><!-- font-awesome -->
        <link href="js/dropdown-menu/dropdown-menu.css" rel="stylesheet" type="text/css"><!-- dropdown-menu -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"><!-- Bootstrap -->
        <link href="js/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"><!-- Fancybox -->
        <link href="js/audioplayer/audioplayer.css" rel="stylesheet" type="text/css"><!-- Audioplayer -->
        <link href="style.css" rel="stylesheet" type="text/css"><!-- theme styles -->

    </head>

    <body role="document">

        <!-- device test, don't remove. javascript needed! -->
        <span class="visible-xs"></span><span class="visible-sm"></span><span class="visible-md"></span><span class="visible-lg"></span>
        <!-- device test end -->

        <div id="k-head" class="container"><!-- container + head wrapper -->

            <?php include './template-header.php'; ?>

        </div><!-- container + head wrapper end -->

        <div id="k-body"><!-- content wrapper -->

            <div class="container"><!-- container -->

                <div class="row no-gutter"><!-- row -->

                    <div class="col-lg-8 col-md-8"><!-- recent news wrapper -->

                        <div class="col-padded"><!-- inner custom column -->

                            <div class="row gutter"><!-- row -->

                                <div class="col-lg-12 col-md-12">

                                    <h6>Enroll With Us</h6>
                                    <?php
                                    include './conf.php';
                                        
                                    
                                    ?>


                                    <form id="contactform" method="post" action="enroll_save.php" onsubmit="return allRequired(this.id)" autocomplete="off">
                                        <div class="row">
                                             <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <span style="color: red">* Kindly fill the form with utmost care as there is no scope for alternation. </span>
                                            </div>
                                        </div>
                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <label for="stud_name"><span class="required">*</span> Student Name</label>
                                                <input type="text" aria-required="true" size="30" value="" name="stud_name" id="stud_name" class="form-control requiredField" />
                                            </div>                                           
                                        </div><!-- ends row -->

                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <label for="stud_roll"><span class="required">*</span> Roll Number</label>
                                                <input type="text" aria-required="true" size="30" value="" name="stud_roll" id="stud_roll" class="form-control requiredField" />
                                            </div>                                            
                                        </div><!-- ends row -->

                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <label for="stud_branch"><span class="required">*</span> Branch Name</label>
                                                <input type="text" aria-required="true" size="30" value="" name="stud_branch" id="stud_branch" class="form-control requiredField" />
                                            </div>                                            
                                        </div><!-- ends row -->

                                         <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <label for="stud_semester"><span class="required">*</span> Semester</label>
                                                <input type="text" aria-required="true" size="30" value="" name="stud_semester" id="stud_semester" class="form-control requiredField" />
                                            </div>                                            
                                        </div><!-- ends row -->

                                       <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <label for="stud_email"><span class="required">*</span> Email Id</label>
                                                <input type="email" aria-required="true" size="30" value="" name="stud_email" id="stud_email" class="form-control requiredField" />
                                            </div>                                            
                                        </div><!-- ends row -->
                                         
                                      <div class="row"><!-- starts row -->
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <label for="stud_address"><span class="required">*</span> Address</label>
                                                <textarea name="stud_address" rows="4" cols="10" class="form-control requiredField"></textarea>
                                                
                                            </div>                                           
                                        </div><!-- ends row -->

                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <label for="stud_City"><span class="required">*</span> City</label>
                                                <input type="text" aria-required="true" size="30" value="" name="stud_City" id="stud_City" class="form-control requiredField" />
                                            </div>                                            
                                        </div><!-- ends row -->

                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <label for="stud_State"><span class="required">*</span>  State/province </label>
                                                <input type="text" aria-required="true" size="30" value="" name="stud_State" id="stud_State" class="form-control requiredField" />
                                            </div>                                            
                                        </div><!-- ends row -->

                                         <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <label for="stud_Postal_code"><span class="required">*</span> Zip/Postal code</label>
                                                <input type="text" aria-required="true" size="30" value="" name="stud_Postal_code" id="stud_Postal_code" class="form-control requiredField" />
                                            </div>                                            
                                        </div><!-- ends row -->

                                       <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <label for="stud_Country"><span class="required">*</span> Country</label>
                                                <input type="text" aria-required="true" size="30" value="" name="stud_Country" id="stud_Country" class="form-control requiredField" />
                                            </div>                                            
                                        </div><!-- ends row -->
       
                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <label for="stud_phone"><span class="required">*</span> Phone / Cell Number</label>
                                                <input type="text" aria-required="true" size="30" value="" name="stud_phone" id="stud_phone" class="form-control requiredField" />
                                            </div>                                            
                                        </div><!-- ends row -->

                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12">
                                                <label for="stud_course"><span class="required">*</span> Course Name</label>
                                                <!-- <input type="text" aria-required="true" size="30" value="" name="stud_course" id="stud_course" class="form-control requiredField" /> -->
                                                <select name="stud_course" onchange="get_detail_batch()" id="stud_course" class="form-control requiredField" required="" >
                                                    <option value="">--Course Name--</option>
                                                    <?php $select_cource="SELECT * FROM `tbl_course` WHERE `status`='1'";
                                                    $res_select = mysqli_query($con, $select_cource);
                                                    while($row=mysqli_fetch_assoc($res_select)){?>                                                    <option value="<?=$row['sl_no']?>"><?=$row['course_name']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div><!-- ends row -->
                                        
                                            <div id="get_batch"></div>
                                       

                                        <div class="row"><!-- starts row -->
                                            <div class="form-group clearfix col-lg-6">
                                                <small>* Fields are Mandatory</small>
                                            </div>

                                            <div class="form-group clearfix col-lg-6 text-right remove-margin-bottom">
                                                <input type="submit" value="Proceed To Payment" id="submit" name="btn_enroll" class="btn btn-default" />
                                            </div>
                                        </div><!-- ends row -->
                                    </form>

                                </div>    

                            </div>   

                        </div><!-- inner custom column end -->

                    </div><!-- recent news wrapper end -->

                    <div class="col-lg-4 col-md-4"><!-- misc wrapper -->
                        <?php
                        include './news-and-events.php';
                        ?> 
                    </div><!-- misc wrapper end -->

                </div><!-- row end -->

            </div><!-- container end -->

        </div><!-- content wrapper end -->

        <div id="template-footer">
            <?php include './template-footer.php'; ?>
        </div>

        <!-- jQuery -->
        <script src="jQuery/jquery-2.1.1.min.js"></script>
        <script src="jQuery/jquery-migrate-1.2.1.min.js"></script>

        <!-- Bootstrap -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- Drop-down -->
        <script src="js/dropdown-menu/dropdown-menu.js"></script>

        <!-- Fancybox -->
        <script src="js/fancybox/jquery.fancybox.pack.js"></script>
        <script src="js/fancybox/jquery.fancybox-media.js"></script><!-- Fancybox media -->

        <!-- Responsive videos -->
        <script src="js/jquery.fitvids.js"></script>

        <!-- Audio player -->
        <script src="js/audioplayer/audioplayer.min.js"></script>

        <!-- Pie charts -->
        <script src="js/jquery.easy-pie-chart.js"></script>

        <!-- Google Maps -->
        <script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>

        <!-- Theme -->
        <script src="js/theme.js"></script>
        
        <!--Form Validation-->
        <script src="js/form-validation1.js"></script>
        <script type="text/javascript">
            $( document ).ready(function() {
                $("#get_batch").hide(1000);
            });
            function get_detail_batch(){
               var stud_courses=$('#stud_course').val();
               if(stud_courses!=""){
                $.ajax({
                    type:'POST',
                    url:'get_batch_info.php',
                    data:'stud_courses='+stud_courses,
                    success:function(html){
                          // $remove_display
                        // $("#remove_display").remove();
                         $("#get_batch").show(1000);
                        $('#get_batch').html(html);
                     
                    }
                });
               }else{
                $("#get_batch").hide(1000);
                alert('Please Select Course');
                return false;
               }
            }
        </script>

    </body>
</html>