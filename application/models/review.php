<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class review extends CI_Model {

public function add_review($post)
	{
		$query = "INSERT INTO reviews (comment, rating, user_id, book_id, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
		$values = array($post['comment'], $post['rating'], $post['user_id'], $post['book_id']);
		$this->db->query($query, $values);
	}

	public function get_reviews($book_id)
	{
		$query = "SELECT books.title, authors.name as 'author name', reviews.rating, reviews.comment, users.id, users.alias from books join authors on authors.id = books.author_id join reviews on reviews.book_id = books.id join users on users.id = reviews.user_id where books.id = ?";
		$values = array($book_id['id']);
		return $this->db->query($query, $values)->result_array();
	}
	
}