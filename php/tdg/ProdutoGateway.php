<?php

  /*
    Essa classe possui apenas metodo de persistencia. A classe Produto utiliza esse metodos par apoder acessar o BD.
    Para utilizar os metodos dessa classe é necessario informar valores do objeto. O objeto vindo do BD não fica na
    memoria.
   */
  class ProdutoGateway{

    private static $con;


    public static function setConnection(PDO $con){
      self::$con = $con;
    }

    public function find($id, $class = 'stdClass'){

      $sql = "SELECT * FROM produto WHERE id = '$id'";

      print $sql."<BR />";
      $result = self::$con->query($sql);
      return $result->fetchObject($class);
    }


    public function all($filter,$class = "stdClass"){

      $sql = "SELECT *  FROM produto ";
      if ($filter) {
        $sql.="WHERE $filter";
      }

      print $sql."<br />";
      $result = self::$con->query($sql);
      return $result->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function delete($id){

      $sql = "DELETE FROM produto WHERE id = '$id'";
      print $sql."<br />";
      return self::$con->query($sql);
    }

    public function save(stdClass $data){

      if (empty($data->id)) {

        $id = $this->getLastId() + 1;
        $sql= "insert into produto (id,descricao,estoque, preco_custo,preco_venda,codigo_barras,data_cadastro,origem) ".
        "values ('{$id}',".
        "'{$data->descricao}',".
        "'{$data->estoque}',".
        "'{$data->preco_custo}',".
        "'{$data->preco_venda}',".
        "'{$data->codigo_barras}',".
        "'{$data->data_cadastro}',".
        "'{$data->origem}')";

      }else{
        $sql= "update produto set ".
        "descricao      = '{$data->descricao}',".
        "estoque        = '{$data->estoque}',".
        "preco_custo    = '{$data->preco_custo}',".
        "preco_venda    = '{$data->preco_venda}',".
        "codigo_barras  = '{$data->codigo_barras}',".
        "data_cadastro  = '{$data->data_cadastro}',".
        "origem         = '{$data->origem}'".
        "where id       = '{$data->id}'";
      }

      print "$sql <br>";

      return self::$con->exec($sql);

    }

    public function getLastId(){
      $sql = "select max(id) as max from produto";
      $result = self::$con->query($sql);
      $data = $result->fetch(PDO::FETCH_OBJ);
      return $data->max;
    }
  }







 ?>
