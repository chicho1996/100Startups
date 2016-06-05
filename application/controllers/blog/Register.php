<?php
class Register extends CI_Controller{

	public function index(){
		if($this->session->userdata('email')!=''){
			redirect(base_url().'blog');}else{
		//validation
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
						"password"=>array(
				"field"=>"password",
				"label"=>"პაროლი",
				"rules"=>"required|min_length[6]|max_length[20]"

				),
						"repassword"=>array(
				"field"=>"repassword",
				"label"=>"განმეორებული პაროლი",
				"rules"=>"required|matches[password]"

				),
						"idnum"=>array(
				"field"=>"idnum",
				"label"=>"პირადი ნომერი",
				"rules"=>"required|exact_length[11]|callback_idnum_is_taken"

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
				"rules"=>"required|valid_email|callback_email_is_taken"

				),
						"mobile"=>array(
				"field"=>"mobile",
				"label"=>"მობილურის ნომერი",
				"rules"=>"required|exact_length[9]|callback_mobile_is_taken"

				)
			);
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required','ველი "%s" ცარიელია');
		$this->form_validation->set_message('valid_email','ელ-ფოსტის ფორმატი არასწორია');
		$this->form_validation->set_message('numeric','ველი "%s" შეიცავს აკრძალულ სიმბოლოებს ');
		$this->form_validation->set_message('exact_length','"%s" არ შეიცავს %s სიმბოლოს');
		$this->form_validation->set_message('min_length','"%s" უნდა შეიცავდეს არანაკლებ %s სიმბოლოს');
		$this->form_validation->set_message('max_length','"%s" უნდა შეიცავდეს მაქსიმუმ %s სიმბოლოს');
		$this->form_validation->set_message('matches','"%s" არ ემთხვევა "პაროლს"');


		if($this->form_validation->run()!=true){

			$this->load->view("main");
		}else{
			$form=array();
			$form['firstname']=$this->pro($this->input->post('firstname'));
			$form['lastname']=$this->pro($this->input->post('lastname'));
			$form['password']=md5($this->input->post('password'));
			$form['idnum']=$this->pro($this->input->post('idnum'));
			$form['uni']=$this->pro($this->input->post('uni'));
			$form['prof']=$this->pro($this->input->post('prof'));
			$form['databirth']=$this->pro($this->input->post('databirth'));
			$form['email']=$this->pro($this->input->post('mail'));
			$form['mobile']=$this->pro($this->input->post('mobile'));
			
			$image_name=$_FILES['avatar']['name'];
			$image_tmp=$_FILES['avatar']['tmp_name'];
			$form['avatar']=time().$image_name;
			move_uploaded_file($image_tmp,"uploads/users/".$form['avatar']);
			if($this->create_user($form['firstname'],$form['lastname'],$form['password'],$form['idnum'],$form['uni'],$form['prof'],$form['databirth'],$form['email'],$form['mobile'],$form['avatar'])==true){
				echo "registration succsesfull";
			}
		}
	}

}
	public function idnum_is_taken($input){
		$query="SELECT * FROM `blog_users` WHERE `idnum`=?";
		$arg=array($input);
		$exect=$this->db->query($query,$arg) or die(mysql_error());
		if($exect->num_rows()>0){
			$this->set_message('პირადი ნომერი "$input" უკვე დაკავებულია გთხოვთ ცადოთ სხვა');
			return false;
		}else{
			return true;
		}
	}
	public function mobile_is_taken($input){
		$query="SELECT * FROM `blog_users` WHERE `mobile`=?";
		$arg=array($input);

		/*$where = array(
			'mobile'	=>	$input
		);
		$this->db->get_where('users', $where);*/

		$exect=$this->db->query($query,$arg) or die(mysql_error());
		if($exect->num_rows()>0){
			$this->form_validation->set_message('მობილურის ნომერი "$input" უკვე დაკავებულია გთხოვთ ცადოთ სხვა');
			return false;
		}else{
			return true;
		}

	}
	public function email_is_taken($input){
		$query="SELECT * FROM `blog_users` WHERE `email`=?";
		$arg=array($input);
		$exect=$this->db->query($query,$arg) or die(mysql_error());
		if($exect->num_rows()>0){
			$this->form_validation->set_message('email_is_taken','ელ-ფოსტა "$input" უკვე დაკავებულია გთხოვთ ცადოთ სხვა');
			return false;
		}else{
			return true;
		}
	}
	public function create_user($name,$surname,$password,$idnum,$uni,$prof,$databirth,$email,$mobile,$avatar){
		$query="INSERT INTO `blog_users` (`name`,`surname`,`password`,`idnum`,`uni_id`,`prof`,`birthdate`,`email`,`mobile`,`avatar`) VALUES(?,?,?,?,?,?,?,?,?,?)";
		$arg=array($name,$surname,$password,$idnum,$uni,$prof,$databirth,$email,$mobile,$avatar);
		if($this->db->query($query,$arg)==true){
			return true;
	}else{
		return false;
	}
}
public function pro($str){
	return strip_tags($str);
}

}

?>