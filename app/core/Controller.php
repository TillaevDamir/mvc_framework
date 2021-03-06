<?php 

namespace app\core;

use app\core\View;

abstract class Controller
{
	protected $route;
	protected $view;
	protected $model;
	protected $acl;

	public function __construct($route)
	{
		$this->route = $route;
		if($this->checkAcl() == false)
		{
			View::errorCode(403);
		}
		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);
	}

	public function loadModel($model)
	{
		$path = 'app\models\\'.ucfirst($model);
		if(class_exists($path))
		{
			return new $path;
		}
		else
		{
			exit('Model not exists '.ucfirst($model));
		}
	}

	public function checkAcl()
	{
		$this->acl = require "app/acl/".$this->route['controller'].'.php';
		if($this->isAcl('all'))
		{
			return true;
		}
		elseif(isset($_SESSION['authorize']['id']) && $this->isAcl('authorize'))
		{
			return true;
		}
		elseif(!isset($_SESSION['authorize']['id']) && $this->isAcl('guest'))
		{
			return true;
		}
		elseif(isset($_SESSION['admin']) && $this->isAcl('admin'))
		{
			return true;
		}
		return false;
	}

	public function isAcl($key)
	{
		return in_array($this->route['action'], $this->acl[$key]);
	}
}