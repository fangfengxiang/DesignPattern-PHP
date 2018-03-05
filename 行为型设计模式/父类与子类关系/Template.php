<?php 
//����ģ����
abstract class Template{
	protected $balance = 100;       //�˻����,Ϊ���Է��㣬ֱ�Ӹ���ֵ100
	//���㷽��
	abstract protected function adjust($num);
	//֧����Ϣ��ʾ 
	abstract protected function display($num);
	final public function apply($num){
		$this->adjust($num);
		$this->display($num);
	}
}

//��ͨ�˻�
class Account extends Template{
	protected $falg;  //�����ж�֧���Ƿ�ɹ�
	protected function adjust($num){
		if($this->balance > $num){//ֻ������������֧����������֧��
			$this->balance-=$num;
			$this->falg = true;
		}else{
			$this->falg = false;
		}
	}
	protected function display($num){
		if($this->falg){
			echo '֧���ɹ�,��ʣ���Ϊ'.$this->balance.PHP_EOL;
		}else{
			echo '���㣬֧��ʧ��,��ʣ���Ϊ'.$this->balance.PHP_EOL;
		}
	}
}

//���ÿ��û�
class Credit extends Template{
	protected function adjust($num){
		$this->balance-=$num;
	}
	protected function display($num){
		echo '��л��ʹ������֧������ʣ���Ϊ'.$this->balance.PHP_EOL;
	}
}

//��ͨ�˻�ʹ��
$account = new Account;
//��ͨ�˻�ʹ��
$account -> apply(80);
//��ͨ�˻�͸֧
$account -> apply(30);

//���ÿ��˻�ʹ��
$credit = new Credit;
$credit -> apply(200);