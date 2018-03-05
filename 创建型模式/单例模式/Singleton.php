<?php
	class Singleton{
		//存放实例
		private static $_instance = null;
		
		//私有化构造方法、
		private function __construct(){
			echo "单例模式的实例被构造了";
		}
		//私有化克隆方法
		private function __clone(){
			
		}
		//私有化睡眠方法。序列化时会自动调用该方法。
		//private function __sleep(){}
		//公有化获取实例方法
		public static function getInstance(){
			if (!(self::$_instance instanceof Singleton)){
				self::$_instance = new Singleton();
			}
			return self::$_instance;
		} 
	}
	
	$singleton=Singleton::getInstance();