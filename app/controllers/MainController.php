<?php 

namespace app\controllers;

use app\core\Controller;
use app\lib\DB;

class MainController extends Controller
{
	public function indexAction()
	{
		$db = new DB;

		$this->view->render('Main Page');
	}
}