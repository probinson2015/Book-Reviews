<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(TRUE);  //for testing
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("/");
	}
	public function get_user()
	{
		$this->load->view('users');
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