<?php
error_reporting(0);

function getIp(){
$ip = '';
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
$ip = $_SERVER['REMOTE_ADDR'];
}
$ip_arr = explode(',', $ip);
return $ip_arr[0];
}
$host="localhost";
$user="ctfsql";
$pass="123";
$db="sqlinject";

$connect = mysql_connect($host, $user, $pass) or die("Unable to connect");

mysql_select_db($db) or die("Unable to select database");

$ip = getIp();
echo 'your ip is :'.$ip;

$sql="insert into client_ip (ip) values ('$ip')";
'1'+(select case when (substring((select database()) from {0} for {1} )='s') then sleep(4) else 1 end ) and '1'='1'
// INSERT INTO table_name
// VALUES (value1, value2,....)
mysql_query($sql);

?>
