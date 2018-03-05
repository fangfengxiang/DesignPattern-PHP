<?php 
//数据模式映射类
class User
{
    protected $id;
    protected $data;
    protected $db;
    protected $change = false;

    public function __construct($id)
    {	
		$this->id = $id;
		//实例化数据库对象，这里使用了工厂方法
        $this->db = Factory::getDatabase();
		//从数据库查询数据，存放到data属性中
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
	//析构方法
    public function __destruct()
    {
		//如果对象属性改变过，则change属性为true 则调更新方法更新数据库
       $this->change && $this->update();
    }
	//更新记录方法
	public function update(){
		 foreach ($this->data as $k => $v)
            {
                $fields[] = "$k = '{$v}'";
            }
            $this->db->query("update user set " . implode(', ', $fields) . "where
            id = {$this->id} limit 1");
	}
}
//实例化对象
$user = new User(1);
//改变名字
$user->name = 'admin';