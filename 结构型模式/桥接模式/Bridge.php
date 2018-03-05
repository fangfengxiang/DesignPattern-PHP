<?php
//���󻯽�ɫ
abstract class MiPhone{
	protected $_audio;      //�����Ƶ�������
	abstract function output();
	public function __construct(Audio $audio){
		$this->_audio = $audio;
	}
}
//�����ֻ�
class Mix extends MiPhone{
	//�����������
	public function output(){
		$this->_audio->output();
	}
}
class Note extends MiPhone{
	public function output(){
		$this->_audio->output();
	}
}
//ʵ�ֻ���ɫ ����ʵ����
abstract class Audio{
	abstract function output();
}
//������Ƶʵ���� -�Ǵ�����Ƶ���
class Osteophony extends Audio{
	public function output(){
		echo "�Ǵ������������-----����".PHP_EOL;
	}
}
//��ͨ��Ƶ���---��Ͳ���
class Cylinder extends Audio{
	public function output(){
		echo "��Ͳ���������-----�Ǻ�".PHP_EOL;
	}
}

//��С��mix��С��note�������
$mix = new Mix(new Osteophony);
$mix->output();
$note = new Note(new Cylinder);
$note->output();