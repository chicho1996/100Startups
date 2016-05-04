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

	private $founders = null;

	public function init()
	{

		if (!count($_POST)) show_404();

		$name = json_decode($_POST['name']);
		$year = json_decode($_POST['year']);
		$founder = json_decode($_POST['founder']);
		$city = json_decode($_POST['city']);
		$members = json_decode($_POST['memberNum']);
		$industry = json_decode($_POST['industry']);
		$desc = json_decode($_POST['desc']);
		$email = json_decode($_POST['email']);
		//$logo = $_POST['logo'];
		$capital = json_decode($_POST['capital']);

		$yearList = array('2010','2011','2012','2013','2014','2015','2016');


		$this->founders = $founder;
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
			'IP'		=>		$_SERVER['REMOTE_ADDR'],
			'status'	=>		1
		);

		if ( strlen($name) >= 2 && in_array($year, $yearList) && strlen($city) >= 2 
			&& strlen($desc) > 10 && $this->emailIsValid($email) && $this->logoIsAvailable() ) {
			$this->storeData();
			echo 89;
		} else {
			echo 0;
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

		$this->insertFounders();
	}

	public function insertFounders()
	{

		foreach ($this->founders as $key => $data) {
			if (!empty($data->fName) && !empty($data->lName) && !empty($data->age)) {
				$data = array(
					'firstname'		=>		$data->fName,
					'lastname'		=>		$data->lName,
					'age'			=>		$data->age,
					'user_id'		=>		$this->thisID
				);
				$this->db->insert('founders', $data);
			}
		}

		//$this->insert();

	}

	public function logoIsAvailable()
	{
		return (!empty($_FILES) );
	}

	public function emailIsValid($email)
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return false;
		return true;
	}

	public function logo_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size'] = '99999999';

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