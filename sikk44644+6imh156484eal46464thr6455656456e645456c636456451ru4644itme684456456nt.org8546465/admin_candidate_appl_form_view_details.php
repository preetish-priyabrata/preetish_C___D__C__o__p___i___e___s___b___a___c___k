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
  <!-- /Page Header-->
  <!-- <div class="container-fluid page-content">
    <div class="row">
    <?php $msg->display(); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">View Application Form</div>
        </div>
        <div class="panel-body">

          <div  class="form-horizontal">
            <div class="row">
              <div class="col-md-6">
                <fieldset style="border: 1px solid rebeccapurple; padding: 6px; margin-bottom: 11px;"><legend>Personal Information</legend>
                    <div class="row">
                      <div class="col-md-4 text-right">
                        <b>Candidate Name : </b>
                      </div>
                      <div class="col-md-8">
                        <?=$fetch_result['candidate_name']?>                      
                      </div>
                    </div>

                </fieldset>

              </div>
               <div class="col-md-6">
                
              </div>
            </div>
          </div>
        </div>
      </div>      
    </div>
  </div> -->

      <div class="container-fluid page-content">

        <div class="row">

          <div class="col-lg-10 col-sm-9">
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
                    <li><a data-toggle="pill" href="#menu4">Misc Reservation Category</a></li>
                    <li><a data-toggle="pill" href="#menu7">Misc Details</a></li>
                    <li><a data-toggle="pill" href="#menu5">Address Information</a></li>
                    <li><a data-toggle="pill" href="#menu6">Declaration</a></li>
                  </ul>
                  
                  <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                      <h3>Personal</h3>
                      <table class="table table-borderless table-striped">
                        <tbody>
                          <tr>
                            <td style="width: 20%;"><strong>Candidate Name </strong></td>
                            <td><?=$fetch_result['candidate_name']?></td>
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
                          <tr>
                            <td><strong>Marital Status </strong></td>
                            <td>
                              <select disabled class="form-control" id="gender" name="gender" required>
                                <option value="">----</option>
                                <option value="1" <?php if($fetch_result['candidate_marital_status']=='1'){echo "selected";}?> >Yes</option>
                                <option value="2" <?php if($fetch_result['candidate_marital_status']=='2'){echo "selected";}?> >No</option> 
                              </select>
                            </td>
                          </tr> 
                          <tr>
                            <td><strong>Husband Name </strong></td>
                            <td>
                              <?php if(!empty($$fetch_result['candidate_husband_name'])){
                              echo $fetch_result['candidate_husband_name'];

                            }else{
                              echo "Not Applicable";
                            }?>
                            </td>
                          </tr>
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
                            <td><strong>SPAE Status</strong></td>
                            <td>
                            <select disabled class="form-control" id="spae_status"  name="spae_status" required="">
                            <option value="">----</option>
                            <option value="1" <?php if($fetch_result['spae_status']=='1'){echo "selected";}?> >Yes</option>
                            <option value="2" <?php if($fetch_result['spae_status']=='2'){echo "selected";}?> >No</option> 
                          </select>
                          </td>
                          </tr>
                          <tr>
                            <td><strong>Castes Certificate No</strong></td>
                            <td><?=$fetch_result['candidate_certificate_cat']?></td>
                          </tr>
                          <tr>
                            <td><strong>SPAE Certificate No </strong></td>
                            <td><?=$fetch_result['spae_no']?></td>
                          </tr>
                        </tbody>
                      </table>
                     </div>
                     <div id="menu4" class="tab-pane fade">
                      <h3>Misc Reservation Category</h3><br>
                      <table class="table table-borderless table-striped">
                        <tbody>
                          <tr>
                            <td style="width: 30%;"><strong>Whether the candidate applying under  </strong></td>
                            <td>
                             <select disabled class="form-control" id="applying_status" onchange="Subject_status()" name="applying_status" required="">
                              <option value="">----</option>
                              <option value="1" <?php if($fetch_result['candidate_category']=='1'){echo "selected";}?> >BPL</option>
                              <option value="2" <?php if($fetch_result['candidate_category']=='2'){echo "selected";}?> >PWD</option>  
                              <option value="3" <?php if($fetch_result['candidate_category']=='3'){echo "selected";}?> >ExServiceman</option>                
                             </select>
                            </td>
                           </tr>
                          <tr>
                            <td><strong>BPL certificate Issued by DES & ME</strong></td>
                            <td>
                            <select disabled class="form-control" id="spae_status"  name="spae_status" required="">
                            <option value="">----</option>
                            <option value="1" <?php if($fetch_result['spae_status']=='1'){echo "selected";}?> >Yes</option>
                            <option value="2" <?php if($fetch_result['spae_status']=='2'){echo "selected";}?> >No</option> 
                          </select>
                          </td>
                          </tr>
                          <tr>
                            <td><strong>PWD Card no issued by SJ & WD </strong></td>
                            <td><input value="<?=$fetch_result['pwd_card_no']?>" disabled type="text" class="form-control">

                             <select disabled class="form-control" id="pwd_name_id" onchange="Subject_status()" name="pwd_name_id" >
                              <option value="">----</option>
                              <option value="Low Vision" <?php if($fetch_result['pwd_name_id']=='Low Vision'){echo "selected";}?> >Low Vision</option>
                              <option value="Hearing Imparement" <?php if($fetch_result['pwd_name_id']=='Hearing Imparement'){echo "selected";}?> >Hearing Imparement</option>  
                              <option value="Celebral Plassy" <?php if($fetch_result['pwd_name_id']=='Celebral Plassy'){echo "selected";}?> >Celebral Plassy</option>                
                            </select></td>
                          </tr>
                          <tr>
                            <td><strong>Applying For Driver </strong></td>
                              <td><select disabled class="form-control" id="candidate_driving_licence_no_status"  name="candidate_driving_licence_no_status" required="">
                              <option value="">----</option>
                             <option value="1" <?php if($fetch_result['candidate_driving_licence_no_status']=='1'){echo "selected";}?> >Yes</option>
                              <option value="2" <?php if($fetch_result['candidate_driving_licence_no_status']=='2'){echo "selected";}?> >No</option>
                            </select> </td>
                          </tr>
                          <tr>
                            <td><strong>Latest Driving Licence No </strong></td>
                           <td> <input value="<?=$fetch_result['candidate_driving_licence_no']?>" disabled type="text" class="form-control" id="candidate_driving_licence_no" name="candidate_driving_licence_no" placeholder="Enter Driving Licence No">  <small id="emailHelp" class="form-text text-muted danger"> </td>  
                          </tr>
                        </tbody>
                      </table>
                     </div>

                      <div id="menu7" class="tab-pane fade">
                      <h3>Misc Details</h3>
                      <table class="table table-borderless table-striped">
                        <tbody>
                          <tr>
                            <td style="width: 30%;"><strong>Unmarried Status  </strong></td>
                            <td>
                             <select disabled class="form-control" id="candidate_unmaried_certificate_no_status"  name="candidate_unmaried_certificate_no_status" required="">
                              <option value="">----</option>
                              <option value="1" <?php if($fetch_result['candidate_unmaried_certificate_no_status']=='1'){echo "selected";}?> >Yes</option>
                              <option value="2" <?php if($fetch_result['candidate_unmaried_certificate_no_status']=='2'){echo "selected";}?> >No</option>
                            </select> 
                              
                            <input value="<?=$fetch_result['candidate_unmaried_certificate_no']?>" disabled type="text" class="form-control" id="candidate_unmaried_certificate_no" placeholder="Enter Unmarried Certificate No" name="candidate_unmaried_certificate_no">     
                            <small id="emailHelp" class="form-text text-muted"> </small> </td>  
                            </td>
                           </tr>
                          <tr>
                            <td><strong>Married Status</strong></td>
                            <td>
                              <select disabled class="form-control" id="candidate_husbands_SSC_status"  name="candidate_husbands_SSC_status" required="">
                            <option value="">----</option>
                            <option value="1" <?php if($fetch_result['candidate_marital_status_SSC']=='1'){echo "selected";}?> >Yes</option>
                            <option value="2" <?php if($fetch_result['candidate_marital_status_SSC']=='2'){echo "selected";}?> >No</option>
                          </select> 
                          
                          <input value="<?=$fetch_result['candidate_husbands_SSC']?>" disabled type="text" class="form-control" id="candidate_husbands_SSC" placeholder="Enter Husbands COI/SSC" name="candidate_husbands_SSC">     
                          </td>
                          </tr>
                          <tr>
                            <td><strong>Divorce Status  </strong></td>
                            <td>

                              <select disabled class="form-control" id="candidate_divorce_certificate_status"  name="candidate_divorce_certificate_status" required="">
                              <option value="">----</option>
                              <option value="1" <?php if($fetch_result['candidate_divorce_certificate_status']=='1'){echo "selected";}?> >Yes</option>
                              <option value="2" <?php if($fetch_result['candidate_divorce_certificate_status']=='2'){echo "selected";}?> >No</option> 
                            </select>    
                            <input value="<?=$fetch_result['candidate_divorce_certificate']?>" disabled type="text" class="form-control" id="candidate_divorce_certificate" placeholder="Enter Divorce Certificate No" name="candidate_divorce_certificate">     
                          </td>
                          </tr>
                          <tr>
                            <td><strong>Employment Status </strong></td>
                              <td> <select disabled class="form-control" id="Employment_status"  name="Employment_status" required="">
                    <option value="">----</option>
                    <option value="1" <?php if($fetch_result['Employment_status']=='1'){echo "selected";}?> >Yes</option>
                    <option value="2" <?php if($fetch_result['Employment_status']=='2'){echo "selected";}?> >No</option> 
                  </select> </td>
                          </tr>
                          <tr>
                             <td><strong>Employment Card No </strong></td>
                             <td>
                            <input value="<?=$fetch_result['employment_card_no']?>" disabled type="text" class="form-control" id="Employment_no" name="Employment_no" placeholder="Enter Employment Card No" >
                             </td>
                          </tr>
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
                              <textarea class="form-control" rows="5" id="candidate_present_address" placeholder="Enter Address Of Communication" name="candidate_present_address" required="" disabled=""><?=$fetch_result['candidate_present_address']?></textarea> </td>
                          </tr>
                          <tr>
                            <td><strong>Present Address</strong></td>
                            <td>
                            <textarea class="form-control" rows="5"  name="candidate_permanent_address" disabled="" id="candidate_permanent_address" placeholder="Enter Permanent Address" required=""><?=$fetch_result['candidate_permanent_address']?></textarea>
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
                            <td style="width: 30%;"><strong>Present Address </strong></td>
                           
                            <td>
                             <input checked disabled type="checkbox" required="" class="form-check-input" name="">
                             <p class="text-justify text-capitalize">I hereby declare that the information furnished above are true and correct to the best of my knowledge and belief. In case, any information furnished is found incorrect, incomplete before issue of admit card and or at any stage of examination, I undertake that my candidature is liable to be rejected. <br>
                      
                             <strong class="pull-right">Date : <?=$fetch_result['date']?></strong>
                          </p> </td>
                          </tr>
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            <!-- <div class="panel panel-flat">
              <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-user position-left"></i>About - Jane Elliott</div>
              </div>
              <div class="panel-body">
                <table class="table table-borderless table-striped">
                  <tbody>
                    <tr>
                      <td style="width: 20%;"><strong>Info</strong></td>
                      <td>Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non.</td>
                    </tr>
                    <tr>
                      <td><strong>Founder</strong></td>
                      <td><a href="javascript:void(0)">Company Inc</a></td>
                    </tr>
                    <tr>
                      <td><strong>Education</strong></td>
                      <td><a href="javascript:void(0)">University Name</a></td>
                    </tr>
                    <tr>
                      <td><strong>Projects</strong></td>
                      <td><a href="javascript:void(0)" class="label label-danger">168</a></td>
                    </tr>
                    <tr>
                      <td><strong>Best Skills</strong></td>
                      <td>
                        <a href="javascript:void(0)" class="label label-info">HTML</a>
                        <a href="javascript:void(0)" class="label label-info">CSS</a>
                        <a href="javascript:void(0)" class="label label-info">Javascript</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div> -->

            <!-- <div class="panel panel-flat">
              <div class="panel-body">
                <div class="media">
                  <div class="media-left">
                    <a href="#"><img src="img/demo/img12.jpg" class="img-circle img-50" alt=""></a>
                  </div>
                  <div class="media-body">
                    <h6 class="media-heading"><a href="#">Tyler Rivera</a> <span class="media-annotation">- 2 hours ago</span></h6>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                  </div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-thumbs-up2 position-left"></i>367&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-thumbs-down2 position-left"></i>14&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-comment-discussion position-left"></i>28
                <div class="media">
                  <div class="media-body">
                    <div class="media">
                      <div class="media-left">
                        <a href="#"><img src="img/demo/img11.jpg" class="img-circle img-50" alt=""></a>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading"><a href="#">Emma Weaver</a> <span class="media-annotation">- 1 hour ago</span></h6>
                        Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                      </div>
                    </div>
                    <div class="media">
                      <div class="media-left">
                        <a href="#"><img src="img/demo/img10.jpg" class="img-circle img-50" alt=""></a>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading"><a href="#">Florence Douglas</a> <span class="media-annotation">- 30 minutes ago</span></h6>
                        Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.
                      </div>
                    </div>
                    <div class="media">
                      <div class="media-left">
                        <a href="#"><img src="img/demo/img9.jpg" class="img-circle img-50" alt=""></a>
                      </div>
                      <div class="media-body">
                        <textarea name="enter-message" class="form-control" rows="2" cols="1" placeholder="Enter your message..."></textarea>
                        <div class="row m-t-20">
                          <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-default">Post comments</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- <div class="panel panel-flat">

              <img src="img/covers/cover1.jpg" class="img-responsive" alt="">
              <div class="panel-body">
                <div class="media">
                  <div class="media-left">
                    <a href="#"><img src="../../images/photo/<?=$fetch_result['candidate_photo']?>" class="img-circle img-50" alt=""></a>
                  </div>
                  <div class="media-body">
                    <h5 class="media-heading"><a href="#">Tyler Rivera</a> <span class="media-annotation">- 2 hours ago</span></h5>
                    Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                  </div>
                </div>

                <div class="media">
                  <div class="media-left">
                    <a href="#"><img src="img/demo/img7.jpg" class="img-circle" alt=""></a>
                  </div>
                  <div class="media-body">
                    <textarea name="enter-message" class="form-control" rows="2" cols="1" placeholder="Enter your message..."></textarea>
                    <div class="row m-t-20">
                      <div class="col-xs-12 text-right">
                        <button type="button" class="btn btn-default">Post comments</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>

          <div class="col-lg-2 col-sm-3">

            <!-- User thumbnail -->
            <div class="thumbnail">
              <div class="thumb thumb-rounded">
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
            <div class="list-group list-group-lg m-b-20">
              <a href="#" class="list-group-item"><i class="icon-user"></i> My profile</a>
              <a href="#" class="list-group-item"><i class="icon-cash3"></i> Balance</a>
              <a href="#" class="list-group-item"><i class="icon-tree7"></i> Connections <span class="badge bg-danger pull-right">19</span></a>
              <a href="#" class="list-group-item"><i class="icon-users"></i> Friends</a>
              <div class="list-group-divider"></div>
              <a href="#" class="list-group-item"><i class="icon-calendar3"></i> Events <span class="badge bg-teal-400 pull-right">20</span></a>
              <a href="#" class="list-group-item"><i class="icon-cog3"></i> Account settings</a>
            </div>
            <!-- /navigation -->

            <!-- Connections -->
            <div class="panel panel-flat">
              <div class="panel-heading">
                <div class="panel-title mb-10">Latest connections</div>
              </div>

              <ul class="media-list media-list-linked pb-5">
                <li class="media-header p-l-15 text-semibold">Office staff</li>

                <li class="media">
                  <a href="#" class="media-link">
                    <div class="media-left"><img src="img/demo/img2.jpg" class="img-circle" alt=""></div>
                    <div class="media-body">
                      <span class="media-heading">James Alexander</span>
                      <span class="media-annotation">Lead UX designer</span>
                    </div>
                  </a>
                </li>

                <li class="media">
                  <a href="#" class="media-link">
                    <div class="media-left"><img src="img/demo/img3.jpg" class="img-circle" alt=""></div>
                    <div class="media-body">
                      <span class="media-heading">Jane Elliott</span>
                      <span class="media-annotation">Lead UX designer</span>
                    </div>
                  </a>
                </li>

                <li class="media">
                  <a href="#" class="media-link">
                    <div class="media-left"><img src="img/demo/img4.jpg" class="img-circle" alt=""></div>
                    <div class="media-body">
                      <div class="media-heading"><span class="text-semibold">Eugine Turner</span></div>
                      <span class="text-muted">Lead UX designer</span>
                    </div>
                  </a>
                </li>

                <li class="media">
                  <a href="#" class="media-link">
                    <div class="media-left"><img src="img/demo/img5.jpg" class="img-circle" alt=""></div>
                    <div class="media-body">
                      <div class="media-heading"><span class="text-semibold">Jacqueline Howell</span></div>
                      <span class="text-muted">Network engineer</span>
                    </div>
                  </a>
                </li>

                <li class="media-header m-t-20 p-l-15 text-semibold">Partners</li>

                <li class="media">
                  <a href="#" class="media-link">
                    <div class="media-left"><img src="img/demo/img6.jpg" class="img-circle" alt=""></div>
                    <div class="media-body">
                      <span class="media-heading">Andrew Brewer</span>
                      <span class="media-annotation">Network engineer</span>
                    </div>
                  </a>
                </li>

                <li class="media">
                  <a href="#" class="media-link">
                    <div class="media-left"><img src="img/demo/img7.jpg" class="img-circle" alt=""></div>
                    <div class="media-body">
                      <span class="media-heading">Marilyn Romero</span>
                      <span class="media-annotation">Sales manager</span>
                    </div>
                  </a>
                </li>

                <li class="media">
                  <a href="#" class="media-link">
                    <div class="media-left"><img src="img/demo/img8.jpg" class="img-circle" alt=""></div>
                    <div class="media-body">
                      <span class="media-heading">Philip Hall</span>
                      <span class="media-annotation">Chief officer</span>
                    </div>
                   </a>
                 </li>
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

