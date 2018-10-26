<?php
//添加sql的数据

$sqldatas=getParam('sqldatas');//这里的sqldatas是从前台传过来的json字符串

//将json字符串转为json对象 some like this {"name":"jobs"}

$sqldata=json_decode($sqldatas,true);

//插入多个值的时候

$sql= "INSERT INTO tpent_yunwei_xxx(title,explains,picture,times,iswork)";

for($i=0;$i<count($sqldata);$i++){

   $sqldata[$i]=explode(',',$sqldata[$i]);

   //把以逗号间隔字符串分割为数组

   $title=$sqldata[$i][0];$explain=$sqldata[$i][1];$picture=$sqldata[$i][2];$time=$sqldata[$i][3]; $iswork=$sqldata[$i][4];

   //插入第一条数据的时候

   if($i<1){

　　 $sql.= "VALUES('$title','$explain','$picture','$time','$iswork')";

　　//插入两条以上

　}else if($i>=1){

　　$sql.= ",('$title','$explain','$picture','$time','$iswork')";

　}

}

$sql = iconv('utf-8', 'gbk//IGNORE',$sql);

$conn = MySqlConn();

$res=mysqli_query($conn,$sql);
?>