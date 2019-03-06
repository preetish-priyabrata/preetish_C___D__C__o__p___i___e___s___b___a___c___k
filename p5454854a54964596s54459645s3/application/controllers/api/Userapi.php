<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
date_default_timezone_set("Asia/Kolkata");
// use namespace
use Restserver\Libraries\REST_Controller;

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Preetish Priyabrata
 * @license         Innovadors Lab Pvt Lt6d
 * @link            hhtp://Innovadorslab.com/
 */
class Userapi extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->library('email');
        $this->load->library('upload');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        // $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        // $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key 
        $this->load->helper('file');
        $this->load->helper('url');
        $this->load->model('user_store','admins');
             $this->load->library("braintree_lib"); 
    }
/**
 * [users_post here user is checked and registered]
 * @return [type] [description]
 */
    public function users_post(){              
        //print_r($this->post());
        if($this->post('user_mobile') &&  $this->post('user_mobile')!="" && $this->post('user_email') &&  $this->post('user_email')!=""){
            $tables="users";
            $mob=$this->post('user_mobile');
            $email=$this->post('user_email');
            $data = array('mobile' => trim($mob));
            
            $results=$this->admins->check_common($tables,$data);
            // $results=0;
            // check mobile
            if($results==0){
                $data1 = array('email' => trim($email));
                $results1=$this->admins->check_common($tables,$data1);
                 // check email
                 if($results1==0){
                    $data['email'] =trim($email); 
                    $results12=$this->admins->insert_common($tables,$data);
                    // whem success
                    $det = array('response_status'=>"1",'msg'=>"Data Is received" );
                    $this->response($det, 200);
                 }else{
                    // when emailid is in use
                    $det = array('response_status'=>"3",'msg'=>"Email id is Already In Use");
                    $this->response($det, 200); 
                 }
            }else{
                $data1 = array('email' => trim($email));
                $results1=$this->admins->check_common($tables,$data1);
                 // check email
                 if($results1==0){
                    // when mobile nos is use
                    $det = array('response_status'=>"4",'msg'=>"Email id is Not Matched");
                    $this->response($det, 200);  
                 }else{
                    // when emailid is in use
                    $det = array('response_status'=>"5",'msg'=>"Allowed Work ");
                    $this->response($det, 200); 
                 }
                 

            }            
        }else{
            // when email or mobile no
            $det = array('response_status'=>"0",'msg'=>"Some Field Left Black");
            $this->response($det, 200);
        }

        // print_r($this->post());

    }
/**
 * [userpassdetail_post here user fill form or applying pass]
 * @return [type] [description]
 */
    public function userpassdetail_post(){ 
      
        if((!empty($_FILES['picture']['name'])) && (!empty($_FILES['picture1']['name'])) ){
             $pic =date('H:i:s').$_FILES['picture']['name'];
             $pic2 = date('H:i:s').$_FILES['picture1']['name'];
              $x=move_uploaded_file($_FILES["picture"]["tmp_name"],"upload/pic/".$pic);
              $x1=move_uploaded_file($_FILES["picture1"]["tmp_name"],"upload/pic/".$pic2);
               if(($x==1) && ($x1==1)){
                $mobile_registered=$this->post('mobile_registered');
                $applicant_name=$this->post('applicant_name');
                $applicant_address=$this->post('applicant_address');
                $place_visting=$this->post('place_visting');
                $application_mobile=$this->post('application_mobile');
                $applicant_id_source=$this->post('applicant_id_source');
                $applicant_id_no=$this->post('applicant_id_no');
                $dob=date('Y-m-d',strtotime(trim($this->post('dob'))));
                $purpose_visting=$this->post('purpose_visting');
                $date_journey=date('Y-m-d',strtotime(trim($this->post('date_journey'))));
                $Photo=$pic;
                $Scan_id_photo=$pic2;
                $date=date('Y-m-d');
                $time=date('H:i:s');
                $table="pass_detail_form";
                $data=array('mobile_registered'=>trim($mobile_registered),'applicant_name'=>trim($applicant_name),'applicant_address'=>trim($applicant_address),'place_visting'=>trim($place_visting),'application_mobile'=>trim($application_mobile),'applicant_id_source'=>trim($applicant_id_source),'applicant_id_no'=>trim($applicant_id_no),'dob'=>trim($dob),'purpose_visting'=>trim($purpose_visting),'date_journey'=>trim($date_journey),'Photo'=>trim($Photo),'Scan_id_photo'=>trim($Scan_id_photo),'date'=>$date,'time'=>$time);

                     $results12=$this->admins->insert_users_details($table,$data);
                     $token = $this->braintree_lib->create_client_token();
                     $token_no2=($token);
                     if($results12==1){
                         $data2=array('mobile_registered'=>trim($mobile_registered),'applicant_name'=>trim($applicant_name),'date'=>$date,'time'=>$time);
                         $query1 = $this->db->get_where($table, $data2);
                        if ($query1->num_rows() == 0){
                            $det = array('response_status' => "2", 'msg' => "Didn't match with User");
                            echo json_encode($det);
                            exit;

                        }else{
                            foreach ($query1->result() as $query1_get) {
                                 $token_no=$query1_get->token_no;
                            }
                            $det = array('response_status' => "1", 'msg' => "success" ,'token_no'=>"$token_no",'token'=>$token_no2);
                         echo json_encode($det);
                         exit;
                        }
                     }else{
                         $det = array('response_status' => "3", 'msg' => "Some Error");
                         echo json_encode($det);
                         exit;
                     }
               }else{
                    $det = array('response_status' => "4", 'msg' => "File Is not Attached");
                    echo json_encode($det);
                    exit;
               }
        }else{
            $det = array('response_status' => "0", 'msg' => "File Is not Attached");
            echo json_encode($det);
            exit;
        }
    }
/**
 * [place_post here place value is been send ]
 * @return [type] [description]
 */

    public function place_post(){

        if($this->post('user_mobile') &&  $this->post('user_mobile')!=""){
             $tables="users";
            $mob=$this->post('user_mobile');
            $data = array('mobile' => trim($mob));
            $results=$this->admins->check_common($tables,$data);
            if($results==0){
                $det = array('response_status'=>"2",'msg'=>"Not Registered");
                $this->response($det, 200); 
            }else{
                $table="master_places";
                $data2=array('status'=>"1");
                $query1 = $this->db->get_where($table, $data2);
                foreach ($query1->result() as $place_details ) {
                    $place_details_array[] = array('place_id'=>$place_details->place_id,'place_name' =>$place_details->place_name ,'price_detail'=>$place_details->price_detail,'re_sch_price'=>$place_details->reschedule_price);
                  
                }
                $det = array('response_status'=>"1",'msg'=>"sucess",'place_info'=>$place_details_array);
                $this->response($det, 200); 
            }
        }else{
           $det = array('response_status'=>"0",'msg'=>"Some Field Left Black");
            $this->response($det, 200); 
        }
    }
    //
    //here user pay status is be updated please give detailed as followed
    public function updateprice_status_post(){
        // print_r($this->post());
          $this->load->library("braintree_lib");
         if($this->post('user_mobile') &&  $this->post('user_mobile')!="" && $this->post('token_id') &&  $this->post('token_id')!="" && $this->post('transaction_pay_id') &&  $this->post('transaction_pay_id')!="" && $this->post('status_pay') &&  $this->post('status_pay')!=""){
               $tables="users";
            $mob=$this->post('user_mobile');
            $data = array('mobile' => trim($mob));
            $results=$this->admins->check_common($tables,$data);
            if($results==0){
                $det = array('response_status'=>"2",'msg'=>"Not Registered");
                $this->response($det, 200); 
            }
            $times_pay=date('H:i:s',strtotime(trim($this->post('pay_time'))));
            $Date_pay=date('Y-m-d',strtotime(trim($this->post('pay_time'))));
            $token_id=$this->post('token_id');
            $nonceFromTheClient=$transaction_pay_id=trim($this->post('transaction_pay_id'));
            $amount=$this->post('status_pay');
            $result = $this->braintree_lib->check_payment_token($amount,$nonceFromTheClient);
            $status_paying=strtolower($result->success);
            if($status_paying==1){
                $status_pay='1';
            }else{
                $status_pay='2';
            }
            
            $data=array('transaction_id'=>$transaction_pay_id,'paid_status'=>$status_pay,'payed_date'=>$Date_pay,'payed_time'=>$times_pay);
            $table="pass_detail_form";
            $data_files=array('token_no'=>$token_id,'mobile_registered'=>$mob);
            $status=$this->admins->update_table($table,$data,$data_files);
            if($status){
                $data['token_no']=$token_id;
                $data['payment_detail_amount']=$amount;
                $tables="pass_payment_application";
                 $results12=$this->admins->insert_common($tables,$data);
                     if($results12){
                        $det = array('response_status'=>"1",'msg'=>"Success",'status_payed'=>$result);
                        $this->response($det, 200);
                     }else{
                         $det = array('response_status'=>"3",'msg'=>"Failed");
                        $this->response($det, 200); 
                    }
                 
            }else{
                $det = array('response_status'=>"3",'msg'=>"Failed");
                $this->response($det, 200); 
            }
         }else{
             $det = array('response_status'=>"0",'msg'=>"Some Field Left Black");
            $this->response($det, 200); 
         }
    }
    public function user_pass_info_post(){
        if($this->post('user_mobile') &&  $this->post('user_mobile')!="" && $this->post('token_id') &&  $this->post('token_id')!="" && $this->post('date_journey') &&  $this->post('date_journey')!="" && $this->post('app_mobile') &&  $this->post('app_mobile')!=""){
              $tables="users";
            $mob=trim($this->post('user_mobile'));
            $data = array('mobile' => trim($mob));
            $results=$this->admins->check_common($tables,$data);
            if($results==0){
                $det = array('response_status'=>"2",'msg'=>"Not Registered");
                $this->response($det, 200); 
            }

            $application_mobile=trim($this->post('app_mobile'));
            $date_journey=date('Y-m-d',strtotime(trim($this->post('date_journey'))));
            $token_id=trim($this->post('token_id'));

            $data1=array('token_no'=>$token_id,'date_journey'=>$date_journey,'application_mobile'=>$application_mobile);
              $table="pass_detail_form";
             $results1=$this->admins->check_common($table,$data1);
            if($results1==0){
                $det = array('response_status'=>"3",'msg'=>"No Appliction Found");
                $this->response($det, 200); 
            }else{
               // (`slno_pass`, `token_no`, `mobile_registered`, `applicant_name`, `applicant_address`, `place_visting`, `application_mobile`, `applicant_id_source`, `applicant_id_no`, `dob`, `purpose_visting`, `date_journey`, `Photo`, `Scan_id_photo`, `paid_status`, `status`, `date`, `time`, `transaction_id`, `payed_date`, `payed_time`)
                $query1_detail = $this->db->get_where($table, $data1);
                foreach ($query1_detail->result() as $query1 ) {
                   $infos = array('token_no'=>$query1->token_no , 'applicant_name'=>$query1->applicant_name ,'applicant_address'=>$query1->applicant_address,'place_visting'=>$query1->place_visting,'application_mobile'=>$query1->application_mobile,'applicant_id_source'=>$query1->applicant_id_source,'applicant_id_no'=>$query1->applicant_id_no,'dob'=>$query1->dob,'purpose_visting'=>$query1->purpose_visting,'Photo'=>base_url('upload/pic') . '/' .$query1->Photo,'Scan_id_photo'=>base_url('upload/pic') . '/' .$query1->Scan_id_photo,'paid_status'=>$query1->paid_status,'status'=>$query1->status,'date_journey'=>$query1->date_journey);
                  
                }
                $det = array('response_status'=>"1",'msg'=>"sucess",'application_info'=>$infos);
                $this->response($det, 200); 
            }
            
        }else{
             $det = array('response_status'=>"0",'msg'=>"Some Field Left Black");
            $this->response($det, 200); 
        }
    }
    public function datesl_rejects_list_post(){
        if($this->post('user_mobile') &&  $this->post('user_mobile')!=""){
             $tables="users";
            $mob=$this->post('user_mobile');
            $data = array('mobile' => trim($mob));
            $results=$this->admins->check_common($tables,$data);
            if($results==0){
                $det = array('response_status'=>"2",'msg'=>"Not Registered");
                $this->response($det, 200); 
            }
            
            $first_date=date('Y-m-d'); //today date
             $second_date=date('Y-m-d', strtotime('+2 months')); // 2 month date
                $table="master_date_Blocker";
               // $data2=array('date_block >='=>$first_date,'date_block <='=>$second_date);
                $query1 = $this->db->get_where($table, array('date_block >='=>$first_date,'date_block <='=>$second_date));
                if ($query1->num_rows() == 0) {
                    $dates_details_array= array();
                    $det = array('response_status'=>"3",'msg'=>"sucess",'dates_info'=>$dates_details_array);
                    $this->response($det, 200);
                }else{
                foreach ($query1->result() as $dates_details ) {
                    $dates_details_array[] = array('date_block'=>date('d-m-Y', strtotime($dates_details->date_block)));
                  
                }
                
                $det = array('response_status'=>"1",'msg'=>"sucess",'dates_info'=>$dates_details_array,'curent_date'=>date('d-m-Y'));
               $this->response($det, 200);
               } 
          
        }else{
           $det = array('response_status'=>"0",'msg'=>"Some Field Left Black");
            $this->response($det, 200); 
        }
    }
/**
 * [re_schedule_phone_post description]
 * @return [type] [description]
 * here status is 2 mean he had enter 
 */
    public function re_schedule_phone_post(){
        if($this->post('old_doj') &&  $this->post('old_doj')!="" && $this->post('application_no') &&   $this->post('application_no')!="" && $this->post('user_mob') &&  $this->post('user_mob')!=""){
            $tables="users";
            $mob=$this->post('user_mob');
            $data = array('mobile' => trim($mob));
            $results=$this->admins->check_common($tables,$data);
            if($results==0){
                $det = array('response_status'=>"2",'msg'=>"Not Registered");
                $this->response($det, 200); 
            }
            $date_journey=date('Y-m-d',strtotime(trim($this->post('old_doj'))));
            $token_no=trim($this->post('application_no'));
            $table="pass_detail_form";
            $query1 = $this->db->get_where($table, array('token_no'=>$token_no,'date_journey'=>$date_journey));
            if ($query1->num_rows() == 0) {
                $det = array('response_status'=>"3",'msg'=>"There is No Such Application id on that Date of Journey");
                $this->response($det, 200); 
            }else{
                foreach ($query1->result() as $check_details ) {
                    $dates_details_array= array('application_mobile'=> $check_details->application_mobile ,'status_detail_vech'=>$check_details->status);
                  
                }

                $det = array('response_status'=>"1",'msg'=>"Sucess-fully",'applicant_mobile'=>$dates_details_array);
                $this->response($det, 200); 
            }
        }else{
            $det = array('response_status'=>"0",'msg'=>"Some Field Left Black");
            $this->response($det, 200); 
        }
    }
    public function price_updation_pass_post(){
        // print_r($this->post());
        // exit;
       if($this->post('application_mobile') &&  $this->post('application_mobile')!="" && $this->post('application_no') &&   $this->post('application_no')!="" && $this->post('user_mobile') &&  $this->post('user_mobile')!="" && $this->post('transaction_pay_id') &&  $this->post('transaction_pay_id')!="" && $this->post('status_pay') &&  $this->post('status_pay')!=""){
         $tables="users";
            $mob=$this->post('user_mobile');
            $data = array('mobile' => trim($mob));
            $results=$this->admins->check_common($tables,$data);
            if($results==0){
                $det = array('response_status'=>"2",'msg'=>"Not Registered");
                $this->response($det, 200); 
            }
            $times_pay=date('H:i:s',strtotime(trim($this->post('pay_time'))));
            $Date_pay=date('Y-m-d',strtotime(trim($this->post('pay_time'))));
            $date_journey=date('Y-m-d',strtotime(trim($this->post('date_journey'))));
            $token_id=$this->post('application_no');
            $transaction_pay_id=trim($this->post('transaction_pay_id'));
            $status_pay=trim($this->post('status_pay'));
            $data=array('transaction_id'=>$transaction_pay_id,'paid_status'=>$status_pay,'payed_date'=>$Date_pay,'payed_time'=>$times_pay,'reschedule_status'=>'1','date_journey'=>$date_journey);
            $table="pass_detail_form";
            $data_files=array('token_no'=>$token_id);

            $status=$this->admins->update_table($table,$data,$data_files);
            if($status){
                $data1=array('transaction_id'=>$transaction_pay_id,'paid_status'=>$status_pay,'payed_date'=>$Date_pay,'payed_time'=>$times_pay);
                $data1['token_no']=$token_id;
                
                $tables="pass_payment_application";
                 $results12=$this->admins->insert_common($tables,$data1);
                     if($results12){
                        $det = array('response_status'=>"1",'msg'=>"Success");
                        $this->response($det, 200);
                     }else{
                         $det = array('response_status'=>"3",'msg'=>"Failed");
                        $this->response($det, 200); 
                    }
                 
            }else{
                $det = array('response_status'=>"3",'msg'=>"Failed");
                $this->response($det, 200); 
            }
         }else{
             $det = array('response_status'=>"0",'msg'=>"Some Field Left Black");
            $this->response($det, 200); 
         }       
    }
/**
 * [uservehicledetail_post description]
 * @return [type] [description]
 */
    public function uservehicledetail_post(){        
        if((!empty($_FILES['picture3']['name'])) && (!empty($_FILES['picture4']['name'])) && (!empty($_FILES['picture5']['name']))) {
             $pic = date('H:i:s').$_FILES['picture3']['name'];
             $pic2 = date('H:i:s').$_FILES['picture4']['name'];
             $pic3 = date('H:i:s').$_FILES['picture5']['name'];
            
              $x=move_uploaded_file($_FILES["picture3"]["tmp_name"],"upload/vehicle/rc_book/".$pic);
              $x1=move_uploaded_file($_FILES["picture4"]["tmp_name"],"upload/vehicle/insurance/".$pic2);
              $x2=move_uploaded_file($_FILES["picture5"]["tmp_name"],"upload/vehicle/driver_scan/".$pic3);
              
               if(($x==1) && ($x1==1) && ($x2==1)){
                // `vehicle_no`, `driver_name`, `driver_licence`, `vehicle_mode`, `vehicle_rc_card_scan`, `vehicle_insurance_scan`, `driver_licence_scan`, `status`, `date`, `time`
                $vehicle_no=$this->post('vehicle_no');
                $driver_name=$this->post('driver_name');
                $driver_licence=$this->post('driver_licence');
                $vehicle_mode=$this->post('vehicle_mode');
                $vehicle_rc_card_scan=$pic;
                $vehicle_insurance_scan=$pic2;
                $driver_licence_scan=$pic3;
                $token_no=trim($this->post('application_no'));
                $date=date('Y-m-d');
                $time=date('H:i:s');
                $table="vehicle_detail_info";
                $data=array('vehicle_no'=>trim($vehicle_no),'driver_name'=>trim($driver_name),'driver_licence'=>trim($driver_licence),'vehicle_mode'=>trim($vehicle_mode),'vehicle_rc_card_scan'=>trim($vehicle_rc_card_scan),'vehicle_insurance_scan'=>trim($vehicle_insurance_scan),'driver_licence_scan'=>trim($driver_licence_scan),'token_no'=>trim($token_no),'date'=>$date,'time'=>$time);

                     $results12=$this->admins->insert_common($table,$data);
                     if($results12==1){
                          $data1=array('status'=>"3");
                        $tables="pass_detail_form";
                        $data_files=array('token_no'=>$token_no);
                        $status=$this->admins->update_table($tables,$data1,$data_files);
                            $det = array('response_status' => "1", 'msg' => "success" );
                         echo json_encode($det);
                         exit;
                       
                     }else{
                         $det = array('response_status' => "3", 'msg' => "Some Error");
                         echo json_encode($det);
                         exit;
                     }
               }else{
                    $det = array('response_status' => "4", 'msg' => "File Is not Attached");
                    echo json_encode($det);
                    exit;
               }
        }else{
            $det = array('response_status' => "0", 'msg' => "File Is not Attached");
            echo json_encode($det);
            exit;
        }
    }
/**
 * [user_applic_detail_status_post description] status of application
 * @return [type] [description]
 */
    public function user_applic_detail_status_post(){
        if($this->post('old_doj') &&  $this->post('old_doj')!="" && $this->post('application_no') &&   $this->post('application_no')!="" && $this->post('user_mob') &&  $this->post('user_mob')!=""){
            $tables="users";
            $mob=$this->post('user_mob');
            $data = array('mobile' => trim($mob));
            $results=$this->admins->check_common($tables,$data);
            if($results==0){
                $det = array('response_status'=>"2",'msg'=>"Not Registered");
                $this->response($det, 200); 
            }
            $date_journey=date('Y-m-d',strtotime(trim($this->post('old_doj'))));
            $token_no=trim($this->post('application_no'));
            $table="pass_detail_form";
            $query1 = $this->db->get_where($table, array('token_no'=>$token_no,'date_journey'=>$date_journey));
            if ($query1->num_rows() == 0) {
                $det = array('response_status'=>"3",'msg'=>"There is No Such Application id on that Date of Journey");
                $this->response($det, 200); 
            }else{
                foreach ($query1->result() as $check_details ) {
                    $dates_details_array= array('application_mobile'=> $check_details->application_mobile,'paid_status'=>$check_details->paid_status,'status'=> $check_details->status ,'pending_status'=>$check_details->pending_status,'remarked'=>$check_details->remarks);
                  
                }

                $det = array('response_status'=>"1",'msg'=>"Sucess-fully",'applicant_status'=>$dates_details_array);
                $this->response($det, 200); 
            }
        }else{
            $det = array('response_status'=>"0",'msg'=>"Some Field Left Black");
         }
       
    }
    public function update_user_pass_detail_post(){    

        if((!empty($_FILES['picture']['name'])) && (!empty($_FILES['picture1']['name'])) ){
             $pic =date('H:i:s').'1111'.$_FILES['picture']['name'];
             $pic2 = date('H:i:s').$_FILES['picture1']['name'];
              $x=move_uploaded_file($_FILES["picture"]["tmp_name"],"upload/pic/".$pic);
              $x1=move_uploaded_file($_FILES["picture1"]["tmp_name"],"upload/pic/".$pic2);
               if(($x==1) && ($x1==1)){
                
                $token_no=$this->post('applicant_no');                
                $applicant_id_source=$this->post('applicant_id_source');
                $applicant_id_no=$this->post('applicant_id_no');                
                $Photo=$pic;
                $Scan_id_photo=$pic2;
                $date=date('Y-m-d');
                $time=date('H:i:s');
                $table="pass_detail_form";
                $status=0;
                $data=array('pending_status'=>$status,'applicant_id_source'=>trim($applicant_id_source),'applicant_id_no'=>trim($applicant_id_no),'Photo'=>trim($Photo),'Scan_id_photo'=>trim($Scan_id_photo),'date'=>$date,'time'=>$time);

                $data1 = array('token_no' =>$token_no);
               
                     $results12=$this->admins->update_table($table,$data,$data1);
                     if($results12==1){                        
                            $det = array('response_status' => "1", 'msg' => "success" ,'token_no'=>"$token_no");
                         echo json_encode($det);
                         exit;
                        
                     }else{
                         $det = array('response_status' => "3", 'msg' => "Some Error");
                         echo json_encode($det);
                         exit;
                     }
               }else{
                    $det = array('response_status' => "4", 'msg' => "File Is not Attached");
                    echo json_encode($det);
                    exit;
               }
        }else{
            $det = array('response_status' => "0", 'msg' => "File Is not Attached");
            echo json_encode($det);
            exit;
        }
    }
    public function updates_user_vehicle_detail_post(){        
        if((!empty($_FILES['picture3']['name'])) && (!empty($_FILES['picture4']['name'])) && (!empty($_FILES['picture5']['name']))) {
             $pic = date('H:i:s').$_FILES['picture3']['name'];
             $pic2 = date('H:i:s').$_FILES['picture4']['name'];
             $pic3 = date('H:i:s').$_FILES['picture5']['name'];
            
              $x=move_uploaded_file($_FILES["picture3"]["tmp_name"],"upload/vehicle/rc_book/".$pic);
              $x1=move_uploaded_file($_FILES["picture4"]["tmp_name"],"upload/vehicle/insurance/".$pic2);
              $x2=move_uploaded_file($_FILES["picture5"]["tmp_name"],"upload/vehicle/driver_scan/".$pic3);
              
               if(($x==1) && ($x1==1) && ($x2==1)){
                // `vehicle_no`, `driver_name`, `driver_licence`, `vehicle_mode`, `vehicle_rc_card_scan`, `vehicle_insurance_scan`, `driver_licence_scan`, `status`, `date`, `time`
                $vehicle_no=$this->post('vehicle_no');
                $driver_name=$this->post('driver_name');
                $driver_licence=$this->post('driver_licence');
                $vehicle_mode=$this->post('vehicle_mode');
                $vehicle_rc_card_scan=$pic;
                $vehicle_insurance_scan=$pic2;
                $driver_licence_scan=$pic3;
                $token_no=trim($this->post('application_no'));
                $date=date('Y-m-d');
                $time=date('H:i:s');
                $tables="vehicle_detail_info";
                $data=array('vehicle_no'=>trim($vehicle_no),'driver_name'=>trim($driver_name),'driver_licence'=>trim($driver_licence),'vehicle_mode'=>trim($vehicle_mode),'vehicle_rc_card_scan'=>trim($vehicle_rc_card_scan),'vehicle_insurance_scan'=>trim($vehicle_insurance_scan),'driver_licence_scan'=>trim($driver_licence_scan),'date'=>$date,'time'=>$time);
                 
                 $data1 = array('token_no' =>$token_no);

                     $results12=$this->admins->update_table($tables,$data,$data1);
                     if($results12==1){
                        $table="pass_detail_form";
                         $status=0;
                        $data2=array('pending_status'=>$status,'date'=>$date,'time'=>$time);

                        $data12 = array('token_no' =>$token_no);
               
                         $results1=$this->admins->update_table($table,$data2,$data12);
                         if($results1==1){                        
                                $det = array('response_status' => "1", 'msg' => "success" ,'token_no'=>"$token_no");
                             echo json_encode($det);
                             exit;
                            
                         }else{
                             $det = array('response_status' => "3", 'msg' => "Some Error");
                             echo json_encode($det);
                             exit;
                         }
                     }else{
                         $det = array('response_status' => "5", 'msg' => "Some Error");
                         echo json_encode($det);
                         exit;
                     }
               }else{
                    $det = array('response_status' => "4", 'msg' => "File Is not Attached");
                    echo json_encode($det);
                    exit;
               }
        }else{
            $det = array('response_status' => "0", 'msg' => "File Is not Attached");
            echo json_encode($det);
            exit;
        }
    }
    public function view_pass_info_post(){
      if($this->post('user_mobile') &&  $this->post('user_mobile')!="" && $this->post('token_id') &&  $this->post('token_id')!="" && $this->post('date_journey') &&  $this->post('date_journey')!="" && $this->post('app_mobile') &&  $this->post('app_mobile')!=""){
              $tables="users";
            $mob=trim($this->post('user_mobile'));
            $data = array('mobile' => trim($mob));
            $results=$this->admins->check_common($tables,$data);
            if($results==0){
                $det = array('response_status'=>"2",'msg'=>"Not Registered");
                $this->response($det, 200); 
            }

            $token_id=trim($this->post('token_id'));
            $application_mobile=$this->post('app_mobile');
              $date_journey=date('Y-m-d',strtotime(trim($this->post('date_journey'))));
            $data12=array('token_no'=>$token_id,'status'=>"1",'application_mobile'=>$application_mobile,'date_journey'=>$date_journey);
              $table="pass_detail_form";
             $results1=$this->admins->check_common($table,$data12);
          
            if($results1=="0"){
                $det = array('response_status'=>"3",'msg'=>"No Appliction Found");
                $this->response($det, 200); 
            }else{
               // (`slno_pass`, `token_no`, `mobile_registered`, `applicant_name`, `applicant_address`, `place_visting`, `application_mobile`, `applicant_id_source`, `applicant_id_no`, `dob`, `purpose_visting`, `date_journey`, `Photo`, `Scan_id_photo`, `paid_status`, `status`, `date`, `time`, `transaction_id`, `payed_date`, `payed_time`)
                $query1_detail = $this->db->get_where($table, $data12);
                foreach ($query1_detail->result() as $query1 ) {
                   $infos = array('token_no'=>$query1->token_no , 'applicant_name'=>$query1->applicant_name ,'applicant_address'=>$query1->applicant_address,'place_visting'=>$query1->place_visting,'application_mobile'=>$query1->application_mobile,'applicant_id_source'=>$query1->applicant_id_source,'applicant_id_no'=>$query1->applicant_id_no,'dob'=>$query1->dob,'purpose_visting'=>$query1->purpose_visting,'Photo'=>base_url('upload/pic') . '/' .$query1->Photo,'Scan_id_photo'=>base_url('upload/pic') . '/' .$query1->Scan_id_photo,'paid_status'=>$query1->paid_status,'status'=>$query1->status,'date_journey'=>$query1->date_journey);
                  
                }
               $data1=array('token_no'=>$token_id);
              $table1="vehicle_detail_info";
               $query1_detail1 = $this->db->get_where($table1, $data1);
               foreach ($query1_detail1->result() as $query11 ) {
                    $infos_id = array('token_no'=>$query11->token_no , 'vehicle_novehicle_no'=>$query11->vehicle_no ,'driver_name'=>$query11->driver_name,'driver_licence'=>$query11->driver_licence,'vehicle_mode'=>$query11->vehicle_mode,'vehicle_rc_card_scan'=>base_url('upload/vehicle/rc_book') . '/' .$query11->vehicle_rc_card_scan,'vehicle_insurance_scan'=>base_url('upload/vehicle/insurance') . '/' .$query11->vehicle_insurance_scan,'driver_licence_scan'=>base_url('upload/vehicle/driver_scan') . '/' .$query11->driver_licence_scan);
               }
               $date=date('Y-m-d');
                $data_p=array('token_no'=>$token_id,'status'=>"0",'applicant_mobile'=>$application_mobile,'date_j'=>$date_journey);
                $table_p="master_pass_no_details";
                $query1_detail = $this->db->get_where($table_p, $data_p);
                foreach($query1_detail->result() as $query1_detailS){
                 $Pass= $query1_detailS->pass_no;
                }

               $det = array('response_status'=>"1",'msg'=>"sucess",'PASS_NOS'=>$Pass,'application_info'=>$infos,'vehicle' =>$infos_id ,'today'=>$date);
                $this->response($det, 200); 
            }
            
        }else{
             $det = array('response_status'=>"0",'msg'=>"Some Field Left Black");
            $this->response($det, 200); 
        }
      # code...
    }
}