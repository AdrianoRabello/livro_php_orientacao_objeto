<?php

	
	require_once("autoload.php");
	


	try {

		// abre a transação com o nome do arquivo de consiguração chamado estoque
		Transaction::open('estoque');

		//  usa a  calsse de log txt
		Transaction::setLogger(new LoggerTXT("../tmp/log_repository.txt"));

		// cria um criterio de seleção
		$criteria = new Criteria();
		
		//$criteria->add(new Join('produto','id',"id_produto"));
		$criteria->add(new Filter('id','>',1),Expression::OR_OPERATOR);
		//$criteria->add(new Filter('id','=',2),Expression::OR_OPERATOR);
		//$criteria->add(new Join('venda','id',"id_venda"),Expression::S_OPERATOR);

		// instancia a classe Repository passando o nome da classe que queremos trabalhar
		$repository = new Repository('Produto');
		//$repository = new Repository('ItemVenda');
		// faz o load do objeto critéria de acordo com os parametros passsados
		$produtos = $repository->load($criteria);
		
		/*echo "<pre>";
		 print_r($produtos);*/

		/*echo "<pre>";
		print_r($produtos);*/

		$produto = new Produto();
		if ($produtos) {
			// percorre a lista de objetos retornados do BD
			foreach ($produtos as $produto) {

				// para realizar alteração no objeto basto informar o atributo em produto e colocar o valor
				// desejado e chamar o emoto store pois cada produtp é um objeto
				//$produto->estoque += 1;
				//$produto->store();
				echo "<pre>";
				//print_r($produto->id);
				$produtos[] = $produto->loadById($produto->id);
				//echo $produto->get_descricao();
				//$produto->store();
			}

			print_r($produtos[0]->get_descricao());

		// toda solicitação de alteração só será executada após o fechamento da transação
		Transaction::close();

		}

	} catch (\Exception $e) {

		echo $e->getMessage();
	}




 ?>
