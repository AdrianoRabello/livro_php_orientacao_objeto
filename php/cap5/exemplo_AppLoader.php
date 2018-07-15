<?php


	try {

		require_once 'Lib/Livro/Core/AppLoader.php';
		$al = new Livro\Core\AppLoader;
		$al->addDirectory('App','App/Control');
		$al->addDirectory('App','App/Model');
		$al->register();

	} catch (Exception $e) {

		$e->getMessage();
	}



 ?>
