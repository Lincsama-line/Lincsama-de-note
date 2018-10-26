<?php
$con = mysql_connect("localhost","root","root");
mysql_query("SET NAMES 'gbk'");
//导致数据库编码与网页编码不统一
mysql_select_db("test", $con);
$id = isset($_GET['id']) ? addslashes($_GET['id']) : 1;
$query  = "SELECT * FROM users WHERE id ='{$id}' ";
echo $query;
$result = mysql_query($query)or die('<pre>'.mysql_error().'</pre>');
while($row = mysql_fetch_array($result))
  {
  echo $row['0'] . " " . $row['1'];
  echo "<br />";
  }
echo "<br/>";
echo $query;
mysql_close($con);
?>