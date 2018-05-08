<?php 

	use Livro\Database\Transaction;
	use Livro\Database\Repository;
	use Livro\Database\Criteria;


	/**
	* 
	*/
	class PessoaControl{
		
		function __construct(){
			
		}

		try {
			
			Transaction::open('livro');
			$criteria = new Criteria;
			$criteria->setProperty('order','id');

			$repository = new Repository('Pessoa');
			
		} catch (Exception $e) {
			
		}
	}


 ?>