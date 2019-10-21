<?php
namespace guangzhou\ta;
class Animal{
	public $obj="dog";
	static $name = "大黄";
}	
function getmsg(){
	echo "广州";
}

namespace dongguan\hu;
class Animal{
	public $obj = "pig";
	static $name = "小猪";
}
function getmsg(){
	echo "东莞";
}

use guangzhou\ta\Animal;
echo ta\getmsg();
echo getmsg();
$Animal = new ta\Animal;
echo $Animal->obj;
echo $Animal::$name;
echo Animal::$name;
?>