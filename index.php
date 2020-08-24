<?php

	//Nome da Aplicaчуo
	define ('APP_NAME', 'Jestor Tasks');
	
	//URL da Aplicaчуo
	define ('APP_URL', 'http://localhost/jestor/');

	//Registro as classes para mapeamento padrуo MVC
	spl_autoload_register(function ($className) {
		if (file_exists('System/' . $className . '.php')) {
			require_once 'System/' . $className . '.php';
		}
		if (file_exists('Controller/' . $className . '.php')) {
			require_once 'Controller/' . $className . '.php';
		}
		if (file_exists('Model/' . $className . '.php')) {
			require_once 'Model/' . $className . '.php';
		}
		if (file_exists($className . '.php')) {
			require_once $className . '.php';
		}
	});

	new Motor();
?>