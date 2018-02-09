<?php

  require_once "configDm.php";
  //require_once "configRdg.php";

  // só para testar o funcionamneto da classe





  //print_r($data1);

  try {


    /*$p1 = new Produto;
    $p1->id = 1;
    $p1->preco = 12;

    $p2 = new Produto;
    $p2->id = 2;
    $p2->preco = 12;


    $venda = new Venda;
    $venda->addItem(10,$p1);
    $venda->addItem(10,$p2);

    $con = new PDO("mysql:host=localhost;dbname=estoque;charset=utf8","root","");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    VendaMapper::setConnection($con);

    VendaMapper::save($venda);*/





    function DBUpDate($table, array $data, $where = null){
		foreach ($data as $key => $value) {
			if(is_numeric ($value)){
				$fields[] = "{$key} = $value ";
			}else{
				$fields[] = "{$key} = '$value' ";
			}

		}
		$fields = implode(', ', $fields);
		$where = ($where) ? " WHERE {$where}": null;
		$query = "UPDATE {$table} SET {$fields}{$where}";
		//return $this->ExecuteQuery($query);

    print $query;
	}





  



  //DBUpDate("usuario",$teste," id = 5");


  } catch (Exception $e) {

    print $e->getMessage();
  }


 ?>
