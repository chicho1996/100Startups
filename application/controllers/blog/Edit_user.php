<?php

class Edit_user extends CI_Controller{

	public function index(){
		if($this->session->userdata('email')==""){
			redirect('Main');
		}else{
$rules=array(
			"firstname"=>array(
				"field"=>"firstname",
				"label"=>"სახელი",
				"rules"=>"required|max_length[20]|min_length[2]"

				),
						"lastname"=>array(
				"field"=>"lastname",
				"label"=>"გვარი",
				"rules"=>"required|max_length[20]|min_length[2]"

				),
						"uni"=>array(
				"field"=>"uni",
				"label"=>"უნივერსიტეტი",
				"rules"=>"required"

				),
						"prof"=>array(
				"field"=>"prof",
				"label"=>"პროფესია",
				"rules"=>"required"

				),
						"databirth"=>array(
				"field"=>"databirth",
				"label"=>"დაბადების თარიღი",
				"rules"=>"required"

				),
						"mail"=>array(
				"field"=>"mail",
				"label"=>"ელ-ფოსტა",
				"rules"=>"required|valid_email|callback_emailo_is_taken"

				),
						"mobile"=>array(
				"field"=>"mobile",
				"label"=>"მობილურის ნომერი",
				"rules"=>"required|exact_length[9]"

				)
			);
$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required','ველი "%s" ცარიელია');
		$this->form_validation->set_message('valid_email','ელ-ფოსტის ფორმატი არასწორია');
		$this->form_validation->set_message('numeric','ველი "%s" შეიცავს აკრძალულ სიმბოლოებს ');
		$this->form_validation->set_message('exact_length','"%s" არ შეიცავს %s სიმბოლოს');
		$this->form_validation->set_message('min_length','"%s" უნდა შეიცავდეს არანაკლებ %s სიმბოლოს');
		$this->form_validation->set_message('max_length','"%s" უნდა შეიცავდეს მაქსიმუმ %s სიმბოლოს');
		if($this->form_validation->run()!=true){
			$this->load->view('main');
		}
		else{
			$mail=$this->session->userdata('email');
			$rows=$this->db->get_where('blog_users',array('email'=>$mail))->row();
						$image=$rows->avatar;
			if($_FILES['avatar']['name']!=''){
				$image=time().$_FILES['avatar']['name'];
				move_uploaded_file($_FILES['avatar']['tmp_name'],"uploads/users/$image");
			}
			$form=array('name'=>$this->input->post('firstname'),
			'surname'=>$this->input->post('lastname'),
			'uni_id'=>$this->input->post('uni'),
			'prof'=>$this->input->post('prof'),
			'birthdate'=>$this->input->post('databirth'),
			'email'=>$this->input->post('mail'),
			'mobile'=>$this->input->post('mobile'),
			'avatar'=>$image);

			$this->db->where('email',$mail);
			if($this->db->update('users',$form)){
				echo 'daredaqtirda';

			}
			else{
				echo 'ver moxerxda';
			}

	}
	}
}
	public function user_m ($mail){
		$query="SELECT * FROM `users` WHERE `email`='$mail'";
		$rows=$this->db->query($query)->row();
		return $rows->id;
	}
	public function emailo_is_taken($input){
		$query="SELECT * FROM `users` WHERE `email`='$input'";
		$show=$this->db->query($query);
		if($show->num_rows()==0){ 
			return true;
		}else{
			$rows=$show->row();
			$id=$this->user_m($input);
			if($rows->id==$id){
				return true;
			}
			else{
				$this->form_validation->set_message('emailo_is_taken',"ელფოსტა დაკავებულია");
				return false;
			}

		}
	}


}
?>