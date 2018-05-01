<?php 
	
	require_once "autoload.php";

	try {

		Transaction::open('estoque');
		Transaction::setLogger(new LoggerTXT("../tmp/log_novo.txt"));
		Transaction::log('Inserindo um novo produto ');
		$p1 = new Produto;
		$p1->descricao 		= "Pilha AA ";
		$p1->estoque 		= 100;
		$p1->preco_custo 	= 5;
		$p1->preco_venda 	= 7;
		$p1->codigo_barras 	= 'ryj56';
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