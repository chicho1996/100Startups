<?php
class Logedin extends CI_Controller{
	public function index(){
		if($this->session->userdata('email')==""){
			redirect('login');
		}else{
		$this->load->view('main');
		}
	}
}