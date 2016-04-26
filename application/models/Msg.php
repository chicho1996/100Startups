<?php

class Msg extends CI_Model {

	public function send() {
		if (count($_POST)) {
			$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
			if ( $this->isGeoPhoneNum($phone) ) {
				$sent = $this->send_msg($phone,'100Startups','hello');
				if ($sent) {
					echo 1;
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

	public function isGeoPhoneNum($phone) {
		return (strlen($phone) == 9 && $phone[0] == 5);
	}

	public function send_msg($phone,$sender,$content)
	{
		$url = "http://smsoffice.ge/api/send.aspx?key=92f8f657cd3e46eb94157999366e958c&destination=$phone&sender=$sender&content=$content";
		$response = file_get_contents($url);
		return $response;

	}

}