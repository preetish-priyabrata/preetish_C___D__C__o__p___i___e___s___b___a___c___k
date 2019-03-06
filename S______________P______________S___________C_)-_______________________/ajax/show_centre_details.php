<?php
error_reporting(0);
session_start();
if($_REQUEST["centre"]=="ATTC Sikkim")
{
?>
<tr>
                  <td>Address</td>
                  <td><textarea id="adrs1" name="adrs1" class="form-control">gangtok, sikkim</textarea></td>
                  </tr>
                  <tr>
                  <td>Contact Person</td>
                  <td><input type="text" id="cp1" name="cp1" value="Adarsh Gupta" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Contact No</td>
                  <td><input type="text" id="cont1" name="cont1" value="9865321456" class="form-control"/></td>
                   </tr>
                  <tr>
                  <td>Email id</td>
                  <td><input type="text" id="eid1" name="eid1" value="adarshgupta@gmail.com" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Sitting Capacity</td>
                  <td><input type="text" id="sc1" name="sc1" value="700" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>No Of Rooms</td>
                  <td><input type="text" id="nor1" name="nor1" value="35" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td colspan="2" style="text-align:center"><input type="button" id="update" name="update" value="Update" class="btn-primary"></td>
                  </tr>
<?php
}
?>