<?php 

namespace app\controllers;

use app\core\Controller;

class AccountController extends Controller
{
	public function loginAction()
	{
		echo "Login action";
	}

	public function registerAction()
	{
		echo "Register action";
		var_dump($this->route);
	}
}