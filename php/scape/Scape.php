<?php

  /**
   *
   */
  class Scape{

    private $id;
    private $nome;
    private $idade;
    private $data = [];
    const TABLE = "usuario";

    function __construct(){

    }


    // escapando '  e colocando /
    function scape($value){
      if (is_string($value) and !empty($value)) {
        // adiciona // em aspas
        $value = addslashes($value);
        return "'$value'";
      }else if(is_bool($value)){
        return $value ? 'TRUE' : 'FALSE';
      }else if($value !== ''){
        return $value;
      }else{
        return "NULL";
      }

    }


    // montando array com dados OBS já estou fazendo isso em receber dados
    function prepare($data){
      $prepared = array();

      foreach ($data as $key => $value) {
        if (is_scalar($value)) {
          $prepared[$key] = $this->scape($value);
        }

      }
      return $prepared;
    }



    public function receberDados(array $dados){

      try {
        foreach ($dados as $key => $value) {
           if (method_exists($this,'set'.lcfirst($key))) {
            call_user_func(array($this,'set'.lcfirst($key)),$this->scape($value));
            $this->setData($key,$this->retornarDado($key));// recebendo dados em um array
          }else{

            echo "Erro em ".__METHOD__;
          }
        }
      } catch (Exception $e) {

        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      }


    }

    // recebe como parametro o nome da tabela e um array associativo cujo o nome do indice é o nome do campo no BD e seu valor
    public function save($dados){

      $this->receberDados($dados);
      //$prepared = $this->prepare($this->data);
      $sql = "INSERT INTO ".self::TABLE." ".
      '('.implode(', ',array_keys($this->data)).")".
      ' values '.
      '('.implode(', ',array_values($this->data)).');';
      print $sql;
    }

    // recebe como parametro o nome da tabela e um array associativo cujo o nome do indice é o nome do campo no BD e seu valor
    public function update($dados){

      $this->receberDados($dados);
      //$prepared = $this->prepare($data);
      foreach ($this->data as $col => $value) {
        $set [] = "{$col} = {$value}";
      }
      $sql = "UPDATE ".self::TABLE." SET ".implode(', ',$set)." WHERE id = {$this->data['id']}";
      print $sql;

    }



    public function retornarDado($atributo){

      try {

          if (method_exists($this,'get'.lcfirst($atributo))) {

          return call_user_func(array($this,'get'.lcfirst($atributo)));

          }else{

            echo "Erro em ".__METHOD__;
          }

      } catch (Exception $e) {

        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      }

    }

    function exibirData(){
      echo "<pre>";
      print_r($this->data);
    }


    // getters e setters
    function setId($id){
      if (is_numeric($id)) {
        $this->id = $id;
        return;
      }else{
        echo "id não é numerico ".__METHOD__."<br />";
      }
    }

    function getId(){
      return $this->id;
    }

    function setNome($nome){
      $this->nome = $nome;
    }

    function getNome(){
      return $this->nome;
    }

    function setIdade($idade){
      if (is_numeric($idade)) {
        $this->idade = $idade;
        return;
      }else{
        echo "não é numerico ".__METHOD__."<br />";
      }

      $this->idade = $idade;
    }

    function getIdade(){
      return $this->idade;
    }

    function setData($prop,$value){
      $this->data[$prop] = $value;
    }

    function getData($prop){
      return $this->data[$prop];
    }

  }

  $p1 = new Scape;
  $p1->setId(1);
  $p1->setNome("Adriano");
  $p1->setIdade(29);

  $teste = array(
    "id"=>null,
    "nome"=>"adriano",
    "idade"=>29
  );

  //$string = $scape->update("usuario",$teste);
  //$string = $scape->update("usuario",$teste);
//$scape->receberDados($teste);
  //$p1->save($p1);
  $p1->update($teste);


  //echo "<br />".$scape->getNome();




 ?>
