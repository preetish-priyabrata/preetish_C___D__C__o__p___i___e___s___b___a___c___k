<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         Care Api
 * @subpackage      Rest user
 * @category        Care_api_crp
 * @author          preetish
 * @license         innovadorslab pvt ltd
 * @link            http://wwww.innovadorslab.com
 */
class Care_api_crp extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        // $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        // $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->library('upload');
        $this->load->database();
        $this->load->helper(array('form', 'url'));
    }
/**
 * @return  if true will send status 1 with user information
 * @return if false will not send user information 
 * @date_create(7-jan-2018)
 * @author [preetish] <[ppriyabrata8888@gmail.com]>
 */
    function user_login_post(){
        
        if($this->post('email') && $this->post('email')!="" && $this->post('password') && $this->post('password')!=""){
            $oldpassword_hash = md5($this->post('password'));
            // ,'password'=>$this->post('password')
            $data=array('employee_id'=>trim($this->post('email')),'status'=>'1');
            $query=$this->db->get_where('system_user',$data);
            if($query->num_rows()==0){
                $det= array('response_status'=>"2",'msg'=>"Invalid User");
                $this->response($det, 200);
            }else{
                foreach ($query->result() as $key_info){
                    $pass=$key_info->password_hash;
                    if($oldpassword_hash==$pass){
                         $assign_status=$key_info->assign_status;
                        if($assign_status=='1'){
                            $employee_id=$key_info->employee_id;
                            $user_name=$key_info->user_name;
                            $sl_no=$key_info->sl_no;
                            $user_information= array('employee_id'=>$employee_id,'user_name'=>$user_name,'userid'=>$sl_no,'message_info'=>'Here user name and employee_id stored');
                            $det = array('response_status'=>"1",'msg'=>"sucessfully login",'user_information'=>$user_information);
                        }else{
                          $det = array('response_status'=>"3",'msg'=>"Not Assigned User To use Location");  
                        }
                    }else{
                         $det = array('response_status'=>"2",'msg'=>"Invalid User");
                    }                  
                }               
                $this->response($det, 200);
            }   
        }else{
            $det= array('response_status'=>"0",'msg'=>"incomplete Imformation");
            $this->response($det, 200);
        }

    }
    function user_assigned_info_post(){
        
        if($this->post('email') && $this->post('email')!="" && $this->post('userid') && $this->post('userid')!=""){
         
            // ,'password'=>$this->post('password')
            $data=array('employee_id'=>trim($this->post('email')),'status'=>'1','assign_status'=>'1','sl_no'=>trim($this->post('userid')));
            $query=$this->db->get_where('system_user',$data);
            if($query->num_rows()==0){
                $det= array('response_status'=>"2",'msg'=>"Invalid User");
                $this->response($det, 200);
            }else{
                foreach ($query->result() as $key_info){
                    $pass=$key_info->password_hash;
                    if($oldpassword_hash==$pass){
                         $assign_status=$key_info->assign_status;
                        if($assign_status=='1'){
                            $user=$key_info->employee_id;
                            $user_name=$key_info->user_name;
                            $user_information= array('user'=>$user,'user_name'=>$user_name,'message_info'=>'Here user name and user id stored');
                            $det = array('response_status'=>"1",'msg'=>"sucessfully login",'user_information'=>$user_information);
                        }else{
                          $det = array('response_status'=>"3",'msg'=>"Not Assigned User To use Location");  
                        }
                    }else{
                         $det = array('response_status'=>"2",'msg'=>"Invalid User");
                    }                  
                }               
                $this->response($det, 200);
            }   
        }else{
            $det= array('response_status'=>"0",'msg'=>"incomplete Imformation");
            $this->response($det, 200);
        }

    }


}

