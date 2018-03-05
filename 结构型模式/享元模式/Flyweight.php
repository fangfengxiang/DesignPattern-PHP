<?php 
//������Ԫ����
abstract class Flyweight{
	//����
	public $address;
	//��Ԫ��ɫ�������ÿ���
	public function __construct($address){
		$this->address = $address;
	}
}
//������Ԫ��ɫ  ������
class ConcreteFlyweight extends Flyweight{
	//��������
	public function register(){
		echo "�ҵı�������:{$this->address}".PHP_EOL;
	}
	//�˳�
	public function quit(){
		unset($this);
	}
}
//��Ԫ���� �����
class FlyweightFactor{
	static private $students = array();
	static public function getStudent($address){
		$students =self::$students;
		//�жϸü�ֵ�Ƿ����
		if(array_key_exists($address,$students)){
			echo "������п���Ϊ{$address}���ӳ���ֱ��ȡ".PHP_EOL;	
		}else{
			echo "�����û�У������˿���Ϊ{$address}�Ķ��󲢷ŵ�����".PHP_EOL;
			self::$students[$address] = new ConcreteFlyweight($address);
		}
		return self::$students[$address];
	}
}

//ʵ����ѧ������
$student_1 = FlyweightFactor::getStudent('����');
//���� 
$student_1 ->register();
// �˳�
$student_1->quit();
//�ڶ���ѧ������
$student_2 = FlyweightFactor::getStudent('��ݸ');
//���� 
$student_2 ->register();
// �˳�
$student_2->quit();
//������ѧ������
$student_3 = FlyweightFactor::getStudent('����');
//���� 
$student_3 ->register();
// �˳�
$student_3->quit();