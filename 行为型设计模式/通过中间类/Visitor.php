<?php
//����Ԫ��
class Superman{
	public $name;
	public function doSomething(){
		echo '���ǳ��ˣ��һ��'.PHP_EOL;
	}
	public function accept(Visitor $visitor){
		$visitor->doSomething($this);
	}
}
//���������
class Visitor{
	public function doSomething($object){
		echo '�ҿ��Է��ϻ�ͯ��'.$object->age = 18;
	}
}
//ʵ�����������
$man = new Superman;
//ʹ���Լ�������
$man->doSomething();
//ͨ����ӷ����ߣ��ѷ�������������չ���Լ���
$man->accept(new Visitor);