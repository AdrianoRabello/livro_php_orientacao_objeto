<?php

 /**
 *
 */
 class Produto extends Record{

   const TABLENAME = 'produto';

   	public function set_estoque($estoque){
			if (is_numeric($estoque) AND $estoque > 0) {
				$this->data['estoque'] = $estoque;
			}else{
				throw new Exception(" Estoque {$estoque} inválido na classe ".__CLASS__);
			}
		}

	public function get_estoque(){
		return $this->data['estoque'];
	}




  public function set_descricao($value)
  {
    $this->data['descricao'] = $value;
  }

  public function get_descricao(){
    return strtolower($this->data['descricao']);
  }




 }



 ?>
