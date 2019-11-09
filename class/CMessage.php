<?php
class CMessage{
	private $DB;
	private $User;

	public function __construct(&$user, &$connection)
	{
		$this->DB = $connection;
		$this->User = $user;
	}
	public function __destruct()
	{
		echo "CMessage closed"."<br>";
	}

	public function SendMessage($chat_id, $message){
		if($this->User->isAuthorized())
			return $this->DB->query("INSERT INTO `t_message`(`CHAT_ID`, `MESSAGE`, 	`USER`) VALUES ('{$chat_id}', '{$message}', '{$this->User->GetID()}')");
		else
			return false;
	}
}