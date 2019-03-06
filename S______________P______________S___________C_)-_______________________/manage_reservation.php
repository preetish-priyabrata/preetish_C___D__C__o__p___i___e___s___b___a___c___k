<?php
error_reporting(0);
ob_start();
include "config.php";
session_start();
if($_SESSION['user']=="admintech@gmail.com")
{
?>
<style type="text/css">
.tab-content .col-lg-12 #general div table tr td b {
	font-family: Arial, Helvetica, sans-serif;
}
</style>

<script>
function sum() {

        var ctbc1 = document.getElementById('ctbc1').value;
        var ctbc2 = document.getElementById('ctbc2').value;
        var ctbc3 = document.getElementById('ctbc3').value;
        var ctbc4 = document.getElementById('ctbc4').value;
        var ctbc5 = document.getElementById('ctbc5').value;
        var ctbc6 = document.getElementById('ctbc6').value;
        var ctbc7 = document.getElementById('ctbc7').value;
        var ctbc8 = document.getElementById('ctbc8').value;
        var ctbc9 = document.getElementById('ctbc9').value;
        var ctbc10 = document.getElementById('ctbc10').value;
        var ctbc11 = document.getElementById('ctbc11').value;
        var ctbc12 = document.getElementById('ctbc12').value;
        var ctbc13 = document.getElementById('ctbc13').value;
        var ctbc14 = document.getElementById('ctbc14').value;
        var ctbc15 = document.getElementById('ctbc15').value;
        var ctbc16 = document.getElementById('ctbc16').value;
		var ctbc17 = document.getElementById('ctbc17').value;
        var ctbc18 = document.getElementById('ctbc18').value;

if(ctbc1=="")
{
	ctbc1=0;
}
if(ctbc2=="")
{
	ctbc2=0;
}
if(ctbc3=="")
{
	ctbc3=0;
}
if(ctbc4=="")
{
	ctbc4=0;
}
if(ctbc5=="")
{
	ctbc5=0;
}
if(ctbc6=="")
{
	ctbc6=0;
}
if(ctbc7=="")
{
	ctbc7=0;
}
if(ctbc8=="")
{
	ctbc8=0;
}
if(ctbc9=="")
{
	ctbc9=0;
}
if(ctbc10=="")
{
	ctbc10=0;
}
if(ctbc11=="")
{
	ctbc11=0;
}
if(ctbc12=="")
{
	ctbc12=0;
}
if(ctbc13=="")
{
	ctbc13=0;
}
if(ctbc14=="")
{
	ctbc14=0;
}
if(ctbc15=="")
{
	ctbc15=0;
}
if(ctbc16=="")
{
	ctbc16=0;
}
if(ctbc17=="")
{
	ctbc17=0;
}
if(ctbc18=="")
{
	ctbc18=0;
}

		var result = parseInt(ctbc1) + parseInt(ctbc2) + parseInt(ctbc3) + parseInt(ctbc4) + parseInt(ctbc5) + parseInt(ctbc6) + parseInt(ctbc7) + parseInt(ctbc8) + parseInt(ctbc9) +	parseInt(ctbc10) +	parseInt(ctbc11) +	parseInt(ctbc12) + parseInt(ctbc13) + parseInt(ctbc14) + parseInt(ctbc15) + parseInt(ctbc16) +	parseInt(ctbc17) +	parseInt(ctbc18);

        if (!isNaN(result)) {
            document.getElementById('total').value = result;
        }
        }
</script>
<div class="col-lg-12">
<legend><h3>Manage Reservation</h3></legend>
                <div class="tab-content">
				
                  <div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
                    
                      <div align="center" id="txtHint">
                      <div class="row">
                        <div class="col-md-12">
                          
    <ul id="tabs">
      <li><a id="current" href="#" name="#seat_res">Seat Reservation</a></li>
      <li><a id="" href="#" name="#candidate_rep">Candidate Reporting</a></li>
      <li><a id="" href="#" name="#archieve">Archieve</a></li>
    </ul>

                          <div id="content">
                          <div style="display: none;" id="seat_res">
                               <div class="col-md-12">
                                 <form action="save_manage_seat_reservation.php" id="seat_reservation" enctype="multipart/form-data" method="post" role="form" novalidate>
                                 <div class="col-md-4">
                                 <table class="table">
                  
                  <tr>
                  <td>Exam</td>
                  <td><select id="exam1" name="exam1" class="form-control">
                  <option value="">--Select Exam--</option>
                  <?php
				  $qry_exam="SELECT * FROM `exam_master_data`";
				 $sql_exam=mysqli_query($conn, $qry_exam);
				 while($res_exam=mysqli_fetch_array($sql_exam))
                  {
				  ?>
                  <option value="<?php echo $res_exam["examname"]; ?>"><?php echo $res_exam["examname"]; ?></option>
                  <?php
				  }
				  ?></select>
                  </td>
                  </tr>
                  <tr>
                  <td>Year</td>
                  <td><select id="year1" name="year1" class="form-control">
                  <option value="">--Select Year--</option>
                  <?php
                  for($i=2020; $i>2015;  $i--)
                  {
					  ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                  
                  <?php
				  }
				  ?>
                  </select></td>
                  </tr>
                  <tr>
                  <td>Month</td>
                  <td><select id="mnth1" name="mnth1" class="form-control">
                  <option value="">--Select Month--</option>
                  <option value="01">Jan</option>
                  <option value="02">Feb</option>
                  <option value="03">Mar</option>
                  <option value="04">Apr</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">Aug</option>
                  <option value="09">Sep</option>
                  <option value="10">Oct</option>
                  <option value="11">Nov</option>
                  <option value="12">Dec</option></select></td>
                  </tr>
                   
                    </table>
<center><input type="button" class="btn-primary" id="search1" name="search1" value="Search" onClick="show_seat_reservation_info();"></center>
                                 </div>
                                 <div class="col-md-6" id="seat_reservation_info">
                                 </div>
              
                  </form>
                                
                              </div>
                              
                              </div>
                              <div style="display: none;" id="candidate_rep">
                               <div class="col-md-12">
                                 <form action="" id="cand_rep" enctype="multipart/form-data" method="post" role="form" novalidate>
                                 <div class="col-md-4">
                                 <table class="table">
                  
                  <tr>
                  <td>Exam</td>
                  <td><select id="exam2" name="exam2" class="form-control">
                  <option value="">--Select Exam--</option>
                  <option>Exam-1</option>
                  <option>Exam-2</option>
                  <option>Exam-3</option></select>
                  </td>
                  </tr>
                  <tr>
                  <td>Year</td>
                  <td><select id="year2" name="year2" class="form-control">
                  <option value="">--Select Year--</option>
                  <option>2015</option>
                  <option>2014</option>
                  <option>2013</option>
                  <option>2012</option>
                  <option>2011</option>
                  <option>2010</option></select></td>
                  </tr>
                  <tr>
                  <td>Month</td>
                  <td><select id="mnth2" name="mnth2" class="form-control">
                  <option value="">--Select Month--</option>
                  <option>Jan</option>
                  <option>Feb</option>
                  <option>Mar</option>
                  <option>Apr</option>
                  <option>May</option>
                  <option>June</option>
                  <option>July</option>
                  <option>Aug</option>
                  <option>Sep</option>
                  <option>Oct</option>
                  <option>Nov</option>
                  <option>Dec</option></select></td>
                  </tr>
                   
                    </table>
<center><input type="button" class="btn-primary" id="search2" name="search2" value="Search" onClick="show_reservation_info();"></center>
                                 </div>
                                 <div class="col-md-6" id="reservation_info">
                                 </div>
              
                  </form>
                                
                              </div>
                              
                              </div>
                              
                              <div style="display: none;" id="archieve">
                               <div class="col-md-6">
                                 <form action="" id="archieve" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                  <table class="table">
                  </table>
                  
                         </form> 
                              </div>
                              </div>
                                      
                                                     </div>
                          
                          
                          
                        </div>
                        
                      </div>
                      
                      </div>
                  
                  </div>
                </div>
              </div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once'template.php';
?>