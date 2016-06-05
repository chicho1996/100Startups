<?php
class Logout extends CI_Controller{
	public function index(){
		$this->session->unset_userdata('email');
		redirect(base_url().'blog');
	}
}