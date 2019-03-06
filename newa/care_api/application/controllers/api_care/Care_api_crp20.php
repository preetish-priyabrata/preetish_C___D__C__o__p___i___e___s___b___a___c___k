<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
date_default_timezone_set("Asia/Kolkata");
/**
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

            // care_master_committee_info
             $Type_of_shg_committee=array();  
             $data_shg_committee=array('care_comm_status'=>'1');         
            $query_shg_committee=$this->db->get_where('committee_info',$data_shg_committee);
            foreach ($query_shg_committee->result() as $key_shg_committee){
                $Type_of_shg_committee[] = array('care_comm_name'=>$key_shg_committee->care_comm_name);

            }
            $shg_module = array('Type_of_shg_committee' => $Type_of_shg_committee,'message_shg'=>"here is information of shg community list" );
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

             $det = array('response_status'=>"1",'msg'=>"sucessfully information for crp user background",'location_information'=>$village_list,'Type_of_pulses'=>$Type_of_pulses,'training_module'=>$training_module,'shg_module'=>$shg_module);
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

    function user_hhi_crop_info_post(){   
  
        if($this->post('employee_id') && $this->post('employee_id')!=""
         && $this->post('userid') && $this->post('userid')!=""
         && $this->post('cultivated_area') && $this->post('cultivated_area')!="" 
         && $this->post('type_form_input') && $this->post('type_form_input')!="" 
         && $this->post('type_crop_pulse') && $this->post('type_crop_pulse')!="" 
         && $this->post('new_farmers') && $this->post('new_farmers')!="" 
         && $this->post('demo_farmers') && $this->post('demo_farmers')!="" 
         && $this->post('continued_farmer') && $this->post('continued_farmer')!=""
         && $this->post('input_received_training') && $this->post('input_received_training')!="" 
         && $this->post('input_received_seed') && $this->post('input_received_seed')!="" 
         && $this->post('input_received_fertiliser') && $this->post('input_received_fertiliser')!="" 
         && $this->post('input_received_pesticides') && $this->post('input_received_pesticides')!="" 
         && $this->post('input_received_extension') && $this->post('input_received_extension')!="" 
         && $this->post('others_input') && $this->post('others_input')!="" 
         // && $this->post('Seed_qnty') && $this->post('Seed_qnty')!=""
         // && $this->post('fertiliser_qnty') && $this->post('fertiliser_qnty')!="" 
         // && $this->post('Pesticides_qnty') && $this->post('Pesticides_qnty')!="" 
         // && $this->post('others_qnty') && $this->post('others_qnty')!="" 
         // && $this->post('Consumption_production') && $this->post('Consumption_production')!="" 
         // && $this->post('Sale_production') && $this->post('Sale_production')!="" 
         // && $this->post('Total_production') && $this->post('Total_production')!=""
         //  && $this->post('Average_price') && $this->post('Average_price')!=""
          && $this->post('district_name') && $this->post('district_name')!="" && $this->post('block_name') && $this->post('block_name')!=""  && $this->post('GP_name') && $this->post('GP_name')!="" && $this->post('Village_name') && $this->post('Village_name')!=""
           && $this->post('enter_lat') && $this->post('enter_lat')!="" && $this->post('enter_long') && $this->post('enter_long')!="" && $this->post('month_no') && $this->post('month_no')!=""  && $this->post('present_year') && $this->post('present_year')!="" && $this->post('care_hhi_slno') && $this->post('care_hhi_slno')!="" && $this->post('Spouse') && $this->post('Spouse')!="" && $this->post('care_hhi') && $this->post('care_hhi')!="" && $this->post('women_name') && $this->post('women_name')!="" && $this->post('your_id_delete_crop') && $this->post('your_id_delete_crop')!=""){
            // && $this->post('specify_Input') && $this->post('specify_Input')!="" 
                // check login information
           $data=array('employee_id'=>trim($this->post('employee_id')),'status'=>'1','assign_status'=>'1','sl_no'=>trim($this->post('userid')));
            $query=$this->db->get_where('system_user',$data);
            if($query->num_rows()==0){
                $det= array('response_status'=>"2",'msg'=>"Invalid User");
                $this->response($det, 200);
            } 

            $date=date('Y-m-d');
            $time=date('H:i:s');  
            // insert table
            $table_crop="crop_diversification_crp";
            $type_form_input=trim($this->post('type_form_input'));
            if($type_form_input==1){
            	$data_crop = array('care_hhid'=>trim($this->post('care_hhi')), 'care_women_farmer'=>trim($this->post('women_name')), 'care_spouse_name'=>trim($this->post('Spouse')), 'care_pulses_type'=>trim($this->post('type_crop_pulse')), 'care_area_cultivated'=>trim($this->post('cultivated_area')), 'care_continued_farmer'=>trim($this->post('continued_farmer')), 'care_demo_plot_farmer'=>trim($this->post('demo_farmers')), 'care_new_farmer'=>trim($this->post('new_farmers')), 'care_IR_training'=>trim($this->post('input_received_training')), 'care_IR_seed'=>trim($this->post('input_received_seed')), 'care_IR_fertiliser'=>trim($this->post('input_received_fertiliser')), 'care_IR_pesticides'=>trim($this->post('input_received_pesticides')), 'care_IR_extension_support'=>trim($this->post('input_received_extension')), 'care_IR_other'=>trim($this->post('others_input')), 'care_CRP_other_detail'=>trim($this->post('specify_Input')), 'care_QR_seed'=>trim($this->post('Seed_qnty')), 'care_QR_fertiliser'=>trim($this->post('Fertiliser_qnty')), 'care_QR_pesticides'=>trim($this->post('Pesticides_qnty')), 'care_QR_other'=>trim($this->post('others_qnty')), 'care_P_consumption'=>trim($this->post('Consumption_production')), 'care_P_sale'=>trim($this->post('Sale_production')), 'care_P_total_production'=>trim($this->post('Total_production')), 'care_avg_price'=>trim($this->post('Average_price')), 'care_form_type'=>'1', 'care_type_farm'=>'1', 'care_CRP_lat_id'=>trim($this->post('enter_lat')), 'care_CRP_long_id'=>trim($this->post('enter_long')), 'care_CRP_employee_id'=>trim($this->post('employee_id')), 'care_CRP_vlg_name'=>trim($this->post('Village_name')), 'care_CRP_gp_name'=>trim($this->post('GP_name')), 'care_CRP_block_name_'=>trim($this->post('block_name')), 'care_CRP_district_name'=>trim($this->post('district_name')), 'care_CRP_month'=>str_pad(trim($this->post('month_no')), 2, "0", STR_PAD_LEFT), 'care_CRP_year'=>trim($this->post('present_year')), 'care_CRP_status'=>1, 'care_CRP_date'=>$date, 'care_CRP_time'=>$time);
            }else if($type_form_input==2){
            	$data_crop = array('care_hhid'=>trim($this->post('care_hhi')), 'care_women_farmer'=>trim($this->post('women_name')), 'care_spouse_name'=>trim($this->post('Spouse')), 'care_pulses_type'=>trim($this->post('type_crop_pulse')), 'care_area_cultivated'=>trim($this->post('cultivated_area')), 'care_continued_farmer'=>trim($this->post('continued_farmer')), 'care_demo_plot_farmer'=>trim($this->post('demo_farmers')), 'care_new_farmer'=>trim($this->post('new_farmers')), 'care_IR_training'=>trim($this->post('input_received_training')), 'care_IR_seed'=>trim($this->post('input_received_seed')), 'care_IR_fertiliser'=>trim($this->post('input_received_fertiliser')), 'care_IR_pesticides'=>trim($this->post('input_received_pesticides')), 'care_IR_extension_support'=>trim($this->post('input_received_extension')), 'care_IR_other'=>trim($this->post('others_input')), 'care_CRP_other_detail'=>trim($this->post('specify_Input')), 'care_QR_seed'=>trim($this->post('Seed_qnty')), 'care_QR_fertiliser'=>trim($this->post('Fertiliser_qnty')), 'care_QR_pesticides'=>trim($this->post('Pesticides_qnty')), 'care_QR_other'=>trim($this->post('others_qnty')), 'care_P_consumption'=>trim($this->post('Consumption_production')), 'care_P_sale'=>trim($this->post('Sale_production')), 'care_P_total_production'=>trim($this->post('Total_production')), 'care_avg_price'=>trim($this->post('Average_price')), 'care_form_type'=>'2', 'care_type_farm'=>'4', 'care_CRP_lat_id'=>trim($this->post('enter_lat')), 'care_CRP_long_id'=>trim($this->post('enter_long')), 'care_CRP_employee_id'=>trim($this->post('employee_id')), 'care_CRP_vlg_name'=>trim($this->post('Village_name')), 'care_CRP_gp_name'=>trim($this->post('GP_name')), 'care_CRP_block_name_'=>trim($this->post('block_name')), 'care_CRP_district_name'=>trim($this->post('district_name')), 'care_CRP_month'=>str_pad(trim($this->post('month_no')), 2, "0", STR_PAD_LEFT), 'care_CRP_year'=>trim($this->post('present_year')), 'care_CRP_status'=>1, 'care_CRP_date'=>$date, 'care_CRP_time'=>$time);
            }else{
            	$det= array('response_status'=>"3",'msg'=>"Invalid farm type ");
            	$this->response($det, 200);
            }
            $query=$this->db->insert($table_crop,$data_crop);
            $last_id=$this->db->insert_id();
            $care_hhi=trim($this->post('care_hhi'));
            $employee_id=trim($this->post('employee_id'));
            $month_no=str_pad(trim($this->post('month_no')), 2, "0", STR_PAD_LEFT);
            $present_year=trim($this->post('present_year'));
            $Village_name=$this->post('Village_name');
            $GP_name=$this->post('GP_name');
            $block_name=$this->post('block_name');
            $district_name=$this->post('district_name');

            $table_crop_month="care_master_hhi_month_year";
            $data_month=array('care_hhi_id_info'=>trim($this->post('care_hhi')),'care_crp_id'=>trim($this->post('employee_id')),'care_month'=>$month_no,'care_year'=>trim($this->post('present_year')));
            $query_data_month=$this->db->get_where('hhi_month_year',$data_month);
            switch ($type_form_input) {
                case '1':
                   if($query_data_month->num_rows()==0){
                        $form1=array($last_id);
                        $user_form=serialize($form1);
                        $form1_date=array($date);
                        $user_form1_data=serialize($form1_date);
                        $i=0;
                        $form=array($i);
                        $user_from=serialize($form);
                        $data_crop_month = array('care_hhi_id_info'=>$care_hhi,'care_crp_id'=>$employee_id,'care_month'=>$month_no,'care_year'=>$present_year,'care_form7'=>$user_form,'care_form7_date'=>$user_form1_data,'care_mt_status_form7'=>$user_from,'care_mt_date_form7'=>$user_from,'care_CBO_status_form7'=>$user_from,'care_CBO_date_form7'=>$user_from,'care_MEO_status_form7'=>$user_from,'care_MEO_date_form7'=>$user_from,'care_village_name'=>$Village_name,'care_block_name'=>$block_name,'care_gp_name'=>$GP_name,'care_district_name'=>$district_name);

                         $query_month=$this->db->insert($table_crop_month,$data_crop_month);

                    }else{
                        foreach ($query_data_month->result() as $key_data_month){
                            $slno_md=$key_data_month->care_hhi_sl_no;
                            $get_userilaze_form1=unserialize($key_data_month->care_form7);
                            $care_form1_date=unserialize($key_data_month->care_form7_date);
                            $care_mt_status_form1=unserialize($key_data_month->care_mt_status_form7);
                            $care_mt_date_form1=unserialize($key_data_month->care_mt_date_form7);
                            $care_CBO_status_form1=unserialize($key_data_month->care_CBO_status_form7);
                            $care_MEO_status_form1=unserialize($key_data_month->care_MEO_status_form7);
                            $care_MEO_date_form1=unserialize($key_data_month->care_MEO_date_form7);
                            $care_CBO_date_form1=unserialize($key_data_month->care_CBO_date_form7);
                        }
                        if(!empty($get_userilaze_form1)){
                              $form1=array($last_id);

                                $form1_merge=array_merge($get_userilaze_form1,$form1);
                                $ser_form=serialize($form1_merge);
                                $form1_date=array($date);
                                $form1_merge_date=array_merge($care_form1_date,$form1_date);
                                $aer_form1_data=serialize($form1_merge_date);
                                $i=0;
                                $form=array($i);
                                $form1_merge_status1=array_merge($care_mt_status_form1,$form);
                                $ser_from1=serialize($form1_merge_status1);

                                $form1_merge_status2=array_merge($care_mt_date_form1,$form);
                                $ser_from2=serialize($form1_merge_status2);

                                $form1_merge_status3=array_merge($care_CBO_status_form1,$form);
                                $ser_from3=serialize($form1_merge_status3);

                                $form1_merge_status4=array_merge($care_MEO_status_form1,$form);
                                $ser_from4=serialize($form1_merge_status4);

                                $form1_merge_status5=array_merge($care_MEO_date_form1,$form);
                                $ser_from5=serialize($form1_merge_status5);

                                $form1_merge_status6=array_merge($care_CBO_date_form1,$form);
                                $ser_from6=serialize($form1_merge_status6);

                            }else{
                                $form1=array($last_id);
                                $ser_form=serialize($form1);
                                $form1_date=array($date);
                                $aer_form1_data=serialize($form1_date);
                                $i=0;
                                $form=array($i);
                                $ser_from6=$ser_from2=$ser_from3=$ser_from4=$ser_from5=$ser_from1=serialize($form);
                            }
                            $data_update_month = array('care_form7'=>$ser_form,'care_form7_date'=>$aer_form1_data,'care_mt_status_form7'=>$ser_from1,'care_mt_date_form7'=>$ser_from2,'care_CBO_status_form7'=>$ser_from3,'care_CBO_date_form7'=>$ser_from6,'care_MEO_status_form7'=>$ser_from4,'care_MEO_date_form7'=>$ser_from5);
                            $get_upadate_month=$this->db->update('hhi_month_year', $data_update_month, array('care_hhi_sl_no' => $slno_md));

                    }
                    break;
                case '2':
                    if($query_data_month->num_rows()==0){
                        $form1=array($last_id);
                        $user_form=serialize($form1);
                        $form1_date=array($date);
                        $user_form1_data=serialize($form1_date);
                        $i=0;
                        $form=array($i);
                        $user_from=serialize($form);
                        $data_crop_month = array('care_hhi_id_info'=>$care_hhi,'care_crp_id'=>$employee_id,'care_month'=>$month_no,'care_year'=>$present_year,'care_form8'=>$user_form,'care_form8_date'=>$user_form1_data,'care_mt_status_form8'=>$user_from,'care_mt_date_form8'=>$user_from,'care_CBO_status_form8'=>$user_from,'care_CBO_date_form8'=>$user_from,'care_MEO_status_form8'=>$user_from,'care_MEO_date_form8'=>$user_from,'care_village_name'=>$Village_name,'care_block_name'=>$block_name,'care_gp_name'=>$GP_name,'care_district_name'=>$district_name);
                        $query_month=$this->db->insert($table_crop_month,$data_crop_month);
                    }else{
                        foreach ($query_data_month->result() as $key_data_month){
                            $slno_md=$key_data_month->care_hhi_sl_no;
                            $get_userilaze_form1=unserialize($key_data_month->care_form8);
                            $care_form1_date=unserialize($key_data_month->care_form8_date);
                            $care_mt_status_form1=unserialize($key_data_month->care_mt_status_form8);
                            $care_mt_date_form1=unserialize($key_data_month->care_mt_date_form8);
                            $care_CBO_status_form1=unserialize($key_data_month->care_CBO_status_form8);
                            $care_MEO_status_form1=unserialize($key_data_month->care_MEO_status_form8);
                            $care_MEO_date_form1=unserialize($key_data_month->care_MEO_date_form8);
                            $care_CBO_date_form1=unserialize($key_data_month->care_CBO_date_form8);
                        }
                        if(!empty($get_userilaze_form1)){
                              $form1=array($last_id);

                                $form1_merge=array_merge($get_userilaze_form1,$form1);
                                $ser_form=serialize($form1_merge);
                                $form1_date=array($date);
                                $form1_merge_date=array_merge($care_form1_date,$form1_date);
                                $aer_form1_data=serialize($form1_merge_date);
                                $i=0;
                                $form=array($i);
                                $form1_merge_status1=array_merge($care_mt_status_form1,$form);
                                $ser_from1=serialize($form1_merge_status1);

                                $form1_merge_status2=array_merge($care_mt_date_form1,$form);
                                $ser_from2=serialize($form1_merge_status2);

                                $form1_merge_status3=array_merge($care_CBO_status_form1,$form);
                                $ser_from3=serialize($form1_merge_status3);

                                $form1_merge_status4=array_merge($care_MEO_status_form1,$form);
                                $ser_from4=serialize($form1_merge_status4);

                                $form1_merge_status5=array_merge($care_MEO_date_form1,$form);
                                $ser_from5=serialize($form1_merge_status5);

                                $form1_merge_status6=array_merge($care_CBO_date_form1,$form);
                                $ser_from6=serialize($form1_merge_status6);

                            }else{
                                $form1=array($last_id);
                                $ser_form=serialize($form1);
                                $form1_date=array($date);
                                $aer_form1_data=serialize($form1_date);
                                $i=0;
                                $form=array($i);
                                $ser_from6=$ser_from2=$ser_from3=$ser_from4=$ser_from5=$ser_from1=serialize($form);
                            }
                            $data_update_month = array('care_form8'=>$ser_form,'care_form8_date'=>$aer_form1_data,'care_mt_status_form8'=>$ser_from1,'care_mt_date_form8'=>$ser_from2,'care_CBO_status_form8'=>$ser_from3,'care_CBO_date_form8'=>$ser_from6,'care_MEO_status_form8'=>$ser_from4,'care_MEO_date_form8'=>$ser_from5);
                            $get_upadate_month=$this->db->update('hhi_month_year', $data_update_month, array('care_hhi_sl_no' => $slno_md));

                    }
                    break;
                default:
                    $det= array('response_status'=>"3",'msg'=>"Invalid farm type ");
                    $this->response($det, 200);
                    break;
            }
            $your_id_delete_crop=$this->post('your_id_delete_crop');
            $det = array('response_status'=>"1",'msg'=>"sucessfully information stored success ",'your_id_delete_crop'=>$your_id_delete_crop); 
             $this->response($det, 200);
        }else{
            $det= array('response_status'=>"0",'msg'=>"incomplete Imformation");
            $this->response($det, 200);
        }
    }
    function user_hhi_in_out_info_post(){      
     
        if($this->post('employee_id') && $this->post('employee_id')!="" && $this->post('userid') && $this->post('userid')!=""
             && $this->post('datepicker') && $this->post('datepicker')!=""  && $this->post('activity') && $this->post('activity')!=""  && $this->post('district_name') && $this->post('district_name')!="" && $this->post('block_name') && $this->post('block_name')!=""  && $this->post('GP_name') && $this->post('GP_name')!="" && $this->post('Village_name') && $this->post('Village_name')!="" && $this->post('enter_lat') && $this->post('enter_lat')!="" && $this->post('enter_long') && $this->post('enter_long')!="" && $this->post('month_no') && $this->post('month_no')!=""  && $this->post('present_year') && $this->post('present_year')!="" && $this->post('care_hhi_slno') && $this->post('care_hhi_slno')!="" && $this->post('Spouse') && $this->post('Spouse')!="" && $this->post('care_hhi') && $this->post('care_hhi')!="" && $this->post('women_name') && $this->post('women_name')!="" && $this->post('your_id_delete_in_out') && $this->post('your_id_delete_in_out')!=""){
            if($this->post('support') && $this->post('support')!="" 
             && $this->post('production') && $this->post('production')!="" 
             && $this->post('consumption') && $this->post('consumption')!="" 
             // && $this->post('sale') && $this->post('sale')!=""
             && $this->post('remarks') && $this->post('remarks')!="" ){
            // && $this->post('specify_Input') && $this->post('specify_Input')!="" 
                // check login information
           $data=array('employee_id'=>trim($this->post('employee_id')),'status'=>'1','assign_status'=>'1','sl_no'=>trim($this->post('userid')));
            $query=$this->db->get_where('system_user',$data);
            if($query->num_rows()==0){
                $det= array('response_status'=>"2",'msg'=>"Invalid User");
                $this->response($det, 200);
            } 

            $date=date('Y-m-d');
            $time=date('H:i:s');
            $date_event=date('Y-m-d',strtotime(trim($this->post('datepicker'))));
            $data_hhi_in_out = array(
                'care_TARINA_year'=>trim($this->post('present_year')), 
                'care_TARINA_month'=>str_pad(trim($this->post('month_no')), 2, "0", STR_PAD_LEFT), 
                'care_TARINA_district_name'=>trim($this->post('district_name')), 
                'care_TARINA_block_name'=>trim($this->post('block_name')),
                'care_TARINA_gp_name'=>trim($this->post('GP_name')), 
                'care_TARINA_vlg_name'=>trim($this->post('Village_name')), 
                'care_TARINA_hhi'=>trim($this->post('care_hhi')), 
                'care_TARINA_hhi_slno'=>trim($this->post('care_hhi_slno')), 
                'care_TARINA_w_farmer_name'=>trim($this->post('women_name')), 
                'care_TARINA_spouse_name'=>trim($this->post('Spouse')), 
                'care_TARINA_event_date'=>$date_event, 
                'care_TARINA_activity_name'=>trim($this->post('activity')), 
                'care_TARINA_support_provide'=>trim($this->post('support')), 
                'care_TARINA_production'=>trim($this->post('production')), 'care_TARINA_consumption'=>trim($this->post('consumption')), 'care_TARINA_sale'=>trim($this->post('sale')), 'care_TARINA_remarks'=>trim($this->post('remarks')), 'care_TARINA_participant_sign'=>trim($this->post('employee_id')), 'care_TARINA_status'=>'1', 'care_TARINA_entry_date'=>$date, 'care_TARINA_entry_time'=>$time, 'care_TARINA_long_id'=>trim($this->post('enter_long')), 'care_TARINA_lat_id'=>trim($this->post('enter_lat')), 'care_TARINA_employee_id'=>trim($this->post('employee_id')));
            
            $table_in_out="input_output_tracking_tarina";
            // care_master_input_output_tracking_tarina
            $query=$this->db->insert($table_in_out,$data_hhi_in_out);
            $last_id=$this->db->insert_id();
            $care_hhi=trim($this->post('care_hhi'));
            $employee_id=trim($this->post('employee_id'));
            $month_no=str_pad(trim($this->post('month_no')), 2, "0", STR_PAD_LEFT);
            $present_year=trim($this->post('present_year'));
            $Village_name=$this->post('Village_name');
            $GP_name=$this->post('GP_name');
            $block_name=$this->post('block_name');
            $district_name=$this->post('district_name');

            $table_crop_month="care_master_hhi_month_year";
            $data_month=array('care_hhi_id_info'=>trim($this->post('care_hhi')),'care_crp_id'=>trim($this->post('employee_id')),'care_month'=>$month_no,'care_year'=>trim($this->post('present_year')));
            $query_data_month=$this->db->get_where('hhi_month_year',$data_month);

            if($query_data_month->num_rows()==0){
                        $form1=array($last_id);
                        $user_form=serialize($form1);
                        $form1_date=array($date);
                        $user_form1_data=serialize($form1_date);
                        $i=0;
                        $form=array($i);
                        $user_from=serialize($form);
                        $data_crop_month = array('care_hhi_id_info'=>$care_hhi,'care_crp_id'=>$employee_id,'care_month'=>$month_no,'care_year'=>$present_year,'care_form1'=>$user_form,'care_form1_date'=>$user_form1_data,'care_mt_status_form1'=>$user_from,'care_mt_date_form1'=>$user_from,'care_CBO_status_form1'=>$user_from,'care_CBO_date_form1'=>$user_from,'care_MEO_status_form1'=>$user_from,'care_MEO_date_form1'=>$user_from,'care_village_name'=>$Village_name,'care_block_name'=>$block_name,'care_gp_name'=>$GP_name,'care_district_name'=>$district_name);

                         $query_month=$this->db->insert($table_crop_month,$data_crop_month);

                    }else{
                        foreach ($query_data_month->result() as $key_data_month){
                            $slno_md=$key_data_month->care_hhi_sl_no;
                            $get_userilaze_form1=unserialize($key_data_month->care_form1);
                            $care_form1_date=unserialize($key_data_month->care_form1_date);
                            $care_mt_status_form1=unserialize($key_data_month->care_mt_status_form1);
                            $care_mt_date_form1=unserialize($key_data_month->care_mt_date_form1);
                            $care_CBO_status_form1=unserialize($key_data_month->care_CBO_status_form1);
                            $care_MEO_status_form1=unserialize($key_data_month->care_MEO_status_form1);
                            $care_MEO_date_form1=unserialize($key_data_month->care_MEO_date_form1);
                            $care_CBO_date_form1=unserialize($key_data_month->care_CBO_date_form1);
                        }
                        if(!empty($get_userilaze_form1)){
                              $form1=array($last_id);

                                $form1_merge=array_merge($get_userilaze_form1,$form1);
                                $ser_form=serialize($form1_merge);
                                $form1_date=array($date);
                                $form1_merge_date=array_merge($care_form1_date,$form1_date);
                                $aer_form1_data=serialize($form1_merge_date);
                                $i=0;
                                $form=array($i);
                                $form1_merge_status1=array_merge($care_mt_status_form1,$form);
                                $ser_from1=serialize($form1_merge_status1);

                                $form1_merge_status2=array_merge($care_mt_date_form1,$form);
                                $ser_from2=serialize($form1_merge_status2);

                                $form1_merge_status3=array_merge($care_CBO_status_form1,$form);
                                $ser_from3=serialize($form1_merge_status3);

                                $form1_merge_status4=array_merge($care_MEO_status_form1,$form);
                                $ser_from4=serialize($form1_merge_status4);

                                $form1_merge_status5=array_merge($care_MEO_date_form1,$form);
                                $ser_from5=serialize($form1_merge_status5);

                                $form1_merge_status6=array_merge($care_CBO_date_form1,$form);
                                $ser_from6=serialize($form1_merge_status6);

                            }else{
                                $form1=array($last_id);
                                $ser_form=serialize($form1);
                                $form1_date=array($date);
                                $aer_form1_data=serialize($form1_date);
                                $i=0;
                                $form=array($i);
                                $ser_from6=$ser_from2=$ser_from3=$ser_from4=$ser_from5=$ser_from1=serialize($form);
                            }
                            $data_update_month = array('care_form1'=>$ser_form,'care_form1_date'=>$aer_form1_data,'care_mt_status_form1'=>$ser_from1,'care_mt_date_form1'=>$ser_from2,'care_CBO_status_form1'=>$ser_from3,'care_CBO_date_form1'=>$ser_from6,'care_MEO_status_form1'=>$ser_from4,'care_MEO_date_form1'=>$ser_from5);
                            $get_upadate_month=$this->db->update('hhi_month_year', $data_update_month, array('care_hhi_sl_no' => $slno_md));

                    }
            $your_id_delete_in_out=$this->post('your_id_delete_in_out');
            $det = array('response_status'=>"1",'msg'=>"sucessfully information stored success ",'your_id_delete_in_out'=>$your_id_delete_in_out); 
             $this->response($det, 200);
         }else{
            $det= array('response_status'=>"0",'msg'=>"incomplete Imformation1");
            $this->response($det, 200);
         }
        }else{
            $det= array('response_status'=>"0",'msg'=>"incomplete Imformation");
            $this->response($det, 200);
        }
    }
    function user_shg_info_post(){      
     // print_r($this->post());
     // exit;
        if($this->post('employee_id') && $this->post('employee_id')!="" && $this->post('userid') && $this->post('userid')!="" && $this->post('care_shg_id') && $this->post('care_shg_id')!=""  && $this->post('care_shg_slno') && $this->post('care_shg_slno')!=""  && $this->post('district_name') && $this->post('district_name')!="" && $this->post('block_name') && $this->post('block_name')!=""  && $this->post('GP_name') && $this->post('GP_name')!="" && $this->post('Village_name') && $this->post('Village_name')!="" && $this->post('enter_lat') && $this->post('enter_lat')!="" && $this->post('enter_long') && $this->post('enter_long')!="" && $this->post('month_no') && $this->post('month_no')!=""  && $this->post('present_year') && $this->post('present_year')!="" && $this->post('member_present_month_meeting') && $this->post('member_present_month_meeting')!="" && $this->post('no_of_member') && $this->post('no_of_member')!="" && $this->post('last_event_date') && $this->post('last_event_date')!="" && $this->post('care_shg_name') && $this->post('care_shg_name')!="" && $this->post('your_id_delete_shg_id') && $this->post('your_id_delete_shg_id')!=""){

                if($this->post('Meeting') && $this->post('Meeting')!="" && $this->post('Cash') && $this->post('Cash')!="" && $this->post('Individual') && $this->post('Individual')!=""  && $this->post('Group') && $this->post('Group')!=""  && $this->post('Saving') && $this->post('Saving')!="" && $this->post('Linkage_external_credit') && $this->post('Linkage_external_credit')!=""  && $this->post('Bank_linked') && $this->post('Bank_linked')!="" && $this->post('linkages_market') && $this->post('linkages_market')!="" && $this->post('linkages_technical_support') && $this->post('linkages_technical_support')!="" && $this->post('committee_no_linked') && $this->post('committee_no_linked')!="" && $this->post('committee_name') && $this->post('committee_name')!=""  && $this->post('Monthly_status') && $this->post('Monthly_status')!=""){
                    $date_event=date('Y-m-d',strtotime(trim($this->post('last_event_date'))));

                // `care_master_MRF_SHG_tracking_under_TARINA`(
                    
                    $data=array('employee_id'=>trim($this->post('employee_id')),'status'=>'1','assign_status'=>'1','sl_no'=>trim($this->post('userid')));
                    $query=$this->db->get_where('system_user',$data);
                    if($query->num_rows()==0){
                        $det= array('response_status'=>"2",'msg'=>"Invalid User");
                        $this->response($det, 200);
                    } 

                    $date=date('Y-m-d');
                    $time=date('H:i:s');

                    $data_shg = array('care_SHG_list_id'=>trim($this->post('care_shg_id')), 'care_SHG_name'=>trim($this->post('care_shg_name')), 'care_SHG_total_member'=>trim($this->post('no_of_member')), 'care_SHG_LMM_date'=>$date_event, 'care_SHG_mem_prsnt_monthly_meeting'=>trim($this->post('member_present_month_meeting')), 'care_SHG_RMU_meeting_redg'=>trim($this->post('Meeting')), 'care_SHG_RMU_cash_book'=>trim($this->post('Cash')), 'care_SHG_RMU_ind_passbook'=>trim($this->post('Individual')), 'care_SHG_RMU_group_passbook'=>trim($this->post('Group')), 'care_SHG_RMU_saving_loan_ledger_book'=>trim($this->post('Saving')), 'care_SHG_ML_linkage_external_credit'=>trim($this->post('Linkage_external_credit')), 'care_SHG_ML_bank_name'=>trim($this->post('Bank_linked')), 'care_SHG_ML_no_of_mem_link_market'=>trim($this->post('linkages_market')), 'care_SHG_ML_no_of_mem_link_tech_support_provider'=>trim($this->post('linkages_technical_support')), 'care_SHG_no_of_mem_link_any_committee'=>trim($this->post('committee_no_linked')), 'care_SHG_committee_name'=>trim($this->post('committee_name')), 'care_SHG_nutrition_discus_SHG_mnthly_meeting'=>trim($this->post('Monthly_status')), 'care_SHG_employee_id'=>trim($this->post('employee_id')), 'care_SHG_lat_id'=>trim($this->post('enter_lat')), 'care_SHG_long_id'=>trim($this->post('enter_long')), 'care_SHG_vlg_name'=>trim($this->post('Village_name')), 'care_SHG_block_name'=>trim($this->post('block_name')), 'care_SHG_district_name'=>trim($this->post('district_name')), 'care_SHG_gp_name'=>trim($this->post('GP_name')), 'care_SHG_month'=>str_pad(trim($this->post('month_no')), 2, "0", STR_PAD_LEFT), 'care_SHG_year'=>trim($this->post('present_year')), 'care_SHG_date'=>trim($date), 'care_SHG_time'=>trim($time), 'care_SHG_status'=>'1', 'care_SHG_id'=>trim($this->post('care_shg_id')));

                     $table_shg="mrf_shg_tracking_under_tarina";
                    // care_master_input_output_tracking_tarina
                    $query=$this->db->insert($table_shg,$data_shg);

                    $your_id_delete_shg_id=$this->post('your_id_delete_shg_id');
                    $det = array('response_status'=>"1",'msg'=>"sucessfully information stored success ",'your_id_delete_shg_id'=>$your_id_delete_shg_id); 
                    $this->response($det, 200);

                }else{
                    $det= array('response_status'=>"0",'msg'=>"incomplete Imformation2");
                    $this->response($det, 200);
                 }

        }else{
            $det= array('response_status'=>"0",'msg'=>"incomplete Imformation");
            $this->response($det, 200);
        }
    }

     function user_training_info_post(){  
        if($this->post('employee_id') && $this->post('employee_id')!="" && $this->post('userid') && $this->post('userid')!="" && $this->post('district_name') && $this->post('district_name')!="" && $this->post('block_name') && $this->post('block_name')!=""  && $this->post('GP_name') && $this->post('GP_name')!="" && $this->post('Village_name') && $this->post('Village_name')!="" && $this->post('enter_lat') && $this->post('enter_lat')!="" && $this->post('enter_long') && $this->post('enter_long')!="" && $this->post('month_no') && $this->post('month_no')!=""  && $this->post('present_year') && $this->post('present_year')!=""  && $this->post('thematic_intervention_id') && $this->post('thematic_intervention_id')!=""  && $this->post('topics_covered') && $this->post('topics_covered')!=""  && $this->post('event_date') && $this->post('event_date')!="" && $this->post('duration_session') && $this->post('duration_session')!="" && $this->post('male_present') && $this->post('male_present')!="" && $this->post('female_present') && $this->post('female_present')!="" && $this->post('your_id_delete_training_id') && $this->post('your_id_delete_training_id')!=""){
            if($this->post('hhi_covered') && $this->post('hhi_covered')!="" && $this->post('male_repeat') && $this->post('male_repeat')!="" && $this->post('female_repeat') && $this->post('female_repeat')!="" && $this->post('hhi_repeat') && $this->post('hhi_repeat')!=""  && $this->post('type_of_training') && $this->post('type_of_training')!="" && $this->post('type_of_group') && $this->post('type_of_group')!="" && $this->post('training_facilitator') && $this->post('training_facilitator')!="" && $this->post('remark_detail') && $this->post('remark_detail')!="" ){
                $date=date('Y-m-d');
                    $time=date('H:i:s');

                    $date_event=date('Y-m-d',strtotime(trim($this->post('event_date'))));
                $data_training = array('care_EV_them_intervention'=>trim($this->post('thematic_intervention_id')), 'care_EV_topics_covered'=>trim($this->post('topics_covered')), 'care_EV_event_date'=>trim($date_event), 'care_EV_male_Participants'=>trim($this->post('male_present')), 'care_EV_female_Participants'=>trim($this->post('female_present')), 'care_EV_male_Participants_repeats'=>trim($this->post('male_repeat')), 'care_EV_female_Participants_repeats'=>trim($this->post('female_repeat')), 'care_EV_no_of_hhs_covered'=>trim($this->post('hhi_covered')), 'care_EV_no_of_hhs_repeats'=>trim($this->post('hhi_repeat')), 'care_EV_avg_session_duration'=>trim($this->post('duration_session')), 'care_EV_training_type'=>trim($this->post('type_of_training')), 'care_EV_group_type'=>trim($this->post('type_of_group')), 'care_EV_training_facilitator'=>trim($this->post('training_facilitator')), 'care_EV_external_resource'=>trim($this->post('external_person')), 'care_EV_remarks'=>trim($this->post('remark_detail')), 'care_EV_vlg_name'=>trim($this->post('Village_name')), 'care_EV_block_name'=>trim($this->post('block_name')), 'care_EV_district_name'=>trim($this->post('district_name')), 'care_EV_gp_name'=>trim($this->post('GP_name')), 'care_EV_month'=>str_pad(trim($this->post('month_no')), 2, "0", STR_PAD_LEFT), 'care_EV_year'=>trim($this->post('present_year')), 'care_EV_date'=>trim($date), 'care_EV_time'=>trim($time), 'care_EV_employee_id'=>trim($this->post('employee_id')), 'care_EV_lat_id'=>trim($this->post('enter_lat')), 'care_EV_lang_id'=>trim($this->post('enter_long')), 'care_EV_status'=>'1');

                $table_training="mrf_exposure_visit_tarina";

                 $query=$this->db->insert($table_training,$data_training);

                    $your_id_delete_training_id=$this->post('your_id_delete_training_id');
                    $det = array('response_status'=>"1",'msg'=>"sucessfully information stored success ",'your_id_delete_training_id'=>$your_id_delete_training_id); 
                    $this->response($det, 200);

            }else{
                     $det= array('response_status'=>"0",'msg'=>"incomplete Imformation");
                    $this->response($det, 200); 
            }
        }else{
             $det= array('response_status'=>"0",'msg'=>"incomplete Imformation");
            $this->response($det, 200); 
        }
    }
}

