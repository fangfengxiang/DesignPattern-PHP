<?php
//工厂类
class Factor{	
	//生成对象方法
	static function createDB(){
		echo '我生产了一个DB实例';
		return new DB;
	}
}

//数据类
class DB{
	public function __construct(){
		echo __CLASS__.PHP_EOL;
	}
}

$db=Factor::createDB();