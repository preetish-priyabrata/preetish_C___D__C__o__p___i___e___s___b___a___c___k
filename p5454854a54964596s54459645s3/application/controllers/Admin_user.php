<?php
class Admin_user extends CI_Controller {
	 function __construct(){
        // Construct the parent class
        parent::__construct();
        $this->load->library('email');
        $this->load->library('upload');
        $this->load->library('session');
       // $this->load->helper('database');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        // $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        // $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key 
        $this->load->helper('file');
       $this->load->database();
         $this->load->helper('url');
        $this->load->model('user_store', 'user');
    }
	public function hello() { 
         echo "This is hello function. preetish priyabrata"; 
      } 
/**
 * [dashboard description]
 * @return [type] [description]
 */
    public function dashboard(){
        $data_set['title']="ADMIN DASHBOARD";
        $this->load->view('template/head',$data_set);
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('template/content');
        $this->load->view('template/footer');
    }
/**
 * [visit_location description]
 * here admin user will able see location details
 * @return [type] [description]
 */
    public function visit_location(){
         $data_set['title']="Admin View & Add Location";
        $this->load->view('template/head',$data_set);
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('admin/location/visit_location');
        $this->load->view('template/footer');
    }
/**
 * [check_locations Here Location name is cross check in database]
 * @return [0] [if its left blank]
 * @return [1] [if it database no value matched ]
 * @return  [2] [if it is present in database no duplicte value should not been entry]
 */
    public function check_locations(){
       // print_r($_POST);
       // Array( [location_name] => puri)
        if(!empty($_POST['location_name'])){
            $tables="master_places";
            $data = array('place_name' => strtolower(trim($_POST['location_name'])));
             $results=$this->user->check_common($tables,$data);

            if($results==0){
                echo 1;
                exit;
            }else{
                echo 2;
                exit;  
            }
        }else{
            echo 0;
            exit;
        }
    }
/**
 * [Add_locatin_save description]
 * Here Admin Of  save new detail of place name
 */
    public function Add_locatin_save(){
        // print_r($_POST);
        // Array ( [location] => lingraj mandir [price] => 111 [check_points] => 4 [add_palce] => Submit )
        if($_POST['add_palce']=="Submit"){
            $tables="master_places";
            $data = array('place_name' => strtolower(trim($_POST['location'])));
            $results=$this->user->check_common($tables,$data);
            // 
            $location=strtolower(trim($_POST['location']));
            $price=strtolower(trim($_POST['price']));
            $schedule_price=strtolower(trim($_POST['schedule_price']));
            $check_points=strtolower(trim($_POST['check_points']));
            $time=date('H:i:s');
            $date=date('Y-m-d');
            if($results==0){
                $data1=array('place_name'=>$location,'price_detail'=>$price,'reschedule_price'=>$schedule_price,'no_gates'=>$check_points,'date'=>$date,'time'=>$time);
                $results12=$this->user->insert_common($tables,$data1);
                if($results12==1){
                    $this->session->set_flashdata('msg', 'Success-Fully Add In Our Record'); 
                    redirect('Add-visiting_location-form');
                    exit;
                }else{
                    $this->session->set_flashdata('msg1', 'Some Error Occur Please Call Support Team'); 
                    redirect('Add-visiting_location-form');
                    exit;
                }

            }else{
                $this->session->set_flashdata('msg1', 'Place Name Is In Our Record'); 
                redirect('Add-visiting_location-form');
                exit; 
            }
        }else{
            redirect('logout');
            exit;
        }
    }
    public function update_location_status($u_status, $id) {
        $tables = "master_places";
        if ($u_status == 2) {
            $data = array('place_id' => $id);
            $data1 = array('status' => "2");
            $this->session->set_flashdata('msg1', 'Place is Inactive For Now');
            $this->db->update($tables, $data1, $data);
            redirect('Add-visiting_location-form');
        } else {
            $data = array('place_id' => $id);
            $data1 = array('status' => "1");
            $this->db->update($tables, $data1, $data);
            $this->session->set_flashdata('msg', 'Place is Active For Now');
            redirect('Add-visiting_location-form'); 
            
        }
    }
/**
 * [Add_visiting_gate_location_form description]
 * here admin user will able view the location
 */
    public function Add_visiting_gate_location_form(){
        $data_set['title']="Admin View & Add Gate To Location";
        $this->load->view('template/head',$data_set);
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('admin/gate/visit_gate_location');
        $this->load->view('template/footer');
    }
    /**
 * [gate_checks Here Location name is cross check in database]
 * @return [0] [if its left blank]
 * @return [1] [if it database no value matched ]
 * @return  [2] [if it is present in database no duplicte value should not been entry]
 */
    public function gate_checks(){
       // print_r($_POST);
       // Array( [location_name] => puri)
        if(!empty($_POST['location_name']) && !empty($_POST['check_point_name']) ){
            $tables="master_gate_name";
            $data = array('gate_name' => strtolower(trim($_POST['check_point_name'])));
             $results=$this->user->check_common($tables,$data);

            if($results==0){
                echo 1;
                exit;
            }else{
                echo 2;
                exit;  
            }
        }else{
            echo 0;
            exit;
        }
    }
    /**
 * [Add_Gate_save description]
 * Here Admin Of  save new detail of place name
 */
    public function Add_Gate_save(){
        // print_r($_POST);
        // exit;
        // Array ( [location] => 1 [assigned_gate_places] => 1 [check_point] => nad [add_palce] => add_location ) 
        if($_POST['add_palce']=="add_location"){
            $tables="master_gate_name";
            $data = array('gate_name' => strtolower(trim($_POST['check_point'])));
            $results=$this->user->check_common($tables,$data);
            // 
            $location=strtolower(trim($_POST['location']));
            
            $check_point_name=strtolower(trim($_POST['check_point']));
            $time=date('H:i:s');
            $date=date('Y-m-d');
            if($results==0){
                $data1=array('place_id'=>$location,'gate_name'=>$check_point_name,'date'=>$date,'time'=>$time);
                $results12=$this->user->insert_common($tables,$data1);
                if($results12==1){
                    $table="master_places";
                    $data2=array('status'=>"1",'place_id'=>$location);
                    $query_location = $this->db->get_where($table, $data2);
                    foreach ($query_location->result() as $key_value) {
                        $no_gates=$key_value->assigned_gate_place;
                    }
                        $no_gates=$no_gates+1;
                        $data_like_no=array('assigned_gate_place'=>$no_gates);
                       
                            $status=$this->user->update_table($table,$data_like_no,$data2);
                            if($status==1){
                                $this->session->set_flashdata('msg', 'Success-Fully Add In Our Record'); 
                                
                               
                            }else{
                                 $this->session->set_flashdata('msg1', 'Server Error !!!!!'); 
                               
                                
                            }   
                        redirect('Add-visiting-gate-location-form');
                        exit;                 
                }else{
                    $this->session->set_flashdata('msg1', 'Some Error Occur Please Call Support Team'); 
                    redirect('Add-visiting-gate-location-form');
                    exit;
                }

            }else{
                $this->session->set_flashdata('msg1', 'Place Name Is In Our Record'); 
                redirect('Add-visiting-gate-location-form');
                exit; 
            }
        }else{
            redirect('logout');
            exit;
        }
    }
/**
 * [View_payment_pending_Application description]
 * here all payment pending aplication will be show
 */
    public function View_payment_pending_Application(){
         $data_set['title']="View Pending Application List";
        $this->load->view('template/head',$data_set);
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('admin/user_application/payment_pending/view_payment_pending.php');
        $this->load->view('template/footer');
        
    }
/**
 * [update_payment_fail_status description]
 * @param  [type] $u_status       [description]
 * @param  [type] $token          [description]
 * @param  [type] $transaction_id [description]
 * @return [type]                 [description]
 */
    public function update_payment_fail_status($u_status, $token,$transaction_id){
        $tables = "pass_detail_form";
         $table = "pass_payment_application";
        if ($u_status == 2) {
            $data = array('token_no' => $token,'transaction_id'=>$transaction_id, );
            $data1 = array('status' => "1");
            $this->session->set_flashdata('msg', 'Success-Fully Update ');
            $this->db->update($tables, $data1, $data);
            $this->db->update($table, $data1, $data);
            redirect('admin-dashboard');
        }
       
    }
/**
 * [View_received_Application description]
 * here admin will view application which paid details list according date wise
 */
    public function View_received_Application(){
        $data_set['title']="View Received Application List";

        $this->load->view('template/head',$data_set);
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('admin/user_application/received_application/view_received_application_info.php');
        $this->load->view('template/footer');
    }

    public function View_received_Application_details($token){
        $data1=array('token_no'=>$token);
            $table="pass_detail_form";
            $results1=$this->db->get_where($table,$data1);
           $results11=$results1->num_rows();
            if($results11==0){
                $this->session->set_flashdata('msg1', 'Invalid Application No');
                redirect('admin-dashboard'); exit();
            }else{  
                $data_set['title']="View Received Application List";
                $data_set['token']=$token;
                $this->load->view('template/head',$data_set);
                $this->load->view('template/header');
                $this->load->view('template/menu');
                $this->load->view('admin/user_application/received_application/view_detail_information_application.php',$data_set);
                $this->load->view('template/footer');
            }

    }
    public function save_details_confirm_personal(){
        // print_r($_POST);
        // View-received-Application
        // Array ( [verify1] => 2 [verify2] => ttt [token_id] => Token_17-03-3018:10:104 ) 
        // Array ( [verify1] => 1 [verify2] => [token_id] => Token_17-03-3018:10:104 ) 
        if(!empty($_POST['token_id']) && !empty($_POST['verify1'])){
             $token_id=$_POST['token_id'];
            if($_POST['verify1']==2){
                
                $verify2=$_POST['verify2'];
                 $data=array('remarks'=>$verify2,'pending_status'=>'2');
                $table="pass_detail_form";
                $data_files=array('token_no'=>$token_id);
                $status=$this->user->update_table($table,$data,$data_files);
                if($status==1){
                    $this->session->set_flashdata('msg', 'Token No :- '.$token_id.' Success-Fully  For Pending List');
                    redirect('admin-dashboard'); exit();
                }else{
                     $this->session->set_flashdata('msg1', 'Please Contact Administrator');
                      redirect('admin-dashboard'); exit();
                }
            }else{
                if($_POST['verify1']==1){
                    $data=array('status'=>'2');
                    $table="pass_detail_form";
                    $data_files=array('token_no'=>$token_id);
                    $status=$this->user->update_table($table,$data,$data_files);
                    if($status==1){
                        $this->session->set_flashdata('msg',  'Token No :- '.$token_id.' Success-Fully  For Approved Application');
                          redirect('View-received-Application'); exit();
                    }else{
                         $this->session->set_flashdata('msg1', 'Please Contact Administrator');
                          redirect('admin-dashboard'); exit();
                    }
                }else{
                    redirect('logout');
                    exit;
                }


            }
        }else{
             redirect('logout'); exit();
        }
    }
/**
 * [View_received_Application description]
 * here admin will view application which paid details list according date wise
 */
    public function View_received_approved_personal_Application(){
        $data_set['title']="View Received Application Approved Personal Info List";

        $this->load->view('template/head',$data_set);
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('admin/user_application/approve_application_vechile/view_received_application_info.php');
        $this->load->view('template/footer');
    }
    public function view_personal_approved_application_details($token){
       $data1=array('token_no'=>$token);
            $table="pass_detail_form";
            $results1=$this->db->get_where($table,$data1);
           $results11=$results1->num_rows();
            if($results11==0){
                $this->session->set_flashdata('msg1', 'Invalid Application No');
                redirect('admin-dashboard'); exit();
            }else{  
                $data_set['title']="View Received Approved Personal Application List";
                $data_set['token']=$token;
                $this->load->view('template/head',$data_set);
                $this->load->view('template/header');
                $this->load->view('template/menu');
                $this->load->view('admin/user_application/approve_application_vechile/view_detail_information_application.php',$data_set);
                $this->load->view('template/footer');
            }
    }
    public function save_details_conform_Vehicle(){
        if(!empty($_POST['token_id']) && !empty($_POST['verify1'])){
             $token_id=$_POST['token_id'];
            if($_POST['verify1']==2){
                
                $verify2=$_POST['verify2'];
                 $data=array('remarks'=>$verify2,'pending_status'=>'3');
                $table="pass_detail_form";
                $data_files=array('token_no'=>$token_id);
                $status=$this->user->update_table($table,$data,$data_files);
                if($status==1){
                    $this->session->set_flashdata('msg', 'Token No :- '.$token_id.' Success-Fully  For Pending List');
                    redirect('admin-dashboard'); exit();
                }else{
                     $this->session->set_flashdata('msg1', 'Please Contact Administrator');
                      redirect('admin-dashboard'); exit();
                }
            }else{
                if($_POST['verify1']==1){
                    $data=array('status'=>'5');
                    $table="pass_detail_form";
                    $data_files=array('token_no'=>$token_id);
                    $status=$this->user->update_table($table,$data,$data_files);
                    if($status==1){
                        $this->session->set_flashdata('msg',  'Token No :- '.$token_id.' Success-Fully  For Approved Application');
                          redirect('View-received-approved-personal-Application'); exit();
                    }else{
                         $this->session->set_flashdata('msg1', 'Please Contact Administrator');
                          redirect('admin-dashboard'); exit();
                    }
                }else{
                    redirect('logout');
                    exit;
                }


            }
        }else{
             redirect('logout'); exit();
        }
    }
    public function genereate_Pass_list(){
        $data_set['title']="Generation For Pass No";

        $this->load->view('template/head',$data_set);
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('admin/user_application/generation_pass/view_received_application_info.php');
        $this->load->view('template/footer');
    }
    public function admin_generate_pass($token){
        $this->load->helper('string');
        $token=strtolower($token);
        $data1=array('token_no'=>$token,'status'=>"5");
        $table="pass_detail_form";
        $status=$this->user->check_common_details($table,$data1);
        if($status==0){
            $this->session->set_flashdata('msg1', 'Token No :- '.$token.' Is not Approved One');
            redirect('admin-dashboard'); exit();
        }else{
            // $pass=random_string('alnum', 16);
            $data_p=array('token_no'=>$token,'status'=>"0");
            $table_p="master_pass_no_details";
            $status=$this->user->check_common($table_p,$data_p);
            if($status==0){
                while(1){ 
                    $pass=random_string('alnum', 16);
                    $data_p_n=array('pass_no'=>$pass);                
                    $status=$this->user->check_common($table_p,$data_p_n);
                    if($status==0){
                        $query1_detail = $this->db->get_where($table, $data1);
                        foreach ($query1_detail->result() as $query1 ) {
                           $doj=$query1->date_journey;
                            $applicant_mobile=$query1->application_mobile;
                        }
                        $date=date('Y-m-d');
                        $time=date('H:i:s');
                        // `pass_no`, `token_no`, `date`, `time`, `date_j
                        $data_insert=array('pass_no'=>$pass,'applicant_mobile'=>$applicant_mobile,'token_no'=>$token,'date'=>$date,'time'=>$time,'date_j'=>$doj);
                         $status=$this->user->insert_common($table_p,$data_insert);
                         if($status==1){
                            $data=array('status'=>'1');
                            $table="pass_detail_form";
                            $data_files=array('token_no'=>$token);
                            $status=$this->user->update_table($table,$data,$data_files);
                            $this->session->set_flashdata('msg', 'Token No :- '.$token.' Having Pass Permit No :- '.$pass.' .');
                            redirect('genereate-Pass-list'); exit();
                            
                         }else{
                            $this->session->set_flashdata('msg1', 'Please Contact Technical Person ');
                            redirect('admin-dashboard'); exit(); 
                         }
                        
                    }
                }
            }else{
                 $this->session->set_flashdata('msg1', 'Token No :- '.$token.' Is Use Ones Generated ');
                redirect('admin-dashboard'); exit();
            }


        }
    }
    

}