<?php

class Registration extends CI_Model {

	public $table = 'users';

	private $thisID = 0;

	// logo data
	private $logoInput = 'logo';
	private $logoData = '';

	// insert
	public $insertData = array();

	// update 
	public $updateData = array();
	public $updateWhere = array();

	// time
	private $time = 0;

	public function checkCOde() {
		
	}

	public function init()
	{

		if (!count($_POST)) show_404();

		$name = $_POST['name'];
		$year = $_POST['year'];
		$founder = $_POST['founder'];
		$city = $_POST['city'];
		$members = $_POST['memberNum'];
		$industry = $_POST['industry'];
		$desc = $_POST['desc'];
		$email = $_POST['email'];
		//$logo = $_POST['logo'];
		$capital = $_POST['capital'];

		$yearList = array('2010','2011','2012','2013','2014','2015','201');

		//
		$this->insertData = array(
			'name'		=>		$name,
			'year'		=>		$year,
			'city'		=>		$city,
			'members'	=>		$members,
			'industry'	=> 		$industry,
			'desc'		=>		$desc,
			'email'		=>		$email,
			'capital'	=>		$capital,
			'IP'		=>		$_SERVER['REMOTE_ADDR']
		);

		$this->storeData();
		if ( strlen($name) >= 2 && in_array($year, $yearList) && strlen($city) >= 2 
			&& strlen($desc) > 10 && $this->emailIsValid($email) && $this->logoIsAvailable() ) {
			
		}

	}

	public function storeData()
	{

		$this->insert();
		
		$this->logo_upload();

		$this->updateData = array(
			'logo'	=>		$this->logoData['file_name']
		);
		$this->updateWhere = array(
			'id'	=>		$this->thisID
		);
		$this->update();
	}

	public function logoIsAvailable()
	{
		return (!empty($_FILES) );
	}

	public function emailIsValid($email)
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format"; 
		}
	}

	public function logo_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->time = time();

		$name = $_FILES[$this->logoInput]['name'];

		$config['file_name'] = $this->time.$name;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($this->logoInput))
		{
			echo 1;
		}
		else
		{
			$this->logoData = $this->upload->data();
			echo 0;
		}
	}

	public function update()
	{
		$this->db->update($this->table, $this->updateData, $this->updateWhere);
	}

	public function insert()
	{
		$this->db->insert($this->table, $this->insertData);
		$this->thisID = $this->db->insert_id();
	}

	private function httpPost($url, $data)
	{
	    $curl = curl_init($url);
	    curl_setopt($curl, CURLOPT_POST, true);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    $response = curl_exec($curl);
	    curl_close($curl);
	    return $response;
	}

}