<?php 
	require_once "autoload.php";

	try {

		Transaction::open('estoque');
		Transaction::setLogger(new LoggerTXT("../tmp/log_delete.txt")); // informa em qual arquivo sera gravado o registro de log
		Transaction::log('deletando um produto ');
		$p1 = Produto::find(7); // carrega o produto do BD

		if ($p1 instanceof Produto) {
			$p1->delete();
		}
		$p1->delete();
		Transaction::close();
	} catch (Exception $e) {
		Transaction::rollback();
		print $e->getMessage();
	}

 ?>