<?php 
	

	/**
	 @acthor Adriano Rabello
	 *
	 Esta é a classe para utilização do design patter Singleton. Esse design Parterner é utilizado para podermos disponibilizar em toda parte da aplicação a instancia de um objeto com os mssmo dado. 

	 É utilizado no lugar de variavel globais pois não permite a lateração do objeto sem ser pelos metodos definigos na classe  
	 
	 */
	class Preferencias
	{
		
		private $data;
		private static $instance;

		function __construct()
		{
			$this->data = parse_ini_file('config/application.ini');
		}

		public static function getInstance()
		{

			if (empty(self::$instance)) {

				self::$instance = new self;
			}

			return self::$instance;
		}

		public function setData($key, $value)
		{
			$this->data[$key] = $value;
		}

		public function getData($key)
		{9ii
			return $this->data[$key];
		}

		public function save()
		{
			$string = '';

			if ($this->data) {
				foreach ($this->data as $key => $value) {
					
					$string .= "{$key} = \"{$value}\" \n";
				}
			}

			file_put_contents('config/application.ini', $string);
		}
	}

 
 ?>