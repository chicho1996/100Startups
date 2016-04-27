<?php

class Registration extends CI_Model {

	private $table = 'users';
	private $insertData = array();

	public function saveDataInDB()
	{

		var_dump($_POST);
		die();
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

		//
		$yearList = array('2010','2011','2012','2013','2014','2015','201');

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
		$this->insert();

		// debug

		die();
		//


		var_dump($founder);
		if ( strlen($name) >= 2 && in_array($year, $yearList) && strlen($city) >= 2 
			&& strlen($desc) > 10) {
			var_dump(25);
		}

	}

	public function insert()
	{
		$this->db->insert($this->table, $this->insertData);
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