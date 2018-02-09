<?php

  /**
   *
   */
  class VendaMapper{

    /*function __construct(argument)
    {
      # code...
    }*/

    private static $con;

    public static function setConnection(PDO $con){

      self::$con = $con;
    }

    public static function save(Venda $venda){
      $date = date("Y-m-d");

      $sql = "INSERT INTO venda (data_venda) VALUES ('$date')";
      print $sql. "\n";
      self::$con->query($sql);
      $id = self::getLastId();
      $venda->setId($id);

      foreach ($venda->getItens() as $item) {
        $quantidade = $item[0];
        $produto    = $item[1];
        $preco      = $produto->preco;

        $sql = "INSERT INTO item_venda (id_venda,id_produto,quantidade, preco) VALUES('$id', '{$produto->id}','$quantidade', '$preco')";
        print $sql."\n";
        self::$con->query($sql);

      }
    }


    private static function getLastId(){
      $sql = "SELECT max(id) as max from venda";
      $result = self::$con->query($sql);
      $data = $result->fetch(PDO::FETCH_OBJ);
      return $data->max;

    }




  }


 ?>
