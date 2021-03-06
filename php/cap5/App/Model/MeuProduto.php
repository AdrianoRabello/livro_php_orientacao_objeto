<?php

	
	use Livro\Database\Transaction;
	use Livro\Database\Repository;
	use Livro\Database\Criteiria;
	use Livro\Database\Record;


	class MeuProduto extends Record{

		const TABLENAME = "produto";

		function __construct(){
			# code...
		}

		public function listar(){

			try {

				Transaction::open('livro');
				$criteria = new Criteria;
				$criteria->setProperty('order','id');
				$repository = new Repository('Produto');
				$pessoas = $repository->load($criteria);
				if ($pessoas) {
					foreach ($pessoas as $pessoa) {

						print $pessoa->id."  ".$pessoa->nome."<br>";
					}
				}

				Transaction::close();
			} catch (Exception $e) {

				print $e->getMessage();
			}
		}

		public function show($param){
			if ($param['method'] == 'listar') {
				$this->listar();
			}
		}
	}


 ?>
