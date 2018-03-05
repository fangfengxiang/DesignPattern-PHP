<?php
//�����ˣ����豸����
class Originator{
	//�ڲ�״̬
	private $state;
	//����״̬
	public function setState($state){
		$this->state = $state ;
	}
	//�鿴״̬
	public function getState(){
		echo $this->state,PHP_EOL;
	}
	//����һ������¼
	public function createMemento(){
		return new Memento($this->state);
	}
	//�ָ�һ������
	public function restoreMemento(Memento $memento){
		$this->state = $memento->getState();
	}
}
//����¼��ɫ
class Memento{
	private $state; //���ڴ�ŷ����˱���ʱ��״̬
	public function __construct($state){
		$this->state = $state;
	}
	public function getState(){
		return $this->state;
	}
}
//����¼������
class Caretaker{
	private $menento;
	//�浵����¼
	public function setMemento(Memento $memento){
		$this->memento = $memento;
	}
	//ȡ������¼
	public function getMemento(){
		return $this->memento;
	}
}

//ʵ���������� �����Ǹ���Ϸ��ɫ
$role = new Originator;
//����״̬ ��Ѫ
$role->setState('��Ѫ');
//����
//��������¼������
$caretaker = new Caretaker;
//��������
$caretaker->setMemento($role->createMemento());
//״̬����
$role->setState('����');
$role->getState();
//�ָ�����
$role->restoreMemento($caretaker->getMemento());
//���²鿴״̬
$role->getState();