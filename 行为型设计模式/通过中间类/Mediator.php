<?php 
//抽象同事类 --------电话机
abstract class Colleague{
	protected $mediator;    //用于存放中介者
	abstract public function sendMsg($num,$msg);
	abstract public function receiveMsg($msg);
	//设置中介者
	final public function setMediator(Mediator $mediator){
      $this->mediator = $mediator;
	}
}
//具体同事类 ---------座机
class Phone extends Colleague
{
	public function sendMsg($num,$msg)
	{
      echo __class__.'--发送声音：'.$msg.PHP_EOL;
      $this->mediator->opreation($num,$msg);
	}

	public function receiveMsg($msg)
	{
      echo __class__.'--接收声音：'.$msg.PHP_EOL;
	}
}
//具体同事类----------手机
class Telephone extends Colleague
{
	public function sendMsg($num,$msg)
	{
		echo __class__.'--发送声音：'.$msg.PHP_EOL;
		$this->mediator->opreation($num,$msg);
	}
	//手机接收信息前 会智能响铃 
	public function receiveMsg($msg)
	{	
		echo '响铃-------'.PHP_EOL;
		echo __class__.'--接收声音：'.$msg.PHP_EOL;
	}
}
//抽象中介者类
abstract class Mediator{
  abstract public function opreation($id,$message);
  abstract public function register($id,Colleague $colleague);
}
//具体中介者类------交换机
class switches extends Mediator
{
	protected  $colleagues = array();
	//交换机业务处理
	public function opreation($num,$message)
	{
		if (!array_key_exists($num,$this->colleagues)) {
			echo __class__.'--交换机内没有此号码信息，无法通话'.PHP_EOL;
		}else{
			$this->colleagues[$num]->receiveMsg($message);
		}
	}
	//注册号码
	public function register($num,Colleague $colleague)
	{
      if (!in_array($colleague, $this->colleagues)) {
          $this->colleagues[$num] = $colleague;
      }
      $colleague->setMediator($this);
	}
}
//实例化固话
$phone = new Phone;
//实例化手机
$telephone = new Telephone;
//实例化交换机
$switches = new Switches;
//注册号码  ---放号
$switches->register(6686668,$phone);
$switches->register(18813290000,$telephone);
//通话
$phone->sendMsg(18813290000,'hello world');
$telephone->sendMsg(6686668,'请说普通话');
$telephone->sendMsg(6686660,'请说普通话');