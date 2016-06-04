<?php 

if  ( empty($_GET) ){
	include ('include/MainBlog.php');
}
else 
{
	if(isset($_GET['projectinfo']))
		include ('include/ProjectInfo.php');
	if(isset($_GET['startuplist']))
		include ('include/StartupList.php');
}


 ?>