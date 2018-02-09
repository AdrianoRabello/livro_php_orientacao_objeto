<?php

  require_once "configTdg.php";

  // só para testar o funcionamneto da classe
  $con = new PDO("mysql:host=localhost;dbname=estoque;charset=utf8","root","");

  $data1 = new stdClass;

  $data1->descricao     = "Chocolate";
  $data1->estoque       = 10;
  $data1->preco_custo   = 18;
  $data1->preco_venda   = 18;
  $data1->codigo_barras = "123456";
  $data1->data_cadastro = date("Y-m-d");
  $data1->origem        = "N";


  //print_r($data1);

  try {
    $con = new PDO("mysql:host=localhost;dbname=estoque;charset=utf8","root","");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ProdutoGateway::setConnection($con);

    $pw = new ProdutoGateway();
    //$pw->save($data1);
    $produto = $pw->find(1);
    $produto->estoque +=2; // adiciona mais dois no objeto,
    $pw->save($produto);/*pw salva os valores no banco de dados pois como o objeto ja tem ip realiza apenas um update*/
    echo "<pre>";
    print_r($produto);


  } catch (Exception $e) {

    print $e->getMessage();
  }


 ?>
