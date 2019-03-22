<?php 

	
	/**
	 * 
	 */
	require "Pessoa.php";

	class PessoaFisica extends Pessoa
	{
		
		function __construct($name)
		{
			# code...
			# 
			$this->name = $name;
		}


		public function falar()
		{


		}

		public  function andar()
		{	
			echo " <br>estou andando";
		}

		public function escrever()
		{
			echo "meu nome é ". $this->name;
		}
	}


 ?>