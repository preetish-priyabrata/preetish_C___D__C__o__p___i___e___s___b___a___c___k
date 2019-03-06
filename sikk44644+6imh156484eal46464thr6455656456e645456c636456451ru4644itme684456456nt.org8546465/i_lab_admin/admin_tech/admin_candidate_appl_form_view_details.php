<?php
session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="View Candidate Application Form List";
 $slno=$_GET['slno'];
  $query = "SELECT * FROM `application_form` where `slno`='$slno'";
  $query_exe = mysqli_query($conn,$query);
  $fetch_result=mysqli_fetch_array($query_exe);  

?>
<style type="text/css">
  .form-control[disabled], .form-control[readonly] {
    color: #013F4B;
}
</style>
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

      <div class="container-fluid page-content">
        <div class="row">
          <div class="col-lg-9 col-sm-8">
            <div class="panel panel-flat">
              <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-user position-left"></i>About - <?=$fetch_result['candidate_name']?></div>
              </div>

              <div class="panel-body">
                
                  <ul class="nav nav-pills">
                    <li class="active"><a data-toggle="pill" href="#home">Personal</a></li>
                    <!-- <li><a data-toggle="pill" href="#menu1">SSC Details</a></li> -->
                    <li><a data-toggle="pill" href="#menu2">Eductional</a></li>
                    <li><a data-toggle="pill" href="#menu3">Reservation Category</a></li>
                    <!-- <li><a data-toggle="pill" href="#menu4">Misc Reservation Category</a></li> -->
                    <!-- <li><a data-toggle="pill" href="#menu7">Misc Details</a></li> -->
                    <li><a data-toggle="pill" href="#menu5">Address Information</a></li>
                    <li><a data-toggle="pill" href="#menu6">Declaration</a></li>
                  </ul>
                  
                  <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                      <h3>Personal</h3>
                      <table class="table table-borderless table-striped">
                        <tbody>
                          <tr>
                            <td><strong>Mobile No</strong></td>
                            <td><?=$fetch_result['candidate_mobile']?></td>
                          </tr>
                          <tr>
                            <td style="width: 20%;"><strong>Candidate Name </strong></td>
                            <td><?=$fetch_result['candidate_name']?></td>
                          </tr>
                          <tr>
                            <td><strong>Sikkim Subject Certificate Id * </strong></td>
                            <td><?=$fetch_result['sikkim_subject_no']?></td>
                          </tr>
                          <tr>
                            <td><strong>Date Of Birth</strong></td>
                            <td><?=$fetch_result['candidate_dob']?></td>
                          </tr>
                          <tr>
                            <td><strong>Age</strong></td>
                            <td><?=$fetch_result['c_age']?></td>
                          </tr>
                          <tr>
                            <td><strong>Father Name </strong></td>
                            <td><?=$fetch_result['candidate_father_name']?></td>
                          </tr>
                          <tr>
                            <td><strong>Gender </strong></td>
                            <td>
                              <select disabled class="form-control" id="gender" name="gender" required>
                                <option value="">----</option>
                                <option value="male" <?php if($fetch_result['candidate_gender']=='male'){echo "selected";}?>>Male</option>
                                <option value="female" <?php if($fetch_result['candidate_gender']=='female'){echo "selected";}?> >Female</option>
                                <!-- <option value="transgender">Transgender</option> -->
                              </select>
                            </td>
                          </tr>
                          <?php if($fetch_result['candidate_gender']=='female'){ ?>
                          <tr>
                            <td><strong>Marital Status </strong></td>
                            <td>
                              <select disabled class="form-control" id="gender" name="gender" required>
                                <option value="">----</option>
                                <option value="1" <?php if($fetch_result['candidate_marital_status']=='1'){echo "selected";}?> >Un-married</option>
                                <option value="2" <?php if($fetch_result['candidate_marital_status']=='2'){echo "selected";}?> >Married</option> 
                              </select>
                            </td>
                          </tr>
                          <?php if($fetch_result['candidate_marital_status']=='1'){?>
                            <tr>
                              <td><strong>Unmarried certificate</strong></td>
                              <td>
                                <?php if(!empty($fetch_result['candidate_unmaried_certificate_no'])){
                                echo $fetch_result['candidate_unmaried_certificate_no'];

                              }else{
                                echo "Not Provided";
                              }?>
                              </td>
                            </tr>



                          <?php } if($fetch_result['candidate_marital_status']=='2'){?> 
                            <tr>
                              <td><strong>Husband Name </strong></td>
                              <td>
                                <?php if(!empty($fetch_result['candidate_husband_name'])){
                                echo $fetch_result['candidate_husband_name'];

                              }else{
                                echo "Not Provided";
                              }?>
                              </td>
                            </tr>
                            <tr>
                              <td><strong>Husband certificate COI/SSC </strong></td>
                              <td>
                                <?php if(!empty($fetch_result['candidate_husbands_SSC'])){
                                echo $fetch_result['candidate_husbands_SSC'];

                              }else{
                                echo "Not Provided";
                              }?>
                              </td>
                            </tr>
                            <?php }?>
                          <?php }?>
                        </tbody>
                      </table>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                      <h3>Educational</h3>
                         <table class="table table-borderless table-striped">
                        <tbody>
                          <tr>
                            <td style="width: 30%;"><strong>Min. Educational Qualification </strong></td>
                             <?php 
                              $edu="SELECT * FROM `ilab_class` WHERE `status`='1'";
                              $sql_edu=mysqli_query($conn,$edu);
                              while($res_edu=mysqli_fetch_assoc($sql_edu)){
                              ?>
                                <td> <select disabled class="form-control" id="candidate_qualification" name="candidate_qualification" required="">
                                  <option value="">----</option>
                                  <?php 
                                  $edu="SELECT * FROM `ilab_class` WHERE `status`='1'";
                                  $sql_edu=mysqli_query($conn,$edu);
                                  while($res_edu=mysqli_fetch_assoc($sql_edu)){
                                  ?>
                                  <option value="<?=$res_edu['slno_class']?>" <?php if($res_edu['slno_class']==$fetch_result['candidate_qualification']){ echo "selected";}?>><?=$res_edu['class_name']?></option>
                                  <?php }?>
                                </select>  </td>          
                            </tr>
                          <?php }?> 
                         
                              <tr>
                                <td><strong>Diploma/ ITI</strong></td>
                                <td> 
                                 <select disabled class="form-control" id="diploma_status"  name="diploma_status" required="">
                                 <option value="">----</option>
                                 <option value="1" <?php if($fetch_result['diploma_status']=='1'){echo "selected";}?> >Yes</option>
                                 <option value="2" <?php if($fetch_result['diploma_status']=='2'){echo "selected";}?> >No</option> 
                                 </select>
                               </td>
                             </tr>
                             <tr>
                                <td><strong>Diploma/ITI </strong></td>
                                <td>
                                  <?php if($fetch_result['diploma_status']=='1'){
                                      if(!empty($fetch_result['iti_certificate_no'])){
                                        echo $fetch_result['iti_certificate_no'];
                                      }else{
                                        echo "Not Provided";
                                      }
                                  }else{
                                    echo "Not Applicable";
                                  }
                                    ?>
                                  



                                </td>
                           </tbody>
                        </table>
                     </div>

                     <div id="menu3" class="tab-pane fade">
                      <h3>Reservation Category</h3>
                       <table class="table table-borderless table-striped">
                        <tbody>
                          <tr>
                            <td style="width: 30%;"><strong>Candidate belongs to the category </strong></td>
                            <td><?=$fetch_result['candidate_belongs_cat']?></td>
                          </tr>
                          <tr>
                            <td><strong>Castes Certificate No</strong></td>
                            <td><?php 
                              if($fetch_result['candidate_belongs_cat']!="Gen"){
                                if(!empty($fetch_result['candidate_certificate_cat'])){
                                  echo ($fetch_result['candidate_certificate_cat']);
                                }else{
                                  echo "Not Provided";
                                }

                              }else{
                                echo "Not Applicable";
                              }


                              ?></td>
                          </tr>
                          <tr>
                            <td><strong>SPAE Status</strong></td>
                            <td>
                            <?php if($fetch_result['spae_status']=='1'){echo "Yes";}?>
                             <?php if($fetch_result['spae_status']=='2'){echo "No";}?> 
                          </td>
                          </tr>
                          
                          <tr>
                            <td><strong>SPAE Certificate No </strong></td>
                            <td>
                              <?php if($fetch_result['spae_status']=='1'){
                                      if(!empty($fetch_result['spae_no'])){
                                         echo $fetch_result['spae_no'];
                                      }else {
                                        echo "Not Provided";
                                      }
                                    }else{
                                       echo "Not Applicable";
                                    }?>
                            </td>
                          </tr>
                            <tr>
                              <td style="width: 30%;"><strong>Whether the candidate applying under  </strong></td>
                              <td>
                               <?php 
                                    if($fetch_result['candidate_category']=='1'){
                                      echo "BPL";
                                    }else if($fetch_result['candidate_category']=='2'){
                                      echo "PWD";
                                    }else if($fetch_result['candidate_category']=='3'){
                                      echo "ExServiceman";
                                    }else{
                                      echo "Not Applicable";
                                    }

                               ?>
                              </td>
                            </tr>
                            <?php 
                                 if($fetch_result['candidate_category']=='1'){
                            ?>
                            <tr>
                              <td>BPL certificate Issued by DES & ME</td>
                              <td>
                                <?php 
                                if(!empty($fetch_result['candidate_bpl_card_no'])){
                                  echo $fetch_result['candidate_bpl_card_no'];
                                }else{
                                  echo "Not Provided";
                                }
                                ?>
                              </td>
                            </tr>
                            <?php }?>
                            <?php 
                              if($fetch_result['candidate_category']=='2'){
                              ?>
                              <tr>
                                <td><strong>PWD Card no issued by SJ & WD </strong></td>
                                <td>
                                  <?php 
                                    if(!empty($fetch_result['pwd_card_no'])){
                                      echo $fetch_result['pwd_card_no'];
                                    }else{
                                      echo "Not Provided";
                                    }
                                  ?>
                                  
                                </td>
                              </tr>
                              <tr>
                                <td><strong>PWD Type </strong></td>
                                <td>
                                  <?php 
                                    if(!empty($fetch_result['pwd_name_id'])){
                                     echo $fetch_result['pwd_name_id'];
                                    }else{
                                      echo "Not Provided";
                                    }
                                  ?>
                                  
                                </td>
                              </tr>

                              <?php }?>
                              <tr>                               
                                <td><strong>Applying For Driver </strong></td>
                                <td>
                                  <?php if($fetch_result['candidate_driving_licence_no_status']=='1'){echo "Yes";}?>
                                  <?php if($fetch_result['candidate_driving_licence_no_status']=='2'){echo "No";}?>
                                </td>
                              </tr>
                               <?php if($fetch_result['candidate_driving_licence_no_status']=='1'){ ?>
                              <tr>                               
                                <td><strong>Latest Driving Licence No</strong></td>
                                <td>
                                  <?php 
                                    if(!empty($fetch_result['candidate_driving_licence_no'])){
                                     echo $fetch_result['candidate_driving_licence_no'];
                                    }else{
                                      echo "Not Provided";
                                    }
                                  ?>
                                </td>
                              </tr>
                              <?php }?>
                        </tbody>
                      </table>
                     </div>
                     

                     <div id="menu5" class="tab-pane fade">
                      <h3>Address Information</h3>
                       <table class="table table-borderless table-striped">
                        <tbody>
                          <tr>
                            <td style="width: 30%;"><strong>Present Address </strong></td>
                           
                            <td>
                              <textarea class="form-control" rows="5" id="candidate_present_address" placeholder="Address Of Communication" name="candidate_present_address" required="" disabled=""><?=$fetch_result['candidate_present_address']?></textarea> </td>
                          </tr>
                          <tr>
                            <td><strong>Parmanent Address</strong></td>
                            <td>
                            <textarea class="form-control" rows="5"  name="candidate_permanent_address" disabled="" id="candidate_permanent_address" placeholder="Permanent Address" required=""><?=$fetch_result['candidate_permanent_address']?></textarea>
                          </td>
                          </tr>
                         
                        </tbody>
                      </table>
                    </div>
                     <div id="menu6" class="tab-pane fade">
                      <h3>Declaration</h3>
                       <table class="table table-borderless table-striped">
                        <tbody>
                          <tr>
                            <td style="width: 70%;"> <input checked disabled type="checkbox" required="" class="form-check-input" name="">
                             <p class="text-justify text-capitalize">I hereby declare that the information furnished above are true and correct to the best of my knowledge and belief. In case, any information furnished is found incorrect, incomplete before issue of admit card and or at any stage of examination, I undertake that my candidature is liable to be rejected. <br><strong class="pull-right">Date : <?=$fetch_result['date']?></strong></td>
                            <td>
                             <img src="../../images/photo/<?=$fetch_result['candidate_photo']?>" alt="" width="180px"><br><br>
                          </td>
                          </tr>
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <br>
              <br>
              <div class="panel panel-flat">
                <div class="panel-heading">
                  <div class="panel-title"><i class="fa fa-user position-left"></i>Payment Detail For Applied Post of <?=$fetch_result['candidate_name']?></div>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                      <table id="example_applied" class="table table-striped">
                      <thead class="thead-inverse">
                        <tr>
                          <th>#</th>
                          <th>Reference No </th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>Job Detail</th>
                          <th>Payment Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $x=0;
                        $get_pay_details="SELECT * FROM `ilab_payment_info` WHERE `mobile_no`='$fetch_result[candidate_mobile]' order by `slno_group_pay` desc";
                        $sql_get_pay_details=mysqli_query($conn,$get_pay_details);
                        while ($result_sql_get_pay_details=mysqli_fetch_assoc($sql_get_pay_details)) {
                          $x++;
                        
                          // `payment_reference_no``amount_to``post_name``date``payment_status`
                        ?>
                        <tr>
                          <th scope="row"><?=$x?></th>
                          <td><?=$result_sql_get_pay_details['payment_reference_no']?></td>
                          <td>Rs <?=$result_sql_get_pay_details['amount_to']?></td>
                          <td><?=$result_sql_get_pay_details['date']?></td>
                          <td><?php
                          $post_name=json_decode($result_sql_get_pay_details['post_name']);
                            for ($i=0; $i <count($post_name) ; $i++) { 
                              echo $post_name[$i]."<br>";
                            }
                          ?></td>
                          <td><?php 
                          $payment_status=$result_sql_get_pay_details['payment_status'];
                            switch ($payment_status) {
                              case '1':
                                echo "success";
                                break;
                              case '2':
                                echo $result_sql_get_pay_details['ErrorDescription'];
                                break;
                              
                              default:
                                echo "Payment Pending";
                                break;
                            }
                          ?></td>
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>




         
          </div>

          <div class="col-lg-3 col-sm-4">

            <!-- User thumbnail -->
            <div class="thumbnail">
              <div class="thumb ">
                <img src="../../images/photo/<?=$fetch_result['candidate_photo']?>" alt="">
              </div>
              <div class="caption text-center">
                <h3 class="no-margin"><?=$fetch_result['candidate_name']?> 
                  <!-- <small class="display-block">Lead UX designer</small> -->
                </h3> 
              </div>
            </div>
            <!-- /user thumbnail -->

            <!-- Navigation -->
            <!-- <div class="list-group list-group-lg m-b-20">
              <a href="#" class="list-group-item"><i class="icon-user"></i> My profile</a>
              <a href="#" class="list-group-item"><i class="icon-cash3"></i> Balance</a>
              <a href="#" class="list-group-item"><i class="icon-tree7"></i> Connections <span class="badge bg-danger pull-right">19</span></a>
              <a href="#" class="list-group-item"><i class="icon-users"></i> Friends</a>
              <div class="list-group-divider"></div>
              <a href="#" class="list-group-item"><i class="icon-calendar3"></i> Events <span class="badge bg-teal-400 pull-right">20</span></a>
              <a href="#" class="list-group-item"><i class="icon-cog3"></i> Account settings</a>
            </div> -->
            <!-- /navigation -->

            <!-- Connections -->
            <div class="panel panel-flat">
              <div class="panel-heading">
                <div class="panel-title mb-10">Address</div>
              </div>

              <ul class="media-list media-list-linked pb-5">
                <!-- <li class="media-header p-l-15 text-semibold">Present Address</li> -->

                <li class="media">
                  <!-- <a href="#" class="media-link"> -->
                    <div class="media-left">
                      <!-- <img src="img/demo/img2.jpg" class="img-circle" alt=""> -->
                    </div>
                    <div class="media-body">
                      <span class="media-heading">Present Address</span>
                      <span class="media-annotation"><?=$fetch_result['candidate_present_address']?></span>
                    </div>
                  <!-- </a> -->
                </li>
                <li class="media">
                  <!-- <a href="#" class="media-link"> -->
                    <div class="media-left">
                      <!-- <img src="img/demo/img2.jpg" class="img-circle" alt=""> -->
                    </div>
                    <div class="media-body">
                      <span class="media-heading">Peramant Address</span>
                      <span class="media-annotation"><?=$fetch_result['candidate_permanent_address']?></span>
                    </div>
                  <!-- </a> -->
                </li>

                <!-- <li class="media">
                  <a href="#" class="media-link">
                    <div class="media-left"><img src="img/demo/img3.jpg" class="img-circle" alt=""></div>
                    <div class="media-body">
                      <span class="media-heading">Jane Elliott</span>
                      <span class="media-annotation">Lead UX designer</span>
                    </div>
                  </a>
                </li> -->

                <!-- <li class="media">
                  <a href="#" class="media-link">
                    <div class="media-left"><img src="img/demo/img4.jpg" class="img-circle" alt=""></div>
                    <div class="media-body">
                      <div class="media-heading"><span class="text-semibold">Eugine Turner</span></div>
                      <span class="text-muted">Lead UX designer</span>
                    </div>
                  </a>
                </li> -->

                <!-- <li class="media">
                  <a href="#" class="media-link">
                    <div class="media-left"><img src="img/demo/img5.jpg" class="img-circle" alt=""></div>
                    <div class="media-body">
                      <div class="media-heading"><span class="text-semibold">Jacqueline Howell</span></div>
                      <span class="text-muted">Network engineer</span>
                    </div>
                  </a>
                </li> -->

                <!-- <li class="media-header m-t-20 p-l-15 text-semibold">Partners</li> -->

               <!--  <li class="media">
                  <a href="#" class="media-link">
                    <div class="media-left"><img src="img/demo/img6.jpg" class="img-circle" alt=""></div>
                    <div class="media-body">
                      <span class="media-heading">Andrew Brewer</span>
                      <span class="media-annotation">Network engineer</span>
                    </div>
                  </a>
                </li> -->

                <!-- <li class="media">
                  <a href="#" class="media-link">
                    <div class="media-left"><img src="img/demo/img7.jpg" class="img-circle" alt=""></div>
                    <div class="media-body">
                      <span class="media-heading">Marilyn Romero</span>
                      <span class="media-annotation">Sales manager</span>
                    </div>
                  </a>
                </li> -->

                <!-- <li class="media">
                  <a href="#" class="media-link">
                    <div class="media-left"><img src="img/demo/img8.jpg" class="img-circle" alt=""></div>
                    <div class="media-body">
                      <span class="media-heading">Philip Hall</span>
                      <span class="media-annotation">Chief officer</span>
                    </div>
                   </a>
                 </li> -->
               </ul>
             </div>
            <!-- /connections -->
          </div>
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

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example_applied').DataTable();
} );
</script>
<script type="text/javascript">
  function get_post() {
    var category = document.getElementById('category').value;
    if(category!=""){
       $.ajax({
                type:'POST',
          url:'apply_get_post_value',
                data:'Category_names='+category,
                success:function(html){            
                  document.getElementById("get_post_info").innerHTML = html;    
                    
                }
            });


    }else{
      document.getElementById("get_post_info").innerHTML ="";
    }
  }
</script>