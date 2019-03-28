<?php

require_once 'Lib/Livro/Core/ClassLoader.php';



$al = new Livro\Core\ClassLoader;
$al->addNamespace('Livro','Lib/Livro');
$al->register();

use Livro\Database\Transaction; 
use Livro\Database\Criteria; 
use Livro\Database\Repository; 


 Transaction::open('livro');
				$criteria = new Criteria;
				$criteria->setProperty('order','id');
				$repository = new Repository('Produto');
				$pessoas = $repository->load($criteria);
