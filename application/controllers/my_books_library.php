<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_books_library extends CI_Controller {
	public function __construct(){
		parent::__construct();
		session_start();
	}
	public function index(){
	
		$this->load->model('books_model');
		$books = $this->books_model->getMyPurchasedBooks($_SESSION['user_id']);
		
		$data = array(
			'books'	=> $books
		);
		
		$data_header = array();
		if(isset($_SESSION['user_id'])){
			$data_header = array(
				'user_id'	=> $_SESSION['user_id'],
				'name'		=> $_SESSION['first_name']." ".$_SESSION['last_name']
			);
		}
		
		$this->load->view('template/header', $data_header);
		$this->load->view('my_books_library', $data);
		$this->load->view('template/footer');
	}
	
	public function read($book_name = NULL){
		$book_name = urldecode($book_name);

		if($book_name){
			$this->load->helper('url');
			
			$directory = './resources/books/';
			$filename = $book_name.'.epub';
			
			if(file_exists($directory.$filename)){
				$newname = $book_name.'.zip';
				rename($directory . $filename, $directory . $newname);
				
				$zip = new ZipArchive;
				$zip->open($directory . $newname);
				$zip->extractTo($directory . $book_name);
				$zip->close();
			}
			
			$this->load->helper('url');
			
			$data = array('book_name' => $book_name);
			
			$this->load->view('reader', $data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */