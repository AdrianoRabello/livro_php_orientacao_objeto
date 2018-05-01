<?php 
	
	require_once "autoload.php";

	try {
		
		Transaction::open('estoque');

		Transaction::setLogger(new LoggerTXT('../tmp/log_collection_get.txt'));

		// define o criterio de seleção 
		$criteria = new Criteria;
		$criteria->add(new Filter('preco_venda','<',7));

		$repository = new Repository('Produto');

		// recebe um objeto criteria como parametro e executa o metodo delete com vbase no criterio passado
		$repository->delete($criteria);
		
		Transaction::close();

	} catch (Exception $e) {

		echo $e->getMessage();
		Transaction::rollback();
		
	}
	

 ?>