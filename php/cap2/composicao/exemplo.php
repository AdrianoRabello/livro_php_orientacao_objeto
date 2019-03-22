<?php

  require "Produto.php";
  require "Caracteristica.php";


  $p1 = new Produto("Chocolate",10.,7);

  $p1->addCaracteristica("cor","preto");
  $p1->addCaracteristica("Validade","10/10/2019");

  echo "<pre>";
  print_r($p1);

  echo json_encode($p1);

 ?>
