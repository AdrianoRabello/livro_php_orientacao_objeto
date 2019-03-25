<?php


  /**
   *
   */
  //require "Expression.php";
  require "Filter.php";
  class Criteria extends Expression{

    private $expressions;
    private $operators;
    private $properties;
    private $join;

    function __construct(){

      $this->expressions = array();
      $this->operators = array();
     
    }

    public function getClass()
    {

      return get_class($this);
    }


   


    public function add(Expression $expression, $operator = self::AND_OPERATOR){

      //echo $expression->className;

      if (empty($this->expressions)) {

        $operator = NULL;
      }

      $this->expressions[]  = $expression;
      $this->operators[]    = $operator;

    }

    public function dump(){
      // concatena lista de expressoes

      if (is_array($this->expressions)) {
        if (count($this->expressions) > 0) {

          $result = '';
          foreach ($this->expressions  as $i => $expression) {

            $operator = $this->operators[$i];

            //concatena operador com respectiva expressão
            $result .= $operator.$expression->dump().' ';
          }
          $result = trim($result);

          //echo $result;
          //die;
          // como estava antes 
          //return "({$result})";
          return "{$result}";

          
        }
      }
    }

    public function joinDump(){

      
      if (is_array($this->expressions)) {
        if (count($this->expressions) > 0) {

          $result = '';
          foreach ($this->expressions  as $i => $expression) {

            $operator = $this->operators[$i];

            //concatena operador com respectiva expressão
            $result .= $operator.$expression->dump().' ';
          }
          $result = trim($result);

          //echo $result;
         // die;
          // como estava antes 
          return "{$result}";
          //return "{$result}";

          
        }
      }

      //return  $sql = " join {$this->table} on {$this->table}.{$this->tableField} = {$this->field}";
          
       
    }

    public function setProperty($property, $value){
      if (isset($value)) {
        $thi->properties[$property] = $value;
      }else{
        $this->properties[$property] = NULL;
      }
    }

    public function getProperty($property){
      if (isset($this->properies[$property])) {
        return $this->properties[$property];
      }
    }


  }

 ?>
