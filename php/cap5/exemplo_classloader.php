<?php


	try {

		require_once 'Lib/Livro/Core/ClassLoader.php';
		$al = new Livro\Core\ClassLoader;
		$al->addNamespace('Livro','Lib/Livro');
		$al->register();

	} catch (Exception $e) {

		$e->getMessage();
	}



 ?>
