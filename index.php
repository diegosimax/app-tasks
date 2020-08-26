<?php

	/**
	 * Página que inicia o motor
	 * @author Diego Simas
	 */

	session_start();

	//Nome da Aplicação
	define ('APP_NAME', 'Jestor Tasks');

	//URL da Aplicação
	define ('APP_URL', 'http://localhost/app-tasks/');

	//Registro as classes para mapeamento padrão MVC
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
