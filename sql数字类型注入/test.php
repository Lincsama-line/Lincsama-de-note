<?php
function hexToStr($hex)//十六进制转字符串
{   
$string=""; 
for($i=0;$i<strlen($hex)-1;$i+=2)
$string.=chr(hexdec($hex[$i].$hex[$i+1]));
return  $string;
}
$test = $_REQUEST['p'];

if(strstr($test,'0x'))
{
    $test=str_replace('0x','',$test);

if(ctype_xdigit($test))
{
$test = hexToStr($test);
echo $test;
}

}
?>