<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
</head>
<body>
<heder><h1>Hello World</h1></heder>

<nav><li><a href="<?php echo base_url().'Register'; ?>">Registration</a></li>
<li><a href="<?php echo base_url().'Login'; ?>">Log In</a></li>
<?php
	if($this->session->userdata('email')!=''){
?>
<li><a href="<?php echo base_url().'Logedin'; ?>">My Account</a></li>	
<?php

				}
 ?>


</nav>
<div>
	<?php 
	$b=explode('/',uri_string());
	print_r($b);
	if(uri_string()!=''&& $b[1]!='index'){
	$this->load->view(uri_string());
}
?>
</div>
<footer></footer>

</body>
</html>