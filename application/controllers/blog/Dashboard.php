<?php
class Dashboard extends CI_Controller{
	public function index(){
		if($this->form_validation->run()!=true){
		$this->load->view("vDashboard");
	}
	else{

	}
	}

}


?>