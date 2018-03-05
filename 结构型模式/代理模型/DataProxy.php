<?php 
class Proxy
{	
	protected $reader;
	protected $wirter;
	public function __construct(){
		$this->reader = new PDO('mysql:host=127.0.0.1;port=3306;dbname=CD;','root','password');
		$this->writer = new PDO('mysql:host=127.0.0.2;port=3306;dbname=CD;','root','password');
	}
	public function query($sql)
    {
        if (substr($sql, 0, 6) == 'select')
        {
            echo "读操作: ".PHP_EOL;
            return $this->reader->query($sql);
        }
        else
        {
            echo "写操作：".PHP_EOL;
            return  $this->writer->query($sql);
        }
    }
}
//数据库代理
$proxy = new Proxy;
//读操作
$proxy->query("select * from table");
//写操作
$proxy->query("INSERT INTO table SET title = 'hello' where id = 1");
