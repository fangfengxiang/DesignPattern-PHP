<?php 
//抽象享元对象
abstract class Flyweight{
	//考点
	public $address;
	//享元角色必修设置考点
	public function __construct($address){
		$this->address = $address;
	}
}
//具体享元角色  考生类
class ConcreteFlyweight extends Flyweight{
	//报考动作
	public function register(){
		echo "我的报考点是:{$this->address}".PHP_EOL;
	}
	//退出
	public function quit(){
		unset($this);
	}
}
//享元工厂 缓冲池
class FlyweightFactor{
	static private $students = array();
	static public function getStudent($address){
		$students =self::$students;
		//判断该键值是否存在
		if(array_key_exists($address,$students)){
			echo "缓冲池有考点为{$address}，从池中直接取".PHP_EOL;	
		}else{
			echo "缓冲池没有，创建了考点为{$address}的对象并放到池中".PHP_EOL;
			self::$students[$address] = new ConcreteFlyweight($address);
		}
		return self::$students[$address];
	}
}

//实例化学生对象
$student_1 = FlyweightFactor::getStudent('广州');
//报考 
$student_1 ->register();
// 退出
$student_1->quit();
//第二个学生进来
$student_2 = FlyweightFactor::getStudent('东莞');
//报考 
$student_2 ->register();
// 退出
$student_2->quit();
//第三个学生进来
$student_3 = FlyweightFactor::getStudent('广州');
//报考 
$student_3 ->register();
// 退出
$student_3->quit();