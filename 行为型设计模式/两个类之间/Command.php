<?php 
//���������ɫ
abstract class Command{
  protected $receiver;
  function __construct(TV $receiver)
  {
      $this->receiver = $receiver;
  }
  abstract public function execute();
}
//���������ɫ ��������
class CommandOn extends Command
{
  public function execute()
  {
      $this->receiver->action();
  }
}
//���������ɫ �ػ�������
class CommandOff extends Command
{
  public function execute()
  {
      $this->receiver->action();
  }
}
//�������   --ң���� 
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
//��������� Receiver =�� TV
class TV
{
  public function action()
  {
      echo "���յ����ִ�гɹ�".PHP_EOL;
  }
}

//ʵ������������� -------��һ�����ӻ�
$receiver = new TV();
//ʵ�����������-------��һ��ң����
$invoker  = new Invoker();
//ʵ�������������ɫ -------����ң��������ƥ����ӻ�
$commandOn = new CommandOn($receiver);
$commandOff = new CommandOff($receiver);
//��������  ----------���¿�����ť
$invoker->setCommand($commandOn);
//��������
$invoker->send();
//��������  -----------���¹ػ���ť
$invoker->setCommand($commandOff);
//��������
$invoker->send();