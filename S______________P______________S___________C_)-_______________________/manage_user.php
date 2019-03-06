<?php
error_reporting(0);
ob_start();
session_start();
if($_SESSION['user']=="admintech@gmail.com" OR $_SESSION['admintech exam'])
{
?>

<div class="col-lg-12">
<legend><h3>Manage User</h3></legend>
                <div class="tab-content">
				
                  <div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
                    
                      <div align="center" id="txtHint">
                      <div class="row">
                        <div class="col-md-12">
                          
    <ul id="tabs">
      <li><a id="current" href="#" name="#add_user">Add User</a></li>
      <li><a id="" href="#" name="#update_user">Update User</a></li>
      <li><a id="" href="#" name="#delete_user">Delete User</a></li>
    </ul>

                          <div id="content">
                              <div style="display: none;" id="add_user">
                               <div class="col-md-6">
                                 <form action="save_manage_user.php" id="add_users" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                  <table class="table">
                  <tr>
                  <td>Usertype</td>
                  <td><select id="utype1" name="utype1" class="form-control text-center">
                  <option value="">--Select User Type--</option>
                  <option value="pre exam">Pre-Exam Officer</option>
                  <option value="post exam">Post-Exam Officer</option>
                  <option value="admin exam">Admin-Exam Officer</option>
                  <option value="verification exam">Verification-Exam Officer</option>
                  <option value="admintech exam">Admin Tech-Exam Officer</option>
                  <option value="admin normal">Admin Normal Officer</option>
                  </select>
                  </td>
                  </tr>
                  <tr>
                  <td>Username</td>
                  <td><input type="text" id="uname1" name="uname1" class="form-control"  /></td>
                  <span id="errornews" style="color:red" ></span>
                  </tr>
                  <tr>
                  <td>Phone</td>
                  <td><input type="text" id="phone1" name="phone1" class="form-control"/></td>
                  </tr>
                  </table>
                  <center>
                  <button type="button" onclick="check_users()" class="btn btn-primary" >Save</button>
                  <!--<input type="submit" id="save" name="save" value="Save" class="btn-primary">
  -->
                  &nbsp;&nbsp;<input type="button" id="send_add" name="send_add" value="Send" class="btn-primary"></center>
                  	
                         </form>
                                
                              </div>
                              
                              </div>
                              <div style="display: none;" id="update_user">
                               <div class="col-md-6">
                                 <form action="update_manage_user.php" id="updt_user" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                  <table class="table">
                  <tr>
                  <td>User Type</td>
                  <td><select id="utype2" name="utype2" class="form-control text-center" onChange="show_updt_username(this.value);">
                  <option value="">--Select User Type--</option>
                  <option value="pre exam">Pre-Exam Officer</option>
                  <option value="post exam">Post-Exam Officer</option>
                  <option value="admin exam">Admin-Exam Officer</option>
                  <option value="verification exam">Verification-Exam Officer</option>
                  <option value="admintech exam">Admin Tech-Exam Officer</option>
                  <option value="admin normal">Admin Normal Officer</option>
                  </select>
                  </td>
                  </tr>
                  <tr>
                  <td>User Name</td>
                  <td><select id="uname2" name="uname2" class="form-control text-center" onChange="show_updt_phn_pwd(this.value);">
                  <option value="">--Select User Name--</option>
                  </select>
                  </td>
                  </tr>
                  </table>
                  <table id="show_user_info" class="table">
                  </table>
                  <center><input type="submit" disabled="disabled" id="update" name="update" value="Update" class="btn-primary">&nbsp;&nbsp;<input type="button" id="send_update" name="send_update" value="Send" class="btn-primary"></center>
                  	
                         </form> 
                         </div>
                              </div>
                              <div style="display: none;" id="delete_user">
                               <div class="col-md-6">
                                 <form action="" id="del_user" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                  <table class="table">
                  <tr>
                  <td>User Type</td>
                  <td><select id="utype3" name="utype3" class="form-control text-center" onChange="show_del_username(this.value);">
                 <option value="">--Select User Type--</option>
                  <option value="pre exam">Pre-Exam Officer</option>
                  <option value="post exam">Post-Exam Officer</option>
                  <option value="admin exam">Admin-Exam Officer</option>
                  <option value="verification exam">Verification-Exam Officer</option>
                  <option value="admintech exam">Admin Tech-Exam Officer</option>
                  <option value="admin normal">Admin Normal Officer</option>
                  </select>
                  </td>
                  </tr>
                  <tr>
                  <td>User Name</td>
                  <td><select id="uname3" name="uname3" class="form-control text-center">
                  <option value="">--Select User Name--</option>
                  </select>
                  </td>
                  </tr>
                  </table>
                  <center><input type="submit" id="delete" name="delete" value="Delete" class="btn-primary">&nbsp;&nbsp;<input type="button" id="send_delete" name="send_delete" value="Send" class="btn-primary"></center>
                  	
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
<script type="text/javascript">
    function check_users(){
        var cat=$('#uname1').val();
        if(cat!=""){            
                $.ajax({
                    type: "POST",
                    url: "search_admin_user.php",
                     data: {email:cat},
                    success: function(result)   {
                        if(result==1){
                             document.getElementById("errornews").innerHTML = "";
                            $("#add_users").submit(); 
                        }else{
                          document.getElementById("errornews").innerHTML = "This Email Is Present In Our Datebase ,"+cat;
                          return false;
                        }
                    }
                });           
        }else{
            document.getElementById("errornews").innerHTML = "Event Should Not Left Blank";
            return false;

        }
        

    }
    </script>