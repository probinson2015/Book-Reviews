<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class book extends CI_Model {

	// public function get_all_books()
	// {
	// 	$query = "SELECT * from reviews";
	// 	$reviews = $this->db->query($query);
	// 	var_dump($reviews);
	// 	die();
	// }
	public function add($post)
	{	//adding author first since it has no dependencies
		$query = "INSERT into authors (name, created_at, updated_at) VALUES (?,NOW(), NOW())";
		$values = array($post['author']);
		$this->db->query($query, $values);

		//get author id
		$query = "SELECT id from authors WHERE name = ?";
		$values = array($post['author']);
		$author_id = $this->db->query($query, $values)->row_array(); 
		
		//insert title and author id
		$query = "INSERT into books (title, author_id, created_at, updated_at) VALUES (?, ?, NOW(), NOW())";
		$values = array($post['title'], $author_id['id']);
		$this->db->query($query, $values);
	
		//get book id
		$query = "SELECT id from books where title = ?";
		$values = array($post['title']);
		$book_id = $this->db->query($query, $values)->row_array();	

		//insert review and rating based on book_id and user_id
		$query = "INSERT into reviews (comment, rating, book_id, user_id, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";

		$values = array($post['comment'], $post['rating'], $book_id['id'], $this->session->userdata('user'));
		$this->db->query($query, $values);
		return $book_id;

	}
	public function get_book_info($book_id)
	{
		$query = "SELECT books.id as 'book id', books.title, authors.name as 'author name', reviews.rating, reviews.comment, users.id as 'user id', users.alias from books join authors on authors.id = books.author_id join reviews on reviews.book_id = books.id join users on users.id = reviews.user_id WHERE books.id = ?";
		$values = array($book_id['id']);
		return $this->db->query($query, $values)->row_array();
	}

	
}