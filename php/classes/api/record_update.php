<?php 
	require_once "autoload.php";

	try {

		Transaction::open('estoque');
		Transaction::setLogger(new LoggerTXT("../tmp/log_novo.txt")); // informa em qual arquivo sera gravado o registro de log
		Transaction::log('update um produto ');
		$p1 = Produto::find(2); // carrega o produto do id 2 
		echo $p1->estoque; // exibindo apenas um elemento do objeto
		$p1->estoque +=10; // incrementa em 10 unidades p valor de estoque 
		echo "<pre>";
		print_r($p1);	 // exibindo todo objeto 
		$p1->store(); // realia o update ja que possui um id 
		Transaction::close();
	} catch (Exception $e) {
		Transaction::rollback();
		print $e->getMessage();
	}

 ?>