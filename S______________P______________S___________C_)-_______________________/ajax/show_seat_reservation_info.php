<?php
error_reporting(0);
session_start();
if($_SESSION['user']=="admintech@gmail.com")
{
?>
<table width="100%" border="2" cellspacing="10" cellpadding="10">
    <tr>
    <th width="20%" scope="col">Sl.No.</th>
    <th width="40%" scope="col">Category</th>
    <th width="40%" scope="col">No Of Seats Reserved</th>
    </tr>
 </table>
   <div style="height:300px; overflow:scroll; ">
  <table width="100%" border="2" cellspacing="10" cellpadding="10">
    <!--<tr>
    <th scope="col">Sl.No.</th>
    <th scope="col">Category</th>
    <th scope="col">Total Appeared</th>
    <th scope="col">Total Qualified</th>
    <th scope="col">Total Not Qualified</th>
    <th scope="col">Total MP</th>
    <th scope="col">No Of Seats Reserved</th>
    <th scope="col">Candidates To Be Called</th>
  </tr>-->
  <tr>
      <th width="20%" scope="row">1.</th>
      <th width="40%" scope="row">UNRESERVED</th>
      <td width="40%"><input type="text" id="ctbc1" name="ur" onkeyup="sum();" class="form-control"></td>
    </tr>
    <!--<tr>
      <th width="6%" scope="row">1.</th>
      <th width="19%" scope="row">UNRESERVED</th>
      <td width="11%">422</td>
      <td width="12%">380</td>
      <td width="12%">36</td>
      <td width="10%">6</td>
      <td width="15%">&nbsp;</td>
      <td width="15%"><input type="text" class="form-control"></td>
    </tr>-->
   <tr>
      <th scope="row">2.</th>
      <th scope="row">BL</th>
      <td><input type="text" id="ctbc2" name="bl" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">3.</th>
      <th scope="row">BL(W)</th>
      <td><input type="text" id="ctbc3" name="bl_w" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">4.</th>
      <th scope="row">BL(BPL)</th>
      <td><input type="text" id="ctbc4" name="bl_bpl" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">5.</th>
      <th scope="row">OBC(CL)</th>
      <td><input type="text" id="ctbc5" name="obc_cl" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">6.</th>
      <th scope="row">OBC(CL)(W)</th>
      <td><input type="text" id="ctbc6" name="obc_cl_w" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">7.</th>
      <th scope="row">OBC(CL)(BPL)</th>
      <td><input type="text" id="ctbc7" name="obc_cl_bpl" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">8.</th>
      <th scope="row">OBC(SL)</th>
      <td><input type="text" id="ctbc8" name="obc_sl" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">9.</th>
      <th scope="row">OBC(SL)(W)</th>
      <td><input type="text" id="ctbc9" name="obc_sl_w" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">10.</th>
      <th scope="row">OBC(SL)(BPL)</th>
      <td><input type="text" id="ctbc10" name="obc_sl_bpl" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">11.</th>
      <th scope="row">ST</th>
      <td><input type="text" id="ctbc11" name="st" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">12.</th>
      <th scope="row">ST(W)</th>
      <td><input type="text" id="ctbc12" name="st_w" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">13.</th>
      <th scope="row">ST(BPL)</th>
      <td><input type="text" id="ctbc13" name="st_bpl" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">14.</th>
      <th scope="row">SC</th>
      <td><input type="text" id="ctbc14" name="sc" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th height="31" scope="row">15.</th>
      <th scope="row">SC(W)</th>
      <td><input type="text" id="ctbc15" name="sc_w" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">16.</th>
     <th scope="row">SC(BPL)</th>
     <td><input type="text" id="ctbc16" name="sc_bpl" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">17.</th>
      <th scope="row">PT</th>
      <td><input type="text" id="ctbc17" name="pt" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">18.</th>
      <th scope="row">PT(W)</th>
      <td><input type="text" id="ctbc18" name="pt_w" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
    <td colspan="2" style="text-align:center"><b>Total</b></td>
    <td><div align="center"><input type="text" id="total" name="total" class="form-control" readonly style="background-color:#FFF; border:none;"></div></td>
    </tr>
  </table>
  <center><input type="submit" id="update" name="update" value="Add" class="btn-primary"></center>
  </div>
  <?php
  }
  ?>