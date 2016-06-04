<?php
class Main extends CI_Controller{
	public function index(){
		$this->load->view('vmain');
		
			}

	public function log() {
		var_dump('log');
	}

	public function reg() {
		var_dump('reg');
	}



	/*public function Register()
	{
		$data = array();
		$data['register'] = $this->load->view('Register', NULL, TRUE);

		$this->load->view ('vmain', $data);
	}*/
}

?>