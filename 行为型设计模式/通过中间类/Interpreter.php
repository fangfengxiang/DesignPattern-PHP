<?php
//抽象表达式  
abstract class Expression{
	//任何表达式子类都应该有一种解析任务
	abstract public function interpreter($context);
}
//抽象表达式是生成语法集合（语法树）的关键，每个语法集合完成指定语法解析任务
//抽象表达式通过递归调用的方法，最终由最小语法单元进行解析完成

//终结符表达式    通常指运算变量
class TerminalExpression extends Expression{
	private $num ;
	//终结符表达式通常只有一个
	public function interpreter($context){
		
	}
}
//非终结符表达式   通常指运算的符号
class NonterminalExpression extends Expression{
	public function interpreter($context){
		return null;
	}
}
