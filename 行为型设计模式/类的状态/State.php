<?php 
//抽象状态类
abstract class State{
  abstract function handle();
}
//固态
class Solid extends State{
	public function handle(){
		echo '固态 =>融化 =>液态转化中'.PHP_EOL;
	}
}
class Liquid extends State{
	public function handle(){
		echo '液态 =>蒸发 =>气态转化中'.PHP_EOL;
	}
}
class Gas extends State{
	public function handle(){
		echo '气态 =>凝华 =>固态转化中'.PHP_EOL;
	}
}
//context环境类 -----water
class Water{
  protected $states = array();
  protected $current=0;
  public function __construct()
  {
      $this->states[]=new Solid;
	  $this->states[]=new Liquid;
	  $this->states[]=new Gas;
  }
  //水的变化
  public function change(){
	//告知当前状态
	echo '当前所处状态'.get_Class($this->states[$this->current]).PHP_EOL;
	//当前状态能力
	$this->states[$this->current]->handle();
	//状态变化
	$this->changeState();
  }
  //状态变化
  public function changeState()
  {
	  $this->current++ == 2 && $this->current = 0;
  }
}



//实例化具体环境角色-----水
$water = new Water;
//水的能力变化   ---与它的状态相关
$water->change();
$water->change();
$water->change();
$water->change();