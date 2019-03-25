<?php

  /**
   *
   */
  //require "Expression.php";
  class Join extends Expression{

    private $table;
    private $tableField;
    private $field;
  

    public $className = "Join";
    function __construct($table, $tableField, $field){

      $this->table = $table;
      $this->tableField = $tableField;
      // trnasforma o valor com certas formas de tipo
      $this->field  = $field;
    

    }



    public function dump(){
      // concatena a expressão
      return " join {$this->table} on {$this->table}.{$this->tableField} = {$this->field}";
    }

    public function getClass()
    {
      return get_class($this);
    }


  }


  /*$filter1 = new Filter('data','=','2017-06-02');

  print $filter1->dump();

  $filter2 = new Filter('genero','=',array('m','f'));

  print $filter2->dump();*/
 ?>
