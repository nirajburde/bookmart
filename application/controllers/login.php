<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		$response = array(
			'success'	=> FALSE
		);
		session_start();
		$this->load->model('login_model');
		$user = $this->login_model->user_exists(array(
			'email'		=> $_POST['email'],
			'password'	=> $_POST['password']
		));
		
		if($user){
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['first_name'] = $user['first_name'];
			$_SESSION['last_name'] = $user['last_name'];
			
			$response = array(
				'success'	=> TRUE,
				'data'		=> array(
					'first_name'	=> $user['first_name'],
					'last_name'		=> $user['last_name']
				)
			);
		}
		
		echo json_encode($response);
		exit;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */