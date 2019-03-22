<?php 

	
	/**
	 * 
	 */
	
	// require "Abstrata.php";
	require "PessoaFisica.php";
	class Teste 
	{
		
		// recebe um oncstrutor de uma classe abstrata. Todas as classses que implementarem essa classe servira como parametro
		function __construct(Pessoa $pessoa)
		{
			
			$pessoa->escrever();

			$pessoa->andar();
		}


	}



	


	$teste = new Teste(new PessoaFisica('Adriano'));

 ?>