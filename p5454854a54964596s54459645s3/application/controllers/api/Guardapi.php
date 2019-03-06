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
class Guardapi extends REST_Controller {

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
    }
    public function gets_guard_post(){
        if($this->post('guard_mobile')!="" && $this->post('guard_mobile')) {
            $mobile=trim($this->post('guard_mobile'));
            $data = array('guard_mobile' =>$mobile );
            $table="master_guard_user";     
                      
            $query1 = $this->db->get_where($table,$data);
            $result=$query1->num_rows();
            if($result==0){
                  $det = array('response_status'=>"2",'msg'=>"Invalid Details");
                  $this->response($det, 200);
            }else{
                $data1= $query1->result(); 
                foreach ($data1 as $key) {
                    // print_r($key);
                    $user= $key->guard_name;
                   $gate_no=$key->gate_id;
                }
                    
                $this->db->select('*');
                $this->db->from('master_places');
                $this->db->join('master_gate_name', 'master_gate_name.place_id = master_places.place_id');
                $this->db->where(array('master_gate_name.slno_gate_id' => $gate_no));
 
                $query = $this->db->get();
                $data12= $query->result();
                 if($result==0){
                     $det = array('response_status'=>"3",'msg'=>"Invalid Details");
                     $this->response($det, 200);
                 }else{
                     foreach ($data12 as $key1) {
                        $place_name=$key1->place_name;
                        $gate_password=$key1->gate_password;
                        $gate_name=$key1->gate_name;
                    }
                }
             $data_send = array('user_name' => $user,'place_name'=>$place_name,'gate_password'=>$gate_password,'gate_name'=>$gate_name  );

                
                // print_r($data12); 
            }
            $det = array('response_status'=>"1",'msg'=>"Sucessfull",'user_info'=>$data_send);
            $this->response($det, 200);

        }else{
             $det = array('response_status'=>"0",'msg'=>"Some Field Left Black");
            $this->response($det, 200);
        }

    }public function guard_user_pass_info_post(){
        // print_r($this->post());
        // exit;
        if($this->post('guard_mobile') &&  $this->post('guard_mobile')!="" && $this->post('pass_id') &&  $this->post('pass_id')!=""){
              $tables="users";
            // $mob=trim($this->post('user_mobile'));
            $mobile=trim($this->post('guard_mobile'));
            $data = array('guard_mobile' =>$mobile );
            $tables="master_guard_user";     
                      
            $query1 = $this->db->get_where($tables,$data);
            $result=$query1->num_rows();
            if($result==0){
                  $det = array('response_status'=>"2",'msg'=>"Invalid Details");
                  $this->response($det, 200);
            }

            
            $token_id=trim($this->post('pass_id'));

            $data1=array('token_no'=>$token_id,'status'=>"1");
              $table="pass_detail_form";
             $results1=$this->admins->check_common($table,$data1);
          
            if($results1=="0"){
                $det = array('response_status'=>"3",'msg'=>"No Appliction Found");
                $this->response($det, 200); 
            }else{
               // (`slno_pass`, `token_no`, `mobile_registered`, `applicant_name`, `applicant_address`, `place_visting`, `application_mobile`, `applicant_id_source`, `applicant_id_no`, `dob`, `purpose_visting`, `date_journey`, `Photo`, `Scan_id_photo`, `paid_status`, `status`, `date`, `time`, `transaction_id`, `payed_date`, `payed_time`)
                $query1_detail = $this->db->get_where($table, $data1);
                foreach ($query1_detail->result() as $query1 ) {
                   $infos = array('token_no'=>$query1->token_no , 'applicant_name'=>$query1->applicant_name ,'applicant_address'=>$query1->applicant_address,'place_visting'=>$query1->place_visting,'application_mobile'=>$query1->application_mobile,'applicant_id_source'=>$query1->applicant_id_source,'applicant_id_no'=>$query1->applicant_id_no,'dob'=>$query1->dob,'purpose_visting'=>$query1->purpose_visting,'Photo'=>base_url('upload/pic') . '/' .$query1->Photo,'Scan_id_photo'=>base_url('upload/pic') . '/' .$query1->Scan_id_photo,'paid_status'=>$query1->paid_status,'status'=>$query1->status,'date_journey'=>$query1->date_journey);
                  
                }
               // INSERT INTO `il_vehicle_detail_info`(`slno`, `token_no`, `vehicle_no`, `driver_name`, `driver_licence`, `vehicle_mode`, `vehicle_rc_card_scan`, `vehicle_insurance_scan`, `driver_licence_scan`, `status`, `date`, `time`
              $table1="vehicle_detail_info";
               $query1_detail1 = $this->db->get_where($table1, $data1);
               foreach ($query1_detail1->result() as $query11 ) {
                    $infos_id = array('token_no'=>$query11->token_no , 'vehicle_novehicle_no'=>$query11->vehicle_no ,'driver_name'=>$query11->driver_name,'driver_licence'=>$query11->driver_licence,'vehicle_mode'=>$query11->vehicle_mode,'vehicle_rc_card_scan'=>base_url('upload/vehicle/rc_book') . '/' .$query11->vehicle_rc_card_scan,'vehicle_insurance_scan'=>base_url('upload/vehicle/insurance') . '/' .$query11->vehicle_insurance_scan,'driver_licence_scan'=>base_url('upload/vehicle/driver_scan') . '/' .$query11->driver_licence_scan);
               }
               $date=date('Y-m-d');
               $det = array('response_status'=>"1",'msg'=>"sucess",'application_info'=>$infos,'vehicle' =>$infos_id ,'today'=>$date);
                $this->response($det, 200); 
            }
            
        }else{
             $det = array('response_status'=>"0",'msg'=>"Some Field Left Black");
            $this->response($det, 200); 
        }
    }
    public function guards_verification_pass_detail_post(){
      if($this->post('guard_mobile') &&  $this->post('guard_mobile')!="" && $this->post('pass_id') &&  $this->post('pass_id')!="" && $this->post('verification_status') && $this->post('verification_status')!=""){
              $tables="users";
            // $mob=trim($this->post('user_mobile'));
            $mobile=trim($this->post('guard_mobile'));
            $data = array('guard_mobile' =>$mobile );
            $tables="master_guard_user";     
                      
            $query1 = $this->db->get_where($tables,$data);
            $result=$query1->num_rows();
            if($result==0){
                  $det = array('response_status'=>"2",'msg'=>"Invalid Details");
                  $this->response($det, 200);
            }

            
            $token_id=trim($this->post('pass_id'));
            $data1=array('token_no'=>$token_id,'status'=>"1");
              $table="pass_detail_form";
             $results1=$this->admins->check_common($table,$data1);
          
            if($results1=="0"){
                $det = array('response_status'=>"3",'msg'=>"No Appliction Found");
                $this->response($det, 200); 
            }
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $verification_status=$this->post('verification_status');
            if($verification_status=='1'){
              // $query_insert="INSERT INTO `il_master_guard_verification`(`slno`, `pass_no`, `token_no`, `guard_mobile`, `status_verication`, `date`, `time`) VALUES (NUl)"
              $data_insert = array('pass_no' =>'123456' , 'token_no'=>$token_id,'guard_mobile'=>$mobile,'status_verication'=>'1','date'=>$date,'time'=>$time);
              $table="master_guard_verification";
              $results12=$this->admins->insert_common($table,$data_insert);
              if($results12){
                $data1s=array('token_no'=>$token_id,'status'=>"1" ,'paid_status'=>"1",'pending_status'=>"0");
                $data_update=array('visited_status'=>"1",'date_visited'=>$date,'time_visited'=>$time);
                $table1="pass_detail_form";
                $status=$this->admins->update_table($table1,$data_update,$data1s);
                if($status){
                  $det = array('response_status'=>"1",'msg'=>"ivalid selection");
                  $this->response($det, 200); 
                }else{
                  $det = array('response_status'=>"5",'msg'=>"ivalid selection");
                  $this->response($det, 200); 
                }
              }
            }else{
              $det = array('response_status'=>"4",'msg'=>"ivalid selection");
              $this->response($det, 200); 
            }


      }else{
         $det = array('response_status'=>"0",'msg'=>"Some Field Left Black");
         $this->response($det, 200); 
      }
    }
    
}