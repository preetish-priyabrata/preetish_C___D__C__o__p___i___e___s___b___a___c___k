<?php
session_start();
ob_start();
if($_SESSION['admin_tech']){
    include  '../config.php';
    require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of Admin Officer";
?>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
   <link rel="stylesheet" type="text/css" href="calender.css">
    <!--Page Header-->
    <div class="header">
        <div class="header-content">
            <div class="page-title"><i class="icon-display4"></i> Dashboard</div>
            <ul class="breadcrumb">
                <li><a href="#"></a></li>
                <!-- <li class="active">Dashboards</li> -->
            </ul>
        </div>
    </div>
    <!-- /Page Header-->
    <div class="container-fluid page-content">
        <div class="row">
        <?php $msg->display(); ?>
            
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-6">
                    <div class="panel panel-flat border-none">
                        <div class="panel-body p-b-10">
                            <div class="row">
                                <div class="col-md-12 col-xs-6">
                                    <label style="font-size: 46px;">
                                        <p style="font-size: 20px;"><b>Total no of candidate registered=Candidate registered but not completed sikkim subject details+Candidate completed sikkim subject details but not submitted application form+Candidates submitted application form (includes candidates made successful payment) </b> </p>
                                    </label>
                                <!-- </div>
                                <div class="col-md-6 col-xs-6">
                                    Amount Fee Received -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 pull-right ">
                <div class="panel panel-flat">
                    <div class="wrapper clearfix show">
<!--                         <div class="clock" id="clock"></div>
                        <div class="clock" id="clock1"></div> -->
                        <div class="clock" id="clock2"></div>
                    </div>
                  <!-- <div id="my-calendar"></div>              -->
                </div>
            </div>
            
                 <div class="col-md-4 col-sm-6">
                    <div class="panel panel-flat border-none">
                        <div class="panel-body p-b-10">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label style="font-size: 24px;">&#8377 <span id="total_collection_driver"></span> </label>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    Amount Fee Received For Driver
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                 
                <div class="col-md-4 col-sm-6">
                    <div class="panel panel-flat border-none">
                        <div class="panel-body p-b-10">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label style="font-size: 24px;"><i class="fa fa-ambulance" style="color: lightblue"></i> <span id="driver"></span> </label>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    Candidate For Driver Post
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-md-4 col-sm-6">
                    <div class="panel panel-flat border-none">
                        <div class="panel-body p-b-10">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label style="font-size: 24px;">&#8377 <span id="total_collection_d"></span> </label>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    Amount Fee Received For Group D
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="panel panel-flat border-none">
                        <div class="panel-body p-b-10">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label style="font-size: 24px;"><i class="fa fa-user-secret" style="color: lightgreen"></i> <span id="group_d"></span> </label>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    Candidate For Group D Post
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="panel panel-flat border-none">
                        <div class="panel-body p-b-10">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label style="font-size: 24px;">&#8377 <span id="total_collection"></span> </label>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    Amount Fee Received
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="panel panel-flat border-none">
                        <div class="panel-body p-b-10">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label style="font-size: 24px;"><i class="fa fa-smile"></i> <span id="total_candidate"></span> </label>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    Candidate Successfull Paid
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-8">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <div class="panel-title">Event Planner</div>
                        </div>

                        <div class="panel-body">
                            <div class="fullcalendar-basic"></div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="panel panel-flat border-none">
                        <div class="panel-body p-b-10">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label style="font-size: 24px;"><i class="fa fa-smile" style="color: green"></i> <span id="total_candidate_complete_details"></span> </label>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    Candidates submitted application form(incliding candidates made successfull payment)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="panel panel-flat border-none">
                        <div class="panel-body p-b-10">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label style="font-size: 24px;"><i class="fa fa-smile" style="color: orange"></i> <span id="total_candidate_complete_sikkim"></span> </label>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    Candidate completed sikkim subject details but not submitted application form.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-4 col-sm-6">
                    <div class="panel panel-flat border-none">
                        <div class="panel-body p-b-10">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label style="font-size: 24px;"><i class="fa fa-smile" style="color: green"></i> <span id="total_candidate_complete_sikkim_subjetc"></span> </label>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                   Candidate completed sikkim subject details but not submitted application form.
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-4 col-sm-6">
                    <div class="panel panel-flat border-none">
                        <div class="panel-body p-b-10">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label style="font-size: 24px;"><i class="fa fa-smile" style="color: red"></i> <span id="total_candidate_complete_sikkim_no"></span> </label>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    Candidate registered but not completed sikkim subject details.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 pull-right">
                    <div class="panel panel-flat border-none">
                        <div class="panel-body p-b-10">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label style="font-size: 24px;"><i class="fa fa-smile" style="color: blue"></i> <span id="total_candidate_total"></span> </label>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                   Total candidate registered
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
        
        <div class="row">
            
        </div>
    </div>


<?php
}else{
    header('Location:logout');
    exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';

?>
<script src="../asserts/lib/js/extensions/moment.min.js"></script>
<script src="../asserts/lib/js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="../asserts/lib/js/pages/extensions/extension_fullcalendar.js"></script>
<script src="calender.js"></script>
<script>

    var clock = $("#clock").clock(),
        data = clock.data('clock');

    // data.pause();
    // data.start();
    // data.setTime(new Date());

    var d = new Date();
    d.setHours(<?=date('H')?>);
    d.setMinutes(<?=date('i')?>);
    d.setSeconds(<?=date('s')?>);

    var clock1 = $("#clock1").clock({
        theme: 't2',
        date: d
    });

    var clock2 = $("#clock2").clock({
        theme: 't3',
        // clock width
        width: 340,
        // clock height

        height: 450,
        date: d
    });

</script>
<script type="text/javascript">
    
/**
 * Default settings
 *
 * @returns object
 *   language:          string,
 *   year:              integer,
 *   month:             integer,
 *   show_previous:     boolean|integer,
 *   show_next:         boolean|integer,
 *   cell_border:       boolean,
 *   today:             boolean,
 *   show_days:         boolean,
 *   weekstartson:      integer (0 = Sunday, 1 = Monday),
 *   nav_icon:          object: prev: string, next: string
 *   ajax:              object: url: string, modal: boolean,
 *   legend:            object array, [{type: string, label: string, classname: string}]
 *   action:            function
 *   action_nav:        function
 */
$.fn.zabuto_calendar_defaults = function () {
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var settings = {
        language: false,
        year: year,
        month: month,
        show_previous: true,
        show_next: true,
        cell_border: false,
        today: true,
        show_days: true,
        weekstartson: 1,
        nav_icon: false,
        data: false,
        ajax: false,
        legend: false,
        action: false,
        action_nav: false
    };
    return settings;
};

/**
 * Language settings
 *
 * @param lang
 * @returns {{month_labels: Array, dow_labels: Array}}
 */
$.fn.zabuto_calendar_language = function (lang) {
    if (typeof(lang) == 'undefined' || lang === false) {
        lang = 'en';
    }

    switch (lang.toLowerCase()) {
     

        case 'en':
            return {
                month_labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                dow_labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]
            };
            break;

     
    }

};


   $(document).ready(function () {
    $("#my-calendar").zabuto_calendar({
      // legend: [
      //   {type: "text", label: "Special event", badge: "00"},
      //   {type: "block", label: "Regular event", classname: "purple"},
      //   {type: "spacer"},
      //   {type: "text", label: "Bad"},
      //   {type: "list", list: ["grade-1", "grade-2", "grade-3", "grade-4"]},
      //   {type: "text", label: "Good"}
      // ],
      // ajax: {
      //   url: "show_data.php?grade=1"
      // }
    });
    // total_candidate
    $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=1',
            success:function(html){              
                document.getElementById("total_collection").innerHTML = html;      
                
            }
        });
    $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=2',
            success:function(html){              
                document.getElementById("total_candidate").innerHTML = html;      
                
            }
        });
    // total_candidate_complete_sikkim
     $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=3',
            success:function(html){              
                document.getElementById("total_candidate_complete_details").innerHTML = html;      
                
            }
        });
     $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=4',
            success:function(html){              
                document.getElementById("total_candidate_complete_sikkim").innerHTML = html;      
                
            }
        });
      $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=5',
            success:function(html){              
                document.getElementById("total_candidate_complete_sikkim_subjetc").innerHTML = html;      
                
            }
        });
      $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=6',
            success:function(html){              
                document.getElementById("total_candidate_complete_sikkim_no").innerHTML = html;      
                
            }
        });
      $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=7',
            success:function(html){              
                document.getElementById("total_candidate_total").innerHTML = html;      
                
            }
        });
      $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=8',
            success:function(html){              
                document.getElementById("driver").innerHTML = html;      
                
            }
        });
       $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=9',
            success:function(html){              
                document.getElementById("group_d").innerHTML = html;      
                
            }
        });
        $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=10',
            success:function(html){              
                document.getElementById("total_collection_driver").innerHTML = html;      
                
            }
        });
        $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=11',
            success:function(html){              
                document.getElementById("total_collection_d").innerHTML = html;      
                
            }
        });

      
      // total_candidate_total

//     total_candidate_complete_sikkim_subjetc
//  
    function get_paid(){

         $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=1',
            success:function(html){              
                document.getElementById("total_collection").innerHTML = html;      
                
            }
        });
    $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=2',
            success:function(html){              
                document.getElementById("total_candidate").innerHTML = html;      
                
            }
        });
    // total_candidate_complete_sikkim
     $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=3',
            success:function(html){              
                document.getElementById("total_candidate_complete_details").innerHTML = html;      
                
            }
        });
     $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=4',
            success:function(html){              
                document.getElementById("total_candidate_complete_sikkim").innerHTML = html;      
                
            }
        });
      $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=5',
            success:function(html){              
                document.getElementById("total_candidate_complete_sikkim_subjetc").innerHTML = html;      
                
            }
        });
      $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=6',
            success:function(html){              
                document.getElementById("total_candidate_complete_sikkim_no").innerHTML = html;      
                
            }
        });
      $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=7',
            success:function(html){              
                document.getElementById("total_candidate_total").innerHTML = html;      
                
            }
        });
      $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=8',
            success:function(html){              
                document.getElementById("driver").innerHTML = html;      
                
            }
        });
       $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=9',
            success:function(html){              
                document.getElementById("group_d").innerHTML = html;      
                
            }
        });
        $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=10',
            success:function(html){              
                document.getElementById("total_collection_driver").innerHTML = html;      
                
            }
        });
        $.ajax({
            type:'POST',
            url:'get_update',
            data:'pay_id=11',
            success:function(html){              
                document.getElementById("total_collection_d").innerHTML = html;      
                
            }
        });
    }
    var validateSession = setInterval(get_paid, 100000);
  });



</script>


