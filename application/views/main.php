<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
</head>
<body>
<heder><h1>Hello World</h1></heder>

<nav><li><a href="<?php echo base_url().'blog/register'; ?>">Registration</a></li>
<li><a href="<?php echo base_url().'blog/login'; ?>">Log In</a></li>
<?php
	if($this->session->userdata('email')!=''){
?>
<li><a href="<?php echo base_url().'blog/logedin'; ?>">My Account</a></li>	
<?php

				}
 ?>


</nav>
<div>
	<?php 
	$b=explode('/',uri_string());
	print_r($b);
	if(isset($b[1])){

	$this->load->view($b[1]);
}
?>
</div>
<footer></footer>

</body>
</html>