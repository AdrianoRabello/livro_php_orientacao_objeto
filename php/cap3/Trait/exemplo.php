<?php

  require "ExemploTrait.php";
  require "Record.php";
  require "Pessoa.php";


  /*
    Criamos um trait quando precisamos unir metodos de diferentes classes em uma só. Ao criarmos uma trait, podemos usalo em uma lcasse imap_mail_como
    se fosse um copia e cola sem em um objeto. Os objetos da classe que utilisa o Trait pode acessar seus métodos como se eles fizessem parte da classe.
  */
  $p = new Pessoa();
  $p->escreveTrait();

 ?>
