<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->output->enable_profiler(TRUE);  //for testing
	// }

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("/");
	}
	public function get_user($id)
	{
		$user = $this->user->get_user($id);
		$reviews = $this->review->get_reviews_by_user($id);
		$this->load->view('users', array('user' => $user, 
										'reviews' => $reviews));
	}
	public function register()
	{
		$this->user->register($this->input->post());
		redirect('/');
	}
	public function login()
	{
		if ($this->user->login($this->input->post())) //if this comes back as true, user was logged in
		{
			//$this->load->view('home'); we could use this load view here, but using method instead
			redirect("/books");
		}
		else //if it comes back as false, no user was found
		{

     		redirect("/");
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */