<?php

  /*
    A diferença entre a Active Record e Row Data table é que active record possui meotodo de nogocio e RDG não
   */
  class ProdutoComTransacao{

    private $data;

    function __get($prop){
      return $this->data[$prop];
    }


    function __set($prop, $value){
      $this->data[$prop] = $value;
    }

    public function find($id){


      $sql = "SELECT * FROM produto WHERE id = '$id'";
      print $sql."<BR />";
      $con = Transaction::get(); // pega a transação ativa de Transaction
      $result = $con->query($sql);
      return $result->fetchObject(__CLASS__); // retorna a execução do sql como objeto da classe
    }


    /*public function all($filter = ''){

      $sql = "SELECT *  FROM produto ";
      if ($filter) {
        $sql.="WHERE $filter";
      }

      print $sql."<br />";
      $con = Transaction::get();
      $result = $con->query($sql);
      return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }*/

    /*public function delete(){

      $sql = "DELETE FROM produto WHERE id = '{$this->id}'";
      print $sql."<br />";
      $con = Transaction::get();
      return $con->query($sql);
    }*/

    public function save(){

      if (empty($this->data['id'])) {

        $id = $this->getLastId() + 1;
        $sql= "insert into produto (id,descricao,estoque, preco_custo,preco_venda,codigo_barras,data_cadastro,origem) ".
        "values ('{$id}',".
        "'{$this->descricao}',".
        "'{$this->estoque}',".
        "'{$this->preco_custo}',".
        "'{$this->preco_venda}',".
        "'{$this->codigo_barras}',".
        "'{$this->data_cadastro}',".
        "'{$this->origem}')";

      }else{
        $sql= "update produto set ".
        "descricao      = '{$this->descricao}',".
        "estoque        = '{$this->estoque}',".
        "preco_custo    = '{$this->preco_custo}',".
        "preco_venda    = '{$this->preco_venda}',".
        "codigo_barras  = '{$this->codigo_barras}',".
        "data_cadastro  = '{$this->data_cadastro}',".
        "origem         = '{$this->origem}'".
        "where id       = '{$this->id}'";
      }

      //print "$sql <br>";
      $con = Transaction::get();
      Transaction::log($sql);// grava no arquivo de log o sql 
      return $con->exec($sql);

    }

    public function getLastId(){
      $sql = "select max(id) as max from produto";
      $con = Transaction::get();
      $result = $con->query($sql);
      $data = $result->fetch(PDO::FETCH_OBJ);
      return $data->max;
    }

    /*public function getMargemLucro(){

      return (($this->prec_venda - $this->preco_custo) / $this->preco_custo) * 100;
    }*/

    /*public function registraCompra($custo,$quantidade){
      $this->custo = $custo;
      $this->estoque += $quantidade;
    }*/


  }







 ?>
