<?php 

return [
	'host'=>'localhost',
	'dbname'=>'rrr',
	'user'=>'root',
	'pass'=>'fabulous',
	'charset'=>'utf8',
	'opt'=>[
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	],
];