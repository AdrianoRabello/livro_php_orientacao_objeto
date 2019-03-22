<?php

  require "Cesta.php";
  require "Produto.php";




  $c1 = new Cesta();

  $c1->addItem($p1 = new Produto('Arroz',10,15.30));
  $c1->addItem($p2 = new Produto('Chocolate',10,2));


  echo "<pre>";
  print_r($c1);

  foreach ($c1->getItens() as $iten) {
    echo $iten->getDescricao()."<br>";
  }


 ?>
