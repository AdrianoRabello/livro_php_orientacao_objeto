<?php 
	require_once "autoload.php";

	try {

		Transaction::open('estoque');
		Transaction::setLogger(new LoggerTXT("../tmp/log_protect.txt"));
		Transaction::log('protect produto ');
		$p1 = Produto::find(2);	
		$p1->estoque = 'dois';
		//var_dump($p1);

		//print_r($p1);
		$p1->estoque = "dois";
		$p1->store();
		Transaction::close();
	} catch (Exception $e) {
		Transaction::rollback();
		//print $e->getMessage();
		// chama a função para exubi a linha, classe e tipo de erro em formato json
		Produto::showError($e);
		
	}

 ?>