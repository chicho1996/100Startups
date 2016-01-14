<?php

include_once('db.php');

//$ajax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']);
//if ( !isset($_POST['getData']) || !$ajax) return false;

$id = get_user_id();
$code = get_code();

$input = $_POST['code'];


if ($input == $code) {
  update_column('verified', 1);
  echo '01';
} else {
  echo '-1';
}

function get_code() {
 
  global $id;
  
  $sql = "SELECT * FROM startups WHERE id ='$id'";
  $query = mysql_query($sql)or die(mysql_error());
  
  $data = mysql_fetch_assoc($query);
  return $data['code'];
  
}

function get_user_id()
{
  $sql = "SELECT * FROM startups ORDER BY id DESC LIMIT 1";
  $query = mysql_query($sql)or die(mysql_error());
  
  $data = mysql_fetch_assoc($query);
  return $data['id'];
}


function update_column($column,$value)
{
	global $id;
  mysql_query("UPDATE startups set $column='$value' WHERE id='$id'")or die(mysql_error());
}

