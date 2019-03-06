<?php 
class User_store extends CI_Model {
	// Constructor Is begin called
    public function __construct(){
        parent::__construct();
    }
    public function insert_common($tables, $data) {
    
		$query = $this->db->insert($tables, $data);

		if ($query == 1) {
			return true;
		} else {
			return False;
		}
	}
	public function check_common($tables, $data) {
		
		$query =$this->db->get_where($tables,$data);
		 
		if ($query->num_rows() == 0) {		
			return 0;		
		} else {
			return 1;
		}
	}
	function insert_users_details($tables,$data){
		
        $this->db->insert($tables,$data);
        $query=$this->db->insert_id();
        $x="token_".date('y-m-d').date('H:i:s')."".$query;
        $data1=array('token_no'=>$x);
                        $this->db->where('slno_pass',$query);
        $query_update=$this->db->update($tables,$data1);
        if($query_update==1){
            return true;
        }else{
            return False;
        }
    }
    public function check_login($data){
    	$query = $this->db->get_where('admin_user', $data);
    	
		if ($query->num_rows() == 0) {
			return 0;
		} else {
			return 1;
		}
    }
    function update_table($tables, $data, $data1) {
    	
		$query = $this->db->update($tables, $data, $data1);

		if ($query == 1) {
			return true;
		} else {
			return False;
		}
	}
	public function check_common_details($tables, $data) {
		
		$query =$this->db->get_where($tables,$data);
		 
		if ($query->num_rows() == 0) {		
			return 0;		
		} else {
			if ($query->num_rows() == 1) {
				return 1;
			}else{
				return 0;
			}
		}
	}
}