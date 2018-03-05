<?php 
//������Խӿ�
abstract class Strategy{
  abstract function peddle();
}

//�����װ�Ĳ��Է���   Ů���û�����
class ConcreteStrategyA extends Strategy
{
	public function peddle(){
		echo '��Ů������·��϶��ܺÿ�'.PHP_EOL;
	}
}

//�����û����� 
class ConcreteStrategyB extends Strategy
{
    public function peddle(){
		echo 'ÿһ�����˶���Ҫһ�������䣬��ʵ�����䣬�ӹ��������˿����ʼ'.PHP_EOL;
	}

}

//δ֪�Ա��û����� 
class ConcreteStrategyC extends Strategy
{
  public function peddle(){
		echo '�������棬�Ȿ���������䡷���ʺ���'.PHP_EOL;
	}
}

//������
class Context{
    protected $strategy;
    
	public function __construct(Strategy $strategy)
    {
      $this->strategy = $strategy;
    }

    public function request()
    {
      $this->strategy->peddle($this);
    }
}

//������Ů���û�����
$female_context = new Context(new ConcreteStrategyA);
$female_context->request();
//�����������û�����
$male_context = new Context(new ConcreteStrategyB);
$male_context->request();
//������δ֪�Ա��û�����
$unknow_context = new Context(new ConcreteStrategyC);
$unknow_context->request();