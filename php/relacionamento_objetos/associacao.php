<?php


  /**
   *
   */
  class Fabricante{

    private $nome;
    private $endereco;
    private $documento;
    function __construct($nome, $endereco, $documento){

      $this->nome = $nome;
      $this->documento = $documento;
      $this->endereco = $endereco;
    }

    public function getNome(){
      return $this->nome;
    }
  }


  /**
   *
   */
  class Produto{

    private $descricao;
    private $estqoue;
    private $preco;
    private $fabricante;
  
    function __construct($descricao, $estoque, $preco){

      $this->descricao  = $descricao;
      $this->preco      = $preco;
      $this->estoque    = $estoque;
    }


    public function getDescricao(){
      return $this->descricao;
    }


    /* na associação o objeto fabricante é utilizado dentro da classe Produto recebendo
      no metodo setFabricante o objeto dessa classe.
     */
    public function setFabricante(Fabricante $f){
      $this->fabricante = $f;
    }

    public function getFabricante(){
      return $this->fabricante;
    }
  }

  // exemplo de uso


  $p1 = new Produto('Chocolcate',10,7);
  $f1 = new Fabricante('Cacau show','Avenida vitória','Todos os direitos reservados');

  $p1->setFabricante($f1);

  // pega no metodo getFabricante (que é um objeto) o getNome do objeto da classe Frabricante
  print "Descricao: ". $p1->getDescricao()."<br>";
  print "Nome do fabricante : ". $p1->getFabricante()->getNome();




 ?>
