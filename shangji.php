<?php
//输出时间差
function datacha()
{
	$begin = strtotime('2019-11-16');
	$end = strtotime('2019-12-10');
	echo ($end-$begin)/(24*3600);
}

//转换字符，例如：open_door变成OpenDoor
function change()
{
	$str = "open_door_my";
	$a = explode("_",$str);
	for($i=0;$i<count($a);$i++)
	{
		$a[$i] = ucfirst($a[$i]);
	}
	$str = implode("",$a);
	echo $str;
}

//冒泡排序
function mao()
{
	$str = array(4,5,1,3,2,9,7,8,6);
	for($i=0;$i<count($str);$i++)
	{
		for($j=$i+1;$j<count($str);$j++)
		{
			if($str[$i]<$str[$j])
			{
				$tem = $str[$i];
				$str[$i] = $str[$j];
				$str[$j] = $tem;
			}
		}
	}

	var_dump($str);
}

//反转字符串
function fan()
{
	$str = "Fred-Lin";
	echo strrev($str);
}

//验证邮箱，正则表达式
function email(){
	$str = "928611403@qq.com";
	$str1 ="asda";
	//$pregEmail = "/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+([.a-zA-Z0-9_-])+/"; 
	$pregEmail = "/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+\.([a-zA-Z0-9_-])+/";
	if(preg_match($pregEmail, $str)){
		echo "true";
	}else{
		echo "false";
	}
}

//读取文件
function filee(){
	$file=fopen("test.txt","r") or exit("无法打开文件!");
	while(!feof($file)){
		echo fgetc($file);
	}

	fclose($file);
}

//写入文件
function writee(){
	$file = fopen("test.txt","a");
	$str = "\nHungKing";
	fwrite($file, $str);
}

//获取图片路径（正则表达式）
function img(){
	$str = '<img width="100" src="1.gif" height="100">';
	preg_match_all('/<img.*?src="(.*?)".*?>/is',$str,$array);
	print_r($array);
}

//输出三角形星星
function star(){
	for($i=1;$i<6;$i++)
	{
		for($j=1;$j<=$i;$j++)
		{
			echo "*";
		}
		echo "<br>";
	}
}

//输出倒三角形星星
function star1(){
	for($i=6;$i>=0;$i--)
	{
		for($j=1;$j<=$i;$j++)
		{
			echo "*";
		}
		echo "<br>";
	}
}

//连接查询数据库
function shu(){
	$con = mysqli_connect("127.0.0.1","root","");
	mysqli_set_charset($con,"UTF8");
	mysqli_select_db($con,"nannan");

	$sql="select * from cate";
	$result = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($result))
	{
		echo $row['catename'];
	}
}

//mysql联表查询
function lian(){
	$con = mysqli_connect("127.0.0.1","root","");
	mysqli_set_charset($con,"UTF8");
	mysqli_select_db($con,"nannan");

	$sql = "select * from article,cate where article.cate_id=cate.id";
	$result = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($result)){
		echo $row['catename']."-".$row['username']."<br>";
	}
}

//group by 的使用
function staff(){
	$con = mysqli_connect("127.0.0.1","root","");
	mysqli_set_charset($con,"UTF8");
	mysqli_select_db($con,"mytest");

	//查询部门的总工资
	//$sql = "select dept,sum(salary) as total from staff group by dept";
	//查询各部门的最高工资
	//$sql = "select dept,max(salary) as maxsa from staff group by dept";
	//统计各部门人数
	//$sql = "select dept,count(*) as cc from staff group by dept";
	//寻找部门人数>2的部门
	//$sql = "select dept from staff group by dept having count(*)>2";
	//寻找平均工资>3000的部门
	//$sql = "select dept,avg(salary) as av from staff group by dept having avg(salary)>3000";
	//联表查询
	//$sql = "select devolo.id,staff.dept,staff.salary from devolo,staff where devolo.dept=staff.dept";
	
	$result = mysqli_query($con,$sql);
	// if (!$result) {
	//     printf("Error: %s\n", mysqli_error($con));
	//     exit();
	// }
	while($row=mysqli_fetch_array($result)){
		echo $row['id'].":".$row['dept'].":".$row['salary']."<br>";
	}
}

//猴子选大王
function monkeyKing($n, $m) {
        $monkeys = range(1, $n);
        $i = 0;                // 取出时候的坐标
        $z = 0;                // 数到M的时候停
        while(($mNum = count($monkeys)) > 1) {
                if($i == $mNum) {
                        $i = 0;                // 圈
                }
                $z++;
                $i++;
                if($z == $m) {
                        array_splice($monkeys, --$i, 1);
                        $z = 0;                // 归零
                }
        }
        echo $monkeys[0];
}

//搜索hello world中的字母o，把字母o替换成字母n。使用字符串查找函数strpos()
function cha(){
	$str = "hello world";
	while(true){
		$pos = strpos($str,'o');
		if($pos!=false){
			$str[$pos] = 'n';
		}else{
			break;
		}
	}
	echo $str;
}

//将 1234567890 转换为 1,234,567,890 每3位用逗号隔开的形式。
function three(){
	$str = '1234567890';
	$str = strrev($str);
	$str = chunk_split($str,3,',');
	$str = rtrim($str,',');
	$str = strrev($str);
	echo $str;
}

//请写一段PHP代码，确保多个进程同时写入同一个文件成功。
function writ(){

	$fp = fopen('test.txt','w+');
	if (flock($fp, LOCK_EX)) {
	    //获得写锁，写数据
	    fwrite($fp, 'write something!');
	    //解除锁定
	    flock($fp, LOCK_UN);
	} else {
	    echo 'file is locking...';
	}
	fclose($fp);

}

//有1、2、3、4个数字，能组成多少个互不相同且无重复数字的三位数？都是多少？
function four(){
	$num = 0;
	for($i=1;$i<=4;$i++)
	{
		for($j=1;$j<=4;$j++)
		{
			for($h=1;$h<=4;$h++)
			{
				if($i!=$j&&$i!=$h&&$j!=$h)
				{
					echo $i*100+$j*10+$h;
					echo "<br>";
					$num = $num + 1;
				}
			}
		}
	}
	echo $num."个结果";
}

//leetcode算法题->两数
class Solution{
	function ssddd($nums,$target){
		for($i=0;$i<count($nums);$i++)
		{
			for($j=$i+1;$j<count($nums);$j++)
			{
				if($nums[$i]+$nums[$j]==$target)
				{
					echo $i.$j;
					break;
				}
			}
		}
	}
}
$ss = new Solution();
$str = array(2,7,11,15);
$target = 9;
//$ss->ssddd($str,$target);
//



?>