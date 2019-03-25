<?php
	require_once "autoload.php";

	try {

		$criteria = new Criteria;

		// objeto do tipo criteria recebe como paremtro um objeto do tipo Expression (Filer extende expression),
		//o tipo de operador é opcional, tendo como default AND
		$criteria->add(new Filter('idade','>',60),Expression::OR_OPERATOR);
		$criteria->add(new Filter('sexo','==','m'),Expression::OR_OPERATOR);
		//$criteria->add(new Join('pruduto','idPorduto','idContato'));
		//$criteria->add(new Join('contact','idUsurio','idUsurio'),Expression::S_OPERATOR);
		//$criteria->x();

		echo $criteria->dump();


		

		//um objeto criteria pode receber tanto objetos Expresison quanto citeria
		/*$criteria1 = new Criteria;
		$criteria1->add($criteria);
		$criteria1->add($criteria);*/


		// o metodo dumb tranforma as expressões em string plana para poder excutar no BD 
		//print $criteria1->dump();


	} catch (Exception $e) {

		print $e->getMessage();
	}
 ?>
