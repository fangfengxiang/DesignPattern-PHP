<?php
//����Ԫ��
abstract class Element{
	//����ҵ���߼�
	abstract public function doSomething();
	//������Щ������
	abstract public function accept(Visitor $visitor);
}
//����Ԫ��
class ConcreteElement extends Element{
	public function doSomething(){
		
	}
	public function accept(Visitor $visitor){
		$visitor->vistor($this);
	}
}