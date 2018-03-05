<?php
class ArrayContainer implements Iterator
{
    protected $data = array();
    protected $index ;
	
    public function __construct($data)
    {	
        $this->data = $data;
    }
	//���ص�ǰָ��ָ������
    public function current()
    {	
        return $this->data[$this->index];
    }
	//ָ��+1
    public function next()
    {	
        $this->index ++;
    }
	//��ָ֤���Ƿ�Խ��
    public function valid()
    {
        return $this->index < count($this->data);
    }
	//����ָ��
    public function rewind()
    {
        $this->index = 0;
    }
	//���ص�ǰָ��
    public function key()
    {	
        return $this->index;
    }
}

//��ʼ����������
$arr = array(0=>'�Ƴ�',1=>'�γ�',2=>'Ԫ��');
$container = new ArrayContainer($arr);

//������������
foreach($container as $a => $dynasty){
	echo '�����ʱ���������ȥ'.$dynasty.PHP_EOL;
}
