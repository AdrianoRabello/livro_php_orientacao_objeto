<?php
use Livro\Control\Page;
use Livro\Database\Transaction;
use Livro\Database\Repository;
use Livro\Database\Criteria;


class MeuExemploTwig extends Page{

  public function listar(){
      try {
          Transaction::open('livro');
          $criteria = new Criteria;
          $criteria->setProperty('order', 'id');

          $repository = new Repository('MeuProduto');
          $produtos = $repository->load($criteria);
          if ($produtos) {
              $produto = array();
              foreach ($produtos as $p) {
                  $produto[] = $p;
              }
          }
          /*echo "<pre>";
          print_r($produto);
          exit;*/
          return $produto;
          Transaction::close();
      }
      catch (Exception $e) {
          print $e->getMessage();
      }
  }

  /*public function show( $param ){
      if ($param['method'] == 'listar') {
          $this->listar();
      }
  }*/


  public function __construct(){
      parent::__construct();
      require_once 'Lib/Twig/Autoloader.php';
      Twig_Autoloader::register();

      $loader = new Twig_Loader_Filesystem('App/Resources');
      $twig = new Twig_Environment($loader);
      $template = $twig->loadTemplate('my-list.html');
      //echo "<pre>";
      //$this->listar();

      $replaces = array();
      $replaces['titulo'] = 'Lista de pessoas';
      $replaces['pessoas'] = array(
                  array('codigo' => '1',
                        'nome' => 'Anita Garibaldi',
                        'endereco' => 'Rua dos Gaudérios'),
                  array('codigo' => '2',
                        'nome' => 'Bento Gonçalves',
                        'endereco' => 'Rua dos Gaudérios'),
                  array('codigo' => '3',
                        'nome' => 'Giuseppe Garibaldi',
                        'endereco' => 'Rua dos Gaudérios')
              );
      echo "<pre>";
      $p['produto'] = $this->listar();
      /*print_r($replaces);
      print_r($p);*/
      $content = $template->render($p);
      echo $content;
  }


}
