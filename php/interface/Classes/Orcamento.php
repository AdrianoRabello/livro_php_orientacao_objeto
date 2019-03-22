<?php 

	/**
	 * 
	 */
	namespace Inter\Classes;

	class Orcamento
	{

		private $itens;
		
		public function adiciona(Produto $produto, $qtd)
		{
			$this->itens[] = array($qtd,$produto);
		}


		public function calcularTotal()
		{
			$total = 0;

			foreach ($this->itens as $item) {
				
				print $item[1]->getDescricao()." - ".$item[1]->getPreco()."<br>";
				
				$total += ($item[0] * $item[1]->getPreco());
			}

			echo "<br> valor total = ";
			return $total;
		}
	}

 ?>