<?php 

namespace app\controllers;

use app\core\Controller;

class AccountController extends Controller
{
	public function loginAction()
	{
		if(!empty($_POST))
		{
			exit(json_encode(['name' => 'Damir','email' => 123]));
		}
		$this->view->render('Login Page');
	}

	public function registerAction()
	{
		$this->view->render('Register Page');
	}
}