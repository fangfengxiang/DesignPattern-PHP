<?php
//抽象处理者
abstract class Handler{
	private $next_handler ;//存放下一处理对象
	private $lever = 0;   		  //处理级别默认0
	abstract protected function response();  //处理者回应
	//设置处理级别
	public function setHandlerLevel($lever){
		$this->lever = $lever ;
	}
	//设置下一个处理者是谁
	public function setNext(Handler $handler){
		$this->next_handler = $handler;
		$this->next_handler->setHandlerLevel($this->lever+1);
	}
	//责任链实现主要方法，判断责任是否属于该对象，不属于则转发给下一级。使用final不允许重写
	final public function handlerMessage(Request $request){
		if($this->lever == $request->getLever()){
			$this->response();
		}else{
			if($this->next_handler != null){
				$this->next_handler->handlerMessage($request);
			}else{
				echo '洗洗睡吧，没人理你'.PHP_EOL;
			}
		}
	} 
}
//具体处理者
// headman 组长  
class HeadMan extends Handler{
	protected function response(){
		echo '组长回复你：同意你的请求'.PHP_EOL;
	}
}
//主管director
class Director extends Handler{
	protected function response(){
		echo '主管回复你：知道了，退下'.PHP_EOL;
	}
} 
//经理manager
class Manager extends Handler{
	protected function response(){
		echo '经理回复你：容朕思虑，再议'.PHP_EOL;
	}
}
//请求类
class Request{
	protected $level = array('请假'=>0,'休假'=>1,'辞职'=>2);//测试方便，默认设置好请示级别对应关系
	protected $request;
	public function __construct($request){
		$this->request = $request;
	}
	public function getLever(){
		//获取请求对应的级别，如果该请求没有对应级别 则返回-1
		return array_key_exists($this->request,$this->level)?$this->level[$this->request]:-1;
	}
}

//实例化处理者
$headman = new HeadMan;
$director = new Director;
$manager = new Manager;
//责任链组装
$headman->setNext($director);
$director->setNext($manager);
//传递请求
$headman->handlerMessage(new Request('请假'));
$headman->handlerMessage(new Request('休假')); 
$headman->handlerMessage(new Request('辞职'));
$headman->handlerMessage(new Request('加薪'));  