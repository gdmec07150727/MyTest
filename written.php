<?php

//打印前一天时间
echo date('Y年m月d日 H时i分s秒',strtotime('-1 day'));

//null与false相等
$stt1 = null;
$sss1 = false;
echo $stt1==$sss1?'相等':'不相等';

//空与0相等
$stt2 = '';
$sss2 = 0;
echo $stt2==$sss2?'相等':'不相等';

//0与字符串'0'相等,但是0==='0'是不等的。===是全等
$stt = "0";
$sss = 0;
echo $stt==$sss?'相等':'不相等';
echo $stt===$sss?'相等':'不相等';

echo 8%4;

//mysql怎么优化？
//1、建表优化（字段设置等等）
//2、查询优化，需要哪个字段用哪个字段
//3、建立索引和使用事务
//4、使用join替换子查询

//写三个值最大的数
$a = 3;
$b = 4;
$c = 5;
echo $a>$b?($a>c?$a:$c):($b>$c?$b:$c);

//number_format()的使用,每三个数字用逗号隔开。
$num = 123456789;
echo number_format($num);

//获取文件内容
echo file_get_contents("test.php");

//不使用第三个变量，交换两个数的值
$a=3;
$b=4;
list($b,$a) = array($a,$b);
echo "<br>";
echo $a,$b;

//获取客户端的IP地址
echo "<br>".$_SERVER['REMOTE_ADDR'];
//获取服务端的ip地址
echo "<br>".$_SERVER['SERVER_ADDR'];

//调用函数
class demo{
public $l = 26;
public $r = 1993;
public function sum(){
return $this->l+$this->r;
}
}
$a = new demo();
//访问单独的变量
echo $a->l;
echo $a->r;
//访问函数，返回和
echo $a->sum();


//反序输出
echo '<br>';
$a = '1234567890';
for($i=9;$i>=0;$i--)
{
	echo $a[$i];
}

echo file_get_contents('http://www.phpres.com/index.html');

?>