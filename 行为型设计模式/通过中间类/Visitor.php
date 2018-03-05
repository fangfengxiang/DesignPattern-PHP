<?php
//具体元素
class Superman{
	public $name;
	public function doSomething(){
		echo '我是超人，我会飞'.PHP_EOL;
	}
	public function accept(Visitor $visitor){
		$visitor->doSomething($this);
	}
}
//具体访问者
class Visitor{
	public function doSomething($object){
		echo '我可以返老还童到'.$object->age = 18;
	}
}
//实例化具体对象
$man = new Superman;
//使用自己的能力
$man->doSomething();
//通过添加访问者，把访问者能能力扩展成自己的
$man->accept(new Visitor);