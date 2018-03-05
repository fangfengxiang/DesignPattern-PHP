<?php 
//用户所期待的接口
Interface Target{
	public function connect($host, $user, $passwd, $dbname);
    public function query($sql);
    public function close(); 
}
//MySQL操作适配器
class MySQLAdapter implements Target
{
    protected $conn;	//用于存放数据库连接句柄
	//实现连接方法
    public function connect($host, $user, $passwd, $dbname)
    {
        $conn = mysql_connect($host, $user, $passwd);
        mysql_select_db($dbname, $conn);
        $this->conn = $conn;
    }
	//查询方法
    public function query($sql)
    {
        $res = mysql_query($sql, $this->conn);
        return $res;
    }
	//关闭方法
    public function close()
    {
        mysql_close($this->conn);
    }
}
//MySQLi操作适配器
class MySQLiAdapter implements Target
{
    protected $conn;
    public function connect($host, $user, $passwd, $dbname)
    {
        $conn = mysqli_connect($host, $user, $passwd, $dbname);
        $this->conn = $conn;
    }
    public function query($sql)
    {
        return mysqli_query($this->conn, $sql);
    }
    public function close()
    {
        mysqli_close($this->conn);
    }
}
//用户期待适配类
Class DataBase {
	protected $db ; 	//存放MySQLiAdapter对象或MySQLAdapter对象
	public function  __construct($type){
		$type = $type."Adapter" ;
		$this->db = new $type ;
	}
	public function connect($host, $user, $passwd, $dbname){
		$this->db->connect($host, $user, $passwd, $dbname);
	}
	public function query($sql){
		return $this->db->query($sql);
	}
	public function close(){
		$this->db->close();
	}
}
//用户调用同一个接口，使用MySQL和mysqli这两套不同示例。
$db1 = new DataBase('MySQL');
$db1->connect('127.0.0.1','root','1234','myDB');die;
$db1->query('select * from test');
$db1->close();

$db2 = new DataBase('MySQLi');
$db2->connect('127.0.0.1','root','1234','myDB');
$db2->query('select * from test');
$db2->close();