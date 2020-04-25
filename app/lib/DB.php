<?php  

namespace app\lib;

use PDO;

class DB
{
	protected $db;

	public function __construct()
	{
		$config = require "app/config/db.php";
		$this->db = new PDO("mysql: host=".$config['host']."; dbname=".$config['dbname']."; charset=".$config['charset']."", $config['user'], $config['pass'], $config['opt']);
	}
}