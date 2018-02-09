<?php

  /**
   *
   */
  class Produto{

    private static $con;
    private $data;


    function __construct() {

    }

    function __get($prop){

      return $this->data[$prop];
    }

    function __set($prop, $value){

      $this->data[$prop] = $value;
    }

    public static function setConnection(PDO $con){

      self::$con = $con;
      ProdutoGateway::setConnection($con);
    }


    public function find($id){

     $gw = new ProdutoGateway();
     return $gw->find($id,'Produto');
    }

    public static function all($filter =''){

      $gw = new ProdutoGateway();

      return $gw->all($filter,'Produto');
    }

    public function delete(){

      $gw = new ProdutoGateway();

      return $gw->delete($this->id);
    }


    public function save(){

      $gw = new ProdutoGateway();

      return $gw->save( (object) $this->data);


    }


    public function getMargemLucro(){

      return (($this->prec_venda - $this->preco_custo) / $this->preco_custo) * 100;
    }

    public function registraCompra($custo,$quantidade){
      $this->custo = $custo;
      $this->estoque += $quantidade;
    }


  }


 ?>
