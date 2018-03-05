<?php 
//抽象构件
Abstract class Component{
	public $name;
	abstract function doSomething();
	public function __construct($name){
		$this->name = $name;
	}
}
//普通员工  树叶构件 不能添加子节点
class Leaf extends Component{
	public $lever;
	public function doSomething(){
		echo "层级--{$this->lever}--work";
	}
}
//总经理 部门经理 主管等 树枝构件 
class Composite extends Component{
	public $c_nodes = array();
	public $lever = 1;
	//添加子节点
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
$manager = new Composite("总经理");
$sgm = new Composite("销售经理");
$staff = new  Leaf("何在");
//组装成树
$manager->add($sgm);
$sgm->add($staff);

//遍历树 - 函数
function display(Composite $composite){
	$composite->doSomething();
	foreach($composite->c_nodes as $c_node)
		 $c_node instanceof Leaf ? $c_node->doSomething() : display($c_node);					
}
display($manager);