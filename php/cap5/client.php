<?php

  try {

    $arguments = array();
    $arguments['enconding']= 'UTF-8';
    $arguments['exceptions'] = true;
    $arguments['location'] = "localhost:8080/livro_php_orientacao_objeto/php/soap.php?class=PessoaServices";
    $arguments['uri'] = "http:://test-uri/";
    $arguments['trace'] = 1;
    $client = new SoapClient(NULL,$arguments);
    print_r($client->getData(1));

  } catch (\Exception $e) {

    echo $e->getMessage();
  }


 ?>
