<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function user_exists($data)
	{
		$result = $this->db->query("SELECT * 
									FROM user 
									WHERE email = '".$data['email']."' 
										AND password = '".$data['password']."'");
		if($result->num_rows() > 0){
			return $result->row_array();
		}
		
		return FALSE;
	}
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */