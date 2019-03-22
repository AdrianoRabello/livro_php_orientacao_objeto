<?php

  require "Produto.php";

  // retorna um array com otodos os metodos da classe
  print_r(get_class_methods('Produto'));


  $p1 = new Produto("Chocolate",10,1);

  echo "<hr>";

  call_user_func(array($p1,'apresenta'));

 ?>
