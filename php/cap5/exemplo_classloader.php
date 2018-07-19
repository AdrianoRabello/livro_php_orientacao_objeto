<?php


	try {

		require_once 'Lib/Livro/Core/ClassLoader.php';
		/*require_once 'Lib/Livro/Database/Criteria.php';
		require_once 'Lib/Livro/Database/Expression.php';
		require_once 'Lib/Livro/Database/Filter.php';*/

		$al = new Livro\Core\ClassLoader;
		$al->addNamespace('Livro','Lib/Livro');
		$al->addNamespace('Livro','Lib/Livro/DataBase');
		$al->register();



		$/*criteria = new Livro\Database\Criteria;
		$con =  Livro\Database\Connection::open('stoque');

		$criteria->add(new  Livro\Database\Filter('idade','>','10'));

		echo $criteria->dump();*/


	} catch (Exception $e) {

		$e->getMessage();
	}



 ?>
