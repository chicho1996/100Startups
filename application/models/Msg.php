<?php

class Msg extends CI_Model {

	public $table = 'codes';

	private $phone = '';

	private $thisID = 0;

	private $selectWhere = array();

	public function dateLimitReached($db_date, $secLimit) {
		$format = 'Y-m-d H:i:s';
		$current = date($format);
		$limit = date( $format, strtotime("+$secLimit seconds", strtotime($db_date)) );
		$diff = strtotime($current) - strtotime($limit);
		if ($diff < 0 && $diff >= -$secLimit) return true;
		return false;
	}

	public function send() {
		$this->phone = isset($_POST['phone']) ? $_POST['phone'] : '';
		$this->phone = '551721521'; ///
		$code = $this->n_digit_random(4);
		//$sent = $this->send_msg($phone,'100startups', (String)($code) );
		
		$this->registration->table = $this->table;
		$this->registration->insertData = array(
			'phone'		=>		$this->phone,
			'code'		=>		$code,
			'IP'		=>		$_SERVER['REMOTE_ADDR']
		);

		if (55) { //count($_POST)
			if ( $this->isGeoPhoneNum() ) {

				//var_dump( $this->canIsendCode() );
				if ($this->canIsendCode()) {
					
				}


				//$sent = $this->send_msg($phone,'100startups','hello');
				$sent = true; ///
				if ($sent) {
					//echo 0;
					//$this->registration->insert();
					//$this->thisID = $this->db->insert_id();
				} else {
					echo 99;
				}
			} else {
				echo 9;
			}
		} else {
			show_404();
		}
	}

	public function canIsendCode() 
	{
		$this->db->select('*');
		$this->db->select_max('id');
		$this->selectWhere = array(
			'phone' 	=>		$this->phone,
			'IP'		=>		$_SERVER['REMOTE_ADDR']
		);
		$data = $this->select()->result()[0];

		var_dump($data->date);
	}

	public function select() {
		$q = $this->db->get_where($this->table, $this->selectWhere);
		return $q;
	}

	public function codeValidation()
	{
		//$codeSuccess = $this->codeIsTrue($phone,'3418');
		if (5) { //$codeSuccess
			//$diff = $this->dateLimitReached($db_date, 60); 
			
			var_dump( $this->thisID );
		}

	}

	public function codeIsTrue($phone,$code)
	{
		$where = array(
			'phone'		=>		$phone,
			'code'		=>		$code,
			'status'	=> 		0,
			'IP'		=>		$_SERVER['REMOTE_ADDR']
		);
		$q = $this->db->get_where($this->table, $where);
		$res = $q->result();
		return $res;
	}

	public function n_digit_random($digits) {
		return rand(pow(10, $digits - 1) - 1, pow(10, $digits) - 1);
	}

	public function isGeoPhoneNum() {
		return (strlen($this->phone) == 9 && $this->phone[0] == 5);
	}

	public function send_msg($phone,$sender,$content)
	{
		$url = "http://smsoffice.ge/api/send.aspx?key=92f8f657cd3e46eb94157999366e958c&destination=$phone&sender=$sender&content=$content";
		$response = file_get_contents($url);
		return $response;

	}

}