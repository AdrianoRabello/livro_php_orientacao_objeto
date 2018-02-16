<?php 

	/**
	*  etou fazendo essa classe para tentar extender a classe record para depois adapta-la e poder usar em outros projetos
	*/
	class Venda extends Record {
		
		private $id;
		private $dataVenda;
		const TABLENAME = 'venda';

		function __construct(){
			# code...
		}

	public function receberDados(array $dados){

     	try {
	        foreach ($dados as $key => $value) {
	           if (method_exists($this,'set_'.$key)) {
	            call_user_func(array($this,'set_'.$key),$this->escape($value));
	            $this->setData($key,$this->retornarDado($key));// recebendo dados em um array
	          }else{

	            echo "Erro em ".__METHOD__;
	          }
	        }
      	} catch (Exception $e) {

        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      }

    }


    public function retornarDado($atributo){

      try {

          if (method_exists($this,'get_'.$atributo)) {

          return call_user_func(array($this,'get_'.$atributo));

          }else{

            echo "Erro em ".__METHOD__;
          }

      } catch (Exception $e) {

        echo 'Exceção capturada: '.  $e->getMessage(). "\n";
      }

    }

		




		public function set_id($id){
			$this->id = $id;
			$this->data['id'] = $id;
		}

		public function get_id(){
			return $this->id;
		}

		public function set_data_venda($dataVenda){
			$this->dataVenda = $dataVenda;
			$this->data['data_venda'] = $dataVenda;
		}

		public function get_data_venda(){
			return $this->dataVenda;
		}

		function setData($prop,$value){
	      $this->data[$prop] = $value;
	    }

	    function getData($prop){
	      return $this->data[$prop];
	    }

	}
 ?>