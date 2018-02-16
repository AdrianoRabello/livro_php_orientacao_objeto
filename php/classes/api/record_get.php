<?php 
	require_once "autoload.php";

	try {

		Transaction::open('estoque');
		Transaction::setLogger(new LoggerTXT("../tmp/log_novo.txt"));
		Transaction::log('Buscando um produto ');
		$p1 = Produto::find(3); // carrega para dentro de $p1 o objeto com o id 2 do BD
		echo "<pre>";
		print_r($p1);	 // exibindo todo objeto 
		echo $p1->descricao; // exibindo apenas um elemento do objeto
		Transaction::close();
	} catch (Exception $e) {
		Transaction::rollback();
		print $e->getMessage();
	}

 ?>