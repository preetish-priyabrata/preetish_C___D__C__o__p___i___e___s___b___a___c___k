<!DOCTYPE html>
<?php
include '../config.php';
?>
<html lang="en">
    <head>
        <title>Kalinga Institute of Social Sciences</title>
        <script src="../js/script.js"></script>
        <script>
            function showDistrict(state) {
           
            if (state == "") {
                document.getElementById("district_name").innerHTML = "<option value=''>--Select--</option>";
                return;
            } else {
               
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("district_name").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "../ajax/getDistrict.php?state=" + state, true);
                xmlhttp.send();
            }
    //                    showBlock(district_name.value,this.id);
        }
        </script>
    </head>
    <body bgcolor="#F7F8E0">
    <center>
        <form action="add_info_details.php" method="POST">
        <h3>Add Block Name</h3>
        <table border=1>
            <tr>
            <td>State</td>
            <td><select name="state" id="state" onchange="showDistrict(this.value);">
             <option value="">-- Select State --</option>
             <option value="Assam">Assam</option>
             <option value="Chattisgarh">Chattisgarh</option>
             <option value="Jharkhand">Jharkhand</option>
             <option value="Mizoram">Mizoram</option>
             <option value="Odisha">Odisha</option>
             <!--<option value="other">other</option>-->
             </select></td>
             <td>District</td>
             <td><select name="district_name" id="district_name"><option value="">-- Select District --</option></select></td>
             <td>Blockname</td>
             <td><input type="text" name="block_name" id="block_name"></td>
             <td><input type="submit" name="add_block" id="add_block" value="ADD" ></td>     
            </tr>
            <tr id="error_sdb" style="color:red"></tr>
        </table> 
        </form>

<!-- add primitive tribe -->

        <form action="add_info_details.php" method="POST">
        <h3>Add Primitive tribe</h3>
        <table border=1> 
            <tr>
            <td><input type="text" name="primitive_tribe" id="primitive_tribe" onblur="check_primitiveTribe();"></td>
            <td><input type="submit" name="add_primitive_tribe"  value="ADD" ></td>
            </tr> 
        </table>
        </form>

<!-- add primitive tribe -->

<!-- add scheduled tribe  -->
        <form action="add_info_details.php" method="POST">
        <h3>Add Scheduled tribe</h3>
        <table border="1">   
            <tr><td><input type="text" name="scheduled_tribe" id="scheduled_tribe" onblur="check_scheduledTribe();"></td>
            <td><input type="submit" name="add_scheduled_tribe" value="ADD" ></td>
            </tr>
        </table>
        </form>

<!-- add scheduled tribe -->

<!-- add dialect  -->
        <form action="add_info_details.php" method="POST">
        <h3>Add Dialect</h3>
        <table border="1">      
        <tr>
            <td> <input type="text" name="dialect" id="dialect" onblur="check_dialect();"></td>
            <td><input type="submit" name="add_dialect" value="ADD" ></td>
        </tr>
        </table>
        </form>
        
<!-- add dialect -->
    </center>
    </body>
 </html>

