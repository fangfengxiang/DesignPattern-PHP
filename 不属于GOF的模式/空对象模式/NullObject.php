<?php 
//������
class Person{
	public function code(){
		echo 'code makes me happy'.PHP_EOL;
	} 
}
//�ն���ģʽ
class NullObject{
	public  function __call($method,$arg){
		echo 'this is NullObject';
	}
}

//����һ�����ɶ�������ֻ��PHPer���������ɶ���
function getPerson($name){
	if($name=='PHPer'){
		return new Person;
	}else{
		return new NullObject;
	}
}

$phper = getPerson('PHer');
$phper->code();
