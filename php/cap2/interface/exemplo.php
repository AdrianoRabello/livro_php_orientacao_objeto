<?php

  require "OrcavelInterface.php";
  require "Produto.php";
  require "Servico.php";
  require "Orcamento.php";

  $o = new Orcamento();

  $o->adiciona(new Produto("Chololate",10,2),10);
  $o->adiciona(new Servico("Chololate",1000),1);


  echo($o->calculaTotal());
 ?>
