<?php 
//�û����ڴ��Ľӿ�
Interface Target{
	public function connect($host, $user, $passwd, $dbname);
    public function query($sql);
    public function close(); 
}
//MySQL����������
class MySQLAdapter implements Target
{
    protected $conn;	//���ڴ�����ݿ����Ӿ��
	//ʵ�����ӷ���
    public function connect($host, $user, $passwd, $dbname)
    {
        $conn = mysql_connect($host, $user, $passwd);
        mysql_select_db($dbname, $conn);
        $this->conn = $conn;
    }
	//��ѯ����
    public function query($sql)
    {
        $res = mysql_query($sql, $this->conn);
        return $res;
    }
	//�رշ���
    public function close()
    {
        mysql_close($this->conn);
    }
}
//MySQLi����������
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
//�û��ڴ�������
Class DataBase {
	protected $db ; 	//���MySQLiAdapter�����MySQLAdapter����
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
//�û�����ͬһ���ӿڣ�ʹ��MySQL��mysqli�����ײ�ͬʾ����
$db1 = new DataBase('MySQL');
$db1->connect('127.0.0.1','root','1234','myDB');die;
$db1->query('select * from test');
$db1->close();

$db2 = new DataBase('MySQLi');
$db2->connect('127.0.0.1','root','1234','myDB');
$db2->query('select * from test');
$db2->close();