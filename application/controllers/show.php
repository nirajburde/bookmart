<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show extends CI_Controller {
	public function __construct(){
		parent::__construct();
		session_start();
	}
	
	public function hot_deals(){
	
		$this->load->model('books_model');
		$books = $this->books_model->hotDeals();
		
		/* $book_ids = array();
		foreach($books as $book){
			$book_ids[] = $book['id'];
		}
		
		$purchased_books = 
		//get purchased books and show 'Read Book' instead of 'Add to cart'
		*/
		
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
		$this->load->view('hot_deals', $data);
		$this->load->view('template/footer');
	}
	
	public function category($category_name = NULL){
		if(!$category_name){
			show_404();
			exit;
		}
		
		$this->load->model('books_model');
		$category = $this->books_model->getCategoryIdByName($category_name);
		
		$books = $this->books_model->booksInCategory($category['id']);
		
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
		$this->load->view('books_in_category', $data);
		$this->load->view('template/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */