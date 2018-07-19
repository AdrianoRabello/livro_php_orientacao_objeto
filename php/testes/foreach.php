<?php

  $array = array(
      "nome"=>'adriano',
      "idade"=>30,
      "genero"=>'masculino'
    );

    foreach ($array as $key => $value) {
      echo $value."<br>";
    }

    echo '<hr>';

    foreach ($array as $a) {
      echo $a;
    }


 ?>
