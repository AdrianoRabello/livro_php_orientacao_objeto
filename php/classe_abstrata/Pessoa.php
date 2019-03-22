<?php 
	
	/**
	 * 
	 */
	
	abstract class Pessoa 
	{

		protected $name;
		
		

		abstract public function falar();

		abstract public function andar();

		abstract public function escrever();





		public function setName($name)
		{
			$this->name = $name;
		}

		public function getName()
		{
			return $this->name;
		}

	}


 ?>