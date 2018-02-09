

<?php
    require_once "autoloadApi.php";



    try {


      Transaction::open('estoque'); // abre a conexao pela classe de transação, na qual repassa para classe Connection.
      $con = Transaction::get();// recebe a conexão ativa
      Produto::setConnection($con);// envia para classe Produto uma estancia do objeto PDO na qual pode ser usutizado os metodos de PDO como query

      $produto = new Produto;
      $produto->descricao     = 'Capucchino';
      $produto->estoque       = 100;
      $produto->preco_custo   = 4;
      $produto->preco_venda   =7;
      $produto->codigo_barras = '546546546';
      $produto->data_cadastro = date('Y-m-d');
      $produto->origem        = 'N';
      $produto->save();

      throw  new Exception('Eceção porposital');
      Transaction::close();// a operação só será lançada quando chamarmaos esse meotdo na qual executa a tarefa de armazenar no BD



      echo "<pre> ";
      print_r($produto);


    } catch (Exception $e) {

      print $e->getMessage();
    }



 ?>
