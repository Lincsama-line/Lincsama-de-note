<?php
这种技巧适用于关键字阻塞过滤器不聪明的时候，我们可以变换关键字字符串中字符的大小写来避开过滤，因为使用不区分大小写的方式处理SQL关键字。
例如：（下面的代码就是一个简单的关键字阻塞过滤器）

 

复制代码
function waf($id1){
    if(strstr($id1,'union')){
        echo 'error:lllegal input';
        return;
    }
    return $id1;
}
?>

<?php
/**
 * Created by PhpStorm.
 * User: Ollydebug
 * Date: 2015/11/15
 * Time: 15:20
 */
 
/*
 * U-懒惰匹配
 * i-忽略英文字母大小写
 * x-忽略空白
 * s-让元字符' . '匹配包括换行符内所有字符
 */
 
$pattern = '/GoOgle.+123/Ui';
$subject = 'I love google__123123123123123123';
 
$matches = array();
preg_match($pattern,$subject,$matches);
 
show($matches);
 
function show($var){
    if(empty($var)){
        echo 'null';
    }elseif(is_array($var)||is_object($var)){
        // array,object
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }else{
        //string,int,float
        echo $var;
    }
}
 
 
?>
