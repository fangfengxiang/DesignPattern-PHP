<?php 
//���󹹼�
Abstract class Component{
	public $name;
	abstract function doSomething();
	public function __construct($name){
		$this->name = $name;
	}
}
//��ͨԱ��  ��Ҷ���� ��������ӽڵ�
class Leaf extends Component{
	public $lever;
	public function doSomething(){
		echo "�㼶--{$this->lever}--work";
	}
}
//�ܾ��� ���ž��� ���ܵ� ��֦���� 
class Composite extends Component{
	public $c_nodes = array();
	public $lever = 1;
	//����ӽڵ�
	public function add(Component $component){
		$component->lever = $this->lever + 1;
		$this->c_nodes[] = $component;
	}
	public function doSomething(){
		switch($this->lever){
			case 1:$this->manager();
				break;
			case 2:$this->sell();
		}
	}
	private function manager(){}
	private function sell(){}
} 
$manager = new Composite("�ܾ���");
$sgm = new Composite("���۾���");
$staff = new  Leaf("����");
//��װ����
$manager->add($sgm);
$sgm->add($staff);

//������ - ����
function display(Composite $composite){
	$composite->doSomething();
	foreach($composite->c_nodes as $c_node)
		 $c_node instanceof Leaf ? $c_node->doSomething() : display($c_node);					
}
display($manager);