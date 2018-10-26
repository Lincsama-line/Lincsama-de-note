<?php
$flag ="this_is_flag"
$servername = "localhost";
$username = "root";
$password = "root";
$conn = mysqli_connect($servername, $username, $password);
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "连接成功";
$name =$_REQUEST['name'];
$password =$_REQUEST['password'];
if (!isset($name) ||  !isset($password))
{
    return;
}
//example 1
//$sql = "SELECT id, username, password FROM test.user where username = '$name'  and password ='$password' ;";
//example 2
$sql = "SELECT id, username, password FROM test.user where (username=('$name')) and  password='$password';";
echo $sql . '<br>';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo 'get succ ' . '<br>';
    echo 'this_is_flag';
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["username"]. " ;password " . $row["password"]. "<br>";
    }
} else {
    echo "0 结果";
}
mysqli_close($conn);
?>
