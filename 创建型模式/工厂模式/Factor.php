<?php
//������
class Factor{	
	//���ɶ��󷽷�
	static function createDB(){
		echo '��������һ��DBʵ��';
		return new DB;
	}
}

//������
class DB{
	public function __construct(){
		echo __CLASS__.PHP_EOL;
	}
}

$db=Factor::createDB();