
<?php 
$mail=$this->session->userdata('email');
$row = $this->db->get_where('blog_users', array('email' => $mail))->row();
echo $row->name;
 ?>
 <p>გამარჯობა <?php echo $row->name;?></p>
<li><a href="<?php echo base_url().'blog/edit_user'?>">Edit User</a></li>
<li><a href="<?php echo base_url().'blog/addPost'?>">Add Post</a></li>
<li><a href="<?php echo base_url().'blog/posts'?>">Posts</a></li>
<li><a href="<?php echo base_url().'blog/logout'?>">Log Out</a></li>
