<?php


  /**
   *
   */

  class Produto{

    private $descricao;
    private $estoque;
    private $preco;
    private $fabricante;
    private $caracteristicas;

    function __construct($descricao, $estoque, $preco){

     $this->descricao  = $descricao;
     $this->preco      = $preco;
     $this->estoque    = $estoque;
    }

    /*
      na composição o objeto é criado dentro do objeto total. Esse objeto deixando de existir o
      objeto associado deixa de exixtir também
      o objeto caracterisca não exitira se o objeto produto não exitir, essa é a caractrisca
      principal de composição

     */
    public function addCaracteristica($nome, $valor){
      $this->caracteristicas[] = new Caracteristica($nome,$valor);
    }

    public function getCaracteriticas(){
      return $this->caracteristicas;
    }



    public function getDescricao(){
     return $this->descricao;
    }


    public function setFabricante(Fabricante $f){
     $this->fabricante = $f;
    }

    public function getFabricante(){
      return $this->fabricante;
    }
  }



  class caracteristica{

    private $nome;
    private $valor;

    function __construct($nome, $valor){
      $this->nome = $nome;
      $this->valor = $valor;
    }

    public function getNome(){
      return $this->nome;
    }

    public function getValor(){
      return $this->valor;
    }
  }



  //echo "<pre>";

  $p1 = new Produto('Chocolate',10,7);
  $p1->addCaracteristica('cor','Branco');
  $p1->addCaracteristica('peso',56);

  foreach ($p1->getCaracteriticas() as $c) {
    echo $c->getNome(). " - ". $c->getValor()."<br>";
  }
  echo "<pre>";
  print_r($p1);


 ?>
