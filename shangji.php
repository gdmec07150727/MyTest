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
	$result = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($result)){
		echo $row['ren'].":".$row['salary']."<br>";
	}
}
staff()
?>