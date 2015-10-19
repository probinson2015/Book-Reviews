<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Model {

	public function register($post) //be sure to enter $post if the db will be working with the post info. 
	{
		//add user to db and form validation
		
		//1.1 Check whether the email address already exists in the database. 
		//1.2 Check whether the email address is entered properly. 
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email|is_unique[users.email]"); //table and field from db for is unique
		
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("alias", "Alias", "trim|required");

		//1.3 Check password's length - make it at least 8 characters. 
		//1.4 Check if password and confirm password field has same value.
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");
		$this->form_validation->set_rules("cpassword", "Confirm Password", "trim|required|matches[password]");
		
		//end validations rules

		if($this->form_validation->run() === FALSE)
		{
     		
     		$this->session->set_flashdata('errors', validation_errors());

     		
		}
		else
		{
     		//if no errors, insert into database. use ? to escape the string

     		$query = "INSERT INTO users(email, first_name, last_name, alias, password, created_at, updated_at) VALUES  (?,?,?,?,?, NOW(), NOW())";
     		$values = array($post["email"],$post["first_name"],$post["last_name"],$post["alias"],$post["password"]);
     		$this->db->query($query,$values);	
     		$this->session->set_flashdata('success', 'Successfully registered, please login.');

		}


	}

	public function login($post)
	{
		// validate form
		$this->form_validation->set_rules("email", "Email address", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");

		if($this->form_validation->run() === FALSE)
		{
     		$this->session->set_flashdata('errors', validation_errors());
		}
		else
		{
			//check if user info is in db
			$query = "SELECT id, alias FROM users WHERE email = ? AND password = ?";
			$values = array($post['email'], $post['password']);
			
			//if it is save the user info in session
			$user = $this->db->query($query, $values)->row_array();
			//is that user array EMPTY?? not null, use empty
			if (empty($user)) 
			{
				$this->session->set_flashdata('errors', "Email and password combination is invalid");
				return false;
			}
			$this->session->set_userdata("user", $user["id"], $user['alias']);
			return true;
		}
	}
	
	
}