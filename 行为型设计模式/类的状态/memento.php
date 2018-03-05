<?php
//发起人，所需备份者
class Originator{
	//内部状态
	private $state;
	//设置状态
	public function setState($state){
		$this->state = $state ;
	}
	//查看状态
	public function getState(){
		echo $this->state,PHP_EOL;
	}
	//创建一个备份录
	public function createMemento(){
		return new Memento($this->state);
	}
	//恢复一个备份
	public function restoreMemento(Memento $memento){
		$this->state = $memento->getState();
	}
}
//备忘录角色
class Memento{
	private $state; //用于存放发起人备份时的状态
	public function __construct($state){
		$this->state = $state;
	}
	public function getState(){
		return $this->state;
	}
}
//备忘录管理者
class Caretaker{
	private $menento;
	//存档备忘录
	public function setMemento(Memento $memento){
		$this->memento = $memento;
	}
	//取出备忘录
	public function getMemento(){
		return $this->memento;
	}
}

//实例化发起人 假如是个游戏角色
$role = new Originator;
//设置状态 满血
$role->setState('满血');
//备份
//创建备份录管理者
$caretaker = new Caretaker;
//创建备份
$caretaker->setMemento($role->createMemento());
//状态更改
$role->setState('死亡');
$role->getState();
//恢复备份
$role->restoreMemento($caretaker->getMemento());
//重新查看状态
$role->getState();