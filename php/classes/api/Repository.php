<?php

	final class Repository{

		private $activeRecord;

		// recebe o nome da classe para poder instanciar e criar os objetos para guardar no array
		function __construct($class){
			$this->activeRecord = $class;
		}


		function load (Criteria $criteria){
			//instancia a instrução de select
			$sql = "SELECT * FROM ".constant($this->activeRecord.'::TABLENAME')." ";

			//obtem a clausula where do objeto criteria
			if ($criteria) {
				$expression = $criteria->dump();

				//echo ($criteria->getClass());
				//die;

				
				//$sql .= $criteria->joinDump();
				



				
				if ($expression) {
					$sql .= ' where '.$expression;
				}
				

				$order 	= $criteria->getProperty('order');
				$limit 	= $criteria->getProperty('limit');
				$offset = $criteria->getProperty('offset');

				// obtem a ordenação do select
				if ($order) {
					$sql .= ' ORDER BY '.$order;
				}

				if($limit){
					$sql.=' LIMIT '.$limit;
				}

				if ($offset) {
					$sql .= ' OFFSET '.$offset;
				}

				//echo $sql;
				//die;
			}

			//echo "<pre>";
			//print_r($criteria);

			//obtem a transação ativa

			if ($conn = Transaction::get()) {
				Transaction::log($sql);
				$result = $conn->query($sql);
				$results = array();

				if ($result) {
					while ($row = $result->fetchObject($this->activeRecord)) {
						$results[] = $row;
					}
				}

				return $results;
			}else{
				throw new Exception("Não há transação ativa", 1);

			}

		}

		function delete(Criteria $criteria){
			$expression = $criteria->dump();
			$sql = "DELETE FROM ".constant($this->activeRecord.'::TABLENAME');
			if ($expression) {
				$sql.= ' WHERE '.$expression;
			}
			if ($conn = Transaction::get()) {
				Transaction::log($sql); // registra a mensagem de log
				$result = $conn->exec($sql);
				return $result;

			}else{
				throw new Exception("Não há transação ativa");

			}
		}


		public function count(Crieria $criteria){
			$expression = $criteria->dump();
			$sql = "SELECT count(*) FROM ".constant($this->activeRecord.'::TABLENAME');
			if ($expression) {
				$sql.=' WHERE '.$expression;
			}

			if ($conn = Transaction::get()) {
				Transaction::log($sql);
				$result = $conn->query($sql);

				if ($result) {
					$row = $result->fetch();
				}
				return $row[0];
			}else{
				throw new Exception("Não há transação ativa ");

			}
		}
	}

 ?>
