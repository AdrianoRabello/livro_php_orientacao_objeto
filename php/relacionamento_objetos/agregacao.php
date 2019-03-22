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



  class Cesta{

    private $time;
    private $itens;

    function __construct(){
      $this->time = date("d-m-Y H:i:s");
      $this->itens = array();
    }

    /*
      Na agregação, diferentemente da composição,
      o objeto todo recebe as instancias do objeto parte já prontas, ou seja,
      ele não é responsavel por sua criação.

      Nssa maneira de relacionamento de objetos podemos excluir o objeto
      todo que o objeto agregado continuara a exitir


    */
    public function addItem(Produto $p){
      $this->itens[] = $p;
    }

    public function getItens(){
      return $this->itens;
    }

    public function getTime(){
      return $this->time;
    }

  }



  //echo "<pre>";

  $c1 = new Cesta();
  $c1->addItem($p1 = new Produto('monitor',10,20));
  $c1->addItem($p2 = new Produto('Placa da video ',10,20));
  $c1->addItem($p3 = new Produto('Mesa de escritório',10,20));

  $p1->setFabricante($f1 = new Fabricante("Dell","São Paulo","Direito reservados"));




  /*foreach ($c1->getItens() as $c) {
    echo $c->getDescricao()."<br>";
  }*/
  echo "<pre>";

  print_r($c1->getItens()[0]);
  print_r($c1);




 ?>
