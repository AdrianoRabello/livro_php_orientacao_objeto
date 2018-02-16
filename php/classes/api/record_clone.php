<?php 
	require_once "autoload.php";

	try {

		Transaction::open('estoque');
		Transaction::setLogger(new LoggerTXT("../tmp/log_clone.txt")); // informa em qual arquivo sera gravado o registro de log
		Transaction::log('clonando um produto ');
		$p1 = Produto::find(7); // carrega o produto do 
		$p2 = clone $p1; // clona o objeto 
		$p2->descricao .= " (clonado)";	
		$p2->store(); 
		Transaction::close();
	} catch (Exception $e) {
		Transaction::rollback();
		print $e->getMessage();
	}

 ?>