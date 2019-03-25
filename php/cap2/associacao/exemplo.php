<?php

  require_once 'Fabricante.php';
  require       "Produto.php";

  // Na composição a cricação do objeto fica fora do escorpo do objeto pai, ou seja, a destruição de um objeto não afeta o outro
  $p1 = new Produto('chocolate',10,7);
  $f1 = new Fabricante('Fabrica de chocolate','rua do rabello',123456);

  $p1->setFabricante($f1);


  echo $p1->getDescricao();
  echo "<pre>";
  print_r($p1);
 ?>
