<?php
	$con = mysqli_connect("127.0.0.1","root","");
	if(!$con){
		var_dump("连接数据库失败");
	}else{
		var_dump("连接数据库成功");
	}
	mysqli_set_charset($con,"UTF8");
	mysqli_select_db($con,'mytest');
	//查询数据库
	$sql = "select * from test1";
	//插入数据
	$sql1 = "insert into test1 values (2,'162011834','陈坤洪',24)";
	$result = mysqli_query($con,$sql1);
	if(!$result)
	{
		echo "插入失败";
	}else{
		echo "插入成功";
	}
	// while($row = mysqli_fetch_array($result))
	// {
	// 	echo "姓名:".$row['id']." 学号：".$row['num']." 姓名：".$row['name']." 年龄：".$row['age'];
	// }
?>