<?php
class Posts extends CI_Controller{
	public function index(){
		if($this->session->userdata('email')!=''){
$this->load->view('main');
		}else{
			redirect("login");
		}
	}
}