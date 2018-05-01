<?php 
	
	require_once "autoload.php";

	try {
		
		Transaction::open('estoque');

		Transaction::setLogger(new LoggerTXT('../tmp/log_collection_get.txt'));

		// define o criterio de seleção 
		$criteria = new Criteria;
		// adiciona como criterio a coluna estoque que seja maior que 70
		$criteria->add(new Filter('estoque','>',70));

		// passa como parametro o nome da classe para ser instanciado a cada objeto que obedeca ao criterio passado
		$repository = new Repository('Produto');
		$produtos = $repository->load($criteria);

		if ($produtos) {

			foreach ($produtos  as $produto) {
				echo " id 			-> ".$produto->id;// acesso a propriedade como se fosse um objeto 
				echo " Descrição 	-> ".$produto->descricao;
				echo " Estoque		-> ".$produto->estoque;
				echo "<br>";

			}			
			
		}
		Transaction::close();

	} catch (Exception $e) {

		echo $e->getMessage();
		Transaction::rollback();
		
	}
	

 ?>