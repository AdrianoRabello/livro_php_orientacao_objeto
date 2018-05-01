<?php 

	abstract class Record{

		protected $data;

		public function __construct($id = NULL){
			if ($id) {
				$object = $this->load($id);

				if ($object) {
					$this->fromArray($object->toArray());
				}
			}

		}

		public function __clone(){
			unset($this->data['id']);
		}

		public function __set($prop,$value){
			if (method_exists($this,'set_'.$prop)) {
				call_user_func(array($this,'set_'.$prop),$value);
			}else{
				if ($value == NULL ) {
					// se o valor estiver nulo deleta a propriedade
					unset($this->data[$prop]);
				}else{
					// atribui o valor a propriedade 
					$this->data[$prop] = $value;
				}
			}
		}

		public function __get($prop){
			if (method_exists($this, 'get_'.$prop)) {
				// executa o metodo get da propriedade 
				return call_user_func(array($this,'get_'.$prop));
			}else{
				if (isset($this->data[$prop])) {
					return $this->data[$prop];
				}
			}
		}

		public function __isset($prop){
			return isset($this->data[$prop]);
		}

		// responsalvel por retornar o nome da tabela onde o Ative Recorde será persistido 
		private function getEntity(){
			$class = get_class($this);//     obtem o nome da classe
			return constant("{$class}::TABLENAME"); // retorna a constante da classe TABLENAME
		}
		
		public function fromArray($data){
			$this->data = $data;
		}

		public function toArray(){
			return $this->data;
		}


		// metodo par agravar no BD ou realizar update 
		public function store(){
			//$prepared = array();
			$prepared = $this->prepare($this->data);

			//var_dump($this->data);
			//print_r($prepared);

			//verifica se tem um id na bse de dados
			if (empty($this->data['id']) or (!$this->load($this->id))) {
				// incerementa o id 
				if (empty($this->data['id'])) {
					$this->id = $this->getLast() + 1;					
					$prepared['id'] = $this->id;																	
				}
				//print_r($prepared);

				// cria a instrução de insert 
				$sql = "INSERT INTO {$this->getEntity()} ".
				'('.implode(', ', array_keys($prepared)).')'.
				'values'.
				"(".implode(', ', array_values($prepared))." )";




			}else{
				// monta a instrução de update 
				$sql = "UPDATE {$this->getEntity()}";
				if ($prepared) {
					foreach ($prepared as $column => $value) {
						if ($column !== 'id') {
							$set[] = "{$column} = {$value}";
						}						
					}
				}
				$sql .= ' SET '.implode(',', $set);
				$sql .= ' WHERE id='.(int) $this->data['id'];
			}

			// obtem a transação ativa 
			if ($con = Transaction::get()) {
				Transaction::log($sql);
				$result = $con->exec($sql);
				return $result;
			}else{
				throw new Exception(' Não há transação ativa');
			}

			print $sql;
			
		}

		
		// ira selecionar o objeto no BD 
		public function load($id){
			//print $id;
			//monta a instrução select 
			$sql = "SELECT * FROM {$this->getEntity()}";
			$sql .= " WHERE id = ".(int) $id;
			//print $sql;
			//obtem a transação ativa 
			if ($con = Transaction::get()) {
				// cria a mensagem de log 
				Transaction::log($sql);
				$result = $con->query($sql);
				// se retornou algum dado 				
				if ($result) {
					$object = $result->fetchObject(get_class($this));	
					//$object = $result->fetchObject();				
				}				
				return $object;				
			}else{
				throw new Exception("Não há transação ativa");
			}
		}


		public function delete($id = NULL){
			// o id é parametro ou propriedade 
			$id = $id ? $id : $this->id;

			//monta a strng para deletar 
			$sql = "DELETE FROM {$this->getEntity()}";
			$sql .= " WHERE id = ".(int)$this->data['id'];

			// obtem a transação ativa 
			if ($con  = Transaction::get()) {
				// executa o sql 
				Transaction::log($sql);
				$result = $con->exec($sql);
				return $result;
			}else{
				throw new Exception("Não há transação ativa");
				
			}
		}


		// esse metodo é apenas um atalho para o meotod load. Podemos acessa-lo diretamente sem instaciar a classe 
		public static function find($id){
			$className = get_called_class();
			//print $className;
			$ar = new $className;
			return $ar->load($id);
		}

		// serve para retornar o ultimo id do BD
		private function getLast(){
			if ($con = Transaction::get()) {
				$sql = "SELECT max(id) FROM {$this->getEntity()}";

				// cria o log da instrução sql
				Transaction::log($sql);
				$result = $con->query($sql);

				// retorna os dados do BD
				$row = $result->fetch();
				return $row[0];
			}else{
				throw new Exception("Não há transação ativa");
				
			}
		}

		//  recebe um valor e o formata de acordo com o tipo de dado 

		public function escape($value){
			if (is_string($value) and (!empty($value))) {
				$value = addslashes($value);
				return "'$value'";

			}else if (is_bool($value)) {
				return $value ? 'TRUE' : 'FALSE';

			}else if ($value !== '') {
				return $value;

			}else{
				return "NULL";
				
			}
		}

		// reponsavel por preparar os dados antes de inserir no BD 
		public function prepare($data){
			$prepared = array();
			foreach ($data as $key => $value) {
				if (is_scalar($value)) {
					$prepared[$key] = $this->escape($value);
				}
			}
			return $prepared;
		}	

		public static function showError($e){
			echo json_encode(array(
			"message"=>$e->getMessage(),
			"line"=>$e->getLine(),
			"file"=>$e->getFile(),
			"code"=>$e->getCode()
			));
		}



	}
 ?>