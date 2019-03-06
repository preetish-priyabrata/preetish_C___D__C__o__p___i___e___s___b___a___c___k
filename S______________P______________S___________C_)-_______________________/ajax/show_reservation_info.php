<?php
error_reporting(0);
session_start();
if($_SESSION['user']=="admintech@gmail.com")
{
?>
<table width="100%" border="2" cellspacing="10" cellpadding="10">
    <tr>
    <th width="5%" scope="col">Sl.No.</th>
    <th width="17.5%" scope="col">Category</th>
    <th width="13%" scope="col">No Of Seats Reserved</th>
    <th width="10.5%" scope="col">Total Appeared</th>
    <th width="11%" scope="col">Total Qualified</th>
    <th width="11%" scope="col">Total Not Qualified</th>
    <th width="10%" scope="col">Total MP</th>
    
    <th width="15%" scope="col">Candidates To Be Called</th>
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
      <th width="7.4%" scope="row">1.</th>
      <th width="18.5%" scope="row">UNRESERVED</th>
      <td width="14%"><div align="center">20</div></td>
      <td width="12.5%"><div align="center">422</div></td>
      <td width="12.2%"><div align="center">380</div></td>
      <td width="12.2%"><div align="center">36</div></td>
      <td width="10.5%"><div align="center">6</div></td>
      
      <td width="15%"><input type="text" id="ctbc1" onkeyup="sum();" class="form-control"></td>
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
      <td><div align="center">8</div></td>
      <td><div align="center">110</div></td>
      <td><div align="center">90</div></td>
      <td><div align="center">20</div></td>
      <td><div align="center">0</div></td>
      <td><input type="text" id="ctbc2" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">3.</th>
      <th scope="row">BL(W)</th>
      <td><div align="center">5</div></td>
      <td><div align="center">80</div></td>
      <td><div align="center">65</div></td>
      <td><div align="center">12</div></td>
      <td><div align="center">3</div></td>
      <td><input type="text" id="ctbc3" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">4.</th>
      <th scope="row">BL(BPL)</th>
      <td><div align="center">4</div></td>
      <td><div align="center">95</div></td>
      <td><div align="center">81</div></td>
      <td><div align="center">11</div></td>
      <td><div align="center">3</div></td>
      <td><input type="text" id="ctbc4" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">5.</th>
      <th scope="row">OBC(CL)</th>
      <td><div align="center">9</div></td>
      <td><div align="center">84</div></td>
      <td><div align="center">69</div></td>
      <td><div align="center">9</div></td>
      <td><div align="center">6</div></td>
      <td><input type="text" id="ctbc5" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">6.</th>
      <th scope="row">OBC(CL)(W)</th>
      <td><div align="center">7</div></td>
 		<td><div align="center">75</div></td>
      <td><div align="center">63</div></td>
      <td><div align="center">12</div></td>
      <td><div align="center">0</div></td>
      <td><input type="text" id="ctbc6" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">7.</th>
      <th scope="row">OBC(CL)(BPL)</th>
      <td><div align="center">3</div></td>
      <td><div align="center">92</div></td>
      <td><div align="center">82</div></td>
      <td><div align="center">8</div></td>
      <td><div align="center">2</div></td>
     <td><input type="text" id="ctbc7" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">8.</th>
      <th scope="row">OBC(SL)</th>
      <td><div align="center">6</div></td>
      <td><div align="center">50</div></td>
      <td><div align="center">38</div></td>
      <td><div align="center">6</div></td>
      <td><div align="center">6</div></td>
       <td><input type="text" id="ctbc8" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">9.</th>
      <th scope="row">OBC(SL)(W)</th>
      <td><div align="center">4</div></td>
      <td><div align="center">35</div></td>
      <td><div align="center">33</div></td>
      <td><div align="center">2</div></td>
      <td><div align="center">0</div></td>
      
     <td><input type="text" id="ctbc9" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">10.</th>
      <th scope="row">OBC(SL)(BPL)</th>
      <td><div align="center">7</div></td>
      <td><div align="center">61</div></td>
      <td><div align="center">48</div></td>
      <td><div align="center">10</div></td>
      <td><div align="center">3</div></td>
      
     <td><input type="text" id="ctbc10" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">11.</th>
      <th scope="row">ST</th>
      <td><div align="center">8</div></td>
      <td><div align="center">45</div></td>
      <td><div align="center">30</div></td>
      <td><div align="center">15</div></td>
      <td><div align="center">0</div></td>
      
      <td><input type="text" id="ctbc11" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">12.</th>
      <th scope="row">ST(W)</th>
      <td><div align="center">2</div></td>
      <td><div align="center">75</div></td>
      <td><div align="center">62</div></td>
      <td><div align="center">13</div></td>
      <td><div align="center">0</div></td>
      
      <td><input type="text" id="ctbc12" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">13.</th>
      <th scope="row">ST(BPL)</th>
      <td><div align="center">5</div></td>
      <td><div align="center">66</div></td>
      <td><div align="center">60</div></td>
      <td><div align="center">6</div></td>
      <td><div align="center">0</div></td>
      
      <td><input type="text" id="ctbc13" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">14.</th>
      <th scope="row">SC</th>
      <td><div align="center">9</div></td>
      <td><div align="center">82</div></td>
      <td><div align="center">65</div></td>
      <td><div align="center">12</div></td>
      <td><div align="center">5</div></td>
      
      <td><input type="text" id="ctbc14" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th height="31" scope="row">15.</th>
      <th scope="row">SC(W)</th>
      <td><div align="center">4</div></td>
      <td><div align="center">54</div></td>
      <td><div align="center">45</div></td>
      <td><div align="center">9</div></td>
      <td><div align="center">0</div></td>
      
      <td><input type="text" id="ctbc15" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">16.</th>
     <th scope="row">SC(BPL)</th>
     <td><div align="center">8</div></td>
      <td><div align="center">46</div></td>
      <td><div align="center">39</div></td>
      <td><div align="center">7</div></td>
      <td><div align="center">0</div></td>
      
      <td><input type="text" id="ctbc16" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">17.</th>
      <th scope="row">PT</th>
      <td><div align="center">6</div></td>
      <td><div align="center">70</div></td>
      <td><div align="center">62</div></td>
      <td><div align="center">8</div></td>
      <td><div align="center">0</div></td>
      
      <td><input type="text" id="ctbc17" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
      <th scope="row">18.</th>
      <th scope="row">PT(W)</th>
      <td><div align="center">3</div></td>
      <td><div align="center">58</div></td>
      <td><div align="center">49</div></td>
      <td><div align="center">9</div></td>
      <td><div align="center">0</div></td>
      
     <td><input type="text" id="ctbc18" onKeyUp="sum();" class="form-control"></td>
    </tr>
    <tr>
    <td colspan="2" style="text-align:center"><b>Total</b></td>
    <td><div align="center">118</div></td>
    <td colspan="4" style="text-align:center"><b>Total</b></td>
    <td><div align="center"><input type="text" id="total" class="form-control" readonly style="background-color:#FFF; border:none;"></div></td>
    </tr>
  </table>
  <center><input type="button" id="update" name="update" value="Add" class="btn-primary"></center>
  </div>
  <?php
  }
  ?>