<?php


  /*

     temos um array associtivo pessoas que possui o array de arrays
  */
  $pessoas["pessoas"] = array(array(
                              "id"=>1,
                              "nome"=>"adriano",
                              "idade"=>30
                              ),
                              array(
                                "id"=>2,
                                "nome"=>"adriano",
                                "idade"=>30
                              ),
                              array(
                                "id"=>3,
                                "nome"=>"adriano",
                                "idade"=>30
                              )
                        );



    echo "<pre>";
    //print_r($pessoas);

  //  echo $pessoas["pessoas"][0]['id'];

    /*percorremos o array como de voce um objeto e imprimos o valor desejaso com a sintaxe a baixo*/
    foreach ($pessoas["pessoas"] as $pessoa) {
      echo $pessoa['id'];
    }

 ?>
