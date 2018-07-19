<?php

  namespace Application;

  class Form{}

  namespace Components;

  class Form{}




  /*var_dump(new Form);
  var_dump(new \Components\Form);
  var_dump(new \Application\Form);
  var_dump(new \SplFileInfo('/etc/shadow'));
  var_dump(new \SplFileInfo('/etc/shadow'));*/

  require "autoload_namespace.php";
  require "a.php";
  use Lib\Teste;
  use Aplication\Form as Fire;

  $t = new Teste;

  $f = new Fire;

  $f->escrever("fdp");

 ?>
