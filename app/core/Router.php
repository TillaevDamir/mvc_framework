<?php 

namespace app\core;

/**
 * 
 */
class Router 
{	
	protected $routes = array();
	protected $params = array();

	public function __construct()
	{
		$arr = require 'app/config/routes.php';
		foreach($arr as $key=>$val)
		{
			$this->add($key, $val);
		}
	}

	public function add($route, $params)
	{
		$route = '#^'.$route.'$#';
		$this->routes[$route] = $params;
	}

	public function match()
	{
		$uri1 = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

		$base = array_shift($uri1);
		$uri = implode('/', $uri1);

		foreach($this->routes as $route=>$params)
		{
			if(preg_match($route, $uri, $matches))
			{
				$this->params = $params;
				return true;
			}
		}
		return false;
	}

	public function run()
	{
		if($this->match())
		{
			$path = 'app\controllers\\'.ucfirst($this->params['controller']).'Controller';
			if(class_exists($path))
			{
				$action = $this->params['action']."Action";
				if(method_exists($path, $action))
				{
					$controller = new $path($this->params);
					$controller->$action();
				}
				else
				{
					echo "Method not exists ".$action;
				}
			}
			else
			{
				echo "Class not exists ".$path;
			}
		}
		else
		{
			exit('Page not found');
		}
	}
}