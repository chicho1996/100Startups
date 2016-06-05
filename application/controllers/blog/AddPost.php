<?php
class AddPost extends CI_Controller{
	public function index(){
		if($this->session->userdata('email')!=''){
			$mail=$this->session->userdata('email');
				$row=$this->db->get_where('blog_users',array('email'=>$mail))->row();
			$rules=array(
				"title"=>array(
					"field"=>'title',
					"label"=>'სათაური',
					"rules"=>'required'
					),
				"text"=>array(
					"field"=>'text',
					"label"=>'სტატიის ტექსტი',
					"rules"=>"required"
					),
				);
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('required','ველი %s ცარიელია,გთხოვთ შეავსოთ');
			if($this->form_validation->run()!=true){
				$this->load->view('main');
			}else{

				
				$title=$this->pro($this->input->post('title'));
				$text=$this->pro($_POST['text']);
				$image_name=$this->pro($_FILES['image']['name'].time());
				$image_tmp_name=$_FILES['image']['tmp_name'];
				$userid=$row->id;
			move_uploaded_file($image_tmp_name,"uploads/posts/".$image_name);

				if($this->add_post($title,$text,$image_name,$userid)){
					echo "daemata";
				}
				else{
					echo "ver daemata";
				}
			}




		}else{
			redirect("Login");
		}

	}
	public function chosen($input){
		if(isset($_POST['submit'])){
		if($_FILES['image']['name']==""){
			
			$this->form_validation->set_message('chose_image',"სურათი არ არის არჩეული");
			return false;
		}
		else{
			return true;
		}
	}
	}
	public function add_post($title,$text,$image_name,$userid){
		$query="INSERT INTO `posts` (`title`,`text`,`image`,`user_id`) VALUES ('$title','$text','$image_name','$userid')";
		if($this->db->query($query)){
			return true;
		}else{
			return false;
		}	
	}
	public function pro($str){
	return strip_tags($str);
}



}