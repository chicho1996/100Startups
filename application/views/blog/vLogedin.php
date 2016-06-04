
<?php 
$mail=$this->session->userdata('email');
$row = $this->db->get_where('users', array('email' => $mail))->row();
echo $row->name;
 ?>
 <p>გამარჯობა <?php echo $row->name;?></p>
<li><a href="<?php echo base_url().'Edit_user'?>">Edit User</a></li>
<li><a href="<?php echo base_url().'AddPost'?>">Add Post</a></li>
<li><a href="<?php echo base_url().'Posts'?>">Posts</a></li>
<li><a href="<?php echo base_url().'Logout'?>">Log Out</a></li>
