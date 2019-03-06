  <?php
session_start();
// ob_start();
 $ip=$_SERVER['REMOTE_ADDR'];
$base="http://".$ip."/lnt_rev1/admin";

if($_SESSION['admin_hq']){
    require 'FlashMessages.php';
    include  '../config.php';
    $msg = new \Preetish\FlashMessages\FlashMessages();
    $title="Head Quarter view Site Requsition Received Detail ";
    $location=$_SESSION['hq_store_id'];

    $slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name']));
    $challan=web_decryptIt(str_replace(" ", "+", $_GET['Token_id'])); // 
    $status=web_decryptIt(str_replace(" ", "+", $_GET['access']));
 
// unset($_GET);
    $check="SELECT * FROM `lt_master_hq_challan_generate` where `hqcg_challan_no`='$challan' and `hqcg_receive_status`='0' and  `hqcg_hq_location_id`='$location' ";
    $sql_exe=mysqli_query($conn,$check);
    $num=mysqli_num_rows($sql_exe);
    if($num!='0'){
    }
    $fetch_check=mysqli_fetch_assoc($sql_exe);
    //$zonal_code=$fetch_check['zmr_site_from_location_id'];
?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html>
            <head>
                <title>Ori</title>
                <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                  <!-- Bootstrap 3.3.7 -->
                  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
                  <!-- Font Awesome -->
                  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
                  <!-- Ionicons -->
                  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
                  <!-- Theme style -->
                  <link rel="stylesheet" href="../dist/css/AdminLTE.css">
                  <link rel="stylesheet" href="<?=$base?>/asserts/print.css" media="print"/>
                  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                  <!--[if lt IE 9]>
                  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                  <![endif]-->

                  <!-- Google Font -->
                  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
                <style type="text/css">
                    @media print{
                        table { page-break-after:auto;}
                        tr    { page-break-inside:avoid;}
                        td    { page-break-inside:auto;}
                        thead { display:table-header-group }

                        .row-fluid [class*="span"] {
                          min-height: 20px;
                        }
                    }

                    @page { 
                        margin-top: 1cm;
                        margin-right: 1cm;
                        margin-bottom:2cm;
                        margin-left: 2cm;';
                        size:portrait;
                        /*
                        size:landscape;
                        -webkit-transform: rotate(-90deg); -moz-transform:rotate(-90deg);
                        filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
                        */

                    };
                </style>
                <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            </head>
            <body>
                <div id="print-header-wrapper">
                    <section class="invoice" >
                        <div class="row-fluid">
                        <div class="row invoice-info">
                      <div class="col-xs-12">
                        <h2 class="page-header">
                          <img src="LT1.png" class="img-circle" style="width: 73px;margin-right: 5px;">LARSEN & TOUBRO LIMITED
                            <p style='line-height:1.5; font-size:10px; margin-bottom: 0px; margin-left: 75px; margin-top: -26px'>KANSBAHAL WORKS,<br>PO : KANSBAHAL, DIST : SUNDARGARH,<br> ODISHA, 770034 <br>+916624280241,www.lntecc.com
                              <br>
                              599, Annapurna Complex, Lewis Road, Khordha, Odisha, Pin-751014
                            </p>

                            <div class="Deposit3 text-center pull-right" style="margin-right: 2px; margin-top: -80px" >
                        <h4 style="border: 1px solid black; padding: 1px;">Orginal Copy</h4>
                        <small class="pull-right">Date: 2/10/2014</small>
                      </div>
                      <div class="Deposit4 text-center pull-right" style="margin-right: 2px; margin-top: -80px" >
                        <h4 style="border: 1px solid black; padding: 1px;">Duplicate Copy</h4>
                        <!-- <small class="pull-right">Date: 2/10/2014</small> -->
                      </div>
                      <div class="Deposit5 text-center pull-right" style="margin-right: 2px ; margin-top: -80px" >
                        <h4 style="border: 1px solid black; padding: 1px;">Triplicate Copy</h4>
                        <!-- <small class="pull-right">Date: 2/10/2014</small> -->
                      </div>
                        </h2>


                    
                       
                      
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      <div class="col-xs-6 invoice-col">
                        Consignee :
                        <address>
                         
                          <?php 
                      $zqcg_hq_location_id=$fetch_check['hqcg_zonal_location_id'];
                          $query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zqcg_hq_location_id'";
                        $sql_exe2=mysqli_query($conn,$query_sql2);
                        // mysqli_error($conn);
                        $result2=mysqli_fetch_assoc($sql_exe2);
                        //print_r($result2);
                        echo "<strong><p style='line-height:1.5; font-size:10px; margin-bottom: 0px;'>".strtoupper($result2['address_1'])."</p></strong>";
                        echo "<p style='line-height:1.5; font-size:10px; margin-bottom: 0px;'>".strtoupper($result2['address_2'])."</p>";
                        echo "<p style='line-height:1.5; font-size:10px; margin-bottom: 0px;'>C/O:- ".strtoupper($result2['address_3']).", " .strtoupper($result2['address_4'])."</p>";                       
                        echo "<p style='line-height:1.5; font-size:10px; margin-bottom: 0px;'>".strtoupper($result2['address_5']).", ".strtoupper($result2['address_6']).", ".strtoupper($result2['address_7'])."-".strtoupper($result2['address_8'])."</p>";
                    ?>
                        </address>
                      </div>

                      <!-- /.col -->
                      <div class="col-xs-6 invoice-col">
                        <!-- <b>Invoice </b><br> -->
                        
                        <b style="font-size:10px;">DC No:</b> <span><small><?=$dc_no=strtoupper($fetch_check['dc_no'])?></small></span><br>
                        <b style="font-size:10px;">DC Date:</b>  <span><small><?=strtoupper($fetch_check['date_enter'])?></small></span><br>
                        <b style="font-size:10px;">Indent No:</b> <span><small><?=strtoupper($fetch_check['Indent_no'])?></small></span><br>
                        <b style="font-size:10px;">DC Date:</b>  <span><small><?=strtoupper($fetch_check['Indent_dated'])?></small></span><br>
                        <!-- <b>Indent No:</b> 968-34567 -->
                      </div>
                    </div>
                    <div class="row invoice-info" style="font-size:10px;">
                      <!-- /.col -->
                        <div class="col-xs-4 invoice-col">
                          <b>Vehicle No:</b> <small><?=strtoupper($fetch_check['Vehicle_no'])?></small>
                      </div>
                        <div class="col-xs-4 invoice-col">
                          <b>LR No. :</b> <small><?=strtoupper($fetch_check['LR_no'])?></small>
                        </div>
                        <div class="col-xs-4 invoice-col">

                          <b>Project Code:</b> <small><?=strtoupper($fetch_check['Project_No'])?></small>
                      </div>
                       <!--  <div class="col-xs-3 invoice-col">
                      </div> -->
                      <!-- /.col -->
                    </div>
                </div>
                   <!--  <div class="row-fluid">HEADER TITLE 1</div> -->
                    <!-- <div class="row-fluid">HEADER TITLE 2</div> -->
                </div>
                <div class="row-fluid" id="print-body-wrapper">
                    <table class="table" id="table_data">
                         <thead>
                            <tr>
                                <th>#</th>
                                <th>HSN Code</th>
                                <th>Material Description</th>
                                <th>Qty</th>
                                <th>UOM</th>
                                <th>Total Price<br><small>(in RS)</small></th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php 
                                      $x=0;
                                      $Total_id1=0;
                                      $item="SELECT * FROM `lt_master_hq_issue_zonal_info` WHERE `hqzis_challan_id`='$challan' AND`hqzis_issued_status`='1'";
                                      $sql_item_exe=mysqli_query($conn,$item);
                                      while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
                                      $x++;
                                  ?>
                            <tr>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                              </tr>
                              <tr>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                              </tr>
                              <tr>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                              </tr>
                              <tr>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                              </tr>
                            <tr>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                              </tr>
                              <tr>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                              </tr>
                              <tr>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                              </tr>
                              <tr>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$x?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_hsn_id'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                                <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=$fetch_item['price_total']?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                              </tr>
                  <?php }?>
        </tbody>       
    </table>
                    <div id="lastDataTable"></div>
                </div>
                <script type="text/javascript">
                    jQuery(document).ready(function()
                    {
                        var printHeader = $('#print-header-wrapper').html();
                        var div_pageBreaker = '<div style="page-break-before:always;"></div>';
                        var per_page = 25;
                        $('#table_data').each(function(index, element)
                        {
                            //how many pages of rows have we got?
                            var pages = Math.ceil($('tbody tr').length / per_page);

                            //if we only have one page no more
                            if (pages == 1) {
                                return;
                            }
                            //get the table we're splutting
                            var table_to_split = $(element);

                            var current_page   = 1;
                            //loop through each of our pages
                            for (current_page = 1; current_page <= pages; current_page++) 
                            {
                                //make a new copy of the table
                                var cloned_table = table_to_split.clone();
                                //remove rows on later pages
                                $('tbody tr', table_to_split).each(function(loop, row_element) {
                                    //if we've reached our max
                                    if (loop >= per_page) {
                                        //get rid of the row
                                        $(row_element).remove();
                                    }
                                });

                                //loop through the other copy
                                $('tbody tr', cloned_table).each(function(loop, row_element) {
                                    //if we are before our current page
                                    if (loop < per_page) {
                                        //remove that one
                                        $(row_element).remove();
                                    }
                                });

                                //insert the other table afdter the copy
                                if (current_page < pages) {
                                    $(div_pageBreaker).appendTo('#lastDataTable');
                                    $(printHeader).appendTo('#lastDataTable');
                                    $(cloned_table).appendTo('#lastDataTable');
                                }

                                //make a break
                                table_to_split = cloned_table;
                            }
                        });
                    });
                </script>
              </body>
            </html>