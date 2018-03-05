<?php
//����ԭ����
Abstract class Prototype{
	abstract function __clone();
}
//����ԭ����
class Map extends Prototype{
	public $clone_id=0;
	public $width;
	public $height;
	public $sea;
	public function setAttribute(array $attributes){
		foreach($attributes as $key => $val){
			$this->$key = $val;
		}
	}
	//ʵ�ֿ�¡����������ʵ�����
	public function __clone(){
		$this->sea = clone $this->sea;
	} 
}
//������.����Ͳ�����ʵ���ˡ�
class Sea{}
//��¡����
class CloneTool{
	static function clone($instance,$id){
		$instance->clone_id ++;
		system_write(get_class($instance));
		return clone $instance;
	}
}
//ϵͳ֪ͨ����
function system_write($class){
	echo "����ʹ�ÿ�¡������¡��һ��{$class}����".PHP_EOL;
}

//ʹ��ԭ��ģʽ�������󷽷�����
//�ȴ���һ��ԭ�Ͷ���
$map_prototype = new Map;
$attributes = array('width'=>40,'height'=>60,'sea'=>(new Sea));
$map_prototype->setAttribute($attributes);
//�����Ѿ�������ԭ�Ͷ����ˡ��������Ҫ����һ���µ�map����ֻ��Ҫ��¡һ��
$new_map = CloneTool::clone($map_prototype,1); 

var_dump($map_prototype);
var_dump($new_map);