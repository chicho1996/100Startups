<?php

session_start();
echo realpath(__DIR__.'/../assets/uploads/');
//die();

	$check_isIMG = getimagesize($_FILES["file"]["tmp_name"]);
	if ( $check_isIMG )
	{
		$target_dir = realpath(__DIR__.'/../assets/uploads/').'/';
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

			$d = compress($target_file, $target_file, 50);
					
					$_SESSION['file'] = basename($target_file);
       		echo $target_file;

       	} else {
       		echo 2;
       	}

	} else {
		echo 1;
	}


function compress($source, $destination, $quality) { 
	$info = getimagesize($source); 
	if ($info['mime'] == 'image/jpeg') 
		$image = imagecreatefromjpeg($source); 
	elseif ($info['mime'] == 'image/gif') 
		$image = imagecreatefromgif($source); 
	elseif ($info['mime'] == 'image/png') 
		$image = imagecreatefrompng($source); 

	imagejpeg($image, $destination, $quality); 
	return $destination; 
}
