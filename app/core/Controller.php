<?php 

namespace app\core;

/**
 * Main controller
 */
abstract class Controller
{
	public $route;

	public function __construct($route)
	{
		$this->route = $route;
	}
}