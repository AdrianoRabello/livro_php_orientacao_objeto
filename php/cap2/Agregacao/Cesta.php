<?php

  /**
   *
   */
  class Cesta
  {

    private $time;
    private $itens;
    function __construct()
    {
      $this->time = date('d-m-Y');
      $this->itens = array();
    }

    //adiciona um produto já pronto ao array
    public function addItem(Produto $p)
    {
      $this->itens[] = $p;

    }

    // retorna a lsita de produtos do array
    public function getItens()
    {
      return $this->itens;
    }

    public function getTime()
    {
      return $this->time;
    }


  }


 ?>
