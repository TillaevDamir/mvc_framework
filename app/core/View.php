<?php 

namespace app\core;

class View
{
	private $path;
	private $route;
	private $layout = 'default';

	public function __construct($route)
	{
		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action'];
	}

	public function render($title, $vars = [])
	{
		extract($vars);
		if(file_exists('app/views/'.$this->path.'.php')){
			ob_start();
			require 'app/views/'.$this->path.'.php';
			$content = ob_get_clean();
			require 'app/views/layouts/'.$this->layout.'.php';
		}
		else
		{
			exit('File not exists');
		}
	}

	public function redirect($url)
	{
		header('Location: '.$url);
		exit;
	}

	public static function errorCode($code)
	{
		http_response_code($code);
		require 'app/views/errors/'.$code.'.php';
		exit;
	}
}