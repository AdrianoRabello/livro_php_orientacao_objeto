<?php

  /**
   *
   */
  class Construtor{

    protected $elements;

    function __construct($name){
      echo "este constutor é da classe Contrutor e o parametro recebido é: ".$name;
    }

    public function __set($name,$value){

      $this->elements[$name] = $value;
    }

    public function __get($name){

      return $this->elements[$name];
    }
  }

 ?>
