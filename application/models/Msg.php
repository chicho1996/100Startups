<?php

class Msg extends CI_Model {

	public $table = 'codes';

	private $phone = '';

	private $thisID = 0;

	private $selectWhere = array();

	private $secondLimit = 120;

	private $currentID = 0;

	private $tempCode = '';

	public function dateLimitReached($db_date, $secLimit) {
		$format = 'Y-m-d H:i:s';
		$current = date($format);
		$limit = date( $format, strtotime("+$secLimit seconds", strtotime($db_date)) );
		$diff = strtotime($current) - strtotime($limit);
		//var_dump($diff, $diff < 0, $diff >= -$secLimit);
		if ($diff < 0 && $diff >= -$secLimit) return false;
		return true;
	}

	public function send() {
		$this->phone = isset($_POST['phone']) ? $_POST['phone'] : '';
		//$this->phone = '551721521'; ///
		$code = $this->n_digit_random(4);
		//$sent = $this->send_msg($phone,'100startups', (String)($code) );
		
		$this->registration->table = $this->table;
		$this->registration->insertData = array(
			'phone'		=>		$this->phone,
			'code'		=>		$code,
			'IP'		=>		$_SERVER['REMOTE_ADDR']
		);

		if (count($_POST)) {
			if ( $this->isGeoPhoneNum() ) {

				if ($this->canIsendCode()) {
					//$sent = $this->send_msg($this->phone,'100startups',$code);
					$sent = '01';
					if ($sent == '01') {
						$this->registration->insert();
						echo 0;
					} else {
						echo 404;
					}
				} else {
					echo 503;
				}

			} else {
				echo 9;
			}
		} else {
			show_404();
		}
	}

	public function checkCode() {
		/*
		$this->phone = 551721521;
		$this->tempCode = 5555;
		$this->secondLimit = 55550;
		*/

		if (!count($_POST)) show_404();

		$this->phone = isset($_POST['phone']) ? $_POST['phone'] : '';
		$this->tempCode = isset($_POST['code']) ? $_POST['code'] : '';

		$this->db->select('id,code');
		$this->db->select_max('date');
		$this->selectWhere = array(
			'phone' 	=>		$this->phone,
			'code' 		=>		$this->tempCode,
			'IP'		=>		$_SERVER['REMOTE_ADDR'],
			'status'	=>		0
		);
		$data = $this->select()->row();

		$limitDate = $this->dateLimitReached($data->date, $this->secondLimit);
 
		if (!$limitDate) {
			$this->registration->table = $this->table;
			$this->registration->updateData = array('status' 	=>	1);
			$this->registration->updateWhere = array('id'		=>	$data->id);
			$this->registration->update();
			echo 0;
		} else {
			echo 1;
		}
	}

	public function canIsendCode() 
	{
		//$this->db->select('*');
		$this->db->select_max('date');
		$this->selectWhere = array(
			'phone' 	=>		$this->phone,
			'IP'		=>		$_SERVER['REMOTE_ADDR'],
			'status'	=>		0
		);
		$data = $this->select()->row();

		if (!isset($data->date)) return true;
		$limitDate = $this->dateLimitReached($data->date, $this->secondLimit);
 

		return $limitDate;
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
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

}