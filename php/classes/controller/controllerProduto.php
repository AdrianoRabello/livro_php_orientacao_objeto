<?php

   require "../../classes/api/autoload.php";
   require_once "../Api/Transaction.php";
   require_once "../Api/Connection.php";
   require_once "../Api/ClassLoader.php";
   
   use Api\Transaction;
   use Api\Connection;


  if(isset($_GET['produto'])){

    try {
      Transaction::open('estoque');

      echo "!teste";
      //Transaction::setLogger(new LoggerTXT("/tmp/produto_get.txt"));
    } catch (\Exception $e) {

    }

  }

 
