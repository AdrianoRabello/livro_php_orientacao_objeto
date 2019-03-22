<?php 
	
	namespace Inter\Classes;

	/**
	 * 
	 */
	class Produto
	{

		private $descricao;
		private $estqoue;
		private $preco; 
		
		function __construct($descricao, $estoque, $preco)
		{
			$this->descricao = $descricao;
			$this->preco 	 = $preco;
			$this->estoque   = $estoque;
		}

		public function getPreco(){

			return $this->preco;
		}

		public function getDescricao(){
			return $this->descricao;
		}

		public function getEstoque(){
			return $this->estoque;
		}
	}

 ?>