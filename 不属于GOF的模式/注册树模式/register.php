<?php
//User�����ڲ���
class User{}
//ע������
class Register
{
    protected static $objects;  //���ڴ��ʵ��
	//����ʵ������
    static public function set($key, $object)
    {
        self::$objects[$key] = $object;
    }
	//��ȡʵ������
    static public function get($key)
    {
        if (!isset(self::$objects[$key]))
        {
            return false;
        }
        return self::$objects[$key];
    }
	//ɾ��ʵ������
    static public function _unset($key)
    {
        unset(self::$objects[$key]);
    }
}


$user = new User;
//����ʵ��
Register::set('User',$user);
//�鿴ʵ��
var_dump(Register::get('User'));
//ɾ��ʵ��
Register::_unset('User');
//�ٴβ鿴ʵ��
var_dump(Register::get('User'));