<?php 

return [
	'host' => 'localhost',
	'dbname' => 'rrr',
	'charset' => 'utf8',
	'user' => 'root',
	'pass' => 'fabulous',
	'opt' => [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	],
];