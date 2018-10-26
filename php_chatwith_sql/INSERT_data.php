
<?php
$dbhost = 'localhost:3306';  // mysql服务器主机地址
$dbuser = 'ctfsql';            // mysql用户名
$dbpass = '123456';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('连接失败: ' . mysqli_error($conn));
}
echo '连接成功<br />';
// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");
 
$val1 = '';
$val2 = 'RUNOOB.COM';
$val3 = '2018-09-14';
 
$sql = "INSERT INTO runoob_tbl ".
        "(id, username, password) ".
        "VALUES ".
        "('$runoob_title','$runoob_author','$submission_date')";
 
mysqli_select_db( $conn, 'RUNOOB' );
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
  die('无法插入数据: ' . mysqli_error($conn));
}
echo "数据插入成功\n";
mysqli_close($conn);
?>
