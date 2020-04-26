<?php 

namespace app\core;

use app\lib\DB;

class Model
{
	protected $db;

	public function __construct()
	{
		$this->db = new DB;
	}
}