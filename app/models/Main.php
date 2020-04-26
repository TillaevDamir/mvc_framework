<?php 

namespace app\models;

use app\core\Model;

class Main extends Model
{
	public function getNews()
	{
		$result = $this->db->db->query('SELECT * FROM tasks');
		return $result->fetchAll();
	}
}