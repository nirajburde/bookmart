<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books_model extends CI_Model {

	public function hotDeals()
	{
		$query_books = $this->db->query("SELECT * 
									FROM books INNER JOIN deals 
									ON books.id = deals.books_id 
									WHERE deals.hot_deal = 1");
		if($query_books->num_rows() > 0){
			return $query_books->result_array();
		}
		
		return FALSE;
	}

	public function getBooksByIds($book_ids = array())
	{
		if(is_array($book_ids) && count($book_ids)){
			$query_books = $this->db->query("SELECT * 
										FROM books INNER JOIN deals 
										ON books.id = deals.books_id 
										WHERE books.id IN (".implode(',', $book_ids).")");
			if($query_books->num_rows() > 0){
				return $query_books->result_array();
			}
		}
		
		return FALSE;
	}

	public function purchaseBooksInCart($user_id = NULL, $book_ids = array()){
		if($user_id && is_array($book_ids) && count($book_ids)){
			$data = array();
			foreach($book_ids as $book_id){
				$data[] = array(
					'user_id'	=> $user_id ,
					'book_id'	=> $book_id
				);
			}
			
			return $this->db->insert_batch('purchases', $data);
		}
		
		return FALSE;
	}

	public function checkBookPurchased($user_id = NULL, $book_id = NULL){
		if($user_id && $book_id){
			$query_book = $this->db->query("SELECT * 
										FROM purchases 
										WHERE book_id = ".$book_id." 
											AND user_id = ".$user_id);
			if($query_book->num_rows() > 0){
				return TRUE;
			}
		}
		
		return FALSE;
	}
	
	public function getMyPurchasedBooks($user_id = NULL){
		if($user_id){
			$query_books = $this->db->query("SELECT * 
										FROM books INNER JOIN purchases 
										ON books.id = purchases.book_id 
										WHERE purchases.user_id = ".$user_id);
			if($query_books->num_rows() > 0){
				return $query_books->result_array();
			}
		}
		
		return FALSE;
	}
	
	public function booksInCategory($category_id = NULL){
		if($category_id){
			$query_books = $this->db->query("SELECT * 
										FROM books INNER JOIN books_category 
										ON books.id = books_category.books_id 
										WHERE books_category.category_id = ".$category_id);
			if($query_books->num_rows() > 0){
				return $query_books->result_array();
			}
		}
		
		return FALSE;
	}
	
	public function getCategoryIdByName($category_name = NULL){
		if($category_name){
			$query_category = $this->db->query("SELECT * 
										FROM category
										WHERE name = '".$category_name."'");
			if($query_category->num_rows() > 0){
				return $query_category->row_array();
			}
		}
		
		return FALSE;
	}
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */