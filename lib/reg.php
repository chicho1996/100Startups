<?php

include_once('db.php');

if ( !isset($_POST['getData']) ) return false;

$data = json_decode( $_POST['getData'], true );

$founder = $data['founder']['firstname'] . $data['founder']['lastname'] . $data['founder']['age'];

$sql = "INSERT INTO startups (name,year,founder,city,members,industry,description,logo,capital,phone)
		VALUES('$data[name]','$data[year]','$founder',
			'$data[city]','$data[membersNum]','$data[industry]','$data[description]','$data[logo]','$data[capital]','$data[phone]')";

mysql_query($sql)or die(mysql_error());