<?php
$con = mysql_connect("localhost","root","root");
if (!$con){die('Could not connect: ' . mysql_error());}
mysql_select_db("test", $con);
$id = stripcslashes($_REQUEST[ 'id' ]);
$query  = "SELECT * FROM users WHERE id = $id ";
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