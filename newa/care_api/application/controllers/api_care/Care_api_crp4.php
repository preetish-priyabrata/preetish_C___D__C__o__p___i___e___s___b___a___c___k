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
        
        if($this->post('employee_id') && $this->post('employee_id')!="" && $this->post('userid') && $this->post('userid')!=""){
         
            // ,'password'=>$this->post('password')
            $data=array('employee_id'=>trim($this->post('employee_id')),'status'=>'1','assign_status'=>'1','sl_no'=>trim($this->post('userid')));
            $query=$this->db->get_where('system_user',$data);
            if($query->num_rows()==0){
                $det= array('response_status'=>"2",'msg'=>"Invalid User");
                $this->response($det, 200);
            }      
            // Thematic Intervention
            $Thematic_Intervention=array('1'=>'HKG','2'=>'Crop Diversification','3'=>'LST','4'=>'Post Harvest Management','5'=>'poultry','6'=>'Goatery','7'=>'Diary','8'=>'collective strenghtening','9'=>'bcc');

            // Topics Covered
            $Topics_Covered=array();
            $data_training=array('care_training_status'=>'1');
            $query_data_training=$this->db->get_where('training_theme_info',$data_training);
            foreach ($query_data_training->result() as $key_data_training){
                $Topics_Covered[] = array('care_training_name'=>$key_data_training->care_training_name,'care_training_thematic'=>$key_data_training->care_training_thematic);

            }

            // Training Facilitator
            $Training_Facilitator = array('CRP','MT','CBO','MEO');

            // Type of group
            $Type_of_group=array();
            $data_training_Type_of_group=array('care_group_status'=>'1');
            $query_data_training_Type_of_group=$this->db->get_where('care_master_group_info',$data_training_Type_of_group);
            foreach ($query_data_training_Type_of_group->result() as $key_data_training_Type_of_group){
                $Type_of_group[] = array('care_group_name'=>$key_data_training_Type_of_group->care_group_name);

            }

            // Type of Training
            $Type_of_Training=array();
            $data_training_Type_of_Training=array('care_trng_status'=>'1');
            $query_data_training_Type_of_Training=$this->db->get_where('care_master_training_info',$data_training_Type_of_Training);
            foreach ($query_data_training_Type_of_Training->result() as $key_data_training_Type_of_Training){
                $Type_of_Training[] = array('care_trng_name'=>$key_data_training_Type_of_Training->care_trng_name);

            }
                     
            // type of pulses

            $Type_of_pulses=array();           
            $query_data_pulses=$this->db->get('pulse');
            foreach ($query_data_pulses->result() as $key_data_pulses){
                $Type_of_pulses[] = array('item_crop'=>$key_data_pulses->item_crop);

            }

            //training thematic information
            $thematic_information= array('Thematic_Intervention' =>$Thematic_Intervention ,'Topics_Covered'=>$Topics_Covered,'message_thematic'=>'inside topic_covered will be depend on Thematic_Intervention ');

            $training_module = array('thematic_information' =>$thematic_information , 'Type_of_group'=>$Type_of_group,'Training_Facilitator'=>$Training_Facilitator,'Type_of_Training'=>$Type_of_Training,'message_training_module'=>'this part of information wull be use on training data');

            // care_master_assigned_user_info
            // `care_assU_employee_id`, `care_assU_district_id`, `care_assU_block_id`, `care_assU_gp_id`, `care_assU_village_id``status`
            $care_assU_employee_id=trim($this->post('employee_id'));
            $village_list=array();
            $data_village_list=array('care_assU_employee_id'=>$care_assU_employee_id ,'status'=>'1');
            $query_village_list=$this->db->get_where('assigned_user_info',$data_village_list);
            foreach ($query_village_list->result() as $key_village_list){
                $village_list[] = array('care_assU_employee_id'=>$key_village_list->care_assU_employee_id,'care_assU_district_id'=>$key_village_list->care_assU_district_id,'care_assU_block_id'=>$key_village_list->care_assU_block_id,'care_assU_gp_id'=>$key_village_list->care_assU_gp_id,'care_assU_village_id'=>$key_village_list->care_assU_village_id);

            }

             $det = array('response_status'=>"1",'msg'=>"sucessfully information for crp user background",'location_information'=>$village_list,'Type_of_pulses'=>$Type_of_pulses,'training_module'=>$training_module);
                $this->response($det, 200);
               
        }else{
            $det= array('response_status'=>"0",'msg'=>"incomplete Imformation");
            $this->response($det, 200);
        }

    }
    function user_hhi_info_post(){
        //print_r($this->post());
        if($this->post('employee_id') && $this->post('employee_id')!="" && $this->post('userid') && $this->post('userid')!="" && $this->post('village_list') && $this->post('village_list')!=""){
                // check login information
           $data=array('employee_id'=>trim($this->post('employee_id')),'status'=>'1','assign_status'=>'1','sl_no'=>trim($this->post('userid')));
            $query=$this->db->get_where('system_user',$data);
            if($query->num_rows()==0){
                $det= array('response_status'=>"2",'msg'=>"Invalid User");
                $this->response($det, 200);
            }   

            $village_list=$this->post('village_list');
            $hhi_list=array();
            $shg_list=array();
            // $location_module = array();
            // for ($i=0; $i <count($village_list) ; $i++) { 
                // $single_village=$village_list[$i]['village_id'];
               $single_village=$village_list;
               $location_module[] = array('village_name' =>$single_village);
                 // $single_village=$village_list[$i]->care_assU_village_id;
                $data_hhi_list=array('care_village_name'=>$single_village ,'status'=>'1');
                $query_hhi_list=$this->db->get_where('care_master_hhi_infomation',$data_hhi_list);
                foreach ($query_hhi_list->result() as $key_hhi_list){
                    $hhi_list[] = array('care_hhi_slno'=>$key_hhi_list->care_hhi_slno,'care_women_farmer'=>$key_hhi_list->care_women_farmer,'care_spouse_name'=>$key_hhi_list->care_spouse_name,'care_hhi_id'=>$key_hhi_list->care_hhi_id,'care_district_name'=>$key_hhi_list->care_district_name,'care_block_name'=>$key_hhi_list->care_block_name,'care_gp_name'=>$key_hhi_list->care_gp_name,'care_village_name'=>$key_hhi_list->care_village_name);
                }

                $data_shg_list=array('care_shg_village'=>$single_village ,'care_shg_status'=>'1');
                $query_shg_list=$this->db->get_where('care_master_shg_list_info',$data_shg_list);
                foreach ($query_shg_list->result() as $key_shg_list){
                    $shg_list[] = array('care_shg_slno'=>$key_shg_list->care_shg_slno,'care_shg_name'=>$key_shg_list->care_shg_name,'care_shg_id'=>$key_shg_list->care_shg_id,'care_shg_village'=>$key_shg_list->care_shg_village,'care_shg_gp'=>$key_shg_list->care_shg_gp,'care_shg_block'=>$key_shg_list->care_shg_block,'care_shg_district'=>$key_shg_list->care_shg_district);
                }
               
            // }
            $det = array('response_status'=>"1",'msg'=>"sucessfully information of shg and hhi ",'shg_information_list'=>$shg_list,'hhi_information_list'=>$hhi_list,'location_module'=>$location_module,'Compelete_status'=>'1');        
            $this->response($det, 200);
              
        }else{
            $det= array('response_status'=>"0",'msg'=>"incomplete Imformation");
            $this->response($det, 200);
        }

    }


}

