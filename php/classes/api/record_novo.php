<?php 
	
	require_once "autoload.php";

	try {

		Transaction::open('estoque');
		Transaction::setLogger(new LoggerTXT("../tmp/log_novo.txt"));
		Transaction::log('Inserindo um novo produto ');
		$p1 = new Produto;
		$p1->descricao 		= "Bateria AA ";
		$p1->estoque 		= 65;
		$p1->preco_custo 	= 35;
		$p1->preco_venda 	= 120;
		$p1->codigo_barras 	= 'tehr';
		$p1->data_cadastro 	= date('Y-m-d');
		$p1->origem 		= 'N'; 
		echo "<pre>";
		print_r($p1);
		$p1->store();

		// o transition close serve para poder fazer  commit para o banco salvar a operação
		Transaction::close(); 

	} catch (Exception $e) {
		Transaction::rollback();
		print $e->getMessage();
	}
 ?>