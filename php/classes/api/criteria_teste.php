<?php 
	
	require_once "autoload.php";

	$criteria = new Criteria;
	$criteria->add(new filter('estoque','>',10),Expression::OR_OPERATOR);
	$criteria->add(new filter('estoque','<',15),Expression::AND_OPERATOR);
	print($criteria->dump());


	echo "<br>";
	$criteria1 = new Criteria;
	$criteria1->add(new filter('idade','IN',array(1,5,15)));
	$criteria1->add(new filter('idade','NOT IN',array(10)));
	print($criteria1->dump());

 ?>