<?php


	require_once("autoload.php");

	Transaction::open('estoque');
	$criteria = new Criteria();
	$criteria->add(new Filter('estoque','>',1));

	$repository = new Repository('Produto');
	$produtos = $repository->load($criteria);

	/*echo "<pre>";
	print_r($produtos);*/
	if ($produtos) {
		foreach ($produtos as $produto) {

			$produto->estoque += 1;
			$produto->store();
			echo "<pre>";
			print_r($produto);
		}

	Transaction::close();

	}

 ?>
