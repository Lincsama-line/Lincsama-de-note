<?php
$dbhost = 'localhost:3306';  // mysql服务器主机地址
$dbuser = 'ctfsql';            // mysql用户名
$dbpass = '123';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('连接失败: ' . mysqli_error($conn));
}
echo '连接成功<br />';
$sql = "CREATE TABLE `sqltest`( ".
        "`id` INT NOT NULL AUTO_INCREMENT, ".
        "`password` VARCHAR(100) NOT NULL, ".
        "`usename` VARCHAR(40) NOT NULL, ".
        "`submission_date` DATE, ".
        "PRIMARY KEY (`id`))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_select_db( $conn, 'sqlinject2' );
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
    die('数据表创建失败: ' . mysqli_error($conn));
}
echo "数据表创建成功\n";
mysqli_close($conn);
?>

<!-- //create table test(
   tutorial_id INT NOT NULL AUTO_INCREMENT,
   tutorial_title VARCHAR(100) NOT NULL,
   tutorial_author VARCHAR(40) NOT NULL,
   submission_date DATE,
   PRIMARY KEY ( tutorial_id )
); -->