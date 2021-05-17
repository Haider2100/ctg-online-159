<?php

trait Connection{

	public $host = 'localhost';
	public $dbName = 'HostelExpense';
	public $dbUserName = 'root';
	public $dbPassword = '';

	public function databaseCon(){
		$conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->dbUserName, $this->dbPassword);

		return $conn;
	}

} 

?>