<?php
class ArrayContainer implements Iterator
{
    protected $data = array();
    protected $index ;
	
    public function __construct($data)
    {	
        $this->data = $data;
    }
	//返回当前指针指向数据
    public function current()
    {	
        return $this->data[$this->index];
    }
	//指针+1
    public function next()
    {	
        $this->index ++;
    }
	//验证指针是否越界
    public function valid()
    {
        return $this->index < count($this->data);
    }
	//重置指针
    public function rewind()
    {
        $this->index = 0;
    }
	//返回当前指针
    public function key()
    {	
        return $this->index;
    }
}

//初始化数组容器
$arr = array(0=>'唐朝',1=>'宋朝',2=>'元朝');
$container = new ArrayContainer($arr);

//遍历数组容器
foreach($container as $a => $dynasty){
	echo '如果有时光机，我想去'.$dynasty.PHP_EOL;
}
