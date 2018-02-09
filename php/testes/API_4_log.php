
<?php
    require_once "autoloadApi.php";



    try {


      Transaction::open('estoque');
      Transaction::setLogger(new LoggerTXT('../tmp/log.txt'));
      Transaction::log('Inserindo produto novo');
    /*  $con = Transaction::get();
      Produto::setConnection($con);*/

      $produto = new ProdutoComTransacao;
      $produto->descricao     = 'Teste';
      $produto->estoque       = 30;
      $produto->preco_custo   = 5;
      $produto->preco_venda   = 10;
      $produto->codigo_barras = '546546546';
      $produto->data_cadastro = date('Y-m-d');
      $produto->origem        = 'N';
      $produto->save();


      Transaction::close();






    } catch (Exception $e) {

      print $e->getMessage();
    }



 ?>
