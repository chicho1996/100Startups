<?php 
Class Deletepost extends CI_Controller{
	public function index(){
		if($this->session->userdata('email')!=''){
			$id=$_GET['id'];
			$this->db->delete('posts',array('id'=>$id));
			redirect('Posts');
		}
	}
}