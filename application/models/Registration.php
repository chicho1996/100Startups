<?php

class Registration extends CI_Model {

	public function saveDataInDB()
	{
		//if (!count($_POST)) show_404();
		var_dump( $this->httpPost('http://127.0.0.1/100Startups/send/data', array('name'=>'toko')) );
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