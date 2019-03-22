<?php
	require_once "autoload.php";

	try {

		Transaction::open('estoque');
		// passa como parametro o caminho de onde esta o arquivo para gravar o log
		Transaction::setLogger(new LoggerTXT("../tmp/log_venda.txt"));
		// passa como parametro o que deve ser escrito no arquivo de log
		Transaction::log('testando produto ');

		// carega o produto com o id 3 no banco de dados
		/*$p = Produto::find(3);
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
		Transaction::close();*/

		//$p = new Produto();

		$p1 = Produto::find(7);

		//$p1->estoque += 1;

		/*$p->descricao = "teste";
		$p->estoque = 10;
		$p->preco_custo = 20;
		$p->preco_venda = 50;
		$p->codigo_barras = "asdasd";
		$p->data_cadastro = date("Y-m-d");
		$p->origem= "N";

		print_r($p);*/

		$p1->descricao = "Mouse";
		$p1->store();

		print_r($p1);

		//Transaction::close();




	} catch (Exception $e) {
		Transaction::rollback();
		print $e->getMessage();
	}
 ?>
