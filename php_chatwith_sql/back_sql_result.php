[@test01 model]# php test.php 
Array 
( 
 [name] => hellokitty 
 [addr] => i dont kno 
) 
[@test01 model]# more test.php 
<?php 
 $link=mysql_connect("10.12.136.181","hello","hello"); 
 if(!$link) 
  echo "没有连接成功!"; 
 mysql_select_db("hhhhh", $link); 
 $q = "SELECT * FROM hello"; 
 mysql_query("SET NAMES GB2312"); 
 $rs = mysql_query($q); 
 if(!$rs) 
 { 
  die("Valid result!"); 
 } 
 $result=mysql_fetch_array($rs,MYSQL_ASSOC); 
 print_r($result); 
 mysql_free_result($rs); 
?>

[@test01 model]# more test.php 
<?php 
 $link=mysql_connect("10.12.136.181","hello","hello"); 
 if(!$link) 
  echo "没有连接成功!"; 
 mysql_select_db("hhhhh", $link); 
 $q = "SELECT * FROM hello"; 
 mysql_query("SET NAMES GB2312"); 
 $rs = mysql_query($q); 
 if(!$rs) 
 { 
  die("Valid result!"); 
 } 
 $result=mysql_fetch_array($rs,MYSQL_ASSOC); 
//  MYSQL_ASSOC是只能用关联索引，MYSQL_NUM只能用数字索引，MYSQL_BOTH数字、关联都是可以的。（ps：这里不知道用索引合不合适，其实也就是数组的KEY了）
 print_r($result); 
 mysql_free_result($rs); 
?> 
[@test01 model]# vim test.php 
[@test01 model]# php test.php 
Array 
( 
 [0] => hellokitty 
 [name] => hellokitty 
 [1] => i dont kno 
 [addr] => i dont kno 
) 
[@test01 model]#


[@test01 model]# php test.php 
Array 
( 
 [0] => hellokitty 
 [1] => i dont kno 
) 
[@test01 model]# more test.php 
<?php 
 $link=mysql_connect("10.12.136.181","hello","hello"); 
 if(!$link) 
  echo "没有连接成功!"; 
 mysql_select_db("hhhhh", $link); 
 $q = "SELECT * FROM hello"; 
 mysql_query("SET NAMES GB2312"); 
 $rs = mysql_query($q); 
 if(!$rs) 
 { 
  die("Valid result!"); 
 } 
 $result=mysql_fetch_array($rs,MYSQL_NUM); 
 print_r($result); 
 mysql_free_result($rs); 
?> 
[@test01 model]#

<?php 
 $conn=mysql_connect("localhost","root",""); 
 $select=mysql_select_db("books",$conn); 
  $query="insert into computers(name,price,publish_data) "; 
 $query.="values('JSP',28.00,'2008-11-1')"; 
 $query="select * from computers"; 
 $result=mysql_query($query); 
  //以下是使用mysql_result()函数来获取到查询结果 
 $num=mysql_num_rows($result); 
 for($rows_count=0;$rows_count<$num;$rows_count++){ 
 echo "书名：".mysql_result($result,$rows_count,"name"); 
 echo "价格：".mysql_result($result,$rows_count,"price"); 
 echo "出版日期：".mysql_result($result,$rows_count,"publish_data")."<br>"; 
 } 
  //以下是使用mysql_fetch_row()函数来获取到查询结果 
  while($row=mysql_fetch_row($result)) 
 { 
 echo "书号：".$row[0]."<br>"; 
 echo "书名：".$row[1]."<br>"; 
 echo "价格：".$row[2]."<br>"; 
 echo "出版日期：".$row[3]."<br>"; 
 echo "<br>"; 
 } 
 //以下是使用mysql_fetch_array()函数来获取到查询结果 
 while($row=mysql_fetch_array($result)) 
 { 
 echo "书号：".$row[0]."<br>"; 
 echo "书名：".$row[1]."<br>"; 
 echo "价格：".$row["price"]."<br>"; 
 echo "出版日期：".$row["publish_data"]."<br>"; 
 echo "<br>"; 
 }
 
//mysql_fetch_assoc()同mysql_fetch_array($result,MYSQL_ASSOC)一样
 
while($row = mysql_fetch_assoc($res)){
 
 echo $row['price'].'::'.$row['publish_data'].”;
} //$row[0]不能取值
 
 //以下是使用mysql_fetch_object()函数来获取到查询结果 
 while($row=mysql_fetch_object($result)) 
 { 
 echo "书号：".$row->id."<br>"; 
 echo "书名：".$row->name."<br>"; 
 echo "价格：".$row->price."<br>"; 
 echo "出版日期：".$row->publish_data."<br>"; 
 echo "<br>";  
 } 
?>
