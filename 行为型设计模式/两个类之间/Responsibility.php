<?php
//��������
abstract class Handler{
	private $next_handler ;//�����һ�������
	private $lever = 0;   		  //������Ĭ��0
	abstract protected function response();  //�����߻�Ӧ
	//���ô�����
	public function setHandlerLevel($lever){
		$this->lever = $lever ;
	}
	//������һ����������˭
	public function setNext(Handler $handler){
		$this->next_handler = $handler;
		$this->next_handler->setHandlerLevel($this->lever+1);
	}
	//������ʵ����Ҫ�������ж������Ƿ����ڸö��󣬲�������ת������һ����ʹ��final��������д
	final public function handlerMessage(Request $request){
		if($this->lever == $request->getLever()){
			$this->response();
		}else{
			if($this->next_handler != null){
				$this->next_handler->handlerMessage($request);
			}else{
				echo 'ϴϴ˯�ɣ�û������'.PHP_EOL;
			}
		}
	} 
}
//���崦����
// headman �鳤  
class HeadMan extends Handler{
	protected function response(){
		echo '�鳤�ظ��㣺ͬ���������'.PHP_EOL;
	}
}
//����director
class Director extends Handler{
	protected function response(){
		echo '���ܻظ��㣺֪���ˣ�����'.PHP_EOL;
	}
} 
//����manager
class Manager extends Handler{
	protected function response(){
		echo '����ظ��㣺����˼�ǣ�����'.PHP_EOL;
	}
}
//������
class Request{
	protected $level = array('���'=>0,'�ݼ�'=>1,'��ְ'=>2);//���Է��㣬Ĭ�����ú���ʾ�����Ӧ��ϵ
	protected $request;
	public function __construct($request){
		$this->request = $request;
	}
	public function getLever(){
		//��ȡ�����Ӧ�ļ������������û�ж�Ӧ���� �򷵻�-1
		return array_key_exists($this->request,$this->level)?$this->level[$this->request]:-1;
	}
}

//ʵ����������
$headman = new HeadMan;
$director = new Director;
$manager = new Manager;
//��������װ
$headman->setNext($director);
$director->setNext($manager);
//��������
$headman->handlerMessage(new Request('���'));
$headman->handlerMessage(new Request('�ݼ�')); 
$headman->handlerMessage(new Request('��ְ'));
$headman->handlerMessage(new Request('��н'));  