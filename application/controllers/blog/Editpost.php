<?php
class Editpost extends CI_Controller {
	public function index(){
		if($this->session->userdata('email')!=''){
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
		if($this->form_validation->run()){
			$row=$this->db->get_where('posts',array(
				"id"=>$this->session->userdata('id')
				))->row();
			$title=$this->pro($this->input->post('title'));
			$text=$this->pro($this->input->post('text'));
			$image=$row->image;
			
			if($_FILES['image']['name']!=''){
				unlink("uploads/posts/$image");
				$image=time().$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], "uploads/posts/$image");
			
		}
			$this->db->where('id',$this->session->userdata('id'));
			if($this->db->update('posts', array(
				'title'=>$this->pro($title),
				'text'=>$this->pro($text),
				'image'=>$image
						))){
				redirect('blog/posts');
			}
			else{
				echo "vera";
			}

		}else{
			$this->load->view('main');
		}
	}
	else{
		redirect('blog/login');
	}
	}
	public function pro($str){
	return strip_tags($str);
}

}