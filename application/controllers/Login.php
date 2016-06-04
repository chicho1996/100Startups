<?php
class Login extends CI_Controller{
	public function index(){
		if($this->session->userdata('email')==''){
			$mail=$this->pro($this->input->post('email'));
			$pass=md5($this->input->post('pass'));
			$this->check($mail,$pass);

			$this->load->view('main');}
			else{
				redirect(base_url());
			}
	}
		public function check($mail,$pass){
			$query="SELECT * FROM `blog_users` WHERE `email` ='$mail' AND `password`='$pass'";
			$row=$this->db->query($query);
			if($row->num_rows()>0){

				$this->session->set_userdata('email',$mail);
				redirect('Logedin');
			}

		}
		public function pro($str){
	return strip_tags($str);
}
}