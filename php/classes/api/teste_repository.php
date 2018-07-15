<?php


	require_once("autoload.php");


	try {

		Transaction::open('estoque');

		Transaction::setLogger(new LoggerTXT("../tmp/log_repository.txt"));

		$criteria = new Criteria();
		$criteria->add(new Filter('estoque','>',1));

		$repository = new Repository('Produto');
		$produtos = $repository->load($criteria);

		/*echo "<pre>";
		print_r($produtos);*/
		if ($produtos) {
			foreach ($produtos as $produto) {

				// para realizar alteração no objeto basto informar o atributo em produto e colocar o valor
				// desejado e chamar o emoto store pois cada produtp é um objeto
				$produto->estoque += 1;
				$produto->store();
				echo "<pre>";
				print_r($produto);
			}

		// toda solicitação de alteração só será executada após o fechamento da transação
		Transaction::close();

		}

	} catch (\Exception $e) {

		echo $e->getMessage();
	}




 ?>
