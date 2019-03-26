<?php

 /**
 *
 */
 class Produto extends Record{

	 const TABLENAME = 'produto';
	 
	 private $estoque;
	 private $descricao;

   	public function set_estoque($estoque){
			if (is_numeric($estoque) AND $estoque > 0) {
				$this->data['estoque'] = $estoque;
			}else{
				throw new Exception(" Estoque {$estoque} inválido na classe ".__CLASS__);
			}
		}

	public function get_estoque(){
		//return $this->data['estoque'];

		return $this->estoque;
	}

	




  public function set_descricao($value)
  {
    $this->data['descricao'] = $value;
  }

  public function get_descricao(){
		//return ucfirst($this->data['descricao']);
		
		return strtoupper($this->descricao);
	}


	public function loadById($id)
	{

		$criteria = new Criteria();
		
		//$criteria->add(new Join('produto','id',"id_produto"));
		$criteria->add(new Filter('id','=',$id));

		$repository = new Repository("produto");

		$produto = $repository->load($criteria);

		return $produto;
	}
	
	




 }



 ?>
