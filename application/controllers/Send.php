<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends CI_Controller {


	public function msg()
	{
		$this->load->model('msg');
		$this->msg->send();
	}

	public function data() {
		$this->registration->init();
	}

	public function checkCode()
	{
		$this->load->model('msg');
		$this->msg->checkCode();
	}

}
