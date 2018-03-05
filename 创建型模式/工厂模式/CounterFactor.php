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
//减法类
class OperationSub extends Operation{
	public function getVal($i,$j){
		return $i-$j;
	}
}

//计数器工厂
class CounterFactor {
	private static $operation;
	//工厂生产特定类对象方法
	static function createOperation(string $operation){
		switch($operation){
			case '+' : self::$operation = new OperationAdd;
				break;
			case '-' : self::$operation = new OperationSub;
				break;
		}
	    return self::$operation;
	}
}

$counter = CounterFactor::createOperation('+');
echo $counter->getVal(1,2);