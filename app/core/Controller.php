<?php 

namespace app\core;

use app\core\View;

abstract class Controller
{
	protected $route;
	protected $view;
	protected $model;

	public function __construct($route)
	{
		$this->route = $route;
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
}