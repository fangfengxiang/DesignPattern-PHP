<?php 
//����״̬��
abstract class State{
  abstract function handle();
}
//��̬
class Solid extends State{
	public function handle(){
		echo '��̬ =>�ڻ� =>Һ̬ת����'.PHP_EOL;
	}
}
class Liquid extends State{
	public function handle(){
		echo 'Һ̬ =>���� =>��̬ת����'.PHP_EOL;
	}
}
class Gas extends State{
	public function handle(){
		echo '��̬ =>���� =>��̬ת����'.PHP_EOL;
	}
}
//context������ -----water
class Water{
  protected $states = array();
  protected $current=0;
  public function __construct()
  {
      $this->states[]=new Solid;
	  $this->states[]=new Liquid;
	  $this->states[]=new Gas;
  }
  //ˮ�ı仯
  public function change(){
	//��֪��ǰ״̬
	echo '��ǰ����״̬'.get_Class($this->states[$this->current]).PHP_EOL;
	//��ǰ״̬����
	$this->states[$this->current]->handle();
	//״̬�仯
	$this->changeState();
  }
  //״̬�仯
  public function changeState()
  {
	  $this->current++ == 2 && $this->current = 0;
  }
}



//ʵ�������廷����ɫ-----ˮ
$water = new Water;
//ˮ�������仯   ---������״̬���
$water->change();
$water->change();
$water->change();
$water->change();