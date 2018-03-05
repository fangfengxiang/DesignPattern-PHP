<?php 
//���󱻹۲���
abstract class Subject{
	//����һ���۲�������
	private $observers = array();
	//���ӹ۲��߷���
	public function addObserver(Observer $observer){
		$this->observers[] = $observer;
		echo "��ӹ۲��߳ɹ�".PHP_EOL;
	}
	//ɾ���۲��߷���
	public function delObserver(Observer $observer){
		$key = array_search($observer,$this->observers); //�ж��Ƿ��иù۲��ߴ���
		if($observer===$this->observers[$key]) { //ֵ��Ȼ��ͬ ���п��ܲ���ͬһ������,����ʹ��ȫ���ж�
			unset($this->observers[$key]);
			echo 'ɾ���۲��߳ɹ�'.PHP_EOL;
		} else{
			echo '�۲��߲����ڣ�����ɾ��'.PHP_EOL;
		}
	}
	//֪ͨ���й۲���
	public function notifyObservers(){
		foreach($this->observers as $observer){
			$observer->update();
		}
	}
}
//���屻�۲��� �����
class Server extends Subject{
	//���屻�۲���ҵ�� ����һ����Ϣ����֪ͨ���пͻ���
	public function publish(){
		echo '���������ܺã��ҷ����˸��°�'.PHP_EOL;
		$this->notifyObservers();
	}
}
//����۲��߽ӿ�
Interface Observer{
	public function update();
}
//����۲�����
//΢�Ŷ�
class Wechat implements Observer{
	public function update(){
		echo '֪ͨ�ѽ��գ�΢�Ÿ������'.PHP_EOL;
	}
}
//web��
class Web implements Observer{
	public function update(){
		echo '֪ͨ�ѽ��գ�web��ϵͳ������'.PHP_EOL;
	}
}
//app��
class App implements Observer{
	public function update(){
		echo '֪ͨ�ѽ��գ�APP���Ժ����'.PHP_EOL;
	}
}

//ʵ�������۲���
$server = new Server ;
//ʵ�����۲���
$wechat = new Wechat ;
$web = new Web ;
$app = new App;
//��ӱ��۲���
$server->addObserver($wechat);
$server->addObserver($web);
$server->addObserver($app);
//���۲��� ������Ϣ
$server->publish();

//ɾ���۲���
$server->delObserver($wechat);
//�ٴη�����Ϣ
$server->publish();

//����ɾ��һ��δ��ӳɹ۲��ߵĶ���
$server->delObserver(new Web);
//�ٴη�����Ϣ
$server->publish();

