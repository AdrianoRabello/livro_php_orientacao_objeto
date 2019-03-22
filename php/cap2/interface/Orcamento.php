<?php

  /**
   *
   */
  class Orcamento
  {

    private $itens;

    function __construct()
    {
      // code...
    }

    public function adiciona(OrcavelInterface $produto, $qtd)
    {
      $this->itens[] = array($qtd, $produto);
    }

    public function calculaTotal()
    {
      $total = 0;

      echo "<pre>";
      print_r($this->itens);
      foreach ($this->itens as $item) {



        $total += ($item[0] * $item[1]->getPreco());
      }

      return $total;
    }

  }


 ?>
