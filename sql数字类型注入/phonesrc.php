<?php
function hexToStr($hex)//十六进制转字符串
{   
$string=""; 
for($i=0;$i<strlen($hex)-1;$i+=2)
$string.=chr(hexdec($hex[$i].$hex[$i+1]));
return  $string;
}

$con = mysql_connect("localhost","ctfsql","123");
if (!$con){die('Could not connect: ' . mysql_error());}
mysql_select_db("phonenum", $con);
$phone = $_REQUEST['phone'];

// 判断是否为数字以及16
if(!is_numeric($phone)){   
    die("phone must be nums");
}
if(strstr($test,'0x'))
{
    $test=str_replace('0x','',$test);

if(ctype_xdigit($test))
{
$test = hexToStr($test);
echo $test;
}
//php端处理16进制数据
$query = "select count(*) from user_phone where phone = $phone";
echo $query;
$result = mysql_query($query) or die ('<pre>'.mysql_error().'</pre>');

$num = mysql_numrows( $result ); 
$i   = 0; 
while( $i < $num ) { 
    // Get values 
    $number = mysql_result( $result, $i, "count(*)" );  
    // Feedback for end user 
    echo "<br/>the same phonenum people with yours : {$number}<br />"; 
    // Increase loop count 
    $i++; 
} 

mysql_close($con)
?>
