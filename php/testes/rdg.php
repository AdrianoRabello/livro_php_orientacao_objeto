<?php

  require_once "configRdg.php";

  // só para testar o funcionamneto da classe
  //$con = new PDO("mysql:host=localhost;dbname=estoque;charset=utf8","root","");




  //print_r($data1);

  try {
    $con = new PDO("mysql:host=localhost;dbname=estoque;charset=utf8","root","");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ProdutoGateway::setConnection($con);

    $produtos = ProdutoGateway::all();

    // percorre todos os objetos que estão armazenados em produtos e deleta todos eles do BD
    /*foreach ($produtos as $produto) {
      $produto->delete();
    }*/

    $p1 = new ProdutoGateway;

    $p1->descricao     = "Caixa de bombom";
    $p1->estoque       = 5;
    $p1->preco_custo   = 18;
    $p1->preco_venda   = 18;
    $p1->codigo_barras = "123456";
    $p1->data_cadastro = date("Y-m-d");
    $p1->origem        = "N";
    $p1->save();

    //$produtos = Produto::all();


    echo "<pre>";
    //print_r($produtos);

    /*foreach ($variable as $produto) {
      $poduto->delte();
    }*/


  } catch (Exception $e) {

    print $e->getMessage();
  }


 ?>
