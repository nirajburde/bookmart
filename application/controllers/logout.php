<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index(){
		session_start();
		session_destroy();
		$this->load->helper('url');
		redirect('home');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */