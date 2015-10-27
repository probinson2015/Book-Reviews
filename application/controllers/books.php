<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->output->enable_profiler(TRUE);  //for testing
	// }

	public function index()
	{
		//once they were logged in, i set $this->session->set_userdata['user id'], $user['id'] and $this->session->set_userdata['user alias'], $user['alias']. This is now accessible in session. 
		
		//after they've logged in properly take them to /books


		//get all reviews with user alias and other connected info
		$reviews = $this->review->get_all_reviews();
		$three_reviews = $this->review->get_three_reviews();

		if (empty($reviews))
		{
			$this->load->view('/add');
		}
		else
		{
		$this->load->view("books", array('reviews' => $reviews, 
										'three_reviews' => $three_reviews));
		}

		
	}
	public function logout() 
	{
		$this->session->sess_destroy();
		redirect("/");
	}
	public function add()	
	{	
		$authors = $this->author->get_authors();
		//this is going to load the add page
		$this->load->view('/add', array('authors' => $authors));
	}
	public function create() //process the add book form
	{
		
		$this->book->add($this->input->post()); 
		$book_id = $this->db->insert_id(); //get book id from insert	
		redirect("/books/book_by_id/".$book_id);			
	}
	public function add_review()
	{
		$book_id = $this->review->add_review($this->input->post());
		
		redirect("/books/book_by_id/" .$book_id);
	}
	public function book_by_id($book_id)
	{
		$book = $this->book->get_book_info($book_id);
		$book_reviews = $this->book->book_by_id($book_id);
		$this->load->view("book_by_id", array("book_reviews" => $book_reviews, 
												'book' => $book));
		// $book_info[] = $book_reviews;
		
		// var_dump($id);
		// die();
	}	
}
