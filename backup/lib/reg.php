<?php

include_once('db.php');

$ajax = true;

$sender = 'Startups';

//$ajax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'];
if ( !isset($_POST['getData']) || !$ajax) return false;

$phone = $_POST['phone'];
$data = json_decode( $_POST['getData'], true );

if (!isset($_SESSION['file']))
	$_SESSION['file'] = '';

$founder = ($_POST['found']);

$sql = "INSERT INTO startups (name,year,founder,city,members,industry,description,logo,capital,phone)
		VALUES('$data[name]','$data[year]','$founder','$data[city]',
		'$data[membersNum]','$data[industry]','$data[description]',
		'$_SESSION[file]','$data[capital]',$phone)";

									
mysql_query($sql)or die(mysql_error());


$id = mysql_insert_id();
$uniq = unique_digits();

send_msg($phone, 'hello');

echo $founder;
function send_msg($phone,$content)
{
	global $sender, $uniq;
	
	update_column('code', $uniq);
	
	$url = "http://smsoffice.ge/api/send.aspx?key=92f8f657cd3e46eb94157999366e958c&destination=$phone&sender=$sender&content=$uniq";
	
	
	

	$data = file_get_contents($url);
	//echo $url;
	//var_dump( $data, $url );
	
}

 

function unique_digits($digits=4) {
	  $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}


function update_column($column,$value)
{
	global $id;
	mysql_query("UPDATE startups set $column='$value' WHERE id=$id")or die(mysql_error());
}