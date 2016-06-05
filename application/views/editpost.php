<?php

$row=$this->db->get_where('posts',array('id'=>$_GET['id']))->row();
$this->session->set_userdata('id',$_GET['id']);
 ?>
 <form action="<?php echo base_url().'/blog/editpost'?>" method="post" enctype="multipart/form-data">
<p>title:</p>
<input type="text" name="title" value="<?php if(isset($_POST['sumbit'])){
	set_value('title');
	} else{
		echo $row->title;
		} ?>" name="title">
<p>text:</p>
<textarea name="text"><?php if(isset($_POST['sumbit'])){
	set_value('text');
	} else{
		echo $row->text;
		} ?></textarea>
<p>Image:</p>
<?php $_SESSION['image']=$row->image; ?>
<img src="<?php echo base_url()."uploads/posts/$row->image"; ?>" width="200px" heigth="200px">
<input type="file" name="image">
<p><input type="submit" value="რედაქტირება" name="submit"></p>
</form>
