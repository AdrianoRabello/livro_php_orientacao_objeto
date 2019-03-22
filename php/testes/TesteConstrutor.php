<?php
  /*

    Tesntando a inicialização de construtor.

   */

  require "Construtor.php";
  class TesteConstrutor extends Construtor{

    private $values;

    function __construct(){

      parent::__construct("Teste construtor");

      $this->class = "teste de classe";
    }
  }




  echo "<pre>";
  $teste = new TesteConstrutor();
  $teste->name = "Adriano";
  $teste->idade = 30;
  $teste->class = "classe teste";


  print_r($teste);


 ?>
