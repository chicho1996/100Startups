<?php
$mail=$this->session->userdata("email");
$rows=$this->db->get_where('blog_users',array('email'=>$mail))->row();
$query="SELECT * FROM `posts` WHERE `user_id`='$rows->id'";
$posts=$this->db->query($query)->result();
foreach($posts as $post){
?>
<table border="1">
<td>
	<tr>
	<?php echo $post->title; ?>
	</tr>
	<tr>
	<?php echo $post->text; ?>
	</tr>
	<tr>
	<?php echo $post->image ?>
	</tr>
	<tr><a href="<?php echo base_url()."blog/editpost/?id=$post->id";?>">Edit Post</a></tr>
	<tr><a href="<?php echo base_url()."blog/deletepost/?id=$post->id";?>">Delete</a></tr>
	</td>


</table>
<?php
}
?>