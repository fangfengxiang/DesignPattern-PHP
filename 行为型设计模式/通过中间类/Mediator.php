<?php 
//����ͬ���� --------�绰��
abstract class Colleague{
	protected $mediator;    //���ڴ���н���
	abstract public function sendMsg($num,$msg);
	abstract public function receiveMsg($msg);
	//�����н���
	final public function setMediator(Mediator $mediator){
      $this->mediator = $mediator;
	}
}
//����ͬ���� ---------����
class Phone extends Colleague
{
	public function sendMsg($num,$msg)
	{
      echo __class__.'--����������'.$msg.PHP_EOL;
      $this->mediator->opreation($num,$msg);
	}

	public function receiveMsg($msg)
	{
      echo __class__.'--����������'.$msg.PHP_EOL;
	}
}
//����ͬ����----------�ֻ�
class Telephone extends Colleague
{
	public function sendMsg($num,$msg)
	{
		echo __class__.'--����������'.$msg.PHP_EOL;
		$this->mediator->opreation($num,$msg);
	}
	//�ֻ�������Ϣǰ ���������� 
	public function receiveMsg($msg)
	{	
		echo '����-------'.PHP_EOL;
		echo __class__.'--����������'.$msg.PHP_EOL;
	}
}
//�����н�����
abstract class Mediator{
  abstract public function opreation($id,$message);
  abstract public function register($id,Colleague $colleague);
}
//�����н�����------������
class switches extends Mediator
{
	protected  $colleagues = array();
	//������ҵ����
	public function opreation($num,$message)
	{
		if (!array_key_exists($num,$this->colleagues)) {
			echo __class__.'--��������û�д˺�����Ϣ���޷�ͨ��'.PHP_EOL;
		}else{
			$this->colleagues[$num]->receiveMsg($message);
		}
	}
	//ע�����
	public function register($num,Colleague $colleague)
	{
      if (!in_array($colleague, $this->colleagues)) {
          $this->colleagues[$num] = $colleague;
      }
      $colleague->setMediator($this);
	}
}
//ʵ�����̻�
$phone = new Phone;
//ʵ�����ֻ�
$telephone = new Telephone;
//ʵ����������
$switches = new Switches;
//ע�����  ---�ź�
$switches->register(6686668,$phone);
$switches->register(18813290000,$telephone);
//ͨ��
$phone->sendMsg(18813290000,'hello world');
$telephone->sendMsg(6686668,'��˵��ͨ��');
$telephone->sendMsg(6686660,'��˵��ͨ��');