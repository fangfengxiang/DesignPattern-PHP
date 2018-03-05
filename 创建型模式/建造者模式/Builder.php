<?php 
class person {
	public $age;
	public $speed;
	public $knowledge;
}
//����������
abstract class Builder{
	public $_person;
	public abstract function setAge();
	public abstract function setSpeed();
	public abstract function setKnowledge();
	public function __construct(Person $person){
		$this->_person=$person;
	}
	public function getPerson(){
		return $this->_person;
	}
}
//���߽�����
class OlderBuider extends Builder{
	public function setAge(){
		$this->_person->age=70;
	}
	public function setSpeed(){
		$this->_person->speed="low";
	}
	public function setKnowledge(){
		$this->_person->knowledge='more';
	}
}
//С��������
class ChildBuider extends Builder{
	public function setAge(){
		$this->_person->age=10;
	}
	public function setSpeed(){
		$this->_person->speed="fast";
	}
	public function setKnowledge(){
		$this->_person->knowledge='litte';
	}
}
//����ָ����
class Director{
	private $_builder;
	public function __construct(Builder $builder){
		$this->_builder = $builder;
	}
	public function built(){
		$this->_builder->setAge();
		$this->_builder->setSpeed();
		$this->_builder->setKnowledge();
	}
}
//ʵ����һ�����߽�����
$oldB = new OlderBuider(new Person);
//ʵ����һ������ָ����
$director = new Director($oldB);
//ָ�ӽ���
$director->built();
//�õ�����
$older = $oldB->getPerson();

var_dump($older);