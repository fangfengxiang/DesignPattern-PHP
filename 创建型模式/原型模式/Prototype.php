<?php
//抽象原型类
Abstract class Prototype{
	abstract function __clone();
}
//具体原型类
class Map extends Prototype{
	public $width;
	public $height;
	public $sea;
	public function setAttribute(array $attributes){
		foreach($attributes as $key => $val){
			$this->$key = $val;
		}
	}
	//实现克隆方法，用来实现深拷贝
	public function __clone(){
		$this->sea = clone $this->sea;
	} 
}
//海洋类.这里就不具体实现了。
class Sea{}
//使用原型模式创建对象方法如下
//先创建一个原型对象
$map_prototype = new Map;
$attributes = array('width'=>40,'height'=>60,'sea'=>(new Sea));
$map_prototype->setAttribute($attributes);
//现在已经创建好原型对象了。如果我们要创建一个新的map对象只需要克隆一下
$new_map = clone $map_prototype; 

var_dump($map_prototype);
var_dump($new_map);