<?php


	try {

		require_once 'Lib/Livro/Core/ClassLoader.php';
		require_once 'Lib/Livro/database/Connection.php';
		$al = new Livro\Core\ClassLoader;
		$al->addNamespace('Livro','Lib/Livro');
	
		$al->register();

		use Livro\Database\Connection;
		$obj1 = Connection::open('livro');

	} catch (Exception $e) {

		$e->getMessage();
	}



 ?>
