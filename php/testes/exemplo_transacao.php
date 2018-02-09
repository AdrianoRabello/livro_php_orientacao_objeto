<?php

  require_once "config.php";

  // só para testar o funcionamneto da classe
  //$con = new PDO("mysql:host=localhost;dbname=estoque;charset=utf8","root","");




  //print_r($data1);

  try {

     Connection::open('estoque');  
     Produto::setConnection($con);

     $p1 = new Produto();

     $p1->descricao     = "Chocolate";
     $p1->estoque       = 10;
     $p1->preco_custo   = 18;
     $p1->preco_venda   = 18;
     $p1->codigo_barras = "123456";
     $p1->data_cadastro = date("Y-m-d");
     $p1->origem        = "N";

  } catch (Exception $e) {

    print $e->getMessage();
  }


 ?>
