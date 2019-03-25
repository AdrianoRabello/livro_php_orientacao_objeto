<?php

  /**
   *
   */
  class Produto
  {

    private $descricao;
    private $estoque;
    private $preco;
    private $fabricante;

    function __construct($descricao, $estoque, $preco)
    {
      $this->descricao  = $descricao;
      $this->estoque    = $estoque;
      $this->preco      = $preco;
    }

    public function getDescricao()
    {
      return ucfirst($this->descricao);
    }

    public function setFabricante(Fabricante $f)
    {
      $this->fabricante = $f;
    }

    public function getFabricante()
    {
      return $this->fabricante;
    }
  }


 ?>
