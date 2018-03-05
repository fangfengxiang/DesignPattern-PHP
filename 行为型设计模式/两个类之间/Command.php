<?php 
//抽象命令角色
abstract class Command{
  protected $receiver;
  function __construct(TV $receiver)
  {
      $this->receiver = $receiver;
  }
  abstract public function execute();
}
//具体命令角色 开机命令
class CommandOn extends Command
{
  public function execute()
  {
      $this->receiver->action();
  }
}
//具体命令角色 关机机命令
class CommandOff extends Command
{
  public function execute()
  {
      $this->receiver->action();
  }
}
//命令发送者   --遥控器 
class Invoker
{
  protected $command;
  public function setCommand(Command $command)
  {
      $this->command = $command;
  }

  public function send()
  {
      $this->command->execute();
  }
}
//命令接收者 Receiver =》 TV
class TV
{
  public function action()
  {
      echo "接收到命令，执行成功".PHP_EOL;
  }
}

//实例化命令接收者 -------买一个电视机
$receiver = new TV();
//实例化命令发送者-------配一个遥控器
$invoker  = new Invoker();
//实例化具体命令角色 -------设置遥控器按键匹配电视机
$commandOn = new CommandOn($receiver);
$commandOff = new CommandOff($receiver);
//设置命令  ----------按下开机按钮
$invoker->setCommand($commandOn);
//发送命令
$invoker->send();
//设置命令  -----------按下关机按钮
$invoker->setCommand($commandOff);
//发送命令
$invoker->send();