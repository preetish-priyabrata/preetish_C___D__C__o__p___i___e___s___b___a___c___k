<?php
  session_start();
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
    $check="SELECT * FROM `lt_master_hq_challan_generate` where `hqcg_challan_no`='$challan' and  `hqcg_hq_location_id`='$location' ";
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
      <title>Triplicate Copy of Challan No <?=$dc_no=strtoupper($fetch_check['dc_no'])?></title>
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
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
      <style type="text/css">
        @media print{ 
          table { page-break-after:auto;}
          tr    { page-break-inside:avoid;}
          td    { page-break-inside:auto;}
          thead { display:table-header-group }
          .row-fluid [class*="span"] { min-height: 20px; }
        }
        @page { 
          margin-top: 1cm;
          margin-right: 1cm;
          margin-bottom:2cm;
          margin-left: 2cm;
          size: portrait;
          counter-increment: page;
          /*
            size:landscape;
            -webkit-transform: rotate(-90deg); -moz-transform:rotate(-90deg);
            filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
          */

         }
         @page {
            counter-increment: page;
            counter-reset: page 1;
            @top-right {
                content: "Page " counter(page) " of " counter(pages);
            }
        }
         
      </style>
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    </head>
    <body onload="window.print(); window.close();">
      <div  id="printarea">
        <div class="section-to-print">
          <div class="wrapper">
          <section class="invoice" >
            <div id="print-header-wrapper">
              <div class="row-fluid">
                <div class="row invoice-info">
                  <div class="col-xs-12">
                    <h2 class="page-header">
                      <img src="LT1.png" class="img-circle" style="width: 73px;margin-right: 5px;">LARSEN & TOUBRO LIMITED
                      <p style='line-height:1.5; font-size:10px; margin-bottom: 0px; margin-left: 75px; margin-top: -26px'>KANSBAHAL WORKS,<br>PO : KANSBAHAL, DIST : SUNDARGARH,<br> ODISHA, 770034 <br>+916624280241,www.lntecc.com<br>599, Annapurna Complex, Lewis Road, Khordha, Odisha, Pin-751014
                        <br>
                        GST NO :- <strong> 21AAACL0140P4ZS</strong><br>
                        PAN NO :- <strong> AAACL0140P</strong>
                      </p>
                      <div class="Deposit3 text-center pull-right" style="margin-right: 2px; margin-top: -80px" >
                        <h4 style="border: 1px solid black; padding: 1px;">Triplicate Copy</h4>
                      </div>                
                    </h2>      
                  </div><!-- /.col -->
                </div><!-- info row -->
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
                        echo "<p style='line-height:1.5; font-size:10px; margin-bottom: 0px;'>".strtoupper($result2['address_5']).", ".strtoupper($result2['address_6']).", ".strtoupper($result2['address_7'])."-".strtoupper($result2['address_8'])."<br>GSTN NO :- ".strtoupper($result2['address9'])."</p>";
                      ?>
                    </address>
                  </div><!-- /.col -->
                  <div class="col-xs-6 invoice-col">
                    <b style="font-size:10px;">DC No:</b> <span><small><?=$dc_no=strtoupper($fetch_check['dc_no'])?></small></span><br>
                    <b style="font-size:10px;">DC Date:</b>  <span><small><?=strtoupper($fetch_check['date_enter'])?></small></span><br>
                    <b style="font-size:10px;">Indent No:</b> <span><small><?=strtoupper($fetch_check['Indent_no'])?></small></span><br>
                    <b style="font-size:10px;">Indent Date:</b>  <span><small><?=strtoupper($fetch_check['Indent_dated'])?></small></span><br>
                  </div>
                </div>
                <div class="row invoice-info" style="font-size:10px;">                   
                  <div class="col-xs-4 invoice-col">
                    <b>Vehicle No:</b> <small><?=strtoupper($fetch_check['Vehicle_no'])?></small>
                  </div>
                  <div class="col-xs-4 invoice-col">
                    <b>LR No. :</b> <small><?=strtoupper($fetch_check['LR_no'])?></small>
                  </div>
                  <div class="col-xs-4 invoice-col">
                    <b>Project Code:</b> <small><?=strtoupper($fetch_check['Project_No'])?></small>
                  </div>  
                  <div class="col-xs-4 invoice-col">
                    <b>Despatch From : </b> <small> Kansbahal, Odisha</small>
                  </div>
                  <div class="col-xs-4 invoice-col ">
                    <b>Despatch To : </b> <small> <?=strtoupper($fetch_check['place_to'])?></small>
                  </div>                     
                </div>
              </div>
                   <!--  <div class="row-fluid">HEADER TITLE 1</div> -->
                    <!-- <div class="row-fluid">HEADER TITLE 2</div> -->
            </div>
            <div class="row-fluid" id="print-body-wrapper">
              <div class="row">
                <div class="col-xs-12 table-responsive">
                  <table class="table" id="table_data">
                    <thead>
                      <tr>
                          <th>Sl.No</th>
                          <th>HSN Code</th>
                          <th>Primary Code</th>
                          <th>Material Description</th>
                          <th>Qty/UOM</th>                          
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
                             <td><small style='line-height:1; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_primary_id'])?></small></td>
                            <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_item_name'])?> <?=strtoupper($fetch_item['hqzis_item_category_name'])?></small></td>
                            <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$fetch_item['hqzis_issue_qnt']?></small>   <small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=strtoupper($fetch_item['hqzis_unit'])?> </small></td>
                            <td><small style='line-height:1.5; font-size:10px; margin-bottom: 0px;'><?=$price_total=round($fetch_item['price_total'],2)?></small><?php $Total_id1=$Total_id1+$price_total;?></td>

                          </tr>          

                      <?php 
                        }
                      ?>
                       <tr>
                    <td colspan="5">Total:</td>
                    <td><?=$Total_id1?></td>
                  </tr>
                <?php if(strtolower(trim($result2['address_7']))=='odisha'){?>
                  <tr>
                    <td colspan="5">CGST @9%:</td>
                    <td><?php echo $cgst=($Total_id1*9)/100;
                    ?></td>
                  </tr>
                  <tr>
                    <td colspan="5">SGST @9%:</td>
                    <td><?php echo $sgst=($Total_id1*9)/100;
                      
                    ?>
                      
                    </td>
                  </tr>
                  <tr>
                    <td colspan="5">Grand Total:</td>
                    <td><?php
                       $total_ammount=$cgst+$sgst+$Total_id1;
                        echo $total_grand_ro=round($total_ammount,2);
                    ?>
                      
                    </td>
                  </tr>
                <?php }else{
                        ?>
                  <tr>
                    <td colspan="5">IGST @18%:</td>
                    <td><?php echo $iGST=($Total_id1*18)/100;?></td>
                  </tr>
                  <tr>
                    <td colspan="5">Grand Total:</td>
                    <td><?php
                       $total_ammount=$iGST+$Total_id1;
                       echo $total_grand_ro=round($total_ammount,2);
                    ?>
                      
                    </td>
                  </tr>
                        <?php
                }?>          
                
                    </tbody>       
                  </table>
                </div>
              </div>
             <?php
             

            ?>
          
       

  
      <div id="lastDataTable"></div>

     
      </div>
      <div class="col-xs-12">
          <div class="row">
              <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="text-muted well well-xs no-shadow" style="margin-top: 5px;">We have despatched above mentioned goods.  Kindly return the duplicate copy duly signed acknowledging the receipt of goods.</p>
            </div>        
            <div class="col-xs-6">
                <p class="text-muted well well-xs no-shadow" style="margin-top: 5px;font-size: 12px">In Words ;- <?=strtoupper(convertToIndianCurrency($total_grand_ro))?></p>
            
            </div>
          <!-- /.col -->
        </div>  
        <div class="row text-center">
          <div class="col-xs-4">
            <p style="padding: 1.8em"></p>
            <!-- <p style="padding: 1.8em"></p> -->
            <p style="line-height:1.5; font-size:10px; margin-bottom: 0px;"> <small><strong>Prepared By.</strong></small></p>
          </div>
          <div class="col-xs-4">
            <p style="padding: 1.8em"></p>                  
            <p style="line-height:1.5; font-size:10px; margin-bottom: 0px;"><small><strong>Authorized By. </strong></small></p>
          </div>
          <div class="col-xs-4">
            <p style="padding: 1.8em"></p> 
             
            <p style="line-height:1.5; font-size:10px; margin-bottom: 0px;"><small><strong> Accounts Department.</strong> </small></p>
          </div>
        </div> 
      </div>    

            
        <div class="col-xs-12" style="bottom: 0; -webkit-transform: translateZ(0); position: fixed;">
        
  <div class="row" style="border: 1px solid black">
    <div class="col-xs-11 col-xs-11">
            <!-- <p style="padding: 0.5em"></p>                                   -->
        </div>
  </div>
  <div class="row" style="border: 1px solid black">
    <div class="col-xs-11 col-xs-11">
            <p style="padding: 0.1em"></p>
            <div class="pull-left"><p style="line-height:1.5; font-size:10px; margin-bottom: 0px;">Registered Office : L & T House, Ballard Estate,  P.O.Box No.278, Mumbai - 400 038.</p> </div> 
            <div class="pull-right"><p style="line-height:1.5; font-size:10px; margin-bottom: 0px;">CIN N0 : L99999MH1946PLC004768</p> </div>                               
        </div>
  </div>
  </div>

    </section>
  </div>
</div>
</div>

     

      <!-- /.row -->
                <script type="text/javascript">
                    jQuery(document).ready(function(){
                      var printHeader = $('#print-header-wrapper').html();
                      // var printfooter = $('#footer_is').html();
                      var printtotal = $('#total_is').html();                        
                      var div_pageBreaker = '<div style="page-break-before:always;"></div>';
                      var per_page = 10;
                      $('#table_data').each(function(index, element){
                        //how many pages of rows have we got?
                        var to_l=$('tbody tr').length;
                          // alert(to_l);
                        var pages = Math.ceil($('tbody tr').length / per_page);
                        // alert(pages) ;                      
                        //if we only have one page no more
                        if (pages == 1) {
                          if(pages!='1'){
                            return;
                          }else{
                            // if (pages==1) {
                            //   alert('hello');
                            // }
                          }                               
                                
                        }
                            //get the table we're splutting
                        var table_to_split = $(element);

                            var current_page =0;
                            //loop through each of our pages
                            for (current_page = 1; current_page < pages; current_page++){
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
                                if (cloned_table.find('tbody tr').length > 0) {
                                  $('tbody tr', cloned_table).each(function(loop, row_element) {

                                      //if we are before our current page
                                      if (loop < per_page) {                            
                                          //remove that one
                                          $(row_element).remove();
                                      }
                                  });
                                }
                                // alert(pages);
                                //insert the other table afdter the copy
                                if (current_page < pages) {
                                  // alert(cloned_table.find('tbody tr').length);
                                  if (cloned_table.find('tbody tr').length > 0) {
                                  
                                    $(div_pageBreaker).appendTo('#lastDataTable');
                                    $(printHeader).appendTo('#lastDataTable');
                                    $(cloned_table).appendTo('#lastDataTable');
                                    // $(printfooter).appendTo('#lastDataTable');
                                  }
                                  
                                }
                                

                                //make a break
                                table_to_split = cloned_table;
                            }
                        });
                    });
                </script>
              </body>
            </html>

            <?php }?>