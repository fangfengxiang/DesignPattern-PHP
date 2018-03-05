<?php 
//抽象策略接口
abstract class Strategy{
  abstract function peddle();
}

//具体封装的策略方法   女性用户策略
class ConcreteStrategyA extends Strategy
{
	public function peddle(){
		echo '美女穿这件衣服肯定很好看'.PHP_EOL;
	}
}

//男性用户策略 
class ConcreteStrategyB extends Strategy
{
    public function peddle(){
		echo '每一个男人都需要一个工具箱，充实工具箱，从购买各种螺丝刀开始'.PHP_EOL;
	}

}

//未知性别用户策略 
class ConcreteStrategyC extends Strategy
{
  public function peddle(){
		echo '骨骼清奇，这本《葵花宝典》最适合你'.PHP_EOL;
	}
}

//环境类
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

//若处于女性用户环境
$female_context = new Context(new ConcreteStrategyA);
$female_context->request();
//若处于男性用户环境
$male_context = new Context(new ConcreteStrategyB);
$male_context->request();
//若处于未知性别用户环境
$unknow_context = new Context(new ConcreteStrategyC);
$unknow_context->request();