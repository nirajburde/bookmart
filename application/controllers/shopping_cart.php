<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shopping_cart extends CI_Controller {

	public function __construct(){
		parent::__construct();
		session_start();
	}
	
	public function index(){
		$data = array();
		
		//$_SESSION['cart'] = array(1,3,4);
		
		if(isset($_SESSION['cart'])){
			$this->load->model('books_model');
			$books = $this->books_model->getBooksByIds($_SESSION['cart']);
			
			$data = array(
				'books'	=> $books
			);
		}
		
		$data_header = array();
		if(isset($_SESSION['user_id'])){
			$data_header = array(
				'user_id'	=> $_SESSION['user_id'],
				'name'		=> $_SESSION['first_name']." ".$_SESSION['last_name']
			);
		}
		$this->load->view('template/header', $data_header);
		$this->load->view('shopping_cart', $data);
		$this->load->view('template/footer');
	}
	
	public function add(){
		$response = array('success' => FALSE);
		if(isset($_POST['book_id'])){
			$response['success'] = TRUE;
			
			$this->load->model('books_model');
			$already_purchased = $this->books_model->checkBookPurchased($_SESSION['user_id'], $_POST['book_id']);
			if(!$already_purchased){
				if( !isset($_SESSION['cart']) || !in_array($_POST['book_id'], $_SESSION['cart']) ){
					$_SESSION['cart'][] = $_POST['book_id'];
					$response['message'] = 'Added to your cart';
				}else{
					$response['message'] = 'Already in your cart';
				}
			}else{
				$response['message'] = 'You have already purchased this book. See \'My Books\'.';
			}
		}
		
		echo json_encode($response);
	}
	
	public function purchase(){
		$response = array('success' => FALSE);
		if(isset($_SESSION['cart']) && count($_SESSION['cart']) && $_SESSION['cart']){
			$this->load->model('books_model');
			$this->books_model->purchaseBooksInCart($_SESSION['user_id'], $_SESSION['cart']);
			$_SESSION['cart'] = array();
		}
		
		$this->load->helper('url');
		redirect('my_books_library');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */