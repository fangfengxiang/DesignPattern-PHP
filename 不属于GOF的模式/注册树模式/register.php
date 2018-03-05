<?php
//User类用于测试
class User{}
//注册树类
class Register
{
    protected static $objects;  //用于存放实例
	//存入实例方法
    static public function set($key, $object)
    {
        self::$objects[$key] = $object;
    }
	//获取实例方法
    static public function get($key)
    {
        if (!isset(self::$objects[$key]))
        {
            return false;
        }
        return self::$objects[$key];
    }
	//删除实例方法
    static public function _unset($key)
    {
        unset(self::$objects[$key]);
    }
}


$user = new User;
//存入实例
Register::set('User',$user);
//查看实例
var_dump(Register::get('User'));
//删除实例
Register::_unset('User');
//再次查看实例
var_dump(Register::get('User'));