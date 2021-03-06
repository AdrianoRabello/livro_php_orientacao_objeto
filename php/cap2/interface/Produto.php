<?php

  /**
   *
   */
  // implementa a interface
  class Produto implements OrcavelInterface
  {

    private $caracteristicas;
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

    public function addCaracteristica($nome, $valor)
    {
      $this->caracterosticas[] = new Caracteristica($nome,$valor);
    }

    public function getDescricao()
    {
      return $this->descricao;
    }

    public function setFabricante(Fabricante $f)
    {
      $this->fabricante = $f;
    }

    public function getFabricante()
    {
      return $this->fabricante;
    }

    // Temos que implementar esse metedo pois é o meotodo da interface
    public function getPreco()
    {
      return $this->preco;
    }

    
  }

 ?>
