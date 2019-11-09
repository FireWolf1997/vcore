<?php
class DBInit{
	private $DB;

	public function __construct($host, $user, $password, $database)
	{
		$this->DB = new mysqli($host, $user, $password, $database);
	}

	public function __destruct()
	{
		echo "closed"."<br>";
		$this->DB->close();
	}

	public function CreateTable($CQuery){
		return $this->DB->query($CQuery);
	}
}