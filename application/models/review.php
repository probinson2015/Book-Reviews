<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class review extends CI_Model {

public function add_review($post)
	{
		$query = "INSERT INTO reviews (comment, rating, user_id, book_id, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
		$values = array($post['comment'], $post['rating'], $post['user_id'], $post['book_id']);
		$this->db->query($query, $values);
		return $post['book_id']; //return book id for being redirected to book_by_id
	}

	// public function get_reviews($book_id)
	// {
	// 	$query = "SELECT books.title, authors.name as 'author name', reviews.rating, reviews.comment, users.id, users.alias from books join authors on authors.id = books.author_id join reviews on reviews.book_id = books.id join users on users.id = reviews.user_id where books.id = ?";
	// 	$values = array($book_id['id']);
	// 	return $this->db->query($query, $values)->result_array();
	// }
	public function get_three_reviews()
	{
		$query = "SELECT reviews.comment, reviews.rating, reviews.created_at, books.title, books.id as book_id, users.alias, users.id as 'user_id' 
			from reviews join books on books.id = reviews.book_id 
			join users on reviews.user_id = users.id 
			order by reviews.created_at DESC LIMIT 3";
		return $this->db->query($query)->result_array();
	}
	public function get_all_reviews()
	{
		$query = "SELECT reviews.comment, reviews.rating, reviews.created_at, books.title, books.id as book_id, users.alias, users.id as 'user_id' 
			from reviews join books on books.id = reviews.book_id 
			join users on reviews.user_id = users.id 
			order by reviews.created_at DESC";
		return $this->db->query($query)->result_array();
	}
	public function get_reviews_by_user($id)
	{
		$query = "SELECT  books.title, reviews.book_id 
					from reviews 
					JOIN books on books.id = reviews.book_id 
					WHERE reviews.user_id = ?";
		$values = $id;
		return $this->db->query($query, $values)->result_array();
	}
}