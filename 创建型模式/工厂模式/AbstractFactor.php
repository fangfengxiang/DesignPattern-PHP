<?php
//抽象运算类
abstract class Operation{
	abstract public function getVal($i,$j);//抽象方法不能包含方法体
}
//加法类
class OperationAdd extends Operation{
	public function getVal($i,$j){
		return $i+$j;
	}
} 
//乘法类
class OperationMul extends Operation{
	public function getVal($i,$j){
		return $i*$j;
	}
}
//抽象工厂类
abstract class Factor{
	abstract static function getInstance(); 
}
//加法器生产工厂
class AddFactor extends Factor {
	//工厂生产特定类对象方法
	static function getInstance(){
	    return new OperationAdd;
	}
}
//减法器生产工厂
class MulFactor extends Factor {
	static function getInstance(){
		return new OperationMul;
	}
}
//文本输入器生产工厂
class TextFactor extends Factor{
	static function getInstance(){}
}
$mul = MulFactor::getInstance();
echo $mul->getVal(1,2);