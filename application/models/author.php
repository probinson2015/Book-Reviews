<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class author extends CI_Model {

	public function get_authors()
	{
		$query = "SELECT authors.name from authors";
		return $this->db->query($query)->result_array();
	}
	
}