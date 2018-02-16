<?php 
	require_once "autoload.php";

	try {

		Transaction::open('estoque');
		Transaction::setLogger(new LoggerTXT("../tmp/log_venda.txt"));
		Transaction::log('Inserindo uma nova venda ');

		


		$v = new Venda;
		$v->set_id(' ');
		$v->set_data_venda(date('Y-m-d'));
		//__set('id',1);

		echo "<pre>";
		print_r($v);
		$v->store();
		Transaction::close();
	} catch (Exception $e) {
		Transaction::rollback();
		print $e->getMessage();
	}
 ?>