<?php



require_once '../../Lib/Livro/Core/ClassLoader.php';
require_once '../../Lib/Livro/Database/Connection.php';


$al = new Livro\Core\ClassLoader;
$al->addNamespace("Livro","Lib/Livro");
$al->register();

use Livro\Database\Connection;

$ob1 =  Connection::open('livro');

var_dump($ob1);



