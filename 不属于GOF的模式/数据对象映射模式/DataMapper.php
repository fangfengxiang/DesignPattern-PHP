<?php 
//����ģʽӳ����
class User
{
    protected $id;
    protected $data;
    protected $db;
    protected $change = false;

    public function __construct($id)
    {	
		$this->id = $id;
		//ʵ�������ݿ��������ʹ���˹�������
        $this->db = Factory::getDatabase();
		//�����ݿ��ѯ���ݣ���ŵ�data������
        $this->data  = $this->db->query("select * from user where id = $id limit 1");
        
    }

    public function __get($key)
    {
        if (isset($this->data[$key]))
        {
            return $this->data[$key];
        }
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
        $this->change = true;
    }
	//��������
    public function __destruct()
    {
		//����������Ըı������change����Ϊtrue ������·����������ݿ�
       $this->change && $this->update();
    }
	//���¼�¼����
	public function update(){
		 foreach ($this->data as $k => $v)
            {
                $fields[] = "$k = '{$v}'";
            }
            $this->db->query("update user set " . implode(', ', $fields) . "where
            id = {$this->id} limit 1");
	}
}
//ʵ��������
$user = new User(1);
//�ı�����
$user->name = 'admin';