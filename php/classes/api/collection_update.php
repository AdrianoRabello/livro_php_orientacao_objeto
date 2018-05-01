<?php 
	
	require_once "autoload.php";

	try {
		
		Transaction::open('estoque');

		Transaction::setLogger(new LoggerTXT('../tmp/log_collection_get.txt'));

		// define o criterio de seleção 
		$criteria = new Criteria;
		$criteria->add(new Filter('preco_venda','>',10));

		$repository = new Repository('Produto');
		$produtos = $repository->load($criteria);

		if ($produtos) {

			foreach ($produtos  as $produto) {
				// todos os produtos que obedecem ao criterio são acrecidos de +1 pois já possuem id e o metodo store já faz um update a cada interação no loop 
				$produto->preco_venda += 1;
				$produto->store();
			}			
			
		}
		Transaction::close();

	} catch (Exception $e) {

		echo $e->getMessage();
		Transaction::rollback();
		
	}
	

 ?>