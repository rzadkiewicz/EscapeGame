<?php


class Database{

	private $db_name;

	private $db_user;

	private $db_host;

	private $pdo;


	public function __construct($db_name, $db_user = 'root', $db_host = 'localhost') {

		$this->db_name =$db_name;

		$this->db_user =$db_user;

		$this->db_host =$db_host;
    }

	private function getPDO(){
		
		if($this->pdo === null){

		 $pdo = new PDO('mysql:dbname=escapegame;host=localhost', 'root');

		 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		 $this->pdo = $pdo;

		}
	
		return $this->pdo;
      
	}


	public function query($statement){

		$res = $this->getPDO()->query($statement);

		



	}
    
    public function queryR($statement){

		$rest = $this->getPDO()->query($statement);

		$datas = $rest->fetchALL(PDO::FETCH_OBJ);

		return $datas;

    }




}
