<?php 
class Manager{
	public $name;
	protected $c_nodes = array();//����ӽڵ㣬���ž�����ͨԱ����
	public function __construct($name){
		$this->name = $name;
	}
	//��Ӳ��ž���
	public function addGm(GM $gm){
		$this->c_nodes[] = $gm;
	}
	//�����ͨԱ��
	public function addStaff(Staff $staff){
		$this->c_nodes[] = $staff;
	}
	//��ȡȫ���ӽڵ�
	public function get_C_nodes(){
		return $this->c_nodes;
	}
}

//���ž��� ����general manager ��д GM
Interface Gm{
	public function add(Staff $staff);
	public function get_c_nodes();
}
//���۾���
class Sgm implements Gm{
	public $name;
	protected $c_nodes = array();
	public function __construct($name){
		$this->name = $name;
	}
	//���Ա��
	public function add(Staff $staff){
		$this->c_nodes = $staff;
	}
	//��ȡ�ӽڵ�
	public function get_C_nodes(){
		return $this->c_nodes;
	}
	//�����������������۾�����һ�����۷���
	public function sell(){
		echo "����һ����˾�Ĳ�Ʒ";
	}
}
//Ա���ӿ�
Interface staff{
	public function work();
}
//���۲�Ա��
class Sstaff implements staff{
	public $name;
	public function work(){
		echo '�����۾�������£�����ȫ����';
	}
}
//ʵ����
$manager = new Manager("�ܾ���");
$sgm = new Sgm("���۾���");
$staff = new Sstaff("����");
//��װ����
$manager->addGm($sgm);
$sgm->add($staff);