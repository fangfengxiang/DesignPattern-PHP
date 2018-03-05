<?php 
//测试类
class Person{
	public function code(){
		echo 'code makes me happy'.PHP_EOL;
	} 
}
//空对象模式
class NullObject{
	public  function __call($method,$arg){
		echo 'this is NullObject';
	}
}

//定义一个生成对象函数，只有PHPer才允许生成对象
function getPerson($name){
	if($name=='PHPer'){
		return new Person;
	}else{
		return new NullObject;
	}
}

$phper = getPerson('PHer');
$phper->code();
