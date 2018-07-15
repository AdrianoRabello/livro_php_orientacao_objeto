<?php
	require_once "autoload.php";

	try {

		Transaction::open('estoque');
		Transaction::setLogger(new LoggerTXT("../tmp/log_venda.txt"));
		Transaction::log('testando produto ');

		// carega o produto com o id 3 no banco de dados
		$p = Produto::find(3);
		print_r($p::find(3));
		echo "<pre>";
		// adiciona mais 10 ao valor atual do estoque
		$p->estoque += 10;
		// salva as alterações no banco de dados
		$p->store();
		print_r($p);
		//fecha a conexao com o BD

		$p1 = new Produto();

		//$p1->estoque = "teste";
		Transaction::close();



	} catch (Exception $e) {
		Transaction::rollback();
		print $e->getMessage();
	}
 ?>
