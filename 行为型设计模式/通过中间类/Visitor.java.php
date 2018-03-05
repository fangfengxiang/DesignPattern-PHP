<?php
//抽象元素
abstract class Element{
	//定义业务逻辑
	abstract public function doSomething();
	//允许哪些访问者
	abstract public function accept(Visitor $visitor);
}
//具体元素
class ConcreteElement extends Element{
	public function doSomething(){
		
	}
	public function accept(Visitor $visitor){
		$visitor->vistor($this);
	}
}