<?php
//������ʽ  
abstract class Expression{
	//�κα��ʽ���඼Ӧ����һ�ֽ�������
	abstract public function interpreter($context);
}
//������ʽ�������﷨���ϣ��﷨�����Ĺؼ���ÿ���﷨�������ָ���﷨��������
//������ʽͨ���ݹ���õķ�������������С�﷨��Ԫ���н������

//�ս�����ʽ    ͨ��ָ�������
class TerminalExpression extends Expression{
	private $num ;
	//�ս�����ʽͨ��ֻ��һ��
	public function interpreter($context){
		
	}
}
//���ս�����ʽ   ͨ��ָ����ķ���
class NonterminalExpression extends Expression{
	public function interpreter($context){
		return null;
	}
}
