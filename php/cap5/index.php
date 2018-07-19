<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="boostrap/css/bootstrap.css">
    <link rel="text/javascript" href="boostrap/js/bootstrap.js">

    <title></title>
  </head>
  <body>

  </body>
</html>


<?php


  require_once 'Lib/Livro/Core/ClassLoader.php';
  $al = new Livro\Core\ClassLoader;
  $al->addNamespace("Livro","Lib/Livro");
  $al->register();

  // AppLoader

  require_once "Lib/Livro/Core/AppLoader.php";
  $al = new Livro\Core\AppLoader;
  $al->addDirectory("App/Control");
  $al->addDirectory("App/Model");
  $al->register();

  if ($_GET) {
    $class = $_GET['class'];
    if (class_exists($class)) {
      $pagina = new $class;
      $pagina->show($_GET);
    }
  }

 ?>
