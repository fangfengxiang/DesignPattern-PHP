<?php 
//抽象模板类
abstract class Template{
	protected $balance = 100;       //账户余额,为测试方便，直接赋初值100
	//结算方法
	abstract protected function adjust($num);
	//支付信息显示 
	abstract protected function display($num);
	final public function apply($num){
		$this->adjust($num);
		$this->display($num);
	}
}

//普通账户
class Account extends Template{
	protected $falg;  //用于判断支付是否成功
	protected function adjust($num){
		if($this->balance > $num){//只有余额大于所需支付金额才允许支付
			$this->balance-=$num;
			$this->falg = true;
		}else{
			$this->falg = false;
		}
	}
	protected function display($num){
		if($this->falg){
			echo '支付成功,所剩余额为'.$this->balance.PHP_EOL;
		}else{
			echo '余额不足，支付失败,所剩余额为'.$this->balance.PHP_EOL;
		}
	}
}

//信用卡用户
class Credit extends Template{
	protected function adjust($num){
		$this->balance-=$num;
	}
	protected function display($num){
		echo '感谢您使用信用支付，所剩余额为'.$this->balance.PHP_EOL;
	}
}

//普通账户使用
$account = new Account;
//普通账户使用
$account -> apply(80);
//普通账户透支
$account -> apply(30);

//信用卡账户使用
$credit = new Credit;
$credit -> apply(200);