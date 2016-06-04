<?php
class Posts extends CI_Controller{
	public function index(){
		if($this->session->userdata('email')!=''){
$this->load->view('vmain');
		}else{
			redirect("login");
		}
	}
}