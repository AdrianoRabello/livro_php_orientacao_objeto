

<?php
    require_once "autoloadApi.php";



    try {

      // chama atravez do meotdo estattico a conexão ao BD estoque atraves do arquivo config/estoque.ini
      $con = Connection::open('estoque');
      Produto::setConnection($con);

      $produto = new Produto;
      $produto->descricao     = 'cafe';
      $produto->estoque       = 100;
      $produto->preco_custo   = 4;
      $produto->preco_venda   =7;
      $produto->codigo_barras = '546546546';
      $produto->data_cadastro = date('Y-m-d');
      $produto->origem        = 'N';
      $produto->save();





      /*echo "<pre> ";
      print_r($produto);*/


    } catch (Exception $e) {

      print $e->getMessage();
    }



 ?>
