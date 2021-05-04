<?php

namespace App;

class Database{

	private $db_name;

	private $db_user;

	private $db_host;


	public function __construct($db_name, $db_user = 'root', $db_host = 'localhost') {

		$this->db_name =$db_name;

		$this->db_user =$db_user;

		$this->db_host =$db_host;



	}
}