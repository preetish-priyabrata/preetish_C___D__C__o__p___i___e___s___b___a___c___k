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

                                    <h6>Student Enquiry Form</h6>
                                    <?php
                                    include './conf.php';
                                    if (isset($_POST['stud_name'])) {
                                        $stud_name = $_POST['stud_name'];
                                        $stud_roll = $_POST['stud_roll'];
                                        $stud_email = $_POST['stud_email'];
                                        $stud_phone = $_POST['stud_phone'];
                                        $stud_query = $_POST['stud_query'];
                                        if (!empty($stud_name) && !empty($stud_roll) && !empty($stud_email) && !empty($stud_phone) && !empty($stud_query)) {
                                            $query = "INSERT INTO `tbl_enquiry`(`enquiry_id`, `student_name`, `student_roll`, 
                                                    `student_email`, `student_phone`, `student_query`, `date_time`) VALUES
                                                    (NULL,'$stud_name','$stud_roll','$stud_email','$stud_phone','$stud_query',now())";
                                            $res = mysqli_query($con, $query);

                                            if ($res) {
                                                    $subject = "You have received a new Enquiry. ";
                                                    $to = "siprah@gmail.com";

                                                    // $from = "info@innovadorslab.co.in";

                                                    //data
                                                    $message1 = "NAME: "  .$stud_name    ."<br>\n";
                                                    $message1 .= "Roll No: ".$stud_roll    ."<br>\n";
                                                    $message1 .= "Email id: " .$stud_email    ."<br>\n";
                                                    $message1 .= "Mobile No: ".$stud_phone ."<br>\n"; 
                                                    $message1 .= "Enquiry : ".$stud_query."<br>\n";
                                                    // $message1 .= "WEBSITE: http://innovadorslab.co.in/lntdemo<br>\n";
                                                    

                                                    //Headers
                                                    
                                                    $headers = "From:Kiit_cat2@innovadorslab.com \r\n";
                                                    $headers .= "Bcc:ppriyabrata8888@gmail.com \r\n";
                                                     $headers .= "MIME-Version: 1.0\r\n";
                                                     $headers .= "Content-type: text/html\r\n";

                                                    if(mail($to, $subject, $message1, $headers)){
                                                             $subject1 = "Enquiry";
                                                            $to1 = $stud_email;

                                                            // $from = "info@innovadorslab.co.in";

                                                            //data
                                                            $message11 = "Dear ".$stud_name."\r\n";

                                                            $$message11 .="Thank you for the Enquiry ! Our Team will contact you soon. \r\n \r\n \r\n";
                                                            $message11 .="This is an generated mail. Do not reply.";
                                                            // $message1 .= "WEBSITE: http://innovadorslab.co.in/lntdemo<br>\n";
                                                            

                                                            //Headers
                                                            
                                                            $headers1 = "From:Kiit_cat2@innovadorslab.com \r\n";
                                                            $headers1 .= "Bcc:ppriyabrata8888@gmail.com \r\n";
                                                             $headers1 .= "MIME-Version: 1.0\r\n";
                                                             $headers1 .= "Content-type: text/html\r\n";

                                                            if(mail($to1, $subject1, $message11, $headers1)){

                                                                    echo "<span style = 'margin-left:30%'>Your request successfully posted. You will be contacted soon.</span>";
                                                                }else{
                                                                    echo "<span style = 'margin-left:30%'>Your request successfully posted. You will be contacted soon.</span>";
                                                                }

                                                    }else{
                                                        echo "<span style = 'margin-left:30%'>Your request successfully posted. You will be contacted soon.</span>";
                                                    }
                                            } else {
                                                echo 'Failure!!Try again.';
                                            }
                                        }
                                    }
                                    ?>


                                    <form id="contactform" method="post" onsubmit="return allRequired(this.id)">
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
                                                <label for="stud_email"><span class="required">*</span> Email Id</label>
                                                <input type="email" aria-required="true" size="30" value="" name="stud_email" id="stud_email" class="form-control requiredField" />
                                            </div>                                            
                                        </div><!-- ends row -->

                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <label for="stud_phone"><span class="required">*</span> Phone / Cell Number</label>
                                                <input type="text" aria-required="true" size="30"  name="stud_phone" id="stud_phone" class="form-control requiredField" />
                                            </div>                                            
                                        </div><!-- ends row -->

                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12">
                                                <label for="stud_query"><span class="required">*</span> Your Query</label>
                                                <textarea name="stud_query" id="stud_query" class="form-control requiredField" rows="5"></textarea>
                                            </div>
                                        </div><!-- ends row -->

                                        <div class="row"><!-- starts row -->
                                            <div class="form-group clearfix col-lg-6">
                                                <small>* Fields are Mandatory</small>
                                            </div>

                                            <div class="form-group clearfix col-lg-6 text-right remove-margin-bottom">
                                                <input type="submit" value="Post Query" id="submit" name="btn_enquiry" class="btn btn-default" />
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
        <script src="js/form-validation.js"></script>

    </body>
</html>